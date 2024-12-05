<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

// Routing untuk halaman utama
Route::get('/', [DosenController::class, 'index'])->name('home');

// Routing CRUD untuk Dosen
Route::resource('dosens', DosenController::class);

// Routing CRUD untuk Mahasiswa
Route::resource('mahasiswas', MahasiswaController::class);

Route::get('/dosens/{id}', [DosenController::class, 'show'])->name('dosens.show'); // Detail dosen
Route::get('/mahasiswas/{id}', [MahasiswaController::class, 'show'])->name('mahasiswas.show'); // Detail mahasiswa