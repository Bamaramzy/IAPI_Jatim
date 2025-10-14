@extends('layouts.visitor')

@section('content')
    <section class="py-12 px-4 bg-gray-100 min-h-screen" x-data="{ showModal: false, modalType: '', modalSrc: '' }">

        <div class="max-w-7xl mx-auto">
            {{-- 🔹 Tabs Kategori --}}
            <div class="flex flex-wrap justify-center gap-4 mb-8">
                @foreach ($kategoriList as $kat)
                    <a href="{{ route('visitor.workshop_penyetaraan', ['kategori' => $kat->id]) }}"
                        class="px-5 py-2 rounded-full text-sm font-semibold
                    {{ $kategoriAktif == $kat->id ? 'bg-blue-900 text-yellow-300' : 'bg-gray-200 hover:bg-gray-300' }}">
                        {{ strtoupper($kat->nama_kategori) }}
                    </a>
                @endforeach
            </div>

            {{-- ===========================
             🔹 BAGIAN PDF
        ============================ --}}
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Tutorial - PDF</h2>

            @if ($pdfList->isNotEmpty())
                <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($pdfList as $pdf)
                        @php
                            // Tentukan URL preview PDF
                            if ($pdf->file_path && !preg_match('/^https?:\/\//', $pdf->file_path)) {
                                $targetUrl = asset('storage/' . $pdf->file_path);
                            } elseif ($pdf->link_url) {
                                if (preg_match('/\/d\/([a-zA-Z0-9_-]+)/', $pdf->link_url, $m)) {
                                    $targetUrl = "https://drive.google.com/file/d/{$m[1]}/preview";
                                } elseif (preg_match('/id=([a-zA-Z0-9_-]+)/', $pdf->link_url, $m)) {
                                    $targetUrl = "https://drive.google.com/file/d/{$m[1]}/preview";
                                } else {
                                    $targetUrl = $pdf->link_url;
                                }
                            } else {
                                $targetUrl = null;
                            }
                        @endphp

                        @if ($targetUrl)
                            <button @click="showModal = true; modalType = 'pdf'; modalSrc = '{{ $targetUrl }}'"
                                class="block w-full group focus:outline-none">
                                <div
                                    class="bg-white rounded-xl shadow hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden">
                                    {{-- Otomatis Preview PDF --}}
                                    <iframe src="{{ $targetUrl }}"
                                        class="w-full aspect-[4/3] border-0 pointer-events-none"
                                        title="Preview PDF"></iframe>
                                    <div
                                        class="bg-blue-900 text-white text-center py-3 text-sm font-semibold group-hover:bg-blue-800">
                                        {{ $pdf->judul ?? 'Tanpa Judul' }}
                                    </div>
                                </div>
                            </button>
                        @else
                            <div class="bg-white p-6 rounded shadow text-center text-gray-400">
                                Tidak ada pratinjau untuk {{ $pdf->judul ?? 'materi ini' }}
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="bg-white p-6 rounded shadow text-center mb-12">
                    <p class="text-gray-600">Belum ada tutorial PDF untuk kategori ini.</p>
                </div>
            @endif

            {{-- ===========================
             🔹 BAGIAN VIDEO
        ============================ --}}
            <h2 class="text-2xl font-bold text-gray-800 mt-12 mb-6">Tutorial - Video</h2>

            @if ($videoList->isNotEmpty())
                <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($videoList as $video)
                        @php
                            // Tentukan URL video
                            if ($video->video_path && !preg_match('/^https?:\/\//', $video->video_path)) {
                                $videoUrl = asset('storage/' . $video->video_path);
                            } elseif ($video->video_url) {
                                if (
                                    preg_match(
                                        '/(?:youtube\.com\/watch\?v=|youtu\.be\/)([A-Za-z0-9_-]+)/',
                                        $video->video_url,
                                        $m,
                                    )
                                ) {
                                    $videoUrl = "https://www.youtube.com/embed/{$m[1]}";
                                } else {
                                    $videoUrl = $video->video_url;
                                }
                            } else {
                                $videoUrl = null;
                            }
                        @endphp

                        @if ($videoUrl)
                            <button @click="showModal = true; modalType = 'video'; modalSrc = '{{ $videoUrl }}'"
                                class="block w-full group focus:outline-none">
                                <div
                                    class="bg-white rounded-xl shadow hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden">
                                    {{-- Otomatis Preview Video --}}
                                    @if (str_contains($videoUrl, 'youtube.com/embed'))
                                        <iframe src="{{ $videoUrl }}"
                                            class="w-full aspect-[16/9] border-0 pointer-events-none"
                                            title="Preview Video"></iframe>
                                    @else
                                        <video class="w-full aspect-[16/9] object-cover pointer-events-none">
                                            <source src="{{ $videoUrl }}" type="video/mp4">
                                        </video>
                                    @endif
                                    <div
                                        class="bg-blue-900 text-white text-center py-3 text-sm font-semibold group-hover:bg-blue-800">
                                        {{ $video->judul ?? 'Tanpa Judul' }}
                                    </div>
                                </div>
                            </button>
                        @else
                            <div class="bg-white p-6 rounded shadow text-center text-gray-400">
                                Tidak ada pratinjau untuk {{ $video->judul ?? 'materi ini' }}
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="bg-white p-6 rounded shadow text-center">
                    <p class="text-gray-600">Belum ada tutorial Video untuk kategori ini.</p>
                </div>
            @endif
        </div>

        {{-- 🔹 Modal Preview --}}
        <div x-show="showModal" x-transition
            class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50"
            @click.self="showModal = false; modalSrc = ''" x-cloak>
            <div class="bg-white rounded-lg shadow-xl max-w-5xl w-full mx-4 overflow-hidden">
                <div class="flex justify-between items-center bg-blue-900 text-white px-4 py-2">
                    <h3 class="text-lg font-semibold">Preview</h3>
                    <button @click="showModal = false; modalSrc = ''" class="text-white hover:text-gray-300">✕</button>
                </div>
                <div class="bg-black flex justify-center items-center">
                    <template x-if="modalType === 'pdf'">
                        <iframe :src="modalSrc" class="w-full h-[80vh] border-0"></iframe>
                    </template>
                    <template x-if="modalType === 'video'">
                        <iframe :src="modalSrc" class="w-full h-[80vh] border-0" allowfullscreen></iframe>
                    </template>
                </div>
            </div>
        </div>

    </section>
@endsection
