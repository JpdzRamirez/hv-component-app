<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\Register;


Route::middleware(['CaptureSessionData'])
    ->group(function () {
        Route::get('/register', Register::class)->name('profile.create');
        Route::get('/', HomePage::class)->name('home');
    });

