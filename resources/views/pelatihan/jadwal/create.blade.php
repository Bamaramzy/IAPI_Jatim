<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ➕ Tambah Jadwal Pelatihan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

                {{-- ✅ Error Message --}}
                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pelatihan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Judul --}}
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Judul <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="judul" id="judul"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('judul') }}" required>
                    </div>

                    {{-- Kategori --}}
                    <div class="mb-4">
                        <label for="kategori" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="kategori" id="kategori"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Tatap Muka" {{ old('kategori') == 'Tatap Muka' ? 'selected' : '' }}>Tatap
                                Muka</option>
                            <option value="Webinar" {{ old('kategori') == 'Webinar' ? 'selected' : '' }}>Webinar
                            </option>
                            <option value="Hybrid" {{ old('kategori') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                        </select>
                    </div>

                    {{-- Tanggal Mulai --}}
                    <div class="mb-4">
                        <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Tanggal Mulai <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('tanggal_mulai') }}" required>
                    </div>

                    {{-- Tanggal Selesai --}}
                    <div class="mb-4">
                        <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Tanggal Selesai
                        </label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('tanggal_selesai') }}">
                    </div>

                    {{-- Waktu Mulai --}}
                    <div class="mb-4">
                        <label for="waktu_mulai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Jam Mulai <span class="text-red-500">*</span>
                        </label>
                        <input type="time" name="waktu_mulai" id="waktu_mulai"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('waktu_mulai') }}" required>
                    </div>

                    {{-- Waktu Selesai --}}
                    <div class="mb-4">
                        <label for="waktu_selesai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Jam Selesai <span class="text-red-500">*</span>
                        </label>
                        <input type="time" name="waktu_selesai" id="waktu_selesai"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('waktu_selesai') }}" required>
                    </div>

                    {{-- Lokasi --}}
                    <div class="mb-4">
                        <label for="lokasi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Lokasi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="lokasi" id="lokasi"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('lokasi') }}" required>
                    </div>

                    {{-- Upload Brosur --}}
                    <div class="mb-4">
                        <label for="brosur" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Upload Brosur (Opsional)
                        </label>
                        <input type="file" name="brosur" id="brosur" accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-700 dark:text-gray-300">
                        <p class="text-xs text-gray-500 mt-1">Opsional — maksimal 2MB</p>
                    </div>

                    {{-- Status --}}
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select name="status" id="status"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>Publish</option>
                        </select>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('pelatihan.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</a>
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
