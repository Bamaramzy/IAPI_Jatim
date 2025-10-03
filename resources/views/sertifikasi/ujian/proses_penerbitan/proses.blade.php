@extends('layouts.visitor')

@section('content')
    <section class="py-12 px-4 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto">

            {{-- ✅ Judul --}}
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-8">
                📑 Proses Penerbitan Sertifikat dan Gelar Berdasarkan PA 10/2021
            </h2>

            {{-- ✅ Tabs --}}
            <div x-data="{ tab: 'dasar' }" class="bg-white rounded shadow p-6">
                <div class="flex border-b mb-6">
                    <button class="px-4 py-2 text-sm font-medium"
                        :class="tab === 'dasar' ? 'border-b-2 border-blue-600 text-blue-600' : ''" @click="tab = 'dasar'">
                        A. Tingkat Dasar
                    </button>
                    <button class="px-4 py-2 text-sm font-medium"
                        :class="tab === 'profesional' ? 'border-b-2 border-blue-600 text-blue-600' : ''"
                        @click="tab = 'profesional'">
                        B. Tingkat Profesional
                    </button>
                    <button class="px-4 py-2 text-sm font-medium"
                        :class="tab === 'audit' ? 'border-b-2 border-blue-600 text-blue-600' : ''"
                        @click="tab = 'audit'">
                        C. Penilaian Pengalaman Audit
                    </button>
                </div>

                {{-- ✅ Tingkat Dasar --}}
                <div x-show="tab === 'dasar'" class="space-y-8">

                    {{-- Bagian 1: STLU-CPA --}}
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-xl font-semibold text-blue-700 mb-4">
                            📘 Surat Tanda Lulus Ujian Profesi Akuntan Publik (STLU-CPA)
                        </h3>
                        <p class="text-gray-700 mb-4">
                            <strong>Institut menerbitkan STLU-CPA</strong> bagi peserta yang memenuhi seluruh persyaratan
                            berikut:
                        </p>
                        <ol class="list-decimal ml-6 space-y-2 text-gray-700">
                            <li>Telah dinyatakan lulus pada setiap mata ujian tingkat dasar atau mendapat <i>waiver</i>.
                            </li>
                            <li>Telah dinyatakan lulus pada setiap mata ujian tingkat profesional atau mendapat
                                <i>waiver</i>.
                            </li>
                            <li>Menjadi anggota Institut.</li>
                            <li>Lulus pendidikan sesuai ketentuan.</li>
                            <li>Menandatangani surat pernyataan kesanggupan pemenuhan kewajiban sebagai pemegang sertifikat
                                CPA.</li>
                            <li>Menandatangani surat pernyataan kesediaan mengikuti ketentuan Institut dalam hal pengajuan
                                izin Akuntan Publik.</li>
                            <li>Memenuhi kewajiban iuran tahunan atau kewajiban keuangan lainnya.</li>
                            <li>Memenuhi kewajiban SKP sesuai ketentuan.</li>
                        </ol>
                    </div>

                    {{-- Bagian 2: J-CPA --}}
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-xl font-semibold text-green-700 mb-4">
                            🎓 Sertifikat J-CPA
                        </h3>
                        <p class="text-gray-700 mb-4">
                            Sertifikat ujian tingkat dasar berupa <strong>J-CPA</strong> diterbitkan untuk Peserta dengan
                            pendidikan
                            <strong>D-III Akuntansi</strong> yang telah memenuhi syarat berikut:
                        </p>
                        <ol class="list-decimal ml-6 space-y-2 text-gray-700">
                            <li>Menjadi anggota di Institut.</li>
                            <li>Menandatangani surat pernyataan kesanggupan mematuhi etika Dewan Sertifikasi.</li>
                            <li>Lulus atau mendapat <i>waiver</i> untuk mata ujian sebagaimana dimaksud Pasal 6 ayat (2)
                                huruf a dan huruf b <strong>Akuntansi dan Pelaporan Keuangan</strong>
                                serta <strong>Pengantar Auditing dan Asurans</strong>.</li>
                            <li>Melampirkan bukti ijazah D-III Akuntansi.</li>
                            <li>Melampirkan surat keterangan magang atau pengalaman kerja minimal 3 bulan.</li>
                            <li>Menandatangani surat pernyataan kesanggupan pemenuhan kewajiban sebagai pemegang J-CPA dan
                                Pakta Integritas.</li>
                            <li>Menandatangani surat pernyataan kesediaan mengikuti ketentuan Institut terkait STL-UPAP dan
                                izin Akuntan Publik.</li>
                        </ol>
                    </div>

                    {{-- Bagian 3: A-CPA --}}
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-xl font-semibold text-purple-700 mb-4">
                            🏅 Sertifikat A-CPA
                        </h3>
                        <p class="text-gray-700 mb-4">
                            Peserta yang telah lulus atau mendapatkan <i>waiver</i> untuk seluruh mata ujian tingkat dasar
                            berhak
                            memperoleh <strong>A-CPA</strong>, dengan syarat:
                        </p>
                        <ol class="list-decimal ml-6 space-y-2 text-gray-700">
                            <li>Menjadi anggota di Institut.</li>
                            <li>Lulus 5 (lima) mata ujian tingkat dasar sesuai ketentuan. Sebagaimana dimaksud pada Pasal 6
                                ayat (2)</li>
                            <li>Menandatangani surat pernyataan kesanggupan mematuhi etika Dewan Sertifikasi.</li>
                            <li>Melampirkan bukti ijazah atau surat keterangan lulus pendidikan bidang akuntansi (S-1, S-2,
                                S-3, D-IV, atau PPAK).</li>
                            <li>Melampirkan laporan magang atau pengalaman kerja minimal 3 bulan (di KAP atau entitas lain).
                            </li>
                            <li>Menandatangani surat pernyataan kesanggupan pemenuhan kewajiban sebagai pemegang A-CPA dan
                                Pakta Integritas.</li>
                            <li>Menandatangani surat pernyataan kesediaan mengikuti ketentuan Institut terkait STL-UPAP dan
                                izin Akuntan Publik.</li>
                        </ol>
                    </div>

                    {{-- Catatan --}}
                    <p class="text-gray-600 italic">
                        ✨ J-CPA atau A-CPA merupakan sebutan resmi yang dapat digunakan pemegang sertifikat di belakang
                        namanya.
                    </p>
                </div>
                {{-- ✅ Tingkat Profesional --}}
                <div x-show="tab === 'profesional'" class="space-y-8">
                    {{-- Bagian 1: STLU-CPA Tingkat Profesional --}}
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-xl font-semibold text-blue-700 mb-4">
                            📘 Surat Tanda Lulus Ujian Profesi Akuntan Publik (STLU-CPA) – Tingkat Profesional
                        </h3>
                        <p class="text-gray-700 mb-4">
                            Institut menerbitkan <strong>STLU-CPA</strong> bagi peserta Ujian Profesi Akuntan Publik yang
                            memenuhi syarat berikut:
                        </p>
                        <ol class="list-decimal ml-6 space-y-2 text-gray-700">
                            <li>Lulus semua mata ujian tingkat dasar atau mendapat <i>waiver</i> (dibuktikan dengan surat
                                keterangan lulus dari Dewan Sertifikasi).</li>
                            <li>Lulus semua mata ujian tingkat profesional atau mendapat <i>waiver</i> (dibuktikan dengan
                                surat keterangan lulus dari Dewan Sertifikasi).</li>
                            <li>Menjadi anggota di Institut.</li>
                            <li>Lulus pendidikan sesuai ketentuan di Institut atau telah terdaftar dalam register negara
                                untuk akuntan.</li>
                            <li>Menandatangani surat pernyataan kesanggupan pemenuhan kewajiban sebagai pemegang sertifikat
                                CPA dan Pakta Integritas.</li>
                            <li>Menandatangani surat pernyataan kesediaan mengikuti ketentuan Institut dalam hal pengajuan
                                izin Akuntan Publik.</li>
                            <li>Memenuhi kewajiban iuran tahunan dan/atau kewajiban lainnya.</li>
                            <li>Memenuhi kewajiban SKP sesuai ketentuan Institut.</li>
                        </ol>
                    </div>
                    {{-- Bagian 2: Sertifikat CPA --}}
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-xl font-semibold text-green-700 mb-4">
                            🏅 Sertifikat CPA
                        </h3>
                        <p class="text-gray-700 mb-4">
                            <strong>Untuk memenuhi ketentuan Anggaran Rumah Tangga Pasal 72 ayat (3)</strong>, Institut
                            menerbitkan
                            <strong>Sertifikat CPA</strong> bagi peserta yang memenuhi syarat berikut:
                        </p>
                        <ol class="list-decimal ml-6 space-y-2 text-gray-700">
                            <li>Telah memperoleh STLU-CPA sebagaimana dimaksud pada dimaksud pada ayat (1);</li>
                            <li>Anggota di Institut.</li>
                            <li>Lulus pendidikan sesuai ketentuan atau terdaftar dalam register negara akuntan.</li>
                            <li>Memiliki pengalaman kerja di bidang akuntansi minimal 3 (tiga) tahun.</li>
                            <li>Mendapat penilaian layak dari Dewan Sertifikasi terkait pengalaman kerja bidang akuntansi.
                            </li>
                            <li>Menandatangani pernyataan kesanggupan sebagai pemegang sertifikat CPA dan Pakta Integritas.
                            </li>
                            <li>Menandatangani pernyataan kesediaan mengikuti ketentuan Institut, termasuk dalam hal
                                pengajuan izin Akuntan Publik.</li>
                            <li>Memenuhi kewajiban iuran tahunan dan kewajiban lainnya.</li>
                            <li>Memenuhi kewajiban SKP sesuai ketentuan Institut.</li>
                        </ol>
                    </div>
                </div>
                {{-- ✅ Penilaian Pengalaman Audit --}}
                <div x-show="tab === 'audit'" class="space-y-8">
                    {{-- Bagian 1: STL-UPAP --}}
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-xl font-semibold text-blue-700 mb-4">
                            📜 STL-UPAP (Surat Tanda Lulus Ujian Profesi Akuntan Publik)
                        </h3>
                        <p class="text-gray-700 mb-4">
                            Institut menerbitkan <strong>STL-UPAP</strong> yang dapat digunakan untuk pemenuhan persyaratan
                            perizinan
                            Akuntan Publik bagi Peserta yang telah memenuhi seluruh persyaratan berikut:
                        </p>
                        <ol class="list-decimal ml-6 space-y-2 text-gray-700">
                            <li>Lulus Ujian Profesi Akuntan Publik untuk seluruh mata ujian atau mendapat <i>waiver</i>
                                yang dinyatakan dalam surat keterangan lulus untuk setiap mata ujian oleh Dewan Sertifikasi.
                            </li>
                            <li>Lulus pendidikan sesuai ketentuan di Institut atau telah terdaftar dalam register negara
                                untuk akuntan.</li>
                            <li>Menjadi Anggota di Institut.</li>
                            <li>Lulus penilaian pengalaman kerja bidang akuntansi berupa audit atas laporan keuangan melalui
                                KAP
                                sebagaimana dimaksud dalam Pasal 25 dan 26 oleh Dewan Sertifikasi.</li>
                            <li>Merupakan Warga Negara Indonesia.</li>
                        </ol>
                        <p class="text-sm text-gray-600 mt-4">
                            👉 <strong>STL-UPAP</strong> diidentifikasi sebagai sertifikat yang dapat digunakan untuk
                            permohonan izin Akuntan Publik
                            sesuai peraturan perundang-undangan, serta sebagai bukti pengalaman praktik bidang audit dan
                            asurans
                            sebagaimana dimaksud dalam Anggaran Dasar dan Anggaran Rumah Tangga.
                        </p>
                    </div>

                    {{-- Bagian 2: CPA License --}}
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-xl font-semibold text-green-700 mb-4">
                            🏅 CPA (License)
                        </h3>
                        <p class="text-gray-700 mb-4">
                            Untuk memenuhi ketentuan <strong>PP-4</strong>, Institut menerbitkan <strong>sertifikat
                                CPA</strong>
                            dengan keterangan tambahan sebagai <strong>“CPA (License)”</strong> bagi Peserta yang telah
                            memenuhi seluruh syarat berikut:
                        </p>
                        <ol class="list-decimal ml-6 space-y-2 text-gray-700">
                            <li>Telah memperoleh STL-UPAP.</li>
                            <li>Menjadi Anggota di Institut.</li>
                            <li>Menandatangani surat pernyataan kesediaan untuk menandatangani Pakta Integritas dan
                                mengucapkan sumpah/janji profesi sebagai Akuntan Publik paling lambat 3 (tiga) bulan
                                sejak tanggal izin Akuntan Publik terbit.</li>
                            <li>Memenuhi kewajiban SKP, iuran tahunan, dan/atau kewajiban keuangan lainnya.</li>
                            <li>Memiliki pengalaman kerja bidang akuntansi berupa audit atas laporan keuangan di KAP
                                minimal 3 (tiga) tahun dalam kurun waktu 5 (lima) tahun terakhir, termasuk pengalaman
                                memimpin tim perikatan audit yang disetujui oleh Dewan Sertifikasi.</li>
                            <li>Menandatangani surat pernyataan kesanggupan pemenuhan kewajiban sebagai pemegang sertifikat
                                CPA (License) dan Pakta Integritas sesuai ketentuan yang berlaku di Institut.</li>
                        </ol>
                    </div>
                </div>
            </div>
    </section>
@endsection
