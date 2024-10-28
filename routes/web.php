<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresentationController ;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\Register;


Route::middleware(['CaptureSessionData'])
    ->group(function () {
       
        Route::get('/', HomePage::class)->name('home');

        Route::get('/register/{presentationID?}', Register::class)->name('profile.crud');

        Route::get('/not-found', [PresentationController ::class, 'notFound'])->name('not.found');
    });

