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

<body class="font-sans antialiased relative bg-gray-600">
    <img src="{{ asset('images/Bansada.jpg') }}"
        class="absolute top-0 left-0 bottom-0 w-full h-full opacity-20 object-cover" alt="">
    <div class="flex h-screen overflow-hidden ">
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto relative bg-white bg-opacity-80 border-r">
                    <div class="flex flex-col flex-shrink-0 px-4">
                        <a class="text-lg font-semibold items-center tracking-tighter flex justify-center py-5 text-black focus:outline-none focus:ring "
                            href="/">
                            <span class="inline-flex text-center font-bold text-xl font-salsa text-green-600 gap-2">
                                SKTOUR
                            </span> </a>
                    </div>
                    <div class="mt-5 flex flex-col items-center space-y-2 justify-center">
                        <img src="{{ asset('images/sample.png') }}"
                            class="h-20 w-20 rounded-full border-2 border-gray-500 object-cover" alt="">
                        <div class="text-center">
                            <h1 class="text-sm font-medium text-green-600 underline">{{ auth()->user()->email }}</h1>
                            <h1 class="font-bold text-xs uppercase text-gray-600">
                                provincial</h1>
                        </div>
                    </div>
                    <div class="flex flex-col flex-grow px-4 mt-5">
                        <nav class="flex-1 space-y-1 ">
                            <p class="px-4 pt-4 text-xs font-semibold text-gray-400 uppercase">
                                MENU
                            </p>
                            <ul>
                                {{-- <li>
                                    <a class="{{ request()->routeIs('municipal.dashboard') ? 'bg-white text-green-600' : '' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-green-500"
                                        href="{{ route('municipal.dashboard') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4"
                                            fill="currentColor">
                                            <path
                                                d="M5 20H19V22H5V20ZM12 18C7.58172 18 4 14.4183 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 14.4183 16.4183 18 12 18Z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            User Requests
                                        </span>
                                    </a>
                                </li> --}}
                                <li>
                                    <a class="{{ request()->routeIs('provincial.dashboard') ? 'bg-white text-green-600' : '' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-green-500"
                                        href="{{ route('provincial.dashboard') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4"
                                            fill="currentColor">
                                            <path
                                                d="M2 5L9 2L15 5L21.303 2.2987C21.5569 2.18992 21.8508 2.30749 21.9596 2.56131C21.9862 2.62355 22 2.69056 22 2.75827V19L15 22L9 19L2.69696 21.7013C2.44314 21.8101 2.14921 21.6925 2.04043 21.4387C2.01375 21.3765 2 21.3094 2 21.2417V5ZM15 19.7639V7.17594L14.9352 7.20369L9 4.23607V16.8241L9.06476 16.7963L15 19.7639Z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Tourist Spots
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('provincial.reports') ? 'bg-white text-green-600' : '' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-green-500"
                                        href="{{ route('provincial.reports') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path
                                                d="M16 2L21 7V21.0082C21 21.556 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918C3 2.44405 3.44495 2 3.9934 2H16ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8H8V16H12ZM10 10H12C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14H10V10Z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Reports
                                        </span>
                                    </a>
                                </li>

                            </ul>
                            <p class="px-4 pt-10 text-xs font-semibold text-gray-400 uppercase">
                                Settings
                            </p>
                            <ul>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-green-500"
                                            href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4"
                                                fill="currentColor">
                                                <path
                                                    d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM7 11V8L2 12L7 16V13H15V11H7Z">
                                                </path>
                                            </svg>
                                            <span class="ml-4">
                                                Logout
                                            </span>
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <main class="relative flex-1 overflow-y-auto focus:outline-none">
                <div class="py-6">
                    <div class="px-20 mx-auto relative">
                        <header>
                            <h1 class="font-bold text-2xl uppercase text-white">@yield('title')</h1>
                        </header>
                        <div class="mt-10">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
