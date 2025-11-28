<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>IAPI - Korda Jawa Timur</title>
    <!-- Favicon -->
    <link rel="icon" type="image/webp" href="{{ asset('favicon1.webp') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon1.png') }}">
    <link rel="icon" href="{{ asset('favicon1.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script type="application/ld+json">
    {
    "@"context": "https://schema.org",
    "@type": "Organization",
    "url": "https://ramzet.dev",
    "logo": "https://ramzet.dev/favicon1.webp"
    }
    </script>
</head>

<body class="font-sans antialiased bg-gradient-to-b from-gray-100 via-gray-50 to-white text-black">
    @include('layouts.navbar')

    <section class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <h1 class="text-4xl lg:text-5xl font-black leading-tight text-gray-900">
                    <span class="bg-gradient-to-r from-[#071225] to-[#0C2C77] bg-clip-text text-transparent">
                        Institut Akuntan Publik Indonesia
                    </span>
                </h1>
                <h2 class="text-2xl font-semibold text-[#0C2C77] mt-2 tracking-wide uppercase">
                    Korda Jawa Timur
                </h2>
                <p class="text-lg text-gray-600 max-w-xl leading-relaxed">
                    Ayo Gabung di LMS, CPA Indonesia Academy – wadah pengembangan dan peningkatan kompetensi akuntan
                    publik di Indonesia.
                </p>
                <a href="{{ url('https://member.iapi.or.id/login') }}"
                    class="inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-[#071225] to-[#0C2C77]
                         text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-transform
                           hover:scale-105 focus-visible:ring-4 focus-visible:ring-blue-300">
                    Daftar Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            </div>
            <div class="flex justify-center lg:justify-end relative">
                <div class="relative">
                    <divabsolute -inset-4 bg-gradient-to-tr from-blue-200/40 to-transparent rounded-[24px] blur-3xl">
                </div>
                <img src="{{ asset('images/kiri1.webp') }}" alt="" role="presentation"
                    class="relative rounded-[20px] shadow-xl hover:scale-[1.02] transition-transform duration-500 w-full max-w-lg"
                    loading="lazy">
            </div>
        </div>
        </div>
    </section>
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-8 text-[#071225] tracking-tight">
                Jadwal Pelatihan Terbaru
            </h2>
            <div class="relative">
                <div id="jadwal-track"
                    class="flex overflow-x-auto space-x-6 snap-x snap-mandatory px-2 py-4 scrollbar-hide">

                    @forelse ($jadwals as $jadwal)
                        <div class="min-w-[320px] sm:min-w-[360px] lg:min-w-[380px] snap-center block">
                            <div
                                class="rounded-xl overflow-hidden border border-gray-300 shadow hover:shadow-lg
                            hover:-translate-y-1 transition-all duration-300 flex flex-col text-center">
                                @if ($jadwal->brosur)
                                    <img src="{{ asset('storage/' . $jadwal->brosur) }}" alt="{{ $jadwal->judul }}"
                                        class="w-full h-56 object-cover object-top" loading="lazy">
                                @else
                                    <div class="w-full h-56 bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-500 text-sm">Belum ada brosur</span>
                                    </div>
                                @endif
                                <div class="p-4 flex-1 flex flex-col justify-between bg-white">
                                    <div>
                                        <h3 class="text-lg font-bold text-[#0C2C77] mb-1 line-clamp-2">
                                            {{ $jadwal->judul }} [{{ $jadwal->kategori }}]
                                        </h3>
                                        <p class="text-sm text-gray-700">
                                            {{ $jadwal->tanggal_mulai->format('d M Y') }}
                                            @if ($jadwal->tanggal_selesai)
                                                - {{ $jadwal->tanggal_selesai->format('d M Y') }}
                                            @endif
                                        </p>
                                        <p class="text-sm text-gray-700">
                                            {{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_selesai }} WIB
                                        </p>
                                        <p class="text-sm text-gray-700 mb-4">
                                            {{ $jadwal->lokasi }}
                                        </p>
                                    </div>
                                    <div class="flex gap-2 justify-center mt-auto">
                                        @if ($jadwal->brosur)
                                            <a href="{{ asset('storage/' . $jadwal->brosur) }}" target="_blank"
                                                class="px-4 py-2 bg-[#071225] text-white text-xs font-semibold rounded hover:bg-[#0C2C77] transition">
                                                Lihat Brosur
                                            </a>
                                        @endif

                                        @if ($jadwal->link)
                                            <a href="{{ $jadwal->link }}" target="_blank"
                                                class="px-4 py-2 bg-green-600 text-white text-xs font-semibold rounded hover:bg-green-800 transition">
                                                Daftar
                                            </a>
                                        @else
                                            <span
                                                class="px-4 py-2 bg-gray-500 text-white text-xs font-semibold rounded">
                                                Daftar (Belum Tersedia)
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="w-full text-center py-8">
                            <p class="text-gray-500 italic">Belum ada jadwal pelatihan.</p>
                        </div>
                    @endforelse
                </div>
                <div id="jadwal-dots" class="flex justify-center mt-4"></div>
            </div>
        </div>
        <div class="text-center mt-6">
            <a href="{{ route('visitor.pelatihan.jadwal') }}"
                class="px-6 py-2 bg-[#071225] text-white font-semibold rounded hover:bg-[#0C2C77] transition">
                Lihat Semua Jadwal
            </a>
        </div>
    </section>
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-8 text-[#071225] tracking-tight">
                Informasi
            </h2>
            <div class="relative">
                <div id="info-track"
                    class="flex overflow-x-auto space-x-6 snap-x snap-mandatory px-2 py-4 scrollbar-hide">

                    @forelse($informasis as $info)
                        <a href="{{ $info->link }}" target="_blank"
                            class="min-w-[320px] sm:min-w-[360px] lg:min-w-[380px] snap-center block text-center">
                            <div
                                class="rounded-xl overflow-hidden border border-gray-300 bg-white
                            shadow hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                                <img src="{{ asset('storage/' . $info->gambar) }}" alt="{{ $info->judul }}"
                                    class="w-full h-56 object-cover object-top" loading="lazy">

                                <div class="p-4">
                                    <h3 class="text-lg font-semibold line-clamp-2 text-gray-900">
                                        {{ $info->judul }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="w-full text-center py-8">
                            <p class="text-gray-500 italic">Belum ada informasi tersedia.</p>
                        </div>
                    @endforelse

                </div>
                <div id="info-dots" class="flex justify-center mt-4"></div>
            </div>
        </div>
    </section>

    @push('scripts')
        @vite('resources/js/carousel.js')
    @endpush

    <section id="kontak" class="max-w-7xl mx-auto px-6 lg:px-8 py-16">
        <h2 class="text-3xl font-bold text-center mb-12 text-gray-900 tracking-tight">Hubungi Kami</h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            <div class="lg:col-span-2">
                <div class="rounded-xl overflow-hidden h-80 lg:h-[28rem] shadow-lg hover:shadow-xl transition">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.5678032036744!2d112.7663188!3d-7.2899137000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa4b9b86e0ad%3A0x5a374e985c610881!2sGraha%20Widya%20Bhakti!5e0!3m2!1sid!2sid!4v1758182495300!5m2!1sid!2sid"
                        class="w-full h-full border-0" title="Peta lokasi Test Center IAPI Jawa Timur"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition">
                <div class="text-sm text-gray-600 space-y-6">
                    <div class="flex items-start gap-4">
                        <svg class="w-6 h-6 shrink-0 text-blue-600" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.272 1.05l-2.2 2.2a11.042 11.042 0 005.52 5.52l2.2-2.2a1 1 0 011.05-.272l4.493 1.498a1 1 0 01.684.948V20a2 2 0 01-2 2h-1C9.163 22 2 14.837 2 6V5z" />
                        </svg>
                        <div>
                            <div class="text-xs font-semibold uppercase text-gray-500">Telepon</div>
                            <a href="tel:+62315913334"
                                class="text-base font-medium text-gray-800 hover:text-blue-500 transition">
                                (031) 5913334
                            </a>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <svg class="w-6 h-6 shrink-0 text-green-500" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 13.487a4.48 4.48 0 01-2.062 2.062l-.33.165a4.5 4.5 0 01-6.332-3.872v-.662a4.5 4.5 0 016.332-3.872l.33.165a4.48 4.48 0 012.062 2.062 1 1 0 01-.33 1.155l-1.155.77a1 1 0 01-1.155-.165l-.77-.77a1 1 0 01-.165-1.155l.77-1.155a1 1 0 011.155-.33z" />
                        </svg>
                        <div>
                            <div class="text-xs font-semibold uppercase text-gray-500">WhatsApp</div>
                            <a href="https://wa.me/6283833153212" target="_blank"
                                class="text-base font-medium text-gray-800 hover:text-green-500 transition">
                                083-8331-53212
                            </a>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <svg class="w-6 h-6 shrink-0 text-red-500" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <div>
                            <div class="text-xs font-semibold uppercase text-gray-500">Email</div>
                            <a href="mailto:korda.jatim@iapi.or.id"
                                class="text-base font-medium text-gray-800 hover:text-red-500 transition">
                                korda.jatim@iapi.or.id
                            </a>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <svg class="w-6 h-6 shrink-0 text-blue-600" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 22s8-4.5 8-12a8 8 0 10-16 0c0 7.5 8 12 8 12z" />
                        </svg>
                        <div>
                            <div class="text-xs font-semibold uppercase text-gray-500">Alamat</div>
                            <div class="text-base font-medium text-gray-800 leading-relaxed text-justify">
                                Gedung Graha Widya Bhakti Stiesia, Jl. Menur Pumpungan No.30, Menur Pumpungan, Kec.
                                Sukolilo, Surabaya, Jawa Timur 60118
                            </div>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <svg class="w-6 h-6 shrink-0 text-yellow-500" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <div class="text-xs font-semibold uppercase text-gray-500">Jam Operasional</div>
                            <div class="text-base font-medium text-gray-800">Senin - Jumat: 08.00 - 17.00</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @include('layouts.mitra')
    @include('layouts.footer')
</body>

</html>
