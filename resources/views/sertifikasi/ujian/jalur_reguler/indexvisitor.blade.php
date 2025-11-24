@extends('layouts.visitor')

@section('content')
    <section x-data="{
        selected: '{{ $selectedKategori }}',
        data: {{ $jalurRegulers->toJson() }},
        show: false,
        imgSrc: ''
    }" class="max-w-6xl mx-auto px-4 sm:px-6 py-8 sm:py-12 mt-2">
        <h1 class="text-2xl sm:text-3xl font-bold mb-6 text-center">Jalur Reguler</h1>
        <div class="flex flex-col sm:flex-row flex-wrap justify-center gap-2 sm:gap-3 mb-8">
            @foreach ($kategoriList as $kat)
                <button @click="selected = '{{ $kat }}'"
                    :class="selected === '{{ $kat }}'
                        ?
                        'bg-[#071225] text-white' :
                        'bg-gray-200 text-gray-700'"
                    class="px-4 py-2 rounded-md border transition">
                    {{ $kat }}
                </button>
            @endforeach
        </div>
        <div class="space-y-8">
            <template x-for="item in data.filter(i => i.kategori === selected)">
                <div class="p-4 sm:p-6 border rounded-lg shadow-sm hover:shadow-md transition bg-white">
                    <h2 class="text-lg sm:text-xl font-bold text-gray-800" x-text="item.judul"></h2>
                    <div class="prose prose-blue max-w-none text-gray-700 text-justify text-sm sm:text-base"
                        x-html="item.konten">
                    </div>
                    <template x-if="item.file">
                        <div class="mt-6 space-y-4">
                            <p class="text-sm font-semibold text-gray-600 flex items-center gap-2">
                                Preview File
                            </p>
                            <template x-if="item.file.endsWith('.pdf')">
                                <iframe :src="'/storage/' + item.file"
                                    class="w-full h-[300px] sm:h-[400px] md:h-[500px] rounded border bg-gray-100"></iframe>
                            </template>
                            <template x-if="['jpg','jpeg','png','gif','webp'].includes(item.file.split('.').pop())">
                                <img :src="'/storage/' + item.file"
                                    class="w-full max-h-[400px] object-contain rounded border cursor-pointer hover:scale-105 transition"
                                    @click="show=true; imgSrc='/storage/' + item.file">
                            </template>
                            <template
                                x-if="!item.file.endsWith('.pdf') && !['jpg','jpeg','png','gif','webp'].includes(item.file.split('.').pop())">
                                <a :href="'/storage/' + item.file" target="_blank" class="text-blue-600 hover:underline">
                                    Download File
                                </a>
                            </template>
                        </div>
                    </template>
                    <template x-if="item.link">
                        <div class="mt-6 space-y-2">
                            <p class="text-sm font-semibold text-gray-600">Link Terkait</p>
                            <iframe :src="item.link"
                                class="w-full h-[300px] sm:h-[400px] md:h-[500px] rounded border bg-gray-100">
                            </iframe>
                        </div>
                    </template>
                </div>
            </template>
            <template x-if="data.filter(i => i.kategori === selected).length === 0">
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">Belum ada data yang tersedia.</p>
                </div>
            </template>
        </div>
        <div x-show="show" x-transition class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50"
            @click="show = false">
            <div class="relative" @click.stop>
                <button @click="show = false"
                    class="absolute -top-4 -right-4 bg-white rounded-full shadow-lg p-2 hover:bg-gray-200 transition">
                    ✕
                </button>
                <img :src="imgSrc" class="max-h-[90vh] max-w-[90vw] rounded shadow-lg">
            </div>
        </div>
    </section>
@endsection
