@extends('layouts.visitor')

@section('content')
    <section x-data="{ show: false, pdfSrc: '' }" class="max-w-7xl mx-auto px-6 py-12 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">📚 Panduan PPL</h1>

        {{-- 📚 List PPL --}}
        <div class="space-y-6">
            @forelse ($ppls as $ppl)
                <div class="border rounded-lg shadow hover:shadow-lg overflow-hidden bg-white p-4 flex gap-4">
                    {{-- 🎥 Video --}}
                    <div class="w-64">
                        @if ($ppl->video_url)
                            <iframe src="{{ $ppl->video_url }}" class="w-full h-40 rounded" frameborder="0"
                                allowfullscreen></iframe>
                        @else
                            <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-500">
                                No Video
                            </div>
                        @endif
                    </div>

                    {{-- 📑 Konten --}}
                    <div class="flex-1">
                        <h2 class="font-bold text-lg mb-2">Panduan PPL</h2>

                        {{-- 🔗 Tombol --}}
                        <div class="flex gap-2 mt-2">
                            @if ($ppl->pdf_url)
                                <button @click="pdfSrc='{{ $ppl->pdf_url }}'; show = true"
                                    class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                                    📄 Lihat PDF
                                </button>
                            @else
                                <span class="text-gray-400">PDF tidak tersedia</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-600">Belum ada panduan tersedia.</p>
            @endforelse
        </div>

        {{-- 📌 Pagination --}}
        <div class="mt-8">
            {{ $ppls->links() }}
        </div>

        {{-- 📜 Modal Preview PDF --}}
        <div x-show="show" x-transition.opacity.duration.300ms
            class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-md flex items-center justify-center z-50"
            @keydown.escape.window="show = false" @click.self="show = false">

            <div x-transition.scale.duration.300ms
                class="bg-white rounded-lg overflow-hidden shadow-lg max-w-4xl w-full relative">

                <button class="absolute top-3 right-3 text-gray-700 text-2xl hover:text-red-600"
                    @click="show = false">&times;</button>

                <iframe :src="pdfSrc" width="100%" height="600" class="border-0"></iframe>
            </div>
        </div>
    </section>

    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
