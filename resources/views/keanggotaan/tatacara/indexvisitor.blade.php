@extends('layouts.visitor')

@section('content')
    <section class="max-w-7xl mx-auto px-6 py-12 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">📑 Tata Cara</h1>

        <div class="grid md:grid-cols-3 gap-6">
            @forelse ($tatacaras as $tatacara)
                @php
                    $driveId = null;
                    if ($tatacara->link_drive && preg_match('/[-\w]{25,}/', $tatacara->link_drive, $matches)) {
                        $driveId = $matches[0];
                    }
                @endphp

                <div class="border rounded-lg shadow hover:shadow-lg overflow-hidden bg-white">
                    @if ($driveId)
                        <iframe src="https://drive.google.com/file/d/{{ $driveId }}/preview" class="w-full h-64 border-0"
                            allow="autoplay"></iframe>
                    @elseif ($tatacara->file_pdf)
                        <iframe src="{{ asset('storage/' . $tatacara->file_pdf) }}" class="w-full h-64 border-0"></iframe>
                    @elseif ($tatacara->cover)
                        <img src="{{ asset('storage/' . $tatacara->cover) }}" alt="Cover {{ $tatacara->judul }}"
                            class="w-full h-64 object-cover">
                    @else
                        <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-500">
                            Tidak ada file tersedia
                        </div>
                    @endif

                    <div class="p-4">
                        <h2 class="font-bold text-lg mb-2 text-gray-800">{{ $tatacara->judul }}</h2>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-600">Belum ada Tata Cara tersedia.</p>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $tatacaras->links('vendor.pagination.tailwind') }}
        </div>
    </section>
@endsection
