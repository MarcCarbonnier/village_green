<?php

namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'make:puml',
    description: 'Create puml class diagram from Entities',
)]
class PumlCommand extends Command
{
    private EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $manager) {
        $this->manager = $manager;
        parent::__construct();
    }

    protected function configure(): void
    {
        // Pas d'arguments ou options pour l'instant
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->manager->getMetadataFactory()->getAllMetadata();

        $entities = [];

        foreach (get_declared_classes() as $className) {
            $reflector = new \ReflectionClass($className);
            $attributes = $reflector->getAttributes();

            $isEntity = false;
            foreach ($attributes as $attr) {
                if ($attr->getName() === "Doctrine\ORM\Mapping\Entity") {
                    $isEntity = true;
                    break;
                }
            }

            if (!$isEntity) {
                continue;
            }

            $entityName = $reflector->getShortName();
            $properties = [];

            foreach ($reflector->getProperties() as $property) {
                $propertyAttributes = $property->getAttributes();
                $propertyType = $property->getType()?->getName() ?? 'mixed';
                $propertyType = ltrim($propertyType, '?');

                $targetPropertyName = null;

                foreach ($propertyAttributes as $attribute) {
                    $attrShortName = (new \ReflectionClass($attribute->getName()))->getShortName();

                    // Simple column
                    if ($attrShortName === "Column") {
                        $properties[] = [$property->getName(), $propertyType, null, null, null];
                    }

                    // Relations
                    if (in_array($attrShortName, ["OneToMany", "ManyToOne", "ManyToMany", "OneToOne"])) {
                        $targetEntityType = $propertyType;

                        foreach ($attribute->getArguments() as $argKey => $argValue) {
                            if ($argKey === "targetEntity") {
                                $targetEntityType = (new \ReflectionClass($argValue))->getShortName();
                            }
                            if ($argKey === "inversedBy" || $argKey === "mappedBy") {
                                $targetPropertyName = $argValue;
                            }
                        }

                        if ($propertyType === "Collection") {
                            $propertyType = $targetEntityType . "[]";
                        }

                        $properties[] = [
                            $property->getName(),
                            $propertyType,
                            $attrShortName,
                            $targetEntityType,
                            $targetPropertyName
                        ];
                    }
                }
            }

            $entities[$entityName] = $properties;
        }

        // Génération du PUML
        $data = "@startuml\n";
        foreach ($entities as $entityName => $properties) {
            $data .= "class $entityName {\n";
            foreach ($properties as $prop) {
                $data .= "\t";
                if ($prop[2] !== null) $data .= "<color:#0000dd>";
                if ($prop[0] === "id") $data .= "**";
                $data .= "{$prop[0]} : {$prop[1]}";
                if ($prop[0] === "id") $data .= "**";
                if ($prop[2] !== null) $data .= "</color>";
                $data .= "\n";
            }
            $data .= "}\n\n";
        }

        // Liens entre classes
        $doneLinks = [];
        foreach ($entities as $entityName => $properties) {
            foreach ($properties as $prop) {
                if ($prop[2] === null) continue;

                $target = $prop[3];

                $found = false;
                foreach ($doneLinks as $line) {
                    if (
                        ($line[0] === $entityName && $line[1] === $prop[4] && $line[2] === $target && $line[3] === $prop[0]) ||
                        ($line[2] === $entityName && $line[1] === $prop[4] && $line[0] === $target && $line[3] === $prop[0])
                    ) {
                        $found = true;
                        break;
                    }
                }

                if ($found) continue;

                $data .= "$entityName";
                match ($prop[2]) {
                    "OneToMany" => $data .= ' "1"--"*"' ,
                    "ManyToOne" => $data .= ' "*"--"1"' ,
                    "ManyToMany" => $data .= ' "*"--"*"' ,
                    "OneToOne" => $data .= ' "1"--"1"' ,
                    default => null
                };
                $data .= " $target\n";

                $doneLinks[] = [$entityName, $prop[0], $target, $prop[4]];
            }
        }

        $data .= "\nhide methods\nhide circle\n@enduml\n";

        if (!file_exists('puml')) mkdir('puml');
        file_put_contents('puml/index.puml', $data);

        $handle = popen("plantuml -pipe > puml/index.png", "w");
        if ($handle) {
            fwrite($handle, $data);
            pclose($handle);
        } else {
            echo "\nErreur lors de la génération du PNG.\n";
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
