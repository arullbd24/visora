<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Auth' }}</title>

    @yield('head-meta-field')
    <title>@yield('titlePage', 'Visora')</title>
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
    <link rel="stylesheet" href="{{ asset('main/css/s.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('main/css/font.css') }}" type="text/css">
    <script src="https://kit.fontawesome.com/15f35fc9f3.js" crossorigin="anonymous"></script>
    @yield('head-style-field')


    @livewireStyles
</head>

<body>
    <div class="main-content">
        <main>
            {{-- <div class="bg-gray-200"></div> --}}
            {{ $slot }}
        </main>
    </div>
    @livewireScripts
</body>
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
