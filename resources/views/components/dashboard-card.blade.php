@props(['title', 'value', 'color' => 'indigo', 'link' => '#'])

<a href="{{ $link }}" class="col-span-1">
    <div class="p-4 bg-{{ $color }}-500 text-white rounded-lg shadow hover:opacity-90 transition">
        <h3 class="text-lg font-semibold">{{ $title }}</h3>
        <p class="text-2xl mt-2">{{ $value }}</p>
    </div>
</a>
