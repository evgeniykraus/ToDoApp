<?php

namespace Database\Seeders;

use App\Domain\Enums\RoleEnum;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = collect([
            ['name' => RoleEnum::admin->name],
            ['name' => RoleEnum::user->name],
        ]);

        $roles->each(fn($role) => Role::create($role));
    }
}
