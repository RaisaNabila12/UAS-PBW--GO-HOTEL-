<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Riwayat Reservasi Kamar Hotel Anda') }}
        </h2>
    </x-slot>

    <div class="py-6">
        @if(session('success'))
            <div class="mb-4 bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded-xl backdrop-blur-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-white/10 bg-slate-900/50">
                        <th class="py-3 px-4 font-semibold text-sm text-slate-300">Foto</th>
                        <th class="py-3 px-4 font-semibold text-sm text-slate-300">Nama Kamar</th>
                        <th class="py-3 px-4 font-semibold text-sm text-slate-300">Tipe</th>
                        <th class="py-3 px-4 font-semibold text-sm text-slate-300">Harga / Malam</th>
                        <th class="py-3 px-4 font-semibold text-sm text-slate-300 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr class="border-b border-white/5 hover:bg-slate-800/30 transition">
                            <td class="py-3 px-4">
                                @if($booking->room && $booking->room->foto)
                                    <img src="{{ asset('storage/' . $booking->room->foto) }}" class="w-20 h-12 object-cover rounded-lg">
                                @else
                                    <span class="text-gray-500 text-xs">No Photo</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-sm font-medium text-white">
                                {{ $booking->room->nama_kamar ?? 'Kamar Telah Dihapus' }}
                            </td>
                            <td class="py-3 px-4 text-sm text-slate-300">
                                {{ $booking->room->tipe_kamar ?? '-' }}
                            </td>
                            <td class="py-3 px-4 text-sm text-blue-400 font-bold">
                                Rp {{ $booking->room ? number_format($booking->room->harga, 0, ',', '.') : '0' }}
                            </td>
                            <td class="py-3 px-4 text-center">
                                <form action="{{ route('booking.cancel', $booking->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pesanan kamar ini?')">
                                    @csrf
                                    <button type="submit" class="bg-red-600/80 hover:bg-red-600 text-white text-xs font-bold py-2 px-4 rounded-xl transition shadow-sm cursor-pointer">
                                        Batalkan Pesanan
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-400 text-sm">📭 Belum ada riwayat pemesanan kamar saat ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>