<section>
    <header class="mb-6">
        <h2 class="text-lg font-medium text-white">
            {{ __('Perbarui Kata Sandi') }}
        </h2>
        <p class="mt-1 text-sm text-slate-400">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Password Saat Ini -->
        <div>
            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2.5" for="update_password_current_password">Kata Sandi Saat Ini</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password"
                class="w-full bg-slate-950 border border-white/10 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-blue-500 transition text-base shadow-inner">
            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('current_password')" />
        </div>

        <!-- Password Baru -->
        <div>
            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2.5" for="update_password_password">Kata Sandi Baru</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password"
                class="w-full bg-slate-950 border border-white/10 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-blue-500 transition text-base shadow-inner">
            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password')" />
        </div>

        <!-- Konfirmasi Password -->
        <div>
            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2.5" for="update_password_password_confirmation">Konfirmasi Kata Sandi Baru</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                class="w-full bg-slate-950 border border-white/10 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-blue-500 transition text-base shadow-inner">
            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password_confirmation')" />
        </div>

        <!-- Tombol Aksi Form Password -->
        <div class="pt-4 flex justify-end space-x-3 border-t border-white/5 mt-8">
            <a href="{{ route('dashboard') }}" 
                class="bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold py-3 px-7 rounded-xl transition duration-200 border border-white/5 text-base text-center shadow-md cursor-pointer select-none">
                Batal
            </a>
            
            <button type="submit" 
                class="bg-gradient-to-r from-blue-600 to-sky-500 hover:opacity-90 text-white font-semibold py-3 px-7 rounded-xl transition duration-200 shadow-lg text-base cursor-pointer select-none">
                Perbarui Sandi
            </button>
        </div>
    </form>
</section>