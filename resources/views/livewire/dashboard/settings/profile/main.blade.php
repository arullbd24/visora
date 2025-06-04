<div x-data="{showPopup: @entangle('showPopup'), showSuccessPopup: @entangle('successMessage'), showEditPopup: @entangle('showEditPopup'), showSuccessEditPopup: @entangle('successMessageEdit'),
            profile_name: '', company: '', employment: ''}">
            {{-- @profile-edited.window="(e) => {
                profile_name = e.detail.profile_name;
                company = e.detail.company;
                employment = e.detail.employment;
            }"> --}}
    {{-- Stop trying to control. --}}
    <div class="ctr-headContact">
        <div class="cHeadContact flex items-center justify-between">  
            <div class="ctr-leftFlterHead">
                <div class="cLeftFlterHead flex items-center justify-end space-x-6">
                    <div class="ctr-titleHead">
                        <div class="cTitleHead">
                            <p class="text-2xl font-semibold text-gray-800">Profile Information</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ctr-rghtFlterHead">
                <div class="cRghtFlterHead flex items-center gap-2">
                    <div class="grpMoreActionDoto relative">
                        <button type="button" class="btnMoreActionDoto btn-sm flex items-center justify-center w-full rounded-md shadow-sm px-2 py-1 bg-indigo-400 text-sm font-medium text-white hover:bg-indigo-500 focus:outline-none">
                            <i class="fas fa-arrows-rotate text-lg text-white"></i>
                            <span class="flex items-center ml-2">Refresh</span>
                        </button>
                    </div>
                    <div class="grpMoreActionDoto relative">
                        <button type="button" class="btnMoreActionDoto btn-sm flex items-center justify-center w-full rounded-md shadow-sm px-2 py-2 bg-slate-400 text-sm font-medium text-white hover:bg-slate-500 focus:outline-none">
                            <span class="flex items-center ml-2">Name</span>
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                            </svg>
                        </button>
                        <div class="cShowMoreActionDoto btn-sm origin-top-right absolute right-1 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10 hidden">
                            <div class="py-1" role="none">
                                <label class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                    <span class="ml-2">Name</span>
                                </label>
                                <label class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                    <span class="ml-2">Phone Number</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="ctr-addContact">
                        <div class="cAddContact">
                            <button type="button" @click="showPopup = true" class="btnMoreActionDoto btn-sm flex items-center justify-center gap-2 w-full rounded-md shadow-sm px-2 py-2 bg-yellow-500 text-sm font-medium text-white focus:outline-none">
                                <span class="flex items-center ml-2">New Profile</span>
                                <i class="fas fa-user-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div x-show="showPopup" class="ctr-mainPopup fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
        <div class="cMainPopup relative p-5 bg-white rounded-md shadow-lg w-full max-w-lg">
            <div class="ctr-PopupHeader">
                <div class="cPopupHeader items-center justify-center w-full mb-5">
                    <div class="imgHeadPopup flex items-center justify-center">
                        <img src="{{ asset('components/icon/logo/logoD.svg') }}" alt="logo" class="size-20 object-cover object-center">
                    </div>
                    <div class="TitleHeadPopup text-center">
                        <p class="text-xl font-semibold">Please Your Enter Create New Profile is Here</p>
                    </div>
                </div>
                <div class="formInput">
                    <form  wire:submit.prevent="saveProfile" class="InputDataProfile w-full space-y-3">
                        <div class="NameProfile flex flex-col justify-center">
                            <label>Name Profile</label>
                            <input type="text" wire:model="profile_name" class="w-full text-xs rounded-md border-1 border-gray-300 required">
                        </div>
                        <div class="Company flex flex-col justify-center">
                            <label>Company</label>
                            <input type="text" wire:model="company" class="w-full text-xs rounded-md border-1 border-gray-300 required">
                        </div>
                        <div class="Employment flex flex-col justify-center">
                            <label>Employment</label>
                            <input type="text" wire:model="employment" class="w-full text-xs rounded-md border-1 border-gray-300 required">
                        </div>
                        <div class="ctr-buttonSubmitePlacement mt-5">
                            <div class="cButtonSubmitePlacement">
                                <div class="ButtonConfirm flex items-center justify-center gap-3">
                                    <div class="buttonPlacement">
                                        <button type="submit" class="w-28 bg-blue-500 hover:bg-blue-700 text-md text-white font-semibold rounded-md p-2">Add</button>
                                    </div>
                                    <div class="buttonCancel">
                                        <button @click="showPopup = false; $wire.resetForm()" class="w-28 bg-slate-500 hover:bg-slate-700 text-md text-white font-semibold rounded-md p-2">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>   
            </div>
        </div>
    </div>
    <!-- Popup Pesan Berhasil -->
    <div x-show="showSuccessPopup" class="ctr-mainPopup fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
        <div class="cMainPopup relative p-5 bg-white rounded-md shadow-lg w-full max-w-lg">
            <div class="TitleHeadPopup text-center">
                <p class="text-xl font-semibold text-green-500">Your Data Profile  Add Sucesfully!</p>
                <button @click="showSuccessPopup = false" class="mt-5 bg-blue-500 hover:bg-blue-700 text-white font-semibold p-2 rounded-md">Close</button>
            </div>
        </div>
    </div>
    <div class="ctr-mainItemProduct mt-5">
        <div class="cMainItemProduct">
            <div class="ctr-headMainItemProduct">
                <div class="cHeadMainItemProduct flex items-center justify-between w-full border-b p-2">
                    <div class="mainHeadItemProduct w-1/2 ml-5">
                        <h2 class="text-sm font-semibold text-slate-500">Name</h2>
                    </div>
                    <div class="priceDateHeadItemProduct shrink-0 flex-grow flex items-center justify-between text-sm text-center font-semibold text-slate-500">
                        <div class="priceHeadItemProduct w-[28%]">
                            <h2>Company</h2>
                        </div>
                        <div class="dateHeadItemProduct w-1/2 text-sm text-center">
                            <h2>Employment</h2>                                  
                        </div>                                        
                    </div>
                </div>
            </div>
            @include('livewire.dashboard.settings.profile.listProfile')
        </div>
        <div x-show="showEditPopup" class="ctr-mainPopup fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
            @include('livewire.dashboard.settings.profile.editProfile')
        </div>
            <!-- Success Message Popup -->
    <div x-show="showSuccessEditPopup" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
        <div class="p-5 bg-white rounded-md shadow-lg text-center">
            <p class="text-lg font-semibold text-green-500">Profile updated successfully!</p>
            <button @click="showSuccessEditPopup = false" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Close</button>
        </div>
    </div>
</div>
