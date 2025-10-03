@extends('layouts.visitor')

@section('content')
    <section class="max-w-6xl mx-auto px-6 py-12 bg-white shadow-md rounded-lg">

        {{-- 🏛 Judul --}}
        <h1 class="text-3xl font-bold mb-6 text-center">Daftar Waiver PPAk</h1>

        {{-- 📖 Informasi Singkat --}}
        <p class="text-gray-700 leading-relaxed mb-6 text-justify">
            Waiver PPAk adalah pengakuan mata uji tertentu yang tidak perlu diikuti oleh lulusan Program Pendidikan Profesi
            Akuntansi (PPAk) yang telah memenuhi syarat sesuai ketentuan IAPI.
        </p>

        {{-- 🔍 Form Pencarian --}}
        <div class="mb-6">
            <form method="GET" action="{{ route('visitor.waiver_ppak') }}" class="flex items-center gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                    class="w-full border rounded px-3 py-2 dark:bg-gray-700 dark:text-white"
                    placeholder="Cari universitas...">
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                    Cari
                </button>
                @if (request('search'))
                    <a href="{{ route('visitor.waiver_ppak') }}"
                        class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        {{-- 📊 Tabel Waiver --}}
        <div class="overflow-x-auto bg-white shadow rounded">
            <table class="min-w-full border border-gray-300">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        {{-- No --}}
                        <th class="border px-4 py-2 text-center w-16">
                            <a href="{{ route('visitor.waiver_ppak', array_merge(request()->query(), ['sort' => 'id', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex items-center justify-center gap-1">
                                No
                                @if (request('sort') === 'id')
                                    {!! request('direction') === 'asc' ? '↑' : '↓' !!}
                                @endif
                            </a>
                        </th>

                        {{-- Universitas --}}
                        <th class="border px-4 py-2 text-left">
                            <a href="{{ route('visitor.waiver_ppak', array_merge(request()->query(), ['sort' => 'nama_universitas', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex items-center gap-1">
                                Universitas
                                @if (request('sort') === 'nama_universitas')
                                    {!! request('direction') === 'asc' ? '↑' : '↓' !!}
                                @endif
                            </a>
                        </th>

                        {{-- Jumlah Waiver --}}
                        <th class="border px-4 py-2 text-center">
                            <a href="{{ route('visitor.waiver_ppak', array_merge(request()->query(), ['sort' => 'jumlah_waiver', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex items-center justify-center gap-1">
                                Jumlah Mata Uji Diwaiver
                                @if (request('sort') === 'jumlah_waiver')
                                    {!! request('direction') === 'asc' ? '↑' : '↓' !!}
                                @endif
                            </a>
                        </th>

                        {{-- Akreditasi --}}
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

        <p class="text-gray-700 mt-2 leading-relaxed mb-6 text-justify">
            * Bagi peserta yang telah lulus program PPAk dari kampus yang bekerja sama dengan IAPI, serta memiliki Surat
            Tanda Terdaftar dari IAPI, maka atas rekomendasi dari kampus tersebut peserta dapat mengikuti program RPL –
            PPAk. IAPI dapat memberikan program waiver untuk mata ujian pada Ujian Tingkat Dasar dan Tingkat Profesional
            sesuai dengan hasil verifikasi transkrip nilai akademik D4/S1 Akuntansi yang dimiliki oleh masing-masing
            peserta.
        </p>

        {{-- 📌 Pagination --}}
        <div class="mt-6">
            {{ $waivers->appends(request()->query())->links() }}
        </div>

    </section>
@endsection
