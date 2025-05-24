<?php

use Laravel\Prompts\Table;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TabelmahasiswaController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {

    Route::middleware(['auth', 'HakAkses:superadmin'])->group(function () {

        Route::get('/', [TemplateController::class, 'template'])->name('template');

        Route::get('tabel-mahasiswa/create', [TabelmahasiswaController::class, 'create'])->name('createtabelmahasiswa');
        Route::post('/mahasiswa-store', [TabelmahasiswaController::class, 'store'])->name('mahasiswa.store');
        Route::delete('/mahasiswa/{id}', [TabelmahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
        Route::get('/mahasiswa/{id}/edit', [TabelmahasiswaController::class, 'edit'])->name('mahasiswa.edit');
        Route::put('/mahasiswa/{id}', [TabelmahasiswaController::class, 'update'])->name('mahasiswa.update');
    });

    Route::get('/tabel-mahasiswa', [TabelmahasiswaController::class, 'index'])->name('tabelmahasiswa');
    Route::post('/mahasiswa/import', [TabelmahasiswaController::class, 'import'])->name('mahasiswa.import');
    Route::get('/mahasiswa/export', [TabelmahasiswaController::class, 'export'])->name('mahasiswa.export');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
