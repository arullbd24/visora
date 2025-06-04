<div class="ctr-listItemProduct p-2">
    <div class="cListItemProduct space-y-2">
        {{-- @if($user_profiles && $user_profiles->isNotEmpty()) --}}
        @if($list_profiles)
            @foreach($list_profiles as $user_profile)
                <div class="itmProduct w-full flex items-center justify-between border p-2 bg-white rounded-md transition duration-50 focus:outline-none hover:bg-slate-200">
                    <div class="mainProduct flex items-center gap-5 w-1/2">
                        <div class="nmeProduct text-sm text-slate-400 items-center justify-start">
                            <p>{{ $user_profile->profile_name }}</p>
                        </div>
                    </div>
                    
                    <div class="quantityPriceProduct shrink-0 flex-grow flex items-center justify-between text-sm text-slate-400">
                        <div class="ctr-quantityProduct w-1/3">
                            <div class="cQuantityProduct text-center">
                                <p>{{ $user_profile->company }}</p>
                            </div>
                        </div>
                        <div class="ctr-priceProduct w-1/2">
                            <div class="cPriceProduct text-center">
                                <p>{{ $user_profile->employment }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="actionRoles flex items-center gap-4">
                        <div class="ctr-moreAction w-fit">
                            <div class="ctr-mainMoreAction relative group">
                                <div class="cMoreAction grpMoreActionDoto grpHeadFlterTable relative">
                                    <button type="button" class="cMainMoreAction btnMoreActionDoto flex items-center justify-center w-9 aspect-square rounded-[100%] cursor-pointer bg-slate-200 hover:bg-slate-300">
                                        <span class="iconAction text-lg">
                                            <i class="fas fa-ellipsis-vertical"></i>
                                        </span>
                                    </button>
                                </div>
                                <div class="ctr-shwDetMoreAction cShowMoreActionDoto mr-2 absolute bg-white rounded-lg border border-gray-400 right-[80%] top-0 overflow-hidden invisible opacity-0 group-hover:visible group-hover:opacity-100 peer-hover:flex">
                                    <div class="cShwDetMoreAction text-sm">
                                        <div class="itmMoreAction hover:bg-gray-200">
                                            <button type="button" class="editRolesAction block cursor-pointer"wire:click="editProfile({ id_user_profile: '{{ $user_profile->id_user_profile }}' })"
                                                @click="showEditPopup = true">
                                                <div class="cAHrefContent flex items-center gap-2 px-4 py-2">
                                                    <span class="icon flex items-center w-6">
                                                        <i class="fas fa-pencil"></i>
                                                    </span>
                                                    <div class="txAction">
                                                        <p>Edit</p>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                        
                                        <div class="itmMoreAction hover:bg-gray-200">
                                            {{-- <button  class="deleteRolesAction block cursor-pointer" wire:click="confirmDelete('{{ $user_profile->id_user_profile }}')"> --}}
                                            <button  class="deleteRolesAction block cursor-pointer" wire:click="confirmDelete('{{ $user_profile->id_user }}')">
                                                <div class="cAHrefContent flex items-center gap-2 py-2 px-4">
                                                    <span class="icon flex items-center w-6">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <div class="txAction">
                                                        <p>Delete</p>
                                                    </div>
                                                </div>
                                            </button>
                                             <!-- Modal Popup -->
                                                @if ($isDeleteModalOpen)
                                                <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
                                                    <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                                                        <h3 class="text-lg font-semibold mb-4">Konfirmasi Hapus</h3>
                                                        <p>Apakah Anda yakin ingin menghapus profil ini?</p>
                                                        <div class="flex justify-end mt-6">
                                                            <button wire:click="cancelDelete" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                                                                Batal
                                                            </button>
                                                            <button wire:click="deleteProfile('{{ $user_profile->id_user }}')" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                                                Hapus
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!-- Popup Pesan -->
                                            @if ($statusMessage)
                                                <div class="fixed top-10 right-10 bg-blue-500 text-white px-4 py-2 rounded shadow-lg z-40">
                                                    {{ $statusMessage }}
                                                    <button wire:click="$set('statusMessage', null)" class="ml-2 text-sm text-gray-200 hover:text-gray-100">
                                                        &times;
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="itmMoreAction hover:bg-gray-200">
                                            <button type="button" class="setDefailtProfile block cursor-pointer">
                                                <div class="cAHrefContent flex items-center gap-2 px-4 py-2">
                                                    {{-- <span class="icon flex items-center w-6">
                                                        <i class="fas fa-pencil"></i>
                                                    </span> --}}
                                                    <div class="txAction text-blue-400">
                                                        <p>Set Default</p>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                @endforeach
            @else
                <p>No profiles available.</p>
            @endif
        </div>
    </div>           
</div>
