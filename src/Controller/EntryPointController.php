<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntryPointController extends AbstractController
{
    public function __construct(
        #[Autowire('%env(resolve:APP_URL_API)%')]
        private readonly string $appUrlApi,
    )
    {}

    #[Route('/', name: 'app_entry_point')]
    public function loadAppAction(): Response
    {
        return $this->render('base.html.twig', [
            'appUrlApi' => $this->appUrlApi,
        ]);
    }
}