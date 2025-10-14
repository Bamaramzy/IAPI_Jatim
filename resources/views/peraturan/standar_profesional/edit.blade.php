<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ✏️ Edit Data Standar Profesional (SPAP)
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded p-6">
                <form action="{{ route('peraturan_spap.update', $peraturanSpap->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- ✅ Kategori --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">
                            Kategori
                        </label>
                        <select name="kategori"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="spap"
                                {{ old('kategori', $peraturanSpap->kategori) == 'spap' ? 'selected' : '' }}>SPAP
                            </option>
                            <option value="etika"
                                {{ old('kategori', $peraturanSpap->kategori) == 'etika' ? 'selected' : '' }}>Kode Etik
                            </option>
                            <option value="pedoman"
                                {{ old('kategori', $peraturanSpap->kategori) == 'pedoman' ? 'selected' : '' }}>Pedoman
                            </option>
                        </select>
                        @error('kategori')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Judul --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">
                            Judul
                        </label>
                        <input type="text" name="judul" value="{{ old('judul', $peraturanSpap->judul) }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Masukkan judul dokumen" required>
                        @error('judul')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Deskripsi --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">
                            Deskripsi
                        </label>
                        <textarea name="deskripsi" rows="4" class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Tuliskan deskripsi singkat dokumen..." required>{{ old('deskripsi', $peraturanSpap->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Thumbnail --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">
                            Thumbnail (Opsional)
                        </label>
                        @if ($peraturanSpap->thumbnail)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $peraturanSpap->thumbnail) }}" alt="Thumbnail Lama"
                                    class="h-32 rounded shadow">
                            </div>
                        @endif
                        <input type="file" name="thumbnail" accept="image/*"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                        <p class="text-sm text-gray-500">Biarkan kosong jika tidak ingin mengganti.</p>
                        @error('thumbnail')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ PDF 1 --}}
                    <div class="mb-4 border-t pt-4">
                        <h3 class="font-semibold text-gray-700 dark:text-gray-300 mb-2">PDF 1</h3>

                        <label class="block text-sm font-medium">Judul PDF 1</label>
                        <input type="text" name="pdf_1_judul"
                            value="{{ old('pdf_1_judul', $peraturanSpap->pdf_1_judul) }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">

                        <label class="block text-sm font-medium mt-2">File PDF 1</label>
                        @if ($peraturanSpap->pdf_1_url)
                            <p class="text-sm mt-1">
                                <a href="{{ asset('storage/' . $peraturanSpap->pdf_1_url) }}" target="_blank"
                                    class="text-blue-500 underline">
                                    📄 Lihat File Lama
                                </a>
                            </p>
                        @endif
                        <input type="file" name="pdf_1_url" accept="application/pdf"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                        @error('pdf_1_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ PDF 2 --}}
                    <div class="mb-4 border-t pt-4">
                        <h3 class="font-semibold text-gray-700 dark:text-gray-300 mb-2">PDF 2</h3>

                        <label class="block text-sm font-medium">Judul PDF 2</label>
                        <input type="text" name="pdf_2_judul"
                            value="{{ old('pdf_2_judul', $peraturanSpap->pdf_2_judul) }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">

                        <label class="block text-sm font-medium mt-2">File PDF 2</label>
                        @if ($peraturanSpap->pdf_2_url)
                            <p class="text-sm mt-1">
                                <a href="{{ asset('storage/' . $peraturanSpap->pdf_2_url) }}" target="_blank"
                                    class="text-blue-500 underline">
                                    📄 Lihat File Lama
                                </a>
                            </p>
                        @endif
                        <input type="file" name="pdf_2_url" accept="application/pdf"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                        @error('pdf_2_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ PDF 3 --}}
                    <div class="mb-6 border-t pt-4">
                        <h3 class="font-semibold text-gray-700 dark:text-gray-300 mb-2">PDF 3</h3>

                        <label class="block text-sm font-medium">Judul PDF 3</label>
                        <input type="text" name="pdf_3_judul"
                            value="{{ old('pdf_3_judul', $peraturanSpap->pdf_3_judul) }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">

                        <label class="block text-sm font-medium mt-2">File PDF 3</label>
                        @if ($peraturanSpap->pdf_3_url)
                            <p class="text-sm mt-1">
                                <a href="{{ asset('storage/' . $peraturanSpap->pdf_3_url) }}" target="_blank"
                                    class="text-blue-500 underline">
                                    📄 Lihat File Lama
                                </a>
                            </p>
                        @endif
                        <input type="file" name="pdf_3_url" accept="application/pdf"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                        @error('pdf_3_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Tombol Simpan --}}
                    <div class="flex justify-end border-t pt-4">
                        <a href="{{ route('peraturan_spap.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded mr-2 hover:bg-gray-600">
                            Batal
                        </a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
