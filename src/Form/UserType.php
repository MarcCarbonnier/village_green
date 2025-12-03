<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'input_style',
                    'Placeholder' => 'Nom'
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'input_style',
                    'placeholder' => 'Prénom'
                ]
            ])

            ->add('email', EmailType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'input_style',
                    'placeholder' => 'Adresse mail'
                ]
            ])

            ->add('adresse', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'input_style',
                    'placeholder' => 'Adresse'
                ]
            ])

            ->add('codePostal', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'input_style',
                    'placeholder' => 'Code postal'
                ]
            ])

            ->add('password', PasswordType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'input_style',
                    'placeholder' => 'Mot de passe'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
