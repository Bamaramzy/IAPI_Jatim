@extends('layouts.visitor')

@section('content')
    <section class="max-w-7xl mx-auto px-6 py-12 mt-2 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">Daftar Anggota</h1>
        <form method="GET" action="{{ route('visitor.anggota') }}" class="mb-6 grid grid-cols-1 md:grid-cols-5 gap-4">
            <select name="kategori" class="border rounded-lg px-3 py-2 w-full">
                <option value="">-- Semua Kategori --</option>
                <option value="anggota biasa" {{ request('kategori') == 'anggota biasa' ? 'selected' : '' }}>Anggota Biasa
                </option>
                <option value="anggota madya" {{ request('kategori') == 'anggota madya' ? 'selected' : '' }}>Anggota Madya
                </option>
                <option value="anggota muda" {{ request('kategori') == 'anggota muda' ? 'selected' : '' }}>Anggota Muda
                </option>
                <option value="anggota pemula" {{ request('kategori') == 'anggota pemula' ? 'selected' : '' }}>Anggota
                    Pemula</option>
                <option value="anggota umum" {{ request('kategori') == 'anggota umum' ? 'selected' : '' }}>Anggota Umum
                </option>
            </select>

            <select name="status" class="border rounded-lg px-3 py-2 w-full">
                <option value="">-- Semua Status --</option>
                <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="cuti sementara" {{ request('status') == 'cuti sementara' ? 'selected' : '' }}>Cuti Sementara
                </option>
            </select>

            <input type="text" name="search" placeholder="Cari Nama Anggota / KAP" value="{{ request('search') }}"
                class="border rounded-lg px-3 py-2 w-full">

            <button type="submit" class="bg-[#071225] text-white rounded-lg px-4 py-2 hover:bg-[#0C2C77]">
                Filter
            </button>

            @if (request('kategori') || request('status') || request('search'))
                <a href="{{ route('visitor.anggota') }}"
                    class="bg-gray-400 text-white rounded-lg px-4 py-2 hover:bg-gray-500 text-center">
                    Reset
                </a>
            @endif
        </form>

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-lg shadow-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">No Reg IAPI</th>
                        <th class="px-4 py-2 border">Nama Anggota</th>
                        <th class="px-4 py-2 border">Kategori</th>
                        <th class="px-4 py-2 border">Nama KAP</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border">Korwil</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($anggota as $index => $a)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $anggota->firstItem() + $index }}</td>
                            <td class="px-4 py-2 border">{{ $a->no_reg_iapi }}</td>
                            <td class="px-4 py-2 border">{{ $a->nama_anggota }}</td>
                            <td class="px-4 py-2 border">{{ $a->kategori }}</td>
                            <td class="px-4 py-2 border">{{ $a->nama_kap }}</td>
                            <td class="px-4 py-2 border">
                                <span
                                    class="px-2 py-1 rounded text-white
                                    @if ($a->status_id === 'Aktif') bg-green-500
                                    @elseif ($a->status_id === 'Cuti Sementara') 
                                        bg-yellow-500 text-black
                                    @else
                                        bg-red-500 @endif">
                                    {{ $a->status_id }}
                                </span>
                            </td>
                            <td class="px-4 py-2 border">{{ $a->korwil }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">Tidak ada data ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $anggota->appends(request()->query())->links('vendor.pagination.tailwind') }}
        </div>
    </section>
@endsection
