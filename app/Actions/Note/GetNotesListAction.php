<?php

namespace App\Actions\Note;

use App\DTO\Notes\NotesFilter;
use App\Repositories\NoteRepositoryEloquent;
use Illuminate\Pagination\LengthAwarePaginator;

class GetNotesListAction
{
    private NoteRepositoryEloquent $noteRepository;

    public function __construct(NoteRepositoryEloquent $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    public function __invoke(NotesFilter $filter): LengthAwarePaginator
    {
        return $this->noteRepository->getNotesPaginated($filter);
    }
}