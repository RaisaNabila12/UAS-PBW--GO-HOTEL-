<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Kamar Hotel') }}
            </h2>
            <!-- Tombol Tambah Kamar yang ditaruh di slot header yang aman -->
            <!-- Menggunakan inline style manual agar pasti berwarna biru dan terlihat -->
<a href="{{ route('admin.rooms.create') }}" style="background-color: #2563eb; color: white; font-weight: bold; padding: 8px 16px; rounded-radius: 4px; text-decoration: none; display: inline-block; border-radius: 6px; font-size: 14px;">
    + Tambah Kamar Baru
</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Notifikasi Sukses -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="py-3 px-4 font-semibold text-sm text-gray-700">Foto</th>
                            <th class="py-3 px-4 font-semibold text-sm text-gray-700">Nama Kamar</th>
                            <th class="py-3 px-4 font-semibold text-sm text-gray-700">Tipe</th>
                            <th class="py-3 px-4 font-semibold text-sm text-gray-700">Harga / Malam</th>
                            <th class="py-3 px-4 font-semibold text-sm text-gray-700">Status</th>
                            <th class="py-3 px-4 font-semibold text-sm text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rooms as $room)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">
                                    @if($room->foto)
                                        <img src="{{ asset('storage/' . $room->foto) }}" class="w-20 h-12 object-cover rounded">
                                    @else
                                        <span class="text-gray-400 text-xs">No Photo</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-sm text-gray-900 font-medium">{{ $room->nama_kamar }}</td>
                                <td class="py-3 px-4 text-sm text-gray-600">{{ $room->tipe_kamar }}</td>
                                <td class="py-3 px-4 text-sm text-gray-600">Rp {{ number_format($room->harga, 0, ',', '.') }}</td>
                                <td class="py-3 px-4">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $room->status == 'tersedia' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ ucfirst($room->status) }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-sm flex space-x-2">
                                    <a href="{{ route('admin.rooms.edit', $room->id) }}" class="text-amber-600 hover:text-amber-900 font-semibold">Edit</a>
                                    <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kamar ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-6 text-center text-gray-500 text-sm">Belum ada data kamar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>