<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin IAPI Jatim') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <x-dashboard-card title="Total Informasi" value="{{ \App\Models\Informasi::count() }}" color="green"
                    link="{{ route('informasi.index') }}" />

                <x-dashboard-card title="Total Dewan Pengurus" value="{{ \App\Models\DewanPengurus::count() }}"
                    color="green" link="{{ route('dewan_pengurus.index') }}" />

                <x-dashboard-card title="Total Dewan Pengawas" value="{{ \App\Models\DewanPengawas::count() }}"
                    color="green" link="{{ route('dewan_pengawas.index') }}" />

                <x-dashboard-card title="Total Anggota" value="{{ \App\Models\Anggota::count() }}" color="red"
                    link="{{ route('anggota.index') }}" />

                <x-dashboard-card title="Total Direktori" value="{{ \App\Models\Direktori::count() }}" color="red"
                    link="{{ route('direktori.index') }}" />

                <x-dashboard-card title="Total AD-ART" value="{{ \App\Models\AdArt::count() }}" color="red"
                    link="{{ route('adart.index') }}" />

                <x-dashboard-card title="Total Tata Cara" value="{{ \App\Models\TataCara::count() }}" color="red"
                    link="{{ route('tatacara.index') }}" />

                <x-dashboard-card title="Total Jadwal Pelatihan" value="{{ \App\Models\Pelatihan::count() }}"
                    color="blue" link="{{ route('pelatihan.index') }}" />

                <x-dashboard-card title="Total PPL" value="{{ \App\Models\Ppl::count() }}" color="blue"
                    link="{{ route('ppl.index') }}" />

                <x-dashboard-card title="Total Brevet A dan B" value="{{ \App\Models\Brevet::count() }}" color="blue"
                    link="{{ route('brevets.index') }}" />

                <x-dashboard-card title="Total Brevet C" value="{{ \App\Models\BrevetC::count() }}" color="blue"
                    link="{{ route('brevets_c.index') }}" />

                <x-dashboard-card title="Total Brevet Kuasa" value="{{ \App\Models\BrevetKuasa::count() }}"
                    color="blue" link="{{ route('brevets_kuasa.index') }}" />

                <x-dashboard-card title="Total Test Center" value="{{ \App\Models\TestCenter::count() }}"
                    color="yellow" link="{{ route('test_center.index') }}" />

                <x-dashboard-card title="Total Waiver PPAK" value="{{ \App\Models\WaiverPpak::count() }}"
                    color="yellow" link="{{ route('waiver_ppak.index') }}" />

                <x-dashboard-card title="Total CFI" value="{{ \App\Models\CFI::count() }}" color="yellow"
                    link="{{ route('cfi.index') }}" />

                <x-dashboard-card title="Total Workshop A dan B" value="{{ \App\Models\WorkshopAB::count() }}"
                    color="yellow" link="{{ route('workshop_ab.index') }}" />

                <x-dashboard-card title="Total Jalur Reguler" value="{{ \App\Models\JalurReguler::count() }}"
                    color="yellow" link="{{ route('jalur_reguler.index') }}" />

                <x-dashboard-card title="Total Silabus UJian" value="{{ \App\Models\Silabus::count() }}" color="yellow"
                    link="{{ route('silabus_ujian.index') }}" />

                <x-dashboard-card title="Total Jalur Workshop Penyetaraan"
                    value="{{ \App\Models\Kategori::count() + \App\Models\Pdf::count() + \App\Models\Video::count() }}"
                    color="yellow" link="{{ route('workshop_penyetaraan.index') }}" />

                <x-dashboard-card title="Total Peraturan Profesi" value="{{ \App\Models\PeraturanProfesi::count() }}"
                    color="blue" link="{{ route('peraturan_profesi.index') }}" />

                <x-dashboard-card title="Total SPAP" value="{{ \App\Models\PeraturanSpap::count() }}" color="blue"
                    link="{{ route('peraturan_spap.index') }}" />
            </div>

            <x-dashboard-list title="Informasi Terbaru" :items="\App\Models\Informasi::latest()->take(5)->get()" empty="Belum ada informasi."
                type="informasi" />
            <x-dashboard-list title="Dewan Pengurus Terbaru" :items="\App\Models\DewanPengurus::latest()->take(5)->get()" empty="Belum ada data dewan pengurus."
                type="pengurus" />
            <x-dashboard-list title="Dewan Pengawas Terbaru" :items="\App\Models\DewanPengawas::latest()->take(5)->get()" empty="Belum ada data dewan pengawas."
                type="pengawas" />
            <x-dashboard-table title="Anggota Terbaru" :items="\App\Models\Anggota::latest()->take(10)->get()" empty="Belum ada data anggota."
                type="anggota" />
            <x-dashboard-table title="Direktori Terbaru" :items="\App\Models\Direktori::latest()->take(10)->get()" empty="Belum ada data direktori."
                type="direktori" />
            <x-dashboard-table title="Ad-Art Terbaru" :items="\App\Models\AdArt::latest()->take(10)->get()" empty="Belum ada data ad-art."
                type="adart" />
            <x-dashboard-table title="Jadwal Terbaru" :items="\App\Models\Pelatihan::latest()->take(10)->get()" empty="Belum ada data ad-art."
                type="pelatihan" />
            <x-dashboard-table title="Tata Cara Terbaru" :items="\App\Models\TataCara::latest()->take(10)->get()" empty="Belum ada data tata cara."
                type="tatacara" />
            <x-dashboard-table title="PPL Terbaru" :items="\App\Models\Ppl::latest()->take(10)->get()" empty="Belum ada data ppl." type="ppl" />
            <x-dashboard-table title="Brevet A dan B Terbaru" :items="\App\Models\Brevet::latest()->take(10)->get()" empty="Belum ada data Brevet A dan B."
                type="brevet" />
            <x-dashboard-table title="Brevet C Terbaru" :items="\App\Models\BrevetC::latest()->take(10)->get()" empty="Belum ada data Brevet C."
                type="brevet_c" />
            <x-dashboard-table title="Brevet Kuasa Terbaru" :items="\App\Models\BrevetKuasa::latest()->take(10)->get()" empty="Belum ada data Brevet Kuasa."
                type="brevet_kuasa" />
        </div>
    </div>
</x-app-layout>
