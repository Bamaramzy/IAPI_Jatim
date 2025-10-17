@extends('layouts.visitor')

@section('content')
    <section class="max-w-6xl mx-auto px-6 py-12 mt-2 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">Jalur Reguler</h1>
        <div class="flex flex-wrap justify-center gap-2 mb-8">
            @php
                $kategoriList = [
                    'Informasi Umum',
                    'Tingkat Dasar',
                    'Tingkat Profesional',
                    'Penilaian Pengalaman Audit',
                ];
                $selectedKategori = request('kategori') ?? 'Informasi Umum';
            @endphp

            @foreach ($kategoriList as $kategori)
                <a href="{{ route('visitor.jalur_reguler', ['kategori' => $kategori]) }}"
                    class="px-4 py-2 rounded border text-sm
                    {{ $selectedKategori == $kategori ? 'bg-[#071225] text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    {{ $kategori }}
                </a>
            @endforeach
        </div>

        <div class="space-y-6">
            @forelse ($jalurRegulers as $item)
                <div class="p-6 border rounded-lg shadow-sm hover:shadow-md transition bg-gray-50">
                    <span class="text-xs font-semibold text-blue-600 uppercase">{{ $item->kategori }}</span>
                    <h2 class="text-xl font-bold text-gray-800 mt-2">{{ $item->judul }}</h2>
                    <div class="prose prose-blue max-w-none mt-3 text-gray-700">
                        {!! $item->konten !!}
                    </div>

                    <div class="mt-4 space-y-3">
                        @if ($item->file)
                            <div>
                                <p class="text-sm font-semibold text-gray-600">Preview File</p>
                                @php
                                    $ext = pathinfo($item->file, PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array(strtolower($ext), ['pdf']))
                                    <iframe src="{{ asset('storage/' . $item->file) }}"
                                        class="w-full h-96 border rounded"></iframe>
                                @elseif(in_array(strtolower($ext), ['jpg', 'jpeg', 'png']))
                                    <img src="{{ asset('storage/' . $item->file) }}" alt="Preview Gambar"
                                        class="max-h-96 rounded border mx-auto">
                                @else
                                    <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                                        class="text-blue-500 underline">Download File</a>
                                @endif
                            </div>
                        @endif

                        @if ($item->link)
                            <div>
                                <p class="text-sm font-semibold text-gray-600">🔗 Link</p>
                                <iframe src="{{ $item->link }}" class="w-full h-96 border rounded"></iframe>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500">Belum ada data.</p>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $jalurRegulers->links('vendor.pagination.tailwind') }}
        </div>

    </section>
@endsection
