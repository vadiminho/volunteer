<?php

use App\Http\Controllers\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/auth')->group(function () {
    Route::post('/sign-up', [UserController::class, 'signUp']);
    Route::post('/sign-in', [UserController::class, 'signIn']);
});