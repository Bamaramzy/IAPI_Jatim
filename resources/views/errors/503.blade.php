<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>503 - Layanan Tidak Tersedia | IAPI Korda Jawa Timur</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gradient-to-b from-gray-100 via-gray-50 to-white text-black">
    @include('layouts.navbar')

    <section class="max-w-7xl mx-auto px-6 lg:px-8 py-20 flex items-center justify-center min-h-screen">
        <div class="text-center">
            <div class="mx-auto w-32 h-32 flex items-center justify-center mb-6">
                <svg class="w-24 h-24 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8v4m0 4h.01M12 8a1 1 0 100 2 1 1 0 000-2zm0 8a1 1 0 100 2 1 1 0 000-2zm0-12a9 9 0 110 18 9 9 0 010-18z" />
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M12 2v2m0 14v2" />
                </svg>
            </div>

            <h1 class="text-6xl font-bold text-gray-700 mb-4">503</h1>
            <h2 class="text-xl font-semibold text-gray-600 mb-6">Layanan Tidak Tersedia</h2>

            <p class="text-gray-500 mb-8 max-w-md mx-auto">
                Layanan saat ini tidak tersedia karena pemeliharaan atau beban server yang tinggi. Silakan coba lagi
                nanti.
            </p>

            <a href="{{ route('welcome') }}"
                class="inline-block px-6 py-3 bg-[#071225] text-white font-semibold rounded-lg shadow-md hover:bg-[#0C2C77] transition-colors">
                Kembali ke Beranda
            </a>
        </div>
    </section>

    @include('layouts.mitra')
    @include('layouts.footer')
</body>

</html>
