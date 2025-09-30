@extends('layouts.visitor')

@section('content')
    <section class="max-w-6xl mx-auto px-6 py-12 bg-white shadow-md rounded-lg">

        {{-- Judul --}}
        <h1 class="text-3xl font-bold mb-8 text-center">📑 Jalur Workshop</h1>

        {{-- Tabs kategori --}}
        <div class="flex flex-wrap justify-center gap-3 mb-10">
            @foreach ($kategoriList as $kategori)
                <a href="{{ route('visitor.jalur_workshop', ['kategori' => $kategori]) }}"
                    class="px-4 py-2 rounded-md border text-sm font-medium transition
                {{ $selectedKategori == $kategori
                    ? 'bg-blue-600 text-white border-blue-600'
                    : 'bg-gray-100 text-gray-700 border-gray-300 hover:bg-gray-200' }}">
                    {{ $kategori }}
                </a>
            @endforeach
        </div>

        {{-- Gambar dengan Pop-up --}}
        @if (!empty($content['gambar']))
            <div x-data="{ show: false }" class="mb-8 text-center">
                <img src="{{ $content['gambar'] }}" alt="{{ $selectedKategori }}"
                    class="rounded-lg shadow-md max-h-96 w-full object-contain mx-auto cursor-pointer transition-transform duration-300 hover:scale-100 hover:bg-gray-50"
                    @click="show = true">

                {{-- Pop-up --}}
                <div x-show="show" x-transition.opacity
                    class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50"
                    @click.self="show = false">
                    <img src="{{ $content['gambar'] }}" alt="{{ $selectedKategori }}"
                        class="max-h-[90vh] max-w-[90vw] rounded-lg shadow-lg">
                </div>
            </div>
        @endif

        {{-- Konten di bawah gambar --}}
        <div
            class="prose prose-blue max-w-none prose-justify
                prose-h3:mt-6 prose-h3:mb-3 prose-h3:text-lg prose-h3:font-bold
                prose-p:mb-3 prose-li:mb-1 prose-ol:pl-6 prose-ul:pl-6
                prose-table:border prose-table:border-gray-300
                prose-th:bg-gray-100 prose-th:text-center
                prose-td:border prose-td:border-gray-200 prose-td:px-4 prose-td:py-2">
            {!! $content['konten'] !!}
        </div>

    </section>
@endsection
