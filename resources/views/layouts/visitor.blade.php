<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'IAPI Korda Jawa Timur' }}</title>
    <meta name="description" content="IAPI Korda Jawa Timur: Pelatihan, sertifikasi, dan informasi akuntan publik." />
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $title ?? 'IAPI Korda Jawa Timur' }}" />
    <meta property="og:description" content="Pelatihan, sertifikasi, dan informasi akuntan publik." />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('images/kiriiapi.webp') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $title ?? 'IAPI Korda Jawa Timur' }}" />
    <meta name="twitter:description" content="Pelatihan, sertifikasi, dan informasi akuntan publik." />
    <meta name="twitter:image" content="{{ asset('images/kiriiapi.webp') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <!-- Favicon & App Icons -->
    <link rel="icon" type="image/webp" href="{{ asset('favicon1.webp') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon1.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon1.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon1.png') }}">
    <meta name="theme-color" content="#071225">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-gray-100 to-white text-gray-800">

    <a href="#main-content" class="sr-only focus:not-sr-only px-3 py-2 bg-blue-600 text-white rounded">
        Lewati ke konten
    </a>

    @include('layouts.navbar')

    <main id="main-content" class="min-h-screen">
        @yield('content')
    </main>

    @include('layouts.mitra')
    @include('layouts.footer')

    crossorigin="anonymous"></script>

    @stack('scripts')
</body>

</html>
