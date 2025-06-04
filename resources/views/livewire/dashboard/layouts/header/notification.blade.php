<div class="itmNvHDashboard" x-data="{ openNotificationHeader: false }" @mousedown.outside="openNotificationHeader = false">
    <button type="button" wire:click='loadNotificationsHeader' @click="openNotificationHeader = !openNotificationHeader" class="notifFieldDashboard block bg-gray-700 rounded-lg">
        <div class="flex items-center justify-center w-10 aspect-square cursor-pointer">
            <ag-icon class="text-sm text-gray-300">
                <i class="fas fa-bell"></i>
            </ag-icon>
        </div>
    </button>
    
    <div class="ctr-wrapperDetailNotifFieldDashboard transition-all duration-300 absolute right-0"
        :style="openNotificationHeader ? 'top: 100%; visibility: visible; opacity: 1;' : 'top: 75%; visibility: hidden; opacity: 0;'"
        style="top: 75%; visibility: hidden; opacity: 0"
        style="display: none;"
        >
        
        <div class="ctr-detailNotifFieldDashboard mt-4 w-[26rem] h-60 p-2 bg-gradient-to-b from-[#202D49] to-gray-700 rounded-xl">
            <div class="cDetailNotifFieldDashboard bg-white ">
                @if ($loadedNotification)
                    <ul class="lstNotification" wire:transition>
                        @forelse ($notificationsData as $notification)
                            <li class="p-2 border-b">{{ $notification->message }}</li>
                        @empty
                            <li class="p-2">No notifications</li>
                        @endforelse
                    </ul>
                @else
                    <div class="p-2 text-gray-400">Loading notifications...</div>
                @endif
            </div>
        </div>
    </div>
</div>