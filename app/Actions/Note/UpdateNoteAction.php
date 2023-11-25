<?php

namespace App\Actions\Note;

use App\Models\Note;
use App\Services\NoteService;

class UpdateNoteAction
{
    public function __construct(
        protected NoteService $noteService
    ) {
    }

    /**
     * @param  Note  $note
     * @param  array  $data
     * @return Note
     */
    public function __invoke(Note $note, array $data): Note
    {
        return $this->noteService->updateNote($note, $data);
    }
}