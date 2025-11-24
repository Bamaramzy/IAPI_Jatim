<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JalurWorkshopController extends Controller
{
    public function index(Request $request)
    {
        $kategoriList = [
            'INFORMASI',
            'RPL ACPA',
            'RPL RNA',
            'RPL CTA',
            'RPL PPAK',
            'SERTIFIKASI BPK',
        ];

        $selectedKategori = $request->get('kategori', 'INFORMASI');

        $dataByKategori = [
            'INFORMASI' => [
                'gambar' => '',
                'konten' => '
                    <p>
                    Program UPAP juga dapat ditempuh melalui Recognition of Prior Learning (RPL). RPL merupakan salah satu jalur yang dapat ditempuh oleh seseorang untuk mengikuti program sertifikasi dengan melalui program pengakuan atas kompetensi tertentu baik yang berasal dari pendidikan/pengalaman kerja yang telah diperoleh sebelumnya. Para peserta diminta untuk mendemonstrasikan atau menunjukkan kompetensi tertentu tersebut dengan cara mengikuti program RPL dan dinyatakan lulus dalam post-test. Dengan demikian peserta dibebaskan dari ketentuan keharusan mengikuti ujian tertulis atas mata ujian tertentu (waiver).
                    </p>
                    <p>
                    Tujuan RPL adalah untuk memberikan jalur khusus bagi seseorang yang secara substansi telah memiliki kompetensi yang setara dengan mata ujian tingkat dasar atau ujian tingkat profesional sehingga seseorang tersebut dapat diberikan pengakuan. IAPI menyelenggarakan beberapa kegiatan RPL dengan basis pesertanya adalah staf yang bekerja pada KAP atau bagian keuangan dan/atau akuntansi, lulusan Program Pendidikan Profesi Akuntansi (PPAK), pemegang Register Negara Akuntan (RNA).
                    </p>
                ',
            ],
            'RPL ACPA' => [
                'gambar' => '/images/RPL_ACPA.webp',
                'konten' => '
                <p><em>Recognition Prior Learning Associate Certified Public Accountant</em> atau <strong>RPL ACPA</strong> merupakan program recognition yang setara dengan ujian tingkat dasar. RPL ACPA dilaksanakan secara daring selama 5 (lima) hari dengan pemaparan materi <em>workshop</em> oleh narasumber pada sesi pagi dan dilanjutkan dengan sesi <em>posttest</em> pada sesi siang.</p>

                <h3>Materi Workshop dan Posttest</h3>
                <ol>
                    <li>Pengantar Audit dan Asurans (PAA);</li>
                    <li>Akuntansi dan Pelaporan Keuangan (APK);</li>
                    <li>Pengantar Ekonomi Makro dan Mikro (PEMM);</li>
                    <li>Pengantar Manajemen, Perpajakan, dan Hukum Bisnis (MPHB);</li>
                    <li>Akuntansi Biaya, Manajemen Keuangan, dan Sistem Informasi (AMSI).</li>
                </ol>

                <h3>Persyaratan</h3>
                <ol>
                    <li>Warga Negara Indonesia;</li>
                    <li>Anggota IAPI;</li>
                    <li>Lulusan D4/S1/S2/S3 Akuntansi atau PPAk atau PPAP;</li>
                    <li>Memiliki pengalaman kerja di bidang akuntansi/keuangan/auditing minimal 1 (satu) tahun di KAP atau 2 (dua) tahun di instansi/perguruan tinggi;</li>
                    <li>Mengunggah dokumen persyaratan pada Akun IAPI, sebagai berikut:
                        <ul>
                            <li>Ijazah dan transkrip nilai D4/S1/S2/S3 Akuntansi atau PPAk atau PPAP;</li>
                            <li>Bagi lulusan luar negeri, melampirkan bukti penyetaraan DIKTI;</li>
                            <li>Kartu Tanda Penduduk;</li>
                            <li>Pas foto berwarna (terbaru);</li>
                            <li>Surat Pernyataan Pembebasan Tanggung Jawab;</li>
                            <li>Surat Korespondensi/Surat Domisili;</li>
                            <li>Surat Pernyataan Pemenuhan Kewajiban;</li>
                            <li>Surat Pernyataan Ketetapan Nama;</li>
                            <li>Surat Keterangan Bekerja (minimal 3 bulan terakhir);</li>
                            <li>Pakta Integritas;</li>
                            <li>Surat Rekomendasi dari Atasan Tempat Bekerja atau Anggota IAPI (Anggota Biasa atau Anggota Madya);</li>
                            <li>Melengkapi data profil secara valid.</li>
                        </ul>
                    </li>
                    <li>Melakukan pembayaran sesuai ketentuan yang berlaku.</li>
                </ol>

                <h3>Biaya</h3>
                <table border="1" cellpadding="6" cellspacing="0" style="border-collapse: collapse; width:100%;">
                    <thead style="background:#f0f0f0;">
                        <tr>
                            <th>Kategori Biaya</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Biaya pendaftaran</td>
                            <td>Rp125.000,00</td>
                        </tr>
                        <tr>
                            <td>Biaya kegiatan untuk peserta baru</td>
                            <td>Rp3.500.000,00</td>
                        </tr>
                        <tr>
                            <td>Biaya kegiatan per mata ujian untuk peserta mengulang</td>
                            <td>Rp725.000,00</td>
                        </tr>
                        <tr>
                            <td>Biaya mengulang per mata ujian di TC</td>
                            <td>Biaya sesuai dengan biaya UPAP tingkat dasar jalur reguler</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Catatan</h3>
                <ul>
                    <li>Biaya mulai berlaku di Periode I 2025.</li>
                    <li>Biaya tidak dapat dikembalikan (<em>no refund</em>) dan jadwal ujian tidak dapat di-reschedule.</li>
                    <li>Peserta harus menyelesaikan Ujian disetiap tingkatan dalam jangka waktu 2 tahun terhitung sejak pertama kali mengikuti ujian. Apabila dalam jangka waktu tersebut terlambat/belum menyelesaikan seluruh mata ujian yang diikuti disetiap tingkatannya, maka harus mengambil kembali keseluruhan mata ujian tersebut.</li>
                    <li>Bagi peserta yang pertama kali mengikuti ujian melalui jalur Workshop (RPL), apabila terdapat mata ujian yang belum mencapai batas kelulusan tingkat dasar, dapat mengulang mata ujian tersebut di Jalur Workshop (RPL) ataupun Jalur Reguler (TC).</li>
                    <li>Untuk mengulang mata ujian tingkat dasar di TC, biaya dan jadwal ujian sesuai dengan UPAP Jalur Reguler.</li>
                    <li>Jika kuota peserta telah terpenuhi, maka pendaftar akan menjadi daftar tunggu (<em>Waiting List</em>).</li>
                    <li>Bagi peserta yang pertama kali mengikuti ujian melalui TC (Jalur Reguler) dan berminat mengikuti ujian melalui RPL (Jalur Workshop), maka nilai ujian di TC akan dianggap tidak berlaku.</li>
                    <li>Untuk memperoleh Sertifikat ACPA, peserta harus dinyatakan lulus keseluruhan mata ujian di tingkat dasar.</li>
                </ul>

                <p>Pendaftaran RPL ACPA: 
                    <a href="https://bit.ly/WL-RPL-ACPA" target="_blank">https://bit.ly/WL-RPL-ACPA</a>
                </p>
            ',
            ],
            'RPL RNA' => [
                'gambar' => '/images/RPL_RNA.webp',
                'konten' => '
                <p><em>Recognition Prior Learning for Register Negara Akuntan</em> atau <strong>RPL RNA</strong> merupakan program <em>recognition</em> yang dikhususkan bagi para pemegang Register Negara Akuntan (RNA) yang berminat memiliki sertifikat CPA. Dengan mengikuti program ini, para pemegang RNA dinyatakan lulus pada ujian tingkat dasar program reguler.</p>

                <p>Kegiatan RPL RNA dilaksanakan selama 4 (empat) hari secara daring yang diawali dengan pemaparan materi oleh narasumber (<em>workshop</em>) pada sesi pagi dan dilanjutkan dengan <em>posttest</em> pada sesi siang.</p>

                <h3>Materi Workshop dan Posttest</h3>
                <ol>
                    <li>Akuntansi dan Pelaporan Keuangan Lanjutan (APKL);</li>
                    <li>Akuntansi Manajemen, Manajemen Keuangan, dan Teknologi Informasi (AMTI);</li>
                    <li>Strategi Bisnis dan Perpajakan Lanjutan (SBPL);</li>
                    <li>Manajemen Risiko, Tata Kelola, dan Pengendalian Internal (MRTI).</li>
                </ol>

                <h3>Penerbitan Sertifikat</h3>
                <ol>
                    <li>Sertifikat A-CPA dapat diterbitkan setelah mengikuti RPL – RNA.</li>
                    <li>Surat Tanda Lulus UPAP dan sertifikat CPA dapat diterbitkan setelah dinyatakan lulus posttest 4 (empat) mata ujian dan lulus ujian AEAP di Test Center serta memenuhi ketentuan Peraturan Asosiasi Nomor 10 Tahun 2021.</li>
                </ol>

                <h3>Persyaratan</h3>
                <ol>
                    <li>Warga Negara Indonesia;</li>
                    <li>Anggota IAPI;</li>
                    <li>Memiliki Register Negara Akuntan;</li>
                    <li>Memiliki pengalaman kerja minimal 3 (tiga) tahun di Kantor Akuntan Publik atau perusahaan di bidang Akuntansi, Audit, Keuangan atau Bisnis;</li>
                    <li>Mengunggah dokumen persyaratan pada Akun IAPI, sebagai berikut:
                        <ul>
                            <li>Ijazah dan transkrip nilai D4/S1/S2/S3 Akuntansi;</li>
                            <li>Bagi lulusan luar negeri melampirkan bukti penyetaraan DIKTI;</li>
                            <li>Kartu Tanda Penduduk;</li>
                            <li>Pas foto berwarna (terbaru);</li>
                            <li>Surat Pernyataan Pembebasan Tanggung Jawab;</li>
                            <li>Surat Korespondensi/Surat Domisili;</li>
                            <li>Surat Pernyataan Pemenuhan Kewajiban;</li>
                            <li>Surat Pernyataan Ketetapan Nama;</li>
                            <li>Surat Keterangan Bekerja (minimal 3 bulan terakhir);</li>
                            <li>Pakta Integritas;</li>
                            <li>Surat Rekomendasi dari Atasan Tempat Bekerja atau Anggota IAPI (Anggota Biasa atau Madya);</li>
                            <li>Melengkapi data profil secara valid.</li>
                        </ul>
                    </li>
                    <li>Melakukan pembayaran sesuai ketentuan yang berlaku.</li>
                </ol>

                <h3>Biaya</h3>
                <table border="1" cellpadding="6" cellspacing="0" style="border-collapse: collapse; width:100%;">
                    <thead style="background:#f0f0f0;">
                        <tr>
                            <th>Kategori Biaya</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Biaya pendaftaran</td>
                            <td>Rp350.000,00</td>
                        </tr>
                        <tr>
                            <td>Biaya kegiatan untuk peserta baru</td>
                            <td>Rp8.500.000,00</td>
                        </tr>
                        <tr>
                            <td>Biaya per mata ujian untuk peserta mengulang</td>
                            <td>Rp1.800.000,00</td>
                        </tr>
                        <tr>
                            <td>Biaya mata ujian AEAP dan mengulang per mata ujian di TC</td>
                            <td>Biaya sesuai dengan biaya UPAP tingkat profesional jalur reguler</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Catatan</h3>
                <ul>
                    <li>Biaya mulai berlaku di Periode I 2025.</li>
                    <li>Biaya tidak dapat dikembalikan (<em>no refund</em>) dan jadwal ujian tidak dapat di-reschedule.</li>
                    <li>Peserta harus menyelesaikan Ujian disetiap tingkatan dalam jangka waktu 2 tahun terhitung sejak pertama kali mengikuti ujian. Apabila dalam jangka waktu tersebut terlambat/belum menyelesaikan seluruh mata ujian yang diikuti disetiap tingkatannya, maka harus mengambil kembali keseluruhan mata ujian tersebut.</li>
                    <li>Bagi peserta yang pertama kali mengikuti ujian melalui jalur Workshop (RPL), apabila terdapat mata ujian yang belum mencapai batas kelulusan tingkat profesional, dapat mengulang mata ujian tersebut di Jalur Workshop (RPL) ataupun Jalur Reguler (TC).</li>
                    <li>Untuk mengulang mata ujian tingkat profesional di TC, biaya dan jadwal ujian sesuai dengan UPAP Jalur Reguler.</li>
                    <li>Jika kuota peserta telah terpenuhi, maka pendaftar akan menjadi daftar tunggu (<em>Waiting List</em>).</li>
                </ul>

                <p>Pendaftaran RPL RNA: 
                    <a href="https://bit.ly/WL-RNA" target="_blank">https://bit.ly/WL-RNA</a>
                </p>
            ',
            ],
            'RPL CTA' => [
                'gambar' => '/images/RPL_CTA.webp',
                'konten' => '
                <p>
                    Program <strong>Certificate in Teaching Auditing (CTA)</strong> merupakan sertifikasi keahlian di bidang akuntansi dan audit 
                    yang ditujukan khusus bagi dosen pengampu mata kuliah akuntansi dan audit. 
                    Program ini diselenggarakan oleh IAPI dengan tujuan membekali peserta agar memiliki 
                    <em>kompetensi pengajaran</em> yang memadai dan <em>komitmen etika</em> yang tinggi 
                    dalam bidang akuntansi dan audit.
                </p>

                <h3>Kegiatan</h3>
                <p>Kegiatan dilaksanakan selama <strong>3 (tiga) hari</strong> dengan rangkaian sebagai berikut:</p>
                <ol>
                    <li>Workshop: pemaparan materi oleh narasumber</li>
                    <li>Post-test dengan cakupan mata ujian:
                        <ul>
                            <li>Pengantar Audit dan Asurans</li>
                            <li>Akuntansi dan Pelaporan Keuangan</li>
                            <li>Kode Etik Profesi dan Update Regulasi Akuntan Publik</li>
                        </ul>
                    </li>
                </ol>
                <p><strong>Note:</strong> 3 mata ujian tingkat dasar telah di-waiver.</p>

                <h3>Persyaratan</h3>
                <ol>
                    <li>Warga Negara Indonesia</li>
                    <li>Terdaftar sebagai anggota IAPI</li>
                    <li>Mempunyai pengalaman mengajar minimal 1 (satu) tahun di bidang akuntansi/audit, dibuktikan dengan Surat Keterangan Mengajar</li>
                    <li>Melampirkan bukti pelatihan bidang akuntansi/keuangan dalam 3 (tiga) tahun terakhir</li>
                    <li>Mengunggah dokumen persyaratan melalui akun IAPI:
                        <ul>
                            <li>Ijazah dan transkrip nilai D4/S1/S2/S3 Akuntansi</li>
                            <li>Bagi lulusan luar negeri, melampirkan bukti penyetaraan DIKTI</li>
                            <li>Kartu Tanda Penduduk</li>
                            <li>Pas foto berwarna (terbaru)</li>
                            <li>Surat Pernyataan Pembebasan Tanggung Jawab</li>
                            <li>Surat Korespondensi/Domisili</li>
                            <li>Surat Pernyataan Pemenuhan Kewajiban</li>
                            <li>Surat Pernyataan Ketetapan Nama</li>
                            <li>Surat Keterangan Mengajar (minimal 3 bulan terakhir)</li>
                            <li>Surat Rekomendasi dari Atasan Tempat Bekerja atau Anggota IAPI</li>
                            <li>Pakta Integritas</li>
                            <li>Data profil lengkap dan valid</li>
                        </ul>
                    </li>
                    <li>Melakukan pembayaran sesuai ketentuan</li>
                </ol>

                <h3>Penerbitan Sertifikat</h3>
                <ul>
                    <li>Sertifikat A-CPA diterbitkan setelah lulus post-test</li>
                    <li>Sertifikat CTA diterbitkan setelah lulus post-test dan berlaku 2 (dua) tahun, dapat diperpanjang dengan ketentuan berlaku</li>
                    <li>Pemegang CTA wajib tetap menjadi anggota IAPI dan mengikuti pelatihan berkelanjutan minimal 5 SKP setiap 2 tahun</li>
                </ul>

                <h3>Biaya</h3>
                <table border="1" cellpadding="6" cellspacing="0" style="border-collapse: collapse; width:100%;">
                    <thead style="background:#f0f0f0;">
                        <tr>
                            <th>Kategori Biaya</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Biaya pendaftaran</td>
                            <td>Rp125.000</td>
                        </tr>
                        <tr>
                            <td>Biaya kegiatan untuk peserta baru</td>
                            <td>Rp3.500.000</td>
                        </tr>
                        <tr>
                            <td>Biaya kegiatan per topik (alumni/mengulang)</td>
                            <td>Rp1.500.000</td>
                        </tr>
                        <tr>
                            <td>Biaya mengulang mata ujian di TC</td>
                            <td>Sesuai biaya UPAP jalur reguler</td>
                        </tr>
                    </tbody>
                </table>

                <p><strong>Note:</strong></p>
                <ul>
                    <li>Biaya mulai berlaku Periode I 2025</li>
                    <li>Biaya tidak dapat dikembalikan (no refund), jadwal ujian tidak dapat di-reschedule</li>
                    <li>Ujian harus selesai dalam 2 tahun sejak pertama kali mengikuti</li>
                    <li>Sertifikat ACPA mensyaratkan pengalaman kerja/magang minimal 3 bulan</li>
                    <li>Mata ujian yang belum lulus dapat diulang melalui jalur RPL maupun reguler</li>
                    <li>Jika kuota penuh, peserta masuk daftar tunggu (waiting list)</li>
                </ul>

                <p>Pendaftaran RPL CTA: <a href="https://bit.ly/wl-cta" target="_blank">https://bit.ly/wl-cta</a></p>
            ',
            ],
            'RPL PPAK' => [
                'gambar' => '/images/RPL_PPAK.webp',
                'konten' => '
                <p>
                    Bagi peserta yang telah lulus program PPAk dari Universitas atau Perguruan Tinggi yang bekerja sama serta memiliki Surat Tanda Terdaftar dari IAPI, 
                    maka atas rekomendasi dari Universitas atau Perguruan Tinggi tersebut peserta dapat mengikuti program <strong>RPL PPAk</strong>. 
                    IAPI dapat memberikan <em>waiver</em> sesuai dengan akreditasi PPAk dan transkrip nilai D4/S1 Akuntansi masing-masing peserta. 
                    RPL PPAk ini berlaku untuk lulusan PPAk <strong>3 (tiga) tahun terakhir</strong>.
                </p>

                <h3>Keterangan</h3>
                <ul>
                    <li>Lulusan PPAk akreditasi <strong>A/Unggul</strong>: dapat diberikan waiver maksimal 9 dari 10 mata ujian tingkat dasar/profesional, sesuai transkrip nilai.</li>
                    <li>Lulusan PPAk akreditasi <strong>B/Baik Sekali</strong>: dapat diberikan waiver maksimal 9 dari 10 mata ujian tingkat dasar/profesional, sesuai transkrip nilai.</li>
                </ul>

                <h3>Persyaratan Program RPL PPAk</h3>
                <ol>
                    <li>Warga Negara Indonesia</li>
                    <li>Anggota IAPI</li>
                    <li>Lulusan D4/S1 Akuntansi dengan transkrip nilai</li>
                    <li>Lulusan PPAk dari Universitas/PT yang bekerja sama dan memiliki STTD IAPI</li>
                    <li>Surat rekomendasi dari Universitas/PT yang bekerja sama dengan STTD IAPI</li>
                    <li>Surat waiver dari IAPI</li>
                    <li>Mengunggah dokumen:
                        <ul>
                            <li>Ijazah & transkrip nilai D4/S1 Akuntansi</li>
                            <li>Jika lulusan luar negeri: bukti penyetaraan DIKTI</li>
                            <li>KTP</li>
                            <li>Pas foto berwarna terbaru</li>
                            <li>Surat pernyataan pembebasan tanggung jawab</li>
                            <li>Surat korespondensi/domisili</li>
                            <li>Surat pernyataan pemenuhan kewajiban</li>
                            <li>Surat pernyataan ketetapan nama</li>
                            <li>Surat keterangan bekerja/tidak bekerja (maks. 3 bulan terakhir)</li>
                            <li>Pakta integritas</li>
                            <li>Surat rekomendasi atasan atau anggota IAPI</li>
                            <li>Surat waiver dari IAPI</li>
                        </ul>
                    </li>
                    <li>Melengkapi profil secara valid</li>
                    <li>Melakukan pembayaran sesuai ketentuan</li>
                </ol>

                <h3>Persyaratan Pengajuan Waiver</h3>
                <ol>
                    <li>WNI (lampirkan KTP)</li>
                    <li>Lulusan D4/S1 Akuntansi (ijazah & transkrip)</li>
                    <li>Lulusan PPAk kerjasama IAPI (ijazah & transkrip PPAk)</li>
                    <li>Memiliki STTD & surat rekomendasi dari Universitas/PT PPAk</li>
                    <li>Alumni maksimal 3 tahun terakhir</li>
                    <li>Telah dinyatakan lulus dari Kampus PPAk</li>
                    <li>Mengisi link: <a href="http://bit.ly/Waiver-PPAK-IAPI" target="_blank">http://bit.ly/Waiver-PPAK-IAPI</a></li>
                </ol>
                <p>Pengajuan waiver dilakukan secara <strong>kolektif</strong> oleh Universitas/PT PPAk.</p>

                <p>Program waiver berlaku <strong>2 tahun</strong> sejak tanggal terbit. 
                Jika belum menyelesaikan ujian, peserta wajib mengajukan perpanjangan minimal 3 bulan sebelum kedaluwarsa (maksimal 1 bulan setelah). 
                Perpanjangan berlaku 1 tahun dan hanya sekali, melalui link 
                <a href="https://bit.ly/Waiver-Extend" target="_blank">https://bit.ly/Waiver-Extend</a> 
                dengan melampirkan bukti PPL 8 SKP (topik akuntansi/audit) dalam 6 bulan terakhir.</p>

                <h3>Penerbitan Sertifikat</h3>
                <ul>
                    <li><strong>Sertifikat A-CPA</strong>: diterbitkan setelah lulus minimal 1 mata ujian non-waiver atau tingkat dasar.</li>
                    <li><strong>Surat Tanda Lulus UPAP & Sertifikat CPA</strong>: 
                        <ul>
                            <li>Lulus seluruh mata ujian non-waiver</li>
                            <li>Pengalaman kerja min. 3 tahun di KAP/instansi/PT bidang akuntansi, audit, keuangan, perpajakan, bisnis</li>
                            <li>Memenuhi ketentuan Peraturan Asosiasi No. 10 Tahun 2021</li>
                        </ul>
                    </li>
                </ul>
                <p>Permohonan penerbitan melalui email: <a href="mailto:sertifikat.upap@iapi.or.id">sertifikat.upap@iapi.or.id</a></p>

                <h3>Biaya RPL PPAk</h3>
                <table border="1" cellpadding="6" cellspacing="0" style="border-collapse: collapse; width:100%;">
                    <thead style="background:#f0f0f0;">
                        <tr>
                            <th>Kategori Biaya</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Biaya Waiver per mata ujian</td>
                            <td>Rp250.000</td>
                        </tr>
                        <tr>
                            <td>Biaya pendaftaran ujian</td>
                            <td>Rp350.000</td>
                        </tr>
                        <tr>
                            <td>Biaya mata ujian non-waiver</td>
                            <td>Sesuai biaya UPAP Jalur Reguler</td>
                        </tr>
                    </tbody>
                </table>

                <p><strong>Note:</strong></p>
                <ul>
                    <li>Berlaku mulai Periode I 2025</li>
                    <li>Biaya tidak dapat dikembalikan (no refund)</li>
                    <li>Reschedule ujian maksimal H-8 dan hanya 1 kali dalam periode yang sama</li>
                </ul>
            ',
            ],
            'SERTIFIKASI BPK' => [
                'gambar' => '/images/SERTIFIKASI_BPK.webp',
                'konten' => '
                <p><strong>Informasi Tentang Sertifikasi BPK</strong></p>
                <p>
                    Program ini diperuntukkan bagi staf Kantor Akuntan Publik (KAP) yang telah mengikuti sertifikasi BPK RI. 
                    Peserta yang mengikuti program ini berhak mendapatkan <em>waiver</em> Ujian Tingkat Dasar 
                    dan harus mengikuti keseluruhan mata ujian tingkat profesional.
                </p>

                <h3>Ketentuan Program Waiver Sertifikasi BPK</h3>
                <ol>
                    <li>Dinyatakan telah lulus Sertifikasi BPK dengan menunjukkan bukti tanda kelulusan.</li>
                    <li>Dalam jangka waktu 1 (satu) tahun sejak bukti kelulusan diterima, calon peserta harus mendaftar ujian tingkat profesional dan mengikuti minimal 2 (dua) mata ujian tingkat profesional.</li>
                    <li>Pendaftaran dapat dilakukan melalui link: 
                        <a href="https://bit.ly/WL-RPL-BPK" target="_blank">https://bit.ly/WL-RPL-BPK</a>
                    </li>
                </ol>

                <h3>Penerbitan Sertifikat</h3>
                <ul>
                    <li><strong>Sertifikat A-CPA</strong> dapat diterbitkan setelah menyelesaikan minimal 2 (dua) mata ujian tingkat profesional.</li>
                    <li><strong>Surat Tanda Lulus UPAP dan Sertifikat CPA</strong> diterbitkan jika:
                        <ul>
                            <li>Telah lulus seluruh mata ujian tingkat profesional;</li>
                            <li>Memiliki pengalaman kerja minimum 3 tahun di KAP/instansi/PT bidang akuntansi, audit, keuangan, perpajakan, dan bisnis;</li>
                            <li>Memenuhi ketentuan Peraturan Asosiasi Nomor 10 Tahun 2021.</li>
                        </ul>
                    </li>
                </ul>
                <p>Permohonan penerbitan dapat disampaikan melalui email: 
                    <a href="mailto:sertifikat.upap@iapi.or.id">sertifikat.upap@iapi.or.id</a>
                </p>

                <h3>Persyaratan Waiver Sertifikasi BPK</h3>
                <ol>
                    <li>Warga Negara Indonesia;</li>
                    <li>Terdaftar sebagai anggota IAPI;</li>
                    <li>Melampirkan bukti tanda kelulusan Sertifikasi BPK RI;</li>
                    <li>Mengunggah dokumen pada Akun IAPI:
                        <ul>
                            <li>Ijazah & transkrip nilai D4/S1/S2/S3 Akuntansi;</li>
                            <li>Bagi lulusan luar negeri: bukti penyetaraan DIKTI;</li>
                            <li>KTP;</li>
                            <li>Pas foto berwarna terbaru;</li>
                            <li>Surat Pernyataan Pembebasan Tanggung Jawab;</li>
                            <li>Surat Korespondensi/Surat Domisili;</li>
                            <li>Surat Pernyataan Pemenuhan Kewajiban;</li>
                            <li>Surat Pernyataan Ketetapan Nama;</li>
                            <li>Surat Keterangan Bekerja/Tidak Bekerja (maks. 3 bulan terakhir);</li>
                            <li>Surat Rekomendasi dari Atasan atau Anggota IAPI;</li>
                            <li>Pakta Integritas;</li>
                            <li>Melengkapi data profil secara valid.</li>
                        </ul>
                    </li>
                    <li>Melakukan pembayaran sesuai ketentuan.</li>
                </ol>

                <h3>Biaya</h3>
                <table border="1" cellpadding="6" cellspacing="0" style="border-collapse: collapse; width:100%;">
                    <thead style="background:#f0f0f0;">
                        <tr>
                            <th>Kategori Biaya</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Biaya pengajuan waiver</td>
                            <td>Rp1.500.000</td>
                        </tr>
                        <tr>
                            <td>Biaya pendaftaran ujian</td>
                            <td>Rp350.000</td>
                        </tr>
                        <tr>
                            <td>Biaya mata ujian non-waiver</td>
                            <td>Sesuai biaya UPAP Jalur Reguler</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Catatan</h3>
                <ul>
                    <li>Biaya Program Waiver Sertifikasi BPK mulai berlaku di Periode I 2025.</li>
                    <li>Biaya tidak dapat dikembalikan (<em>no refund</em>).</li>
                    <li>Reschedule jadwal ujian maksimal H-8, hanya 1 kali dalam periode yang sama.</li>
                    <li>Peserta harus menyelesaikan ujian di setiap tingkatan dalam 2 tahun sejak pertama kali mengikuti. Jika lewat, wajib mengambil ulang seluruh mata ujian.</li>
                </ul>
                <a href="https://drive.google.com/file/d/1wMnsSZcg9yv3p_uXawbWtfynhDAviKrb/preview" target="_blank"> <strong> Peraturan Sertifikasi BPK </strong></a>
                
            ',
            ],
        ];

        $content = $dataByKategori[$selectedKategori] ?? null;
        return view('sertifikasi.ujian.jalur_workshop.jalur_workshop', [
            'kategoriList' => $kategoriList,
            'dataByKategori' => $dataByKategori,
            'selectedKategori' => $selectedKategori,
            'content' => $content,
        ]);
    }
}
