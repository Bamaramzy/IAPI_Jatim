<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ➕ Tambah Jalur Reguler
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded p-6">
                <form action="{{ route('jalur_reguler.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- ✅ Kategori (Dropdown) --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                        <select name="kategori"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Informasi Umum" {{ old('kategori') == 'Informasi Umum' ? 'selected' : '' }}>
                                Informasi Umum</option>
                            <option value="Tingkat Dasar" {{ old('kategori') == 'Tingkat Dasar' ? 'selected' : '' }}>
                                Tingkat Dasar</option>
                            <option value="Tingkat Profesional"
                                {{ old('kategori') == 'Tingkat Profesional' ? 'selected' : '' }}>
                                Tingkat Profesional
                            </option>
                            <option value="Penilaian Pengalaman Audit"
                                {{ old('kategori') == 'Penilaian Pengalaman Audit' ? 'selected' : '' }}>
                                Penilaian Pengalaman Audit
                            </option>
                            <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>
                                Lainnya
                            </option>
                        </select>
                        @error('kategori')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Judul --}}
                    <div class="mb-4">
                        <label for="judul" class="block font-medium text-gray-700 dark:text-gray-300">Judul</label>
                        <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Masukkan judul jalur reguler" required>
                        @error('judul')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Konten pakai CKEditor --}}
                    <div class="mb-4">
                        <label for="konten" class="block font-medium text-gray-700 dark:text-gray-300">Konten</label>
                        <textarea id="konten" name="konten" rows="6"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">{{ old('konten') }}</textarea>
                        @error('konten')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ File (PDF / Gambar opsional) --}}
                    <div class="mb-4">
                        <label for="file" class="block font-medium text-gray-700 dark:text-gray-300">
                            File (PDF/Gambar, opsional)
                        </label>
                        <input type="file" id="file" name="file"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            accept=".pdf,.jpg,.jpeg,.png">
                        @error('file')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Format: PDF, JPG, PNG. Maks 20MB</p>
                    </div>

                    {{-- ✅ Link (opsional, bisa Google Drive) --}}
                    <div class="mb-4">
                        <label for="link" class="block font-medium text-gray-700 dark:text-gray-300">
                            Link (opsional)
                        </label>
                        <input type="url" id="link" name="link" value="{{ old('link') }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Masukkan link (contoh: Google Drive)">
                        @error('link')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Tombol Simpan --}}
                    <div class="flex justify-end">
                        <a href="{{ route('jalur_reguler.index') }}"
                            class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded mr-2">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ✅ CKEditor --}}
    @push('scripts')
        <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('konten', {
                height: 400,
                removeButtons: 'PasteFromWord'
            });
        </script>
    @endpush
</x-app-layout>
