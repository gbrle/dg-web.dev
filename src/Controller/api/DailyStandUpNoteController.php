<?php

namespace App\Controller\api;

use App\Form\DailyStandUpNote\CreateDailyStandUpNoteFormType;
use App\Manager\DailyStandUpNoteManager;
use App\Response\FormErrorResponse;
use App\Serializer\JsonSerializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class
DailyStandUpNoteController extends AbstractController
{
    public function __construct(
        private readonly JsonSerializer $jsonSerializer,
        private readonly DailyStandUpNoteManager $dailyStandUpNoteManager,
    )
    {
    }

    #[Route('/daily-stand-up-notes', name: 'get_daily_stand_up_notes', methods: ['GET'])]
    public function getDailyStandUpNotes(): Response
    {
        $dailyStandUpNotes = $this->dailyStandUpNoteManager->fetchAllDailyStandUpNotesCreatedByUser($this->getUser());

        return new Response($this->jsonSerializer->serialize($dailyStandUpNotes, ['read']));
    }

    #[Route('/daily-stand-up-notes', name: 'create_daily_stand_up_note', methods: ['post'])]
    public function createDailyStandupNote(Request $request): Response
    {
        $form = $this
            ->createForm(CreateDailyStandUpNoteFormType::class)
            ->submit(json_decode($request->getContent(), true))
        ;

        if (!$form->isValid()) {
            return FormErrorResponse::createFromForm($form);
        }

        $dailyStandUpNote = $this->dailyStandUpNoteManager->createDailyStandUpNote($form->getData());

        return new Response($this->jsonSerializer->serialize($dailyStandUpNote));
    }
}
