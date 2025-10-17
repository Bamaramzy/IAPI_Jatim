<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Data Profesi
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded p-6">
                <form action="{{ route('peraturan_profesi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">
                            Kategori
                        </label>
                        <select name="kategori"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="regulasi" {{ old('kategori') == 'regulasi' ? 'selected' : '' }}>Regulasi
                            </option>
                            <option value="asosiasi" {{ old('kategori') == 'asosiasi' ? 'selected' : '' }}>Asosiasi
                            </option>
                            <option value="pengurus" {{ old('kategori') == 'pengurus' ? 'selected' : '' }}>Pengurus
                            </option>
                        </select>
                        @error('kategori')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">
                            Judul
                        </label>
                        <input type="text" name="judul" value="{{ old('judul') }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Masukkan judul" required>
                        @error('judul')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">
                            Upload File (Opsional)
                        </label>
                        <input type="file" name="file_path"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                        @error('file_path')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">
                            Link URL (Opsional)
                        </label>
                        <input type="url" name="link_url" value="{{ old('link_url') }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="https://contoh.com">
                        @error('link_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('peraturan_profesi.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded mr-2">
                            Batal
                        </a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
