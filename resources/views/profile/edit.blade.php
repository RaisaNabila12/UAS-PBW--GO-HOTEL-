<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Pengaturan Profil Akun Anda') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-2xl mx-auto px-4 space-y-8">
        
        @if (session('status') === 'profile-updated' || session('status') === 'password-updated')
            <div class="bg-green-500/20 border border-green-500 text-green-300 px-5 py-4 rounded-xl backdrop-blur-md text-sm">
                ✨ Perubahan profil Anda telah berhasil disimpan!
            </div>
        @endif

        <div class="p-8 bg-slate-900/40 backdrop-blur-md border border-white/5 rounded-2xl shadow-2xl transition duration-300 hover:border-blue-500/10">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-8 bg-slate-900/40 backdrop-blur-md border border-white/5 rounded-2xl shadow-2xl transition duration-300 hover:border-blue-500/10">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        @if (view()->exists('profile.partials.delete-user-form'))
            <div class="p-8 bg-slate-900/40 backdrop-blur-md border border-white/5 rounded-2xl shadow-2xl transition duration-300 hover:border-red-500/10">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        @endif

    </div>
</x-app-layout>