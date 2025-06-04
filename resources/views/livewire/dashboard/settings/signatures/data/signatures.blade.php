<div class="cMainSignature w-full">
    @if (isset($default_signature))
        <div class="ctr-defaultMainSignature">
            <div class="cDefaultMainSignature">
                <div class="ctr-togleActiveSignatureDetail">
                    <div class="cTogleActiveSignatureDetail">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Show signature detail</span>
                        </label>
                    </div>
                </div>
                <div class="mt-4 border border-blue-600 rounded-lg p-4">
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <h2 class="text-lg font-bold text-gray-700 mb-2">Signature</h2>
                            <p class="text-gray-500 text-sm font-semibold">Signed by {{ auth()->user()->userPersonal->fullname }} ({{ auth()->user()->username }})</p>
                            <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
                        </div>
                    </div>

                    <div class="ctr-imgSignature flex items-center justify-center mt-4 border bg-gray-100 rounded-lg p-4">
                        @php
                            $signatureDisk = $default_signature->signature_disk; 
                            $pathSignature = $signatureDisk->disk . "/" . $signatureDisk->path . $signatureDisk->file_name;
                        @endphp
                        <div class="imgSignature w-52">
                            <img src="{{ asset($pathSignature) }}" alt="Signature" class="size-full object-contain object-center" />
                        </div>
                        {{-- <img src="{{ asset($pathSignature) }}" alt="Signature" class="w-full max-w-md mx-auto" /> --}}
                    </div>

                    <div class="mt-4 w-fit ml-auto">
                        <p class="bg-gray-100 text-blue-600 px-4 py-2 rounded-lg shadow">
                            Default
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="ctr-listSignature mt-6">
            <div class="cListSignature space-y-4">
                @foreach ($list_signature as $itm_signature)
                    <div class="ctr-itmSignature border border-gray-300 rounded-lg p-4 group">
                        <div class="cItmSignature">
                            @php
                                $signatureDisk = $itm_signature->signature_disk; 
                                $pathSignature = $signatureDisk->disk . "/" . $signatureDisk->path . $signatureDisk->file_name;
                            @endphp
                            
                            <div class="ctr-imgSignature flex items-center justify-center mt-4 border bg-gray-100 rounded-lg p-4">
                                <div class="imgSignature w-52">
                                    <img src="{{ asset($pathSignature) }}" alt="Signature" class="size-full object-contain object-center" />
                                </div>
                                {{-- <img src="{{ asset($pathSignature) }}" alt="Signature" class="w-full max-w-md mx-auto" /> --}}
                            </div>
                            
                            <div class="ctr-setRDeleteSignature mt-4 h-0 overflow-hidden transition-all group-hover:h-8">
                                <div class="cSetRDeleteSignature flex items-center justify-end gap-4">
                                    <button wire:click='setDefaultSignature("{{ $itm_signature->id_signature }}")' class="ctr-setDefaultSignature">
                                        <div class="cSetDefaultSignature">
                                            <div class="txSetDefault text-sm text-blue-600">
                                                <p>Set Default</p>
                                            </div>
                                        </div>
                                    </button>
                                    <button wire:click='deleteSignature("{{ $itm_signature->id_signature }}")' class="ctr-deleteSignature">
                                        <div class="cDeleteSignature">
                                            <div class="icon size-8 flex items-center justify-center text-red-600">
                                                <i class="fas fa-trash"></i>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="ctr-signatureNotFound">
            <div class="cSignatureNotFound flex items-center justify-center">
                <div class="imgNotFound size-96">
                    <img src="{{ asset('components/icon/docs_not_found.svg') }}" alt="" class="size-full object-center object-contain">
                </div>
            </div>
        </div>
    @endif
    
    <div class="fixed left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 size-full bg-black/20 z-[9999]" wire:loading>
        <div class="size-full flex items-center justify-center">
            <div class="icon size-12 text-7xl">
                <i class="fas fa-spinner animate-spin"></i>
            </div>
        </div>
    </div>
</div>