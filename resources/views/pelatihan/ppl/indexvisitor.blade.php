@extends('layouts.visitor')

@section('content')
    <section class="max-w-5xl mx-auto px-4 py-12 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-10 text-center">📚 Panduan PPL</h1>

        <div class="space-y-16">
            @forelse ($ppls as $ppl)
                <div class="bg-white rounded-lg shadow overflow-hidden border p-6">

                    <div class="w-full bg-black rounded-lg overflow-hidden">
                        @if ($ppl->video_url)
                            <iframe src="{{ $ppl->video_url }}" class="w-full h-[420px]" frameborder="0"
                                allowfullscreen></iframe>
                        @else
                            <div class="w-full h-[420px] bg-gray-200 flex items-center justify-center text-gray-500">
                                🎞️ Video tidak tersedia
                            </div>
                        @endif
                    </div>
                    <div class="my-8"></div>

                    <div class="w-full bg-gray-100 rounded-lg overflow-hidden">
                        @if ($ppl->pdf_url)
                            <iframe src="{{ $ppl->pdf_url }}" class="w-full h-[850px]" frameborder="0"></iframe>
                        @else
                            <div class="w-full h-[850px] bg-gray-200 flex items-center justify-center text-gray-500">
                                📄 PDF tidak tersedia
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-600">Belum ada panduan tersedia.</p>
            @endforelse
        </div>

    </section>
@endsection
