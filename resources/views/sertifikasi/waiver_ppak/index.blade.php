<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Daftar Waiver PPAk
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
                <a href="{{ route('waiver_ppak.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    + Tambah Waiver
                </a>
            </div>

            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded">
                <table class="min-w-full border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="px-4 py-2 border dark:border-gray-600 w-12">No</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Nama Universitas</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Akreditasi</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Jumlah Waiver</th>
                            <th class="px-4 py-2 border dark:border-gray-600 w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($waivers as $w)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600">
                                    {{ $w->nama_universitas }}
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600">
                                    {{ $w->akreditasi }}
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600">
                                    {{ $w->jumlah_waiver }}
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('waiver_ppak.edit', $w->id) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('waiver_ppak.destroy', $w->id) }}" method="POST"
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
                                <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                                    Tidak ada data Waiver PPAk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $waivers->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
