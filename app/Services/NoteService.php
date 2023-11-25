<?php

namespace App\Services;

use App\DTO\Notes\NotesFilter;
use App\Models\Note;
use App\Models\User;
use App\Repositories\Abstracts\NoteRepository;
use App\Services\Abstracts\NoteServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class NoteService implements NoteServiceInterface
{
    public function __construct(
        protected NoteRepository $noteRepository,
    ) {
    }

    /**
     * @param  User  $user
     * @param  array  $data
     * @return Note
     */
    public function createNote(User $user, array $data): Note
    {
        /** @var Note $note */
        $note = $user->notes()->create($data);

        return $note;
    }

    /**
     * @param  Note  $note
     * @param  array  $data
     * @return Note
     */
    public function updateNote(Note $note, array $data): Note
    {
        $note->update($data);

        return $note->refresh();
    }

    /**
     * @param  Note  $note
     * @return void
     */
    public function deleteNote(Note $note): void
    {
        $note->delete();
    }

    /**
     * @param  NotesFilter  $filter
     * @return LengthAwarePaginator
     */
    public function getAllNotes(NotesFilter $filter): LengthAwarePaginator
    {
        return $this->noteRepository->getNotesPaginated($filter);
    }

    /**
     * @param  NotesFilter  $filter
     * @return LengthAwarePaginator
     */
    public function getUserNotes(NotesFilter $filter): LengthAwarePaginator
    {
        return $this->noteRepository->getNotesFromUserPaginated($filter);
    }
}