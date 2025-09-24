@extends('layouts.visitor')

@section('content')
    <section class="max-w-7xl mx-auto px-6 py-12 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">📑 Daftar AD/ART</h1>

        {{-- 📚 List AD/ART --}}
        <div class="grid md:grid-cols-3 gap-6">
            @forelse ($adarts as $adart)
                <div class="border rounded-lg shadow hover:shadow-lg overflow-hidden bg-white">
                    {{-- Cover --}}
                    @if ($adart->cover)
                        <img src="{{ asset('storage/' . $adart->cover) }}" alt="Cover {{ $adart->judul }}"
                            class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                            No Cover
                        </div>
                    @endif

                    {{-- Content --}}
                    <div class="p-4">
                        <h2 class="font-bold text-lg mb-4">{{ $adart->judul }}</h2>

                        {{-- Links --}}
                        <div class="flex gap-2">
                            @if ($adart->file_pdf)
                                <a href="{{ asset('storage/' . $adart->file_pdf) }}" target="_blank"
                                    class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                                    📖 Lihat PDF
                                </a>
                            @endif

                            @if ($adart->link_drive)
                                <a href="{{ $adart->link_drive }}" target="_blank"
                                    class="px-3 py-1 bg-green-600 text-white text-sm rounded hover:bg-green-700">
                                    🔗 Google Drive
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-600">Belum ada AD/ART tersedia.</p>
            @endforelse
        </div>

        {{-- 📌 Pagination --}}
        <div class="mt-8">
            {{ $adarts->links() }}
        </div>
    </section>
@endsection
