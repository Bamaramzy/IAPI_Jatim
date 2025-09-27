<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ✏️ Edit Brevet Kuasa
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded p-6">
                <form action="{{ route('brevets_kuasa.update', $brevetKuasa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- ✅ Judul --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul', $brevetKuasa->judul) }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Masukkan judul brevet kuasa">
                        @error('judul')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Brosur (Upload File Gambar) --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Upload Brosur</label>
                        <input type="file" name="brosur" accept="image/*"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                        @if ($brevetKuasa->brosur)
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                            📎 Brosur saat ini: <a href="{{ asset('storage/' . $brevetKuasa->brosur) }}" target="_blank" class="text-blue-500 underline">Lihat Brosur</a>
                        </p>
                        @endif
                        @error('brosur')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Link Daftar --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Link Daftar</label>
                        <input type="text" name="link_daftar" value="{{ old('link_daftar', $brevetKuasa->link_daftar) }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Masukkan link pendaftaran (contoh: Google Form)">
                        @error('link_daftar')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Status --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Status</label>
                        <select name="status"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                            <option value="draft" {{ old('status', $brevetKuasa->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="publish" {{ old('status', $brevetKuasa->status) == 'publish' ? 'selected' : '' }}>Publish</option>
                        </select>
                        @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Tombol Update --}}
                    <div class="flex justify-end">
                        <a href="{{ route('brevets_kuasa.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded mr-2">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>