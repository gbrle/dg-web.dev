<?php

declare(strict_types=1);

namespace App\Controller\api;

use App\Form\Utilisateur\EditionUtilisateurFormType;
use App\Response\FormErrorResponse;
use App\Entity\Utilisateur;
use App\Manager\UtilisateurManager;
use App\Serializer\JsonSerializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class UtilisateurController extends AbstractController
{
    public function __construct(
        private readonly JsonSerializer $jsonSerializer,
        private readonly UtilisateurManager $utilisateurManager
    ) {
    }

    #[Route('/me', name: 'me', methods: ['get'])]
    public function getUtilisateur(#[CurrentUser] ?Utilisateur $user): Response
    {
        return new Response($this->jsonSerializer->serialize($user, ['read']));
    }

    #[Route('/utilisateurs', name: 'list_utilisateurs', methods: ['get'])]
    public function getUtilisateurs(): Response
    {
        $utilisateurs = $this->utilisateurService->fetchAllUtilisateurs();

        return new Response($this->jsonSerializer->serialize($utilisateurs, ['read']));
    }

    #[Route('/utilisateurs/{id}', name: 'patch_utilisateur', methods: ['patch'])]
    public function patchUtilisateur(
        Request $request,
        Utilisateur $utilisateur
    ): Response {
        $form = $this
            ->createForm(EditionUtilisateurFormType::class, $utilisateur)
            ->submit(json_decode($request->getContent(), true))
        ;

        if (!$form->isValid()) {
            return FormErrorResponse::createFromForm($form);
        }

        $utilisateur = $this->utilisateurManager->updateUtilisateur($form->getData());

        return new Response($this->jsonSerializer->serialize($utilisateur, ['read']));
    }
}
