<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GO-Hotel - Temukan Kenyamanan Menginap Terbaik Anda</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Google Fonts (Plus Jakarta Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        /* Efek Grid Titik-Titik Sesuai Gambar Berwarna Biru Gelap */
        .bg-dots {
            background-image: radial-gradient(rgba(30, 41, 59, 0.5) 1.5px, transparent 1.5px);
            background-size: 24px 24px;
        }
    </style>
</head>
<body class="antialiased bg-slate-950 text-white min-h-screen relative overflow-x-hidden flex flex-col justify-between bg-dots">

    <!-- Efek Gradasi Pendaran Cahaya Biru di Background Belakang Teks & GH -->
    <div class="absolute top-[-20%] left-[-10%] w-[60vw] h-[60vw] rounded-full bg-blue-900/10 blur-[130px] pointer-events-none"></div>
    <div class="absolute top-[20%] right-[-10%] w-[50vw] h-[50vw] rounded-full bg-sky-500/10 blur-[130px] pointer-events-none"></div>

    <!-- ========================================== -->
    <!-- HEADER / NAVBAR ATAS                       -->
    <!-- ========================================== -->
    <header class="w-full max-w-7xl mx-auto px-6 py-6 flex justify-between items-center relative z-10">
        
        <!-- LOGO BARU: BERPENDARE & ADA ICON GEDUNG (SINKRON) -->
        <div class="flex items-center space-x-2 select-none group">
            <div class="bg-gradient-to-br from-blue-600 to-sky-500 p-2 rounded-xl shadow-lg shadow-blue-500/20 transform group-hover:scale-105 transition duration-300">
                <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            <span class="text-xl font-black tracking-wider bg-gradient-to-r from-white via-slate-200 to-slate-400 bg-clip-text text-transparent drop-shadow-[0_0_15px_rgba(59,130,246,0.3)]">
                GO-<span class="text-blue-400 drop-shadow-[0_0_20px_rgba(96,165,250,0.6)]">Hotel</span>
            </span>
        </div>

        <!-- Tombol Navigasi Kanan -->
        <nav class="flex items-center space-x-6">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-xl transition text-sm shadow-md">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-slate-300 hover:text-white font-medium text-sm transition">
                        Masuk (Login)
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-xl transition text-sm shadow-lg tracking-wide">
                            Daftar Akun
                        </a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>

    <!-- ========================================== -->
    <!-- HERO CONTENT (SISI KIRI & SISI KANAN)      -->
    <!-- ========================================== -->
    <main class="w-full max-w-7xl mx-auto px-6 my-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10 py-12">
        
        <!-- Sisi Kiri: Teks Headline dan Tombol Utama -->
        <div class="lg:col-span-7 space-y-6 text-left">
            <div class="inline-block bg-blue-950/60 border border-blue-500/20 text-blue-400 text-[11px] font-bold uppercase tracking-widest px-4 py-1.5 rounded-full backdrop-blur-sm">
                Aplikasi Reservasi Hotel Modern
            </div>

            <h1 class="text-4xl md:text-6xl font-black tracking-tight text-white leading-[1.1]">
                Temukan <br>
                Kenyamanan <br>
                Menginap Terbaik <br>
                Anda
            </h1>
            
            <p class="text-sm md:text-base text-slate-400 max-w-xl leading-relaxed font-medium">
                Nikmati pengalaman bermalam yang berkesan dengan sistem pemesanan kamar hotel yang cepat, aman, dan praktis. Akses pilihan kamar eksklusif dengan fasilitas premium secara real-time kapan pun Anda butuhkan.
            </p>

            <div class="pt-4 flex items-center space-x-4">
                <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-3.5 px-6 rounded-xl transition shadow-lg shadow-blue-600/20 text-sm flex items-center space-x-2">
                    <span>Mulai Pesan Kamar</span>
                    <span>➔</span>
                </a>
                <a href="{{ route('register') }}" class="bg-slate-900/60 hover:bg-slate-800/80 text-white font-bold py-3.5 px-6 rounded-xl transition border border-white/10 text-sm">
                    Buat Akun Baru
                </a>
            </div>
        </div>

        <!-- Sisi Kanan: Inisial Huruf GH Besar Sesuai Gambar -->
        <div class="lg:col-span-5 flex flex-col items-center justify-center relative select-none">
            <!-- Pendaran Biru khusus di belakang GH -->
            <div class="absolute w-72 h-72 rounded-full bg-cyan-500/10 blur-[80px] pointer-events-none"></div>
            
            <h2 class="text-[13rem] md:text-[16rem] font-black tracking-tighter leading-none bg-gradient-to-b from-white via-slate-100 to-slate-400/20 bg-clip-text text-transparent drop-shadow-2xl">
                GH
            </h2>

            <!-- Keterangan Badge di Bawah GH -->
            <div class="mt-2 bg-slate-900/60 border border-white/5 px-6 py-2 rounded-full text-[10px] tracking-widest uppercase font-bold text-slate-400 shadow-xl backdrop-blur-md">
                GO-Hotel
            </div>
        </div>

    </main>

    <!-- ========================================== -->
    <!-- FOOTER BAWAAN                              -->
    <!-- ========================================== -->
    <footer class="w-full text-center py-6 border-t border-white/5 text-[11px] text-slate-600 relative z-10">
        <p>© {{ date('Y') }} GO-Hotel Proyek UAS PBW. All Rights Reserved.</p>
    </footer>

</body>
</html>