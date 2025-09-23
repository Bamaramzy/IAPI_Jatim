@props(['title', 'items' => [], 'empty' => 'Belum ada data.'])

<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
    <h3 class="text-lg font-semibold mb-4">{{ $title }}</h3>

    @if ($items->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">No Reg IAPI</th>
                        <th class="px-4 py-2 text-left">Nama Anggota</th>
                        <th class="px-4 py-2 text-left">Kategori</th>
                        <th class="px-4 py-2 text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($items as $anggota)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $anggota->no_reg_iapi }}</td>
                            <td class="px-4 py-2">{{ $anggota->nama_anggota }}</td>
                            <td class="px-4 py-2">{{ $anggota->kategori }}</td>
                            <td class="px-4 py-2">{{ $anggota->status_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-500 dark:text-gray-400 italic">{{ $empty }}</p>
    @endif
</div>
