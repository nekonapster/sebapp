<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <html data-theme="dark">

    </html>

    <title>{{ __('Guest') }}</title>
</head>

<body>
    <div class="p-3 bg-neutral rounded-lg my-16 mx-10">


        <div class="lg:mx-auto xl:mx-auto">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="">
                    @livewire('tabla-invitado-component')
                </div>
            </div>
        </div>
        
        
        <div class="flex justify-end">
            <a href="{{ route('login') }}">
                <x-primary-button :overrideClass="true" class="btn btn-success mt-3 flex justify-end">
                    {{ __('Return to login') }}
                </x-primary-button>
            </a>
        </div>
    </div>
</body>

</html>