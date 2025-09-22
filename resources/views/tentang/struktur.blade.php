@extends('layouts.visitor')

@section('content')
    <div class="max-w-5xl mx-auto px-6 py-12 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-10 text-center text-gray-900">
            Struktur Organisasi
        </h1>

        <!-- Ketua -->
        @if ($ketua)
            <div class="text-center mb-12">
                <img src="{{ asset('storage/' . $ketua->gambar) }}" alt="{{ $ketua->nama }}"
                    class="w-40 h-40 object-cover mx-auto rounded-full shadow-lg mb-4">
                <h2 class="text-xl font-semibold text-gray-900">{{ $ketua->nama }}</h2>
                <p class="text-gray-700">{{ $ketua->jabatan }}</p>
            </div>
        @endif

        <!-- Dewan Pengurus -->
        <section class="mb-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Dewan Pengurus</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse ($pengurus as $item)
                    <div class="bg-gray-50 p-4 rounded-lg shadow text-center">
                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}"
                                class="w-28 h-28 object-cover mx-auto rounded-full shadow mb-3">
                        @endif
                        <h3 class="text-lg font-medium text-gray-900">{{ $item->nama }}</h3>
                        <p class="text-gray-700">{{ $item->jabatan }}</p>
                    </div>
                @empty
                    <p class="text-center text-gray-500 italic col-span-3">Belum ada data pengurus.</p>
                @endforelse
            </div>
        </section>

        <!-- Dewan Pengawas -->
        <section>
            <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Dewan Pengawas</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse ($pengawas as $item)
                    <div class="bg-gray-50 p-4 rounded-lg shadow text-center">
                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}"
                                class="w-28 h-28 object-cover mx-auto rounded-full shadow mb-3">
                        @endif
                        <h3 class="text-lg font-medium text-gray-900">{{ $item->nama }}</h3>
                        <p class="text-gray-700">{{ $item->jabatan }}</p>
                    </div>
                @empty
                    <p class="text-center text-gray-500 italic col-span-3">Belum ada data pengawas.</p>
                @endforelse
            </div>
        </section>
    </div>
@endsection
