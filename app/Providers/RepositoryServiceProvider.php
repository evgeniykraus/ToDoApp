<?php

namespace App\Providers;

use App\Repositories\Abstracts\NoteRepository;
use App\Repositories\Abstracts\UserRepository;
use App\Repositories\NoteRepositoryEloquent;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected array $repositories = [
        NoteRepository::class => NoteRepositoryEloquent::class,
        UserRepository::class => UserRepositoryEloquent::class,
        //
    ];

    public function register()
    {
        foreach ($this->repositories as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }
}