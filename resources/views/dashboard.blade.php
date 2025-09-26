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
                <x-dashboard-card title="Total Informasi" value="{{ \App\Models\Informasi::count() }}" color="green"
                    link="{{ route('informasi.index') }}" />

                <x-dashboard-card title="Total Dewan Pengurus" value="{{ \App\Models\DewanPengurus::count() }}"
                    color="green" link="{{ route('dewan_pengurus.index') }}" />

                <x-dashboard-card title="Total Dewan Pengawas" value="{{ \App\Models\DewanPengawas::count() }}"
                    color="yellow" link="{{ route('dewan_pengawas.index') }}" />

                <x-dashboard-card title="Total Anggota" value="{{ \App\Models\Anggota::count() }}" color="red"
                    link="{{ route('anggota.index') }}" />

                <x-dashboard-card title="Total Direktori" value="{{ \App\Models\Direktori::count() }}" color="blue"
                    link="{{ route('direktori.index') }}" />

                <x-dashboard-card title="Total AD-ART" value="{{ \App\Models\AdArt::count() }}" color="blue"
                    link="{{ route('adart.index') }}" />
                <x-dashboard-card title="Total Jadwal Pelatihan" value="{{ \App\Models\Pelatihan::count() }}"
                    color="blue" link="{{ route('pelatihan.index') }}" />
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
            <x-dashboard-table title="Anggota Terbaru" :items="\App\Models\Anggota::latest()->take(10)->get()" empty="Belum ada data anggota."
                type="anggota" />
            <!-- Direktori Terbaru -->
            <x-dashboard-table title="Direktori Terbaru" :items="\App\Models\Direktori::latest()->take(10)->get()" empty="Belum ada data direktori."
                type="direktori" />
            <!-- Ad-Art Terbaru -->
            <x-dashboard-table title="Ad-Art Terbaru" :items="\App\Models\AdArt::latest()->take(10)->get()" empty="Belum ada data ad-art." type="adart" />
            <!-- Ad-Art Terbaru -->
            <x-dashboard-table title="Jadwal Terbaru" :items="\App\Models\Pelatihan::latest()->take(10)->get()" empty="Belum ada data ad-art."
                type="pelatihan" />
        </div>
    </div>
</x-app-layout>
