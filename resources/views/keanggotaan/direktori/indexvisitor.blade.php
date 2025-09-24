@extends('layouts.visitor')

@section('content')
    <section class="max-w-7xl mx-auto px-6 py-12 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">📂 Daftar Direktori</h1>

        {{-- 📚 List Direktori --}}
        <div class="grid md:grid-cols-3 gap-6">
            @forelse ($direktoris as $direktori)
                <div class="border rounded-lg shadow hover:shadow-lg overflow-hidden bg-white">
                    {{-- Cover --}}
                    @if ($direktori->cover)
                        <img src="{{ asset('storage/' . $direktori->cover) }}" alt="Cover {{ $direktori->judul }}"
                            class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                            No Cover
                        </div>
                    @endif

                    {{-- Content --}}
                    <div class="p-4">
                        <h2 class="font-bold text-lg mb-2">{{ $direktori->judul }}</h2>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ $direktori->deskripsi }}</p>

                        {{-- Links --}}
                        <div class="flex gap-2">
                            @if ($direktori->file_pdf)
                                <a href="{{ asset('storage/' . $direktori->file_pdf) }}" target="_blank"
                                    class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                                    📖 Lihat PDF
                                </a>
                            @endif

                            @if ($direktori->link_drive)
                                <a href="{{ $direktori->link_drive }}" target="_blank"
                                    class="px-3 py-1 bg-green-600 text-white text-sm rounded hover:bg-green-700">
                                    🔗 Google Drive
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-600">Belum ada direktori tersedia.</p>
            @endforelse
        </div>

        {{-- 📌 Pagination --}}
        <div class="mt-8">
            {{ $direktoris->links() }}
        </div>
    </section>
@endsection
