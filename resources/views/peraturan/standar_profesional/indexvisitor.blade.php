@extends('layouts.visitor')

@section('content')
    <section x-data="{ tab: 'semua' }" class="max-w-6xl mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold mb-10 text-center text-gray-800">Standar Profesional Akuntan Publik (SPAP)</h1>

        @php
            $kategoriList = $peraturans->pluck('kategori')->unique()->values();
        @endphp

        <div class="flex flex-wrap justify-center mb-10 gap-2">
            <button @click="tab = 'semua'"
                :class="tab === 'semua' ? 'bg-[#071225] text-white' : 'bg-gray-200 hover:bg-[#0C2C77]'"
                class="px-3 py-2 rounded-full font-medium transition">
                Semua
            </button>

            @foreach ($kategoriList as $kategori)
                <button @click="tab = '{{ Str::slug($kategori) }}'"
                    :class="tab === '{{ Str::slug($kategori) }}'
                        ?
                        'bg-[#071225] text-white' :
                        'bg-gray-200 text-gray-700 hover:bg-blue-100'"
                    class="px-3 py-2 rounded-full font-medium transition">
                    {{ ucfirst($kategori) }}
                </button>
            @endforeach
        </div>

        @php
            function renderSpapItem($item)
            {
                $html =
                    '<div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition border border-gray-100">';

                if ($item->thumbnail) {
                    $html .=
                        '<img src="' .
                        asset('storage/' . $item->thumbnail) .
                        '" alt="thumbnail" class="w-full h-48 object-cover rounded-lg mb-4">';
                }
                $html .= '<h3 class="text-xl font-semibold text-gray-800 mb-2">' . e($item->judul) . '</h3>';
                $html .= '<p class="text-gray-600 mb-4">' . e(Str::limit(strip_tags($item->deskripsi), 300)) . '</p>';
                $pdfLinks = [];
                for ($i = 1; $i <= 3; $i++) {
                    $judul = $item->{"pdf_{$i}_judul"};
                    $url = $item->{"pdf_{$i}_url"};
                    if ($judul && $url) {
                        $pdfLinks[] =
                            '<a href="' .
                            e($url) .
                            '" target="_blank"
                        class="inline-block bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-sm hover:bg-blue-100 transition">
                        ' .
                            e($judul) .
                            '</a>';
                    }
                }

                if (!empty($pdfLinks)) {
                    $html .= '<div class="flex flex-wrap gap-2 mt-2">' . implode('', $pdfLinks) . '</div>';
                }

                $html .= '</div>';
                return $html;
            }
        @endphp

        <div x-show="tab === 'semua'" x-transition class="space-y-6">
            @forelse ($peraturans as $item)
                {!! renderSpapItem($item) !!}
            @empty
                <p class="text-center text-gray-500">Belum ada data SPAP.</p>
            @endforelse
        </div>

        @foreach ($kategoriList as $kategori)
            <div x-show="tab === '{{ Str::slug($kategori) }}'" x-transition class="space-y-6">
                @php
                    $filtered = $peraturans->where('kategori', $kategori);
                @endphp

                @forelse ($filtered as $item)
                    {!! renderSpapItem($item) !!}
                @empty
                    <p class="text-center text-gray-500">Belum ada data untuk kategori {{ $kategori }}.</p>
                @endforelse
            </div>
        @endforeach
    </section>
@endsection
