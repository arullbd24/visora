<div>
    {{-- The whole world belongs to you. --}}
    <div class="ctr-accountInformation">
        <div class="cAccountInformation">
            <div class="txTitleAccInfo">
                <div class="txTitle text-2xl text-gray-900">
                    <strong class="font-semibold">Account Information</strong>
                </div>
            </div>
            {{-- Personal Info --}}
            <div class="ctr-personalAccountInformation mt-8">
                <div class="cPersonalAccountInformation">
                    <div class="txHeaderPersonalAccInfo">
                        <div class="txHead ">
                            <b class="font-normal">Personal</b>
                        </div>
                    </div>
                    <div class="ctr-dataPersonalAccountInformation">
                        <div class="cDataPersonalAccountInformation grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 py-2">
                            {{-- card personal --}}
                            <div class="itm-cardDataPersonalAccInfo bg-white rounded-lg shadow-md shadow-gray-200 border border-gray-200">
                                <div class="ctr-itmCardDataPersonalAccInfo select-none">
                                    <div class="cItmCardDataPersonalAccInfo flex items-center gap-2 h-36 p-2">
                                        <ag-image class="imgPersonal">
                                            <ag-image-content class="flex items-center justify-center overflow-hidden size-24 aspect-square rounded-xl">
                                                <img src="{{ asset('assets/img/visora..png') }}" alt="Image Profile" class="object-cover object-center">
                                            </ag-image-content>
                                        </ag-image>
                                        <div class="valueCardDataPersonalAccInfo">
                                            <div class="namePersonalAcc">
                                                <div class="txNme text-lg line-clamp-1 break-all">
                                                    <p>{{ auth()->user()->userPersonal->fullname }}</p>
                                                </div>
                                            </div>
                                            <div class="usernamePersonalAcc">
                                                <div class="txUsername text-sm text-gray-600">
                                                    <p>{{ auth()->user()->username }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- card contact --}}
                            <div class="itm-cardDataContactAccInfo bg-white rounded-lg shadow-md shadow-gray-200 border border-gray-200">
                                <div class="ctr-itmCardDataContactAccInfo select-none">
                                    <div class="cItmCardDataContactAccInfo h-36 p-2">
                                        <div class="txHeaderCard">
                                            <div class="txHead font-semibold">
                                                <p>Contact Information</p>
                                            </div>
                                        </div>
                                        <div class="valueCardDataContactAccInfo mt-2 space-y-1">
                                            <div class="itm-valueCardData flex gap-2">
                                                <div class="iconItmCard">
                                                    <ag-icon class="size-8 flex items-center justify-center">
                                                        <i class="fas fa-phone"></i>
                                                    </ag-icon>
                                                </div>
                                                <div class="valDataContact">
                                                    <div class="txLbl text-sm font-semibold text-gray-800">
                                                        <p>Phone Number</p>
                                                    </div>
                                                    <div class="txVal text-[0.925rem]">
                                                        <p>{{ auth()->user()->userPersonal->phone_number }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="itm-valueCardData flex gap-2">
                                                <div class="iconItmCard">
                                                    <ag-icon class="size-8 flex items-center justify-center">
                                                        <i class="fas fa-envelope"></i>
                                                    </ag-icon>
                                                </div>
                                                <div class="valDataContact">
                                                    <div class="txLbl text-sm font-semibold text-gray-800">
                                                        <p>Email Address</p>
                                                    </div>
                                                    <div class="txVal text-[0.925rem]">
                                                        <p>{{ auth()->user()->email }}</p>
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

            {{-- Profile Info --}}
            <div class="ctr-profileAccountInformation mt-8">
                <div class="cProfileAccountInformation">
                    <div class="txHeaderProfileAccInfo">
                        <div class="txHead ">
                            <b class="font-normal">Profile</b>
                        </div>
                    </div>
                    <div class="ctr-dataProfileAccountInformation">
                        <div class="cDataProfileAccountInformation grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 py-2">
                            {{-- card Profile --}}
                            <div class="itm-cardDataProfileAccInfo bg-white rounded-lg shadow-md shadow-gray-200 border border-gray-200 relative">
                                <div class="numberProfile absolute right-2 top-2 px-4 py-1 bg-green-200 rounded-xl">
                                    <div class=" text-xs text-green-600">
                                        <p>default</p>
                                    </div>
                                    {{-- <i class="fa-solid fa-1 text-xs bg-slate-300 rounded-full px-2 py-1"></i> --}}
                                </div>
                                <div class="ctr-itmCardDataProfileAccInfo select-none">
                                    <div class="cItmCardDataProfileAccInfo flex items-center gap-2 h-36 p-2">
                                        <ag-image class="imgProfile">
                                            <ag-image-content class="flex items-center justify-center overflow-hidden size-24 aspect-square rounded-xl">
                                                <img src="{{ asset('assets/img/visora..png') }}" alt="Image Profile" class="object-cover object-center">
                                            </ag-image-content>
                                        </ag-image>
                                        <div class="valueCardDataProfileAccInfo">
                                            <div class="nameProfileAcc flex items-center gap-2">
                                                <div class="iconTitle w-6 flex items-center">
                                                    <i class="fas fa-id-card"></i>
                                                </div>
                                                <div class="txNme text-sm line-clamp-1 break-all">
                                                    <p>{{ optional($user_profile)->profile_name }}</p>
                                                </div>
                                            </div>
                                            <div class="usernameProfileAcc flex items-center gap-2">
                                                <div class="iconTitle w-6 flex items-center">
                                                    <i class="fas fa-industry"></i>
                                                </div>
                                                <div class="txUsername text-sm">
                                                    <p>{{ optional($user_profile)->company }}</p>
                                                </div>
                                            </div>
                                            <div class="usernameProfileAcc flex items-center gap-2">
                                                <div class="iconTitle w-6 flex items-center">
                                                    <i class="fas fa-user-tie"></i>
                                                </div>
                                                <div class="txUsername text-sm">
                                                    <p>{{ optional($user_profile)->employment }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- card contact --}}
                            @for ($i = 0; $i < 1; $i++)
                                <div class="itm-cardDataProfileAccInfo bg-white rounded-lg shadow-md shadow-gray-200 border border-gray-200 relative">
                                    <div class="ctr-itmCardDataProfileAccInfo select-none">
                                        <div class="cItmCardDataProfileAccInfo flex items-center gap-2 h-36 p-2">
                                            <ag-image class="imgProfile">
                                                <ag-image-content class="flex items-center justify-center overflow-hidden size-24 aspect-square rounded-xl">
                                                    <img src="{{ asset('assets/img/visora..png') }}" alt="Image Profile" class="object-cover object-center">
                                                </ag-image-content>
                                            </ag-image>
                                            <div class="valueCardDataProfileAccInfo">
                                                <div class="nameProfileAcc flex items-center gap-2">
                                                    <div class="iconTitle w-6 flex items-center">
                                                        <i class="fas fa-id-card"></i>
                                                    </div>
                                                    <div class="txNme text-sm line-clamp-1 break-all">
                                                        <p>{{ optional($user_profile)->profile_name }}</p>
                                                    </div>
                                                </div>
                                                <div class="usernameProfileAcc flex items-center gap-2">
                                                    <div class="iconTitle w-6 flex items-center">
                                                        <i class="fas fa-industry"></i>
                                                    </div>
                                                    <div class="txUsername text-sm">
                                                        <p>{{ optional($user_profile)->company }}</p>
                                                    </div>
                                                </div>
                                                <div class="usernameProfileAcc flex items-center gap-2">
                                                    <div class="iconTitle w-6 flex items-center">
                                                        <i class="fas fa-user-tie"></i>
                                                    </div>
                                                    <div class="txUsername text-sm">
                                                        <p>{{ optional($user_profile)->employment }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
