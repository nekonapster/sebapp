<?php

use App\Http\Controllers\BaseExportController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportExcelController;

Route::get('/', function () {
    return redirect()->route('login');
});

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

Route::view('/dangerZone', 'dangerZone')
    ->middleware([CheckRole::class, 'auth'])
    ->name('dangerZone');

    Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('/invitado', 'layouts.invitado')
    ->name('invitado');

    Route::post('/import-excel', [ImportExcelController::class, 'importExcel'])->name('import-excel');
    Route::get('export-saldos-excel', [ExportController::class, 'exportToExcel'])->name('export-saldos-excel');
    Route::get('export-saldos-pdf', [ExportController::class, 'exportToPdf'])->name('export-saldos-pdf');
    Route::get('export-base-excel', [BaseExportController::class, 'exportToExcel'])->name('export-base-excel');
    Route::get('export-base-pdf', [BaseExportController::class, 'exportToPdf'])->name('export-base-pdf');
    
require __DIR__ . '/auth.php';
