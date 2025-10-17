@extends('layouts.visitor')

@section('content')
    <section class="max-w-5xl mx-auto px-6 py-12 mt-2 bg-white shadow-md rounded-lg text-justify">
        <h1 class="text-3xl font-bold mb-6 text-center">Informasi Umum</h1>

        <p class="text-gray-700 leading-relaxed mb-6">
            Institut Akuntan Publik Indonesia (IAPI) merupakan Asosiasi Profesi Akuntan Publik Indonesia yang
            bertujuan untuk mewujudkan Akuntan Publik yang berintegritas, berkualitas, dan berkompetensi
            bersandar internasional. IAPI mendorong pertumbuhan dan independensi profesi yang sehat,
            menjaga martabat profesi Akuntan Publik, melindungi kepentingan publik dan pengguna jasa,
            serta mendorong terwujudnya <em>good governance</em> di Indonesia.
        </p>

        <p class="text-gray-700 leading-relaxed mb-10">
            Untuk mencapai tujuan tersebut, IAPI menyelenggarakan kegiatan rekrutmen anggota,
            program pendidikan berkelanjutan (PPL), serta berbagai aktivitas yang mendukung
            terciptanya akuntan publik yang profesional dan berintegritas.
        </p>

        <h2 class="text-2xl font-semibold mb-4 text-center">Kategori Anggota</h2>
        <ol class="list-decimal list-inside pl-6 space-y-2 text-gray-700 leading-relaxed mb-10">
            <li><strong>Anggota Biasa</strong> – Akuntan Publik sebagaimana dimaksud dalam Anggaran Dasar.</li>
            <li><strong>Anggota Muda</strong> – Anggota yang telah mendapat sertifikat profesi akuntan publik dan izin
                praktik.</li>
            <li><strong>Anggota Pemula</strong> – Perorangan yang sudah mendapat sertifikat A-CPA dari Dewan Sertifikasi.
            </li>
            <li><strong>Anggota Umum</strong> – Rekan non Akuntan Publik atau perorangan lain yang menyatakan minat
                tertulis.</li>
            <li><strong>Anggota Umum Lainnya</strong> – Perorangan yang bekerja pada profesi Akuntan Publik.</li>
            <li><strong>Anggota Kehormatan</strong> – Perorangan yang ditetapkan Dewan Pengurus sebagai anggota kehormatan.
            </li>
        </ol>

        <div class="mb-10">
            <p class="text-gray-700 leading-relaxed">
                Uang pendaftaran untuk menjadi Anggota IAPI ditetapkan sebesar:
                <span class="font-semibold">Rp. 500.000,-</span> (lima ratus ribu rupiah).
            </p>
        </div>

        <h2 class="text-2xl font-semibold mb-4 text-center">Iuran Tahunan Anggota</h2>
        <div class="overflow-x-auto mb-10">
            <table class="table-auto w-full border border-gray-300 text-sm text-gray-700">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">No.</th>
                        <th class="border px-4 py-2">Kategori Anggota</th>
                        <th class="border px-4 py-2">Iuran Tahunan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2 text-center">1</td>
                        <td class="border px-4 py-2">Anggota Biasa</td>
                        <td class="border px-4 py-2">Rp. 3.000.000,-</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 text-center">2</td>
                        <td class="border px-4 py-2">Anggota Muda</td>
                        <td class="border px-4 py-2">Rp. 2.000.000,-</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 text-center">3</td>
                        <td class="border px-4 py-2">Anggota Pemula</td>
                        <td class="border px-4 py-2">Rp. 300.000,-</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 text-center">4</td>
                        <td class="border px-4 py-2">Anggota Umum</td>
                        <td class="border px-4 py-2">Rp. 500.000,-</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 text-center">5</td>
                        <td class="border px-4 py-2">Anggota Umum Lainnya</td>
                        <td class="border px-4 py-2">Rp. 300.000,-</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 text-center">6</td>
                        <td class="border px-4 py-2">Anggota Kehormatan</td>
                        <td class="border px-4 py-2">Rp. 0,-</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-gray-700 leading-relaxed mb-10">
            <p>
                Bagi calon anggota yang mendaftar dalam periode <strong>September – Desember</strong>,
                jumlah iuran tahunan yang dibayarkan adalah 1 (satu) tahun ditambah iuran bulan sisa
                hingga Desember tahun berjalan.
            </p>
            <p class="mt-2">
                Bagi calon anggota yang mendaftar dalam periode <strong>Januari – Agustus</strong>,
                jumlah iuran tahunan yang dibayarkan dihitung sejak bulan pendaftaran sampai Desember tahun berjalan.
            </p>
        </div>

        <div class="text-center">
            <a href="https://member.iapi.or.id/daftar"
                class="px-6 py-3 bg-[#071225] hover:bg-[#0C2C77] text-white font-semibold rounded-lg shadow-md transition">
                Daftar menjadi Anggota IAPI
            </a>
        </div>
    </section>
@endsection
