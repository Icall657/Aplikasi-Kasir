<div class="max-w-7xl mx-auto p-4">
    <!-- Tombol Transaksi -->
    <div class="flex gap-3 mb-4">
        @if (!$transaksiAktif)
            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
                wire:click='transaksiBaru'>Transaksi Baru</button>
        @else
            <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition"
                wire:click='batalTransaksi'>Batalkan Transaksi</button>
        @endif

        <button wire:loading class="px-4 py-2 bg-blue-300 text-white rounded">Loading ...</button>
    </div>

    @if ($transaksiAktif)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Panel Kiri - Daftar Produk -->
            <div class="md:col-span-2 space-y-4">
                <div class="bg-white border border-blue-300 rounded shadow p-4">
                    <h2 class="text-lg font-semibold mb-4">No Invoice: {{ $transaksiAktif->kode }}</h2>

                    <!-- Input Cari Produk -->
                    <input type="text" placeholder="Cari Nama Produk" wire:model.live='searchTerm'
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300" />

                    <!-- Hasil Pencarian -->
                    @if (!empty($searchResults))
                        <ul class="border rounded mt-2 max-h-48 overflow-y-auto bg-white shadow">
                            @foreach ($searchResults as $result)
                                <li wire:click="selectProduct('{{ $result->id }}')"
                                    class="px-4 py-2 hover:bg-blue-100 cursor-pointer border-b">
                                    {{ $result->nama }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <!-- Tabel Produk Dipilih -->
                    <div class="overflow-x-auto mt-4">
                        <table class="min-w-full border text-sm">
                            <thead class="bg-blue-100 text-blue-800">
                                <tr>
                                    <th class="border px-2 py-1">No</th>
                                    <th class="border px-2 py-1">Kode Barang</th>
                                    <th class="border px-2 py-1">Nama Barang</th>
                                    <th class="border px-2 py-1">Harga</th>
                                    <th class="border px-2 py-1">Qty</th>
                                    <th class="border px-2 py-1">Subtotal</th>
                                    <th class="border px-2 py-1">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaProduk as $produk)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border px-2 py-1">{{ $loop->iteration }}</td>
                                        <td class="border px-2 py-1">{{ $produk->produk->kode }}</td>
                                        <td class="border px-2 py-1">{{ $produk->produk->nama }}</td>
                                        <td class="border px-2 py-1">Rp{{ number_format($produk->produk->harga, 2, '.', '.') }}</td>
                                        <td class="border px-2 py-1">{{ $produk->jumlah }}</td>
                                        <td class="border px-2 py-1">Rp{{ number_format($produk->produk->harga * $produk->jumlah, 2, '.', '.') }}</td>
                                        <td class="border px-2 py-1">
                                            <button wire:click='hapusProduk({{ $produk->id }})'
                                                class="px-3 py-1 text-xs bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Panel Kanan - Pembayaran -->
            <div class="space-y-4">
                <!-- Total Biaya -->
                <div class="bg-white border border-blue-300 rounded shadow p-4">
                    <h2 class="text-lg font-semibold text-blue-700 mb-2">Total Biaya</h2>
                    <div class="flex justify-between text-lg font-bold text-gray-700">
                        <span>Rp</span>
                        <span>{{ number_format($totalSemuaBelanja, 2, '.', '.') }}</span>
                    </div>
                </div>

                <!-- Input Bayar -->
                <div class="bg-white border border-blue-300 rounded shadow p-4">
                    <h2 class="text-lg font-semibold text-blue-700 mb-2">Bayar</h2>
                    <input type="number" placeholder="Masukkan Nominal Bayar" wire:model.live='bayar'
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300" />
                </div>

                <!-- Kembalian -->
                <div class="bg-white border border-blue-300 rounded shadow p-4">
                    <h2 class="text-lg font-semibold text-blue-700 mb-2">Kembalian</h2>
                    <div class="flex justify-between text-lg font-bold text-gray-700">
                        <span>Rp</span>
                        <span>{{ number_format($kembalian, 2, '.', '.') }}</span>
                    </div>
                </div>

                <!-- Status Pembayaran -->
                @if ($bayar)
                    @if ($kembalian < 0)
                        <div class="bg-red-100 border border-red-500 text-red-700 px-4 py-2 rounded">Uang Kurang</div>
                    @elseif ($kembalian >= 0)
                        <button wire:click='transaksiSelesai'
                            class="w-full px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                            Bayar
                        </button>
                    @endif
                @endif
            </div>
        </div>
    @endif
</div>
