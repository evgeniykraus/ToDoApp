<?php

namespace App\Actions\Note;

use App\Models\Note;
use App\Models\User;
use App\Services\Abstracts\MailServiceInterface;
use App\Services\NoteService;

class StoreNoteAction
{
    public function __construct(
        protected NoteService $noteService,
        protected MailServiceInterface $mailService,
    ) {
    }

    /**
     * @param  User  $user
     * @param  array  $data
     * @return Note
     */
    public function __invoke(User $user, array $data): Note
    {
        $note = $this->noteService->createNote($user, $data);
        $this->mailService->notificationAfterNoteCreated($note);

        return $note;
    }
}