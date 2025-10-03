<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            🎓 Daftar Workshop Penyetaraan
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
                <a href="{{ route('workshop_penyetaraan.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    + Tambah Data
                </a>
            </div>

            {{-- ✅ Tabel Data --}}
            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded">
                <table class="min-w-full border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="px-4 py-2 border dark:border-gray-600 w-12">No</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Kategori</th>
                            <th class="px-4 py-2 border dark:border-gray-600">PDF</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Video</th>
                            <th class="px-4 py-2 border dark:border-gray-600 w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategoris as $kategori)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                {{-- ✅ No --}}
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    {{ $loop->iteration }}
                                </td>

                                {{-- ✅ Nama Kategori --}}
                                <td class="px-4 py-2 border dark:border-gray-600 font-semibold">
                                    {{ $kategori->nama_kategori }}
                                </td>

                                {{-- ✅ PDF --}}
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    @forelse ($kategori->pdfs as $pdf)
                                        <div class="flex justify-between items-center">
                                            <a href="{{ Str::startsWith($pdf->file_path, 'http') ? $pdf->file_path : Storage::url($pdf->file_path) }}"
                                                target="_blank" class="text-blue-500 hover:underline">
                                                📄 {{ $pdf->judul }}
                                            </a>
                                            <div class="flex space-x-1">
                                                <a href="{{ route('workshop_penyetaraan.edit', $pdf->id) }}"
                                                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-xs">
                                                    Edit
                                                </a>
                                                <form action="{{ route('workshop_penyetaraan.destroy', $pdf->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus PDF ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @empty
                                        <span class="text-gray-400">-</span>
                                    @endforelse
                                </td>

                                {{-- ✅ Video --}}
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    @forelse ($kategori->videos as $video)
                                        <div class="flex justify-between items-center">
                                            <a href="{{ $video->video_url }}" target="_blank"
                                                class="text-blue-500 hover:underline">
                                                ▶ {{ $video->judul }}
                                            </a>
                                            <div class="flex space-x-1">
                                                <a href="{{ route('workshop_penyetaraan.edit', $video->id) }}"
                                                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-xs">
                                                    Edit
                                                </a>
                                                <form action="{{ route('workshop_penyetaraan.destroy', $video->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus Video ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @empty
                                        <span class="text-gray-400">-</span>
                                    @endforelse
                                </td>

                                {{-- ✅ Aksi Kategori --}}
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('workshop_penyetaraan.edit', $kategori->id) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('workshop_penyetaraan.destroy', $kategori->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kategori ini beserta semua PDF & Video terkait?')">
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
                                    Tidak ada data Workshop Penyetaraan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
