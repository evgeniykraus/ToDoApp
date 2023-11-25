<?php

namespace App\Repositories;

use App\Domain\Enums\RoleEnum;
use App\Models\User;
use App\Repositories\Abstracts\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * @return Collection
     */
    public function getAdmins(): Collection
    {
        return $this->where('role_id', RoleEnum::admin->value)->get();
    }
}