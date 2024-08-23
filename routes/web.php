<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('/general', 'general')
    ->middleware(['auth', 'verified'])
    ->name('baseGeneral');

Route::view('/saldos', 'saldos')
    ->middleware(['auth', 'verified'])
    ->name('saldos');

Route::view('/invitado', 'layouts.invitado')
    ->name('invitado');

Route::view('/users', 'users')
    ->middleware(['auth', 'verified'])
    ->name('users');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
