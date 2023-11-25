<?php

namespace App\Console\Commands;

use App\Domain\Enums\RoleEnum;
use App\Models\Note;
use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::query()->with(['notes'])
            ->first();
//
//        dd($user);
        $note = Note::query()
            ->with(['user'])
//            ->select(['title', 'content', 'created_at', 'updated_at'])
            ->first();

        dd($user->notes()->whereId(1)->first());
    }
}
