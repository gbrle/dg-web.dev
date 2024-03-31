<?php

declare(strict_types=1);

namespace App\Manager;

use App\Entity\DailyStandUpNote;
use App\Repository\DailyStandUpNoteRepository;

class DailyStandUpNoteManager
{
    public function __construct(
        private readonly DailyStandUpNoteRepository $dailyStandUpNoteRepository,
    ) {
    }

    public function createDailyStandUpNote(DailyStandUpNote $dailyStandUpNote): DailyStandUpNote
    {
        $this->dailyStandUpNoteRepository->save($dailyStandUpNote);

        return $dailyStandUpNote;
    }
}
