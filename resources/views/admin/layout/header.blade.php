<div class="cHeadMainDasboard flex flex-col-reverse lg:flex-row lg:items-center justify-between">
    <div class="txHead text-xl font-semibold">
        @php
            $defaultHead = 'Welcome back, ' . Auth::user()->UserDetail->name . '!';
        @endphp
        <div class="cTxHead">
            @yield('header-dashboard-content', $defaultHead)
        </div>
    </div>
    <nav class="ctr-navHeadDashboard">
        <div class="cNavHeadDashboard flex items-center justify-between lg:justify-normal gap-4">
            <div class="ctr-listNavHeadDashboard">
                <div class="cListNavHeadDashboard flex items-center gap-2">
                    <div class="itmNvHDash">
                        <div class="searchFieldDashboard flex lg:flex-row-reverse items-center w-auto border border-slate-900 rounded-full overflow-hidden transition-all focus-within:border-sky-600 focus-within:px-2">
                            <label for="searchSomeDashboard" class="lblInpSearch flex items-center justify-center w-8 aspect-square">
                                <div class="cLblInpSearch">
                                    <ag-icon>
                                        <i class="fas fa-magnifying-glass"></i>
                                    </ag-icon>
                                </div>
                            </label>
                            <input type="text" name="" id="searchSomeDashboard" placeholder="Search..." class="text-sm bg-transparent p-0 border-none ring-0 focus:border-none focus:ring-0 w-0 focus:w-auto">
                        </div>
                    </div>
                    <div class="itmNvHDash">
                        <div class="shwNotifDashboard">
                            <a class="block border border-slate-900 rounded-full overflow-hidden cursor-pointer">
                                <div class="cNotifIcon flex items-center justify-center w-8 aspect-square">
                                    <ag-icon>
                                        <i class="fas fa-bell"></i>
                                    </ag-icon>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ctr-profileDashboard">
                <div class="cProfileDashboard">
                    <a class="ctr-profileUser btn-actViewPopup block selectDisable p-1 rounded-xl hover:bg-slate-200 cursor-pointer">
                        <div class="cProfileUser flex items-center justify-between">
                            <div class="detProfileUser flex items-center gap-4">
                                <div class="cImageUser flex items-center justify-center w-12 p-1 aspect-square rounded-full overflow-hidden border-2 border-slate-900">
                                    <img src="{{ asset('assets/components/lg/Black - AuthenticGuardTechnology(no-bg[128]).svg') }}" alt="" class="w-full h-full object-center object-cover">
                                </div>
                                <div class="cNameUser w-44 break-all line-clamp-1 hidden md:block">
                                    <div class="txNme text-sm">
                                        <p>{{ Auth::user()->UserDetail->name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="shwDrpLstUser transition-all hidden md:block">
                                <ag-icon>
                                    <i class="fas fa-chevron-right"></i>
                                </ag-icon>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>

{{-- <div class="ctr-shwDetProfile bg-white w-64 absolute top-[115%] right-0 z-50 shadow-sm shadow-black/50 rounded-xl selectDisable">
    <div class="cShwDetProfile h-full">
        <header class="ctr-headerDetUserProfile">
            <div class="cHeaderDetUserProfile">
                <div class="ctr-topPhtProfileUser h-16 bg-blue-600 relative rounded-t-xl">
                    <div class="cTopPhtProfileUser">
                        <div class="ctr-photoContent block ml-2 absolute top-[150%] -translate-y-full group rounded-full">
                            <a class="cPhotoContent cbnViewProfileUser w-16 bg-white aspect-square flex items-center justify-center border-2 border-black rounded-full p-1 transition-all group-hover:brightness-75 cursor-pointer">
                                <img src="{{ asset('assets/components/lg/Black - AuthenticGuardTechnology(no-bg[128]).svg') }}" alt="" class="w-full object-cover object-center transition-all">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="ctr-lstBadgesUser ml-auto flex items-end justify-end flex-wrap p-2 w-fit">
                    <div class="cLstBadgesUser flex items-center justify-end flex-wrap gap-1 p-0.5 bg-gray-200 rounded-lg">
                        @for ($i = 0; $i < 5; $i++)
                            <div class="itmBadgesUser relative group/itemBadges">
                                <ag-icon class="w-6 aspect-square flex items-center justify-center rounded-full border border-black bg-white">
                                    <i class="fas fa-code"></i>
                                </ag-icon>
                                <div class="detWhatBadges bg-gray-300 absolute text-xs -top-full left-1/2 -translate-x-1/2 px-1 py-0.5 rounded-md hidden group-hover/itemBadges:block delay-150">
                                    <div class="txP">
                                        <p>Developer</p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </header>
        <div class="ctr-mainDetProfileUser px-4 pb-4 mt-2">
            <div class="cMainDetProfileUser">
                <div class="ctr-headNmeUserProfile">
                    <div class="cHeadNmeUserProfile">
                        <div class="txHeader flex items-center">
                            <p class="font-semibold">{{ Auth::user()->UserDetail->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="ctr-userSinceProfile mt-4">
                    <div class="cUserSinceProfile">
                        <div class="headSinceProfile">
                            <div class="txSince text-xs font-semibold">
                                <p>Member Since</p>
                            </div>
                        </div>
                        <div class="cSinceProfile mt-1 text-sm flex items-center gap-2">
                            <ag-icon class="w-5 aspect-square flex items-center justify-center border border-black rounded-full p-[2px]">
                                <img src="{{ asset('assets/components/lg/Black - AuthenticGuardTechnology(no-bg[32]).svg') }}" alt="" class="w-full object-cover object-center">
                            </ag-icon>
                            <div class="txSince">
                                <p>{{ Carbon\Carbon::parse(Auth::user()->created_at)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ctr-aboutUserProfile mt-4">
                    <div class="cAboutUserProfile">
                        <div class="ctr-txAboutUser">
                            <div class="cTxAboutUser text-gray-800 text-sm line-clamp-2">
                                <p>asonf oiqanbgfoi nqongfoiqnwoiqnwiofg nqwiofgn oiw iq gnw ngiwigwg wnowg ngoqgoinoi gigoqin gqwn qwngingoqngonw qoingqoi gqni gnionio qgn oi gnoiwn </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ctr-roleUserProfile mt-2">
                    <div class="cRoleUserProfile flex items-center flex-wrap gap-1 text-xs">
                        <div class="ctr-itmRoleUser group relative">
                            <div class="cItemRoleUser flex items-center gap-2 px-2 py-0.5 bg-gray-200 rounded-md">
                                <ag-icon class="text-red-600">
                                    <i class="fas fa-circle"></i>
                                </ag-icon>
                                <div class="txRole">
                                    <p>Administrator</p>
                                </div>
                            </div>
                            <div class="detSinceGetRoles bg-gray-300 absolute text-xs -top-[125%] left-1/2 -translate-x-1/2 px-1 py-0.5 rounded-md hidden group-hover:block delay-150">
                                <div class="txP">
                                    <p>{{ date('d/m/Y', mt_rand(1262055681, time())) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="ctr-itmRoleUser group relative">
                            <div class="cItemRoleUser flex items-center gap-2 px-2 py-0.5 bg-gray-200 rounded-md">
                                <ag-icon class="text-blue-600">
                                    <i class="fas fa-circle"></i>
                                </ag-icon>
                                <div class="txRole">
                                    <p>Client</p>
                                </div>
                            </div>
                            <div class="detSinceGetRoles bg-gray-300 absolute text-xs -top-[125%] left-1/2 -translate-x-1/2 px-1 py-0.5 rounded-md hidden group-hover:block delay-150">
                                <div class="txP">
                                    <p>{{ date('d/m/Y', mt_rand(1262055681, time())) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="ctr-footerDetUserProfile px-4 pb-2">
            <div class="cFooterDetUserProfile">
                <div class="ctr-viewOrEditUserProfile">
                    <div class="cViewOrEditUserProfile flex items-center gap-1 bg-gray-200 rounded-lg">
                        <div class="ctr-viewProfileUser flex-grow">
                            <div class="cViewProfileUser">
                                <a class="hrefItmDetUProfile cbnViewProfileUser cursor-pointer block w-full rounded-xl p-1 transition-all text-gray-500 hover:bg-blue-500 hover:text-white">
                                    <div class="cHrefItm flex items-center md:gap-2">
                                        <div class="icnItm w-8 aspect-square flex items-center justify-center">
                                            <span class="icn">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                        <div class="txtItm text-sm">
                                            <p>View profile</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="ctr-editProfileUser shrink-0">
                            <div class="cEditProfileUser">
                                <a class="hrefItmDetUProfile cursor-pointer block w-full rounded-xl p-1 transition-all text-gray-500 hover:bg-blue-500 hover:text-white">
                                    <div class="cHrefItm flex items-center md:gap-2">
                                        <div class="icnItm w-8 aspect-square flex items-center justify-center">
                                            <span class="icn">
                                                <i class="fas fa-gear"></i>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ctr-logoutDetProfileUser mt-1">
                    <div class="clogoutDetProfileUser">
                        <button type="button" class="btnLogout block w-full rounded-xl p-1 transition-all text-gray-500 hover:bg-red-600 hover:text-white cursor-pointer">
                            <div class="cBtnLogout  flex items-center md:gap-2">
                                <div class="icnItm w-8 aspect-square flex items-center justify-center">
                                    <span class="icn">
                                        <i class="fas fa-right-from-bracket"></i>
                                    </span>
                                </div>
                                <div class="txtItm text-sm">
                                    <p>Logout</p>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div> --}}