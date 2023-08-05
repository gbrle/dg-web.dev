<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends AbstractController
{
    #[route('/', name: 'home')]
    #[route('/page/{slug?}', name: 'page', requirements: ['slug' => '.+'])]
    public function page(): Response
    {
        return $this->render('base.html.twig');
    }

    #[route('/api/helloword/{name}', name: 'api_helloword')]
    public function apiHelloword(string $name): Response
    {
        return new JsonResponse('hello ' . $name);
    }
}