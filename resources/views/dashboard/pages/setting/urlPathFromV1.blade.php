<div class="urlPathFromSettings flex flex-wrap gap-2 ml-4">
    <div class="mainDashboardPath flex items-center justify-center text-sm">
        <a href="{{ route('dashboard.main') }}" 
            class="dashboardPathFieldDashboard block group relative" 
            role="link"
            aria-label="Navigate to Home Dashboard"
            wire:navigate>
            
            <div class="cDashboardPathFieldDashboard">
                <div class="txLblAction">
                    <p>Dashboard</p>
                </div>
            </div>
            <i class="w-0 h-0.5 bg-[#FFD700] rounded-full transition-all duration-200 absolute left-1/2 -translate-x-1/2 -bottom-1 group-hover:w-3/4"></i>
        </a>
    </div>
    
    <div class="icnDividerPath size-8 flex items-center justify-center" role="img" aria-label="Icon Divider Path">
        <ag-icon class="text-center">
            <i class="fas fa-chevron-right"></i>
        </ag-icon>
    </div>
    
    <div class="mainSettingsPath flex items-center justify-center text-sm">
        <a href="{{ route('setting.overview') }}" 
            class="mainPathFieldSettings block group relative" 
            role="link"
            aria-label="Navigate to Setting Overview"
            wire:navigate>
            
            <div class="cSettingsPathFieldSettings">
                <div class="txLblAction">
                    <p>Settings</p>
                </div>
            </div>
            <i class="w-0 h-0.5 bg-[#FFD700] rounded-full transition-all duration-200 absolute left-1/2 -translate-x-1/2 -bottom-1 group-hover:w-3/4"></i>
        </a>
    </div>
    
    @if (!Str::contains(request()->route()->getName(), 'setting.overview'))
        @php
            $getRouteName = end(explode('.', request()->route()->getName()));
            $routeName = ucfirst(end($getRouteName));
        @endphp
        <div class="icnDividerPath size-8 flex items-center justify-center" role="img" aria-label="Icon Divider Path">
            <ag-icon class="text-center">
                <i class="fas fa-chevron-right"></i>
            </ag-icon>
        </div>
        
        <div class="nowPathIs-{{ end($getRouteName) }} flex items-center justify-center text-sm">
            <a href="{{ route(request()->route()->getName()) }}" 
                class="{{ end($getRouteName) }}PathFieldSettings block group relative"
                role="link"
                aria-label="Navigate to Setting {{ $routeName }}"
                wire:navigate>
                
                <div class="c{{ $routeName }}PathFieldSettings">
                    <div class="txLblAction">
                        <p>{{ $routeName }}</p>
                    </div>
                </div>
                
                <i class="w-0 h-0.5 bg-[#FFD700] rounded-full transition-all duration-200 absolute left-1/2 -translate-x-1/2 -bottom-1 group-hover:w-3/4"></i>
            </a>
        </div>
    @endif
    
</div>