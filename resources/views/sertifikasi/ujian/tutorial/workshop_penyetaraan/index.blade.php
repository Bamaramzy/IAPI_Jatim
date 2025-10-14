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
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
                    + Tambah Workshop
                </a>
            </div>

            {{-- ✅ Tabel Data --}}
            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded">
                <table class="min-w-full border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="px-4 py-2 border dark:border-gray-600 w-12">No</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Kategori</th>
                            <th class="px-4 py-2 border dark:border-gray-600 w-1/3">PDF</th>
                            <th class="px-4 py-2 border dark:border-gray-600 w-1/3">Video</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategoris as $kategori)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                {{-- ✅ No --}}
                                <td class="px-4 py-2 border dark:border-gray-600 text-center align-top">
                                    {{ $loop->iteration }}
                                </td>

                                {{-- ✅ Nama Kategori --}}
                                <td class="px-4 py-2 border dark:border-gray-600 font-semibold align-top">
                                    {{ $kategori->nama_kategori }}
                                </td>

                                {{-- ✅ Daftar PDF --}}
                                <td class="px-4 py-2 border dark:border-gray-600 align-top">
                                    @forelse ($kategori->pdfs as $pdf)
                                        @php
                                            $pdfUrl = $pdf->link_url
                                                ? $pdf->link_url
                                                : ($pdf->file_path
                                                    ? Storage::url($pdf->file_path)
                                                    : null);
                                            $thumb = $pdf->preview_thumbnail
                                                ? Storage::url($pdf->preview_thumbnail)
                                                : null;
                                        @endphp

                                        <div class="flex items-center justify-between mb-2">
                                            <div class="flex items-center space-x-2">
                                                @if ($thumb)
                                                    <img src="{{ $thumb }}" alt="thumb"
                                                        class="w-10 h-10 object-cover rounded">
                                                @endif

                                                @if ($pdfUrl)
                                                    <a href="{{ $pdfUrl }}" target="_blank"
                                                        class="text-blue-500 hover:underline truncate max-w-xs">
                                                        📄 {{ $pdf->judul }}
                                                    </a>
                                                @else
                                                    <span class="text-gray-400 italic">Tidak ada file</span>
                                                @endif
                                            </div>

                                            <div class="flex space-x-1">
                                                <a href="{{ route('workshop_penyetaraan.edit', ['workshop_penyetaraan' => $pdf->id, 'type' => 'pdf']) }}"
                                                    class="text-xs bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded">
                                                    Edit
                                                </a>
                                                <form action="{{ route('workshop_penyetaraan.destroyPdf', $pdf->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus PDF ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-xs bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @empty
                                        <span class="text-gray-400 italic">-</span>
                                    @endforelse
                                </td>

                                {{-- ✅ Daftar Video --}}
                                <td class="px-4 py-2 border dark:border-gray-600 align-top">
                                    @forelse ($kategori->videos as $video)
                                        @php
                                            $videoUrl = $video->video_url
                                                ? (Str::startsWith($video->video_url, 'http')
                                                    ? $video->video_url
                                                    : Storage::url($video->video_url))
                                                : null;
                                            $thumb = $video->thumbnail_url ? Storage::url($video->thumbnail_url) : null;
                                        @endphp

                                        <div class="flex items-center justify-between mb-2">
                                            <div class="flex items-center space-x-2">
                                                @if ($thumb)
                                                    <img src="{{ $thumb }}" alt="thumb"
                                                        class="w-10 h-10 object-cover rounded">
                                                @endif

                                                @if ($videoUrl)
                                                    <a href="{{ $videoUrl }}" target="_blank"
                                                        class="text-blue-500 hover:underline truncate max-w-xs">
                                                        ▶ {{ $video->judul }}
                                                    </a>
                                                @else
                                                    <span class="text-gray-400 italic">Tidak ada video</span>
                                                @endif
                                            </div>

                                            <div class="flex space-x-1">
                                                <a href="{{ route('workshop_penyetaraan.edit', ['workshop_penyetaraan' => $video->id, 'type' => 'video']) }}"
                                                    class="text-xs bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded">
                                                    Edit
                                                </a>
                                                <form
                                                    action="{{ route('workshop_penyetaraan.destroyVideo', $video->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus video ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-xs bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @empty
                                        <span class="text-gray-400 italic">-</span>
                                    @endforelse
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
