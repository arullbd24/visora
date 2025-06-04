<div class="cNavAside overflow-auto overflow-c overflow-c-gray h-full overflow-c overflow-c-gray">
    <div class="mainNavAside">
        @php
            $LstNavAside = [
                (object) array(
                    'titleNav' => 'overview',
                    'icon' => 'fas fa-home',
                    'routeNav' => route('account.overview'),
                    'activeRoute' => 'account.overview',
                    'wireNavigate' => true,
                ),
                (object) array(
                    'titleNav' => 'account Information',
                    'icon' => 'fas fa-user',
                    'routeNav' => route('account.account\info'),
                    'activeRoute' => 'account.account\info',
                    'wireNavigate' => true,
                ),
                (object) array(
                    'titleNav' => 'security',
                    'icon' => 'fas fa-lock',
                    'routeNav' => route('account.security'),
                    'activeRoute' => 'account.security',
                    'wireNavigate' => true,
                ),
                // (object) array(
                //     'titleNav' => 'digital Certificate',
                //     'icon' => 'fas fa-file-circle-check',
                //     'routeNav' => route('account.certificate'),
                //     'activeRoute' => 'account.certificate',
                //     'wireNavigate' => true,
                // ),
            ];
            
        @endphp

        @foreach ($LstNavAside as $itmNavAside)
            <div class="itmNvAside">
                <a href="{{ $itmNavAside->routeNav }}"
                    class="{{ implode('', explode(' ', $itmNavAside->titleNav)) }}FieldDashboard block p-2 text-gray-300 rounded-lg overflow-hidden relative transition-all group {{ Route::is($itmNavAside->activeRoute) ? 'bg-gray-950 text-white' : 'hover:text-white' }}"
                    role="link"
                    aria-label="Navigate to {{ ucwords($itmNavAside->titleNav) }}"
                    {{ $itmNavAside->wireNavigate ? 'wire:navigate' : '' }}>
                    
                    <div class="c{{ ucfirst(implode('', explode(' ', $itmNavAside->titleNav))) }}FieldDashboard flex items-center gap-4">
                        <div class="icn{{ ucfirst(implode('', explode(' ', $itmNavAside->titleNav))) }} size-8 flex items-center justify-center" role="img" aria-label="Icon {{ ucwords($itmNavAside->titleNav) }}">
                            <ag-icon class="text-lg text-center">
                                <i class="{{ $itmNavAside->icon }}"></i>
                            </ag-icon>
                        </div>
                        <div class="txLblAction text-sm hidden xl:block">
                            <p>{{ ucwords($itmNavAside->titleNav) }}</p>
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
                'titleGroup' => 'Others',
                'lstNavAside' => [
                    (object) array(
                        'titleNav' => 'activity',
                        'icon' => 'fas fa-chart-line',
                        'routeNav' => route('account.others\activity'),
                        'activeRoute' => 'account.others\activity',
                        'wireNavigate' => true,
                    ),
                    // (object) array(
                    //     'titleNav' => 'digital Certificate',
                    //     'icon' => 'fas fa-file-circle-check',
                    //     'routeNav' => route('account.others\shared-data'),
                    //     'activeRoute' => 'account.others\shared-data',
                    //     'wireNavigate' => true,
                    // ),
                ],
            ),
        ];
    @endphp
    
    @foreach ($LstNavGroupAside as $itmGroupNavAside)
        <div class="{{ $itmGroupNavAside->titleGroup }}NavAside mt-6">
            {{-- Title Group --}}
            <div class="titleGroupNavAside select-none max-xl:hidden" 
                id="group-{{ $itmGroupNavAside->titleGroup }}" 
                role="heading" 
                aria-level="2" 
                aria-label="Menu Group: {{ ucfirst($itmGroupNavAside->titleGroup) }}">
                
                <div class="txTitle pl-4 text-sm text-gray-300 tracking-wide">
                    <p>{{ ucfirst($itmGroupNavAside->titleGroup) }}</p>
                </div>
            </div>
            
            {{-- List Navigation --}}
            <div class="lst{{ $itmGroupNavAside->titleGroup }}GroupNavAside mt-2 space-y-0.5">
                @foreach ($itmGroupNavAside->lstNavAside as $itmNavAside)
                    <div class="itmNvAside" role="listitem">
                        <a href="{{ $itmNavAside->routeNav }}"
                            class="{{ implode('', explode(' ', $itmNavAside->titleNav)) }}FieldDashboard block p-2 text-gray-300 rounded-lg overflow-hidden relative transition-all group {{ Route::is($itmNavAside->activeRoute) ? 'bg-gray-950 text-white' : 'hover:text-white' }}"
                            role="link"
                            aria-label="Navigate to {{ ucwords($itmNavAside->titleNav) }}"
                            {{ $itmNavAside->wireNavigate ? 'wire:navigate' : '' }}>
                            
                            <div class="c{{ ucfirst(implode('', explode(' ', $itmNavAside->titleNav))) }}FieldDashboard flex items-center gap-4">
                                <div class="icnHome size-8 flex items-center justify-center">
                                    <ag-icon class="text-lg text-center">
                                        <i class="{{ $itmNavAside->icon }}"></i>
                                    </ag-icon>
                                </div>
                                <div class="txLblAction text-sm hidden xl:block">
                                    <p>{{ ucwords($itmNavAside->titleNav) }}</p>
                                </div>
                            </div>
                            {{-- @if (Route::is($itmNavAside->activeRoute))
                                <div class="stickActive w-1 h-3/4 rounded-full bg-[#FFD700]/60 absolute left-0 top-1/2 -translate-y-1/2 transition-all"></div>
                            @endif --}}
                            <div class="stickActive w-1 h-3/4 rounded-full bg-[#FFD700]/60 absolute left-0 top-1/2 -translate-y-1/2 transition-all {{ Route::is($itmNavAside->activeRoute) ? '' : 'hidden' }}"></div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        
    @endforeach
    
    <div class="goSettingNavAside mt-12">
        <div class="itmNvAside">
            <a href="{{ route('setting.overview') }}"
                class="goSettingsFieldDashboard block p-2 text-gray-300 rounded-lg overflow-hidden relative transition-all group border-2 border-gray-400"
                role="link"
                aria-label="Navigate to Settings"
                wire:navigate>
                
                <div class="cGoSettingsFieldDashboard flex items-center justify-center gap-2">
                    <div class="txLblAction text-sm hidden xl:block">
                        <p>Settings</p>
                    </div>
                    <div class="icnHome size-8 flex items-center justify-center">
                        <ag-icon class="text-lg text-center">
                            <i class="fas fa-arrow-up-right-from-square hidden xl:block"></i>
                            <i class="fas fa-gear xl:hidden"></i>
                        </ag-icon>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>