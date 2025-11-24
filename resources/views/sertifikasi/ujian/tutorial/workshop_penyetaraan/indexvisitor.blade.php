@extends('layouts.visitor')

@section('content')
    @php
        $pdfAll = \App\Models\Pdf::all(); // (Wajib) data lengkap
        $videoAll = \App\Models\Video::all(); // (Wajib) data lengkap
    @endphp

    <section x-data="{
        selected: {{ $kategoriAktif }},
        kategori: {{ $kategoriList->toJson() }},
        pdfAll: {{ $pdfAll->toJson() }},
        videoAll: {{ $videoAll->toJson() }},
        showModal: false,
        modalType: '',
        modalSrc: ''
    }" class="py-12 px-4 min-h-screen">

        <div class="max-w-7xl mx-auto">

            <!-- ===========================
                        PILIH KATEGORI (NO RELOAD)
                ============================ -->
            <div class="flex flex-col sm:flex-row flex-wrap justify-center gap-2 sm:gap-4 mb-8 px-2">

                <template x-for="kat in kategori" :key="kat.id">
                    <button @click="selected = kat.id"
                        class="px-4 sm:px-5 py-2 rounded-md text-sm font-semibold w-full sm:w-auto"
                        :class="selected === kat.id ?
                            'bg-[#071225] text-white' :
                            'bg-gray-200 hover:bg-gray-300'"
                        x-text="kat.nama_kategori.toUpperCase()"></button>
                </template>

            </div>

            <!-- ===========================
                        PDF SECTION
                ============================ -->
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Tutorial - PDF</h2>

            <template x-if="pdfAll.filter(p => p.kategori_id == selected).length">

                <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                    <template x-for="pdf in pdfAll.filter(p => p.kategori_id == selected)" :key="pdf.id">

                        <div>
                            <!-- Jika ada file / link -->
                            <template x-if="pdf.file_path || pdf.link_url">

                                <button
                                    @click="
                                    showModal = true;
                                    modalType = 'pdf';
                                    modalSrc =
                                        pdf.link_url
                                            ? ( pdf.link_url.match(/\/d\/(.+?)\//)
                                                ? 'https://drive.google.com/file/d/' + pdf.link_url.match(/\/d\/(.+?)\//)[1] + '/preview'
                                                : pdf.link_url )
                                            : ('/storage/' + pdf.file_path)
                                "
                                    class="block w-full group focus:outline-none">

                                    <div
                                        class="bg-white rounded-xl shadow hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden">
                                        <iframe :src="pdf.link_url ? modalSrc : ('/storage/' + pdf.file_path)"
                                            class="w-full aspect-[4/3] border-0 pointer-events-none"></iframe>

                                        <div class="bg-blue-900 text-white text-center py-3 text-sm font-semibold"
                                            x-text="pdf.judul ?? 'Tanpa Judul'"></div>
                                    </div>

                                </button>

                            </template>

                            <!-- Jika tidak ada preview -->
                            <template x-if="!pdf.file_path && !pdf.link_url">
                                <div class="bg-white p-6 rounded shadow text-center text-gray-400">
                                    Tidak ada pratinjau untuk <span x-text="pdf.judul"></span>
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


            <!-- ===========================
                        VIDEO SECTION
                ============================ -->
            <h2 class="text-2xl font-bold text-gray-800 mt-12 mb-6">Tutorial - Video</h2>

            <template x-if="videoAll.filter(v => v.kategori_id == selected).length">

                <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                    <template x-for="video in videoAll.filter(v => v.kategori_id == selected)" :key="video.id">

                        <button
                            @click="
                            showModal = true;
                            modalType = 'video';
                            modalSrc =
                                (video.video_url && video.video_url.match(/(youtu\.be\/|watch\?v=)([A-Za-z0-9_-]+)/))
                                ? 'https://www.youtube.com/embed/' + video.video_url.match(/([A-Za-z0-9_-]+)$/)[1]
                                : (video.video_path ? '/storage/' + video.video_path : video.video_url)
                        "
                            class="block w-full group focus:outline-none">

                            <div
                                class="bg-white rounded-xl shadow hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden">

                                <template x-if="modalSrc.includes('youtube.com/embed')">
                                    <iframe :src="modalSrc"
                                        class="w-full aspect-[16/9] border-0 pointer-events-none"></iframe>
                                </template>

                                <template x-if="!modalSrc.includes('youtube.com/embed')">
                                    <video class="w-full aspect-[16/9] object-cover pointer-events-none">
                                        <source :src="modalSrc" type="video/mp4">
                                    </video>
                                </template>

                                <div class="bg-blue-900 text-white text-center py-3 text-sm font-semibold"
                                    x-text="video.judul ?? 'Tanpa Judul'"></div>

                            </div>

                        </button>

                    </template>

                </div>

            </template>

            <template x-if="!videoAll.filter(v => v.kategori_id == selected).length">
                <div class="bg-white p-6 rounded shadow text-center">
                    <p class="text-gray-600">Belum ada tutorial Video untuk kategori ini.</p>
                </div>
            </template>

        </div>

        <!-- ===========================
                        MODAL PREVIEW
            ============================ -->
        <div x-show="showModal" x-transition
            class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50"
            @click.self="showModal=false; modalSrc=''" x-cloak>
            <div class="bg-white rounded-lg shadow-xl max-w-5xl w-full mx-4 overflow-hidden">
                <div class="flex justify-between items-center bg-blue-900 text-white px-4 py-2">
                    <h3 class="text-lg font-semibold">Preview</h3>
                    <button @click="showModal=false; modalSrc=''" class="text-white hover:text-gray-300">✕</button>
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
