<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Go-Hotel</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <style>
            @keyframes float-slow {
                0%, 100% { transform: translateY(0px) scale(1); }
                50% { transform: translateY(-20px) scale(1.05); }
            }
            .animate-glow-1 { animation: float-slow 8s ease-in-out infinite; }
            .animate-glow-2 { animation: float-slow 12s ease-in-out infinite; }
        </style>
    </head>
    <body class="font-sans antialiased bg-slate-950 text-white min-h-screen relative overflow-x-hidden">
        
        <div class="absolute top-0 left-[-10%] w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[120px] animate-glow-1 pointer-events-none z-0"></div>
        <div class="absolute bottom-0 right-[-10%] w-[500px] h-[500px] bg-emerald-600/10 rounded-full blur-[120px] animate-glow-2 pointer-events-none z-0"></div>
        <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:24px_24px] pointer-events-none z-0"></div>

        <div class="relative z-10 min-h-screen flex flex-col justify-between">
            <div>
                @include('layouts.navigation')

                @if (isset($header))
                    <header class="bg-slate-900/40 backdrop-blur-md border-b border-white/5 shadow-sm">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            <h2 class="font-bold text-xl text-white leading-tight">
                                {{ $header }}
                            </h2>
                        </div>
                    </header>
                @endif

                <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
                    <style>
                        .bg-white { 
                            background-color: rgba(15, 23, 42, 0.4) !important; 
                            backdrop-filter: blur(12px) !important;
                            border: 1px solid rgba(255, 255, 255, 0.05) !important;
                        }
                        .text-gray-900, .text-gray-800, .text-gray-700, .text-gray-600, .text-gray-500 { color: #f1f5f9 !important; }
                        tr, .bg-gray-50, .bg-gray-100 { background-color: transparent !important; }
                        tr:hover, .hover\:bg-gray-50:hover { background-color: rgba(51, 65, 85, 0.4) !important; transition: background-color 0.2s ease; }
                        .border-b, border-gray-100, border-gray-200, table border { border-color: rgba(255, 255, 255, 0.08) !important; }
                        input, select, textarea { background-color: rgba(15, 23, 42, 0.8) !important; border: 1px solid rgba(255, 255, 255, 0.1) !important; color: #ffffff !important; }
                        .bg-white button, .bg-white a { color: #ffffff !important; }
                        .bg-white button:hover, .bg-white a:hover { background-color: rgba(255, 255, 255, 0.1) !important; }
                    </style>

                    {{ $slot }}
                </main>
            </div>

            <footer class="bg-slate-950/80 backdrop-blur-md text-slate-500 text-center py-6 border-t border-white/5 text-sm w-full relative z-10">
                <p>&copy; 2026 Tugas Project UAS PBW. Developed with ❤️ using Laravel.</p>
            </footer>
        </div>
    </body>
</html>