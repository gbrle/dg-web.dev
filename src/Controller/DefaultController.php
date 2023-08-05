<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends AbstractController
{
    #[route('/app/{slug?}', name: 'app', requirements: ['slug' => '.+'])]
    public function app(): Response
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/api/helloword/{name}", name="api_helloword")")
     */
    #[route('/api/helloword/{name}', name: 'api_helloword')]
    public function apiHelloword(string $name): Response
    {
        return new JsonResponse('hello ' . $name);
    }
}