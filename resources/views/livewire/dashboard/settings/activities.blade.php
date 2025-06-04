<div class="activity-history-container  mx-auto p-6 bg-white rounded-lg border border-gray-200 shadow-sm">
    <h2 class="text-2xl font-semibold mb-6 text-gray-900">Activity History</h2>

    <ul class="activity-list space-y-6">
        <!-- Activity Item 1 -->
        @php
            $lst_activity = [
                (object) array( 
                    'title' => 'Signed Document XYZ.pdf',
                    'date_activity' => date('d-m-Y'),
                    'date_time' => date('H:i'),
                    'icon' => 'fas fa-pen',
                    'action' => 'Signed the document using an electronic signature.',
                ),
                (object) array( 
                    'title' => 'Created Account',
                    'date_activity' => date('d-m-Y'),
                    'date_time' => date('H:i'),
                    'icon' => 'fas fa-check',
                    'action' => 'Signed the document using an electronic signature.',
                    
                ),
            ];
            
            $lst_platform = [
                'Web (Google Chrome)',
                'Web (Android Chrome)',
                'Web (Mozilla)',
                'Web (Duckduck Go)',
                'Web (Ios Safari)',
                'Web (Firefox)',
            ];
        @endphp
        
        @for ($i = 0; $i < 5; $i++)
            @php
                $activity = $lst_activity[rand(0 , count($lst_activity) - 1)];
            @endphp
            <li class="activity-item border-b border-gray-200 pb-4">
                <div class="w-full flex justify-between items-center text-left">
                    <div class="activity-detail flex items-center space-x-4">
                        
                        <div>
                            <p class="font-medium text-gray-800">{{ $activity->title }}</p>
                            <p class="text-sm text-gray-500">{{ $activity->date_activity }}</p>
                        </div>
                    </div>
                    <div class="">
                        <p class="text-sm text-gray-600">{{ $activity->date_time }}</p>
                        <button onclick="toggleDetails('activity-{{ $i }}')" class="w-full flex items-center justify-end group">
                            <ag-icon class="text-gray-600 group-hover:text-black">
                                <i class="fas fa-eye"></i>
                            </ag-icon>
                        </button>
                    </div>
                </div>

                <!-- Dropdown Details -->
                <div id="activity-{{ $i }}" class="activity-details hidden mt-4 p-4 bg-gray-50 rounded-md">
                    <p class="text-sm text-gray-700"><strong>Action:</strong> {{ $activity->action }}</p>
                    <p class="text-sm text-gray-700"><strong>Date & Time:</strong>{{ $activity->date_activity  }}, {{ $activity->date_time  }}</p>
                    <p class="text-sm text-gray-700"><strong>Platform:</strong>{{ $lst_platform[rand(0, count($lst_platform) - 1 )] }}</p>
                </div>
            </li>
            {{-- @foreach ($lst_activity as $activity )
                <li class="activity-item border-b border-gray-200 pb-4">
                    <button onclick="toggleDetails('activity-1')" class="w-full flex justify-between items-center text-left">
                        <div class="activity-detail flex items-center space-x-4">
                            <div class="activity-icon bg-gray-200 h-7 w-7 rounded-full flex items-center justify-center text-black">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9M16.5 3.5l-11 11a2.828 2.828 0 00-.75 1.54l-.75 3.75a1 1 0 001.13 1.13l3.75-.75a2.828 2.828 0 001.54-.75l11-11a2.828 2.828 0 00-4-4z"/>
                                </svg>                         
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">{{ $activity->title }}</p>
                                <p class="text-sm text-gray-500">{{ $activity->date_activity }}</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600">{{ $activity->date_time }}</p>
                    </button>

                    <!-- Dropdown Details -->
                    <div id="activity-1" class="activity-details hidden mt-4 p-4 bg-gray-50 rounded-md">
                        <p class="text-sm text-gray-700"><strong>Action:</strong> Signed the document using an electronic signature.</p>
                        <p class="text-sm text-gray-700"><strong>Date & Time:</strong> 2024-10-01, 10:15 AM</p>
                        <p class="text-sm text-gray-700"><strong>Platform:</strong> Web (Google Chrome)</p>
                    </div>
                </li>
            @endforeach --}}
        @endfor
        {{-- <li class="activity-item border-b border-gray-200 pb-4">
            <button onclick="toggleDetails('activity-1')" class="w-full flex justify-between items-center text-left">
                <div class="activity-detail flex items-center space-x-4">
                    <div class="activity-icon bg-gray-200 h-7 w-7 rounded-full flex items-center justify-center text-black">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9M16.5 3.5l-11 11a2.828 2.828 0 00-.75 1.54l-.75 3.75a1 1 0 001.13 1.13l3.75-.75a2.828 2.828 0 001.54-.75l11-11a2.828 2.828 0 00-4-4z"/>
                        </svg>                        
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Signed Document XYZ.pdf</p>
                        <p class="text-sm text-gray-500">2024-10-01</p>
                    </div>
                </div>
                <p class="text-sm text-gray-600">10:15 AM</p>
            </button>

            <!-- Dropdown Details -->
            <div id="activity-1" class="activity-details hidden mt-4 p-4 bg-gray-50 rounded-md">
                <p class="text-sm text-gray-700"><strong>Action:</strong> Signed the document using an electronic signature.</p>
                <p class="text-sm text-gray-700"><strong>Date & Time:</strong> 2024-10-01, 10:15 AM</p>
                <p class="text-sm text-gray-700"><strong>Platform:</strong> Web (Google Chrome)</p>
            </div>
        </li>

        <!-- Activity Item 2 -->
        <li class="activity-item border-b border-gray-200 pb-4">
            <button onclick="toggleDetails('activity-2')" class="w-full flex justify-between items-center text-left">
                <div class="activity-detail flex items-center space-x-4">
                    <div class="activity-icon bg-gray-200 h-7 w-7 rounded-full flex items-center justify-center text-black">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9M16.5 3.5l-11 11a2.828 2.828 0 00-.75 1.54l-.75 3.75a1 1 0 001.13 1.13l3.75-.75a2.828 2.828 0 001.54-.75l11-11a2.828 2.828 0 00-4-4z"/>
                        </svg>                        
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Signed Document XYZ.pdf</p>
                        <p class="text-sm text-gray-500">2024-10-01</p>
                    </div>
                </div>
                <p class="text-sm text-gray-600">10:15 AM</p>
            </button>

            <!-- Dropdown Details -->
            <div id="activity-2" class="activity-details hidden mt-4 p-4 bg-gray-50 rounded-md">
                <p class="text-sm text-gray-700"><strong>Action:</strong> Signed the document using an electronic signature.</p>
                <p class="text-sm text-gray-700"><strong>Date & Time:</strong> 2024-10-01, 10:15 AM</p>
                <p class="text-sm text-gray-700"><strong>Platform:</strong> Web (Opera GX)</p>
            </div>
        </li> --}}
    




        
        <!-- Activity Item 3 -->
        {{-- <li class="activity-item border-b border-gray-200 pb-4">
            <button onclick="toggleDetails('activity-3')" class="w-full flex justify-between items-center text-left">
                <div class="activity-detail flex items-center space-x-4">
                    <div class="activity-icon bg-gray-200 h-7 w-7 rounded-full flex items-center justify-center text-black">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Created Account</p>
                        <p class="text-sm text-gray-500">2024-09-30</p>
                    </div>
                </div>
                <p class="text-sm text-gray-600">08:45 AM</p>
            </button>

            <!-- Dropdown Details -->
            <div id="activity-3" class="activity-details hidden mt-4 p-4 bg-gray-50 rounded-md">
                <p class="text-sm text-gray-700"><strong>Action:</strong> Created a new user account.</p>
                <p class="text-sm text-gray-700"><strong>Date & Time:</strong> 2024-09-30, 08:45 AM</p>
                <p class="text-sm text-gray-700"><strong>Platform:</strong> Mobile (iOS Safari)</p>
            </div>
        </li> --}}
    </ul>
</div>

@push('script-body-field')
    <script>
        function toggleDetails(id) {
            var element = document.getElementById(id);
            element.classList.toggle('hidden');
        }
    </script>
@endpush

