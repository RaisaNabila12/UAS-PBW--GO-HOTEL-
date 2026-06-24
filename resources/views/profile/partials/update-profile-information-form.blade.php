<section>
    <header class="mb-6">
        <h2 class="text-lg font-medium text-white">
            {{ __('Informasi Profil') }}
        </h2>
        <p class="mt-1 text-sm text-slate-400">
            {{ __("Perbarui informasi profil akun dan alamat email Anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Input Nama -->
        <div>
            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2.5" for="name">Nama Lengkap</label>
            <input id="name" name="name" type="text" required autofocus autocomplete="name" value="{{ old('name', $user->name) }}"
                class="w-full bg-slate-950 border border-white/10 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-blue-500 transition text-base shadow-inner">
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Input Email -->
        <div>
            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2.5" for="email">Alamat Email</label>
            <input id="email" name="email" type="email" required autocomplete="username" value="{{ old('email', $user->email) }}"
                class="w-full bg-slate-950 border border-white/10 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-blue-500 transition text-base shadow-inner">
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3">
                    <p class="text-sm text-slate-300">
                        {{ __('Alamat email Anda belum diverifikasi.') }}
                        <button form="send-verification" class="underline text-sm text-blue-400 hover:text-blue-300 rounded-md focus:outline-none">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>
                </div>
            @endif
        </div>

        <!-- Tombol Aksi Form Profil -->
        <div class="pt-4 flex justify-end space-x-3 border-t border-white/5 mt-8">
            <!-- Tombol Batal / Kembali ke Dashboard -->
            <a href="{{ route('dashboard') }}" 
                class="bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold py-3 px-7 rounded-xl transition duration-200 border border-white/5 text-base text-center shadow-md cursor-pointer select-none">
                Batal
            </a>
            
            <!-- Tombol Simpan -->
            <button type="submit" 
                class="bg-gradient-to-r from-blue-600 to-sky-500 hover:opacity-90 text-white font-semibold py-3 px-7 rounded-xl transition duration-200 shadow-lg text-base cursor-pointer select-none">
                Simpan Perubahan
            </button>
        </div>
    </form>
</section>