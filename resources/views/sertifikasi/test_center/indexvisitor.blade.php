@extends('layouts.visitor')

@section('content')
    <section class="max-w-6xl mx-auto px-6 py-12 bg-white shadow-md rounded-lg">

        <h1 class="text-3xl font-bold mb-6 text-center">Test Center CPA di Indonesia</h1>

        {{-- 📍 Peta --}}
        <div class="mb-8">
            <iframe src="https://www.google.com/maps/d/embed?mid=1hBdqsyC5JZid6w9--07QCKukAkW9jUs&ehbc=2E312F" width="100%"
                height="480" class="rounded-lg border">
            </iframe>
        </div>

        {{-- 📖 Informasi Singkat --}}
        <p class="text-gray-700 leading-relaxed mb-6 text-justify">
            CPA of Indonesia Exam dapat diikuti oleh peserta di setiap Testing Center yang dimiliki atau bekerja sama
            dengan Institut Akuntan Publik Indonesia (IAPI), di seluruh Indonesia.
        </p>

        <p class="text-gray-700 leading-relaxed mb-6 text-justify">
            *Setiap testing center memiliki kapasitas terbatas, dan pelayanan kepada peserta akan dilakukan berdasarkan
            urutan janji (appointment).
        </p>

        {{-- 📊 Tabel Test Center --}}
        <div class="overflow-x-auto bg-white shadow rounded">
            <table class="min-w-full border border-gray-300">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="border px-4 py-2 text-center w-16">No</th>
                        <th class="border px-4 py-2 text-center">Kode</th>
                        <th class="border px-4 py-2 text-left">Nama</th>
                        <th class="border px-4 py-2 text-left">Alamat</th>
                        <th class="border px-4 py-2 text-center">Kota</th>
                        <th class="border px-4 py-2 text-center">Telp</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($testcenters as $t)
                        <tr class="hover:bg-gray-50">
                            {{-- No --}}
                            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>

                            {{-- Kode --}}
                            <td class="border px-4 py-2 text-center">{{ $t->kode }}</td>

                            {{-- Nama --}}
                            <td class="border px-4 py-2">{{ $t->nama }}</td>

                            {{-- Alamat --}}
                            <td class="border px-4 py-2">{{ $t->alamat }}</td>

                            {{-- Kota --}}
                            <td class="border px-4 py-2 text-center">{{ $t->kota }}</td>

                            {{-- Telepon --}}
                            <td class="border px-4 py-2 text-center">{{ $t->telepon ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-4 text-center text-gray-500">
                                Belum ada data Test Center.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- 📌 Pagination --}}
        <div class="mt-6">
            {{ $testcenters->links() }}
        </div>

    </section>
@endsection
