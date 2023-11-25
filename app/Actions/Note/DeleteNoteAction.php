<?php

namespace App\Actions\Note;

use App\Models\Note;
use App\Services\NoteService;

class DeleteNoteAction
{
    public function __construct(
        protected NoteService $noteService
    ) {
    }

    /**
     * @param  Note  $note
     * @return void
     */
    public function __invoke(Note $note): void
    {
        $this->noteService->deleteNote($note);
    }
}