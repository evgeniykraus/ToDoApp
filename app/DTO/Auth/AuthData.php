<?php

namespace App\DTO\Auth;

use App\Models\User;
use Spatie\LaravelData\Data;

class AuthData extends Data
{
    public function __construct(
        public readonly User $user,
        public readonly string $token,
    ) {
    }
}