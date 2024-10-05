<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorld;


Route::middleware(['CaptureSessionData'])
    ->group(function () {
        Route::get('/', [HelloWorld::class, 'index']);
    });