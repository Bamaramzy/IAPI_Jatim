<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin IAPI Jatim') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Statistik Card -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <x-dashboard-card title="Total Informasi" value="{{ \App\Models\Informasi::count() }}" color="indigo"
                    link="{{ route('informasi.index') }}" />

                <x-dashboard-card title="Total Dewan Pengurus" value="{{ \App\Models\DewanPengurus::count() }}"
                    color="green" link="{{ route('dewan_pengurus.index') }}" />

                <x-dashboard-card title="Total Dewan Pengawas" value="{{ \App\Models\DewanPengawas::count() }}"
                    color="yellow" link="{{ route('dewan_pengawas.index') }}" />

                <x-dashboard-card title="Total Anggota" value="{{ \App\Models\Anggota::count() }}" color="red"
                    link="{{ route('anggota.index') }}" />
            </div>

            <!-- Informasi Terbaru -->
            <x-dashboard-list title="Informasi Terbaru" :items="\App\Models\Informasi::latest()->take(5)->get()" empty="Belum ada informasi."
                type="informasi" />

            <!-- Dewan Pengurus Terbaru -->
            <x-dashboard-list title="Dewan Pengurus Terbaru" :items="\App\Models\DewanPengurus::latest()->take(5)->get()" empty="Belum ada data dewan pengurus."
                type="pengurus" />

            <!-- Dewan Pengawas Terbaru -->
            <x-dashboard-list title="Dewan Pengawas Terbaru" :items="\App\Models\DewanPengawas::latest()->take(5)->get()" empty="Belum ada data dewan pengawas."
                type="pengawas" />

            <!-- Anggota Terbaru -->
            <x-dashboard-table title="Anggota Terbaru" :items="\App\Models\Anggota::latest()->take(10)->get()" empty="Belum ada data anggota." />
        </div>
    </div>
</x-app-layout>
