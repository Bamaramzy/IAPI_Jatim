<x-filament-panels::page>
    <div class="space-y-8">

        {{-- 🔹 Ringkasan Data --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            {{-- Informasi --}}
            <x-filament::card class="hover:bg-primary-50 cursor-pointer"
                x-on:click="window.location.href = '{{ route('filament.admin.resources.informasi.index') }}'">
                <div class="text-sm text-gray-500">Informasi</div>
                <div class="text-3xl font-bold">
                    {{ \App\Models\Informasi::count() }}
                </div>
            </x-filament::card>

            {{-- Dewan Pengurus --}}
            <x-filament::card class="hover:bg-primary-50 cursor-pointer"
                x-on:click="window.location.href = '{{ route('filament.admin.resources.dewan-pengurus.index') }}'">
                <div class="text-sm text-gray-500">Dewan Pengurus</div>
                <div class="text-3xl font-bold">
                    {{ \App\Models\DewanPengurus::count() }}
                </div>
            </x-filament::card>

            {{-- Dewan Pengawas --}}
            <x-filament::card class="hover:bg-primary-50 cursor-pointer"
                x-on:click="window.location.href = '{{ route('filament.admin.resources.dewan-pengawas.index') }}'">
                <div class="text-sm text-gray-500">Dewan Pengawas</div>
                <div class="text-3xl font-bold">
                    {{ \App\Models\DewanPengawas::count() }}
                </div>
            </x-filament::card>

        </div>

        {{-- 🔹 Daftar Informasi Terbaru --}}
        <x-filament::section>
            <x-slot name="heading">Informasi Terbaru</x-slot>

            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse (\App\Models\Informasi::latest()->take(5)->get() as $item)
                    <div class="py-2">
                        <a href="{{ route('filament.admin.resources.informasi.edit', $item) }}"
                            class="font-medium text-primary-600 hover:underline">
                            {{ $item->judul }}
                        </a>
                        <div class="text-sm text-gray-500">
                            {{ $item->created_at->diffForHumans() }}
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">Belum ada informasi.</p>
                @endforelse
            </div>
        </x-filament::section>
    </div>
</x-filament-panels::page>
