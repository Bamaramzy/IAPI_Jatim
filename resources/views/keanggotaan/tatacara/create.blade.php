<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ➕ Tambah Tata Cara
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

                <form action="{{ route('tatacara.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Judul <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="judul" id="judul"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('judul') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="file_pdf" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Upload File PDF
                        </label>
                        <input type="file" name="file_pdf" id="file_pdf" accept="application/pdf"
                            class="mt-1 block w-full text-sm text-gray-700 dark:text-gray-300">
                        <p class="text-xs text-gray-500 mt-1">Opsional — Maksimal 20MB</p>
                    </div>

                    <div class="mb-4">
                        <label for="link_drive" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Link Google Drive
                        </label>
                        <input type="url" name="link_drive" id="link_drive"
                            placeholder="https://drive.google.com/..."
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('link_drive') }}">
                        <p class="text-xs text-gray-500 mt-1">Opsional — jika file sudah diunggah ke Google Drive</p>
                    </div>

                    <div class="mb-4">
                        <label for="cover" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Upload Cover (Opsional)
                        </label>
                        <input type="file" name="cover" id="cover" accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-700 dark:text-gray-300">
                        <p class="text-xs text-gray-500 mt-1">Opsional — Maksimal 2MB</p>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select name="status" id="status"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif
                            </option>
                        </select>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('tatacara.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</a>
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
