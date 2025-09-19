<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>IAPI - Korda Jawa Timur</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gradient-to-b from-gray-100 to-white text-black">
    @include('layouts.navbar')

    {{-- Hero --}}
    <section class="max-w-7xl mx-auto px-6 lg:px-8 py-12 lg:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div class="pr-0 lg:pr-12">
                <h1 class="text-3xl lg:text-4xl font-extrabold tracking-tight">
                    INSTITUT AKUNTAN PUBLIK INDONESIA
                </h1>
                <h3 class="text-xl lg:text-2xl font-semibold mt-1">KORDA JAWA TIMUR</h3>
                <p class="mt-6 text-gray-500 max-w-xl">BLa Bla Bla</p>
            </div>

            <div class="flex justify-end">
                <div class="w-full max-w-md lg:max-w-lg">
                    <img src="{{ asset('images/tengkorak.png') }}" alt="hero"
                        class="w-full rounded-[18px] object-cover shadow-[0_10px_30px_rgba(0,0,0,0.12)]">
                </div>
            </div>
        </div>
    </section>

    {{-- INFORMASI --}}
    <section class="py-12">
        <h2 class="text-2xl font-bold text-center mb-6">INFORMASI</h2>

        <div class="flex justify-center gap-6">
            @forelse($informasis as $info)
                <div class="w-64 bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/' . $info->gambar) }}" alt="{{ $info->judul }}"
                        class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $info->judul }}</h3>
                        @if ($info->link)
                            <a href="{{ $info->link }}" target="_blank" class="text-blue-600 hover:underline text-sm">
                                Selengkapnya
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-gray-500 italic">Belum ada informasi tersedia.</p>
            @endforelse
        </div>
    </section>

    {{-- Hubungi Kami --}}
    <section class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
        <h2 class="text-3xl font-bold text-center mb-8">Hubungi Kami</h2>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            {{-- Map Section (2 columns on large screens) --}}
            <div class="lg:col-span-2">
                <div class="rounded-lg overflow-hidden h-56 lg:h-72">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.5678032036744!2d112.7663188!3d-7.2899137000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa4b9b86e0ad%3A0x5a374e985c610881!2sGraha%20Widya%20Bhakti!5e0!3m2!1sid!2sid!4v1758182495300!5m2!1sid!2sid"
                        class="w-full h-full border-0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            {{-- Contact card --}}
            <div class="bg-gray-100 rounded-lg p-6">
                <div class="text-sm text-gray-600 space-y-3">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 shrink-0 text-gray-500" viewBox="0 0 24 24" fill="none">
                            <path d="M3 6h18" stroke="currentColor" />
                        </svg>
                        <div>
                            <div class="text-xs font-semibold">Phone</div>
                            <div class="text-sm text-gray-700">13456789</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 shrink-0 text-gray-500" viewBox="0 0 24 24" fill="none">
                            <path d="M3 6h18" stroke="currentColor" />
                        </svg>
                        <div>
                            <div class="text-xs font-semibold">Email</div>
                            <div class="text-sm text-gray-700">contoh@blabla.com</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 shrink-0 text-gray-500" viewBox="0 0 24 24" fill="none">
                            <path d="M3 6h18" stroke="currentColor" />
                        </svg>
                        <div>
                            <div class="text-xs font-semibold">Alamat</div>
                            <div class="text-sm text-gray-700">
                                jl. bla bla<br>
                                Surabaya<br>
                                Jawa Timur
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 shrink-0 text-gray-500" viewBox="0 0 24 24" fill="none">
                            <path d="M3 6h18" stroke="currentColor" />
                        </svg>
                        <div>
                            <div class="text-xs font-semibold">Jam Operasional</div>
                            <div class="text-sm text-gray-700">00.00 - 00.00</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Mitra --}}
    <section class="max-w-7xl mx-auto px-6 lg:px-8 py-8">
        <h2 class="text-2xl font-bold text-center mb-6">Mitra</h2>

        <div class="flex gap-4 items-center justify-center flex-wrap">
            {{-- contoh logo; taruh file logo di public/images/mitra/ --}}
            @php
                $partners = ['mitra-ifac.png', 'mitra-bi.png', 'mitra-kemenkeu.png', 'mitra-ojk.png'];
            @endphp

            @foreach ($partners as $logo)
                <div class="border rounded-lg px-4 py-3 bg-white shadow-sm">
                    <img src="{{ asset('images/mitra/' . $logo) }}" alt="mitra" class="h-12 object-contain">
                </div>
            @endforeach
        </div>
    </section>
    @include('layouts.footer')
</body>

</html>
