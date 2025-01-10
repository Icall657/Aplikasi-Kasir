<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Beranda;
use App\Livewire\Laporan;
use App\Livewire\Produk;
use App\Livewire\Transaksi;
use App\Livewire\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', Beranda::class)->name('home');
    Route::get('/laporan', Laporan::class)->name('laporan');
    Route::get('/produk', Produk::class)->name('produk');
    Route::get('/transaksi', Transaksi::class)->name('transaksi');
    Route::get('/user', User::class)->name('user');
});