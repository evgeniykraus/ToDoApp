<?php

namespace App\DTO\Notes;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\GetNotesListRequest;
use App\Http\Requests\GetNotesRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class NotesFilter extends DataTransferObject
{
    public readonly ?string $perPage;
    public readonly string $orderBy;
    public readonly string $orderDirection;
    public readonly User $user;

    /**
     * @param  GetNotesRequest|GetNotesListRequest  $request
     * @return NotesFilter
     * @throws UnknownProperties
     */
    public static function fromRequest(GetNotesRequest|GetNotesListRequest $request): NotesFilter
    {
        $data = $request->validated();

        return new self(
            perPage: $data['per_page'] ?? null,
            orderBy: $data['order_by'] ?? 'created_at',
            orderDirection: $data['order_direction'] ?? 'asc',
            user: Auth::user(),
        );
    }
}