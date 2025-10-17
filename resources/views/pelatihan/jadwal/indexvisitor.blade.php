@extends('layouts.visitor')

@section('content')
    <section x-data="{ show: false, imgSrc: '' }" class="max-w-7xl mx-auto px-6 py-12 mt-2 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">Daftar Jadwal Pelatihan</h1>

        <div class="space-y-6">
            @forelse ($jadwals as $jadwal)
                <div class="border rounded-lg shadow hover:shadow-lg overflow-hidden bg-white p-4 flex gap-4">
                    @if ($jadwal->brosur)
                        <img src="{{ asset('storage/' . $jadwal->brosur) }}" alt="Poster {{ $jadwal->judul }}"
                            class="w-40 h-40 object-cover rounded cursor-pointer hover:opacity-80 transition"
                            @click="show = true; imgSrc = '{{ asset('storage/' . $jadwal->brosur) }}'">
                    @else
                        <div class="w-40 h-40 bg-gray-200 flex items-center justify-center text-gray-500">
                            No Poster
                        </div>
                    @endif

                    <div class="flex-1">
                        <h2 class="font-bold text-lg mb-2">
                            {{ $jadwal->judul }} [{{ $jadwal->kategori }}]
                        </h2>
                        <p class="text-sm text-gray-600 mb-1">
                            {{ $jadwal->tanggal_mulai->format('d M Y') }}
                            @if ($jadwal->tanggal_selesai)
                                - {{ $jadwal->tanggal_selesai->format('d M Y') }}
                            @endif
                        </p>
                        <p class="text-sm text-gray-600 mb-1">
                            {{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_selesai }} WIB
                        </p>
                        <p class="text-sm text-gray-600 mb-3">
                            {{ $jadwal->lokasi }}
                        </p>

                        <div class="flex gap-2">
                            @if ($jadwal->brosur)
                                <button @click="show = true; imgSrc = '{{ asset('storage/' . $jadwal->brosur) }}'"
                                    class="px-3 py-1 bg-[#071225] text-white text-sm rounded hover:bg-[#0C2C77] transition">
                                    Lihat Brosur
                                </button>
                            @endif

                            <a href="https://member.iapi.or.id/login" target="_blank"
                                class="px-3 py-1 bg-green-600 text-white text-sm rounded hover:bg-green-700 transition">
                                Daftar
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-600">Belum ada jadwal tersedia.</p>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $jadwals->links('vendor.pagination.tailwind') }}
        </div>

        <div x-show="show" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50" x-transition
            @click="show = false" @keydown.escape.window="show = false">
            <div class="relative" @click.stop>
                <button @click="show = false"
                    class="absolute -top-4 -right-4 bg-white rounded-full shadow-lg p-2 hover:bg-gray-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <img :src="imgSrc" alt="Popup Brosur"
                    class="max-h-[90vh] max-w-[90vw] rounded shadow-lg object-contain">
            </div>
        </div>
    </section>
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
