<div 
    class="ctr-uploadDocumentNProgress fixed right-2 w-96 bg-white shadow-md shadow-gray-400 rounded-t-lg" 
    id="id-ctr_upDocsNProgress"
    style="bottom: 0; display: none;"
    x-data="{ showMainUploadDocumentProgress: true }"
    >
    <div class="cUploadDocumentNProgress">
        <div class="ctr-headerUploadDocument p-4">
            <div class="cHeaderUploadDocument flex items-center justify-between">
                {{-- <div class="txHeaderUpload">
                    <div class="txHeader">
                        <p>Upload Documents</p>
                    </div>
                </div> --}}
                <div class="actHeaderUploadDocument">
                    <div class="act-minimizeHeaderUpDoc">
                        <button 
                            type="button" 
                            class="rounded-full flex items-center justify-center size-10 hover:bg-gray-300"
                            @click="showMainUploadDocumentProgress = !showMainUploadDocumentProgress"
                            >
                            <div class="iconMinimize">
                                <i 
                                    class="fas"
                                    :class="showMainUploadDocumentProgress ? 'fa-chevron-down' : 'fa-chevron-up'"
                                ></i>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div 
            class="ctr-mainUploadDocumentNProgress h-[24rem] overflow-y-auto"
            x-show="showMainUploadDocumentProgress"
            >
            <div class="cMainUploadDocumentNProgress" id="id-cMainUploadDocsProgress">
                {{-- <div class="itmUploadProgress flex items-center justify-between px-4 py-2 bg-gray-100 gap-2 relative">
                    <div class="file flex items-center gap-2 flex-grow">
                        <div class="icon text-xl shrink-0 text-red-800">
                            <i class="fas fa-file"></i>
                        </div>
                        <p class="line-clamp-1 text-sm flex-grow">Nama file</p>
                    </div>
                    <div class="progressText text-sm shrink-0">
                        <p>57</p>
                    </div>
                    
                    <i class="progressBar absolute bottom-0 left-0 h-1 bg-black transition-all rounded-r-full" style="width: 0%; background-color: blue; border-top-right-radius: 9999px; border-bottom-right-radius: 9999px;"></i>
                </div> --}}
            </div>
        </div>
    </div>
</div>