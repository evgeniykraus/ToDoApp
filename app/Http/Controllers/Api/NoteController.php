<?php

namespace App\Http\Controllers\Api;

use App\Actions\Note\DeleteNoteAction;
use App\Actions\Note\GetNotesListAction;
use App\Actions\Note\GetUserNotesAction;
use App\Actions\Note\StoreNoteAction;
use App\Actions\Note\UpdateNoteAction;
use App\DTO\Notes\NotesFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteNoteRequest;
use App\Http\Requests\GetNotesListRequest;
use App\Http\Requests\GetNotesRequest;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * @param  GetNotesListRequest  $request
     * @param  GetNotesListAction  $action
     * @return AnonymousResourceCollection
     */
    public function list(GetNotesListRequest $request, GetNotesListAction $action): AnonymousResourceCollection
    {
        return NoteResource::collection($action(NotesFilter::fromRequest($request)));
    }

    /**
     * @param  GetNotesRequest  $request
     * @param  GetUserNotesAction  $action
     * @return AnonymousResourceCollection
     */
    public function index(GetNotesRequest $request, GetUserNotesAction $action): AnonymousResourceCollection
    {
        return NoteResource::collection($action(NotesFilter::fromRequest($request)));
    }

    /**
     * @param  StoreNoteRequest  $request
     * @param  StoreNoteAction  $action
     * @return NoteResource
     */
    public function store(StoreNoteRequest $request, StoreNoteAction $action): NoteResource
    {
        return NoteResource::make($action(Auth::user(), $request->validated()));
    }

    /**
     * @param  Note  $note
     * @return NoteResource
     */
    public function show(Note $note): NoteResource
    {
        return NoteResource::make($note);
    }

    /**
     * @param  UpdateNoteRequest  $request
     * @param  Note  $note
     * @param  UpdateNoteAction  $action
     * @return NoteResource
     */
    public function update(UpdateNoteRequest $request, Note $note, UpdateNoteAction $action): NoteResource
    {
        return NoteResource::make($action($note, $request->validated()));
    }

    /**
     * @param  DeleteNoteRequest  $request
     * @param  Note  $note
     * @param  DeleteNoteAction  $action
     * @return void
     */
    public function delete(DeleteNoteRequest $request, Note $note, DeleteNoteAction $action): void
    {
        $action($note);
    }
}
