<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Exports\PddiktiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\PddiktiController;
use App\Http\Controllers\ImportHistoryController;

Route::get('/', [PddiktiController::class, 'index'])->middleware(['auth', 'verified'])->name('pddikti.index');
Route::get('/pddikti/export', [PddiktiController::class, 'export'])->name('pddikti.export');
Route::post('/import-pddikti', [PddiktiController::class, 'import'])->name('pddikti.import');
Route::get('/import-pddikti', [PddiktiController::class, 'showImportForm'])->name('pddikti.showImportForm');
Route::get('/mahasiswa/search', [PddiktiController::class, 'index'])->name('mahasiswa.search');
Route::get('/mahasiswa/{id_pd}', [PddiktiController::class, 'show'])->name('mahasiswa.show');
Route::get('/import-history', [ImportHistoryController::class, 'index']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__ . '/auth.php';
