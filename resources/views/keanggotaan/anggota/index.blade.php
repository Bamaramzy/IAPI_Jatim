<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('📋 Daftar Anggota') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('anggota.import') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                @csrf
                <div class="flex flex-col sm:flex-row gap-2">
                    <input type="file" name="file" class="block w-full border rounded-md p-2 text-sm" required>
                    <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded-md hover:bg-green-700">
                        📥 Import Excel
                    </button>
                </div>
            </form>

            <a href="{{ route('anggota.create') }}"
                class="inline-flex items-center px-4 py-2 mb-4 bg-indigo-600 text-white text-sm font-semibold rounded-md shadow hover:bg-indigo-700">
                + Tambah Anggota
            </a>

            <form method="GET" action="{{ route('anggota.index') }}" class="flex flex-wrap items-center gap-3 mb-4">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari nama, No Reg, atau KAP..."
                    class="border rounded-md px-3 py-2 text-sm w-80 dark:bg-gray-900 dark:text-gray-100">

                <select name="kategori"
                    class="border rounded-md px-3 py-2 text-sm w-40 dark:bg-gray-900 dark:text-gray-100">
                    <option value="">Semua Kategori</option>
                    @foreach ($kategoriList as $kategori)
                        <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>
                            {{ $kategori }}
                        </option>
                    @endforeach
                </select>

                <select name="korwil"
                    class="border rounded-md px-3 py-2 text-sm w-40 dark:bg-gray-900 dark:text-gray-100">
                    <option value="">Semua Korwil</option>
                    @foreach ($korwilList as $korwil)
                        <option value="{{ $korwil }}" {{ request('korwil') == $korwil ? 'selected' : '' }}>
                            {{ $korwil }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                    Terapkan
                </button>

                <a href="{{ route('anggota.index') }}"
                    class="px-4 py-2 rounded text-sm font-medium transition
                    {{ request()->has('search') || request()->has('kategori') || request()->has('korwil')
                        ? 'bg-gray-400 text-white hover:bg-gray-500'
                        : 'bg-gray-200 text-gray-500 cursor-not-allowed opacity-60' }}">
                    Reset
                </a>
            </form>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-200">
                    <thead class="bg-gray-100 dark:bg-gray-700 uppercase">
                        <tr>
                            <th class="px-3 py-2">No Urut</th>
                            <th class="px-3 py-2">No Reg IAPI</th>
                            <th class="px-3 py-2">Nama Anggota</th>
                            <th class="px-3 py-2">Izin AP</th>
                            <th class="px-3 py-2">Kategori</th>
                            <th class="px-3 py-2">Nama KAP</th>
                            <th class="px-3 py-2">Status</th>
                            <th class="px-3 py-2">Korwil</th>
                            <th class="px-3 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($anggota as $a)
                            <tr class="border-b dark:border-gray-600">
                                <td class="px-3 py-2">{{ $a->no_urut }}</td>
                                <td class="px-3 py-2">{{ $a->no_reg_iapi }}</td>
                                <td class="px-3 py-2">{{ $a->nama_anggota }}</td>
                                <td class="px-3 py-2">{{ $a->izin_ap }}</td>
                                <td class="px-3 py-2">{{ $a->kategori }}</td>
                                <td class="px-3 py-2">{{ $a->nama_kap }}</td>
                                <td class="px-3 py-2">
                                    @if ($a->status_id === 'Aktif')
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Aktif</span>
                                    @elseif ($a->status_id === 'Cuti Sementara')
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Cuti
                                            Sementara</span>
                                    @else
                                        <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-xs">Tidak
                                            Diketahui</span>
                                    @endif
                                </td>
                                <td class="px-3 py-2">{{ $a->korwil }}</td>
                                <td class="px-3 py-2 flex space-x-2">
                                    <a href="{{ route('anggota.edit', $a->id) }}"
                                        class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 text-xs">✏️
                                        Edit</a>
                                    <form action="{{ route('anggota.destroy', $a->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin hapus anggota ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 text-xs">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-3 py-2 text-center text-gray-500 dark:text-gray-400">
                                    Belum ada data anggota
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $anggota->appends(request()->query())->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
