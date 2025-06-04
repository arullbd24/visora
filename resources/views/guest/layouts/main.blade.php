<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>

    @yield('head-meta-field')
    <title>@yield('titlePage', 'Visora8')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/img/visora..png') }}" type="image/x-icon">
    @yield('head-link-field')
    <link rel="stylesheet" href="{{ asset('main/css/s.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/font.css') }}">
    <script src="https://kit.fontawesome.com/15f35fc9f3.js" crossorigin="anonymous"></script>
    <script src="{{ asset('main/js/searchDoc.js') }}" wire:ignore></script>
    @yield('head-style-field')


    @livewireStyles
</head>

<body>
            @include('guest.layouts.header')
            <header>
                <nav class="bg-[#1c64f2] border-gray-200 px-4 lg:px-6 py-2.5">
                    <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto">
                        <a href="#" class="flex items-center">
                            <img src="{{ asset('assets/img/visora..png') }}" class="h-8 mr-5 sm:h-20" alt="AST Logo" />
                            <span class="self-center text-xl font-semibold whitespace-nowrap text-white">Visora.</span>
                        </a>
                        <div class="flex items-center lg:order-2">
                            <a href="{{ route('auth.login') }}"
                                class="text-white hover:text-blue-500 hover:underline font-medium text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none">Log
                                in</a>
                            <a href="{{ route('auth.register') }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none">Daftar
                                Sekarang</a>
                            <button data-collapse-toggle="mobile-menu-2" type="button"
                                class="inline-flex items-center p-2 ml-1 text-sm text-gray-200 rounded-lg lg:hidden hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                aria-controls="mobile-menu-2" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1"
                            id="mobile-menu-2">
                            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                                <li>
                                    <a href="{{ route('guest.main') }}"
                                        class="block py-2 pl-3 pr-4 text-gray-200  hover:bg-gray-700 lg:hover:bg-transparent lg:border-0 lg:hover:text-white lg:p-0"
                                        aria-current="page">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('guest.about') }}"
                                        class="block py-2 pl-3 pr-4 text-gray-200  hover:bg-gray-700 lg:hover:bg-transparent lg:border-0 lg:hover:text-white lg:p-0">About
                                        Us</a>
                                </li>
                                <li>
                                    <div class="relative">
                                        <button id="dropdownFiturButton" data-dropdown-toggle="dropdownFitur"
                                            class="block py-2 pl-3 pr-4 text-gray-200  hover:bg-gray-700 lg:hover:bg-transparent lg:border-0 lg:hover:text-white lg:p-0">
                                            Fitur
                                            <svg class="w-2.5 h-2.5 ms-3 inline" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                            </svg>
                                        </button>
                                        <div id="dropdownFitur"
                                            class="z-10 hidden bg-gray-700 divide-y divide-gray-100 rounded-lg shadow w-44">
                                            <ul class="py-2 text-sm text-gray-200"
                                                aria-labelledby="dropdownFiturButton">
                                                <li>
                                                    <a href=""
                                                        class="block px-4 py-2 hover:bg-gray-600 hover:text-white">E-Certificate</a>
                                                </li>
                                                <li>
                                                    <a href=""
                                                        class="block px-4 py-2 hover:bg-gray-600 hover:text-white">E-Signature</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="relative">
                                        <button id="dropdownContactButton" data-dropdown-toggle="dropdownContact"
                                            class="block py-2 pl-3 pr-4 text-gray-200 hover:bg-gray-700 lg:hover:bg-transparent lg:border-0 lg:hover:text-white lg:p-0">
                                            Contact
                                            <svg class="w-2.5 h-2.5 ms-3 inline" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                            </svg>
                                        </button>
                                        <div id="dropdownContact"
                                            class="z-10 hidden bg-gray-700 divide-y divide-gray-100 rounded-lg shadow w-44">
                                            <ul class="py-2 text-sm text-gray-200"
                                                aria-labelledby="dropdownContactButton">
                                                <li>
                                                    <a href=""
                                                        class="block px-4 py-2 hover:bg-gray-600 hover:text-white">Support</a>
                                                </li>
                                                <li>
                                                    <a href=""
                                                        class="block px-4 py-2 hover:bg-gray-600 hover:text-white">FAQs</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
    </header>
    <nav></nav>
    <div class="main-content">
        <main>
            {{ $slot }}
        </main>
    </div>

</body>
@livewireScripts
<script>
    document.addEventListener('livewire:load', function() {
        Livewire.hook('message.sent', () => {
            // Mengganti title halaman (jika ingin)
            document.title = 'Loading...';
        });

        Livewire.hook('message.processed', () => {
            // Mengembalikan title ke normal setelah load selesai
            document.title = 'Dashboard'; // Ganti dengan title asli halaman
        });
    });
</script>

@yield('script-field')

</html>
