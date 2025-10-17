@extends('layouts.visitor')

@section('content')
    <section class="max-w-5xl mx-auto px-6 py-12 mt-2 bg-white shadow-md rounded-lg text-justify">
        <h1 class="text-3xl font-bold mb-6 text-center">Tentang Pelatihan IAPI</h1>

        <p class="text-gray-700 leading-relaxed mb-6">
            Institut Akuntan Publik Indonesia (IAPI) merupakan Asosiasi Profesi Akuntan Publik Indonesia yang
            bertujuan untuk mewujudkan Akuntan Publik yang berintegritas, berkualitas, dan berkompetensi
            internasional. IAPI mendukung pertumbuhan profesi yang sehat, melindungi kepentingan publik,
            menjaga martabat profesi, serta mendorong terwujudnya tata kelola yang baik di Indonesia.
        </p>

        <p class="text-gray-700 leading-relaxed mb-6">
            Penyelenggaraan Program Pendidikan Profesional Berkelanjutan (PPL) dilaksanakan sesuai dengan
            peraturan perundang-undangan, termasuk Undang-Undang Nomor 5 Tahun 2011 tentang Akuntan Publik
            dan Peraturan Menteri Keuangan Nomor 186/PMK.01/2021.
        </p>

        <h1 class="text-2xl font-semibold mb-4">Pemenuhan Kewajiban PPL</h1>
        <p class="text-gray-700 leading-relaxed mb-4">
            Pemenuhan kewajiban kegiatan <strong>Pelatihan Profesional Berkelanjutan (PPL)</strong> merupakan
            tanggung jawab setiap anggota dan dilakukan melalui kegiatan terstruktur maupun tidak terstruktur.
            Setiap anggota diwajibkan mengumpulkan minimal <strong>40 SKP setiap tahun</strong>, dengan rincian:
        </p>

        <ul class="list-disc pl-6 text-gray-700 leading-relaxed mb-6 space-y-2">
            <li>
                <strong>Anggota dengan Izin Akuntan Publik (AP)</strong>:
                Wajib memenuhi minimal 40 SKP dengan ketentuan:
                <ol class="list-decimal pl-6 mt-2 space-y-1">
                    <li>Minimal 30 SKP harus dipenuhi melalui kegiatan PPL terstruktur.</li>
                    <li>10 SKP sisanya dapat dipenuhi melalui kegiatan PPL terstruktur maupun tidak terstruktur.</li>
                </ol>
            </li>
            <li>
                <strong>Anggota Non-Akuntan Publik (Non-AP)</strong>:
                Wajib memenuhi minimal 40 SKP setiap tahun melalui kegiatan PPL, baik terstruktur maupun tidak terstruktur.
            </li>
        </ul>

        <h1 class="text-2xl font-semibold mb-4">Perhitungan SKP</h1>
        <p class="text-gray-700 leading-relaxed mb-4">
            Perhitungan SKP pada kegiatan PPL terstruktur dilakukan berdasarkan jumlah waktu yang ditempuh.
            Ketentuannya antara lain:
        </p>
        <ul class="list-decimal pl-6 text-gray-700 leading-relaxed mb-6">
            <li>1 jam pembelajaran efektif = 1 SKP.</li>
            <li>Jika kegiatan terbagi menjadi beberapa sesi, maka SKP dihitung per sesi.</li>
            <li>Pecahan menit dalam perhitungan dibulatkan ke angka satuan terdekat.</li>
        </ul>

        <h1 class="text-2xl font-semibold mb-4">PPL Tidak Terstruktur</h1>
        <p class="text-gray-700 leading-relaxed mb-4">
            PPL tidak terstruktur mencakup kegiatan pengembangan kompetensi mandiri anggota, seperti:
        </p>
        <ul class="list-decimal pl-6 text-gray-700 leading-relaxed mb-6">
            <li>Mengikuti seminar atau workshop yang relevan dengan profesi.</li>
            <li>Mengikuti kegiatan yang diselenggarakan pihak lain di bidang akuntansi, auditing, keuangan, atau bisnis.
            </li>
            <li>Melakukan penelitian, menulis artikel, atau menerbitkan karya ilmiah.</li>
            <li>Menyusun dokumentasi kegiatan profesional untuk peningkatan kompetensi.</li>
        </ul>

        <h1 class="text-2xl font-semibold mb-4">Referensi Perhitungan SKP</h1>
        <div class="overflow-x-auto mb-6">
            <table class="min-w-full border border-gray-300 text-sm text-gray-700">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-3 py-2">No</th>
                        <th class="border px-3 py-2">Kegiatan</th>
                        <th class="border px-3 py-2">Referensi SKP</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-3 py-2 text-center">1</td>
                        <td class="border px-3 py-2">Mengikuti seminar, pelatihan, workshop, atau diskusi panel yang
                            diselenggarakan oleh suatu pihak tertentu dengan tema yang relevan dengan bidang akuntansi,
                            auditing, keuangan, bisnis dan relevan.</td>
                        <td class="border px-3 py-2">Nilai SKP ditentukan berdasarkan jumlah waktu keikutsertaan dalam
                            kegiatan tersebut. 1 SKP setara dengan 50 menit. Nilau SKP dihitung dengan cara jumlah waktu
                            yang digunakan dibagi dengan 50 menit.</td>
                    </tr>
                    <tr>
                        <td class="border px-3 py-2 text-center">2</td>
                        <td class="border px-3 py-2">Mengajar pada mata kuliah bidang akuntansi, auditing, keuangan, bisnis
                            dan yang relevan.</td>
                        <td class="border px-3 py-2">Nilai SKP ditentukan pada akhir semester pengajaran setiap kelas yang
                            dilaporkan sebagai realisasi SKP tahun berjalan. 1 SKS per semester pada mata kuliah yang
                            relevan setara dengan 3 SKP, maksimal 20 SKP pertahun dari kegiatan mengajar.</td>
                    </tr>
                    <tr>
                        <td class="border px-3 py-2 text-center">3</td>
                        <td class="border px-3 py-2">Menempuh pendidikan pada pendidikan tinggi strata dua atau tiga yang
                            relevan dengan bidang akuntansi, auditing, keuangan, bisnis dan yang relevan.</td>
                        <td class="border px-3 py-2">Nilai SKP ditentukan pada akhhir semester sebagai realisasi SKP tahun
                            berjalan. 1 SKS per semester pada mata kuliah relevan setara dengan 2 SKP, maksimal 25 SKP per
                            tahhun.</td>
                    </tr>
                    <tr>
                        <td class="border px-3 py-2 text-center">4</td>
                        <td class="border px-3 py-2">Melakukan kegiatan penelitian pada bidang akuntansi, auditing,
                            keuangan, bisnis dan yang relevan yang dituangkan dalam suatu tulisan atau karya ilmiah yang
                            dipublikasikan.</td>
                        <td class="border px-3 py-2">Nila SKP ditentukan pada saat publikasi hasil melaui jurnal
                            terakreditasi oleh Dikti atau pihak lain yang kredibel yang diperhitungkan sebagai realisasi SKP
                            tahun berjalan. 1 hasil penelitian terpublikasi setara dengan 8 SKP.</td>
                    </tr>
                    <tr>
                        <td class="border px-3 py-2 text-center">5</td>
                        <td class="border px-3 py-2">
                            Menulis karya ilmiah atau karya penulisan yang dipublikasikan dalam bentuk buku
                            atau media publikasian lainnya.
                        </td>
                        <td class="border px-3 py-2">
                            Nilai SKP ditentukan pada saat publikasi atau penerbitan buku:
                            <ol class="list-decimal ml-2">
                                <li>(1) karya ilmiah setara dengan 3 SKP</li>
                                <li>(1) buku setara dengan 5 SKP <span class="italic">(tidak berlaku untuk edisi cetak
                                        ulang)</span></li>
                            </ol>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h1 class="text-2xl font-semibold mb-4">Ketentuan Umum PPL</h1>
        <ol class="list-decimal pl-6 text-gray-700 leading-relaxed space-y-1">
            <li>Peraturan Asosiasi Nomor 1 Tahun 2014 Tentang PPL (<a
                    href="https://drive.google.com/file/d/1xjaNmn_aZcxIiQGgl5Ix9GmBTy2CamdR/preview"
                    class="text-blue-600 underline">Lihat/Download</a>)</li>
            <li>Peraturan Pengurus Nomor 4 Tahun 2014 Tentang Pelaksanaan PPL (<a
                    href="https://drive.google.com/file/d/1XgxdW0kUTIodbFgzXt4-hbHdnqME1Im-/preview"
                    class="text-blue-600 underline">Lihat/Download</a>)</li>
            <li>Peraturan Dewan Pengurus Nomor 3 Tahun 2016 Tentang PPL Terstruktur (<a
                    href="https://drive.google.com/file/d/1IiQbWSKpQiRkp5AdWtGwTWCCwoFCLVxb/preview"
                    class="text-blue-600 underline">Lihat/Download</a>)</li>
            <li>Peraturan Asosiasi Nomor 2 Tahun 2020 Tentang PPL Kode Etik & SPAP bagi CPA no AP (<a
                    href="https://drive.google.com/file/d/1rQRUrtRnlGRwsdiBxoZFqGeB-DhJRX0R/preview"
                    class="text-blue-600 underline">Lihat/Download</a>)</li>
            <li>Surat Keputusan Dewan Pengurus Nomor 5 tahun 2020 Tentang Ketentuan PPL dalam Masa Pandemi Covid-19 (<a
                    href="https://drive.google.com/file/d/1HEmz7r_S931xPtjyyLlJMfWaKBvf6aMI/preview"
                    class="text-blue-600 underline">Lihat/Download</a>)</li>
            <li>Peraturan Asosiasi No 5 Tahun 2020 tentang Ketentuan Kelebihan Perolehan SKP untuk Pemenuhan SKP Tahun
                Takwim Berikutnya Bagi Anggota Pemegang Izin Akuntan Publik. (<a
                    href="https://drive.google.com/file/d/1zVpMEuWa93O_XMoZyBI20wA5hiIzD6Fh/preview"
                    class="text-blue-600 underline">Lihat/Download</a>)</li>
            <li>Keputusan Dewan Pengurus Institut Akuntan Publik Indonesia Nomor 6 Tahun 2022 Tentang Penetapan Satuan
                Kredit Ppl (Skp) Bagi Pemegang Sertifikat J-Cpa Dan A-Cpa. (<a
                    href="https://drive.google.com/file/d/1zIHF9rk42LHN3NgCusEOAKjaRGWNIuZ8/preview"
                    class="text-blue-600 underline">Lihat/Download</a>)</li>
            <li>Peraturan Menteri Keuangan Republik Indonesia Nomor 186/PMK.01/2021 Tentang Pembinaan Dan Pengawasan Akuntan
                Publik. (<a href="https://drive.google.com/file/d/1CAbKrvWhOQslmn7eDfuCjd2uI6GN2B0K/preview"
                    class="text-blue-600 underline">Lihat/Download</a>)</li>
            <li>Keputusan Dewan Pengurus IAPI Nomor 4 Tahun 2023 tentang Perubahan Tarif Pendidikan Profesional
                Berkelanjutan Secara Online dan Hybrid. (<a
                    href="https://drive.google.com/file/d/1kkwiP7nlwO1CN7GFf9VudUwIfkaJPAsZ/preview"
                    class="text-blue-600 underline">Lihat/Download</a>)</li>
        </ol>
    </section>
@endsection
