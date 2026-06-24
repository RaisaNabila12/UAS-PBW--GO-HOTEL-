<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Daftar Kamar Hotel Tersedia') }}
        </h2>
    </x-slot>

    <div class="py-6" x-data="{ openModal: false, activeRoomId: null, activeRoomName: '' }">
        
        @if(session('success'))
            <div class="mb-6 bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded-xl backdrop-blur-md text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded-xl backdrop-blur-md">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($rooms as $room)
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-white/5 flex flex-col justify-between group transition duration-300 hover:border-blue-500/30">
                    
                    <div>
                        <div class="relative overflow-hidden aspect-video bg-slate-900">
                            @if($room->foto)
                                <img src="{{ asset('storage/' . $room->foto) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <div class="w-full h-full bg-slate-800 flex items-center justify-center text-slate-500 text-sm">📸 No Photo</div>
                            @endif
                            <span class="absolute top-3 right-3 bg-slate-900/80 backdrop-blur-md text-blue-300 text-xs font-semibold px-3 py-1 rounded-full border border-white/10">
                                {{ $room->tipe_kamar }}
                            </span>
                        </div>

                        <div class="p-5 space-y-2">
                            <h3 class="text-xl font-bold text-white tracking-tight">{{ $room->nama_kamar }}</h3>
                            <div class="flex items-baseline space-x-1">
                                <span class="text-2xl font-black text-blue-400">Rp {{ number_format($room->harga, 0, ',', '.') }}</span>
                                <span class="text-sm text-slate-400">/ malam</span>
                            </div>
                        </div>
                    </div>

                    <div class="px-5 pb-5 pt-2">
                        @if(Auth::user()->role === 'admin')
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.rooms.index') }}" class="w-full bg-slate-800 hover:bg-slate-700 text-blue-300 text-sm font-bold py-3 px-4 rounded-xl text-center border border-white/10 transition block shadow-sm">
                                    Kelola Data Kamar ➔
                                </a>
                            </div>
                        @else
                            <button type="button" @click="openModal = true; activeRoomId = '{{ $room->id }}'; activeRoomName = '{{ $room->nama_kamar }}'" class="w-full bg-gradient-to-r from-blue-600 to-sky-500 hover:opacity-90 text-white font-bold py-3 px-4 rounded-xl transition text-center shadow-lg tracking-wide cursor-pointer select-none">
                                Pesan Kamar Sekarang
                            </button>
                        @endif
                    </div>

                </div>
            @empty
                <div class="col-span-full bg-slate-900/40 backdrop-blur-md rounded-2xl p-12 text-center border border-white/5 text-slate-400">
                    <p class="text-lg font-medium text-white">🛏️ Maaf, semua kamar penuh atau tidak tersedia.</p>
                </div>
            @endforelse
        </div>

        <div x-show="openModal" class="fixed inset-0 z-50 flex items-center justify-center p-4" x-transition style="display: none;">
            <div class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm" @click="openModal = false"></div>

            <div class="bg-slate-900 border border-white/10 rounded-2xl shadow-2xl max-w-md w-full p-6 relative z-10 text-white" @click.stop>
                <div class="flex justify-between items-center border-b border-white/10 pb-3 mb-4">
                    <h3 class="text-lg font-bold text-white">
                        Tentukan Tanggal Menginap
                    </h3>
                    <button type="button" @click="openModal = false" class="text-slate-400 hover:text-white text-xl font-bold">&times;</button>
                </div>

                <p class="text-sm text-slate-300 mb-4">
                    Anda akan memesan: <span class="font-bold text-blue-400" x-text="activeRoomName"></span>
                </p>

                <form :action="'/booking/store/' + activeRoomId" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Tanggal Check-In</label>
                        <input type="date" name="tanggal_check_in" required min="{{ date('Y-m-d') }}" class="w-full bg-slate-950 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Tanggal Check-Out</label>
                        <input type="date" name="tanggal_check_out" required min="{{ date('Y-m-d', strtotime('+1 day')) }}" class="w-full bg-slate-950 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition">
                    </div>

                    <div class="pt-2 flex space-x-3">
                        <button type="button" @click="openModal = false" class="w-1/2 bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold py-3 rounded-xl transition text-center border border-white/5 text-sm">
                            Batal
                        </button>
                        <button type="submit" class="w-1/2 bg-gradient-to-r from-blue-600 to-sky-500 hover:opacity-90 text-white font-bold py-3 rounded-xl transition text-center shadow-md text-sm">
                            Konfirmasi Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>