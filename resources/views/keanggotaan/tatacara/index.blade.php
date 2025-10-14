<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tata Cara
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('tatacara.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    + Tambah Tata Cara
                </a>
            </div>

            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded">
                <table class="min-w-full border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 border dark:border-gray-600">#</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Judul</th>
                            <th class="px-4 py-2 border dark:border-gray-600">File PDF</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Link Drive</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Cover</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Status</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tatacaras as $a)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 border dark:border-gray-600">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600 font-semibold">{{ $a->judul }}</td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    @if ($a->file_pdf)
                                        <a href="{{ asset('storage/' . $a->file_pdf) }}" target="_blank"
                                            class="text-blue-500 hover:underline">Lihat PDF</a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    @if ($a->link_drive)
                                        <a href="{{ $a->link_drive }}" target="_blank"
                                            class="text-blue-500 hover:underline">Lihat Drive</a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                    @php
                                        $driveId = null;
                                        if ($a->link_drive) {
                                            if (preg_match('/[-\w]{25,}/', $a->link_drive, $matches)) {
                                                $driveId = $matches[0];
                                            }
                                        }
                                    @endphp

                                    @if ($driveId)
                                        <img src="https://drive.google.com/thumbnail?id={{ $driveId }}"
                                            alt="Cover" class="w-16 h-16 object-cover mx-auto rounded border">
                                    @elseif ($a->file_pdf)
                                        <img src="https://drive.google.com/thumbnail?id={{ basename($a->file_pdf) }}"
                                            alt="Cover" class="w-16 h-16 object-cover mx-auto rounded border">
                                    @elseif ($a->cover)
                                        <img src="{{ asset('storage/' . $a->cover) }}" alt="Cover"
                                            class="w-16 h-16 object-cover mx-auto rounded border">
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    <span
                                        class="px-2 py-1 rounded text-white
                                        {{ $a->status == 'aktif' ? 'bg-green-500' : 'bg-red-500' }}">
                                        {{ ucfirst($a->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-600">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('tatacara.edit', $a->id) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>

                                        <form action="{{ route('tatacara.destroy', $a->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-4 text-center text-gray-500">
                                    Tidak ada data Tata Cara.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $tatacaras->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
