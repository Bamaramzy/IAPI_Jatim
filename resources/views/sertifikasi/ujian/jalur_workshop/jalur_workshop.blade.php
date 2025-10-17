@extends('layouts.visitor')

@section('content')
    <section x-data="{ show: false, imgSrc: '' }" class="max-w-6xl mx-auto px-6 py-12 mt-2 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-8 text-center">Jalur Workshop dan Penyetaraan</h1>
        <div class="flex flex-wrap justify-center gap-3 mb-10">
            @foreach ($kategoriList as $kategori)
                <a href="{{ route('visitor.jalur_workshop', ['kategori' => $kategori]) }}"
                    class="px-4 py-2 rounded-md border text-sm font-medium transition
                {{ $selectedKategori == $kategori
                    ? 'bg-[#071225] text-white border-[#071225] hover:bg-[#0C2C77]'
                    : 'bg-gray-100 text-gray-700 border-gray-300 hover:bg-gray-200' }}">
                    {{ $kategori }}
                </a>
            @endforeach
        </div>

        @if (!empty($content['gambar']))
            <div class="mb-8 text-center">
                <img src="{{ $content['gambar'] }}" alt="{{ $selectedKategori }}"
                    class="w-full max-h-[600px] object-contain rounded-lg shadow-md cursor-pointer transition-transform duration-300 hover:scale-105"
                    @click="show = true; imgSrc='{{ $content['gambar'] }}'">
            </div>
        @endif

        <div
            class="prose prose-blue max-w-none
        prose-p:text-justify prose-li:text-justify
        prose-h1:mt-8 prose-h1:mb-4 prose-h1:text-2xl prose-h1:font-bold
        prose-h2:mt-6 prose-h2:mb-3 prose-h2:text-xl prose-h2:font-semibold
        prose-h3:mt-4 prose-h3:mb-2 prose-h3:text-lg prose-h3:font-semibold
        prose-ol:pl-6 prose-ul:pl-6
        prose-table:border prose-table:border-gray-300
        prose-th:bg-gray-100 prose-th:text-center prose-th:font-semibold
        prose-td:border prose-td:border-gray-200 prose-td:px-4 prose-td:py-2
        prose-blockquote:border-l-4 prose-blockquote:border-blue-600 prose-blockquote:pl-4 prose-blockquote:text-gray-700">
            {!! $content['konten'] !!}
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
                <img :src="imgSrc" alt="Popup Gambar" class="max-h-[90vh] max-w-[90vw] rounded-lg shadow-lg">
            </div>
        </div>
    </section>
@endsection
