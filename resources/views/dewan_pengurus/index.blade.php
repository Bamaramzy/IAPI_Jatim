<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            👥 Manajemen Dewan Pengurus Nasional
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('dewan_pengurus.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm font-semibold shadow">
                    + Tambah Pengurus
                </a>
            </div>

            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded">
                <table class="min-w-full border border-gray-200 dark:border-gray-700 text-sm text-left">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 uppercase">
                        <tr>
                            <th class="px-4 py-2 border dark:border-gray-600">No</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Nama</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Jabatan</th>
                            <th class="px-4 py-2 border dark:border-gray-600 text-center">Foto</th>
                            <th class="px-4 py-2 border dark:border-gray-600 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengurus as $p)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 border dark:border-gray-600">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600 font-semibold">{{ $p->nama }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600">{{ $p->jabatan }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    @if ($p->gambar)
                                        <img src="{{ asset('storage/' . $p->gambar) }}" alt="Foto {{ $p->nama }}"
                                            class="w-20 h-20 object-cover mx-auto rounded shadow">
                                    @else
                                        <span class="text-gray-400 italic">Tidak ada</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('dewan_pengurus.edit', $p->id) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-xs">
                                            Edit
                                        </a>
                                        <form action="{{ route('dewan_pengurus.destroy', $p->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data pengurus ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
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
