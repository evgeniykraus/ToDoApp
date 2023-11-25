<?php

namespace App\Providers;

use App\Repositories\Abstracts\NoteRepository;
use App\Repositories\Abstracts\UserRepository;
use App\Services\Abstracts\MailServiceInterface;
use App\Services\Abstracts\NoteServiceInterface;
use App\Services\Abstracts\UserServiceInterface;
use App\Services\MailService;
use App\Services\NoteService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, function () {
            return new UserService(
                $this->app[UserRepository::class],
            );
        });

        $this->app->bind(MailServiceInterface::class, function () {
            return new MailService(
                $this->app[UserRepository::class],
            );
        });

        $this->app->bind(NoteServiceInterface::class, function () {
            return new NoteService(
                $this->app[NoteRepository::class],
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
