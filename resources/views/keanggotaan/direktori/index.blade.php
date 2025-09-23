<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            📂 Daftar Direktori
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
                <a href="{{ route('direktori.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    + Tambah Direktori
                </a>
            </div>

            {{-- ✅ Tabel Data --}}
            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded">
                <table class="min-w-full border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 border dark:border-gray-600">ID</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Judul</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Deskripsi</th>
                            <th class="px-4 py-2 border dark:border-gray-600">File PDF</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Cover</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Link Drive</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Status</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($direktoris as $d)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 border dark:border-gray-600">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600 font-semibold">{{ $d->judul }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600">{{ Str::limit($d->deskripsi, 50) }}
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    @if ($d->file_pdf)
                                        <a href="{{ asset('storage/' . $d->file_pdf) }}" target="_blank"
                                            class="text-blue-500 hover:underline">Lihat PDF</a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    @if ($d->cover)
                                        <img src="{{ asset('storage/' . $d->cover) }}" alt="Cover"
                                            class="w-16 h-16 object-cover mx-auto rounded">
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    @if ($d->link_drive)
                                        <a href="{{ $d->link_drive }}" target="_blank"
                                            class="text-blue-500 hover:underline">Lihat Drive</a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    <span
                                        class="px-2 py-1 rounded text-white
                                        {{ $d->status == 'aktif' ? 'bg-green-500' : 'bg-red-500' }}">
                                        {{ ucfirst($d->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('direktori.edit', $d->id) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>

                                        <form action="{{ route('direktori.destroy', $d->id) }}" method="POST"
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
                                <td colspan="8" class="px-4 py-4 text-center text-gray-500">
                                    Tidak ada data direktori.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- ✅ Pagination --}}
            <div class="mt-4">
                {{ $direktoris->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
