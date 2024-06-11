<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// buku
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show');

// Untuk yang sudah Login
Route::middleware('auth:sanctum')->group(function () {
    // buku
    Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
    Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');



    // auth : logout
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


// Kategori Buku
// Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::apiResource('kategori', KategoriController::class);


Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
