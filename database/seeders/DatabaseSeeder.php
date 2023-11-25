<?php

namespace Database\Seeders;

use App\Domain\Enums\RoleEnum;
use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Админ',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => RoleEnum::admin->value
            ],
            [
                'name' => 'Юзер',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => RoleEnum::user->value
            ],
        ];

        $this->call(RoleSeeder::class);

        User::factory()->afterCreating( function ($user) {
            Note::factory()
                ->count(rand(10, 20))
                ->create([
                    'user_id' => $user->id,
                ]);
        })->createMany($users);
    }
}
