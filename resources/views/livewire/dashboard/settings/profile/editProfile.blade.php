
    <div class="cMainPopup relative p-5 bg-white rounded-md shadow-lg w-full max-w-lg">
        <div class="ctr-PopupEdit">
            <div class="cPopupEdit items-center justify-center w-full mb-5">
                <div class="TitleHeadPopup text-center">
                    <p class="text-xl font-semibold">Edit Profile</p>
                </div>
            </div>
            <div class="formInput">
                <form wire:submit.prevent="saveProfile" class="InputDataProfile w-full space-y-3">
                    <div class="NameProfile flex flex-col justify-center">
                        <label>Name Profile</label>
                        <input type="text" wire:model="profile_name" class="w-full text-xs rounded-md border-1 border-gray-300">
                    </div>
                    <div class="Company flex flex-col justify-center">
                        <label>Company</label>
                        <input type="text" wire:model="company" class="w-full text-xs rounded-md border-1 border-gray-300">
                    </div>
                    <div class="Employment flex flex-col justify-center">
                        <label>Employment</label>
                        <input type="text" wire:model="employment" class="w-full text-xs rounded-md border-1 border-gray-300">
                    </div>
                    <div class="ctr-buttonSubmitePlacement mt-5">
                        <div class="ButtonConfirm flex items-center justify-center gap-3">
                            <button type="submit" class="w-28 bg-blue-500 hover:bg-blue-700 text-md text-white font-semibold rounded-md p-2">Edit</button>
                            <button type="button" @click="showEditPopup = false; $wire.resetForm()" class="w-28 bg-slate-500 hover:bg-slate-700 text-md text-white font-semibold rounded-md p-2">Cancel</button>
                        </div>
                    </div>
                    {{-- @if (session()->has('success'))
                        <div class="text-green-500">{{ session('success') }}</div>
                    @endif
                    @if (session()->has('error'))
                        <div class="text-red-500">{{ session('error') }}</div>
                    @endif --}}
                </form>
            </div>
        </div>
    </div>
