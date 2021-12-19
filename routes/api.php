<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\TrueGameController;
use App\Http\Controllers\Api\UserController;

Route::post('/login', [AuthController::class, 'postLogin']);
Route::post('/register', [AuthController::class, 'postRegister']);

Route::get('/games', [GameController::class, 'getGames']);
Route::get('/game/1', [TrueGameController::class, 'getGameData']);
Route::get('/game/2', [TrueGameController::class, 'getGameData']);

Route::middleware('auth_api')->group(function () {
    Route::get('/user', [UserController::class, 'getUser']);
    Route::get('/user/statistic', [UserController::class, 'getUserStatistic']);
    Route::post('/user/statistic/add', [UserController::class, 'postUserStatistic']);
    Route::post('/user/changeFullname', [UserController::class, 'changeUserFullname']);
});
