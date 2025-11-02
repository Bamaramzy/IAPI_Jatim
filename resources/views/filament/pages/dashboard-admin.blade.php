<x-filament-panels::page>
    <div class="space-y-10">
        <x-filament::card>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                    📢 Informasi Terbaru dari Semua Menu
                </h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                    <thead class="bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                        <tr>
                            <th class="px-4 py-2 text-left">Tanggal</th>
                            <th class="px-4 py-2 text-left">Log Aktivitas</th>
                            <th class="px-4 py-2 text-left">Sumber</th>
                            <th class="px-4 py-2 text-left">Judul / Nama</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @php
                            $activityLogs = \Spatie\Activitylog\Models\Activity::latest()
                                ->take(10)
                                ->get()
                                ->map(function ($log) {
                                    $model = $log->subject;
                                    $sumber = class_basename($log->subject_type ?? 'Tidak diketahui');
                                    $eventLabel = match ($log->event) {
                                        'created' => 'Dibuat',
                                        'updated' => 'Diperbarui',
                                        'deleted' => 'Dihapus',
                                        default => ucfirst($log->event ?? 'Tidak Diketahui'),
                                    };
                                    $judul =
                                        $model->judul ?? ($model->nama ?? ($log->description ?? '(tidak ada judul)'));
                                    return [
                                        'tanggal' => $log->created_at,
                                        'log' => $eventLabel,
                                        'sumber' => $sumber,
                                        'judul' => $judul,
                                        'model' => $model,
                                        'route' => filament_edit_link($model),
                                    ];
                                });
                            $manualData = collect();
                            $models = [
                                \App\Models\AdArt::class,
                                \App\Models\Anggota::class,
                                \App\Models\BrevetC::class,
                                \App\Models\BrevetKuasa::class,
                                \App\Models\Brevet::class,
                                \App\Models\Cfi::class,
                                \App\Models\DewanPengawas::class,
                                \App\Models\DewanPengurus::class,
                                \App\Models\Direktori::class,
                                \App\Models\Informasi::class,
                                \App\Models\JalurReguler::class,
                                \App\Models\Pelatihan::class,
                                \App\Models\PeraturanProfesi::class,
                                \App\Models\PeraturanSpap::class,
                                \App\Models\Ppl::class,
                                \App\Models\Silabus::class,
                                \App\Models\Tatacara::class,
                                \App\Models\TestCenter::class,
                                \App\Models\WaiverPpak::class,
                                \App\Models\WorkshopAb::class,
                                \App\Models\Kategori::class,
                            ];
                            foreach ($models as $modelClass) {
                                if (!class_exists($modelClass)) {
                                    continue;
                                }
                                try {
                                    $items = $modelClass::latest()->take(3)->get();
                                    foreach ($items as $item) {
                                        $manualData->push([
                                            'tanggal' => $item->created_at ?? now(),
                                            'log' => 'Data Lama',
                                            'sumber' => class_basename($modelClass),
                                            'judul' => $item->judul ?? ($item->nama ?? '(tidak ada judul)'),
                                            'model' => $item,
                                            'route' => filament_edit_link($item),
                                        ]);
                                    }
                                } catch (\Throwable $e) {
                                    continue;
                                }
                            }
                            $updates = $activityLogs->merge($manualData)->sortByDesc('tanggal')->take(15);
                        @endphp
                        @forelse ($updates as $item)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
                                <td class="px-4 py-2 whitespace-nowrap">{{ $item['tanggal']->format('d M Y') }}</td>
                                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">
                                    @if ($item['log'] === 'Dibuat')
                                        <span class="text-green-600 font-semibold">🟢 {{ $item['log'] }}</span>
                                    @elseif ($item['log'] === 'Diperbarui')
                                        <span class="text-yellow-600 font-semibold">🟡 {{ $item['log'] }}</span>
                                    @elseif ($item['log'] === 'Dihapus')
                                        <span class="text-red-600 font-semibold">🔴 {{ $item['log'] }}</span>
                                    @else
                                        <span class="text-gray-600 font-semibold">{{ $item['log'] }}</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $item['sumber'] }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ $item['route'] }}" class="text-primary-600 font-medium hover:underline">
                                        {{ $item['judul'] }}
                                    </a>
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ filament_edit_link($item['model'] ?? null) }}"
                                        class="text-blue-600 hover:underline">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center text-gray-500">
                                    Belum ada aktivitas terbaru.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-filament::card>
    </div>
</x-filament-panels::page>
