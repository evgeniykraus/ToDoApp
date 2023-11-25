<?php

namespace App\Repositories;

use App\DTO\Notes\NotesFilter;
use App\Models\Note;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Prettus\Repository\Eloquent\BaseRepository;

class NoteRepositoryEloquent extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Note::class;
    }


    /**
     * @param  NotesFilter  $filter
     * @return LengthAwarePaginator
     */
    public function getNotesPaginated(NotesFilter $filter): LengthAwarePaginator
    {
        return $this
            ->with(['user'])
            ->orderBy($filter->orderBy, $filter->orderDirection)
            ->paginate($filter->perPage);
    }

    /**
     * @param  NotesFilter  $filter
     * @return LengthAwarePaginator
     */
    public function getNotesFromUserPaginated(NotesFilter $filter): LengthAwarePaginator
    {
        return $this->notesFromUserQuery($filter)->paginate($filter->perPage);
    }


    /**
     * @param  NotesFilter  $filter
     * @return HasMany
     */
    private function notesFromUserQuery(NotesFilter $filter): HasMany
    {
        return $filter->user->notes()
            ->select(['title', 'content', 'created_at', 'updated_at'])
            ->orderBy($filter->orderBy, $filter->orderDirection);
    }
}