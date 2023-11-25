<?php

use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [UserController::class, 'login']);

Route::group(['middleware' => ['auth:api']], function (){
    Route::get('profile', [UserController::class, 'profile']);
    Route::get('logout', [UserController::class, 'logout']);

    Route::group(['prefix' => 'notes'], function (){
        Route::get('/', [NoteController::class, 'index']);
        Route::post('/', [NoteController::class, 'store']);
        Route::get('/all', [NoteController::class, 'list']);

        Route::group(['prefix' => '{note}', 'where' => ['note' => '[0-9]+']], function () {
            Route::put('/', [NoteController::class, 'update']);
            Route::get('/', [NoteController::class, 'show']);
            Route::delete('/', [NoteController::class, 'delete']);
        });
    });
});