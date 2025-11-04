<x-filament-panels::page>
    <div class="space-y-6 -mt-8">
        <x-filament::card class="p-0">
            <div
                class="flex flex-col md:flex-row items-start md:items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-base font-semibold text-gray-900 dark:text-gray-100 mb-4 md:mb-0">
                    📢 Informasi Terbaru dari Semua Menu
                </h2>
                <div class="flex items-center w-full md:w-auto">
                    <form method="GET" class="flex items-center w-full md:w-auto">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari informasi..."
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-lg shadow-sm block w-full">
                        <button type="submit"
                            class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-700 transition duration-150 ease-in-out">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
            <div
                class="overflow-x-auto scrollbar-thin scrollbar-thumb-rounded scrollbar-thumb-gray-300 dark:scrollbar-thumb-gray-700">
                <table class="w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                    <thead class="bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                        <tr>
                            <th
                                class="lg:w-[15%] w-auto px-4 py-2 text-left text-xs font-medium uppercase tracking-wider">
                                Tanggal
                            </th>
                            <th
                                class="lg:w-[15%] w-auto px-4 py-2 text-left text-xs font-medium uppercase tracking-wider">
                                Status
                            </th>
                            <th
                                class="lg:w-[20%] w-auto hidden md:table-cell px-4 py-2 text-left text-xs font-medium uppercase tracking-wider">
                                Sumber
                            </th>
                            <th
                                class="lg:w-[40%] w-auto px-4 py-2 text-left text-xs font-medium uppercase tracking-wider">
                                Judul / Nama
                            </th>
                            <th
                                class="lg:w-[10%] w-auto px-4 py-2 text-left text-xs font-medium uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @php
                            $perPage = 10;
                            $search = request('search');
                            $query = \Spatie\Activitylog\Models\Activity::query()->orderBy('created_at', 'desc');

                            if ($search) {
                                $query->where(function ($q) use ($search) {
                                    $q->where('description', 'like', "%{$search}%")->orWhere(
                                        'properties',
                                        'like',
                                        "%{$search}%",
                                    );
                                });
                            }

                            $rawActivityLogs = $query->paginate($perPage);

                            $activityLogs = $rawActivityLogs->map(function ($log) {
                                $props = is_array($log->properties)
                                    ? $log->properties
                                    : (array) ($log->properties ?? []);
                                $attributes = $props['attributes'] ?? [];
                                $old = $props['old'] ?? [];
                                $sumber = class_basename($log->subject_type ?? 'TidakDiketahui');

                                $eventLabel = match ($log->event) {
                                    'created' => 'Dibuat Baru',
                                    'updated' => 'Diperbarui',
                                    'deleted' => 'Dihapus',
                                    'restored' => 'Dipulihkan',
                                    'force-deleted' => 'Dihapus Permanen',
                                    default => ucfirst($log->event ?? 'Tidak Diketahui'),
                                };

                                $judul = $log->subject
                                    ? $log->subject->judul ?? ($log->subject->nama ?? $log->description)
                                    : $attributes['judul'] ??
                                        ($attributes['nama'] ?? ($log->description ?? '(tidak ada judul)'));

                                $route = null;
                                if ($log->subject && method_exists($log->subject, 'getFilamentUrl')) {
                                    try {
                                        $route = $log->subject->getFilamentUrl();
                                    } catch (\Throwable $e) {
                                    }
                                }

                                return [
                                    'tanggal' => $log->created_at,
                                    'log' => $eventLabel,
                                    'sumber' => $sumber,
                                    'judul' => $judul,
                                    'model' => $log->subject,
                                    'route' => $route,
                                ];
                            });
                        @endphp

                        @forelse($activityLogs as $item)
                            <tr>
                                <td
                                    class="px-4 py-2 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300 align-middle">
                                    <span class="lg:inline">{{ $item['tanggal']->format('M d, Y') }}</span>
                                    <span class="lg:hidden">{{ $item['tanggal']->format('d/m/y') }}</span>
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap align-middle">
                                    @php
                                        $badgeColor = match ($item['log']) {
                                            'Dibuat Baru' => 'success',
                                            'Diperbarui' => 'warning',
                                            'Dihapus', 'Dihapus Permanen' => 'danger',
                                            'Dipulihkan' => 'info',
                                            default => 'gray',
                                        };

                                        $badgeText = match ($item['log']) {
                                            'Dibuat Baru' => 'New',
                                            'Diperbarui' => 'Update',
                                            'Dihapus' => 'Del',
                                            'Dihapus Permanen' => 'PDel',
                                            'Dipulihkan' => 'Rest',
                                            default => $item['log'],
                                        };
                                    @endphp
                                    <div class="flex items-center">
                                        <x-filament::badge :color="$badgeColor" class="inline-flex items-center px-2 py-1">
                                            <span class="block sm:hidden">{{ $badgeText }}</span>
                                            <span class="hidden sm:block">{{ $item['log'] }}</span>
                                        </x-filament::badge>
                                    </div>
                                </td>
                                <td
                                    class="hidden md:table-cell px-4 py-2 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300 align-middle">
                                    {{ $item['sumber'] }}
                                </td>
                                <td class="px-4 py-2 text-sm align-middle">
                                    @if ($item['route'])
                                        <a href="{{ $item['route'] }}"
                                            class="text-primary-600 dark:text-primary-400 hover:underline hover:text-primary-500 dark:hover:text-primary-300 font-medium">
                                            {{ $item['judul'] }}
                                        </a>
                                    @else
                                        <span class="text-gray-600 dark:text-gray-300">{{ $item['judul'] }}</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap text-sm">
                                    @if ($item['route'])
                                        <a href="{{ $item['route'] }}"
                                            class="inline-flex items-center px-2 py-1 text-xs font-medium text-blue-50 bg-blue-600 rounded-lg dark:text-blue-100 dark:bg-blue-600 hover:bg-blue-700 dark:hover:bg-blue-700 transition duration-150 ease-in-out">
                                            <span>Open</span>
                                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
                                    Belum ada aktivitas terbaru.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="px-6 py-3 flex items-center justify-between border-t border-gray-200 dark:border-gray-700">
                    <div class="text-sm text-gray-600 dark:text-gray-300">
                        Showing
                        <span
                            class="font-medium text-gray-900 dark:text-white">{{ $rawActivityLogs->firstItem() ?? 0 }}</span>
                        to
                        <span
                            class="font-medium text-gray-900 dark:text-white">{{ $rawActivityLogs->lastItem() ?? 0 }}</span>
                        of
                        <span class="font-medium text-gray-900 dark:text-white">{{ $rawActivityLogs->total() }}</span>
                        results
                    </div>
                    <div>
                        {{ $rawActivityLogs->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </x-filament::card>
    </div>
</x-filament-panels::page>
