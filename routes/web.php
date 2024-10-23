<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PddiktiController;

// untuk ekspor pddikti ke excel
use App\Exports\PddiktiExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', [PddiktiController::class, 'index'])->name('pddikti.index');
Route::get('/pddikti/export', [PddiktiController::class, 'export'])->name('pddikti.export');
Route::post('/import-pddikti', [PddiktiController::class, 'import'])->name('pddikti.import');
Route::get('/import-pddikti', [PddiktiController::class, 'showImportForm'])->name('pddikti.showImportForm');
Route::get('/mahasiswa/search', [PddiktiController::class, 'index'])->name('mahasiswa.search');
Route::get('/mahasiswa/{id_pd}', [PddiktiController::class, 'show'])->name('mahasiswa.show');
