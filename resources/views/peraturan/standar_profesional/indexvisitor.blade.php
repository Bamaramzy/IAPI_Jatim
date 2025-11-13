@extends('layouts.visitor')

@section('content')
    <section x-data="{ tab: 'spm', show: false, imgSrc: '' }" class="max-w-6xl mx-auto px-4 sm:px-6 py-8 sm:py-12">
        <h1 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-10 text-center text-gray-800">
            Standar Profesional Akuntan Publik (SPAP)
        </h1>
        @php
            $kategoriList = $peraturans->pluck('kategori')->unique()->values();
        @endphp
        <div class="flex flex-col sm:flex-row flex-wrap justify-center gap-2 sm:gap-4 mb-6 sm:mb-10 px-2">
            @foreach ($kategoriList as $kategori)
                <button @click="tab = '{{ Str::slug($kategori) }}'"
                    class="px-4 py-2.5 rounded-md border text-sm text-center transition-colors duration-200"
                    :class="tab === '{{ Str::slug($kategori) }}' ? 'bg-[#071225] text-white' : 'bg-gray-200 hover:bg-gray-300'">
                    {{ strtoupper($kategori) }}
                </button>
            @endforeach
        </div>
        @foreach ($kategoriList as $kategori)
            <div x-show="tab === '{{ Str::slug($kategori) }}'" x-transition class="space-y-6">
                @php $filtered = $peraturans->where('kategori', $kategori); @endphp

                @forelse ($filtered as $item)
                    <div
                        class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 border border-gray-100 overflow-hidden">
                        @if ($item->thumbnail)
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->judul }}"
                                class="w-full h-40 sm:h-48 object-cover cursor-pointer hover:scale-105 transition"
                                @click="show = true; imgSrc='{{ asset('storage/' . $item->thumbnail) }}'">
                        @endif
                        <div class="p-4 sm:p-6 space-y-4">
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-800 line-clamp-2">
                                {{ $item->judul }}
                            </h3>
                            <div x-data="{ expanded: false }" class="text-sm sm:text-base text-gray-700 leading-relaxed">
                                <template x-if="!expanded">
                                    <div class="prose max-w-none">
                                        {!! Str::limit(strip_tags($item->deskripsi), 300, '...') !!}
                                    </div>
                                </template>
                                <template x-if="expanded">
                                    <div class="prose max-w-none">{!! $item->deskripsi !!}</div>
                                </template>
                                <button @click="expanded = !expanded"
                                    class="mt-3 text-blue-600 hover:underline text-sm font-medium focus:outline-none">
                                    <span x-text="expanded ? 'Tutup' : 'Lihat selengkapnya...'"></span>
                                </button>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @for ($i = 1; $i <= 3; $i++)
                                    @php
                                        $judulPdf = $item->{'pdf_' . $i . '_judul'};
                                        $urlPdf = $item->{'pdf_' . $i . '_url'};
                                    @endphp
                                    @if ($judulPdf && $urlPdf)
                                        <a href="{{ $urlPdf }}" target="_blank"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                            {{ $judulPdf }}
                                        </a>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">
                        Belum ada data untuk kategori {{ $kategori }}.
                    </p>
                @endforelse
            </div>
        @endforeach
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
