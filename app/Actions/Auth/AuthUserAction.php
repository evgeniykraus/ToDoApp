<?php

namespace App\Actions\Auth;

use App\DTO\Auth\AuthData;
use App\Models\User;
use App\Services\Abstracts\UserServiceInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;


class AuthUserAction
{
    public function __construct(
        protected UserServiceInterface $userService,
    ) {
    }

    /**
     * @param  array  $data
     * @return AuthData
     */
    public function __invoke(array $data): AuthData
    {
        throw_unless(Auth::attempt($data),
            AuthorizationException::class, __('exceptions.bad_login_or_pas'), false);

        /** @var User $user */
        $user = Auth::user();

        $token = $this->userService->getAccessToken($user);

        return AuthData::from(['user' => $user, 'token' => $token]);
    }
}