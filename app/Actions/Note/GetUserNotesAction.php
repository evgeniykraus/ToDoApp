<?php

namespace App\Actions\Note;

use App\DTO\Notes\NotesFilter;
use App\Services\NoteService;
use Illuminate\Pagination\LengthAwarePaginator;

class GetUserNotesAction
{
    public function __construct(
        protected NoteService $noteService
    ) {
    }

    /**
     * @param  NotesFilter  $filter
     * @return LengthAwarePaginator
     */
    public function __invoke(NotesFilter $filter): LengthAwarePaginator
    {
        return $this->noteService->getUserNotes($filter);
    }
}