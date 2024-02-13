<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans text-gray-900 antialiased relative bg-gray-600">
    <img src="{{ asset('images/Bansada.jpg') }}"
        class="absolute top-0 bottom-0 left-0 w-full h-full object-cover opacity-30" alt="">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">


        <div class="w-full sm:max-w-5xl relative  bg-white bg-opacity-90 shadow-md overflow-hidden sm:rounded-lg">

            {{ $slot }}
        </div>
    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
