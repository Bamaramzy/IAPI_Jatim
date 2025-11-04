@extends('layouts.visitor')

@section('content')
    <section class="max-w-6xl mx-auto px-6 py-12 mt-2 bg-white shadow-md rounded-lg">

        <h1 class="text-3xl font-bold mb-6 text-center">Test Center CPA di Indonesia</h1>

        <div class="mb-8">
            <iframe src="https://www.google.com/maps/d/embed?mid=1hBdqsyC5JZid6w9--07QCKukAkW9jUs&ehbc=2E312F"
                class="w-full h-56 sm:h-64 md:h-80 lg:h-96 rounded-lg border" loading="lazy"></iframe>
        </div>

        <p class="text-gray-700 leading-relaxed mb-6 text-justify">
            CPA of Indonesia Exam dapat diikuti oleh peserta di setiap Testing Center yang dimiliki atau bekerja sama
            dengan Institut Akuntan Publik Indonesia (IAPI), di seluruh Indonesia.
        </p>

        <p class="text-gray-700 leading-relaxed mb-6 text-justify">
            *Setiap testi center memiliki kapasitas terbatas, dan pelayanan kepada peserta akan dilakukan berdasarkan
            urutan janji (appointment).
        </p>

        <form action="{{ route('visitor.test_center') }}" method="GET"
            class="mb-6 flex flex-col sm:flex-row sm:items-center gap-3">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari berdasarkan nama, kode, atau kota..."
                class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:ring focus:ring-blue-300 focus:outline-none">

            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                <button type="submit"
                    class="w-full sm:w-auto bg-[#071225] text-white px-5 py-2 rounded-lg hover:bg-[#0C2C77] transition text-center">
                    Cari
                </button>

                @if (request('search'))
                    <a href="{{ route('visitor.test_center') }}"
                        class="w-full sm:w-auto bg-gray-200 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-300 transition text-center">
                        Reset
                    </a>
                @endif
            </div>
        </form>

        <div class="hidden md:block overflow-x-auto bg-white shadow rounded">
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
                            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2 text-center">{{ $t->kode }}</td>
                            <td class="border px-4 py-2">{{ $t->nama }}</td>
                            <td class="border px-4 py-2">{{ $t->alamat }}</td>
                            <td class="border px-4 py-2 text-center">{{ $t->kota }}</td>
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

        <div class="md:hidden space-y-4">
            @forelse ($testcenters as $t)
                <div class="border rounded-lg p-4 bg-white shadow-sm">
                    <div class="flex items-start justify-between">
                        <div>
                            <div class="text-sm text-gray-600">Kode: <span class="font-medium">{{ $t->kode }}</span>
                            </div>
                            <h3 class="font-semibold text-gray-800 mt-1">{{ $t->nama }}</h3>
                        </div>
                        <div class="text-sm text-gray-600">No. {{ $loop->iteration }}</div>
                    </div>

                    <p class="text-sm text-gray-600 mt-2">Kota: <span class="font-medium">{{ $t->kota }}</span></p>
                    <p class="text-sm text-gray-600 mt-1">Telp: <span class="font-medium">{{ $t->telepon ?? '-' }}</span>
                    </p>
                    <p class="text-sm text-gray-700 mt-2">{{ $t->alamat }}</p>
                </div>
            @empty
                <div class="text-center text-gray-500">Belum ada data Test Center.</div>
            @endforelse
        </div>

        <div class="mt-6 flex justify-center">
            {{ $testcenters->appends(['search' => request('search')])->links('vendor.pagination.tailwind') }}
        </div>

    </section>
@endsection
