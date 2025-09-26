<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ✏️ Edit Brevet
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded p-6">
                <form action="{{ route('brevets.update', $brevet->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- ✅ Judul --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul', $brevet->judul) }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Masukkan judul brevet" required>
                        @error('judul')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Brosur (File Upload) --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Brosur</label>
                        @if ($brevet->brosur)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $brevet->brosur) }}" alt="Brosur"
                                    class="h-32 rounded shadow">
                            </div>
                        @endif
                        <input type="file" name="brosur"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Biarkan kosong jika tidak ingin
                            mengubah brosur.</p>
                        @error('brosur')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Link Pendaftaran --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Link Pendaftaran</label>
                        <input type="text" name="link_daftar" value="{{ old('link_daftar', $brevet->link_daftar) }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Masukkan link pendaftaran">
                        @error('link_daftar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Status --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Status</label>
                        <select name="status"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                            <option value="draft" {{ old('status', $brevet->status) == 'draft' ? 'selected' : '' }}>
                                Draft</option>
                            <option value="publish" {{ old('status', $brevet->status) == 'publish' ? 'selected' : '' }}>
                                Publish</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Tombol Aksi --}}
                    <div class="flex justify-end">
                        <a href="{{ route('brevets.index') }}"
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
