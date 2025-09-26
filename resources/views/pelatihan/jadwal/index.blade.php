<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            📅 Daftar Jadwal Pelatihan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- ✅ Pesan Sukses --}}
            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ✅ Tombol Tambah --}}
            <div class="mb-4">
                <a href="{{ route('pelatihan.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    + Tambah Jadwal
                </a>
            </div>

            {{-- ✅ Tabel Data --}}
            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded">
                <table class="min-w-full border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 border dark:border-gray-600">No</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Judul</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Tanggal Mulai</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Tanggal Selesai</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Jam Mulai</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Jam Selesai</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Kategori</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Lokasi</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Brosur</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Status</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pelatihans as $p)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 border dark:border-gray-600">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600 font-semibold">{{ $p->judul }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600">{{ $p->tanggal_mulai }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600">{{ $p->tanggal_selesai }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600">{{ $p->waktu_mulai }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600">{{ $p->waktu_selesai }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600">{{ $p->kategori }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600">{{ $p->lokasi }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    @if ($p->brosur)
                                        <a href="{{ asset('storage/' . $p->brosur) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $p->brosur) }}" alt="Brosur"
                                                class="w-16 h-16 object-cover mx-auto rounded">
                                        </a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    <span
                                        class="px-2 py-1 rounded text-white
                                            {{ $p->status == 'publish' ? 'bg-green-500' : 'bg-gray-500' }}">
                                        {{ ucfirst($p->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('pelatihan.edit', $p->id) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded">
                                            Edit
                                        </a>
                                        <form action="{{ route('pelatihan.destroy', $p->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="px-4 py-4 text-center text-gray-500">
                                    Tidak ada data jadwal pelatihan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- ✅ Pagination --}}
            <div class="mt-4">
                {{ $pelatihans->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
