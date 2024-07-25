<?php

use Illuminate\Support\Facades\Route;


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('add', 'add')
    ->middleware(['auth', 'verified'])
    ->name('add');

Route::view('display', 'display')
    ->middleware(['auth', 'verified'])
    ->name('display');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
