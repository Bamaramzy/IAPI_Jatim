@extends('layouts.visitor')

@section('content')
    @php
        $pdfAll = \App\Models\Pdf::all();
        $videoAll = \App\Models\Video::all();
    @endphp

    <section x-data="{
        selected: {{ $kategoriAktif }},
        kategori: {{ $kategoriList->toJson() }},
        pdfAll: {{ $pdfAll->toJson() }},
        videoAll: {{ $videoAll->toJson() }}
    }" class="py-12 px-4 min-h-screen">

        <div class="max-w-7xl mx-auto">
            <div class="flex flex-wrap justify-center gap-3 mb-10">

                <template x-for="kat in kategori" :key="kat.id">
                    <button @click="selected = kat.id" class="px-4 py-2 rounded-md text-sm font-semibold"
                        :class="selected === kat.id ?
                            'bg-[#071225] text-white' :
                            'bg-gray-200 hover:bg-gray-300'"
                        x-text="kat.nama_kategori.toUpperCase()">
                    </button>
                </template>

            </div>

            <h2 class="text-2xl font-bold text-gray-800 mb-6">Tutorial - PDF</h2>
            <template x-if="pdfAll.filter(p => p.kategori_id == selected).length">
                <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <template x-for="pdf in pdfAll.filter(p => p.kategori_id == selected)" :key="pdf.id">
                        <div class="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden">
                            <template x-if="pdf.file_path || pdf.link_url">
                                <div>
                                    <iframe
                                        :src="pdf.link_url ?
                                            (pdf.link_url.match(/\/d\/(.+?)\//) ?
                                                'https://drive.google.com/file/d/' + pdf.link_url.match(/\/d\/(.+?)\//)[
                                                    1] + '/preview' :
                                                pdf.link_url) :
                                            ('/storage/' + pdf.file_path)"
                                        class="w-full aspect-[4/3] border-0"></iframe>

                                    <div class="bg-[#071225] text-white text-center py-3 text-sm font-semibold"
                                        x-text="pdf.judul ?? 'Tanpa Judul'">
                                    </div>

                                </div>
                            </template>
                            <template x-if="!pdf.file_path && !pdf.link_url">
                                <div class="p-6 text-center text-gray-400">
                                    Tidak ada pratinjau untuk
                                    <span x-text="pdf.judul"></span>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>
            </template>

            <template x-if="!pdfAll.filter(p => p.kategori_id == selected).length">
                <div class="bg-white p-6 rounded shadow text-center mb-12">
                    <p class="text-gray-600">Belum ada tutorial PDF untuk kategori ini.</p>
                </div>
            </template>

            <h2 class="text-2xl font-bold text-gray-800 mt-12 mb-6">Tutorial - Video</h2>
            <template x-if="videoAll.filter(v => v.kategori_id == selected).length">
                <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <template x-for="video in videoAll.filter(v => v.kategori_id == selected)" :key="video.id">
                        <div class="bg-white rounded-xl shadow hover:shadow-xl overflow-hidden">
                            <template
                                x-if="
                                (video.video_url && video.video_url.match(/(youtu\.be\/|watch\?v=)([A-Za-z0-9_-]+)/))
                            ">
                                <iframe
                                    :src="'https://www.youtube.com/embed/' + video.video_url.match(/([A-Za-z0-9_-]+)$/)[1]"
                                    class="w-full aspect-[16/9] border-0" allowfullscreen></iframe>
                            </template>
                            <template
                                x-if="!(
                                    video.video_url && video.video_url.match(/(youtu\.be\/|watch\?v=)([A-Za-z0-9_-]+)/)
                                )">
                                <video class="w-full aspect-[16/9] object-cover" controls>
                                    <source :src="video.video_path ? '/storage/' + video.video_path : video.video_url"
                                        type="video/mp4">
                                </video>
                            </template>
                            <div class="bg-[#071225] text-white text-center py-3 text-sm font-semibold"
                                x-text="video.judul ?? 'Tanpa Judul'">
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            <template x-if="!videoAll.filter(v => v.kategori_id == selected).length">
                <div class="bg-white p-6 rounded shadow text-center">
                    <p class="text-gray-600">Belum ada tutorial Video untuk kategori ini.</p>
                </div>
            </template>

        </div>

    </section>
@endsection
