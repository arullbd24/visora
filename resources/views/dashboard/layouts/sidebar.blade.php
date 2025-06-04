{{-- <header>
    <div class="cHeaderAside">
        <div class="ctr-logoAsideDashboard">
            <div class="cLogoAsideDashboard flex items-center gap-2">
                <ag-image class="ctr-logoAST">
                    <ag-image-content class="cLogoAst size-20">
                        <img src="{{ asset('components/icon/logo/logoD.svg') }}" alt="" class="size-full object-cover object-center">
                    </ag-image-content>
                </ag-image>
                <div class="nmeAsideDashboard text-white hidden xl:block">
                    <div class="txNme -space-y-2 select-none">
                        <div class="txAuthen text-lg tracking-wide">
                            <strong class="poppins-regular">Authentic</strong>
                        </div>
                        <div class="txSigna text-xl tracking-wider">
                            <strong class="poppins-semibold">Signature</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header> --}}

@if (Str::contains(request()->route()->getName(), ['dashboard', 'inbox', 'documents']))
    {{-- <div class="headUpDocumentAside px-2 py-4 mx-auto xl:w-3/4">
        <a href="{{ route('documents.upload\main') }}" class="ctr-actionAddDocSign flex items-center justify-center bg-[#FFD700] p-2 rounded-xl max-xl:size-16 max-xl:aspect-square xl:rounded-xl" wire:navigate>
            <div class="cActionAddDocSign flex items-center justify-center gap-4">
                <div class="icnUpDocument size-8 flex items-center justify-center" role="img" aria-label="Icon Up Docoment">
                    <ag-icon class="text-2xl text-center">
                        <i class="fas fa-arrow-up-from-bracket"></i>
                    </ag-icon>
                </div>
                <div class="txLblAction text-sm hidden xl:block">
                    <p>Upload Document</p>
                </div>
            </div>
        </a>
    </div> --}}
{{-- @else
    <div class="headBackHomeAside px-2 py-4 mx-auto xl:w-3/4">
        <a href="{{ route('dashboard.main') }}" class="ctr-backHomeAside flex items-center justify-center bg-[#FFD700] p-2 rounded-xl max-xl:size-16 max-xl:aspect-square xl:rounded-xl" wire:navigate>
            <div class="cBackHomeAside flex items-center justify-center gap-4 text-gray-700">
                <div class="icnHomeDashboard size-8 flex items-center justify-center" role="img" aria-label="Icon Home Dashboard">
                    <ag-icon class="text-2xl text-center">
                        <i class="fas fa-gauge"></i>
                    </ag-icon>
                </div>
                <div class="txLblAction text-sm hidden xl:block">
                    <p>Dashboard</p>
                </div>
            </div>
        </a>
    </div> --}}
@endif

{{-- <nav class="{{ Str::contains(request()->route()->getName(), 'main') ? 'xl:mt-4' : '' }} flex-grow p-2 bg-gray-800 rounded-xl"> --}}
<nav class="flex-grow p-2 bg-gray-900 rounded-t-xl">
    {{-- <div class="cNavAside space-y-0.5 h-full overflow-c overflow-c-gray">
        @php
            $LstNavAside = [
                (object) array(
                    'titleNav' => 'home',
                    'icon' => 'fas fa-house',
                    'routeNav' => route('dashboard.main'),
                    'activeRoute' => 'dashboard.main',
                    'wireNavigate' => true,
                ),
                (object) array(
                    'titleNav' => 'inbox',
                    'icon' => 'fas fa-inbox',
                    'routeNav' => route('inbox.main'),
                    'activeRoute' => 'inbox.main',
                    'wireNavigate' => true,
                ),
                (object) array(
                    'titleNav' => 'signature',
                    'icon' => 'fas fa-signature',
                    'routeNav' => route('main.signature\main'),
                    'activeRoute' => 'main.signature\main',
                    'wireNavigate' => true,
                ),
                (object) array(
                    'titleNav' => 'documents',
                    'icon' => 'fas fa-file',
                    'routeNav' => route('main.documents\main'),
                    'activeRoute' => 'main.documents\main',
                    'wireNavigate' => true,
                ),
                (object) array(
                    'titleNav' => 'settings',
                    'icon' => 'fas fa-gear',
                    'routeNav' => route('main.documents\main'),
                    'activeRoute' => 'main.documents\main',
                    'wireNavigate' => false,
                ),
            ];
            
        @endphp
        @foreach ($LstNavAside as $itmNavAside)
            <div class="itmNvAside">
                <a href="{{ $itmNavAside->routeNav }}" class="{{ $itmNavAside->titleNav }}FieldDashboard block p-2 text-gray-300 rounded-lg overflow-hidden relative transition-all group {{ Route::is($itmNavAside->activeRoute) ? 'bg-gray-900 text-white' : 'hover:text-white' }}" {{ $itmNavAside->wireNavigate ? 'wire:navigate' : '' }}>
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
        @endforeach
    </div> --}}
    @if (Str::contains(request()->route()->getName(), ['dashboard', 'documents', 'inbox', 'place_sign']))
        @livewire('Dashboard.Layouts.Nav.Main')
    @endif
    @if (Str::contains(request()->route()->getName(), 'setting'))
        @livewire('Dashboard.Layouts.Nav.Settings')
    @endif
    @if (Str::contains(request()->route()->getName(), 'account'))
        @livewire('Dashboard.Layouts.Nav.Account')
    @endif
</nav>

{{-- <div class="fooNavAside p-2 pt-4 flex-grow flex flex-col justify-end"> --}}
<div class="fooNavAside p-2 pt-4 bg-gray-900 shrink-0 h-48" wire:ignore>
    @livewire('Dashboard.Layouts.Sidebar.Logout')
    {{-- <a href="" class="ctr-actionLogout flex items-center max-xl:justify-center bg-transparent p-2 rounded-xl max-xl:size-16 max-xl:aspect-square xl:rounded-xl text-gray-300">
        <div class="cActionLogout flex items-center justify-center gap-4">
            <div class="icnLogout size-8 flex items-center justify-center" role="img" aria-label="Icon Logout">
                <ag-icon class="text-2xl text-center">
                    <i class="fas fa-arrow-right-from-bracket"></i>
                </ag-icon>
            </div>
            <div class="txLblAction text-sm hidden xl:block">
                <p>Logout</p>
            </div>
        </div>
    </a> --}}
</div>