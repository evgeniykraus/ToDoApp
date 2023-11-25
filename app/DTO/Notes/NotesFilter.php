<?php

namespace App\DTO\Notes;

use App\Http\Requests\GetNotesListRequest;
use App\Http\Requests\GetNotesRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelData\Data;

class NotesFilter extends Data
{
    public function __construct(
        public readonly string $orderBy,
        public readonly string $orderDirection,
        public readonly User $user,
        public readonly ?string $perPage = null,
    ) {
    }

    /**
     * @param  GetNotesRequest|GetNotesListRequest  $request
     * @return NotesFilter
     */
    public static function fromRequest(GetNotesRequest|GetNotesListRequest $request): NotesFilter
    {
        $data = $request->validated();

        return new self(
            orderBy: $data['order_by'] ?? 'created_at',
            orderDirection: $data['order_direction'] ?? 'asc',
            user: Auth::user(),
            perPage: $data['per_page'] ?? null,
        );
    }
}