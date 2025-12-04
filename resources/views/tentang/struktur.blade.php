@extends('layouts.visitor')

@section('content')
    <div class="max-w-5xl mx-auto px-6 py-12 mt-2 bg-white shadow-md rounded-lg" x-data="{ openItem: null }">
        <h1 class="text-3xl font-bold mb-10 text-center text-gray-900">
            Struktur Organisasi
        </h1>

        <section class="mb-16">
            <h2 class="text-2xl font-semibold text-gray-800 mb-8 text-center border-b pb-3">Dewan Pengurus Korda Jatim</h2>
            <div class="relative">
                <div class="overflow-hidden rounded-xl">
                    <div id="carousel-track-pengurus"
                        class="flex px-2 py-4 space-x-4 snap-x snap-mandatory overflow-x-auto scrollbar-hide">
                        @forelse($pengurus as $item)
                            <div class="w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 snap-center">
                                <div
                                    class="bg-white rounded-xl overflow-hidden border border-gray-300 shadow hover:shadow-lg hover:-translate-y-1 transition-all duration-300 p-4">
                                    <div class="relative w-full h-52 mb-4">
                                        @if ($item->gambar)
                                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                                alt="{{ $item->nama }} - {{ $item->jabatan }}"
                                                class="w-full h-full object-cover object-top rounded-lg border border-gray-100"
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

            <div class="mt-10 space-y-4">
                <div class="border rounded-lg overflow-hidden bg-white shadow-sm">
                    <button @click="openItem === 1 ? openItem = null : openItem = 1"
                        class="w-full text-left px-5 py-4 font-semibold text-gray-800 hover:bg-blue-50 flex justify-between items-center">
                        <span>Fungsi</span>
                        <svg :class="openItem === 1 ? 'rotate-180' : ''"
                            class="w-5 h-5 text-gray-600 transform transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="openItem === 1" x-collapse x-transition
                        class="px-5 pb-5 text-gray-700 leading-relaxed space-y-4">
                        <p>
                            Melaksanakan kegiatan untuk mencapai tujuan yang tertuang dalam Anggaran Dasar, Anggaran Rumah
                            Tangga, keputusan Rapat Umum Anggota (RUA) atau Rapat Umum Anggota Luar Biasa (RUALB), dan semua
                            peraturan Asosiasi yang berlaku.
                        </p>
                    </div>
                </div>

                <div class="border rounded-lg overflow-hidden bg-white shadow-sm">
                    <button @click="openItem === 2 ? openItem = null : openItem = 2"
                        class="w-full text-left px-5 py-4 font-semibold text-gray-800 hover:bg-blue-50 flex justify-between items-center">
                        <span>Wewenang dan Tanggung Jawab</span>
                        <svg :class="openItem === 2 ? 'rotate-180' : ''"
                            class="w-5 h-5 text-gray-600 transform transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="openItem === 2" x-collapse x-transition
                        class="px-5 pb-5 text-gray-700 leading-relaxed space-y-4">
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
                            class="flex px-2 py-4 space-x-4 snap-x snap-mandatory overflow-x-auto scrollbar-hide">
                            @forelse($pengawas as $item)
                                <div class="w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 snap-center">
                                    <div
                                        class="bg-white rounded-xl overflow-hidden border border-gray-300 shadow hover:shadow-lg hover:-translate-y-1 transition-all duration-300 p-4">
                                        <div class="relative w-full h-52 mb-4">
                                            @if ($item->gambar)
                                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                                    alt="{{ $item->nama }} - {{ $item->jabatan }}"
                                                    class="w-full h-full object-cover object-top rounded-lg border border-gray-100"
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

            <div class="mt-10 space-y-4">
                <div class="border rounded-lg overflow-hidden bg-white shadow-sm">
                    <button @click="openItem === 3 ? openItem = null : openItem = 3"
                        class="w-full text-left px-5 py-4 font-semibold text-gray-800 hover:bg-blue-50 flex justify-between items-center">
                        <span>Fungsi</span>
                        <svg :class="openItem === 3 ? 'rotate-180' : ''"
                            class="w-5 h-5 text-gray-600 transform transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="openItem === 3" x-collapse x-transition
                        class="px-5 pb-5 text-gray-700 leading-relaxed space-y-4">
                        <p>
                            Melakukan pengawasan dan memberikan nasihat kepada Dewan Pengurus Asosiasi dalam menjalankan
                            kegiatan kepengurusan.
                        </p>
                    </div>
                </div>

                <div class="border rounded-lg overflow-hidden bg-white shadow-sm">
                    <button @click="openItem === 4 ? openItem = null : openItem = 4"
                        class="w-full text-left px-5 py-4 font-semibold text-gray-800 hover:bg-blue-50 flex justify-between items-center">
                        <span>Wewenang dan Tanggung Jawab</span>
                        <svg :class="openItem === 4 ? 'rotate-180' : ''"
                            class="w-5 h-5 text-gray-600 transform transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="openItem === 4" x-collapse x-transition
                        class="px-5 pb-5 text-gray-700 leading-relaxed space-y-4">
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
