<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use App\Imports\ProveedorImport;

Route::get('/', function () {
    return redirect()->route('login');
});

// Route::get('/import-excel', [ProveedorImport::class, 'import-excel']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('profile', 'profile')->name('profile');
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/general', 'general')->name('baseGeneral');
    Route::view('/saldos', 'saldos')->name('saldos');
});

// si el rol no es admin, no se puede entrar a users
Route::view('/users', 'users')
    ->middleware([CheckRole::class, 'auth'])
    ->name('users');

    Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('/invitado', 'layouts.invitado')
    ->name('invitado');

    Route::get('export-excel', [ExportController::class, 'exportToExcel'])->name('export-excel');
    Route::get('export-pdf', [ExportController::class, 'exportToPdf'])->name('export-pdf');

require __DIR__ . '/auth.php';
