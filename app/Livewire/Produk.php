<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produk as ModelProduk;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Produk as ImporProduk;

class Produk extends Component
{
    use WithFileUploads;
    public $pilihanMenu = 'lihat';
    public $nama;
    public $kode;
    public $harga;
    public $stok;
    public $produkTerpilih;
    public $fileExcel;

    public function mount()
    {
        if (auth()->user()->peran != 'Admin Aplikasi') {
            abort(403);
        }
    }
    
    public function pilihEdit($id)
    {
        $this->produkTerpilih = ModelProduk::find($id);
        $this->nama = $this->produkTerpilih->nama;
        $this->kode = $this->produkTerpilih->kode;
        $this->harga = $this->produkTerpilih->harga;
        $this->stok = $this->produkTerpilih->stok;
        $this->pilihanMenu = 'edit';
    }

    public function simpanEdit()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'kode' => ['required', 'unique:produks,kode,'.$this->produkTerpilih->id],
            'stok' => 'required',
            'harga' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'kode.required' => 'Kode wajib diisi.',
            'kode.unique' => 'Kode ini sudah digunakan.',
            'stok.required' => 'Stok wajib diisi.',
            'harga.required' => 'harga wajib diisi.',
        ]);

        $simpan = $this->produkTerpilih;
        $simpan->nama = $this->nama;
        $simpan->kode = $this->kode;
        $simpan->stok = $this->stok;
        $simpan->harga = $this->harga;
        $simpan->save();

        $this->reset();

        session()->flash('message', 'Data pengguna berhasil disimpan.');

        $this->pilihanMenu = 'lihat';
    }

    public function pilihHapus($id)
    {
        $this->produkTerpilih = ModelProduk::find($id);
        $this->pilihanMenu = 'hapus';
    }


    public function hapus()
    {
        $this->produkTerpilih->delete();
        $this->reset();
    }

    public function batal()
    {
        $this->reset();
    }

    public function simpan()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|unique:produks,kode',
            'stok' => 'required',
            'harga' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'kode.required' => 'Kode wajib diisi.',
            'kode.unique' => 'Kode ini sudah digunakan.',
            'stok.required' => 'Stok wajib diisi.',
            'harga.required' => 'harga wajib diisi.',
        ]);

        $simpan = new ModelProduk();
        $simpan->nama = $this->nama;
        $simpan->kode = $this->kode;
        $simpan->stok = $this->stok;
        $simpan->harga = $this->harga;
        $simpan->save();

        $this->reset(['nama', 'kode', 'stok', 'harga']);

        session()->flash('message', 'Data pengguna berhasil disimpan.');

        $this->pilihanMenu = 'lihat';
    }

    public function pilihMenu($menu)
    {
        $this->pilihanMenu = $menu;
    }

    public function importExcel()
    {
        Excel::import(new ImporProduk, $this->fileExcel);
        $this->reset();
    }
    public function render()
    {
        return view('livewire.produk')->with([
            'semuaProduk' => ModelProduk::all(),
        ]);
    }
}
