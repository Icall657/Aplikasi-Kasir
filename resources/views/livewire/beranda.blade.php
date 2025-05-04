<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
    <!-- Card Total Produk -->
    <div class="bg-white p-6 rounded-lg shadow-lg text-center border border-gray-200 hover:shadow-2xl hover:scale-105 transition-all duration-300">
        <div class="text-4xl text-blue-600 mb-4">
            <!-- Iconly Icon for Total Produk -->
            <i class="iconly iconly-briefcase-bold"></i>
        </div>
        <h5 class="text-lg font-semibold text-gray-700">Total Produk</h5>
        <p class="text-2xl text-gray-900">{{ $jumlahProduk }}</p>
    </div>

    <!-- Card Total Transaksi -->
    <div class="bg-white p-6 rounded-lg shadow-lg text-center border border-gray-200 hover:shadow-2xl hover:scale-105 transition-all duration-300">
        <div class="text-4xl text-green-600 mb-4">
            <!-- Iconly Icon for Total Transaksi -->
            <i class="iconly iconly-cart-bold"></i>
        </div>
        <h5 class="text-lg font-semibold text-gray-700">Total Transaksi</h5>
        <p class="text-2xl text-gray-900">{{ $jumlahTransaksi }}</p>
    </div>

    <!-- Card Total Pengguna -->
    <div class="bg-white p-6 rounded-lg shadow-lg text-center border border-gray-200 hover:shadow-2xl hover:scale-105 transition-all duration-300">
        <div class="text-4xl text-orange-600 mb-4">
            <!-- Iconly Icon for Total Pengguna -->
            <i class="iconly iconly-user-bold"></i>
        </div>
        <h5 class="text-lg font-semibold text-gray-700">Total Pengguna</h5>
        <p class="text-2xl text-gray-900">{{ $jumlahPengguna }}</p>
    </div>
</div>

