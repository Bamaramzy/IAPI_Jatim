@php
    $record = $getRecord();
    $file = $record->file_pdf ? asset('storage/' . $record->file_pdf) : null;
    $link = $record->link_drive;

    // Ubah link Google Drive agar bisa di-preview
    if ($link) {
        $previewLink = preg_replace('/\/view(\?.*)?$/', '/preview', $link);
    } else {
        $previewLink = null;
    }

    $previewUrl = $file ?? $previewLink;
@endphp

@if ($previewUrl)
    <iframe src="{{ $previewUrl }}" width="180" height="220" class="border rounded shadow-sm" title="Preview PDF">
    </iframe>
@else
    <span class="text-gray-400 italic">Tidak ada file atau link</span>
@endif
