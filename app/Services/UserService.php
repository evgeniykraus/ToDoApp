<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Abstracts\UserRepository;
use App\Services\Abstracts\UserServiceInterface;

class UserService implements UserServiceInterface
{
    public function __construct(
        protected UserRepository $userRepository,
    ) {
    }

    /**
     * @param  User  $user
     * @return string
     */
    public function getAccessToken(User $user): string
    {
        return $user->createToken(config('app.key'))->accessToken;
    }
}