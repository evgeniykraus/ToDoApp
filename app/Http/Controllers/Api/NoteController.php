<?php

namespace App\Http\Controllers\Api;

use App\Actions\Note\GetNotesListAction;
use App\Actions\Note\GetUserNotesAction;
use App\DTO\Notes\NotesFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetNotesListRequest;
use App\Http\Requests\GetNotesRequest;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class NoteController extends Controller
{
    /**
     * @param  GetNotesListRequest  $request
     * @param  GetNotesListAction  $action
     * @return AnonymousResourceCollection
     * @throws UnknownProperties
     */
    public function list(GetNotesListRequest $request, GetNotesListAction $action): AnonymousResourceCollection
    {
        return NoteResource::collection($action(NotesFilter::fromRequest($request)));
    }

    /**
     * @param  GetNotesRequest  $request
     * @param  GetUserNotesAction  $action
     * @return AnonymousResourceCollection
     * @throws UnknownProperties
     */
    public function index(GetNotesRequest $request, GetUserNotesAction $action): AnonymousResourceCollection
    {
        return NoteResource::collection($action(NotesFilter::fromRequest($request)));
    }
//$request
    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreNoteRequest $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return NoteResource::make($note);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
    }
}
