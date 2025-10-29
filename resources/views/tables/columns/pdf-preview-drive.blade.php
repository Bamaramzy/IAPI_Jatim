@php
    $link = $getRecord()->link_drive;

    if ($link) {
        $previewLink = preg_replace('/\/view(\?.*)?$/', '/preview', $link);
    } else {
        $previewLink = null;
    }
@endphp

@if ($previewLink)
    <iframe src="{{ $previewLink }}" width="150" height="200" class="border rounded shadow-sm" title="Preview PDF">
    </iframe>
@else
    <span class="text-gray-400 italic">Tidak ada link</span>
@endif
