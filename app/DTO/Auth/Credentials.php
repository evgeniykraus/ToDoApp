<?php

namespace App\DTO\Auth;

use App\Http\Requests\AuthRequest;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class Credentials extends DataTransferObject
{
    public string $password;
    public string $email;

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(AuthRequest $request): Credentials
    {
        $data = $request->validated();

        return new self([
           'password' => $data['password'],
           'email' => $data['email'],
        ]);
    }
}