{{-- resources/views/sertifikasi/jalur_reguler/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Daftar Jalur Reguler
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mb-4 text-right">
                <a href="{{ route('jalur_reguler.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    + Tambah Jalur Reguler
                </a>
            </div>
            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded">
                <table class="min-w-full border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="px-4 py-2 border dark:border-gray-600 w-12">No</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Kategori</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Judul</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Konten</th>
                            <th class="px-4 py-2 border dark:border-gray-600">File</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Link</th>
                            <th class="px-4 py-2 border dark:border-gray-600 w-40 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jalurRegulers as $jr)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    {{ $loop->iteration + ($jalurRegulers->currentPage() - 1) * $jalurRegulers->perPage() }}
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600">{{ $jr->kategori }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600">{{ $jr->judul }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    {{ Str::limit(strip_tags($jr->konten), 50, '...') }}
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    @if ($jr->file)
                                        <a href="{{ asset('storage/' . $jr->file) }}" target="_blank"
                                            class="text-blue-600 hover:underline">📄 Lihat</a>
                                    @else
                                        -
                                    @endif
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600">
                                    @if ($jr->link)
                                        <a href="{{ $jr->link }}" target="_blank"
                                            class="text-blue-600 hover:underline">🔗 Link</a>
                                    @else
                                        -
                                    @endif
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('jalur_reguler.edit', $jr->id) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('jalur_reguler.destroy', $jr->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-4 text-center text-gray-500">
                                    Tidak ada data Jalur Reguler.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $jalurRegulers->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
