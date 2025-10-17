<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Informasi') }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="mb-4">
                <a href="{{ route('informasi.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-md shadow hover:bg-indigo-700">
                    + Tambah Informasi
                </a>
            </div>
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-200">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 uppercase">
                        <tr>
                            <th class="px-4 py-2">Judul</th>
                            <th class="px-4 py-2">Gambar</th>
                            <th class="px-4 py-2">Link</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($informasis as $item)
                            <tr class="border-b dark:border-gray-600">
                                <td class="px-4 py-2">{{ $item->judul }}</td>
                                <td class="px-4 py-2">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" width="100"
                                        class="rounded shadow">
                                </td>
                                <td class="px-4 py-2">
                                    @if ($item->link)
                                        <a href="{{ $item->link }}" target="_blank"
                                            class="text-blue-600 dark:text-blue-400 hover:underline">
                                            {{ $item->link }}
                                        </a>
                                    @else
                                        <span class="text-gray-500 italic">Tidak ada link</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <a href="{{ route('informasi.edit', $item->id) }}"
                                        class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 text-xs">
                                        Edit
                                    </a>
                                    <form action="{{ route('informasi.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 text-xs">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
                                    Belum ada informasi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
