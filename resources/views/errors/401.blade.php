<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>401 - Akses Ditolak | IAPI Korda Jawa Timur</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gradient-to-b from-gray-100 via-gray-50 to-white text-black">
    @include('layouts.navbar')

    <section class="max-w-7xl mx-auto px-6 lg:px-8 py-20 flex items-center justify-center min-h-screen">
        <div class="text-center">
            <div class="mx-auto w-32 h-32 flex items-center justify-center mb-6">
                <svg class="w-24 h-24 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M12 11v4M12 17h.01M7 11h10a2 2 0 012 2v6a2 2 0 01-2 2H7a2 2 0 01-2-2v-6a2 2 0 012-2z" />
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M7 11V7a5 5 0 115 5h-5z" />
                </svg>
            </div>

            <h1 class="text-6xl font-bold text-gray-700 mb-4">401</h1>
            <h2 class="text-xl font-semibold text-gray-600 mb-6">Akses Ditolak</h2>

            <p class="text-gray-500 mb-8 max-w-md mx-auto">
                Anda tidak memiliki izin untuk mengakses halaman ini. Silakan login atau hubungi administrator jika Anda
                yakin ini adalah kesalahan.
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
