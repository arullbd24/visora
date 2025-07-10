<aside
    class="fixed top-0 left-0 w-64 h-screen bg-gradient-to-b from-blue-800 to-blue-900 text-white p-4 flex flex-col justify-between z-50 transition-all duration-300">
    <!-- Logo / Title -->
    <div>
        <div class="text-2xl font-bold mb-6 p-2 flex items-center gap-2">
            <i data-lucide="shield" class="w-6 h-6 text-blue-300"></i>
            <span>Visora</span>
        </div>

        <!-- Sidebar navigation -->
        <nav class="space-y-1">
            <a href="#"
                class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200 group">
                <i data-lucide="layout-dashboard" class="w-5 h-5 text-blue-300 group-hover:text-white"></i>
                <span class="font-medium">Dashboard</span>
            </a>
            <a href="#"
                class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200 group">
                <i data-lucide="users" class="w-5 h-5 text-blue-300 group-hover:text-white"></i>
                <span class="font-medium">Client</span>
            </a>
            <a href="#"
                class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200 group">
                <i data-lucide="package" class="w-5 h-5 text-blue-300 group-hover:text-white"></i>
                <span class="font-medium">Product</span>
            </a>
            <a href="#"
                class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200 group">
                <i data-lucide="shopping-cart" class="w-5 h-5 text-blue-300 group-hover:text-white"></i>
                <span class="font-medium">Orders</span>
            </a>
            <a href="#"
                class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200 group">
                <i data-lucide="file-bar-chart" class="w-5 h-5 text-blue-300 group-hover:text-white"></i>
                <span class="font-medium">Reports</span>
            </a>
            <a href="#"
                class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200 group">
                <i data-lucide="settings" class="w-5 h-5 text-blue-300 group-hover:text-white"></i>
                <span class="font-medium">Settings</span>
            </a>
        </nav>
    </div>

    <!-- Logout -->
    <div class="mb-4">
        <a href="#"
            class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200 group">
            <i data-lucide="log-out" class="w-5 h-5 text-blue-300 group-hover:text-white"></i>
            <span class="font-medium">Logout</span>
        </a>
    </div>
</aside>

<!-- Aktifkan ikon -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
