@extends('layouts.visitor')

@section('content')
    <section x-data="{ show: false, imgSrc: '' }" class="max-w-7xl mx-auto px-6 py-12 mt-2 bg-white shadow-md rounded-lg text-gray-900">
        <h1 class="text-3xl font-bold mb-6 text-center text-[#071225]">Daftar Jadwal Pelatihan</h1>

        <div class="space-y-6">
            @forelse ($jadwals as $jadwal)
                <div
                    class="border border-gray-300 rounded-lg shadow hover:shadow-lg overflow-hidden bg-white p-4 flex flex-col sm:flex-row gap-4">
                    @if ($jadwal->brosur)
                        <img src="{{ asset('storage/' . $jadwal->brosur) }}" alt="Poster {{ $jadwal->judul }}"
                            class="w-full sm:w-32 md:w-40 h-48 sm:h-32 md:h-40 object-cover rounded cursor-pointer hover:opacity-90 transition mx-auto sm:mx-0"
                            @click="show = true; imgSrc = '{{ asset('storage/' . $jadwal->brosur) }}'">
                    @else
                        <div
                            class="w-full sm:w-32 md:w-40 h-48 sm:h-32 md:h-40 bg-gray-100 flex items-center justify-center text-gray-700 mx-auto sm:mx-0 font-medium">
                            Tidak ada brosur
                        </div>
                    @endif

                    <div class="flex-1 flex flex-col">
                        <h2 class="font-bold text-base sm:text-lg mb-2 text-[#0C2C77]">
                            {{ $jadwal->judul }} [{{ $jadwal->kategori }}]
                        </h2>
                        <p class="text-sm text-gray-700 mb-1">
                            {{ $jadwal->tanggal_mulai->format('d M Y') }}
                            @if ($jadwal->tanggal_selesai)
                                - {{ $jadwal->tanggal_selesai->format('d M Y') }}
                            @endif
                        </p>
                        <p class="text-sm text-gray-700 mb-1">
                            {{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_selesai }} WIB
                        </p>
                        <p class="text-sm text-gray-700 mb-3">
                            {{ $jadwal->lokasi }}
                        </p>

                        <div class="flex flex-col sm:flex-row gap-2 mt-auto">
                            @if ($jadwal->brosur)
                                <button @click="show = true; imgSrc = '{{ asset('storage/' . $jadwal->brosur) }}'"
                                    class="w-full sm:w-auto px-4 py-2 sm:py-1.5 bg-[#071225] text-white text-sm font-semibold rounded hover:bg-[#0C2C77] focus:ring-2 focus:ring-offset-2 focus:ring-[#0C2C77] transition text-center">
                                    Lihat Brosur
                                </button>
                            @endif

                            @if ($jadwal->link)
                                <a href="{{ $jadwal->link }}" target="_blank"
                                    class="w-full sm:w-auto px-4 py-2 sm:py-1.5 bg-green-600 text-white text-sm font-semibold rounded hover:bg-green-800 focus:ring-2 focus:ring-offset-2 focus:ring-green-700 transition text-center inline-block">
                                    Daftar
                                </a>
                            @else
                                <a href="#"
                                    class="w-full sm:w-auto px-4 py-2 sm:py-1.5 bg-gray-500 text-white text-sm font-semibold rounded cursor-not-allowed text-center inline-block"
                                    title="Link pendaftaran belum tersedia">
                                    Daftar
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-700 font-medium">Belum ada jadwal tersedia.</p>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $jadwals->links('vendor.pagination.tailwind') }}
        </div>

        <div x-show="show" class="fixed inset-0 bg-black/80 flex items-center justify-center z-50 p-4"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="show = false"
            @keydown.escape.window="show = false">

            <div class="relative max-h-screen" @click.stop>
                <button @click="show = false"
                    class="absolute -top-2 -right-2 sm:-top-4 sm:-right-4 bg-white rounded-full shadow-lg p-1.5 sm:p-2 hover:bg-gray-200 focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 transition transform hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-6 sm:w-6 text-black" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <img :src="imgSrc" alt="Popup Brosur"
                    class="max-h-[85vh] max-w-[85vw] sm:max-h-[90vh] sm:max-w-[90vw] rounded-lg shadow-lg object-contain bg-white">
            </div>
        </div>
    </section>
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
