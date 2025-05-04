<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;

class Beranda extends Component
{
    public $jumlahProduk;
    public $jumlahTransaksi;
    public $jumlahPengguna;

    public function mount()
    {
        $this->jumlahProduk = Produk::count();
        $this->jumlahTransaksi = Transaksi::count();
        $this->jumlahPengguna = User::count();
    }

    public function render()
    {
        return view('livewire.beranda');
    }
}
