@extends('layouts.visitor')

@section('content')
    <section class="flex flex-col items-center justify-center py-12 px-4 bg-gray-100 min-h-screen">

        @if ($workshop_ab)
            <div class="w-full max-w-3xl bg-black p-6 rounded-lg shadow-lg">
                @if ($workshop_ab->pdf)
                    {{-- Jika file diupload ke storage --}}
                    <iframe src="{{ asset('storage/' . $workshop_ab->pdf) }}" class="w-full h-[700px] border-0 rounded"
                        frameborder="0"></iframe>
                @elseif($workshop_ab->link_pdf)
                    @php
                        $link = $workshop_ab->link_pdf;
                        if (preg_match('/\/d\/(.*?)\//', $link, $m)) {
                            $fileId = $m[1];
                            $link = "https://drive.google.com/file/d/{$fileId}/preview";
                        }
                        $isImage = preg_match('/\.(jpg|jpeg|png|gif)$/i', $link);
                    @endphp

                    @if ($isImage)
                        <img src="{{ $link }}" alt="Workshop A B" class="w-full object-contain rounded" />
                    @else
                        <iframe src="{{ $link }}" class="w-full h-[700px] border-0 rounded" frameborder="0"></iframe>
                    @endif
                @else
                    {{-- Default poster kalau tidak ada file/link --}}
                    <img src="{{ asset('images/default-workshop-poster.png') }}" alt="Poster Workshop"
                        class="w-full object-contain rounded" />
                @endif
            </div>

            {{-- Tombol Daftar --}}
            <div class="mt-6">
                @if ($workshop_ab->link_form)
                    <a href="{{ $workshop_ab->link_form }}" target="_blank"
                        class="inline-block px-6 py-3 bg-blue-700 hover:bg-blue-800 text-white rounded-full shadow">
                        Daftar
                    </a>
                @else
                    <button disabled
                        class="inline-block px-6 py-3 bg-gray-400 text-white rounded-full shadow cursor-not-allowed">
                        Form Belum Tersedia
                    </button>
                @endif
            </div>
        @else
            <div class="max-w-3xl w-full bg-white p-6 rounded shadow text-center">
                <p class="text-gray-700">Belum ada informasi Workshop A-B saat ini.</p>
            </div>
        @endif

    </section>
@endsection
