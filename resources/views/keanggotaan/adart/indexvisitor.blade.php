@extends('layouts.visitor')

@section('content')
    <section class="max-w-5xl mx-auto px-4 py-12 mt-2 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-10 text-center">Daftar AD/ART</h1>

        <div class="space-y-16">
            @forelse ($adarts as $adart)
                @php
                    $pdfUrl = null;

                    if ($adart->link_drive && preg_match('/\/d\/([a-zA-Z0-9_-]+)/', $adart->link_drive, $matches)) {
                        $driveId = $matches[1];
                        $pdfUrl = "https://drive.google.com/file/d/{$driveId}/preview";
                    } elseif ($adart->file_pdf) {
                        $pdfUrl = asset('storage/' . $adart->file_pdf);
                    }
                @endphp

                <div class="bg-white rounded-lg shadow overflow-hidden border p-6">
                    <div class="w-full bg-gray-100 rounded-lg overflow-hidden">
                        @if ($pdfUrl)
                            <iframe src="{{ $pdfUrl }}" class="w-full h-[850px]" frameborder="0"></iframe>
                        @else
                            <div class="w-full h-[850px] bg-gray-200 flex items-center justify-center text-gray-500">
                                PDF tidak tersedia
                            </div>
                        @endif
                    </div>

                    <div class="p-4">
                        <h2 class="font-bold text-lg text-gray-800">{{ $adart->judul }}</h2>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-600">Belum ada AD/ART tersedia.</p>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $adarts->links('vendor.pagination.tailwind') }}
        </div>
    </section>
@endsection
