<div class="max-w-6xl mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h4 class="text-xl font-semibold text-blue-700">Laporan Transaksi</h4>
        <button onclick="window.print()"
            class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded shadow">
            {{-- Iconly Print (SVG) --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                stroke-width="1.5" viewBox="0 0 24 24">
                <path d="M7 17v4h10v-4M17 7V3H7v4M5 11h14a2 2 0 012 2v6H3v-6a2 2 0 012-2z" />
            </svg>
            Print
        </button>
    </div>

    <div class="bg-white border border-blue-300 rounded shadow p-4 print:p-0 print:shadow-none print:border-0">
        <div class="overflow-x-auto">
            <table class="min-w-full border text-sm print:text-xs">
                <thead class="bg-blue-100 text-blue-800 print:bg-white print:text-black">
                    <tr>
                        <th class="border px-3 py-2 text-left">No</th>
                        <th class="border px-3 py-2 text-left">Tanggal</th>
                        <th class="border px-3 py-2 text-left">No Inv.</th>
                        <th class="border px-3 py-2 text-left">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semuaTransaksi as $transaksi)
                        <tr class="hover:bg-gray-50 print:hover:bg-white">
                            <td class="border px-3 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-3 py-2">{{ $transaksi->created_at }}</td>
                            <td class="border px-3 py-2">{{ $transaksi->kode }}</td>
                            <td class="border px-3 py-2 text-right">Rp {{ number_format($transaksi->total, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
