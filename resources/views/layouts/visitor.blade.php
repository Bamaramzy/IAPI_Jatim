<!DOCTYPE html>
<html lang="id">

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'IAPI' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-gray-100 to-white text-gray-800">

    {{-- Navbar visitor --}}
    @include('layouts.navbar')

    {{-- Konten halaman --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer visitor --}}
    @include('layouts.footer')

</body>

</html>
