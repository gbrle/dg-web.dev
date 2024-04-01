<?php

declare(strict_types=1);

namespace App\Manager;

use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;

class UtilisateurManager
{
    public function __construct(
        private readonly UtilisateurRepository $utilisateurRepository,
    ) {
    }

    /**
     * @return array<Utilisateur>
     */
    public function fetchAllUtilisateurs(): array
    {
        return $this->utilisateurRepository->findAll();
    }

    public function updateUtilisateur(Utilisateur $utilisateur): Utilisateur
    {
        $this->utilisateurRepository->save($utilisateur);

        return $utilisateur;
    }
}
