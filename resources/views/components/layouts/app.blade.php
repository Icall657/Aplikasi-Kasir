<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KasirKu</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Import Iconly CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/iconly@2.0.0/dist/iconly.min.css">

    <!-- Optional: Tambahkan konfigurasi warna jika mau -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb', // biru untuk aksen
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 text-gray-800">
    <nav class="bg-white shadow-md border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="text-2xl font-semibold text-primary">KasirKu</div>

                <!-- Mobile menu button -->
                <div class="sm:hidden">
                    <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')"
                        class="text-gray-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden sm:flex space-x-6 items-center">
                    <a href="{{ route('home') }}"
                        class="hover:text-primary {{ request()->routeIs('home') ? 'text-primary font-semibold' : 'text-gray-600' }}">
                        Beranda
                    </a>
                    @if (Auth::user()->peran == 'Admin Aplikasi')
                        <a href="{{ route('user') }}"
                            class="hover:text-primary {{ request()->routeIs('user') ? 'text-primary font-semibold' : 'text-gray-600' }}">
                            Pengguna
                        </a>
                        <a href="{{ route('produk') }}"
                            class="hover:text-primary {{ request()->routeIs('produk') ? 'text-primary font-semibold' : 'text-gray-600' }}">
                            Produk
                        </a>
                    @endif
                    <a href="{{ route('transaksi') }}"
                        class="hover:text-primary {{ request()->routeIs('transaksi') ? 'text-primary font-semibold' : 'text-gray-600' }}">
                        Transaksi
                    </a>
                    <a href="{{ route('laporan') }}"
                        class="hover:text-primary {{ request()->routeIs('laporan') ? 'text-primary font-semibold' : 'text-gray-600' }}">
                        Laporan
                    </a>

                    @guest
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-primary">Login</a>
                        <a href="{{ route('register') }}" class="text-gray-600 hover:text-primary">Register</a>
                    @else
                        <div class="relative group">
                            <button class="text-gray-600 hover:text-primary font-medium">
                                {{ Auth::user()->peran }}
                            </button>
                            <div
                                class="absolute right-0 mt-2 w-32 bg-white shadow-md rounded-md hidden group-hover:block z-10">
                                <a href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="sm:hidden hidden px-4 pb-4 space-y-2">
            @if (Auth::user()->peran == 'Admin Aplikasi')
                <a href="{{ route('home') }}" class="block text-gray-700 hover:text-primary">Beranda</a>
                <a href="{{ route('user') }}" class="block text-gray-700 hover:text-primary">Pengguna</a>
                <a href="{{ route('produk') }}" class="block text-gray-700 hover:text-primary">Produk</a>
            @endif
            <a href="{{ route('transaksi') }}" class="block text-gray-700 hover:text-primary">Transaksi</a>
            <a href="{{ route('laporan') }}" class="block text-gray-700 hover:text-primary">Laporan</a>
            @guest
                <a href="{{ route('login') }}" class="block text-gray-700 hover:text-primary">Login</a>
                <a href="{{ route('register') }}" class="block text-gray-700 hover:text-primary">Register</a>
            @else
                <a href="{{ route('logout') }}" class="block text-gray-700 hover:text-primary"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            @endguest
        </div>
    </nav>

    <main class="py-6 px-4">
        {{ $slot }}
    </main>
</body>

</html>
