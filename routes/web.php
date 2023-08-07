<?php

use App\Http\Controllers\Admin\{SupportController};
use App\Http\Controllers\Site\ControllerSite;
use Illuminate\Support\Facades\Route;

Route::get('/supports', [SupportController::class, 'index'])->name('supports/index');

Route::get('/contato', [ControllerSite::class, 'contact']);

//Route::get('/contato', [SiteController::class, 'contact']);

Route::get('/', function () {
    return view('welcome');
});

