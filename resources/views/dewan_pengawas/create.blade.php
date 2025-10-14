<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Dewan Pengawas') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            <form action="{{ route('dewan_pengawas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                               dark:bg-gray-900 dark:text-gray-200 focus:border-indigo-500 
                               focus:ring-indigo-500 sm:text-sm"
                        required>
                </div>

                <div class="mb-4">
                    <label for="jabatan"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                               dark:bg-gray-900 dark:text-gray-200 focus:border-indigo-500 
                               focus:ring-indigo-500 sm:text-sm"
                        required>
                </div>

                <div class="mb-4">
                    <label for="gambar"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Foto</label>
                    <input type="file" name="gambar" id="gambar"
                        class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400
                               file:mr-4 file:py-2 file:px-4
                               file:rounded-md file:border-0
                               file:text-sm file:font-semibold
                               file:bg-indigo-50 file:text-indigo-700
                               hover:file:bg-indigo-100
                               dark:file:bg-gray-700 dark:file:text-gray-200
                               dark:hover:file:bg-gray-600"
                        required>
                </div>

                <div class="flex items-center space-x-2">
                    <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded-md hover:bg-green-700">
                        Simpan
                    </button>
                    <a href="{{ route('dewan_pengawas.index') }}"
                        class="px-4 py-2 bg-gray-500 text-white text-sm font-semibold rounded-md hover:bg-gray-600">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
