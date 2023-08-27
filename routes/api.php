<?php

use App\Http\Controllers\Api\SupportController;
use Illuminate\Support\Facades\Route;


Route::post('/login',AuthController::class, 'auth');
Route::apiResource('/supports', SupportController::class);