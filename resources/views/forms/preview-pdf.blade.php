@php
    $file = null;
    $link = null;

    if (isset($get) && is_callable($get)) {
        try {
            $file = $get('file_pdf');
            $link = $get('link_drive');
        } catch (\Throwable $e) {
            $file = null;
            $link = null;
        }
    }

    if (empty($file) && isset($record)) {
        $file = $file ?? ($record->file_pdf ?? null);
        $link = $link ?? ($record->link_drive ?? null);
    }

    if (empty($file) && isset($data) && is_array($data)) {
        $file = $file ?? ($data['file_pdf'] ?? null);
        $link = $link ?? ($data['link_drive'] ?? null);
    }

    $previewLink = null;
    if (!empty($link)) {
        $previewLink = preg_replace('/\/view(\?.*)?$/', '/preview', $link);
    }

    $fileUrl = null;
    if (!empty($file)) {
        if (Str::startsWith($file, ['http://', 'https://'])) {
            $fileUrl = $file;
        } else {
            $fileUrl = asset('storage/' . ltrim($file, '/'));
        }
    }

    $previewUrl = $fileUrl ?? $previewLink;
@endphp

@if ($previewUrl)
    <div class="mt-4">
        <label class="text-sm text-gray-700 font-medium mb-1 block">Preview PDF</label>
        <iframe src="{{ $previewUrl }}" width="100%" height="500" class="border rounded shadow-sm" title="Preview PDF">
        </iframe>
    </div>
@else
    <p class="text-gray-400 italic mt-4">Belum ada file atau link untuk ditampilkan.</p>
@endif
