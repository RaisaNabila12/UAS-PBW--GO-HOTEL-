<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Tambah Kamar Baru') }}
        </h2>
    </x-slot>

    <div class="py-6 flex justify-center">
        <!-- Card Box Utama Form dengan Gaya Glassmorphism -->
        <div class="max-w-xl w-full bg-slate-900/40 backdrop-blur-md border border-white/5 rounded-2xl p-8 shadow-2xl">
            
            <!-- Notifikasi Jika Ada Validasi Input yang Salah -->
            @if($errors->any())
                <div class="mb-4 bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded-xl backdrop-blur-md">
                    <ul class="list-disc pl-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Pengiriman Data dengan Dukungan Upload File (enctype) -->
            <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Input Nama Kamar -->
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2.5">Nama Kamar</label>
                    <input type="text" name="nama_kamar" placeholder="Contoh: Lavender, Tulip" required value="{{ old('nama_kamar') }}"
                        class="w-full bg-slate-950 border border-white/10 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-blue-500 transition text-base placeholder:text-slate-600 shadow-inner">
                </div>

                <!-- Input Tipe Kamar -->
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2.5">Tipe Kamar</label>
                    <select name="tipe_kamar" required 
                        class="w-full bg-slate-950 border border-white/10 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-blue-500 transition text-base shadow-inner appearance-none">
                        <option value="Standard" {{ old('tipe_kamar') == 'Standard' ? 'selected' : '' }}>Standard Room</option>
                        <option value="Deluxe" {{ old('tipe_kamar') == 'Deluxe' ? 'selected' : '' }}>Deluxe Room</option>
                        <option value="Suite" {{ old('tipe_kamar') == 'Suite' ? 'selected' : '' }}>Suite Room</option>
                    </select>
                </div>

                <!-- Input Harga per Malam -->
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2.5">Harga per Malam (Rp)</label>
                    <input type="number" name="harga" placeholder="Contoh: 400000" required value="{{ old('harga') }}"
                        class="w-full bg-slate-950 border border-white/10 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-blue-500 transition text-base placeholder:text-slate-600 shadow-inner">
                </div>

                <!-- Input Unggah Foto Kamar -->
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2.5">Foto Kamar</label>
                    <input type="file" name="foto" accept="image/*"
                        class="w-full bg-slate-950 border border-white/10 rounded-xl px-5 py-3.5 text-white focus:outline-none focus:border-blue-500 transition text-base file:mr-4 file:py-1.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-600/20 file:text-blue-300 hover:file:bg-blue-600/30 file:cursor-pointer shadow-inner">
                </div>

                <!-- Input Status Ketersediaan Kamar -->
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2.5">Status</label>
                    <select name="status" required 
                        class="w-full bg-slate-950 border border-white/10 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-blue-500 transition text-base shadow-inner">
                        <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="penuh" {{ old('status') == 'penuh' ? 'selected' : '' }}>Penuh / Dipesan</option>
                    </select>
                </div>

                <!-- TOMBOL AKSI: Proporsinya ikut disesuaikan agar serasi -->
                <div class="pt-4 flex justify-end space-x-3 border-t border-white/5 mt-8">
                    <!-- Tombol Batal -->
                    <a href="{{ route('admin.rooms.index') }}" 
                        class="bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold py-3 px-7 rounded-xl transition duration-200 border border-white/5 text-base text-center shadow-md cursor-pointer select-none">
                        Batal
                    </a>
                    
                    <!-- Tombol Simpan Kamar -->
                    <button type="submit" 
                        class="bg-gradient-to-r from-blue-600 to-sky-500 hover:opacity-90 text-white font-semibold py-3 px-7 rounded-xl transition duration-200 shadow-lg text-base cursor-pointer select-none">
                        Simpan Kamar
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>