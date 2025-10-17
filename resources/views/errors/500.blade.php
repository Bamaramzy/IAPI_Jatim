<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>500 - Kesalahan Server Internal | IAPI Korda Jawa Timur</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gradient-to-b from-gray-100 via-gray-50 to-white text-black">
    @include('layouts.navbar')

    <section class="max-w-7xl mx-auto px-6 lg:px-8 py-20 flex items-center justify-center min-h-screen">
        <div class="text-center">
            <div class="mx-auto w-32 h-32 flex items-center justify-center mb-6">
                <svg class="w-24 h-24 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M17 17h2a2 2 0 002-2V9a2 2 0 00-2-2h-4l-4-4H5a2 2 0 00-2 2v6a2 2 0 002 2h2" />
                </svg>
            </div>

            <h1 class="text-6xl font-bold text-gray-700 mb-4">500</h1>
            <h2 class="text-xl font-semibold text-gray-600 mb-6">Kesalahan Server Internal</h2>

            <p class="text-gray-500 mb-8 max-w-md mx-auto">
                Terjadi kesalahan pada server. Tim kami sedang bekerja untuk menyelesaikannya. Silakan coba lagi nanti
                atau hubungi administrator jika masalah berlanjut.
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
