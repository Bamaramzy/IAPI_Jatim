@extends('layouts.visitor')

@section('content')
    <section class="py-12 px-4 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto">

            {{-- ✅ Judul --}}
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-8">
                📚 Daftar Silabus
            </h2>

            <form method="GET" action="{{ route('visitor.silabus_ujian') }}"
                class="mb-8 flex flex-wrap gap-4 justify-center">
                @if ($kategoriList->isNotEmpty())
                    <div>
                        <select name="kategori" class="px-3 py-2 border rounded shadow-sm text-sm w-48">
                            <option value="">Filter Kategori</option>
                            @foreach ($kategoriList as $kat)
                                <option value="{{ $kat }}" {{ $kategori == $kat ? 'selected' : '' }}>
                                    {{ $kat }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                @if ($subList->isNotEmpty())
                    <div>
                        <select name="sub" class="px-3 py-2 border rounded shadow-sm text-sm w-48">
                            <option value="">Filter Sub Kategori</option>
                            @foreach ($subList as $s)
                                <option value="{{ $s }}" {{ $sub == $s ? 'selected' : '' }}>{{ $s }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow text-sm">
                    🔍 Cari
                </button>
                <a href="{{ route('visitor.silabus_ujian') }}"
                    class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded shadow text-sm">
                    Reset
                </a>
            </form>

            {{-- ✅ Daftar Silabus --}}
            @forelse ($silabus as $kategori => $subkategoriGroup)
                <div class="mb-10">
                    {{-- Kategori Utama --}}
                    <h3 class="text-xl font-semibold text-blue-700 mb-4">{{ $kategori }}</h3>

                    @foreach ($subkategoriGroup as $sub => $items)
                        <div class="mb-6 pl-4 border-l-4 border-blue-300">
                            {{-- Sub Kategori --}}
                            <h4 class="text-lg font-medium text-gray-700 mb-3">{{ $sub }}</h4>

                            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                                @foreach ($items as $s)
                                    <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition">
                                        {{-- Judul --}}
                                        <h5 class="font-semibold text-gray-800 mb-2">{{ $s->judul }}</h5>

                                        {{-- Deskripsi singkat --}}
                                        @if ($s->deskripsi)
                                            <p class="text-sm text-gray-600 mb-3 line-clamp-3">
                                                {{ $s->deskripsi }}
                                            </p>
                                        @endif

                                        {{-- Link terkait --}}
                                        <div class="flex flex-col space-y-2 text-sm">
                                            {{-- PDF --}}
                                            @if ($s->pdf_file)
                                                <div class="mt-2">
                                                    <iframe src="{{ Storage::url($s->pdf_file) }}"
                                                        class="w-full h-64 border rounded" frameborder="0"></iframe>
                                                    <a href="{{ Storage::url($s->pdf_file) }}" target="_blank"
                                                        class="text-blue-600 hover:underline text-sm block mt-1">
                                                        📄 Buka di Tab Baru
                                                    </a>
                                                </div>
                                            @elseif($s->pdf_link)
                                                @php
                                                    $pdfLink = $s->pdf_link;
                                                    if (preg_match('/\/d\/(.*?)\//', $pdfLink, $m)) {
                                                        $fileId = $m[1];
                                                        $pdfLink = "https://drive.google.com/file/d/{$fileId}/preview";
                                                    }
                                                @endphp
                                                <div class="mt-2">
                                                    <iframe src="{{ $pdfLink }}" class="w-full h-64 border rounded"
                                                        frameborder="0"></iframe>
                                                    <a href="{{ $s->pdf_link }}" target="_blank"
                                                        class="text-blue-600 hover:underline text-sm block mt-1">
                                                        📄 Buka PDF
                                                    </a>
                                                </div>
                                            @endif

                                            {{-- Modul (gambar/link) --}}
                                            @if ($s->gambar)
                                                <a href="{{ $s->gambar_link ?? Storage::url($s->gambar) }}"
                                                    target="_blank">
                                                    <img src="{{ Storage::url($s->gambar) }}"
                                                        alt="Modul {{ $s->judul }}"
                                                        class="w-full h-auto object-contain rounded shadow">
                                                </a>
                                            @elseif($s->gambar_link)
                                                <a href="{{ $s->gambar_link }}" target="_blank"
                                                    class="text-blue-600 hover:underline">📘 Modul</a>
                                            @endif

                                            {{-- Ilustrasi Soal --}}
                                            @if ($s->ilustrasi_link)
                                                <a href="{{ $s->ilustrasi_link }}" target="_blank"
                                                    class="text-blue-600 hover:underline">📝 Ilustrasi Soal</a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @empty
                <div class="bg-white p-6 rounded shadow text-center">
                    <p class="text-gray-600">Belum ada silabus tersedia.</p>
                </div>
            @endforelse

        </div>
    </section>
@endsection
