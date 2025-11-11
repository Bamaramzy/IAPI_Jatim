<section class="max-w-7xl mx-auto px-6 lg:px-8 py-16">
    <h2 class="text-3xl font-bold text-center mb-8">Mitra</h2>

    <div class="flex flex-wrap justify-center items-center gap-6">
        @php
            $partners = ['mitra-ifac.webp', 'mitra-bi.webp', 'mitra-kemenkeu.webp', 'mitra-ojk.webp'];
        @endphp

        @foreach ($partners as $logo)
            <div
                class="w-60 h-28 flex items-center justify-center border rounded-xl bg-white shadow-sm hover:shadow-md transition">
                <img src="{{ asset('images/' . $logo) }}" alt="mitra" class="max-w-[220px] max-h-[60px] object-contain"
                    loading="lazy">
            </div>
        @endforeach
    </div>
</section>
