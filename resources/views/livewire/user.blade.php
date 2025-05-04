<div class="max-w-6xl mx-auto p-4">
    <!-- Menu Tombol -->
    <div class="flex flex-wrap gap-3 mb-6">
        <button wire:click="pilihMenu('lihat')"
            class="px-4 py-2 rounded-md text-sm font-medium transition
                {{ $pilihanMenu == 'lihat' ? 'bg-blue-600 text-white' : 'border border-blue-600 text-blue-600 hover:bg-blue-100' }}">
            Semua Pengguna
        </button>

        <button wire:click="pilihMenu('tambah')"
            class="px-4 py-2 rounded-md text-sm font-medium transition
                {{ $pilihanMenu == 'tambah' ? 'bg-blue-600 text-white' : 'border border-blue-600 text-blue-600 hover:bg-blue-100' }}">
            Tambah Pengguna
        </button>

        <button wire:loading class="px-4 py-2 bg-blue-300 text-white rounded-md text-sm">
            Loading ...
        </button>
    </div>

    <!-- Konten Dinamis -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        @if ($pilihanMenu == 'lihat')
            <div class="p-4 border-b text-lg font-semibold text-blue-700">Semua Pengguna</div>
            <div class="overflow-x-auto p-4">
                <table class="min-w-full text-sm text-left border">
                    <thead class="bg-blue-50 text-blue-700 uppercase">
                        <tr>
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Peran</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($semuaPengguna as $pengguna)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 border">{{ $pengguna->name }}</td>
                                <td class="px-4 py-2 border">{{ $pengguna->email }}</td>
                                <td class="px-4 py-2 border">{{ $pengguna->peran }}</td>
                                <td class="px-4 py-2 border space-x-2">
                                    <button wire:click="pilihEdit({{ $pengguna->id }})"
                                        class="px-3 py-1 text-sm border border-blue-600 text-blue-600 rounded hover:bg-blue-50">
                                        Edit
                                    </button>
                                    <button wire:click="pilihHapus({{ $pengguna->id }})"
                                        class="px-3 py-1 text-sm border border-red-600 text-red-600 rounded hover:bg-red-50">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @elseif (in_array($pilihanMenu, ['tambah', 'edit']))
            <div class="p-4 border-b text-lg font-semibold text-blue-700">
                {{ $pilihanMenu == 'tambah' ? 'Tambah Pengguna' : 'Edit Pengguna' }}
            </div>
            <div class="p-4">
                <form wire:submit.prevent="{{ $pilihanMenu == 'tambah' ? 'simpan' : 'simpanEdit' }}" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium">Nama</label>
                        <input type="text" wire:model='nama'
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" />
                        @error('nama') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Email</label>
                        <input type="email" wire:model='email'
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" />
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Password</label>
                        <input type="password" wire:model='password'
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" />
                        @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Level</label>
                        <select wire:model="peran"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                            <option value="">-- Pilih Level --</option>
                            <option value="Kasir">Kasir</option>
                            <option value="Admin Aplikasi">Admin</option>
                        </select>
                        @error('peran') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="pt-4 flex gap-2">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Simpan</button>
                        @if($pilihanMenu == 'edit')
                            <button type="button" wire:click='batal'
                                class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Batal</button>
                        @endif
                    </div>
                </form>
            </div>

        @elseif ($pilihanMenu == 'hapus')
            <div class="p-4 border-b bg-red-600 text-white text-lg font-semibold">Konfirmasi Hapus</div>
            <div class="p-4">
                <p class="mb-4 text-gray-800">Anda yakin ingin menghapus pengguna ini?</p>
                <div class="flex gap-2">
                    <button wire:click='hapus'
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Hapus</button>
                    <button wire:click='batal'
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Batal</button>
                </div>
            </div>
        @endif
    </div>
</div>
