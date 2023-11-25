<?php

namespace App\DTO\Auth;

use App\Models\User;
use Spatie\DataTransferObject\DataTransferObject;

class AuthData extends DataTransferObject
{
    public User $user;
    public string $token;
}