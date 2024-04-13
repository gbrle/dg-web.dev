<?php

declare(strict_types=1);

namespace App\Manager;

use App\Entity\DailyStandUpNote;
use App\Repository\DailyStandUpNoteRepository;
use Symfony\Component\Security\Core\User\UserInterface;

class DailyStandUpNoteManager
{
    public function __construct(
        private readonly DailyStandUpNoteRepository $dailyStandUpNoteRepository,
    ) {
    }

    public function fetchAllDailyStandUpNotesCreatedByUser(UserInterface $user): array
    {
        return $this->dailyStandUpNoteRepository->findAllByUser($user);
    }

    public function createDailyStandUpNote(DailyStandUpNote $dailyStandUpNote): DailyStandUpNote
    {
        $this->dailyStandUpNoteRepository->save($dailyStandUpNote);

        return $dailyStandUpNote;
    }

    public function deleteDailyStandUpNote(DailyStandUpNote $dailyStandUpNote, UserInterface $user): DailyStandUpNote
    {
        if ($dailyStandUpNote->getCreatedBy() !== $user) {
            throw new \InvalidArgumentException('Vous ne pouvez pas supprimer une note que vous n\'avez pas créée.');
        }

        $this->dailyStandUpNoteRepository->delete($dailyStandUpNote);

        return $dailyStandUpNote;
    }
}
