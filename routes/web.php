<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TahunAkademikController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\SpesialisasiDosenController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

/* Route::middleware(['auth'])->group(function () {
    Route::resource('user', UserController::class)->except(['show']);
}); */

Route::get('/', function () {return view('welcome');});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('tahun_akademik', TahunAkademikController::class);
Route::resource('program_studi', ProgramStudiController::class);
Route::resource('spesialisasi_dosen', SpesialisasiDosenController::class);
Route::resource('dosen', DosenController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('user', UserController::class);
// Route::resource('admin', AdminController::class);
