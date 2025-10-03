<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            📑 Daftar Workshop A-B
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
                <a href="{{ route('workshop_ab.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    + Tambah Workshop
                </a>
            </div>

            {{-- ✅ Tabel Data --}}
            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded">
                <table class="min-w-full border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="px-4 py-2 border dark:border-gray-600 w-12">No</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Preview / Link PDF</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Form Pendaftaran</th>
                            <th class="px-4 py-2 border dark:border-gray-600 w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($workshops as $w)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                {{-- No --}}
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    {{ $loop->iteration }}
                                </td>

                                {{-- ✅ Preview + Link PDF --}}
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    @if ($w->pdf)
                                        <iframe src="{{ asset('storage/' . $w->pdf) }}"
                                            class="w-32 h-32 border rounded mx-auto mb-2" frameborder="0"></iframe>
                                        <a href="{{ asset('storage/' . $w->pdf) }}" target="_blank"
                                            class="text-blue-600 hover:underline">Lihat PDF</a>
                                    @elseif ($w->link_pdf)
                                        <a href="{{ $w->link_pdf }}" target="_blank"
                                            class="text-blue-600 hover:underline">Lihat PDF (Link)</a>
                                    @else
                                        <span class="text-gray-500">Tidak ada file</span>
                                    @endif
                                </td>

                                {{-- ✅ Link Form --}}
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    @if ($w->link_form)
                                        <a href="{{ $w->link_form }}" target="_blank"
                                            class="text-green-600 hover:underline">Form Pendaftaran</a>
                                    @else
                                        <span class="text-gray-500">-</span>
                                    @endif
                                </td>

                                {{-- ✅ Aksi --}}
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    <div class="flex justify-center space-x-2">
                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('workshop_ab.edit', $w) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-sm">
                                            Edit
                                        </a>

                                        {{-- Tombol Hapus --}}
                                        <form action="{{ route('workshop_ab.destroy', $w) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                                    Tidak ada data Workshop A-B.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
