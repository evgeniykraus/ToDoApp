<?php

namespace App\Actions\Auth;

use App\DTO\Auth\AuthData;
use App\DTO\Auth\Credentials;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;


class AuthUserAction
{
    /**
     * @throws UnknownProperties
     */
    public function __invoke(Credentials $data): AuthData
    {
        throw_unless(Auth::attempt($data->toArray()),
            AuthorizationException::class, __('exceptions.bad_login_or_pas'), false);

        $token = Auth::user()->createToken(config('app.key'))->accessToken;

        return new AuthData(user: Auth::user(), token: $token);
    }
}