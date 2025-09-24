@props(['title', 'items' => [], 'empty' => 'Belum ada data.', 'type' => 'anggota'])

<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
    <h3 class="text-lg font-semibold mb-4">{{ $title }}</h3>

    @if ($items->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>

                        @if ($type === 'anggota')
                            <th class="px-4 py-2 text-left">No Reg IAPI</th>
                            <th class="px-4 py-2 text-left">Nama Anggota</th>
                            <th class="px-4 py-2 text-left">Kategori</th>
                            <th class="px-4 py-2 text-left">Status</th>
                        @elseif ($type === 'direktori')
                            <th class="px-4 py-2 text-left">Judul</th>
                            <th class="px-4 py-2 text-left">Deskripsi</th>
                            <th class="px-4 py-2 text-left">File PDF</th>
                            <th class="px-4 py-2 text-left">Link Drive</th>
                            <th class="px-4 py-2 text-left">Cover</th>
                            <th class="px-4 py-2 text-left">Status</th>
                        @elseif ($type === 'adart')
                            <th class="px-4 py-2 text-left">Judul</th>
                            <th class="px-4 py-2 text-left">File PDF</th>
                            <th class="px-4 py-2 text-left">Link Drive</th>
                            <th class="px-4 py-2 text-left">Cover</th>
                            <th class="px-4 py-2 text-left">Status</th>
                        @endif
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($items as $item)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>

                            @if ($type === 'anggota')
                                <td class="px-4 py-2">{{ $item->no_reg_iapi }}</td>
                                <td class="px-4 py-2">{{ $item->nama_anggota }}</td>
                                <td class="px-4 py-2">{{ $item->kategori }}</td>
                                <td class="px-4 py-2">{{ $item->status_id }}</td>
                            @elseif ($type === 'direktori')
                                <td class="px-4 py-2">{{ $item->judul }}</td>
                                <td class="px-4 py-2">{{ $item->deskripsi }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ asset('storage/' . $item->file_pdf) }}" target="_blank"
                                        class="text-blue-500 underline">Lihat PDF</a>
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ $item->link_drive }}" target="_blank"
                                        class="text-blue-500 underline">Drive</a>
                                </td>
                                <td class="px-4 py-2">
                                    <img src="{{ asset('storage/' . $item->cover) }}" alt="cover"
                                        class="h-12 rounded">
                                </td>
                                <td class="px-4 py-2">{{ $item->status }}</td>
                            @elseif ($type === 'adart')
                                <td class="px-4 py-2">{{ $item->judul }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ asset('storage/' . $item->file_pdf) }}" target="_blank"
                                        class="text-blue-500 underline">Lihat PDF</a>
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ $item->link_drive }}" target="_blank"
                                        class="text-blue-500 underline">Drive</a>
                                </td>
                                <td class="px-4 py-2">
                                    <img src="{{ asset('storage/' . $item->cover) }}" alt="cover"
                                        class="h-12 rounded">
                                </td>
                                <td class="px-4 py-2">{{ $item->status }}</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-500 dark:text-gray-400 italic">{{ $empty }}</p>
    @endif
</div>
