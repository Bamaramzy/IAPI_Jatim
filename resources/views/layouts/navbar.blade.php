<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<header class="sticky top-0 z-50 border-b bg-white shadow-sm" x-data="{ mobileOpen: false }">
    <div class="max-w-7xl mx-auto px-4 lg:px-8 flex items-center justify-between py-3">
        {{-- Logo --}}
        <div class="flex items-center gap-4">
            <a href="{{ url('/') }}" class="block">
                <img src="{{ asset('images/iapi_lengkap.png') }}" alt="IAPI" class="h-12 w-auto object-contain">
            </a>
        </div>

        {{-- Desktop Menu --}}
        <nav class="hidden md:flex gap-6 text-sm text-gray-600">
            <a href="{{ url('/') }}" class="hover:text-gray-900">Beranda</a>

            {{-- Tentang Kami --}}
            <div class="relative group">
                <a href="#" class="hover:text-gray-900 flex items-center">
                    Tentang Kami
                    <svg class="h-4 w-4 ml-1 text-gray-500 group-hover:text-gray-700" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                <div
                    class="absolute left-0 mt-0 w-48 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition">
                    <a href="{{ url('/tentang/sejarah') }}"
                        class="block px-4 py-2 hover:bg-gray-100 text-gray-600 hover:text-gray-900">Sejarah IAPI</a>
                    <a href="{{ url('/tentang/visimisi') }}"
                        class="block px-4 py-2 hover:bg-gray-100 text-gray-600 hover:text-gray-900">Visi & Misi</a>
                    <a href="{{ url('#') }}"
                        class="block px-4 py-2 hover:bg-gray-100 text-gray-600 hover:text-gray-900">Profil</a>
                    <a href="{{ url('/tentang/struktur') }}"
                        class="block px-4 py-2 hover:bg-gray-100 text-gray-600 hover:text-gray-900">Struktur
                        Organisasi</a>
                </div>
            </div>

            {{-- Keanggotaan --}}
            <div class="relative group">
                <a href="#" class="hover:text-gray-900 flex items-center">
                    Keanggotaan
                    <svg class="h-4 w-4 ml-1 text-gray-500 group-hover:text-gray-700" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                <div
                    class="absolute left-0 mt-0 w-64 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition">
                    <a href="{{ url('/keanggotaan/ad-art') }}"
                        class="block px-4 py-2 hover:bg-gray-100 text-gray-600 hover:text-gray-900">AD & ART IAPI</a>
                    <a href="{{ url('/keanggotaan/anggota') }}"
                        class="block px-4 py-2 hover:bg-gray-100 text-gray-600 hover:text-gray-900">Daftar Anggota</a>
                    <a href="{{ url('/keanggotaan/info') }}"
                        class="block px-4 py-2 hover:bg-gray-100 text-gray-600 hover:text-gray-900">Info Keanggotaan</a>
                    <a href="{{ url('/keanggotaan/tata-cara') }}"
                        class="block px-4 py-2 hover:bg-gray-100 text-gray-600 hover:text-gray-900">Tata Cara
                        Pendaftaran</a>
                    <a href="{{ url('/keanggotaan/direktori') }}"
                        class="block px-4 py-2 hover:bg-gray-100 text-gray-600 hover:text-gray-900">Direktori Kantor
                        Akuntan Publik dan Akuntan Publik </a>
                </div>
            </div>

            {{-- Pelatihan --}}
            <div class="relative" x-data="{ open: false }">
                <a href="#" @mouseenter="open = true" @mouseleave="open = false"
                    class="hover:text-gray-900 flex items-center">
                    Pelatihan
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-gray-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                <div x-show="open" x-transition @mouseenter="open = true" @mouseleave="open = false"
                    class="absolute left-0 mt-0 w-72 bg-white shadow-lg rounded-md">
                    <a href="{{ url('/pelatihan/tentang') }}"
                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                        Tentang Pelatihan IAPI
                    </a>
                    <a href="{{ url('/pelatihan/jadwal') }}"
                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                        Jadwal Pelatihan
                    </a>
                    <a href="{{ url('/pelatihan/panduan-ppl') }}"
                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                        Panduan PPL
                    </a>
                    <div x-data="{ openBrevet: false }" @mouseenter="openBrevet = true" @mouseleave="openBrevet = false"
                        class="relative">
                        <a href="#"
                            class="flex items-center justify-between px-4 py-2 text-sm text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                            Brevet Perpajakan
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <div x-show="openBrevet" x-transition
                            class="absolute left-0 top-full mt-1 w-72 bg-white shadow-lg rounded-md">
                            <a href="{{ url('/pelatihan/brevet/a-b') }}"
                                class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                                Brevet A dan B
                            </a>
                            <a href="{{ url('/pelatihan/brevet/c') }}"
                                class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                                Brevet C
                            </a>
                            <a href="{{ url('/pelatihan/brevet/kuasa') }}"
                                class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                                Brevet Kuasa Khusus dan Kuasa Hukum Perpajakan
                            </a>
                            <a href="{{ url('#') }}"
                                class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                                USKP REVIU A
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sertifikasi --}}
            <div x-data="{ openCert: false }" @mouseenter="openCert = true" @mouseleave="openCert = false"
                class="relative">
                <button type="button" class="flex items-center gap-1 hover:text-gray-900">
                    Sertifikasi
                    <svg class="h-4 w-4 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-cloak x-show="openCert" x-transition
                    class="absolute left-0 top-full mt-0 w-72 bg-white shadow-lg rounded-md z-50">
                    <a href="{{ url('/sertifikasi/waiver-ppak') }}"
                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Jumlah Mata Uji Yang
                        Diwaiver</a>
                    <a href="{{ url('/sertifikasi/test-center') }}"
                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Test Center</a>
                    <a href="{{ url('/sertifikasi/cfi') }}"
                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Certified Financial
                        Investigator</a>
                    <a href="{{ url('/sertifikasi/workshop-a-b') }}"
                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Workshop A & B</a>
                    <div x-data="{ openUjian: false }" @mouseenter="openUjian = true" @mouseleave="openUjian = false"
                        class="relative">
                        <button type="button"
                            class="w-full flex items-center justify-between px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">
                            Ujian Profesi Akuntan Publik
                            <svg class="h-3 w-3 text-gray-500" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-cloak x-show="openUjian" x-transition
                            class="absolute left-0 top-full mt-1 w-full bg-white shadow-lg rounded-md z-50">
                            <a href="{{ url('/sertifikasi/ujian/jalur-reguler') }}"
                                class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Jalur Reguler</a>
                            <a href="{{ url('/sertifikasi/ujian/jalur-workshop-penyetaraan') }}"
                                class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Jalur Workshop &
                                Penyetaraan</a>
                            <a href="{{ url('/sertifikasi/ujian/silabus') }}"
                                class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Silabus Ujian, Modul,
                                dan Ilustrasi Soal</a>
                            <a href="{{ url('/sertifikasi/ujian/proses-penerbitan') }}"
                                class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Proses Penerbitan
                                Sertifikasi & Gelar</a>
                            <div x-data="{ openTutorial: false }" @mouseenter="openTutorial = true"
                                @mouseleave="openTutorial = false" class="relative">
                                <button type="button"
                                    class="w-full flex items-center justify-between px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">
                                    Tutorial Pendaftaran
                                    <svg class="h-3 w-3 text-gray-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-cloak x-show="openTutorial" x-transition
                                    class="absolute left-0 top-full mt-1 w-full bg-white shadow-lg rounded-md z-50">
                                    <a href="{{ url('#') }}"
                                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Tutorial Jalur
                                        Reguler</a>
                                    <a href="{{ url('/sertifikasi/ujian/tutorial/workshop-penyetaraan') }}"
                                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Tutorial Jalur
                                        Workshop & Penyetaraan</a>
                                    <a href="{{ url('/sertifikasi/ujian/tutorial/tata-tertib') }}"
                                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Tata Tertib
                                        Pelaksanaan Ujian</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Peraturan --}}
            <div class="relative group">
                <a href="#" class="hover:text-gray-900 flex items-center">
                    Peraturan
                    <svg class="h-4 w-4 ml-1 text-gray-500 group-hover:text-gray-700" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                <div
                    class="absolute left-0 mt-0 w-72 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition">
                    <a href="{{ url('/peraturan/profesi') }}"
                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Peraturan Profesi Akuntan
                        Publik</a>
                    <a href="{{ url('/peraturan/spap') }}"
                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Standar Profesional Akuntan
                        Publik</a>
                    <a href="{{ url('/peraturan/kode-etik') }}"
                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Kode Etik Profesi Akuntan
                        Publik</a>
                </div>
            </div>
        </nav>

        {{-- Login / Dashboard --}}
        <div class="hidden md:block">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-4 py-1 rounded-md bg-gray-800 text-white text-sm">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-1 rounded-md bg-gray-800 text-white text-sm">Login</a>
                @endauth
            @endif
        </div>

        {{-- Hamburger Menu --}}
        <button @click="mobileOpen = !mobileOpen" class="md:hidden p-2 rounded-md text-gray-700 hover:bg-gray-100">
            <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2" x-cloak
        class="fixed inset-x-0 top-[64px] md:hidden bg-white border-t shadow-lg z-50
           max-h-[80vh] overflow-y-auto overscroll-contain rounded-b-xl">
        <nav class="flex flex-col p-4 text-gray-700 space-y-2">

            <!-- Beranda -->
            <a href="{{ url('/') }}" class="py-2 border-b hover:text-gray-900 font-medium">Beranda</a>

            <!-- Tentang Kami -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between w-full py-2 border-b hover:text-gray-900">
                    Tentang Kami
                    <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-180': open }"
                        class="h-4 w-4 text-gray-500 transition-transform duration-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-collapse class="ml-4 border-l pl-4 text-sm space-y-2">
                    <a href="{{ url('/tentang/sejarah') }}" class="block py-1 hover:text-gray-900">Sejarah IAPI</a>
                    <a href="{{ url('/tentang/visimisi') }}" class="block py-1 hover:text-gray-900">Visi & Misi</a>
                    <a href="{{ url('#') }}" class="block py-1 hover:text-gray-900">Profil</a>
                    <a href="{{ url('/tentang/struktur') }}" class="block py-1 hover:text-gray-900">Struktur
                        Organisasi</a>
                </div>
            </div>

            <!-- Keanggotaan -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between w-full py-2 border-b hover:text-gray-900">
                    Keanggotaan
                    <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-180': open }"
                        class="h-4 w-4 text-gray-500 transition-transform duration-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-collapse class="ml-4 border-l pl-4 text-sm space-y-2">
                    <a href="{{ url('/keanggotaan/ad-art') }}" class="block py-1 hover:text-gray-900">AD & ART
                        IAPI</a>
                    <a href="{{ url('/keanggotaan/anggota') }}" class="block py-1 hover:text-gray-900">Daftar
                        Anggota</a>
                    <a href="{{ url('/keanggotaan/info') }}" class="block py-1 hover:text-gray-900">Info
                        Keanggotaan</a>
                    <a href="{{ url('/keanggotaan/tata-cara') }}" class="block py-1 hover:text-gray-900">Tata Cara
                        Pendaftaran</a>
                    <a href="{{ url('/keanggotaan/direktori') }}" class="block py-1 hover:text-gray-900">Direktori
                        Kantor & Akuntan Publik</a>
                </div>
            </div>

            <!-- Pelatihan -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between w-full py-2 border-b hover:text-gray-900">
                    Pelatihan
                    <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-180': open }"
                        class="h-4 w-4 text-gray-500 transition-transform duration-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Level 1 -->
                <div x-show="open" x-collapse class="ml-4 border-l pl-4 text-sm space-y-2">
                    <a href="{{ url('/pelatihan/tentang') }}" class="block py-1 hover:text-gray-900">
                        Tentang Pelatihan IAPI
                    </a>
                    <a href="{{ url('/pelatihan/jadwal') }}" class="block py-1 hover:text-gray-900">
                        Jadwal Pelatihan
                    </a>
                    <a href="{{ url('/pelatihan/panduan-ppl') }}" class="block py-1 hover:text-gray-900">
                        Panduan PPL
                    </a>

                    <!-- Brevet Perpajakan -->
                    <div x-data="{ openBrevet: false }">
                        <button @click="openBrevet = !openBrevet"
                            class="flex justify-between w-full py-1 hover:text-gray-900">
                            Brevet Perpajakan
                            <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-180': openBrevet }"
                                class="h-3 w-3 text-gray-500 transition-transform duration-200" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Level 2 -->
                        <div x-show="openBrevet" x-collapse class="ml-4 border-l pl-4 space-y-1">
                            <a href="{{ url('/pelatihan/brevet/a-b') }}" class="block py-1 hover:text-gray-900">
                                Brevet A dan B
                            </a>
                            <a href="{{ url('/pelatihan/brevet/c') }}" class="block py-1 hover:text-gray-900">
                                Brevet C
                            </a>
                            <a href="{{ url('/pelatihan/brevet/kuasa') }}" class="block py-1 hover:text-gray-900">
                                Brevet Kuasa Khusus & Kuasa Hukum Perpajakan
                            </a>
                            <a href="{{ url('#') }}" class="block py-1 hover:text-gray-900">
                                USKP Reviu A
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sertifikasi -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between w-full py-2 border-b hover:text-gray-900">
                    Sertifikasi
                    <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-180': open }"
                        class="h-4 w-4 text-gray-500 transition-transform duration-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Isi submenu Sertifikasi -->
                <div x-show="open" x-collapse class="ml-4 border-l pl-4 text-sm space-y-2">

                    <a href="{{ url('/sertifikasi/waiver-ppak') }}" class="block py-1 hover:text-gray-900">
                        Jumlah Mata Uji Yang Diwaiver
                    </a>
                    <a href="{{ url('/sertifikasi/test-center') }}" class="block py-1 hover:text-gray-900">
                        Test Center
                    </a>
                    <a href="{{ url('/sertifikasi/workshop-a-b') }}" class="block py-1 hover:text-gray-900">
                        Workshop A & B
                    </a>

                    <!-- Ujian Profesi Akuntan Publik -->
                    <div x-data="{ openUjian: false }">
                        <button @click="openUjian = !openUjian"
                            class="flex justify-between w-full py-1 hover:text-gray-900">
                            Ujian Profesi Akuntan Publik
                            <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-180': openUjian }"
                                class="h-3 w-3 text-gray-500 transition-transform duration-200" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Submenu Ujian -->
                        <div x-show="openUjian" x-collapse class="ml-4 border-l pl-4 space-y-1">
                            <a href="{{ url('/sertifikasi/ujian/jalur-reguler') }}"
                                class="block py-1 hover:text-gray-900">
                                Jalur Reguler
                            </a>
                            <a href="{{ url('/sertifikasi/ujian/jalur-workshop-penyetaraan') }}"
                                class="block py-1 hover:text-gray-900">
                                Jalur Workshop & Penyetaraan
                            </a>
                            <a href="{{ url('/sertifikasi/ujian/silabus') }}" class="block py-1 hover:text-gray-900">
                                Silabus Ujian, Modul, dan Ilustrasi Soal
                            </a>
                            <a href="{{ url('/sertifikasi/ujian/proses-penerbitan') }}"
                                class="block py-1 hover:text-gray-900">
                                Proses Penerbitan Sertifikasi & Gelar
                            </a>

                            <!-- Tutorial Pendaftaran -->
                            <div x-data="{ openTutorial: false }">
                                <button @click="openTutorial = !openTutorial"
                                    class="flex justify-between w-full py-1 hover:text-gray-900">
                                    Tutorial Pendaftaran
                                    <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-180': openTutorial }"
                                        class="h-3 w-3 text-gray-500 transition-transform duration-200" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <div x-show="openTutorial" x-collapse class="ml-4 border-l pl-4 space-y-1">
                                    <a href="{{ url('#') }}" class="block py-1 hover:text-gray-900">
                                        Tutorial Jalur Reguler
                                    </a>
                                    <a href="{{ url('/sertifikasi/ujian/tutorial/workshop-penyetaraan') }}"
                                        class="block py-1 hover:text-gray-900">
                                        Tutorial Jalur Workshop & Penyetaraan
                                    </a>
                                    <a href="{{ url('/sertifikasi/ujian/tutorial/tata-tertib') }}"
                                        class="block py-1 hover:text-gray-900">
                                        Tata Tertib Pelaksanaan Ujian
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Peraturan -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between w-full py-2 border-b hover:text-gray-900">
                    Peraturan
                    <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-180': open }"
                        class="h-4 w-4 text-gray-500 transition-transform duration-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-collapse class="ml-4 border-l pl-4 text-sm space-y-2">
                    <a href="{{ url('/peraturan/profesi') }}" class="block py-1 hover:text-gray-900">Peraturan
                        Profesi</a>
                    <a href="{{ url('/peraturan/spap') }}" class="block py-1 hover:text-gray-900">SPAP</a>
                    <a href="{{ url('/peraturan/kode-etik') }}" class="block py-1 hover:text-gray-900">Kode Etik
                        Profesi</a>
                </div>
            </div>

        </nav>
    </div>

</header>
