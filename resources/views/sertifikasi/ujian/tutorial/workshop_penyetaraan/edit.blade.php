<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Workshop Penyetaraan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded p-6">
                <form action="{{ route('workshop_penyetaraan.update', $workshop->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                        <select name="kategori_id"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ old('kategori_id', $workshop->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Judul Materi</label>
                        <input type="text" name="judul" value="{{ old('judul', $workshop->judul) }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Masukkan judul materi">
                        @error('judul')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2 border-b pb-1">Materi PDF
                    </h3>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Upload File PDF
                            (opsional)</label>
                        <input type="file" name="file_path"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                        @if ($workshop->file_path)
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                File saat ini:
                                <a href="{{ asset('storage/' . $workshop->file_path) }}" target="_blank"
                                    class="text-blue-600 hover:underline">Lihat PDF</a>
                            </p>
                        @endif
                        @error('file_path')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Link PDF (opsional)</label>
                        <input type="url" name="link_url" value="{{ old('link_url', $workshop->link_url) }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="https://contoh.com/file.pdf">
                        @error('link_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Thumbnail Preview PDF
                            (opsional)</label>
                        <input type="file" name="preview_thumbnail"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                        @if ($workshop->preview_thumbnail)
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                Thumbnail saat ini:
                                <img src="{{ asset('storage/' . $workshop->preview_thumbnail) }}" alt="Thumbnail"
                                    class="h-24 mt-1 rounded border">
                            </p>
                        @endif
                        @error('preview_thumbnail')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2 border-b pb-1">Tutorial -
                        Video</h3>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Upload File Video
                            (opsional)</label>
                        <input type="file" name="video_file"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                        @if ($workshop->video_file)
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                🎞️ File saat ini:
                                <a href="{{ asset('storage/' . $workshop->video_file) }}" target="_blank"
                                    class="text-blue-600 hover:underline">Lihat Video</a>
                            </p>
                        @endif
                        @error('video_file')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Link Video (opsional)</label>
                        <input type="url" name="video_link" value="{{ old('video_link', $workshop->video_link) }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="https://youtube.com/...">
                        @error('video_link')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Thumbnail Video
                            (opsional)</label>
                        <input type="file" name="thumbnail_url"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                        @if ($workshop->thumbnail_url)
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                Thumbnail saat ini:
                                <img src="{{ asset('storage/' . $workshop->thumbnail_url) }}" alt="Video Thumbnail"
                                    class="h-24 mt-1 rounded border">
                            </p>
                        @endif
                        @error('thumbnail_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('workshop_penyetaraan.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded mr-2">Batal</a>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
