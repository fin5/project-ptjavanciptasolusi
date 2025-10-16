<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/data-master/user', [UserController::class, 'index'])->name('data.user');
Route::get('/data-master/barang', [BarangController::class, 'index'])->name('data.barang');
Route::get('/data-master/supplier', [SupplierController::class, 'index'])->name('data.supplier');
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
