<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TahunAkademikController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\SpesialisasiDosenController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DosenDashboardController;
use App\Http\Controllers\MahasiswaDashboardController;
use App\Http\Controllers\UserController;

/* Route::middleware(['auth'])->group(function () {
    Route::resource('user', UserController::class)->except(['show']);
}); */

Route::get('/', function () {return view('welcome');});
Route::get('/admin', [AdminDashboardController::class, 'index'])->name('dashboard');
Route::resource('admin/tahun_akademik', TahunAkademikController::class);
Route::resource('admin/program_studi', ProgramStudiController::class);
Route::resource('admin/spesialisasi_dosen', SpesialisasiDosenController::class);
Route::resource('admin/dosen', DosenController::class);
Route::resource('admin/mahasiswa', MahasiswaController::class);
Route::resource('admin/user', UserController::class);
// Route::resource('admin', AdminController::class);
Route::get('/dosen', [DosenDashboardController::class, 'index'])->name('dashboard');

Route::get('/mahasiswa', [MahasiswaDashboardController::class, 'index'])->name('dashboard');