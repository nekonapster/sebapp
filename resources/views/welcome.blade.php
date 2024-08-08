<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-[#111827]">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sebapp</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans">
    <main class="">
        <div class="max-w-96 mr-auto ml-auto mt-[50%] bg-[#1f2937] px-6 py-4 rounded-lg">
            @include('livewire/pages/auth/login')
        </div>
    </main>

    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
        <p>2024 by Nekonapster</p>
    </footer>
</body>

</html>
