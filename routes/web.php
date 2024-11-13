<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GoogleLoginController;

Route::get('/', [CategoriaController::class, 'index']);

Route::resource('categorias', CategoriaController::class);

Route::get('/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');


Route::get('/',function(){
    return view('login');
});