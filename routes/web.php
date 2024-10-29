<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresentationController ;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\Register;


Route::middleware(['CaptureSessionData'])
    ->group(function () {
       
        Route::get('/', HomePage::class)->name('home');

        Route::get('/register', Register::class)->name('profile.create');
        Route::get('/presentation/{presentationID?}', Register::class)->name('profile.update');

        Route::get('/not-found', [PresentationController ::class, 'notFound'])->name('not.found');
    });

