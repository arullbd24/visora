<div
    class="custom-contextMenu ctr-contextModifyDocs bg-white rounded-lg shadow-md shadow-gray-400 z-[110] transition-opacity duration-150"
    id="context-modifyDocs-menu"
    style="position: fixed; opacity: 0; visibility: hidden"
    {{-- aria-hidden="true" --}}
    x-data="actionDocument"
>
    <div class="cContextModifyDocs">
        <div class="itmContextGroup py-1 min-w-64">
            <div class="itmContextModify group">
                <button 
                    type="button" 
                    class="btnContext block cursor-pointer hover:bg-gray-200 py-2 px-4 w-full"
                    >
    
                    <div class="cBtnContext flex justify-between items-center">
                        <div class="mainTx flex gap-4">
                            <ag-icon class="icn text-sm">
                                <i class="fas fa-arrows-up-down-left-right"></i>
                            </ag-icon>
                            <div class="txLbl text-sm">
                                <span>Open with</span>
                            </div>
                        </div>
                        <ag-icon class="icn text-xs">
                            <i class="fas fa-chevron-right"></i>
                        </ag-icon>
                    </div>
                </button>
                <div 
                    class="detailItmContextModify absolute top-0 min-w-full invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100"
                    {{-- style="" --}}
                    >
                    <div class="cDetailItmContextModify bg-white rounded-lg shadow-sm shadow-gray-400 overflow-hidden">
                        <div class="itmDetailContextModify">
                            <button
                                type="button"
                                class="btnDetailContextModify block cursor-pointer hover:bg-gray-200 py-2 px-4 w-full"
                            >
                                <div class="cBtnDetailContext flex gap-4">
                                    <ag-icon class="text-sm">
                                        <i class="fas fa-eye"></i>
                                    </ag-icon>
                                    <div class="txDetailContext text-sm">
                                        <p>Preview</p>
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="itmDetailContextModify">
                            <a 
                                target="_blank"
                                rel="noopener noreferrer"
                                class="hrefDetailContextModify block"></a>
                            <button
                                type="button"
                                class="btnDetailContextModify block cursor-pointer hover:bg-gray-200 py-2 px-4 w-full"
                            >
                                <div class="cBtnDetailContext flex gap-4">
                                    <ag-icon class="text-sm">
                                        <i class="fas fa-up-right-from-square"></i>
                                    </ag-icon>
                                    <div class="txDetailContext text-sm">
                                        <p>Open in new tab</p>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <hr class="border-gray-300">
        
        {{-- Sign Document --}}
        <div class="itmContextGroup py-1 min-w-64">
            <div class="itmContextModify">
                <button 
                    type="button" 
                    class="btnContext block cursor-pointer hover:bg-gray-200 py-2 px-4 w-full"
                    >
                
                    <div class="cBtnContext flex gap-4">
                        <ag-icon class="icn text-sm">
                            <i class="fas fa-signature"></i>
                        </ag-icon>
                        <div class="txLbl text-sm">
                            <span>Place Signature</span>
                        </div>
                    </div>
                </button>
            </div>
        </div>
        
        <hr class="border-gray-300">
        
        {{-- Modify Document --}}
        <div class="itmContextGroup py-1 min-w-64">
            <div class="itmContextModify">
                <button 
                    type="button" 
                    class="btnContext block cursor-pointer hover:bg-gray-200 py-2 px-4 w-full"
                    >
                
                    <div class="cBtnContext flex gap-4">
                        <ag-icon class="icn text-sm">
                            <i class="fas fa-pen"></i>
                        </ag-icon>
                        <div class="txLbl text-sm">
                            <span>Rename Document</span>
                        </div>
                    </div>
                </button>
            </div>
            <div class="itmContextModify">
                <button 
                    type="button" 
                    class="btnContext block cursor-pointer hover:bg-gray-200 py-2 px-4 w-full"
                    @click=""
                    >
                
                    <div class="cBtnContext flex gap-4">
                        <ag-icon class="icn text-sm">
                            <i class="fas fa-trash"></i>
                        </ag-icon>
                        <div class="txLbl text-sm">
                            <span>Delete Document</span>
                        </div>
                    </div>
                </button>
            </div>
            <div class="itmContextModify">
                <button 
                    type="button" 
                    class="btnContext block cursor-pointer hover:bg-gray-200 py-2 px-4 w-full"
                    @click="downloadFile"
                    >
                
                    <div class="cBtnContext flex gap-4">
                        <ag-icon class="icn text-sm">
                            <i class="fas fa-download"></i>
                        </ag-icon>
                        <div class="txLbl text-sm">
                            <span>Download Document</span>
                        </div>
                    </div>
                </button>
            </div>
        </div>
        
        <hr class="border-gray-300">
        
        {{-- Info Documents --}}
        <div class="itmContextGroup py-1 min-w-64">
            <div class="itmContextModify">
                <button 
                    type="button" 
                    class="btnContext block cursor-pointer hover:bg-gray-200 py-2 px-4 w-full"
                    @click=""
                    >
                
                    <div class="cBtnContext flex gap-4">
                        <ag-icon class="icn text-sm">
                            <i class="fas fa-circle-info"></i>
                        </ag-icon>
                        <div class="txLbl text-sm">
                            <span>Show Details</span>
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>

@push('script-body-field')
    <script src="{{ asset('assets/js/contextmenu/modifyDocument.js') }}"></script>
    <script>
        Alpine.data('actionDocument', () => ({
            uploadFile() {
                
            },
            downloadFile(e) {
                const $elmnPar = $jq(e.target).closest('.custom-contextMenu');
            }
        }));
    </script>
@endpush

