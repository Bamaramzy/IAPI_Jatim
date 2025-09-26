<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ➕ Tambah PPL
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded p-6">
                <form action="{{ route('ppl.store') }}" method="POST">
                    @csrf

                    {{-- ✅ Video URL --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Video URL</label>
                        <input type="text" name="video_url" value="{{ old('video_url') }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="https://www.youtube.com/embed/xxxx">
                        @error('video_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ PDF URL --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">PDF URL</label>
                        <input type="text" name="pdf_url" value="{{ old('pdf_url') }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Google Drive ID (contoh: 1AbCdEfG)">
                        @error('pdf_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Status --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Status</label>
                        <select name="status"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>Publish</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Tombol Simpan --}}
                    <div class="flex justify-end">
                        <a href="{{ route('ppl.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded mr-2">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
