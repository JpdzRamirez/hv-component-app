<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresentationController;


Route::middleware(['CaptureSessionData'])
    ->group(function () {
        Route::get('/', [PresentationController::class, 'welcome'])->name('home');
        Route::get('/dashboard', function () {
            return view('layouts.base');
        })->name('dashboard');
        Route::get('/register', function () {
            return view('layouts.base');
        })->name('profile.create');
        Route::get('/presentation/{presentationID?}', function ($presentationID) {
            return view('layouts.base',compact('presentationID'));
        })->name('profile.update');
        Route::get('/not-found', [PresentationController::class, 'notFound'])->name('not.found');
        Route::get('/contact', [PresentationController::class, 'contact'])->name('contact');
    });

// Ruta catch-all para redirigir al home si no se encuentra la ruta especificada
Route::fallback(function () {
    return redirect()->route('home');
});
