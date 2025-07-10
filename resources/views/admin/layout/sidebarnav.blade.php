@php
    $nowPath = url()->current();
    $ssPath = explode('/', $nowPath);
    $URLPath = explode('/', $nowPath);
    $urlChoosed = end($ssPath);
    
    $ifChoosedAHref = "bg-blue-700 text-white";
    $ifNotChoosedAHref = "text-white/80 hover:bg-blue-700 hover:text-white";
@endphp

<div class="ctr-headerSidebarLogoApps shrink-0 w-full px-2 py-1">
    <div class="cHeaderSidebarLogoApps flex items-center {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'justify-center md:justify-normal' : 'justify-center') }} md:gap-2">
        <div class="imgLogoApps">
            <div class="cImg w-16 aspect-square relative">
                <img src="{{ asset('assets/components/lg/AuthenticGuardTechnology(no-bg[128]).svg') }}" fill="black" alt="" class="w-full h-full rounded-[100%] object-cover object-center">
            </div>
        </div>
        <div class="nmeLogoApps {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'hidden md:block' : 'hidden') }} text-white">
            <div class="txApps flex items-center">
                <div class="txF font-semibold">
                    <p>Visora</p>
                </div>
                <div class="txS">
                    <p>Dashboard</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ctr-navDashboard mt-2 2xl:mt-6 h-full px-4 py-1 xl:py-2 2xl:py-4 overflow-y-auto overflow-x-hidden overflow-c overflow-c-gray">
    <div class="cNavDashboard h-full flex flex-col">
        <div class="ctr-lstNavDashboard h-full">
            <div class="cLstNavDashboard">
                <div class="ctr-mainLstNavDashboard">
                    <div class="cMainLstNavDashboard space-y-1 p-2">
                        <div class="itmNavDashboard group relative">
                            <a href="{{ route('dashboard') }}" class="hrefItmNav block w-full rounded-xl px-2 py-1 2xl:py-2 transition-all {{ ($urlChoosed === 'dashboard' ? $ifChoosedAHref : $ifNotChoosedAHref) }}">
                                <div class="cHrefItm flex items-center justify-center md:justify-normal md:gap-2">
                                    <div class="icnItm w-8 aspect-square flex items-center justify-center">
                                        <span class="icn">
                                            <i class="fas fa-house"></i>
                                        </span>
                                    </div>
                                    <div class="txtItm {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'hidden md:block' : 'hidden') }} text-sm">
                                        <p>Dashboard</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="itmNavDashboard">
                            <a class="hrefItmNav cursor-pointer block w-full rounded-xl px-2 py-1 2xl:py-2 transition-all {{ ($urlChoosed === 'clients' ? $ifChoosedAHref : $ifNotChoosedAHref) }}">
                                <div class="cHrefItm flex items-center justify-center md:justify-normal md:gap-2">
                                    <div class="icnItm w-8 aspect-square flex items-center justify-center">
                                        <span class="icn">
                                            <i class="fas fa-users"></i>
                                        </span>
                                    </div>
                                    <div class="txtItm {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'hidden md:block' : 'hidden') }} text-sm">
                                        <p>Client</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="itmNavDashboard">
                            <a href="{{ route('dashboard\product') }}" class="hrefItmNav cursor-pointer block w-full rounded-xl px-2 py-1 2xl:py-2 transition-all {{ ((array_search('products', $URLPath)) ? $ifChoosedAHref : $ifNotChoosedAHref) }}">
                                <div class="cHrefItm flex items-center justify-center md:justify-normal md:gap-2">
                                    <div class="icnItm w-8 aspect-square flex items-center justify-center">
                                        <span class="icn">
                                            <i class="fas fa-cubes"></i>
                                        </span>
                                    </div>
                                    <div class="txtItm {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'hidden md:block' : 'hidden') }} text-sm">
                                        <p>Product</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="itmNavDashboard">
                            <a href="{{ route('dashboard\operational') }}" class="hrefItmNav cursor-pointer block w-full rounded-xl px-2 py-1 2xl:py-2 transition-all {{ ((array_search('operational', $URLPath)) ? $ifChoosedAHref : $ifNotChoosedAHref) }}">
                                <div class="cHrefItm flex items-center justify-center md:justify-normal md:gap-2">
                                    <div class="icnItm w-8 aspect-square flex items-center justify-center">
                                        <span class="icn">
                                            <i class="fas fa-briefcase"></i>
                                        </span>
                                    </div>
                                    <div class="txtItm {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'hidden md:block' : 'hidden') }} text-sm">
                                        <p>Operational</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="itmNavDashboard">
                            <a href="{{ route('dashboard\marketing') }}" class="hrefItmNav cursor-pointer block w-full rounded-xl px-2 py-1 2xl:py-2 transition-all {{ ($urlChoosed === 'marketing' ? $ifChoosedAHref : $ifNotChoosedAHref) }}">
                                <div class="cHrefItm flex items-center justify-center md:justify-normal md:gap-2">
                                    <div class="icnItm w-8 aspect-square flex items-center justify-center">
                                        <span class="icn">
                                            <i class="fas fa-chart-column"></i>
                                        </span>
                                    </div>
                                    <div class="txtItm {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'hidden md:block' : 'hidden') }} text-sm">
                                        <p>Marketing</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="itmNavDashboard">
                            <a class="hrefItmNav cursor-pointer block w-full rounded-xl px-2 py-1 2xl:py-2 transition-all {{ ($urlChoosed === '...' ? $ifChoosedAHref : $ifNotChoosedAHref) }}">
                                <div class="cHrefItm flex items-center justify-center md:justify-normal md:gap-2">
                                    <div class="icnItm w-8 aspect-square flex items-center justify-center">
                                        <span class="icn">
                                            <i class="fas fa-basket-shopping"></i>
                                        </span>
                                    </div>
                                    <div class="txtItm {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'hidden md:block' : 'hidden') }} text-sm">
                                        <p>Sales</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="itmNavDashboard">
                            <a class="hrefItmNav cursor-pointer block w-full rounded-xl px-2 py-1 2xl:py-2 transition-all {{ ($urlChoosed === '...' ? $ifChoosedAHref : $ifNotChoosedAHref) }}">
                                <div class="cHrefItm flex items-center justify-center md:justify-normal md:gap-2">
                                    <div class="icnItm w-8 aspect-square flex items-center justify-center">
                                        <span class="icn">
                                            <i class="fas fa-sack-dollar"></i>
                                        </span>
                                    </div>
                                    <div class="txtItm {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'hidden md:block' : 'hidden') }} text-sm">
                                        <p>Finance</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="itmNavDashboard">
                            <a class="hrefItmNav cursor-pointer block w-full rounded-xl px-2 py-1 2xl:py-2 transition-all {{ ($urlChoosed === '...' ? $ifChoosedAHref : $ifNotChoosedAHref) }}">
                                <div class="cHrefItm flex items-center justify-center md:justify-normal md:gap-2">
                                    <div class="icnItm w-8 aspect-square flex items-center justify-center">
                                        <span class="icn">
                                            <i class="fas fa-chart-pie"></i>
                                        </span>
                                    </div>
                                    <div class="txtItm {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'hidden md:block' : 'hidden') }} text-sm">
                                        <p>Accounting</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="ctr-toolsNavDashboard mt-2 md:mt-4 2xl:mt-8">
                    <div class="cToolsNavDashboard">
                        <div class="cHeadToolsNDashboard">
                            <div class="txHead text-sm text-white/80">
                                <p>Tools</p>
                            </div>
                        </div>
                        <div class="ctr-toolsLstNavDashboard">
                            <div class="cToolsLstNavDashboard space-y-1 p-2">
                                <div class="itmNavDashboard">
                                    <a href="{{ route('dashboard\setting') }}" class="hrefItmNav block w-full rounded-xl px-2 py-1 2xl:py-2 transition-all {{ ((array_search('settings', $URLPath)) ? $ifChoosedAHref : $ifNotChoosedAHref) }}">
                                        <div class="cHrefItm flex items-center justify-center md:justify-normal md:gap-2">
                                            <div class="icnItm w-8 aspect-square flex items-center justify-center">
                                                <span class="icn">
                                                    <i class="fas fa-gear"></i>
                                                </span>
                                            </div>
                                            <div class="txtItm {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'hidden md:block' : 'hidden') }} text-sm">
                                                <p>Settings</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="itmNavDashboard group">
                                    <div class="hrefItmNav block transition-all rounded-xl group-hover:text-">
                                        <div class="cHrefItm">
                                            <div class="ctr-headHrefItm block w-full rounded-xl px-2 py-1 2xl:py-2 transition-all cursor-pointer {{ ($urlChoosed === '...' ? $ifChoosedAHref : $ifNotChoosedAHref) }}">
                                                <div class="cHeadHrefItm  flex items-center justify-between">
                                                    <div class="txManage flex items-center justify-center md:justify-normal md:gap-2">
                                                        <div class="icnItm w-8 aspect-square flex items-center justify-center">
                                                            <span class="icn">
                                                                <i class="fas fa-user-group"></i>
                                                            </span>
                                                        </div>
                                                        <div class="txtItm {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'hidden md:block' : 'hidden') }} text-sm">
                                                            <p>Manage User</p>
                                                        </div>
                                                    </div>
                                                    <div class="dropdownShwLstItm transition-all {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'hidden md:block' : 'hidden') }}">
                                                        <span class="icon">
                                                            <i class="fas fa-chevron-right"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ctr-lstDetSubNavDashboard {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'md:ml-2' : 'flex items-center justify-center') }} hidden">
                                                <div class="cLstDetSubNavDashboard">
                                                    <div class="itmDetSubNavDashboard">
                                                        <a href="{{ route('dashboard\user') }}" class="block w-full rounded-xl p-1 transition-all cursor-pointer {{ ($urlChoosed === 'users' ? $ifChoosedAHref : $ifNotChoosedAHref) }}">
                                                            <div class="cHrefTo flex items-center justify-center md:justify-normal md:gap-2">
                                                                <div class="icnItm w-8 aspect-square flex items-center justify-center">
                                                                    <span class="icn">
                                                                        <i class="fas fa-user"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="txtItm {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'hidden md:block' : 'hidden') }} text-sm">
                                                                    <p>User</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="itmDetSubNavDashboard">
                                                        <a href="{{ route('dashboard\user\roles') }}" class="block w-full rounded-xl p-1 transition-all cursor-pointer {{ ($urlChoosed === 'roles' ? $ifChoosedAHref : $ifNotChoosedAHref) }}">
                                                            <div class="cHrefTo flex items-center justify-center md:justify-normal md:gap-2">
                                                                <div class="icnItm w-8 aspect-square flex items-center justify-center">
                                                                    <span class="icn">
                                                                        <i class="fas fa-shield"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="txtItm {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'hidden md:block' : 'hidden') }} text-sm">
                                                                    <p>Roles</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cNavBottomDashboard shrink-0 p-2 sticky bottom-0">
    <div class="cNavBottonDashboard">
        <div class="ctr-navLogoutDashboard">
            <div class="cNavLogoutDashboard">
                <button type="button" class="btnLogout btn-actViewPopup flex items-center {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'justify-center md:justify-normal' : 'justify-center') }} w-full rounded-xl p-1 transition-all text-white/80 hover:bg-blue-800 hover:text-white cursor-pointer">
                    <div class="cBtnLogout  flex items-center justify-center md:justify-normal md:gap-2">
                        <div class="icnItm w-8 aspect-square flex items-center justify-center">
                            <span class="icn">
                                <i class="fas fa-right-from-bracket"></i>
                            </span>
                        </div>
                        <div class="txtItm {{ ((array_search('dashboard', $URLPath) || array_search('users', $URLPath)) ? 'hidden md:block' : 'hidden') }} text-sm">
                            <p>Logout</p>
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>