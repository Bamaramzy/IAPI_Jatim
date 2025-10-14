@extends('layouts.visitor')

@section('content')
    <section x-data="{ show: false, imgSrc: '' }" class="max-w-7xl mx-auto px-6 py-12 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">📅 Daftar Jadwal Pelatihan</h1>

        <div class="space-y-6">
            @forelse ($jadwals as $jadwal)
                <div class="border rounded-lg shadow hover:shadow-lg overflow-hidden bg-white p-4 flex gap-4">

                    @if ($jadwal->brosur)
                        <img src="{{ asset('storage/' . $jadwal->brosur) }}" alt="Poster {{ $jadwal->judul }}"
                            class="w-40 h-40 object-cover rounded cursor-pointer hover:opacity-80 transition"
                            @click="imgSrc='{{ asset('storage/' . $jadwal->brosur) }}'; show = true">
                    @else
                        <div class="w-40 h-40 bg-gray-200 flex items-center justify-center text-gray-500">
                            No Poster
                        </div>
                    @endif

                    <div class="flex-1">
                        <h2 class="font-bold text-lg mb-2">{{ $jadwal->judul }} [{{ $jadwal->kategori }}]</h2>
                        <p class="text-sm text-gray-600 mb-1">
                            🗓 {{ $jadwal->tanggal_mulai->format('d M Y') }}
                            @if ($jadwal->tanggal_selesai)
                                - {{ $jadwal->tanggal_selesai->format('d M Y') }}
                            @endif
                        </p>
                        <p class="text-sm text-gray-600 mb-1">⏰ {{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_selesai }}
                            WIB</p>
                        <p class="text-sm text-gray-600 mb-3">📍 {{ $jadwal->lokasi }}</p>

                        <div class="flex gap-2">
                            <button @click="imgSrc='{{ asset('storage/' . $jadwal->brosur) }}'; show = true"
                                class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                                🔍 Detail
                            </button>

                            <a href="https://member.iapi.or.id/login" target="_blank"
                                class="px-3 py-1 bg-green-600 text-white text-sm rounded hover:bg-green-700">
                                📝 Daftar
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-600">Belum ada jadwal tersedia.</p>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $jadwals->links() }}
        </div>

        <div x-show="show" x-transition.opacity.duration.300ms
            class="fixed inset-0 bg-black bg-opacity-40 backdrop-blur-md flex items-center justify-center z-50"
            @keydown.escape.window="show = false" @click.self="show = false">

            <div x-transition.scale.duration.300ms
                class="bg-white rounded-lg overflow-hidden shadow-lg max-w-3xl w-full relative">

                <button class="absolute top-3 right-3 text-gray-700 text-2xl hover:text-red-600"
                    @click="show = false">&times;</button>

                <img :src="imgSrc" alt="Brosur Pelatihan" class="w-full">
            </div>
        </div>
    </section>

    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
