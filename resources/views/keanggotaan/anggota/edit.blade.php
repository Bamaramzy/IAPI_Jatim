<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Anggota') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">No Urut</label>
                    <input type="number" name="no_urut" value="{{ old('no_urut', $anggota->no_urut) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 
                               dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">No Reg IAPI</label>
                    <input type="text" name="no_reg_iapi" value="{{ old('no_reg_iapi', $anggota->no_reg_iapi) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 
                               dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Anggota</label>
                    <input type="text" name="nama_anggota" value="{{ old('nama_anggota', $anggota->nama_anggota) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 
                               dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Izin AP</label>
                    <input type="text" name="izin_ap" value="{{ old('izin_ap', $anggota->izin_ap) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 
                               dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                    <select name="kategori"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 
                               dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                        @foreach (['Anggota Madya', 'Anggota Muda', 'Anggota Biasa', 'Anggota Pemula', 'Anggota Umum'] as $kategori)
                            <option value="{{ $kategori }}"
                                {{ old('kategori', $anggota->kategori) == $kategori ? 'selected' : '' }}>
                                {{ $kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama KAP</label>
                    <input type="text" name="nama_kap" value="{{ old('nama_kap', $anggota->nama_kap) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 
                               dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                    <select name="status_id"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 
                               dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                        @foreach (['Aktif', 'Cuti Sementara'] as $status)
                            <option value="{{ $status }}"
                                {{ old('status_id', $anggota->status_id) == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Korwil</label>
                    <input type="text" name="korwil" value="{{ old('korwil', $anggota->korwil) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 
                               dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="flex items-center space-x-2">
                    <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded-md hover:bg-green-700">
                        Update
                    </button>
                    <a href="{{ route('anggota.index') }}"
                        class="px-4 py-2 bg-gray-500 text-white text-sm font-semibold rounded-md hover:bg-gray-600">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
