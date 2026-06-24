<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulir Reservasi Kamar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="border-r pr-6 hidden md:block">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Kamar yang Anda Pilih:</h3>
                    @if($room->foto)
                        <img src="{{ asset('storage/' . $room->foto) }}" class="w-full h-40 object-cover rounded mb-4">
                    @endif
                    <p class="text-xl font-semibold text-gray-800">{{ $room->nama_kamar }}</p>
                    <p class="text-gray-600 mb-2">Tipe: {{ $room->tipe_kamar }}</p>
                    <p class="text-lg font-bold text-blue-600">Rp {{ number_format($room->harga, 0, ',', '.') }} / malam</p>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Detail Pemesanan:</h3>
                    <form action="{{ route('booking.store', $room->id) }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Check-In</label>
                            <input type="date" name="tanggal_check_in" id="check_in" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                            @error('tanggal_check_in') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Check-Out</label>
                            <input type="date" name="tanggal_check_out" id="check_out" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                            @error('tanggal_check_out') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="bg-gray-50 p-4 rounded-md">
                            <p class="text-sm text-gray-600">Sistem akan menghitung otomatis total harga di database berdasarkan jumlah malam menginap Anda saat tombol simpan ditekan.</p>
                        </div>

                        <div class="flex justify-end space-x-2 pt-4">
                            <a href="{{ route('dashboard') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded text-sm">Batal</a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm shadow">Konfirmasi Booking</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
