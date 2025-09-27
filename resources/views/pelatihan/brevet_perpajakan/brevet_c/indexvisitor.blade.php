@extends('layouts.visitor')

@section('content')
    <section x-data="{ show: false, imgSrc: '' }" class="max-w-7xl mx-auto px-6 py-12 bg-white shadow-md rounded-lg">

        <h1 class="text-3xl font-bold mb-6 text-center">📑 Brevet C</h1>

        {{-- 📑 List Brevet C --}}
        <div class="space-y-8">
            @forelse ($brevets as $brevet)
                <div class="border rounded-lg shadow hover:shadow-lg overflow-hidden bg-white">

                    {{-- 🖼️ Gambar Besar --}}
                    @if ($brevet->brosur)
                        <img src="{{ asset('storage/' . $brevet->brosur) }}" alt="{{ $brevet->judul }}"
                            class="w-full max-h-[600px] object-contain cursor-pointer"
                            @click="imgSrc='{{ asset('storage/' . $brevet->brosur) }}'; show = true">
                    @else
                        <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-500">
                            Tidak ada brosur
                        </div>
                    @endif

                    {{-- 📑 Konten --}}
                    <div class="p-4 text-center">
                        <h2 class="font-bold text-lg mb-2">{{ $brevet->judul }}</h2>

                        {{-- 🔗 Tombol Daftar --}}
                        @if ($brevet->link_daftar)
                            <a href="{{ $brevet->link_daftar }}" target="_blank"
                                class="inline-block px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                                📝 Daftar Sekarang
                            </a>
                        @else
                            <span class="text-gray-400">Link pendaftaran belum tersedia</span>
                        @endif
                        <a href="https://drive.google.com/drive/folders/1OZE3Rrn_34JGtVmqo-vnit5onQjZok5X" target="_blank"
                            class="inline-block px-4 py-2 bg-green-600 text-white text-sm rounded hover:bg-green-700 ml-2">
                            📘 Panduan
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-600">Belum ada brosur tersedia.</p>
            @endforelse
        </div>

        {{-- 📌 Pagination --}}
        <div class="mt-8">
            {{ $brevets->links() }}
        </div>

        {{-- 🖼️ Modal Preview Gambar --}}
        <div x-show="show" x-transition.opacity.duration.300ms
            class="fixed inset-0 bg-black bg-opacity-70 backdrop-blur-md flex items-center justify-center z-50"
            @keydown.escape.window="show = false" @click.self="show = false">

            <div x-transition.scale.duration.300ms
                class="bg-white rounded-lg overflow-hidden shadow-lg max-w-5xl w-full relative">

                <button class="absolute top-3 right-3 text-gray-700 text-2xl hover:text-red-600"
                    @click="show = false">&times;</button>

                <img :src="imgSrc" alt="Preview" class="w-full max-h-[90vh] object-contain">
            </div>
        </div>
    </section>

    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
