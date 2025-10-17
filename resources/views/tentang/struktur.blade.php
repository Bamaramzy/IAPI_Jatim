@extends('layouts.visitor')

@section('content')
    <div class="max-w-5xl mx-auto px-6 py-12 mt-2 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-10 text-center text-gray-900">
            Struktur Organisasi
        </h1>

        <section class="mb-16">
            <h2 class="text-2xl font-semibold text-gray-800 mb-8 text-center border-b pb-3">Dewan Pengurus</h2>
            <div class="relative">
                <div class="overflow-hidden rounded-xl">
                    <div id="carousel-track-pengurus"
                        class="flex transition-transform duration-700 ease-in-out px-2 py-4 space-x-4 snap-x snap-mandatory">
                        @forelse($pengurus as $item)
                            <div class="w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 snap-center">
                                <div
                                    class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 p-4">
                                    <div class="relative w-full h-52 mb-4">
                                        @if ($item->gambar)
                                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                                alt="{{ $item->nama }} - {{ $item->jabatan }}"
                                                class="w-full h-full object-cover rounded-lg border border-gray-100"
                                                loading="lazy"
                                                onerror="this.src='{{ asset('images/default-avatar.jpg') }}'; this.classList.add('opacity-75')">
                                        @else
                                            <div
                                                class="w-full h-full bg-gray-200 rounded-lg flex items-center justify-center">
                                                <span class="text-gray-500 text-sm">No Image</span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="text-center">
                                        <h3 class="text-lg font-semibold text-gray-900 line-clamp-1">{{ $item->nama }}
                                        </h3>
                                        <p class="text-gray-600 text-sm line-clamp-2">{{ $item->jabatan }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="w-full text-center py-8">
                                <p class="text-gray-500 italic">Belum ada data pengurus tersedia.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <button id="prev-pengurus"
                    class="absolute left-3 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white w-10 h-10 rounded-full flex items-center justify-center shadow-md z-10"
                    aria-label="Slide sebelumnya">
                    <span class="text-xl">&#10094;</span>
                </button>

                <button id="next-pengurus"
                    class="absolute right-3 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white w-10 h-10 rounded-full flex items-center justify-center shadow-md z-10"
                    aria-label="Slide berikutnya">
                    <span class="text-xl">&#10095;</span>
                </button>
            </div>

            <div id="accordion-pengurus" data-accordion="collapse" class="mt-10">
                <h2 id="accordion-pengurus-heading-1">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium text-gray-800 border border-b-0 border-gray-200 rounded-t-xl hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 gap-3"
                        data-accordion-target="#accordion-pengurus-body-1" aria-expanded="false"
                        aria-controls="accordion-pengurus-body-1">
                        <span>Fungsi</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-pengurus-body-1" class="hidden" aria-labelledby="accordion-pengurus-heading-1">
                    <div class="p-5 border border-b-0 border-gray-200 bg-gray-50 text-gray-700 leading-relaxed">
                        Melaksanakan kegiatan untuk mencapai tujuan yang tertuang dalam Anggaran Dasar, Anggaran Rumah
                        Tangga, keputusan Rapat Umum Anggota (RUA) atau Rapat Umum Anggota Luar Biasa (RUALB), dan semua
                        peraturan Asosiasi yang berlaku.
                    </div>
                </div>

                <h2 id="accordion-pengurus-heading-2">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium text-gray-800 border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 gap-3"
                        data-accordion-target="#accordion-pengurus-body-2" aria-expanded="false"
                        aria-controls="accordion-pengurus-body-2">
                        <span>Wewenang dan Tanggung Jawab</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-pengurus-body-2" class="hidden" aria-labelledby="accordion-pengurus-heading-2">
                    <div
                        class="p-5 border border-t-0 border-gray-200 bg-gray-50 text-gray-700 text-justify leading-relaxed space-y-2">
                        <ul class="list-decimal pl-6 space-y-1">
                            <li>Menetapkan dan mengesahkan peraturan Asosiasi.</li>
                            <li>Membentuk Perangkat Kepengurusan.</li>
                            <li>Menetapkan Peraturan Asosiasi mengenai rencana kegiatan dan anggaran tahunan setelah
                                mendapatkan pertimbangan dari Dewan Pengawas.</li>
                            <li>Menyetujui laporan kegiatan tahunan, termasuk laporan keuangan dan mengesahkannya setelah
                                mendapatkan pertimbangan dari Dewan Pengawas yang dituangkan dalam Peraturan Asosiasi.</li>
                            <li>Menetapkan usulan calon anggota Komite Profesi Akuntan Publik.</li>
                            <li>Menetapkan perwakilan dari Asosiasi pada badan atau instansi lain yang relevan.</li>
                            <li>
                                Melakukan segala tindakan dengan persetujuan RUA dan/atau RUALB untuk:
                                <ul class="list-[lower-alpha] pl-6 space-y-1">
                                    <li>membeli, menjual atau dengan cara lain mendapatkan/melepaskan hak atas barang tidak
                                        bergerak;</li>
                                    <li>mengagunkan harta kekayaan milik Asosiasi;</li>
                                    <li>memperoleh dan memberikan pinjaman;</li>
                                    <li>mendirikan suatu usaha baru atau turut serta pada perusahaan baik di dalam maupun di
                                        luar negeri;</li>
                                </ul>
                                sesuai ketentuan Anggaran Dasar dan Anggaran Rumah Tangga.
                            </li>
                            <li>Memberikan kuasa kepada pihak lain untuk mewakili dan bertindak atas nama Asosiasi, dengan
                                cakupan dan jangka waktu tidak lebih dari 12 (dua belas) bulan dengan persetujuan rapat
                                Dewan Pengurus.</li>
                            <li>Menetapkan peraturan kepegawaian Asosiasi termasuk keputusan pengangkatan dan pemberhentian
                                pegawai, penetapan gaji dan fasilitas lainnya termasuk pemberian penghargaan maupun sanksi.
                            </li>
                            <li>Membentuk dan menetapkan Komite Nominasi dan Pemilihan untuk menyelenggarakan Pemilihan
                                Raya.</li>
                            <li>Membentuk dan menetapkan Komite Pelaksana Referendum untuk menyelenggarakan Referendum.</li>
                            <li>Mengangkat dan menetapkan Direktur Eksekutif dan/atau Direktur.</li>
                            <li>Menerima atau menolak permohonan keberatan dari calon Anggota atas keputusan penolakan
                                Komite Keanggotan dan Advokasi untuk menjadi Anggota.</li>
                            <li>Meminta pertimbangan atas suatu kebijakan kepada Dewan Pengawas dalam hal diperlukan.</li>
                            <li>Mengupayakan pendanaan guna membiayai kegiatan Asosiasi.</li>
                            <li>Menetapkan dan mengesahkan hal-hal lain yang menurut Dewan Pengurus perlu dilakukan.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-16">
            <h2 class="text-2xl font-semibold text-gray-800 mb-8 text-center border-b pb-3">Dewan Pengawas</h2>
            @if ($pengawas->isNotEmpty())
                <div class="relative">
                    <div class="overflow-hidden rounded-xl">
                        <div id="carousel-track-pengawas"
                            class="flex transition-transform duration-700 ease-in-out px-2 py-4 space-x-4 snap-x snap-mandatory">
                            @forelse($pengawas as $item)
                                <div class="w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 snap-center">
                                    <div
                                        class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 p-4">
                                        <div class="relative w-full h-52 mb-4">
                                            @if ($item->gambar)
                                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                                    alt="{{ $item->nama }} - {{ $item->jabatan }}"
                                                    class="w-full h-full object-cover rounded-lg" loading="lazy"
                                                    onerror="this.src='{{ asset('images/default-avatar.jpg') }}'; this.classList.add('opacity-75')">
                                            @else
                                                <div
                                                    class="w-full h-full bg-gray-200 rounded-lg flex items-center justify-center">
                                                    <span class="text-gray-500 text-sm">No Image</span>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="text-center">
                                            <h3 class="text-lg font-semibold text-gray-900 line-clamp-1">
                                                {{ $item->nama }}</h3>
                                            <p class="text-gray-600 text-sm line-clamp-2">{{ $item->jabatan }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="w-full text-center py-8">
                                    <p class="text-gray-500 italic">Belum ada data pengawas tersedia.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <button id="prev-pengawas"
                        class="absolute left-3 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white w-10 h-10 rounded-full flex items-center justify-center shadow-md z-10"
                        aria-label="Slide sebelumnya">
                        <span class="text-xl">&#10094;</span>
                    </button>

                    <button id="next-pengawas"
                        class="absolute right-3 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white w-10 h-10 rounded-full flex items-center justify-center shadow-md z-10"
                        aria-label="Slide berikutnya">
                        <span class="text-xl">&#10095;</span>
                    </button>
                </div>
            @else
                <p class="text-center text-gray-500 italic mb-10">Belum ada data pengawas.</p>
            @endif

            <div id="accordion-pengawas" data-accordion="collapse" class="mt-10">
                <h2 id="accordion-pengawas-heading-1">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium text-gray-800 border border-b-0 border-gray-200 rounded-t-xl hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 gap-3"
                        data-accordion-target="#accordion-pengawas-body-1" aria-expanded="false"
                        aria-controls="accordion-pengawas-body-1">
                        <span>Fungsi</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-pengawas-body-1" class="hidden" aria-labelledby="accordion-pengawas-heading-1">
                    <div class="p-5 border border-b-0 border-gray-200 bg-gray-50 text-gray-700 leading-relaxed">
                        Melakukan pengawasan dan memberikan nasihat kepada Dewan Pengurus Asosiasi dalam menjalankan
                        kegiatan kepengurusan.
                    </div>
                </div>

                <h2 id="accordion-pengawas-heading-2">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium text-gray-800 border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 gap-3"
                        data-accordion-target="#accordion-pengawas-body-2" aria-expanded="false"
                        aria-controls="accordion-pengawas-body-2">
                        <span>Wewenang dan Tanggung Jawab</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-pengawas-body-2" class="hidden" aria-labelledby="accordion-pengawas-heading-2">
                    <div
                        class="p-5 border border-t-0 border-gray-200 bg-gray-50 text-gray-700 text-justify leading-relaxed space-y-2">
                        <ul class="list-decimal pl-6 space-y-1">
                            <li>Mengawasi pelaksanaan keputusan RUA dan/atau RUALB yang
                                dilaksanakan oleh Dewan Pengurus;</li>
                            <li>Memberikan persetujuan terhadap usulan pembubaran Asosiasi yang
                                akan diajukan ke RUA atau RUALB;</li>
                            <li>Mengusulkan kepada Dewan Pengurus untuk menyelenggarakan
                                RUALB, disertai dengan agenda yang akan dibahas.</li>
                            <li>Memberikan persetujuan terhadap pemberhentian individu anggota
                                Dewan Pengurus atau anggota Dewan Pengawas dalam rapat
                                koordinasi Dewan Pengurus dan Dewan Pengawas, dan paling lambat
                                dalam RUA atau RUALB berikutnya dilaporkan untuk
                                mempertanggungjawabkan;</li>
                            <li>Menerima atau menolak permohonan keberatan dari Anggota yang
                                dikenakan sanksi oleh Komite Disiplin dan Investigasi;</li>
                            <li>Memberikan saran dan pertimbangan atas suatu kebijakan yang
                                diminta oleh Dewan Pengurus; dan</li>
                            <li>Menetapkan Kantor Akuntan Publik untuk melakukan audit atas
                                laporan keuangan Asosiasi.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        @push('scripts')
            @vite('resources/js/struktur.js')
        @endpush
    </div>
@endsection
