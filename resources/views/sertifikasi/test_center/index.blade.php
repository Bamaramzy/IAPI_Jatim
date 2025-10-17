<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            🏢 Daftar Test Center
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
                <a href="{{ route('test_center.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    + Tambah Test Center
                </a>
            </div>
            <form action="{{ route('test_center.index') }}" method="GET"
                class="mb-6 flex flex-col sm:flex-row sm:items-center gap-3">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari berdasarkan nama, kode, atau kota..."
                    class="border border-gray-300 rounded-lg px-4 py-2 w-full sm:w-1/2 focus:ring focus:ring-blue-300 focus:outline-none">

                <div class="flex gap-3">
                    <button type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                        Cari
                    </button>

                    @if (request('search'))
                        <a href="{{ route('test_center.index') }}"
                            class="bg-gray-200 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-300 transition">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded">
                <table class="min-w-full border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="px-4 py-2 border dark:border-gray-600 w-12">No</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Kode</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Nama</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Alamat</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Kota</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Telp</th>
                            <th class="px-4 py-2 border dark:border-gray-600 w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($testcenters as $t)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    {{ $t->kode }}
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    {{ $t->nama }}
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    {{ $t->alamat }}
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    {{ $t->kota }}
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    {{ $t->telepon ?? '-' }}
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('test_center.edit', $t->id) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('test_center.destroy', $t->id) }}" method="POST"
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
                                    Tidak ada data Test Center.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $testcenters->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
