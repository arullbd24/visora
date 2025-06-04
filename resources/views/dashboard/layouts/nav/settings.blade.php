<div class="cNavAside overflow-auto overflow-c overflow-c-gray h-full overflow-c overflow-c-gray">
    <div class="mainNavAside">
        @php
            $LstNavAside = [
                (object) array(
                    'titleNav' => 'overview',
                    'icon' => 'fas fa-square-poll-vertical',
                    'routeNav' => route('setting.overview'),
                    'activeRoute' => 'setting.overview',
                    'wireNavigate' => true,
                ),
                (object) array(
                    'titleNav' => 'activities',
                    'icon' => 'fas fa-chart-line',
                    'routeNav' => route('setting.activies'),
                    'activeRoute' => 'setting.activies',
                    'wireNavigate' => true,
                ),
                (object) array(
                    'titleNav' => 'contacts',
                    'icon' => 'fas fa-address-book',
                    'routeNav' => route('setting.contacts'),
                    'activeRoute' => 'setting.contacts',
                    'wireNavigate' => true,
                ),
                (object) array(
                    'titleNav' => 'profile',
                    'icon' => 'fas fa-address-book',
                    'routeNav' => route('setting.profile.main'),
                    'activeRoute' => 'setting.profile.main',
                    'wireNavigate' => true,
                ),
            ];
            
        @endphp

        @foreach ($LstNavAside as $itmNavAside)
            <div class="itmNvAside">
                <a href="{{ $itmNavAside->routeNav }}"
                    class="{{ implode('', explode(' ', $itmNavAside->titleNav)) }}FieldDashboard block p-2 text-gray-300 rounded-lg overflow-hidden relative transition-all group {{ Route::is($itmNavAside->activeRoute) ? 'bg-gray-950 text-white' : 'hover:text-white' }}"
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
                    <div class="stickActive w-1 h-3/4 rounded-full bg-[#FFD700]/60 absolute left-0 top-1/2 -translate-y-1/2 {{ Route::is($itmNavAside->activeRoute) ? '' : 'hidden' }}"></div>
                </a>
            </div>
        @endforeach
    </div>
    
    @php
        $LstNavGroupAside = [
            (object) array(
                'titleGroup' => 'Signature & Intials',
                'lstNavAside' => [
                    (object) array(
                        'titleNav' => 'signature',
                        'icon' => 'fas fa-signature',
                        'routeNav' => route('setting.signature.main'),
                        'activeRoute' => 'setting.signature.main',
                        'wireNavigate' => true,
                    ),
                    (object) array(
                        'titleNav' => 'initials',
                        'icon' => 'fas fa-fingerprint',
                        'routeNav' => route('setting.initials.main'),
                        'activeRoute' => 'setting.initials.main',
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
                            class="{{ implode('', explode(' ', $itmNavAside->titleNav)) }}FieldDashboard block p-2 text-gray-300 rounded-lg overflow-hidden relative transition-all group {{ Route::is($itmNavAside->activeRoute) ? 'bg-gray-950 text-white' : 'hover:text-white' }}"
                            role="link"
                            aria-label="Navigate to {{ ucwords($itmNavAside->titleNav) }}"
                            {{ $itmNavAside->wireNavigate ? 'wire:navigate' : '' }}>
                            
                            <div class="c{{ ucfirst($itmNavAside->titleNav) }}FieldDashboard flex items-center gap-4">
                                <div class="icnHome size-8 flex items-center justify-center">
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
                @endforeach
            </div>
        </div>
        
    @endforeach
    
    <div class="goProfileNavAside mt-12">
        <div class="itmNvAside">
            <a href="{{ route('account.overview') }}"
                class="goProfileFieldDashboard block p-2 text-gray-300 rounded-lg overflow-hidden relative transition-all group border-2 border-gray-400"
                role="link"
                aria-label="Navigate to Profile"
                wire:navigate>
                
                <div class="cGoProfileFieldDashboard flex items-center justify-center gap-2">
                    <div class="txLblAction text-sm hidden xl:block">
                        <p>Account</p>
                    </div>
                    <div class="icnHome size-8 flex items-center justify-center">
                        <ag-icon class="text-lg text-center">
                            <i class="fas fa-arrow-up-right-from-square hidden xl:block"></i>
                            <i class="fas fa-user xl:hidden"></i>
                        </ag-icon>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>