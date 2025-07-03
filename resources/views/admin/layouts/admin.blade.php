<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/flowbite@2.2.0/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" href="{{ asset('assets/img/visora..png') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100 min-h-screen flex">

    {{-- Sidebar --}}
    @include('admin.layouts.partials.sidebar')

    {{-- Main content --}}
    <div class="flex-1 flex flex-col">
        {{-- Header --}}
        @include('admin.layouts.partials.header')

        {{-- Page content --}}
        <main class="p-6 flex-1 overflow-auto">
            @yield('content')
        </main>
    </div>

    <script src="https://unpkg.com/flowbite@2.2.0/dist/flowbite.min.js"></script>
</body>

</html>
