<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\EditRecipeController;
use App\Livewire\Comment;
use App\Livewire\EditRecipe;
use Illuminate\Support\Facades\Route;


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/edit/{id}', [EditRecipeController::class, 'edit'])->name('edit');





Route::view('display', 'display')
    ->middleware(['auth', 'verified'])
    ->name('display');

Route::view('favoris', 'favoris')
    ->middleware(['auth', 'verified'])
    ->name('favoris');

Route::get('/comments/{post}', [CommentController::class, 'index'])->name('comments');
    

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
