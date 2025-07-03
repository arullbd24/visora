
<aside class="w-64 bg-blue-800 text-white flex flex-col p-6 space-y-6 min-h-screen">
    <h2 class="text-2xl font-bold">Admin Visora</h2>
    <nav class="space-y-3">
        <a href="{{ route ('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-blue-700">Dashboard</a>
        <a href="{{ route('admin.services.index') }}"
           class="block px-3 py-2 rounded {{ request()->routeIs('admin.services.*') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
            Layanan
        </a>
        <a href="#" class="block px-3 py-2 rounded hover:bg-blue-700">Pengguna</a>
        <a href="{{ route('admin.orders') }}" class="block px-3 py-2 rounded hover:bg-blue-700">Pesanan</a>
        <a href="#" class="block px-3 py-2 rounded hover:bg-blue-700">Keluar</a>
    </nav>
</aside>
