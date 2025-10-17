<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Data Standar Profesional (SPAP)
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded p-6">
                <form action="{{ route('peraturan_spap.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">
                            Kategori
                        </label>
                        <select name="kategori"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="spm" {{ old('kategori') == 'spm' ? 'selected' : '' }}>SPM</option>
                            <option value="smm" {{ old('kategori') == 'smm' ? 'selected' : '' }}>SMM</option>
                            <option value="kerangka_untuk_perikatan_asurans"
                                {{ old('kategori') == 'kerangka_untuk_perikatan_asurans' ? 'selected' : '' }}>
                                KERANGKA UNTUK PERIKATAN ASURANS</option>
                            <option value="sa" {{ old('kategori') == 'sa' ? 'selected' : '' }}>SA</option>
                            <option value="spr" {{ old('kategori') == 'spr' ? 'selected' : '' }}>SPR</option>
                            <option value="spa" {{ old('kategori') == 'spa' ? 'selected' : '' }}>SPA</option>
                            <option value="sjt" {{ old('kategori') == 'sjt' ? 'selected' : '' }}>SJT</option>
                            <option value="sji" {{ old('kategori') == 'sji' ? 'selected' : '' }}>SJI</option>
                            <option value="sjk" {{ old('kategori') == 'sjk' ? 'selected' : '' }}>SJK</option>
                            <option value="sjl" {{ old('kategori') == 'sjl' ? 'selected' : '' }}>SJL</option>
                            <option value="sjs" {{ old('kategori') == 'sjs' ? 'selected' : '' }}>SJS</option>
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
                            placeholder="Masukkan judul dokumen" required>
                        @error('judul')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">
                            Deskripsi
                        </label>
                        <textarea name="deskripsi" rows="4" class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Tuliskan deskripsi singkat dokumen..." required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">
                            Thumbnail (Opsional)
                        </label>
                        <input type="file" name="thumbnail" accept="image/*"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                        <p class="text-sm text-gray-500">Format: JPG/PNG, Maksimal 2MB</p>
                        @error('thumbnail')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 border-t pt-4">
                        <h3 class="font-semibold text-gray-700 dark:text-gray-300 mb-2">PDF 1</h3>
                        <label class="block text-sm font-medium">Judul PDF 1</label>
                        <input type="text" name="pdf_1_judul" value="{{ old('pdf_1_judul') }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Judul link PDF 1 (opsional)">
                        <label class="block text-sm font-medium mt-2">Link PDF 1</label>
                        <input type="url" name="pdf_1_url" value="{{ old('pdf_1_url') }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="https://contoh.com/file1.pdf">
                    </div>

                    <div class="mb-4 border-t pt-4">
                        <h3 class="font-semibold text-gray-700 dark:text-gray-300 mb-2">PDF 2 (Opsional)</h3>
                        <label class="block text-sm font-medium">Judul PDF 2</label>
                        <input type="text" name="pdf_2_judul" value="{{ old('pdf_2_judul') }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Judul link PDF 2 (opsional)">
                        <label class="block text-sm font-medium mt-2">Link PDF 2</label>
                        <input type="url" name="pdf_2_url" value="{{ old('pdf_2_url') }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="https://contoh.com/file2.pdf">
                    </div>

                    <div class="mb-6 border-t pt-4">
                        <h3 class="font-semibold text-gray-700 dark:text-gray-300 mb-2">PDF 3 (Opsional)</h3>
                        <label class="block text-sm font-medium">Judul PDF 3</label>
                        <input type="text" name="pdf_3_judul" value="{{ old('pdf_3_judul') }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Judul link PDF 3 (opsional)">
                        <label class="block text-sm font-medium mt-2">Link PDF 3</label>
                        <input type="url" name="pdf_3_url" value="{{ old('pdf_3_url') }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="https://contoh.com/file3.pdf">
                    </div>

                    <div class="flex justify-end border-t pt-4">
                        <a href="{{ route('peraturan_spap.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded mr-2 hover:bg-gray-600">
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
