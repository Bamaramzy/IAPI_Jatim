<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            🎥 Daftar PPL
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
                <a href="{{ route('ppl.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    + Tambah PPL
                </a>
            </div>

            {{-- ✅ Tabel Data --}}
            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded">
                <table class="min-w-full border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="px-4 py-2 border dark:border-gray-600 w-12">No</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Video</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Preview PDF</th>
                            <th class="px-4 py-2 border dark:border-gray-600 w-28">Status</th>
                            <th class="px-4 py-2 border dark:border-gray-600 w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ppls as $p)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                {{-- No --}}
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    {{ $loop->iteration }}
                                </td>

                                {{-- ✅ Video Embed --}}
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    @if ($p->video_url)
                                        <iframe src="{{ $p->video_url }}" class="w-44 h-28 mx-auto rounded"
                                            allowfullscreen></iframe>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>

                                {{-- ✅ Preview PDF --}}
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    @if ($p->pdf_url)
                                        <iframe
                                            src="https://drive.google.com/file/d/11KrWpMA0T3Uw7D1a7DHWvOmqgS6n3Vnf/preview"
                                            class="w-32 h-40 mx-auto border rounded"></iframe>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>

                                {{-- ✅ Status --}}
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    <span
                                        class="px-2 py-1 rounded text-white text-xs
                                        {{ $p->status === 'publish' ? 'bg-green-500' : 'bg-gray-500' }}">
                                        {{ ucfirst($p->status) }}
                                    </span>
                                </td>

                                {{-- ✅ Aksi --}}
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('ppl.edit', $p->id) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('ppl.destroy', $p->id) }}" method="POST"
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
                                <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                                    Tidak ada data PPL.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- ✅ Pagination --}}
            <div class="mt-4">
                {{ $ppls->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
