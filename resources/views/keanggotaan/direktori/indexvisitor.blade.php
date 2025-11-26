@extends('layouts.visitor')

@section('content')
    <section class="max-w-5xl mx-auto px-4 py-12 mt-2 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-10 text-center">Direktori</h1>

        <div class="space-y-16">
            @forelse ($direktoris as $direktori)
                @php
                    $pdfUrl = null;

                    if ($direktori->link_drive && preg_match('/[-\w]{25,}/', $direktori->link_drive, $matches)) {
                        $driveId = $matches[0];
                        $pdfUrl = "https://drive.google.com/file/d/{$driveId}/preview";
                    } elseif ($direktori->file_pdf) {
                        $pdfUrl = asset('storage/' . $direktori->file_pdf);
                    }
                @endphp

                <div class="bg-white rounded-lg shadow overflow-hidden border p-6">
                    <div class="w-full bg-gray-100 rounded-lg overflow-hidden">
                        @if ($pdfUrl)
                            <iframe src="{{ $pdfUrl }}" class="w-full h-[850px]" frameborder="0" loading="lazy"></iframe>
                        @elseif ($direktori->cover)
                            <img src="{{ asset('storage/' . $direktori->cover) }}" alt="Cover {{ $direktori->judul }}"
                                class="w-full h-[850px] object-cover" loading="lazy">
                        @else
                            <div class="w-full h-[850px] bg-gray-200 flex items-center justify-center text-gray-500">
                                📄 File tidak tersedia
                            </div>
                        @endif
                    </div>

                    <div class="p-4">
                        <h2 class="font-bold text-lg text-gray-800">{{ $direktori->judul }}</h2>
                        @if ($direktori->deskripsi)
                            <p class="text-sm text-justify py-2 text-gray-600">{{ $direktori->deskripsi }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-600">Belum ada direktori tersedia.</p>
            @endforelse
        </div>
    </section>
@endsection
