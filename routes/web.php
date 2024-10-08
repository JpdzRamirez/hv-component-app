<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Layout\Body;


Route::middleware(['CaptureSessionData'])
    ->group(function () {
        Route::get('/', Body::class);
    });