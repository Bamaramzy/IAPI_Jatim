<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Jalur Reguler
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded p-6">
                <form action="{{ route('jalur_reguler.update', $jalur_reguler->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                        <select name="kategori"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Informasi Umum"
                                {{ old('kategori', $jalur_reguler->kategori) == 'Informasi Umum' ? 'selected' : '' }}>
                                Informasi Umum</option>
                            <option value="Tingkat Dasar"
                                {{ old('kategori', $jalur_reguler->kategori) == 'Tingkat Dasar' ? 'selected' : '' }}>
                                Tingkat Dasar</option>
                            <option value="Tingkat Profesional"
                                {{ old('kategori', $jalur_reguler->kategori) == 'Tingkat Profesional' ? 'selected' : '' }}>
                                Tingkat Profesional</option>
                            <option value="Penilaian Pengalaman Audit"
                                {{ old('kategori', $jalur_reguler->kategori) == 'Penilaian Pengalaman Audit' ? 'selected' : '' }}>
                                Penilaian Pengalaman Audit</option>
                            <option value="Lainnya"
                                {{ old('kategori', $jalur_reguler->kategori) == 'Lainnya' ? 'selected' : '' }}>
                                Lainnya</option>
                        </select>
                        @error('kategori')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul', $jalur_reguler->judul) }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Masukkan judul jalur reguler" required>
                        @error('judul')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Konten</label>
                        <textarea id="konten" name="konten" rows="6"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">{{ old('konten', $jalur_reguler->konten) }}</textarea>
                        @error('konten')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            Bisa copy–paste teks dari Word/Website, termasuk tabel & bullet point.
                        </p>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">File (opsional)</label>
                        <input type="file" name="file"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            accept=".pdf,.jpg,.jpeg,.png">
                        @if ($jalur_reguler->file)
                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                File saat ini:
                                <a href="{{ asset('storage/' . $jalur_reguler->file) }}" target="_blank"
                                    class="text-blue-500 underline">📂 Lihat File</a>
                            </p>
                        @endif
                        @error('file')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Link (opsional)</label>
                        <input type="url" name="link" value="{{ old('link', $jalur_reguler->link) }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Masukkan link (contoh: Google Drive)">
                        @error('link')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('jalur_reguler.index') }}"
                            class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded mr-2">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('konten', {
                height: 400
            });
        </script>
    @endpush
</x-app-layout>
