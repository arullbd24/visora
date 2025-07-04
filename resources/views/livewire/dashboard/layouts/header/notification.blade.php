<div class="relative" x-data="{ openNotificationHeader: false }" @mousedown.outside="openNotificationHeader = false">
    <!-- Notification Button -->
    <button type="button"
        wire:click="loadNotificationsHeader"
        @click="openNotificationHeader = !openNotificationHeader"
        class="w-10 h-10 rounded-full bg-white shadow flex items-center justify-center hover:bg-blue-100 transition duration-200 focus:outline-none">
        <i class="fas fa-bell text-blue-600"></i>
    </button>

    <!-- Dropdown Notification Panel -->
    <div class="absolute right-0 mt-2 w-96 z-50 transition-all duration-300 origin-top-right"
        x-show="openNotificationHeader"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @click.away="openNotificationHeader = false"
        style="display: none;"
    >
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
            <div class="p-4 text-sm font-semibold text-gray-700 border-b">
                Notifikasi Terbaru
            </div>
            <div class="max-h-60 overflow-y-auto text-sm">
                @if ($loadedNotification)
                    <ul class="divide-y divide-gray-100">
                        @forelse ($notificationsData as $notification)
                            <li class="p-3 hover:bg-gray-50 transition">{{ $notification->message }}</li>
                        @empty
                            <li class="p-3 text-gray-400 text-center">Belum ada notifikasi.</li>
                        @endforelse
                    </ul>
                @else
                    <div class="p-3 text-gray-400 text-center">Memuat notifikasi...</div>
                @endif
            </div>
        </div>
    </div>
</div>
