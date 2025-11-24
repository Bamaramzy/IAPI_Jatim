@extends('layouts.visitor')

@section('content')
    <section x-data="{
        selected: '{{ $selectedKategori }}',
        data: @js($dataByKategori)
    }" class="max-w-6xl mx-auto px-4 sm:px-6 py-8 sm:py-12 mt-2">

        <h1 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-8 text-center text-gray-900">
            Jalur Workshop dan Penyetaraan
        </h1>
        <div class="flex flex-col sm:flex-row flex-wrap justify-center gap-2 sm:gap-3 mb-8 sm:mb-10">
            @foreach ($kategoriList as $kategori)
                <button @click="selected = '{{ $kategori }}'"
                    class="px-4 py-2.5 rounded-md border text-sm font-medium transition-all duration-200 text-center"
                    :class="selected === '{{ $kategori }}'
                        ?
                        'bg-[#071225] text-white border-[#071225] hover:bg-[#0C2C77] shadow-sm' :
                        'bg-gray-200 text-gray-700 border-gray-200 hover:bg-gray-100 hover:border-gray-300'">
                    {{ $kategori }}
                </button>
            @endforeach
        </div>
        <div class="bg-white shadow-md rounded-lg p-6 space-y-6">
            <template x-if="data[selected] && data[selected].gambar">
                <div class="mb-4">
                    <div class="relative group rounded-lg overflow-hidden bg-gray-100">
                        <img :src="data[selected].gambar" :alt="'Gambar - ' + selected"
                            class="w-full max-h-[400px] sm:max-h-[600px] object-contain rounded-lg">
                    </div>
                </div>
            </template>
            <div x-html="data[selected] ? data[selected].konten : ''"
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
            </div>
        </div>
    </section>
@endsection
