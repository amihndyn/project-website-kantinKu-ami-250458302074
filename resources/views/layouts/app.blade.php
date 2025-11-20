<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'KantinKu' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen bg-gray-50">

    <!-- Navbar -->
    <!-- <livewire:components.navbar /> -->

    <!-- Konten utama dari ListProduct -->
    {{ $slot }}

    <!-- Footer -->
    <!-- <livewire:components.footer /> -->

    @livewireScripts
</body>
</html>
