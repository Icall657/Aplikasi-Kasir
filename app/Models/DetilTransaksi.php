<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;

class DetilTransaksi extends Model
{
    protected $fillable = ['transaksi_id', 'produk_id', 'jumlah'];

    public function transaksi(){
        return $this->belongsTo(Transaksi::class);
    }

    public function produk(){
        return $this->belongsTo(Produk::class);
    }
}
