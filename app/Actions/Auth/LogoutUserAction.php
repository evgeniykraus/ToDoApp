<?php

namespace App\Actions\Auth;

use App\Models\User;

class LogoutUserAction
{
    /**
     * @param  User  $user
     * @return void
     */
    public function __invoke(User $user): void
    {
        $user->token()->revoke();
    }
}