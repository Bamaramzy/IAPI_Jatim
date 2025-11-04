@extends('layouts.visitor')

@section('content')
    <section class="max-w-7xl mx-auto px-6 py-12 mt-2 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">Workshop A & B</h1>

        @if ($workshops->count())
            @foreach ($workshops as $workshop)
                <div class="flex flex-col items-center gap-6 mb-12">
                    <div class="w-full bg-gray-100 rounded-lg overflow-hidden">
                        @if ($workshop->pdf)
                            <iframe src="{{ asset('storage/' . $workshop->pdf) }}" class="w-full h-[850px]"
                                frameborder="0"></iframe>
                        @elseif($workshop->link_pdf)
                            @php
                                $link = $workshop->link_pdf;
                                if (preg_match('/\/d\/(.*?)\//', $link, $m)) {
                                    $fileId = $m[1];
                                    $link = "https://drive.google.com/file/d/{$fileId}/preview";
                                }
                                $isImage = preg_match('/\.(jpg|jpeg|png|gif)$/i', $link);
                            @endphp

                            @if ($isImage)
                                <img src="{{ $link }}" alt="{{ $workshop->judul ?? 'Workshop' }}"
                                    class="w-full h-[850px] object-contain bg-white">
                            @else
                                <iframe src="{{ $link }}" class="w-full h-[850px]" frameborder="0"></iframe>
                            @endif
                        @else
                            <div class="w-full h-[850px] bg-gray-200 flex items-center justify-center text-gray-500">
                                PDF tidak tersedia
                            </div>
                        @endif
                    </div>

                    <h2 class="font-bold text-lg text-center mt-4">
                        {{ $workshop->judul ?? 'Workshop A & B' }}
                    </h2>

                    @if ($workshop->link_form)
                        <a href="{{ $workshop->link_form }}" target="_blank"
                            class="inline-block px-5 py-2 bg-[#071225] text-white rounded-lg hover:bg-[#0C2C77] transition">
                            Daftar Sekarang
                        </a>
                    @else
                        <button disabled
                            class="inline-block px-5 py-2 bg-gray-400 text-white rounded-lg cursor-not-allowed">
                            Form Belum Tersedia
                        </button>
                    @endif
                </div>
            @endforeach
        @else
            <p class="text-center text-gray-600">Belum ada informasi Workshop A-B saat ini.</p>
        @endif
    </section>
@endsection
