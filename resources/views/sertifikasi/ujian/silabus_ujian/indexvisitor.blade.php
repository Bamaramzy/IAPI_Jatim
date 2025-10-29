@extends('layouts.visitor')

@section('content')
    <section class="py-12 px-4 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto">

            <h2 class="text-2xl font-bold text-gray-800 text-center mb-8">
                Daftar Silabus Ujian, Modul, dan Ilustrasi Soal
            </h2>

            <form method="GET" action="{{ route('visitor.silabus') }}"
                class="mb-8 flex flex-wrap gap-4 justify-center items-center">

                @if ($kategoriList->isNotEmpty())
                    <div>
                        <select name="kategori" class="px-3 py-2 border rounded shadow-sm text-sm w-48">
                            <option value="">Filter Kategori</option>
                            @foreach ($kategoriList as $kat)
                                <option value="{{ $kat }}" {{ $kategori == $kat ? 'selected' : '' }}>
                                    {{ $kat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                @if ($subList->isNotEmpty())
                    <div>
                        <select name="sub" class="px-3 py-2 border rounded shadow-sm text-sm w-48">
                            <option value="">Filter Sub Kategori</option>
                            @foreach ($subList as $s)
                                <option value="{{ $s }}" {{ $sub == $s ? 'selected' : '' }}>
                                    {{ $s }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <button type="submit" class="px-4 py-2 bg-[#071225] hover:bg-[#0C2C77] text-white rounded shadow text-sm">
                    Cari
                </button>
                @if (!empty($kategori) || !empty($sub))
                    <a href="{{ route('visitor.silabus') }}"
                        class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded shadow text-sm">
                        Reset
                    </a>
                @endif
            </form>

            @forelse ($silabus as $kategori => $subkategoriGroup)
                <div class="mb-10">
                    <h3 class="text-xl font-semibold text-blue-700 mb-4">{{ $kategori }}</h3>

                    @foreach ($subkategoriGroup as $sub => $items)
                        <div class="mb-6 pl-4 border-l-4 border-blue-300">
                            <h4 class="text-lg font-medium text-gray-700 mb-3">{{ $sub }}</h4>

                            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                                @foreach ($items as $s)
                                    @php
                                        $cardLink =
                                            $s->pdf_link ??
                                            ($s->pdf_file
                                                ? Storage::url($s->pdf_file)
                                                : $s->gambar_link ??
                                                    ($s->gambar
                                                        ? Storage::url($s->gambar)
                                                        : $s->ilustrasi_link ?? null));

                                        $pdfUrl = null;
                                        if ($s->pdf_link) {
                                            $pdfUrl = $s->pdf_link;
                                            if (preg_match('/\/d\/(.*?)\//', $pdfUrl, $m)) {
                                                $fileId = $m[1];
                                                $pdfUrl = "https://drive.google.com/file/d/{$fileId}/preview";
                                            }
                                        } elseif ($s->pdf_file) {
                                            $pdfUrl = Storage::url($s->pdf_file);
                                        }
                                    @endphp

                                    <a @if ($cardLink) href="{{ $cardLink }}" target="_blank" @endif
                                        class="bg-white rounded-lg shadow p-4 flex flex-col justify-between min-h-[480px] hover:shadow-md transition">

                                        <h5 class="font-semibold text-gray-800 mb-2">{{ $s->judul }}</h5>

                                        @if ($s->deskripsi)
                                            <p class="text-sm text-gray-600 mb-3 line-clamp-3">
                                                {{ $s->deskripsi }}
                                            </p>
                                        @endif

                                        <div class="flex flex-col space-y-2 mt-auto text-sm">
                                            @if ($pdfUrl)
                                                <div class="mt-2">
                                                    <iframe src="{{ $pdfUrl }}" class="w-full h-96 border rounded"
                                                        frameborder="0"></iframe>
                                                </div>
                                            @endif

                                            @if ($s->gambar)
                                                <img src="{{ Storage::url($s->gambar) }}" alt="Modul {{ $s->judul }}"
                                                    class="w-full h-90 object-cover rounded shadow">
                                            @elseif($s->gambar_link)
                                                <span class="text-blue-600 hover:underline">Modul</span>
                                            @endif
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @empty
                <div class="bg-white p-6 rounded shadow text-center">
                    <p class="text-gray-600">Belum ada data tersedia.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
