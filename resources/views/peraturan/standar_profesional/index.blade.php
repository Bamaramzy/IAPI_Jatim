<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            📚 Daftar Standar Profesional Akuntan Publik (SPAP)
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
                <a href="{{ route('peraturan_spap.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    + Tambah SPAP
                </a>
            </div>

            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded">
                <table class="min-w-full border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="px-4 py-2 border dark:border-gray-600 w-12">No</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Judul</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Kategori</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Deskripsi</th>
                            <th class="px-4 py-2 border dark:border-gray-600">File PDF / Link</th>
                            <th class="px-4 py-2 border dark:border-gray-600 w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peraturans as $peraturan)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600 font-semibold">
                                    {{ $peraturan->judul }}
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600 text-center capitalize">
                                    {{ $peraturan->kategori }}
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600 text-sm max-w-xs truncate">
                                    {{ Str::limit(strip_tags($peraturan->deskripsi), 80) }}
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600 text-sm space-y-1">
                                    @foreach ([1, 2, 3] as $i)
                                        @php
                                            $judul = $peraturan["pdf_{$i}_judul"];
                                            $url = $peraturan["pdf_{$i}_url"];
                                        @endphp

                                        @if ($judul && $url)
                                            <div>
                                                <a href="{{ Str::startsWith($url, ['http', 'https']) ? $url : asset('storage/' . $url) }}"
                                                    target="_blank"
                                                    class="text-blue-500 hover:underline block truncate max-w-xs">
                                                    📄 {{ $judul }}
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach

                                    @if (!($peraturan->pdf_1_url || $peraturan->pdf_2_url || $peraturan->pdf_3_url))
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('peraturan_spap.edit', $peraturan->id) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('peraturan_spap.destroy', $peraturan->id) }}"
                                            method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                                    Tidak ada data SPAP.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
