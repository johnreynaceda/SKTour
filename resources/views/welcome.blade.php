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
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased bg-black">

    <div class="w-full mx-auto relative bg-gradient-to-br from-gray-900 via-black to-gray-800">
        <img src="{{ asset('images/kalamansig.jpg') }}"
            class="absolute opacity-60 top-0 bottom-0 h-full w-full object-cover" alt="">
        <div x-data="{ open: false }"
            class="relative flex flex-col w-full p-5 mx-auto  md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="flex flex-row items-center justify-between lg:justify-start">
                <a class="text-lg tracking-tight text-white uppercase focus:outline-none focus:ring lg:text-2xl"
                    href="/">
                    <span class="2xl:text-4xl font-salsa text-xl font-bold  uppecase focus:ring-0">
                        SKTOUR
                    </span>
                </a>
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 text-white hover:text-green-500 focus:outline-none focus:text-green-500 md:hidden">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{ 'flex': open, 'hidden': !open }"
                class="flex-col items-center flex-grow hidden  md:pb-0 md:flex md:justify-end md:flex-row">

                <div class="2xl:flex hidden:flex-col items-center gap-2 list-none lg:ml-auto">
                    <button
                        class="block px-4 py-2 mt-2 text-md text-gray-100 md:mt-0 hover:text-blue-600 focus:outline-none focus:shadow-outline">
                        About Us
                    </button>
                    <button
                        class="block px-4 py-2 mt-2 text-md text-gray-100 md:mt-0 hover:text-blue-600 focus:outline-none focus:shadow-outline">
                        Accomodation
                    </button>
                    <button
                        class="block px-4 py-2 mt-2 text-md text-gray-100 md:mt-0 hover:text-blue-600 focus:outline-none focus:shadow-outline">
                        Tourist Spot
                    </button>


                    <a href="{{ route('login') }}"
                        class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white bg-black rounded-full group focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 hover:bg-gray-700 active:bg-gray-800 active:text-white focus-visible:outline-black">
                        Sign In
                    </a>
                </div>
            </nav>
        </div>
        <div class=" 2xl:h-[30rem] h-96 text-white">
            <div class="absolute 2xl:bottom-10 bottom-5 2xl:left-10 left-5">
                <h1 class="font-bold 2xl:text-2xl text-xl">BALET ISLAND</h1>
                <h1 class="font-black 2xl:text-6xl text-4xl">KALAMANSIG</h1>
            </div>
        </div>
    </div>
    <div class="2xl:p-3 p-2 grid 2xl:grid-cols-5 grid-cols-2 2xl:gap-3 gap-2">
        <div class="bg-gray-600 2xl:h-80 relative h-40">
            <img src="{{ asset('images/Bansada.jpg') }}"
                class="absolute top-0 opacity-65 left-0 w-full h-full object-cover" alt="">
            <div class="absolute 2xl:bottom-5 bottom-3 2xl:left-4 left-1 text-white">
                <h1 class="font-bold uppercase text-xs">BANSADA AGRI ECO PARK</h1>
                <h1 class="font-bold 2xl:text-3xl text-xl">BAGUMBAYAN</h1>
            </div>
        </div>
        <div class="bg-gray-600 2xl:h-80 relative h-40">
            <img src="{{ asset('images/klego.jpg') }}"
                class="absolute top-0 opacity-65 left-0 w-full h-full object-cover" alt="">
            <div class="absolute 2xl:bottom-5 bottom-3 2xl:left-4 left-1 text-white">
                <h1 class="font-bold uppercase text-xs">fetam klego (underground river)</h1>
                <h1 class="font-bold 2xl:text-3xl text-xl uppercase">columbio</h1>
            </div>
        </div>
        <div class="bg-gray-600 2xl:h-80 relative h-40">
            <img src="{{ asset('images/ugis.jpeg') }}"
                class="absolute top-0 opacity-65 left-0 w-full h-full object-cover" alt="">
            <div class="absolute 2xl:bottom-5 bottom-3 2xl:left-4 left-1 text-white">
                <h1 class="font-bold uppercase text-xs">UGIS PEAK</h1>
                <h1 class="font-bold 2xl:text-3xl text-xl uppercase">ESPERANZA</h1>
            </div>
        </div>
        <div class="bg-gray-600 2xl:h-80 relative h-40">
            <img src="{{ asset('images/provincial.jpeg') }}"
                class="absolute top-0 opacity-65 left-0 w-full h-full object-cover" alt="">
            <div class="absolute 2xl:bottom-5 bottom-3 2xl:left-4 left-1 text-white">
                <h1 class="font-bold uppercase text-xs">SULTAN KUDARAT PROVINCIAL CAPITOL</h1>
                <h1 class="font-bold 2xl:text-3xl text-xl uppercase">ISULAN</h1>
            </div>
        </div>
        <div class="bg-gray-600 2xl:h-80 relative h-40">
            <img src="{{ asset('images/tres.jpg') }}"
                class="absolute top-0 opacity-65 left-0 w-full h-full object-cover" alt="">
            <div class="absolute 2xl:bottom-5 bottom-3 2xl:left-4 left-1 text-white">
                <h1 class="font-bold uppercase text-xs">tres andanas falls</h1>
                <h1 class="font-bold 2xl:text-3xl text-xl uppercase">lebak</h1>
            </div>
        </div>
        <div class="bg-gray-600 2xl:h-80 relative h-40">
            <img src="{{ asset('images/medol.jpeg') }}"
                class="absolute top-0 opacity-65 left-0 w-full h-full object-cover" alt="">
            <div class="absolute 2xl:bottom-5 bottom-3 2xl:left-4 left-1 text-white">
                <h1 class="font-bold uppercase text-xs">Medol island</h1>
                <h1 class="font-bold 2xl:text-3xl text-xl uppercase">PALIMBANG</h1>
            </div>
        </div>

        <div class="bg-gray-600 2xl:h-80 relative h-40">
            <img src="{{ asset('images/lutayan.jpg') }}"
                class="absolute top-0 opacity-65 left-0 w-full h-full object-cover" alt="">
            <div class="absolute 2xl:bottom-5 bottom-3 2xl:left-4 left-1 text-white">
                <h1 class="font-bold uppercase text-xs">lutayan eco park</h1>
                <h1 class="font-bold 2xl:text-3xl text-xl uppercase">LUTAYAN</h1>
            </div>
        </div>

        <div class="bg-gray-600 2xl:h-80 relative h-40">
            <img src="{{ asset('images/lagbasan.jpg') }}"
                class="absolute top-0 opacity-65 left-0 w-full h-full object-cover" alt="">
            <div class="absolute 2xl:bottom-5 bottom-3 2xl:left-4 left-1 text-white">
                <h1 class="font-bold uppercase text-xs">lagbasan cave</h1>
                <h1 class="font-bold 2xl:text-3xl text-xl uppercase">SENATOR NINOY AQUINO</h1>
            </div>
        </div>
        <div class="bg-gray-600 2xl:h-80 relative h-40">
            <img src="{{ asset('images/tacurong.jpg') }}"
                class="absolute top-0 opacity-65 left-0 w-full h-full object-cover" alt="">
            <div class="absolute 2xl:bottom-5 bottom-3 2xl:left-4 left-1 text-white">
                <h1 class="font-bold uppercase text-xs">baras bird sanctuary</h1>
                <h1 class="font-bold 2xl:text-3xl text-xl uppercase">TACURONG CITY</h1>
            </div>
        </div>
        <div class="bg-gray-600 2xl:h-80 relative h-40">
            <img src="{{ asset('images/LAMBAYONG.jpg') }}"
                class="absolute top-0 opacity-65 left-0 w-full h-full object-cover" alt="">
            <div class="absolute 2xl:bottom-5 bottom-3 2xl:left-4 left-1 text-white">
                <h1 class="font-bold uppercase text-xs">lambayong rice fields</h1>
                <h1 class="font-bold 2xl:text-3xl text-xl uppercase">LAMBAYONG</h1>
            </div>
        </div>
    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
