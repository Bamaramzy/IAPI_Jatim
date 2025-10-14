<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ✏️ Edit Direktori
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('direktori.update', $direktori->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block mb-1 font-medium">Judul <span class="text-red-500">*</span></label>
                        <input type="text" name="judul" value="{{ old('judul', $direktori->judul) }}"
                            class="block w-full border rounded-md p-2 text-sm">
                        @error('judul')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Deskripsi</label>
                        <textarea name="deskripsi" rows="3" class="block w-full border rounded-md p-2 text-sm">{{ old('deskripsi', $direktori->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div x-data="{ hasOld: {{ $direktori->file_pdf ? 'true' : 'false' }} }">
                        <label class="block mb-1 font-medium">File PDF</label>

                        <template x-if="hasOld">
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-1">
                                📄 File lama:
                                <span class="font-medium text-indigo-600">{{ basename($direktori->file_pdf) }}</span>
                            </p>
                        </template>

                        <input type="file" name="file_pdf" accept="application/pdf" x-on:change="hasOld = false"
                            class="block w-full text-sm border rounded p-1">
                        <p class="text-xs text-gray-500">Opsional — Maksimal 20MB</p>

                        @error('file_pdf')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Link Google Drive</label>
                        <input type="url" name="link_drive" value="{{ old('link_drive', $direktori->link_drive) }}"
                            placeholder="https://drive.google.com/..."
                            class="block w-full border rounded-md p-2 text-sm">
                        @error('link_drive')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div x-data="{ hasCover: {{ $direktori->cover ? 'true' : 'false' }} }">
                        <label class="block mb-1 font-medium">Cover (Opsional)</label>

                        <template x-if="hasCover">
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $direktori->cover) }}" alt="Cover lama"
                                    class="h-32 rounded shadow">
                            </div>
                        </template>

                        <input type="file" name="cover" accept="image/*" x-on:change="hasCover = false"
                            class="block w-full text-sm border rounded p-1">
                        <p class="text-xs text-gray-500">Opsional — Maksimal 2MB</p>

                        @error('cover')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Status <span class="text-red-500">*</span></label>
                        <select name="status" class="block w-full border rounded-md p-2 text-sm">
                            <option value="aktif"
                                {{ old('status', $direktori->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif"
                                {{ old('status', $direktori->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif
                            </option>
                        </select>
                        @error('status')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                            class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                            🔄 Update
                        </button>
                        <a href="{{ route('direktori.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                            ↩️ Kembali
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
