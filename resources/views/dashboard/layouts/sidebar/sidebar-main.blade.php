<div class="cAsideNavDashboard h-full flex flex-col max-xl:items-center max-xl:justify-center pt-12 md:pt-14 lg:pt-16 xl:pt-20">
    {{-- <header>
        <div class="cHeaderAside">
            <div class="ctr-logoAsideDashboard">
                <div class="cLogoAsideDashboard flex items-center gap-2">
                    <ag-image class="ctr-logoAST">
                        <ag-image-content class="cLogoAst size-20">
                            <img src="{{ asset('components/icon/logo/logoD.svg/logoD.svg') }}" alt="" class="size-full object-cover object-center">
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
    @if (Str::contains(request()->route()->getName(), 'main'))
        <div class="headUpDocumentAside p-2 mx-auto xl:w-3/4">
            <a href="#" class="ctr-actionAddDocSign mt-6 flex items-center justify-center bg-[#FFD700] p-2 rounded-xl max-xl:size-16 max-xl:aspect-square xl:rounded-xl">
                <div class="cActionAddDocSign flex items-center justify-center gap-4">
                    <div class="icnUpDoc size-8">
                        <ag-icon class="text-2xl text-center">
                            <i class="fas fa-arrow-up-from-bracket"></i>
                        </ag-icon>
                    </div>
                    <div class="txLblAction text-sm hidden xl:block">
                        <p>Upload Document</p>
                    </div>
                </div>
            </a>
        </div>
    @endif
    
    <nav class="{{ Str::contains(request()->route()->getName(), 'main') ? 'xl:mt-12' : '' }} p-2 bg-gray-800 h-1/2 overflow-auto overflow-c overflow-c-gray">
        
        <div class="cNavAside space-y-0.5 h-full overflow-c overflow-c-gray">
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
                        'routeNav' => route('documents.main'),
                        'activeRoute' => 'documents.main',
                        'wireNavigate' => true,
                    ),
                    (object) array(
                        'titleNav' => 'settings',
                        'icon' => 'fas fa-gear',
                        'routeNav' => route('setting.activies'),
                        'activeRoute' => 'setting.activies',
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
                        {{-- @if (Route::is($itmNavAside->activeRoute))
                            <div class="stickActive w-1 h-3/4 rounded-full bg-[#FFD700]/60 absolute left-0 top-1/2 -translate-y-1/2 transition-all"></div>
                        @endif --}}
                        <div class="stickActive w-1 h-3/4 rounded-full bg-[#FFD700]/60 absolute left-0 top-1/2 -translate-y-1/2 transition-all {{ Route::is($itmNavAside->activeRoute) ? '' : 'hidden' }}"></div>
                    </a>
                </div>
            @endforeach
        </div>
    </nav>
    
    <div class="fooNavAside p-2 pt-4 flex-grow flex flex-col justify-end border border-white">
        <a href="" class="ctr-actionAddDocSign flex items-center bg-transparent p-2 rounded-xl max-xl:size-16 max-xl:aspect-square xl:rounded-xl text-gray-300">
            <div class="cActionAddDocSign flex items-center justify-center gap-4">
                <div class="icnUpDoc size-8">
                    <ag-icon class="text-2xl text-center">
                        <i class="fas fa-arrow-up-from-bracket"></i>
                    </ag-icon>
                </div>
                <div class="txLblAction text-sm hidden xl:block">
                    <p>Upload Document</p>
                </div>
            </div>
        </a>
    </div>
</div>

