<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('📋 Daftar Anggota') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            {{-- ✅ Pesan Sukses --}}
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ✅ Form Import Excel --}}
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

            {{-- ✅ Tombol Tambah Anggota --}}
            <a href="{{ route('anggota.create') }}"
                class="inline-flex items-center px-4 py-2 mb-4 bg-indigo-600 text-white text-sm font-semibold rounded-md shadow hover:bg-indigo-700">
                + Tambah Anggota
            </a>

            {{-- ✅ Tabel Anggota --}}
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
                                        <span class="badge bg-success">Aktif</span>
                                    @elseif ($a->status_id === 'Cuti Sementara')
                                        <span class="badge bg-warning">Cuti Sementara</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak Diketahui</span>
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

            {{-- ✅ Pagination --}}
            <div class="mt-4">
                {{ $anggota->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
