<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">
    @yield('head-link-field')
    <link rel="stylesheet" href="{{ asset('main/css/s.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/font/system-ui sans.css') }}">
    <script src="https://kit.fontawesome.com/15f35fc9f3.js" crossorigin="anonymous"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    @yield('head-style-field')
    @livewireStyles
</head>
<body>
    
    <main>
        <div class="cMainQrScan">
            {{ $slot }}
        </div>
    </main>
    
    
    
    @livewireScripts
    @yield('script-field')
    
    {{-- <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script> --}}
</body>
</html>