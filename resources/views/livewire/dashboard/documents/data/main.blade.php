<div class="mt-4">
    @if ($list_document_paginate)
        <div class="ctr-headerDocumentData py-2 px-4 bg-gray-200 rounded-t-lg">
            <div class="cHeaderDocumentData grid grid-cols-2 sm:grid-cols-5">
                <div class="itm-headerDocumentData col-span-2">
                    <div class="txHeaderDocData">
                        <p>Name</p>
                    </div>
                </div>
                <div class="itm-headerDocumentData hidden sm:block">
                    <div class="txHeaderDocData">
                        <p>Owner</p>
                    </div>
                </div>
                <div class="itm-headerDocumentData hidden sm:block">
                    <div class="txHeaderDocData">
                        <p>Last Modified</p>
                    </div>
                </div>
                <div class="itm-headerDocumentData hidden sm:block">
                    <div class="txHeaderDocData">
                        <p>File Size</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    <div class="ctr-mainDocumentData">
        <div class="cMainDocumentData relative">
            @if ($list_document_paginate->count())
                @php
                    $imageExtensions = \App\Library\Helper::getImageExtension();
                    function formatFileSize($bytes) {
                        if ($bytes >= 1073741824) {
                            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
                        } elseif ($bytes >= 1048576) {
                            $bytes = number_format($bytes / 1048576, 2) . ' MB';
                        } elseif ($bytes >= 1024) {
                            $bytes = number_format($bytes / 1024, 2) . ' KB';
                        } else {
                            $bytes = $bytes . ' B';
                        }
                        return $bytes;
                    }
                    // dd(
                    //     $list_document,
                    //     $list_document_paginate,
                    // );
                @endphp
                
                <div wire:loading class="absolute top-0 left-1/2 -translate-x-1/2 px-4 py-2 rounded-md bg-[#FFD700] shadow-md shadow-gray-400">
                    <div class="txLoading text-sm">
                        <p>Loading...</p>
                    </div>
                </div>
                
                <div class="ctr-listMainDocumentData"
                    id="id-ctr_lstMainDocData"
                    >
                    <div class="cListMainDocumentData">
                        @foreach ($list_document_paginate as $idx => $itm_document)
                            @php
                                // $itmDocsDisk = $itm_document->getDocumentDisk;
                                // $iconFile = $itmDocsDisk->extension == 'pdf' ? 'fa-file-pdf' : (in_array($itmDocsDisk->extension, $imageExtensions) ? 'fa-file-image' : 'fa-file');
                                // $pathStorage = $itmDocsDisk->path . $itmDocsDisk->file_name;
                                $timestampsLog = Carbon\Carbon::parse($itm_document->doc_updated_at)->timezone(session()->get('timezone'));
                                
                                $iconFile = $itm_document->extension == 'pdf' ? 'fa-file-pdf' : (in_array($itm_document->extension, $imageExtensions) ? 'fa-file-image' : 'fa-file');
                                $pathStorage = $itm_document->path . $itm_document->file_name;
                                // $publicPathStorage = public_path($pathStorage);
                                $privatePathStorage = Storage::disk($itm_document->disk)->path($pathStorage);
                                $fileSizeInBytes = filesize($privatePathStorage);
                                
                                $fileSizeFormatted = formatFileSize($fileSizeInBytes);
                            @endphp
                            <div class="itm-documentData py-2 px-4 bg-gray-100 hover:bg-gray-200 relative group {{ $idx == $list_document_paginate->count()-1 ? 'rounded-b-lg' : '' }}">
                                <div class="cItm-documentData grid grid-cols-2 sm:grid-cols-5">
                                    <div class="col-documentData file-documentData col-span-2 flex items-center h-full gap-2" title="{{ $itm_document->file_client_name }}">
                                        <div class="icon text-xl text-red-800">
                                            <i class="fas {{ $iconFile }}"></i>
                                        </div>
                                        <div class="txNmeFile line-clamp-1 text-sm">
                                            <p>{{ $itm_document->file_client_name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-documentData fileOwner-documentData items-center gap-2 hidden sm:flex">
                                        <div class="imgUser">
                                            <div class="img size-8 rounded-full flex items-center justify-center bg-gray-200 p-0.5">
                                                <img src="{{ asset('components/icon/logo/AGTBG.svg') }}" alt="" class="size-full object-cover object-center">
                                            </div>
                                        </div>
                                        <div class="txNmeUser">
                                            <div class="txNme text-sm text-gray-600 line-clamp-1">
                                                <p>{{ auth()->user()->userPersonal->fullname }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-documentData fileModified-documentData hidden sm:block">
                                        <div class="txDate text-sm flex items-center h-full">
                                            <p>{{ $timestampsLog }}</p>
                                        </div>
                                    </div>
                                    <div class="col-documentData fileSize-documentData hidden sm:block">
                                        <div class="txFileSize flex items-center h-full">
                                            <p>{{ $fileSizeFormatted }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ctr-actionItem absolute right-2 top-1/2 -translate-y-1/2 hidden group-hover:block">
                                    <div class="cActionItem flex items-center gap-0.5">
                                        <div class="btnDownload">
                                            @php
                                                $dataAction = (object) array(
                                                    'action' => 'download',
                                                    'id_document' => $itm_document->id_document,
                                                    '_token' => csrf_token(),
                                                );
                                                $encryptAction = \Illuminate\Support\Facades\Crypt::encrypt($dataAction);
                                            @endphp
                                            <button 
                                                type="button" 
                                                class="size-8 flex items-center justify-center rounded-md hover:bg-gray-200 text-gray-600"
                                                wire:click='actionDocument("{{ $encryptAction }}")'
                                                >
                                                <ag-icon class="text-lg">
                                                    <i class="fas fa-download"></i>
                                                </ag-icon>
                                            </button>
                                        </div>
                                        <div class="btnDelete">
                                            @php
                                                $dataAction = (object) array(
                                                    'action' => 'delete',
                                                    'id_document' => $itm_document->id_document,
                                                    '_token' => csrf_token(),
                                                );
                                                $encryptAction = \Illuminate\Support\Facades\Crypt::encrypt($dataAction);
                                            @endphp
                                            <button 
                                                type="button" 
                                                class="size-8 flex items-center justify-center rounded-md hover:bg-gray-200 text-gray-600"
                                                wire:click='actionDocument("{{ $encryptAction }}")'
                                                >
                                                <ag-icon class="text-lg">
                                                    <i class="fas fa-trash"></i>
                                                </ag-icon>
                                            </button>
                                        </div>
                                        <div class="btnEdit">
                                            @php
                                                $dataAction = (object) array(
                                                    'action' => 'edit',
                                                    'id_document' => $itm_document->id_document,
                                                    '_token' => csrf_token(),
                                                );
                                                $encryptAction = \Illuminate\Support\Facades\Crypt::encrypt($dataAction);
                                            @endphp
                                            <button 
                                                type="button" 
                                                class="size-8 flex items-center justify-center rounded-md hover:bg-gray-200 text-gray-600"
                                                wire:click='actionDocument("{{ $encryptAction }}")'
                                                >
                                                <ag-icon class="text-lg">
                                                    <i class="fas fa-pen"></i>
                                                </ag-icon>
                                            </button>
                                        </div>
                                        <div class="btnSign">
                                            @php
                                                $dataAction = (object) array(
                                                    'action' => 'sign',
                                                    'id_document' => $itm_document->id_document,
                                                    '_token' => csrf_token(),
                                                );
                                                $encryptAction = \Illuminate\Support\Facades\Crypt::encrypt($dataAction);
                                            @endphp
                                            <button 
                                                type="button" 
                                                class="size-8 flex items-center justify-center rounded-md hover:bg-gray-200 text-gray-600"
                                                wire:click='actionDocument("{{ $encryptAction }}")'
                                                >
                                                <ag-icon class="text-lg">
                                                    <i class="fas fa-signature"></i>
                                                </ag-icon>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="ctr-documentNotFound">
                    <div class="cDocumentNotFound">
                        <div class="imgDocumentNotFound flex items-center justify-center">
                            <div class="imgNotFound size-96">
                                <img src="{{ asset('components/icon/docs_not_found.svg') }}" alt="" class="size-full object-center object-contain">
                            </div>
                        </div>
                        <div class="txNotFound text-center text-gray-400">
                            <strong>Document Not Found</strong>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>