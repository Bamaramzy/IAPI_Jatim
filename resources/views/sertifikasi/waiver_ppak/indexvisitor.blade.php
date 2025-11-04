@extends('layouts.visitor')

@section('content')
    <section class="max-w-6xl mx-auto px-6 py-12 mt-2 bg-white shadow-md rounded-lg">

        <h1 class="text-3xl font-bold mb-6 text-center">Daftar Waiver PPAk</h1>

        <p class="text-gray-700 leading-relaxed mb-6 text-justify">
            Waiver PPAk adalah pengakuan mata uji tertentu yang tidak perlu diikuti oleh lulusan Program Pendidikan Profesi
            Akuntansi (PPAk) yang telah memenuhi syarat sesuai ketentuan IAPI.
        </p>

        <div class="mb-8">
            <form action="{{ route('visitor.waiver_ppak') }}" method="GET"
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
                        <a href="{{ route('visitor.waiver_ppak') }}"
                            class="w-full sm:w-auto bg-gray-200 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-300 transition text-center">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="hidden md:block overflow-x-auto bg-white shadow rounded">
            <table class="min-w-full border border-gray-300">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="border px-4 py-2 text-center w-16">
                            <a href="{{ route('visitor.waiver_ppak', array_merge(request()->query(), ['sort' => 'id', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex items-center justify-center gap-1">
                                No
                                @if (request('sort') === 'id')
                                    {!! request('direction') === 'asc' ? '↑' : '↓' !!}
                                @endif
                            </a>
                        </th>

                        <th class="border px-4 py-2 text-left">
                            <a href="{{ route('visitor.waiver_ppak', array_merge(request()->query(), ['sort' => 'nama_universitas', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex items-center gap-1">
                                Universitas
                                @if (request('sort') === 'nama_universitas')
                                    {!! request('direction') === 'asc' ? '↑' : '↓' !!}
                                @endif
                            </a>
                        </th>

                        <th class="border px-4 py-2 text-center">
                            <a href="{{ route('visitor.waiver_ppak', array_merge(request()->query(), ['sort' => 'jumlah_waiver', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex items-center justify-center gap-1">
                                Jumlah Mata Uji Diwaiver
                                @if (request('sort') === 'jumlah_waiver')
                                    {!! request('direction') === 'asc' ? '↑' : '↓' !!}
                                @endif
                            </a>
                        </th>

                        <th class="border px-4 py-2 text-left">
                            <a href="{{ route('visitor.waiver_ppak', array_merge(request()->query(), ['sort' => 'akreditasi', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex items-center gap-1">
                                Akreditasi
                                @if (request('sort') === 'akreditasi')
                                    {!! request('direction') === 'asc' ? '↑' : '↓' !!}
                                @endif
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($waivers as $w)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2 text-center">
                                {{ $loop->iteration + ($waivers->currentPage() - 1) * $waivers->perPage() }}</td>
                            <td class="border px-4 py-2">{{ $w->nama_universitas }}</td>
                            <td class="border px-4 py-2 text-center">{{ $w->jumlah_waiver }}</td>
                            <td class="border px-4 py-2">{{ $w->akreditasi ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                                Belum ada data Waiver PPAk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="md:hidden space-y-4">
            @forelse ($waivers as $w)
                <div class="border rounded-lg p-4 bg-white shadow-sm">
                    <div class="flex justify-between items-start">
                        <div class="text-sm text-gray-600">No.
                            {{ $loop->iteration + ($waivers->currentPage() - 1) * $waivers->perPage() }}</div>
                        <div class="text-sm text-gray-600">{{ $w->akreditasi ?? '-' }}</div>
                    </div>
                    <h3 class="font-semibold text-gray-800 mt-2">{{ $w->nama_universitas }}</h3>
                    <p class="text-sm text-gray-600 mt-1">Jumlah Mata Uji Diwaiver: <span
                            class="font-medium">{{ $w->jumlah_waiver }}</span></p>
                </div>
            @empty
                <div class="text-center text-gray-500">Belum ada data Waiver PPAk.</div>
            @endforelse
        </div>

        <p class="text-gray-700 mt-2 leading-relaxed mb-6 text-justify">
            * Bagi peserta yang telah lulus program PPAk dari kampus yang bekerja sama dengan IAPI, serta memiliki Surat
            Tanda Terdaftar dari IAPI, maka atas rekomendasi dari kampus tersebut peserta dapat mengikuti program RPL –
            PPAk. IAPI dapat memberikan program waiver untuk mata ujian pada Ujian Tingkat Dasar dan Tingkat Profesional
            sesuai dengan hasil verifikasi transkrip nilai akademik D4/S1 Akuntansi yang dimiliki oleh masing-masing
            peserta.
        </p>

        <div class="mt-6">
            {{ $waivers->appends(request()->query())->links('vendor.pagination.tailwind') }}
        </div>

    </section>
@endsection
