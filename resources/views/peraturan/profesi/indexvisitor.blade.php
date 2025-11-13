@extends('layouts.visitor')

@section('content')
    <section x-data="{ tab: 'regulasi' }" class="max-w-5xl mx-auto px-4 sm:px-6 py-8 sm:py-12">
        <h1 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-10 text-center text-gray-800">Peraturan Profesi</h1>

        <div class="mb-6 sm:mb-10 px-2">
            <nav class="flex flex-col sm:flex-row flex-wrap justify-center gap-2 sm:gap-4">
                <button @click="tab = 'regulasi'"
                    class="px-4 py-2.5 rounded-md border text-sm text-center transition-colors duration-200"
                    :class="tab === 'regulasi'
                        ?
                        'bg-[#071225] text-white' :
                        'bg-gray-200 hover:bg-gray-300'">
                    Regulasi
                </button>

                <button @click="tab = 'asosiasi'"
                    class="px-4 py-2.5 rounded-md border text-sm text-center transition-colors duration-200"
                    :class="tab === 'asosiasi'
                        ?
                        'bg-[#071225] text-white' :
                        'bg-gray-200 hover:bg-gray-300'">
                    Peraturan Asosiasi
                </button>

                <button @click="tab = 'pengurus'"
                    class="px-4 py-2.5 rounded-md border text-sm text-center transition-colors duration-200"
                    :class="tab === 'pengurus'
                        ?
                        'bg-[#071225] text-white' :
                        'bg-gray-200 hover:bg-gray-300'">
                    Peraturan Pengurus
                </button>
            </nav>
        </div>

        @php
            function renderItemsBtn($items, $title)
            {
                $html = '';
                $no = 1;
                if ($items->isEmpty()) {
                    $html .=
                        '
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <p class="mt-4 text-gray-500 text-lg">Belum ada ' .
                        $title .
                        '</p>
                            <p class="mt-2 text-gray-400 text-sm">Data akan ditambahkan segera.</p>
                        </div>';
                } else {
                    foreach ($items as $item) {
                        $link = '';
                        if ($item->file_path) {
                            $link =
                                '<a href="' .
                                asset('storage/' . $item->file_path) .
                                '" 
                                target="_blank" 
                                class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-700 text-sm font-medium transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Lihat
                            </a>';
                        } elseif ($item->link_url) {
                            $link =
                                '<a href="' .
                                $item->link_url .
                                '" 
                                target="_blank" 
                                class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-700 text-sm font-medium transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                Buka Link
                            </a>';
                        }
                        $html .=
                            '
                        <div class="flex items-start gap-3 p-4 sm:p-5 rounded-lg border-l-4 border-[#071225] bg-white 
                            shadow-sm hover:shadow-md transition-shadow duration-200">
                            <span class="text-[#071225] font-bold text-sm sm:text-base">' .
                            $no++ .
                            '.</span>
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-col sm:flex-row sm:items-center gap-2 justify-between">
                                    <p class="text-gray-800 font-medium text-sm sm:text-base line-clamp-2">' .
                            $item->judul .
                            '</p>
                                    <div class="flex-shrink-0">' .
                            $link .
                            '</div>
                                </div>
                            </div>
                        </div>';
                    }
                }
                return $html;
            }
        @endphp

        <div x-show="tab === 'regulasi'" class="space-y-4" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0">
            {!! renderItemsBtn($peraturans->where('kategori', 'regulasi'), 'regulasi') !!}
        </div>

        <div x-show="tab === 'asosiasi'" class="space-y-4" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0">
            {!! renderItemsBtn($peraturans->where('kategori', 'asosiasi'), 'peraturan asosiasi') !!}
        </div>

        <div x-show="tab === 'pengurus'" class="space-y-4" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0">
            {!! renderItemsBtn($peraturans->where('kategori', 'pengurus'), 'peraturan pengurus') !!}
        </div>
    </section>
@endsection
