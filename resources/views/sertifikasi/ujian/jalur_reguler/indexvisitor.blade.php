@extends('layouts.visitor')

@section('content')
    <section x-data="{ show: false, imgSrc: '' }" class="max-w-6xl mx-auto px-4 sm:px-6 py-8 sm:py-12 mt-2 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl sm:text-3xl font-bold mb-6 text-center">Jalur Reguler</h1>
        <div class="flex flex-col sm:flex-row flex-wrap justify-center gap-2 sm:gap-3 mb-8">
            @php
                $kategoriList = [
                    'Informasi Umum',
                    'Tingkat Dasar',
                    'Tingkat Profesional',
                    'Penilaian Pengalaman Audit',
                ];
                $selectedKategori = request('kategori') ?? 'Informasi Umum';
            @endphp
            @foreach ($kategoriList as $kategori)
                <a href="{{ route('visitor.jalur_reguler', ['kategori' => $kategori]) }}"
                    class="px-4 py-2.5 rounded-md border text-sm text-center transition-colors duration-200
                {{ $selectedKategori == $kategori
                    ? 'bg-[#071225] text-white border-[#071225]'
                    : 'bg-gray-50 text-gray-700 hover:bg-gray-100 border-gray-200' }}">
                    {{ $kategori }}
                </a>
            @endforeach
        </div>
        <div class="space-y-8">
            @forelse ($jalurRegulers as $item)
                <div class="p-4 sm:p-6 border rounded-lg shadow-sm hover:shadow-md transition bg-white">
                    <div class="space-y-3">
                        <h2 class="text-lg sm:text-xl font-bold text-gray-800">{{ $item->judul }}</h2>
                        <div class="prose prose-blue max-w-none text-gray-700 text-justify text-sm sm:text-base">
                            {!! $item->konten !!}
                        </div>
                    </div>
                    <div class="mt-6 space-y-4">
                        @if ($item->file)
                            <div class="space-y-2">
                                <p class="text-sm font-semibold text-gray-600 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                        </path>
                                    </svg>
                                    Preview File
                                </p>
                                @php
                                    $ext = pathinfo($item->file, PATHINFO_EXTENSION);
                                @endphp
                                @if (in_array(strtolower($ext), ['pdf']))
                                    <div class="relative w-full overflow-hidden rounded-lg border bg-gray-100">
                                        <iframe src="{{ asset('storage/' . $item->file) }}"
                                            class="w-full h-[300px] sm:h-[400px] md:h-[500px]"></iframe>
                                    </div>
                                @elseif(in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                    <img src="{{ asset('storage/' . $item->file) }}" alt="Preview {{ $item->judul }}"
                                        class="w-full max-h-[400px] object-contain rounded-lg border cursor-pointer hover:scale-105 transition"
                                        @click="show = true; imgSrc='{{ asset('storage/' . $item->file) }}'">
                                @else
                                    <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                                        class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                            </path>
                                        </svg>
                                        Download File
                                    </a>
                                @endif
                            </div>
                        @endif
                        @if ($item->link)
                            <div class="space-y-2">
                                <p class="text-sm font-semibold text-gray-600 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                        </path>
                                    </svg>
                                    Link Terkait
                                </p>
                                <div class="relative w-full overflow-hidden rounded-lg border bg-gray-100">
                                    <iframe src="{{ $item->link }}"
                                        class="w-full h-[300px] sm:h-[400px] md:h-[500px]"></iframe>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    <p class="mt-4 text-gray-500 text-lg">Belum ada data yang tersedia.</p>
                </div>
            @endforelse
        </div>
        <div class="mt-8">
            {{ $jalurRegulers->links('vendor.pagination.tailwind') }}
        </div>
        <div x-show="show" x-transition class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50"
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
