@extends('layouts.visitor')

@section('content')
    <section class="max-w-7xl mx-auto px-6 py-12 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">📑 Daftar AD/ART</h1>

        <div class="grid md:grid-cols-3 gap-6">
            @forelse ($adarts as $adart)
                @php
                    $driveId = null;
                    $pdfUrl = null;

                    if ($adart->link_drive && preg_match('/\/d\/([a-zA-Z0-9_-]+)/', $adart->link_drive, $matches)) {
                        $driveId = $matches[1];
                        $pdfUrl = "https://drive.google.com/file/d/{$driveId}/preview";
                    } elseif ($adart->file_pdf) {
                        $pdfUrl = asset('storage/' . $adart->file_pdf);
                    }
                @endphp

                <a href="{{ $pdfUrl ?? '#' }}" target="_blank"
                    class="block border rounded-lg shadow hover:shadow-lg overflow-hidden bg-white transition transform hover:-translate-y-1">
                    @if ($driveId)
                        <iframe src="https://drive.google.com/file/d/{{ $driveId }}/preview" class="w-full h-64 border-0"
                            allow="autoplay"></iframe>
                    @elseif ($adart->file_pdf)
                        <iframe src="{{ asset('storage/' . $adart->file_pdf) }}" class="w-full h-64 border-0"></iframe>
                    @elseif ($adart->cover)
                        <img src="{{ asset('storage/' . $adart->cover) }}" alt="Cover {{ $adart->judul }}"
                            class="w-full h-64 object-cover">
                    @else
                        <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-500">
                            Tidak ada file tersedia
                        </div>
                    @endif

                    <div class="p-4">
                        <h2 class="font-bold text-lg text-gray-800">{{ $adart->judul }}</h2>
                    </div>
                </a>
            @empty
                <p class="col-span-3 text-center text-gray-600">Belum ada AD/ART tersedia.</p>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $adarts->links('vendor.pagination.tailwind') }}
        </div>
    </section>
@endsection
