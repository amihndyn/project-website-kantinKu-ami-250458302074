<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
    @livewireStyles

    <title>@yield('title', 'My App')</title>
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- Konten halaman --}}
    @yield('content')

    @livewireScripts
    @vite('resources/js/app.js')
</body>
</html>
