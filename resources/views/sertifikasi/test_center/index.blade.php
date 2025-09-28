<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            🏢 Daftar Test Center
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
            <div class="mb-4 text-right">
                <a href="{{ route('test_center.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    + Tambah Test Center
                </a>
            </div>

            {{-- ✅ Tabel Data --}}
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
                                {{-- No --}}
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    {{ $loop->iteration }}
                                </td>

                                {{-- ✅ Kode --}}
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    {{ $t->kode }}
                                </td>

                                {{-- ✅ Nama --}}
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    {{ $t->nama }}
                                </td>

                                {{-- ✅ Alamat --}}
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    {{ $t->alamat }}
                                </td>

                                {{-- ✅ Kota --}}
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    {{ $t->kota }}
                                </td>

                                {{-- ✅ Telp --}}
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    {{ $t->telepon ?? '-' }}
                                </td>

                                {{-- ✅ Aksi --}}
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
                {{ $testcenters->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
