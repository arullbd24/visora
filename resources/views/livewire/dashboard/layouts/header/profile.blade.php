<div class="itmNvHDashboard sm:ml-8 max-[425px]:hidden" x-data="{ openProfileHeader: false }" @mousedown.outside="openProfileHeader = false">
    
    <div class="userDetailFieldDashboard text-white flex items-center gap-2">
        <div class="dataUserField -space-y-1 text-right w-32 hidden sm:block select-none">
            <div class="txNmeUser text-lg font-bold break-all line-clamp-1">
                <p>{{ auth()->user()->firstname() }}</p>
            </div>
            <div class="txUsrnmeUser text-[0.8rem] break-all line-clamp-1">
                <p>{{ auth()->user()->username }}</p>
            </div>
        </div>
        <button type="button" class="imgUserField block" @click="openProfileHeader = !openProfileHeader">
            <ag-image class="rounded-full bg-gray-700 p-0.5">
                <ag-image-content class="size-14 aspect-square overflow-hidden rounded-full">
                    <img src="{{ asset('assets/img/visora..png') }}" alt="" class="size-full object-cover object-center" >
                </ag-image-content>
            </ag-image>
        </button>
    </div>
    
    {{-- <div class="ctr-wrapperDetailProfileDashboard transition-all duration-300 absolute top-full" --}}
    <div class="ctr-wrapperDetailProfileDashboard transition-all duration-300 absolute top-full"
        :style="openProfileHeader ? 'right: 1rem; visibility: visible; opacity: 1;' : 'right: -100%; visibility: hidden; opacity: 0;'"
        style="right: -100%; visibility: hidden; opacity: 0"
        >
        
        <div class="cWrapperDetailProfileDashboard">
            <div class="ctr-detailProfileDashboard mt-1 w-[26rem] bg-gradient-to-b from-[#202D49] to-gray-700 rounded-xl overflow-hidden">
                <div class="cDetailProfileDashboard">
                    <div class="ctr-headWrapperDetail mt-2 p-2">
                        <div class="cHeadWrapperDetail pl-4">
                            <div class="txHead text-gray-300 tracking-wide">
                                <p>PROFILE</p>
                            </div>
                        </div>
                    </div>
                    <div class="ctr-profileDataWrapperDetail  mt-2 p-2">
                        <div class="cProfileDataWrapperDetail flex items-center gap-2 p-2 bg-gray-900 rounded-xl select-none">
                            <div class="avatarProfile">
                                <ag-avatar class="rounded-full bg-gray-700 p-0.5 w-fit">
                                    <ag-avatar-content class="size-14 aspect-square overflow-hidden rounded-full">
                                        <img src="{{ asset('assets/img/visora..png') }}" alt="" class="size-full object-cover object-center" >
                                    </ag-avatar-content>
                                </ag-avatar>
                            </div>
                            <div class="dataProfile -space-y-1">
                                <div class="txNameProfile text-gray-300">
                                    <p>{{ auth()->user()->userPersonal->fullname }}</p>
                                </div>
                                <div class="txUsernameProfile text-sm text-gray-500">
                                    <p>{{ auth()->user()->username }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ctr-mainWrapperDetail mt-2 ">
                        <div class="cMainWrapperDetail pl-4">
                            @php
                                $LstNavAside = [
                                    (object) array(
                                        'titleNav' => 'document',
                                        'icon' => 'fas fa-file',
                                        'routeNav' => route('documents.main'),
                                        'activeRoute' => 'documents.main',
                                        'wireNavigate' => true,
                                    ),
                                    (object) array(
                                        'titleNav' => 'account',
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
                                ];
                                
                            @endphp
        
                            @foreach ($LstNavAside as $itmNavAside)
                                <div class="itmNvWrappDetDash">
                                    <a href="{{ $itmNavAside->routeNav }}" class="{{ $itmNavAside->titleNav }}FieldDashboard block p-1 text-gray-300 rounded-lg overflow-hidden relative transition-all group hover:text-white" {{ $itmNavAside->wireNavigate ? 'wire:navigate' : '' }}>
                                        <div class="c{{ ucfirst($itmNavAside->titleNav) }}FieldDashboard flex items-center gap-2">
                                            {{-- <div class="icnHome size-8 flex items-center justify-center">
                                                <ag-icon class="text-lg text-center">
                                                    <i class="{{ $itmNavAside->icon }}"></i>
                                                </ag-icon>
                                            </div> --}}
                                            <div class="txLblAction">
                                                <p>{{ ucfirst($itmNavAside->titleNav) }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="logoutWrapperDetail mt-4">
                        <a href="" class="logoutFieldHeaderDashboard block p-2 rounded-lg overflow-hidden relative transition-all group text-red-400 hover:bg-gray-600" {{ $itmNavAside->wireNavigate ? 'wire:navigate' : '' }}>
                            <div class="cLogoutFieldHeaderDashboard flex items-center gap-2">
                                <div class="icnHome size-8 flex items-center justify-center">
                                    <ag-icon class="text-lg text-center">
                                        <i class="fas fa-right-from-bracket"></i>
                                    </ag-icon>
                                </div>
                                <div class="txLblAction">
                                    <a href class="{{ route('guest.main') }}">Logout</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="ctr-ballanceDetailProfileDashboard">
                <div class="cBallanceDetailProfileDashboard">
                    
                </div>
            </div>
        </div>
    </div>
</div>