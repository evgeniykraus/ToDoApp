<?php

namespace App\Http\Controllers\Api;

use App\Actions\Auth\AuthUserAction;
use App\Actions\Auth\LogoutUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @param  AuthRequest  $request
     * @param  AuthUserAction  $action
     * @return Response
     */
    public function login(AuthRequest $request, AuthUserAction $action): Response
    {
        $authData = $action($request->validated());

        return $authData->toResponse($request)->cookie(Passport::cookie(), $authData->token);
    }

    /**
     * @param  LogoutUserAction  $action
     * @return void
     */
    public function logout(LogoutUserAction $action): void
    {
        $action(Auth::user());
    }

    /**
     * @return UserResource
     */
    public function profile(): UserResource
    {
        return UserResource::make(Auth::user());
    }
}
