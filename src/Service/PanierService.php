<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PanierService
{
    private SessionInterface $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function getPanier(): array
    {
        return $this->session->get('panier', []);
    }

    public function getTotalQuantite(): int
    {
        $panier = $this->getPanier();
        return array_sum($panier);
    }
}
