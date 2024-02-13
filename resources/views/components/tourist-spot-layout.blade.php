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
                                SKTOUR | {{ auth()->user()->tourist_spot->municipality->name }}
                            </span> </a>
                        <div class=" text-center">
                            <span
                                class="underline text-md  text-gray-700 font-medium">{{ auth()->user()->tourist_spot->name }}</span>
                        </div>
                    </div>
                    <div class="flex flex-col flex-grow px-4 mt-5">
                        <nav class="flex-1 space-y-1 ">
                            <p class="px-4 pt-4 text-xs font-semibold text-gray-400 uppercase">
                                MENU
                            </p>
                            <ul>
                                <li>
                                    <a class="{{ request()->routeIs('tourist-spot.dashboard') ? 'bg-gray-100 text-green-600' : '' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-green-500"
                                        href="{{ route('tourist-spot.dashboard') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4"
                                            fill="currentColor">
                                            <path
                                                d="M2 5L9 2L15 5L21.303 2.2987C21.5569 2.18992 21.8508 2.30749 21.9596 2.56131C21.9862 2.62355 22 2.69056 22 2.75827V19L15 22L9 19L2.69696 21.7013C2.44314 21.8101 2.14921 21.6925 2.04043 21.4387C2.01375 21.3765 2 21.3094 2 21.2417V5ZM15 19.7639V7.17594L14.9352 7.20369L9 4.23607V16.8241L9.06476 16.7963L15 19.7639Z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Spot Information
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class=" {{ request()->routeIs('tourist-spot.appointments') ? 'bg-gray-100 text-green-600' : '' }}  inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-green-500"
                                        href="{{ route('tourist-spot.appointments') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path
                                                d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 11H8V13H6V11ZM6 15H8V17H6V15ZM10 11H18V13H10V11ZM10 15H15V17H10V15Z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Appointments
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('tourist-spot.tourists') ? 'bg-gray-100 text-green-600' : '' }}  inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-green-500"
                                        href="{{ route('tourist-spot.tourists') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path
                                                d="M17.0839 15.812C19.6827 13.0691 19.6379 8.73845 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.36205 8.73845 4.31734 13.0691 6.91612 15.812C7.97763 14.1228 9.8577 13 12 13C14.1423 13 16.0224 14.1228 17.0839 15.812ZM12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM12 12C10.3431 12 9 10.6569 9 9C9 7.34315 10.3431 6 12 6C13.6569 6 15 7.34315 15 9C15 10.6569 13.6569 12 12 12Z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Tourists
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <p class="px-4 pt-10 text-xs font-semibold text-gray-400 uppercase">
                                Settings
                            </p>
                            <ul>
                                <li>
                                    <a href="{{ route('tourist-spot.settings') }}"
                                        class=" {{ request()->routeIs('tourist-spot.settings') ? 'bg-gray-100 text-green-600' : '' }}  inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4"
                                            fill="currentColor">
                                            <path
                                                d="M17.5 2.47363L23 11.9999L17.5 21.5262H6.5L1 11.9999L6.5 2.47363H17.5ZM8.63398 8.16979L13.634 16.83L15.366 15.83L10.366 7.16979L8.63398 8.16979Z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Spot Settings
                                        </span>
                                    </a>
                                </li>
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
                    <div class="2xl:px-20 px-2 mx-auto relative">
                        <header>
                            <h1 class="font-bold 2xl:text-2xl text-xl text-white">@yield('title')</h1>
                        </header>
                        <div class="mt-10">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <livewire:tourist-spot-approved />
    </div>
    <x-dialog z-index="z-50" blur="md" align="center" />
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
