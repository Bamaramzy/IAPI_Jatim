<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Anggota') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            <form action="{{ route('anggota.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">No Urut</label>
                    <input type="number" name="no_urut" value="{{ $nextNoUrut }}" readonly
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 
               dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">No Reg IAPI</label>
                    <input type="text" name="no_reg_iapi"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 
                               dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Anggota</label>
                    <input type="text" name="nama_anggota"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 
                               dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Izin AP</label>
                    <input type="text" name="izin_ap"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 
                               dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                    <select name="kategori"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 
                               dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Anggota Madya">Anggota Madya</option>
                        <option value="Anggota Muda">Anggota Muda</option>
                        <option value="Anggota Biasa">Anggota Biasa</option>
                        <option value="Anggota Pemula">Anggota Pemula</option>
                        <option value="Anggota Umum">Anggota Umum</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama KAP</label>
                    <input type="text" name="nama_kap"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 
                               dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                    <select name="status_id"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 
                               dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Cuti Sementara">Cuti Sementara</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Korwil</label>
                    <select name="korwil"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 
               dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="">-- Pilih Korwil --</option>
                        <option value="JAWA TIMUR">JAWA TIMUR</option>
                    </select>
                </div>

                <div class="flex items-center space-x-2">
                    <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded-md hover:bg-green-700">
                        Simpan
                    </button>
                    <a href="{{ route('anggota.index') }}"
                        class="px-4 py-2 bg-gray-500 text-white text-sm font-semibold rounded-md hover:bg-gray-600">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
