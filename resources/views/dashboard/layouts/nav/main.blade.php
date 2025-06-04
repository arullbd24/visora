<div class="cNavAside overflow-auto overflow-c overflow-c-gray h-full overflow-c overflow-c-gray">
    <div class="mainNavAside">
        <div class="itmNvAside">
            <a href="{{ route('dashboard.main') }}"
                class="homeFieldDashboard block p-2 text-gray-300 rounded-lg overflow-hidden relative transition-all group {{ Route::is('dashboard.main') ? 'bg-gray-950 text-white' : 'hover:text-white' }}"
                role="link"
                aria-label="Navigate to Home Dashboard"
                wire:navigate>
                
                <div class="cHomeFieldDashboard flex items-center gap-4">
                    <div class="icnHomeDashboard size-8 flex items-center justify-center" role="img" aria-label="Icon Home Dashboard">
                        <ag-icon class="text-lg text-center">
                            <i class="fas fa-house"></i>
                        </ag-icon>
                    </div>
                    <div class="txLblAction text-sm hidden xl:block">
                        <p>Home</p>
                    </div>
                </div>
                <div class="stickActive w-1 h-3/4 rounded-full bg-[#FFD700]/60 absolute left-0 top-1/2 -translate-y-1/2 transition-all {{ Route::is('dashboard.main') ? '' : 'hidden' }}"></div>
            </a>
        </div>
    </div>
    
    
    @php
        $LstNavGroupAside = [
            (object) array(
                'titleGroup' => 'general',
                'lstNavAside' => [
                    (object) array(
                        'titleNav' => 'inbox',
                        'icon' => 'fas fa-inbox',
                        'routeNav' => route('inbox.main'),
                        'activeRoute' => 'inbox',
                        'wireNavigate' => true,
                    ),
                    (object) array(
                        'titleNav' => 'documents',
                        'icon' => 'fas fa-book-open',
                        'routeNav' => route('documents.main'),
                        'activeRoute' => 'documents',
                        'wireNavigate' => true,
                    ),
                ],
            ),
            (object) array(
                'titleGroup' => 'settings',
                'lstNavAside' => [
                    (object) array(
                        'titleNav' => 'Account',
                        'icon' => 'fas fa-user',
                        'routeNav' => route('account.overview'),
                        'activeRoute' => 'account.overview',
                        'wireNavigate' => true,
                    ),
                    (object) array(
                        'titleNav' => 'settings',
                        'icon' => 'fas fa-gear',
                        'routeNav' => route('setting.overview'),
                        'activeRoute' => 'setting.overview',
                        'wireNavigate' => true,
                    ),
                ],
            ),
        ];
    @endphp
    
    @foreach ($LstNavGroupAside as $itmGroupNavAside)
        <div class="{{ $itmGroupNavAside->titleGroup }}NavAside mt-6">
            <div class="titleGroupNavAside select-none max-xl:hidden" 
                id="group-{{ $itmGroupNavAside->titleGroup }}" 
                role="heading" 
                aria-level="2" 
                aria-label="Menu Group: {{ ucfirst($itmGroupNavAside->titleGroup) }}">
                
                <div class="txTitle pl-4 text-sm text-gray-300 tracking-wide">
                    <p>{{ ucfirst($itmGroupNavAside->titleGroup) }}</p>
                </div>
            </div>
            <div class="lst{{ $itmGroupNavAside->titleGroup }}GroupNavAside mt-2 space-y-0.5">
                @foreach ($itmGroupNavAside->lstNavAside as $itmNavAside)
                    <div class="itmNvAside">
                        <a href="{{ $itmNavAside->routeNav }}"
                            class="{{ implode('', explode(' ', $itmNavAside->titleNav)) }}FieldDashboard block p-2 text-gray-300 rounded-lg overflow-hidden relative transition-all group {{ Str::contains(Route::currentRouteName(), $itmNavAside->activeRoute) ? 'bg-gray-950 text-white' : 'hover:text-white' }}"
                            role="link"
                            aria-label="Navigate to {{ ucwords($itmNavAside->titleNav) }}"
                            {{ $itmNavAside->wireNavigate ? 'wire:navigate' : '' }}>
                             
                            <div class="c{{ ucfirst($itmNavAside->titleNav) }}FieldDashboard flex items-center gap-4">
                                <div class="icn{{ ucfirst(implode('', explode(' ', $itmNavAside->titleNav))) }} size-8 flex items-center justify-center" role="img" aria-label="Icon {{ ucwords($itmNavAside->titleNav) }}">
                                    <ag-icon class="text-lg text-center">
                                        <i class="{{ $itmNavAside->icon }}"></i>
                                    </ag-icon>
                                </div>
                                <div class="txLblAction text-sm hidden xl:block">
                                    <p>{{ ucfirst($itmNavAside->titleNav) }}</p>
                                </div>
                            </div>
                            {{-- @if (Route::is($itmNavAside->activeRoute))
                                <div class="stickActive w-1 h-3/4 rounded-full bg-[#FFD700]/60 absolute left-0 top-1/2 -translate-y-1/2 transition-all"></div>
                            @endif --}}
                            <div class="stickActive w-1 h-3/4 rounded-full bg-[#FFD700]/60 absolute left-0 top-1/2 -translate-y-1/2 transition-all {{ Str::contains(Route::currentRouteName(), $itmNavAside->activeRoute) ? '' : 'hidden' }}"></div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        
    @endforeach
    
    
    {{-- @php
        $LstNavAside = [
            // (object) array(
            //     'titleNav' => 'home',
            //     'icon' => 'fas fa-house',
            //     'routeNav' => route('dashboard.main'),
            //     'activeRoute' => 'dashboard.main',
            //     'wireNavigate' => true,
            // ),
            (object) array(
                'titleNav' => 'inbox',
                'icon' => 'fas fa-inbox',
                'routeNav' => route('inbox.main'),
                'activeRoute' => 'inbox.main',
                'wireNavigate' => true,
            ),
            // (object) array(
            //     'titleNav' => 'sent',
            //     'icon' => 'fas fa-file-export',
            //     'routeNav' => route('main.signature\main'),
            //     'activeRoute' => 'main.signature\main',
            //     'wireNavigate' => true,
            // ),
            // (object) array(
            //     'titleNav' => 'draft',
            //     'icon' => 'fas fa-file-pen',
            //     'routeNav' => route('main.signature\main'),
            //     'activeRoute' => 'main.signature\main',
            //     'wireNavigate' => true,
            // ),
            // (object) array(
            //     'titleNav' => 'completed',
            //     'icon' => 'fas fa-file-circle-check',
            //     'routeNav' => route('main.signature\main'),
            //     'activeRoute' => 'main.signature\main',
            //     'wireNavigate' => true,
            // ),
            (object) array(
                'titleNav' => 'documents',
                'icon' => 'fas fa-book-open',
                'routeNav' => route('main.documents\main'),
                'activeRoute' => 'main.documents\main',
                'wireNavigate' => true,
            ),
            (object) array(
                'titleNav' => 'Profile',
                'icon' => 'fas fa-user',
                'routeNav' => route('main.documents\main'),
                'activeRoute' => 'main.documents\main',
                'wireNavigate' => true,
            ),
            (object) array(
                'titleNav' => 'settings',
                'icon' => 'fas fa-gear',
                'routeNav' => route('main.documents\main'),
                'activeRoute' => 'main.documents\main',
                'wireNavigate' => true,
            ),
        ];
        
    @endphp

    @foreach ($LstNavAside as $itmNavAside)
        <div class="itmNvAside">
            <a href="{{ $itmNavAside->routeNav }}" class="{{ $itmNavAside->titleNav }}FieldDashboard block p-2 text-gray-300 rounded-lg overflow-hidden relative transition-all group {{ Route::is($itmNavAside->activeRoute) ? 'bg-gray-950 text-white' : 'hover:text-white' }}" {{ $itmNavAside->wireNavigate ? 'wire:navigate' : '' }}>
                <div class="c{{ ucfirst($itmNavAside->titleNav) }}FieldDashboard flex items-center gap-4">
                    <div class="icnHome size-8">
                        <ag-icon class="text-lg text-center">
                            <i class="{{ $itmNavAside->icon }}"></i>
                        </ag-icon>
                    </div>
                    <div class="txLblAction text-sm hidden xl:block">
                        <p>{{ ucfirst($itmNavAside->titleNav) }}</p>
                    </div>
                </div>
                @if (Route::is($itmNavAside->activeRoute))
                    <div class="stickActive w-1 h-3/4 rounded-full bg-[#FFD700]/60 absolute left-0 top-1/2 -translate-y-1/2 transition-all"></div>
                @endif
                <div class="stickActive w-1 h-3/4 rounded-full bg-[#FFD700]/60 absolute left-0 top-1/2 -translate-y-1/2 transition-all {{ Route::is($itmNavAside->activeRoute) ? '' : 'hidden' }}"></div>
            </a>
        </div>
    @endforeach --}}
</div>