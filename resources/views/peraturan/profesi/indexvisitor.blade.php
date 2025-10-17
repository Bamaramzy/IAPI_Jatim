@extends('layouts.visitor')

@section('content')
    <section x-data="{ tab: 'regulasi' }" class="max-w-5xl mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold mb-10 text-center text-gray-800">Peraturan Profesi</h1>

        <div class="flex justify-center mb-10">
            <nav class="flex space-x-3">
                <button @click="tab = 'regulasi'"
                    :class="tab === 'regulasi'
                        ?
                        'bg-[#071225] text-white' :
                        'bg-gray-200 hover:bg-gray-300'"
                    class="px-2 py-2 rounded-full font-medium transition">
                    Regulasi
                </button>

                <button @click="tab = 'asosiasi'"
                    :class="tab === 'asosiasi'
                        ?
                        'bg-[#071225] text-white' :
                        'bg-gray-200 hover:bg-gray-300'"
                    class="px-2 py-2 rounded-full font-medium transition">
                    Peraturan Asosiasi
                </button>

                <button @click="tab = 'pengurus'"
                    :class="tab === 'pengurus'
                        ?
                        'bg-[#071225] text-white' :
                        'bg-gray-200 hover:bg-gray-300'"
                    class="px-2 py-2 rounded-full font-medium transition">
                    Peraturan Pengurus
                </button>
            </nav>
        </div>

        @php
            function renderItemsBtn($items, $title)
            {
                $html = '';
                $no = 1;
                if ($items->isEmpty()) {
                    $html .= '<p class="text-gray-500 text-center">Belum ada ' . $title . '.</p>';
                } else {
                    foreach ($items as $item) {
                        $link = '';
                        if ($item->file_path) {
                            $link =
                                '<a href="' .
                                asset('storage/' . $item->file_path) .
                                '" target="_blank" class="ml-2 text-blue-600 hover:underline text-sm">(Lihat)</a>';
                        } elseif ($item->link_url) {
                            $link =
                                '<a href="' .
                                $item->link_url .
                                '" target="_blank" class="ml-2 text-blue-600 hover:underline text-sm">(Lihat)</a>';
                        }
                        $html .=
                            '
                        <div class="flex items-start gap-3 p-4 rounded-lg border-l-4 border-[#071225] bg-white shadow-sm hover:shadow-md transition">
                            <span class="text-[#071225] font-bold">' .
                            $no++ .
                            '.</span>
                            <div class="flex-1">
                                <p class="text-gray-800 font-medium">' .
                            $item->judul .
                            ' ' .
                            $link .
                            '</p>
                            </div>
                        </div>
                    ';
                    }
                }
                return $html;
            }
        @endphp

        <div x-show="tab === 'regulasi'" class="space-y-3" x-transition>
            {!! renderItemsBtn($peraturans->where('kategori', 'regulasi'), 'regulasi') !!}
        </div>

        <div x-show="tab === 'asosiasi'" class="space-y-3" x-transition>
            {!! renderItemsBtn($peraturans->where('kategori', 'asosiasi'), 'peraturan asosiasi') !!}
        </div>

        <div x-show="tab === 'pengurus'" class="space-y-3" x-transition>
            {!! renderItemsBtn($peraturans->where('kategori', 'pengurus'), 'peraturan pengurus') !!}
        </div>
    </section>
@endsection
