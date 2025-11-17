@extends('layouts.visitor')

@section('content')
    <section x-data="{ show: false, imgSrc: '' }" class="max-w-7xl mx-auto px-6 py-12 mt-2 bg-white shadow-md rounded-lg">

        <h1 class="text-3xl font-bold mb-6 text-center">Brevet A & B</h1>

        @forelse ($brevets as $brevet)
            <div class="flex flex-col items-center gap-3 mb-8">
                @if ($brevet->brosur)
                    <img src="{{ asset('storage/' . $brevet->brosur) }}" alt="{{ $brevet->judul }}"
                        class="w-[550px] max-h-[800px] object-contain cursor-pointer"
                        @click="imgSrc='{{ asset('storage/' . $brevet->brosur) }}'; show = true">
                @else
                    <div class="w-[550px] h-[800px] bg-gray-200 flex items-center justify-center text-gray-500">
                        Tidak ada brosur
                    </div>
                @endif
                <h2 class="font-bold text-lg text-center">{{ $brevet->judul }}</h2>
                @if ($brevet->link_daftar)
                    <a href="{{ $brevet->link_daftar }}" target="_blank"
                        class="inline-block px-4 py-2 bg-[#071225] text-white rounded hover:bg-[#0C2C77]">
                        Daftar Sekarang
                    </a>
                @endif
            </div>
        @empty
            <p class="text-center text-gray-600">Belum ada brosur tersedia.</p>
        @endforelse

        <div x-show="show" x-transition.opacity.duration.300ms
            class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50"
            @keydown.escape.window="show = false" @click.self="show = false">

            <div class="relative" x-transition.scale.duration.300ms @click.stop>
                <button @click="show = false"
                    class="absolute -top-4 -right-4 bg-white rounded-full shadow-lg p-2 hover:bg-gray-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <img :src="imgSrc" alt="Preview Brosur"
                    class="max-h-[90vh] max-w-[90vw] object-contain rounded shadow-lg">
            </div>
        </div>
    </section>
@endsection
