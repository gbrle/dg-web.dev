<?php

namespace App\Controller\api;

use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api', name: 'api_')]
class ProjetController extends AbstractController
{
    public function __construct(
        private readonly ProjetRepository $projetRepository,
        private readonly SerializerInterface $serializer
    )
    {
    }
    #[Route('/projets', name: 'get_projets', methods: ['GET'])]
    public function getProjets(): JsonResponse
    {
        $projets = $this->projetRepository->findAll();

        return new JsonResponse($this->serializer->serialize($projets, 'json'), 200, [], true);
    }
}
