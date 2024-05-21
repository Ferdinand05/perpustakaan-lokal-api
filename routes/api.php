<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// buku
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');


// Kategori Buku
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
