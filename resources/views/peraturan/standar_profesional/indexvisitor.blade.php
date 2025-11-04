@extends('layouts.visitor')

@section('content')
    <section x-data="{ tab: 'semua' }" class="max-w-6xl mx-auto px-4 sm:px-6 py-8 sm:py-12">
        <h1 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-10 text-center text-gray-800">
            Standar Profesional Akuntan Publik (SPAP)
        </h1>

        @php
            $kategoriList = $peraturans->pluck('kategori')->unique()->values();
        @endphp

        <div class="flex flex-col sm:flex-row flex-wrap justify-center gap-2 sm:gap-4 mb-6 sm:mb-10 px-2">
            <button @click="tab = 'semua'"
                class="w-full sm:w-auto px-4 sm:px-5 py-2.5 rounded-full text-sm font-semibold 
                    text-center transition-colors duration-200"
                :class="tab === 'semua'
                    ?
                    'bg-[#071225] text-white' :
                    'bg-gray-200 hover:bg-gray-300'">
                SEMUA
            </button>

            @foreach ($kategoriList as $kategori)
                <button @click="tab = '{{ Str::slug($kategori) }}'"
                    class="w-full sm:w-auto px-4 sm:px-5 py-2.5 rounded-full text-sm font-semibold 
                        text-center transition-colors duration-200"
                    :class="tab === '{{ Str::slug($kategori) }}'
                        ?
                        'bg-[#071225] text-white' :
                        'bg-gray-200 hover:bg-gray-300'">
                    {{ strtoupper($kategori) }}
                </button>
            @endforeach
        </div>

        @php
            function renderSpapItem($item)
            {
                $html = '<div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 
                    border border-gray-100 overflow-hidden">';

                if ($item->thumbnail) {
                    $html .=
                        '<img src="' .
                        asset('storage/' . $item->thumbnail) .
                        '" 
                        alt="' .
                        e($item->judul) .
                        '"
                        class="w-full h-40 sm:h-48 object-cover">';
                }

                $html .= '<div class="p-4 sm:p-6 space-y-4">';

                // Title
                $html .=
                    '<h3 class="text-lg sm:text-xl font-semibold text-gray-800 line-clamp-2">' .
                    e($item->judul) .
                    '</h3>';

                // Description
                $html .=
                    '<p class="text-sm sm:text-base text-gray-600 line-clamp-3">' .
                    e(Str::limit(strip_tags($item->deskripsi), 200)) .
                    '</p>';

                // PDF Links
                $pdfLinks = [];
                for ($i = 1; $i <= 3; $i++) {
                    $judul = $item->{"pdf_{$i}_judul"};
                    $url = $item->{"pdf_{$i}_url"};
                    if ($judul && $url) {
                        $pdfLinks[] =
                            '<a href="' .
                            e($url) .
                            '" target="_blank"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium
                            bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                            ' .
                            e($judul) .
                            '
                        </a>';
                    }
                }

                if (!empty($pdfLinks)) {
                    $html .= '<div class="flex flex-wrap gap-2">' . implode('', $pdfLinks) . '</div>';
                }

                $html .= '</div></div>';
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
