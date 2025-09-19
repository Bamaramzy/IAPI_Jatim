<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Dewan Pengurus Nasional') }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            <!-- Tombol Tambah -->
            <div class="mb-4">
                <a href="{{ route('dewan_pengurus.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-md shadow hover:bg-indigo-700">
                    + Tambah Pengurus
                </a>
            </div>

            <!-- Alert -->
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel -->
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-200">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 uppercase">
                        <tr>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Jabatan</th>
                            <th class="px-4 py-2">Foto</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengurus as $item)
                            <tr class="border-b dark:border-gray-600">
                                <td class="px-4 py-2 font-medium">{{ $item->nama }}</td>
                                <td class="px-4 py-2">{{ $item->jabatan }}</td>
                                <td class="px-4 py-2">
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" width="100"
                                            class="rounded shadow">
                                    @else
                                        <span class="text-gray-500 italic">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <!-- Lihat detail -->
                                    <a href="{{ route('dewan_pengurus.show', $item->id) }}"
                                        class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-xs">
                                        Detail
                                    </a>
                                    <!-- Edit -->
                                    <a href="{{ route('dewan_pengurus.edit', $item->id) }}"
                                        class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 text-xs">
                                        Edit
                                    </a>
                                    <!-- Hapus -->
                                    <form action="{{ route('dewan_pengurus.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data pengurus ini?')">
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
                                    Belum ada data pengurus.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
