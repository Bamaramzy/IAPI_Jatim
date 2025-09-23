@props(['title', 'items' => [], 'empty' => 'Belum ada data.', 'type' => 'default'])

<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
    <h3 class="text-lg font-semibold mb-4">{{ $title }}</h3>

    @if ($items->count() > 0)
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($items as $item)
                <li class="py-2 flex justify-between items-center">
                    @if ($type === 'informasi')
                        <div>
                            <p class="font-medium">{{ $item->judul }}</p>
                            @if ($item->link)
                                <a href="{{ $item->link }}" target="_blank"
                                    class="text-blue-600 dark:text-blue-400 hover:underline text-sm">
                                    {{ $item->link }}
                                </a>
                            @endif
                        </div>
                        <span class="text-gray-500 dark:text-gray-400 text-sm">
                            {{ $item->created_at->format('d M Y') }}
                        </span>
                    @elseif ($type === 'pengurus' || $type === 'pengawas')
                        <div class="flex items-center space-x-3">
                            @if ($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}"
                                    class="w-10 h-10 rounded-full">
                            @endif
                            <div>
                                <p class="font-medium">{{ $item->nama }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $item->jabatan }}</p>
                            </div>
                        </div>
                    @else
                        <p class="font-medium">{{ $item->nama ?? '-' }}</p>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-500 dark:text-gray-400 italic">{{ $empty }}</p>
    @endif
</div>
