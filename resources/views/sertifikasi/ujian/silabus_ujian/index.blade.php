<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Daftar Silabus Ujian, Modul, dan Ilurstasi Soal
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
                <a href="{{ route('silabus_ujian.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    + Tambah Silabus
                </a>
            </div>

            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded">
                <table class="min-w-full border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="px-4 py-2 border dark:border-gray-600 w-12">No</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Judul</th>
                            <th class="px-4 py-2 border dark:border-gray-600">PDF</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Modul</th>
                            <th class="px-4 py-2 border dark:border-gray-600 w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($silabus as $s)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600">
                                    <div>
                                        <p class="font-semibold">{{ $s->judul }}</p>
                                        <p class="text-xs text-gray-500">({{ $s->kategori_utama }} -
                                            {{ $s->sub_kategori }})</p>
                                    </div>
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600">
                                    @if ($s->pdf_file)
                                        <a href="{{ Storage::url($s->pdf_file) }}" target="_blank"
                                            class="text-blue-500 hover:underline">Lihat PDF</a>
                                    @elseif($s->pdf_link)
                                        <a href="{{ $s->pdf_link }}" target="_blank"
                                            class="text-blue-500 hover:underline">Lihat PDF</a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600">
                                    @if ($s->gambar)
                                        <a href="{{ $s->gambar_link ?? Storage::url($s->gambar) }}" target="_blank">
                                            <img src="{{ Storage::url($s->gambar) }}" alt="Modul {{ $s->judul }}"
                                                class="h-12 rounded shadow">
                                        </a>
                                    @elseif($s->gambar_link)
                                        <a href="{{ $s->gambar_link }}" target="_blank"
                                            class="text-blue-500 hover:underline">Lihat Modul</a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>

                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('silabus_ujian.edit', ['silabus_ujian' => $s->id]) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-sm">
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('silabus_ujian.destroy', ['silabus_ujian' => $s->id]) }}"
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
                                    Tidak ada data
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
