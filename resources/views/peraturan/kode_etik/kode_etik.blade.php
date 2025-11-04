@extends('layouts.visitor')

@section('content')
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <h1 class="text-2xl sm:text-3xl font-bold mb-8 sm:mb-10 text-center text-gray-800">
            Kode Etik Profesi Akuntan Publik
        </h1>

        <div class="space-y-4" x-data="{ openItem: null }">
            <div class="border rounded-lg overflow-hidden bg-white shadow-sm">
                <button @click="openItem === 1 ? openItem = null : openItem = 1"
                    class="w-full text-left px-4 sm:px-6 py-3 sm:py-4 font-semibold text-gray-800 hover:bg-blue-50 flex items-center justify-between gap-3">
                    <span class="truncate">Kode Etik Profesi Akuntan Publik 2019</span>
                    <svg :class="openItem === 1 ? 'rotate-180' : ''"
                        class="w-5 h-5 text-gray-600 transform transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="openItem === 1" x-collapse x-transition
                    class="px-4 sm:px-6 pb-4 sm:pb-6 text-gray-700 leading-relaxed space-y-4">
                    <p>
                        Kode Etik Profesi Akuntan Publik (KEPAP) 2019 berlaku efektif 1 Juli 2019.
                        KEPAP 2019 diadopsi dari <em>Code of Ethics from International Ethics Standards
                            Boards for Accountants 2016 Edition</em> tanpa memasukkan <em>Non-Compliance with Laws &
                            Regulations (NOCLAR)</em>.
                    </p>

                    <p>Penyajian pengaturan dalam KEPAP 2019 terbagi dalam tiga bagian:</p>

                    <ul class="list-decimal pl-5 sm:pl-6 space-y-1">
                        <li>Bagian A: Penerapan Umum Kode Etik;</li>
                        <li>Bagian B: Akuntan Publik atau CPA yang Berpraktik Melayani Publik;</li>
                        <li>Bagian C: CPA yang Bekerja pada Entitas Bisnis.</li>
                    </ul>

                    <div class="pt-4 border-t">
                        <ul class="flex flex-wrap gap-2">
                            <li>
                                <a href="https://drive.google.com/file/d/19NDTTXe6JllNohZ0Vtwd6SrdqaLOko9d/preview"
                                    target="_blank"
                                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    PDF
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="border rounded-lg overflow-hidden bg-white shadow-sm">
                <button @click="openItem === 2 ? openItem = null : openItem = 2"
                    class="w-full text-left px-4 sm:px-6 py-3 sm:py-4 font-semibold text-gray-800 hover:bg-blue-50 flex items-center justify-between gap-3">
                    <span>Kode Etik Profesi Akuntan Publik 2020</span>
                    <svg :class="openItem === 2 ? 'rotate-180' : ''"
                        class="w-5 h-5 text-gray-600 transform transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="openItem === 2" x-collapse x-transition
                    class="px-4 sm:px-6 pb-4 sm:pb-6 text-gray-700 leading-relaxed space-y-4">
                    <p>
                        Kode Etik Profesi Akuntan Publik (KEPAP) 2020 berlaku efektif 1 Juli 2020,
                        kecuali bagian 4A Seksi 540 akan berlaku efektif untuk audit dan reviu Laporan
                        Keuangan untuk periode yang dimulai pada atau setelah 1 Januari 2022.
                    </p>

                    <p>
                        Kode Etik Profesi Akuntan Publik mengadopsi
                        <em>Handbook of the International Code of Ethics for Professional Accountants
                            including International Independence Standards 2018 Edition</em>
                        yang diterbitkan oleh International Ethics Standards Board for Accountants (IESBA).
                    </p>

                    <p>
                        Penyajian pengaturan dalam KEPAP 2020 terbagi dalam lima bagian, yaitu:
                    </p>

                    <ul class="flex flex-wrap gap-2">
                        <li>Bagian 1: Kepatuhan Terhadap Kode Etik, Prinsip Dasar Etika dan Kerangka Kerja Konseptual;</li>
                        <li>Bagian 2: Anggota yang Bekerja di Bisnis;</li>
                        <li>Bagian 3: Anggota yang Berpraktik Melayani Publik;</li>
                        <li>Bagian 4A: Independensi dalam Perikatan Audit dan Perikatan Reviu; dan</li>
                        <li>Bagian 4B: Independensi dalam Perikatan Asurans Selain Perikatan Audit dan Reviu.</li>
                    </ul>

                    <p>Dalam KEPAP 2020, terdapat pengaturan terkait:</p>

                    <ul class="flex flex-wrap gap-2">
                        <li>
                            <strong>NOCLAR</strong> (Non-Compliance with Laws and Regulations) yang sejalan
                            dengan peraturan dari berbagai otoritas. Bagian 2 paragraf 260 mengatur NOCLAR
                            bagi anggota yang bekerja di bisnis, sedangkan Bagian 3 paragraf 360 mengatur NOCLAR
                            bagi anggota yang berpraktik melayani publik.
                        </li>
                        <li>
                            Ketentuan tentang <strong>hubungan yang berlangsung lama antara personel</strong>
                            (termasuk rotasi tiga kategori Rekan yang terlibat dalam penugasan audit atau reviu atas
                            laporan keuangan untuk entitas berakuntabilitas publik) yang mencakup ketentuan periode jeda
                            (<em>cooling-off period</em>) yang lebih lama dibandingkan dengan pengaturan sebelumnya.
                        </li>
                    </ul>
                    <div class="pt-4 border-t">
                        <ul class="flex flex-wrap gap-2">
                            <li><a href="https://drive.google.com/file/d/1FuDt1o7xYT_bTH9fYthRWNNFkRNmkzoP/preview"
                                    target="_blank"
                                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    PDF
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="border rounded-lg overflow-hidden bg-white shadow-sm">
                <button @click="openItem === 3 ? openItem = null : openItem = 3"
                    class="w-full text-left px-4 sm:px-6 py-3 sm:py-4 font-semibold text-gray-800 hover:bg-blue-50 flex items-center justify-between gap-3">
                    <span>Close-Off Document – Kode Etik Profesi Akuntan Publik (2021)</span>
                    <svg :class="openItem === 3 ? 'rotate-180' : ''"
                        class="w-5 h-5 text-gray-600 transform transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="openItem === 3" x-collapse x-transition
                    class="px-4 sm:px-6 pb-4 sm:pb-6 text-gray-700 leading-relaxed space-y-4">

                    <p>
                        Close-off document ini diterbitkan sebagai pengaturan lebih lanjut terhadap
                        Kode Etik Profesi Akuntan Publik (KEPAP) efektif 1 Juli 2020 yang secara spesifik
                        mengatur ketentuan transisi periode jeda yang tidak dapat dipisahkan dalam Seksi 540 KEPAP
                        dan berlaku efektif untuk perikatan audit dan reviu atas laporan keuangan untuk periode
                        yang dimulai pada atau setelah tanggal 1 Januari 2021.
                    </p>

                    <p>
                        Terminologi <strong>Close-Off Document</strong> dalam bagian-bagian selanjutnya
                        merujuk pada dan menjadi pengaturan tambahan paragraf P540.19 KEPAP efektif 1 Juli 2020
                        untuk disesuaikan dengan ketentuan dalam
                        <em>Peraturan Pemerintah (PP) Nomor 20 Tahun 2015</em> dan
                        <em>Peraturan Otoritas Jasa Keuangan (POJK) Nomor 13/POJK.03/2017</em>.
                    </p>
                    <div class="pt-4 border-t">
                        <ul class="flex flex-wrap gap-2">
                            <li><a href="https://drive.google.com/file/d/1Cv2243BYYqwNE0HEo_LUI_IOmqOK1csO/preview"
                                    target="_blank"
                                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    PDF
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="border rounded-lg overflow-hidden bg-white shadow-sm">
                <button @click="openItem === 4 ? openItem = null : openItem = 4"
                    class="w-full text-left px-4 sm:px-6 py-3 sm:py-4 font-semibold text-gray-800 hover:bg-blue-50 flex items-center justify-between gap-3">
                    <span>Kode Etik Profesi Akuntan Publik 2021</span>
                    <svg :class="openItem === 4 ? 'rotate-180' : ''"
                        class="w-5 h-5 text-gray-600 transform transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="openItem === 4" x-collapse x-transition
                    class="px-4 sm:px-6 pb-4 sm:pb-6 text-gray-700 leading-relaxed space-y-4">

                    <p><strong>Kode Etik Profesi Akuntan Publik (KEPAP) 2021</strong> berlaku efektif 31 Desember 2021.</p>

                    <p>
                        KEPAP 2021 merupakan revisi dari KEPAP 2020 yang diadopsi dari
                        <em>Handbook of the International Code of Ethics for Professional Accountants including
                            International Independence Standards 2018 Edition</em>
                        yang diterbitkan oleh International Ethics Standards Board for Accountants (IESBA).
                    </p>

                    <p>
                        Penambahan revisi mencakup pengadopsian
                        <em>Final Pronouncement Revisions to the Code to Promote the Role and Mindset Expected of
                            Professional Accountants</em>
                        yang diterbitkan oleh IESBA pada Oktober 2020.
                    </p>

                    <p>
                        KEPAP 2021 juga mencantumkan pengaturan lebih lanjut terkait
                        <strong>Hubungan yang Berlangsung Lama antara Personel (termasuk Rotasi Rekan) dengan Klien
                            Audit</strong>
                        yang sebelumnya tercantum dalam <em>Close-Off Document</em> yang diterbitkan oleh IAPI pada 28
                        Desember 2020,
                        serta perubahan definisi istilah <strong>“keluarga dekat”</strong> dari KEPAP 2020.
                    </p>
                    <div class="pt-4 border-t">
                        <h4 class="font-semibold text-gray-800 mb-2">Download</h4>
                        <ul class="flex flex-wrap gap-2">
                            <li><a href="https://drive.google.com/file/d/1WGH_kRXjEv9twCgPkIjmde4IwSSwaDmX/preview"
                                    target="_blank"
                                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    PDF
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="border rounded-lg overflow-hidden bg-white shadow-sm">
                <button @click="openItem === 5 ? openItem = null : openItem = 5"
                    class="w-full text-left px-4 sm:px-6 py-3 sm:py-4 font-semibold text-gray-800 hover:bg-blue-50 flex items-center justify-between gap-3">
                    <span>Revisi Terhadap Ketentuan-ketentuan Kode Etik yang berkaitan dengan Imbalan</span>
                    <svg :class="openItem === 5 ? 'rotate-180' : ''"
                        class="w-5 h-5 text-gray-600 transform transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="openItem === 5" x-collapse x-transition
                    class="px-4 sm:px-6 pb-4 sm:pb-6 text-gray-700 leading-relaxed space-y-4">
                    <p>
                        Komite Etika Profesi <strong>Institut Akuntan Publik Indonesia (IAPI)</strong>,
                        bersama-sama dengan Dewan Kode Etik <strong>Ikatan Akuntan Indonesia (IAI)</strong>
                        dan Komite Etika <strong>Institut Akuntan Manajemen Indonesia (IAMI)</strong>,
                        serta didukung oleh <strong>Pusat Pembinaan Profesi Keuangan – Sekretariat Jenderal
                            Kementerian Keuangan Republik Indonesia</strong>, telah menetapkan dan mengesahkan
                        <strong>Revisi Terhadap Ketentuan-Ketentuan Kode Etik yang berkaitan dengan Imbalan</strong>
                        dan <strong>Revisi Terhadap Ketentuan-Ketentuan Kode Etik yang berkaitan dengan Jasa
                            Nonasurans</strong>
                        pada tanggal <strong>1 Desember 2023</strong>.
                    </p>

                    <p>
                        Revisi ini berlaku efektif untuk periode yang dimulai pada atau setelah
                        <strong>1 Januari 2024</strong>.
                    </p>

                    <p>
                        Naskah revisi tersebut disusun dengan mengacu pada
                        <em>Final Pronouncement Revisions to the Fee-Related Provisions of the Code 2021 Edition</em>
                        dan
                        <em>Final Pronouncement Revisions to the Non-Assurance Services Provisions of the Code 2021
                            Edition</em>
                        yang diterbitkan oleh
                        <strong>The International Ethics Standards Board for Accountants (IESBA)</strong> –
                        <strong>International Federation of Accountants (IFAC)</strong>.
                    </p>
                    <div class="pt-4 border-t">
                        <ul class="flex flex-wrap gap-2">
                            <li><a href="https://drive.google.com/file/d/1T-TrXWTa_f1D9vJ0-U32qbOx3md8DpVv/preview"
                                    target="_blank"
                                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    PDF
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="border rounded-lg overflow-hidden bg-white shadow-sm">
                <button @click="openItem === 6 ? openItem = null : openItem = 6"
                    class="w-full text-left px-4 sm:px-6 py-3 sm:py-4 font-semibold text-gray-800 hover:bg-blue-50 flex items-center justify-between gap-3">
                    <span>Revisi Terhadap Ketentuan-ketentuan Kode Etik yang berkaitan dengan Jasa Nonasurans</span>
                    <svg :class="openItem === 6 ? 'rotate-180' : ''"
                        class="w-5 h-5 text-gray-600 transform transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="openItem === 6" x-collapse x-transition
                    class="px-4 sm:px-6 pb-4 sm:pb-6 text-gray-700 leading-relaxed space-y-4">
                    <p>
                        Komite Etika Profesi <strong>Institut Akuntan Publik Indonesia (IAPI)</strong>,
                        bersama-sama dengan Dewan Kode Etik <strong>Ikatan Akuntan Indonesia (IAI)</strong>
                        dan Komite Etika <strong>Institut Akuntan Manajemen Indonesia (IAMI)</strong>,
                        serta didukung oleh <strong>Pusat Pembinaan Profesi Keuangan – Sekretariat Jenderal
                            Kementerian Keuangan Republik Indonesia</strong>, telah menetapkan dan mengesahkan
                        <strong>Revisi Terhadap Ketentuan-Ketentuan Kode Etik yang berkaitan dengan Imbalan</strong>
                        dan <strong>Revisi Terhadap Ketentuan-Ketentuan Kode Etik yang berkaitan dengan Jasa
                            Nonasurans</strong>
                        pada tanggal <strong>1 Desember 2023</strong> yang berlaku efektif untuk periode yang dimulai
                        pada atau setelah <strong>1 Januari 2024</strong>.
                    </p>

                    <p>
                        Naskah Revisi Terhadap Ketentuan-Ketentuan Kode Etik ini disusun dengan mengacu pada
                        <em>Final Pronouncement Revisions to the Fee-Related Provisions of the Code 2021 Edition</em>
                        dan <em>Final Pronouncement Revisions to the Non-Assurance Services Provisions of the Code 2021
                            Edition</em>
                        yang diterbitkan oleh
                        <strong>The International Ethics Standards Board for Accountants (IESBA)</strong> –
                        <strong>International Federation of Accountants (IFAC)</strong>.
                    </p>

                    <div class="pt-4 border-t">
                        <ul class="flex flex-wrap gap-2">
                            <li><a href="https://drive.google.com/file/d/11vtiJvdsH2iIRoAuUjGITuzUgZ9DUJhW/preview"
                                    target="_blank"
                                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    PDF
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="border rounded-lg overflow-hidden bg-white shadow-sm">
                <button @click="openItem === 7 ? openItem = null : openItem = 7"
                    class="w-full text-left px-4 sm:px-6 py-3 sm:py-4 font-semibold text-gray-800 hover:bg-blue-50 flex items-center justify-between gap-3">
                    <span>Revisi Kode Etik Bagian 4B serta Penyesuaian Terhadap SPA 3000 (Revisi 2022)</span>
                    <svg :class="openItem === 7 ? 'rotate-180' : ''"
                        class="w-5 h-5 text-gray-600 transform transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="openItem === 7" x-collapse x-transition
                    class="px-4 sm:px-6 pb-4 sm:pb-6 text-gray-700 leading-relaxed space-y-4">
                    <p>
                        Pada tanggal <strong>10 Desember 2024</strong>,
                        <strong>Komite Etika Profesi (KEP) – Institut Akuntan Publik Indonesia (IAPI)</strong>
                        telah menyetujui penerbitan Naskah Final:
                    </p>

                    <ul class="list-decimal list-inside space-y-1 ml-3">
                        <li>Revisi Kode Etik Bagian 4B serta Penyesuaian Terhadap SPA 3000 (Revisi 2022);</li>
                        <li>Revisi Kode Etik yang Mengatur Objektivitas Penelaah Mutu Perikatan dan Penelaah Lainnya yang
                            Tepat; dan</li>
                        <li>Amendemen yang Bersifat Penyesuaian terkait Manajemen Mutu terhadap Kode Etik.</li>
                    </ul>

                    <p>
                        <strong>Revisi Kode Etik Bagian 4B</strong> serta Penyesuaian Terhadap SPA 3000 (Revisi 2022)
                        merupakan adopsi dari
                        <em>Final Pronouncement Revisions to Part 4B of the Code to Reflect Terms and Concepts Used in
                            International Standard on Assurance Engagements 3000 (Revised) (January 2020)</em>
                        yang diterbitkan oleh <strong>IESBA – IFAC</strong>,
                        serta menyesuaikan atas dokumen Revisi Ketentuan Kode Etik terkait Imbalan dan Jasa Nonasurans.
                    </p>

                    <p>
                        <strong>Revisi Kode Etik yang Mengatur Objektivitas Penelaah Mutu Perikatan dan Penelaah Lainnya
                            yang Tepat</strong>
                        merupakan adopsi dari
                        <em>Final Pronouncement Revisions to the Code Addressing the Objectivity of an Engagement Quality
                            Reviewer
                            and Other Appropriate Reviewers (January 2021)</em>
                        yang diterbitkan oleh <strong>IESBA – IFAC</strong>.
                        Revisi ini menyesuaikan dengan <strong>Standar Manajemen Mutu (SMM) 2</strong>,
                        “Penelaahan Mutu Perikatan”.
                    </p>

                    <p>
                        <strong>Amendemen yang Bersifat Penyesuaian terkait Manajemen Mutu terhadap Kode Etik</strong>
                        merupakan adopsi dari
                        <em>Final Pronouncement Quality Management-related Conforming Amendments to the Code (April
                            2022)</em>
                        yang diterbitkan oleh <strong>International Ethics Standards Board for Accountants (IESBA)</strong>
                        –
                        <strong>International Federation of Accountants (IFAC)</strong>.
                        Amendemen ini menyesuaikan terhadap <strong>Standar Manajemen Mutu (SMM) 1</strong>,
                        “Manajemen Mutu bagi Kantor Akuntan Publik yang Melaksanakan Perikatan Audit atau Reviu atas
                        Laporan Keuangan atau Perikatan Asurans Lainnya atau Perikatan Jasa Terkait”.
                    </p>
                    <div class="pt-4 border-t">
                        <ul class="flex flex-wrap gap-2">
                            <li><a href="https://drive.google.com/file/u/0/d/1gJGPU-un5qGFc308Inv6VKfS2B8JIdvT/preview"
                                    target="_blank"
                                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    PDF
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="border rounded-lg overflow-hidden bg-white shadow-sm">
                <button @click="openItem === 8 ? openItem = null : openItem = 8"
                    class="w-full text-left px-4 sm:px-6 py-3 sm:py-4 font-semibold text-gray-800 hover:bg-blue-50 flex items-center justify-between gap-3">
                    <span>Revisi Definisi Entitas Terdaftar di Pasar Modal & Entitas dengan Akuntabilitas Publik</span>
                    <svg :class="openItem === 8 ? 'rotate-180' : ''"
                        class="w-5 h-5 text-gray-600 transform transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="openItem === 8" x-collapse x-transition
                    class="px-4 sm:px-6 pb-5 text-gray-700 leading-relaxed space-y-5">
                    <p>
                        <strong>Kode Etik Profesi Akuntan Publik – Revisi Terhadap Definisi Entitas yang Terdaftar di Pasar
                            Modal dan Entitas dengan Akuntabilitas Publik</strong>
                        disusun dengan mengacu pada
                        <em>Final Pronouncement – Revisions to the Definitions of Listed Entity and Public Interest Entity
                            in the Code</em>
                        yang diterbitkan oleh
                        <strong>The International Ethics Standards Board for Accountants (IESBA)</strong> –
                        <strong>International Federation of Accountants (IFAC)</strong>.
                    </p>

                    <p>
                        Revisi ini menggantikan ketentuan terkait entitas yang terdaftar di pasar modal dan entitas dengan
                        akuntabilitas publik dalam
                        <strong>Kode Etik Profesi Akuntan Publik 2021</strong>,
                        dan <strong>berlaku efektif untuk audit atas laporan keuangan untuk periode yang dimulai pada atau
                            setelah 31 Desember 2025</strong>,
                        dengan penerapan dini diperkenankan.
                    </p>

                    <p>Revisi ini mencakup beberapa hal penting berikut:</p>

                    <ol class="list-decimal pl-6 space-y-2">
                        <li>Memperkenalkan tujuan menyeluruh untuk ketentuan independensi tambahan bagi entitas dengan
                            akuntabilitas publik.</li>
                        <li>Memberikan panduan mengenai faktor-faktor yang menjadi pertimbangan dalam menentukan tingkat
                            kepentingan publik terhadap suatu entitas.</li>
                        <li>Memperluas definisi entitas dengan akuntabilitas publik yang ada saat ini, dan menambahkan
                            kategori
                            baru yang harus dipertimbangkan.</li>
                        <li>Mengganti istilah <em>“entitas yang terdaftar di pasar modal”</em> dengan kategori baru:
                            <strong>“entitas yang instrumen keuangannya diperdagangkan secara publik”</strong>.
                        </li>
                        <li>Mengembangkan materi aplikasi yang mendorong kantor untuk mempertimbangkan apakah entitas lain
                            (yang
                            belum diatur) seharusnya diperlakukan sebagai entitas dengan akuntabilitas publik sesuai
                            persyaratan
                            Kode Etik.</li>
                        <li>Mewajibkan kantor untuk melakukan pengungkapan apabila suatu klien audit telah diperlakukan
                            sebagai
                            entitas dengan akuntabilitas publik.</li>
                    </ol>

                    <div class="pt-5 border-t border-gray-200">
                        <ul class="flex flex-wrap gap-2">
                            <li>
                                <a href="https://drive.google.com/file/d/12mfkrpec-yJtXW1Ar_gNS_Ivftp5dRCg/preview"
                                    target="_blank"
                                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    PDF 1
                                </a>
                            </li>
                            <li>
                                <a href="https://drive.google.com/file/d/10Z2tInhAKZYbVGlXYPM-NlrCImktP41s/preview"
                                    target="_blank"
                                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    PDF 2
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
