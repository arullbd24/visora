<aside class="w-64 bg-gradient-to-b from-blue-900 to-blue-700 text-white flex flex-col p-6 min-h-screen shadow-lg">
    <div class="flex items-center space-x-3 mb-8">
        <img src="{{ asset('assets/img/visora..png') }}" alt="Logo" class="w-10 h-10 rounded-full shadow">
        <span class="text-2xl font-extrabold tracking-wide">Admin Visora</span>
    </div>
    <nav class="flex-1">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-blue-600 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6"></path>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.services.index') }}"
                   class="flex items-center px-4 py-2 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.services.*') ? 'bg-blue-600' : 'hover:bg-blue-600' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6"></path>
                        <path d="M3 9a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                    </svg>
                    Layanan
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-blue-600">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M17 20h5v-2a4 4 0 00-3-3.87"></path>
                        <path d="M9 20H4v-2a4 4 0 013-3.87"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    Pengguna
                </a>
            </li>
            <li>
                <a href="{{ route('admin.orders') }}"
                   class="flex items-center px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-blue-600 {{ request()->routeIs('admin.orders') ? 'bg-blue-600' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="7" width="18" height="13" rx="2" ry="2"></rect>
                        <path d="M16 3v4"></path>
                        <path d="M8 3v4"></path>
                        <path d="M3 11h18"></path>
                    </svg>
                    Pesanan
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-red-600">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Keluar
                </a>
            </li>
        </ul>
    </nav>
    <div class="mt-auto pt-6 border-t border-blue-600 text-xs text-blue-200">
        &copy; {{ date('Y') }} Visora. All rights reserved.
    </div>
</aside>
