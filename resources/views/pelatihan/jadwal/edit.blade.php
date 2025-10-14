<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ✏️ Edit Jadwal Pelatihan
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

                <form action="{{ route('pelatihan.update', $pelatihan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Judul <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="judul" id="judul"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('judul', $pelatihan->judul) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="kategori" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="kategori" id="kategori"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                            <option value="Tatap Muka"
                                {{ old('kategori', $pelatihan->kategori) == 'Tatap Muka' ? 'selected' : '' }}>Tatap Muka
                            </option>
                            <option value="Webinar"
                                {{ old('kategori', $pelatihan->kategori) == 'Webinar' ? 'selected' : '' }}>Webinar
                            </option>
                            <option value="Hybrid"
                                {{ old('kategori', $pelatihan->kategori) == 'Hybrid' ? 'selected' : '' }}>Hybrid
                            </option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="tanggal_mulai"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Tanggal Mulai <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                       focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('tanggal_mulai', $pelatihan->tanggal_mulai) }}" required>
                        </div>
                        <div>
                            <label for="tanggal_selesai"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Tanggal Selesai
                            </label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                       focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('tanggal_selesai', $pelatihan->tanggal_selesai) }}">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="waktu_mulai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Jam Mulai <span class="text-red-500">*</span>
                            </label>
                            <input type="time" name="waktu_mulai" id="waktu_mulai"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                       focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('waktu_mulai', $pelatihan->waktu_mulai) }}" required>
                        </div>
                        <div>
                            <label for="waktu_selesai"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Jam Selesai <span class="text-red-500">*</span>
                            </label>
                            <input type="time" name="waktu_selesai" id="waktu_selesai"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                       focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('waktu_selesai', $pelatihan->waktu_selesai) }}" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="lokasi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Lokasi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="lokasi" id="lokasi"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('lokasi', $pelatihan->lokasi) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="brosur" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Upload Brosur (Opsional)
                        </label>
                        <input type="file" name="brosur" id="brosur" accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-700 dark:text-gray-300">
                        <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti brosur</p>

                        @if ($pelatihan->brosur)
                            <div class="mt-2">
                                <p class="text-sm text-gray-600 dark:text-gray-400">Brosur saat ini:</p>
                                <img src="{{ asset('storage/' . $pelatihan->brosur) }}" alt="Brosur"
                                    class="w-32 h-32 object-cover rounded mt-1">
                            </div>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select name="status" id="status"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                            <option value="draft"
                                {{ old('status', $pelatihan->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="publish"
                                {{ old('status', $pelatihan->status) == 'publish' ? 'selected' : '' }}>Publish</option>
                        </select>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('pelatihan.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</a>
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
