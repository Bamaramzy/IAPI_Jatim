<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin IAPI Jatim') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistik Card -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <a href="{{ route('informasi.index') }}" class="col-span-1">
                    <div class="p-4 bg-indigo-500 text-white rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Total Informasi</h3>
                        <p class="text-2xl mt-2">{{ \App\Models\Informasi::count() }}</p>
                    </div>
                </a>
            </div>
            <!-- Informasi Terbaru -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Informasi Terbaru</h3>
                @if (\App\Models\Informasi::count() > 0)
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach (\App\Models\Informasi::latest()->take(5)->get() as $item)
                            <li class="py-2 flex justify-between items-center">
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
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500 dark:text-gray-400 italic">Belum ada informasi.</p>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
