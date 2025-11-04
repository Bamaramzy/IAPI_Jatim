@extends('layouts.visitor')

@section('content')
    <section x-data="{ show: false, imgSrc: '' }" class="max-w-5xl mx-auto px-6 py-12 mt-2 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">Certified Financial Investigator (CFI)</h1>

        <div class="flex flex-col items-center gap-6">
            @forelse ($cfis as $cfi)
                @if ($cfi->gambar)
                    <img src="{{ asset('storage/' . $cfi->gambar) }}" alt="Poster CFI"
                        class="w-[500px] max-h-[600px] object-contain cursor-pointer hover:scale-105 transition"
                        @click="show = true; imgSrc='{{ asset('storage/' . $cfi->gambar) }}'">
                @endif
            @empty
                <p class="text-center text-gray-500">
                    Belum ada gambar Certified Financial Investigator.
                </p>
            @endforelse
        </div>

        <div class="flex flex-wrap justify-center gap-3 mt-8">
            @forelse ($cfis as $cfi)
                @if ($cfi->link)
                    <a href="{{ $cfi->link }}" target="_blank"
                        class="px-4 py-2 bg-[#071225] text-white rounded shadow hover:bg-[#0C2C77] items-center text-center transition">
                        Tentang Sertifikasi Profesional Investigator
                    </a>
                @endif
            @empty
                <p class="text-gray-500 text-center">Belum ada link Certified Financial Investigator.</p>
            @endforelse
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
                <img :src="imgSrc" alt="Popup Image" class="max-h-[90vh] max-w-[90vw] rounded shadow-lg">
            </div>
        </div>

    </section>
@endsection
