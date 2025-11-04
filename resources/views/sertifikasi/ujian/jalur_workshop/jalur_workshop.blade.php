@extends('layouts.visitor')

@section('content')
    <section x-data="{ show: false, imgSrc: '' }" class="max-w-6xl mx-auto px-4 sm:px-6 py-8 sm:py-12 mt-2 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-8 text-center text-gray-900">
            Jalur Workshop dan Penyetaraan
        </h1>

        <div class="flex flex-col sm:flex-row flex-wrap justify-center gap-2 sm:gap-3 mb-8 sm:mb-10">
            @foreach ($kategoriList as $kategori)
                <a href="{{ route('visitor.jalur_workshop', ['kategori' => $kategori]) }}"
                    class="px-4 py-2.5 rounded-md border text-sm font-medium transition-all duration-200 text-center
                    {{ $selectedKategori == $kategori
                        ? 'bg-[#071225] text-white border-[#071225] hover:bg-[#0C2C77] shadow-sm'
                        : 'bg-gray-50 text-gray-700 border-gray-200 hover:bg-gray-100 hover:border-gray-300' }}">
                    {{ $kategori }}
                </a>
            @endforeach
        </div>

        @if (!empty($content['gambar']))
            <div class="mb-8 sm:mb-10">
                <div class="relative group rounded-lg overflow-hidden bg-gray-100">
                    <img src="{{ $content['gambar'] }}" alt="{{ $selectedKategori }}"
                        class="w-full max-h-[400px] sm:max-h-[600px] object-contain rounded-lg cursor-zoom-in"
                        @click="show = true; imgSrc='{{ $content['gambar'] }}'">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300 
                        flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        @endif

        <div
            class="prose prose-blue max-w-none
            prose-p:text-justify prose-li:text-justify
            prose-h1:mt-8 prose-h1:mb-4 prose-h1:text-xl sm:prose-h1:text-2xl prose-h1:font-bold
            prose-h2:mt-6 prose-h2:mb-3 prose-h2:text-lg sm:prose-h2:text-xl prose-h2:font-semibold
            prose-h3:mt-4 prose-h3:mb-2 prose-h3:text-base sm:prose-h3:text-lg prose-h3:font-semibold
            prose-p:text-sm sm:prose-p:text-base
            prose-ol:pl-6 prose-ul:pl-6
            prose-li:text-sm sm:prose-li:text-base
            prose-table:border prose-table:border-gray-300 prose-table:overflow-x-auto
            prose-th:bg-gray-100 prose-th:text-center prose-th:font-semibold prose-th:p-2 sm:prose-th:p-4
            prose-td:border prose-td:border-gray-200 prose-td:p-2 sm:prose-td:p-4
            prose-blockquote:border-l-4 prose-blockquote:border-blue-600 prose-blockquote:pl-4 
            prose-blockquote:text-gray-700 prose-blockquote:text-sm sm:prose-blockquote:text-base">
            {!! $content['konten'] !!}
        </div>

        <div x-show="show"
            class="fixed inset-0 bg-black bg-opacity-75 backdrop-blur-sm flex items-center justify-center z-50"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="show = false"
            @keydown.escape.window="show = false">

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" @click.stop>
                <button @click="show = false"
                    class="absolute -top-4 -right-4 bg-white rounded-full shadow-lg p-2 hover:bg-gray-100 
                        transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="bg-white rounded-lg p-1">
                    <img :src="imgSrc" alt="Preview Gambar"
                        class="max-h-[85vh] max-w-[85vw] object-contain rounded-lg" @click.stop>
                </div>
            </div>
        </div>
    </section>
@endsection
