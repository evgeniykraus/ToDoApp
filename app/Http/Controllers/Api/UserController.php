<?php

namespace App\Http\Controllers\Api;

use App\Actions\Auth\AuthUserAction;
use App\Actions\Auth\LogoutUserAction;
use App\DTO\Auth\Credentials;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\UserAuthResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UserController extends Controller
{
    public function register(AuthRequest $request, AuthUserAction $action)
    {
    }


    /**
     * @param  AuthRequest  $request
     * @param  AuthUserAction  $action
     * @return Response
     * @throws UnknownProperties
     */
    public function login(AuthRequest $request, AuthUserAction $action): Response
    {
        $auth = $action(Credentials::fromRequest($request));
        $resource = UserAuthResource::make($auth);

        return response($resource)
            ->cookie(Passport::cookie(), $auth->token);
    }

    /**
     * @param  LogoutUserAction  $action
     * @return void
     */
    public function logout(LogoutUserAction $action): void
    {
        $action(Auth::user());
    }

    public function profile(): UserResource
    {
        return UserResource::make(Auth::user());
    }
}
