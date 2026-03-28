<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ProdukController::class, 'index']);

Route::get('/produk/tambah', [ProdukController::class, 'create']);
Route::post('/produk/simpan', [ProdukController::class, 'store']);

Route::get('/produk/edit/{id}', [ProdukController::class, 'edit']);
Route::post('/produk/update/{id}', [ProdukController::class, 'update']);

Route::get('/produk/hapus/{id}', [ProdukController::class, 'destroy']);
