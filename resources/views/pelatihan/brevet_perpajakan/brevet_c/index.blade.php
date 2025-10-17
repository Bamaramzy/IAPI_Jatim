<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            📑 Daftar Brevet C
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
                <a href="{{ route('brevets_c.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    + Tambah Brevet C
                </a>
            </div>

            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded">
                <table class="min-w-full border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="px-4 py-2 border dark:border-gray-600 w-12">No</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Judul</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Brosur</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Link Daftar</th>
                            <th class="px-4 py-2 border dark:border-gray-600 w-28">Status</th>
                            <th class="px-4 py-2 border dark:border-gray-600 w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brevets as $b)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600">
                                    {{ $b->judul }}
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    @if ($b->brosur)
                                        <img src="{{ asset('storage/' . $b->brosur) }}"
                                            class="w-24 h-24 object-contain mx-auto rounded border">
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    @if ($b->link_daftar)
                                        <a href="{{ $b->link_daftar }}" target="_blank" class="text-blue-500 underline">
                                            Buka Form
                                        </a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    <span
                                        class="px-2 py-1 rounded text-white text-xs
                                        {{ $b->status === 'publish' ? 'bg-green-500' : 'bg-gray-500' }}">
                                        {{ ucfirst($b->status) }}
                                    </span>
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('brevets_c.edit', $b->id) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('brevets_c.destroy', $b->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus?')">
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
                                <td colspan="6" class="px-4 py-4 text-center text-gray-500">
                                    Tidak ada data Brevet C.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $brevets->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
