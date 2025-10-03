<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ✏️ Edit CFI
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded p-6">
                <form action="{{ route('cfi.update', $cfi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- ✅ Gambar --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Upload Gambar</label>
                        <input type="file" name="gambar" accept="image/*"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">

                        {{-- Preview gambar lama --}}
                        @if ($cfi->gambar)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $cfi->gambar) }}"
                                    class="w-32 h-32 object-contain rounded border">
                            </div>
                        @endif

                        @error('gambar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Link (Opsional) --}}
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Link (Opsional)</label>
                        <input type="text" name="link" value="{{ old('link', $cfi->link) }}"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Boleh dikosongkan jika tidak ada link">
                        @error('link')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ✅ Tombol Update --}}
                    <div class="flex justify-end">
                        <a href="{{ route('cfi.index') }}"
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
