<div class="ctr-contentUploadMain w-full h-screen bg-slate-200 rounded-md shadow-lg mt-5">
    <div class="cContentUploadMain">
        <div class="ctr-contentUploadHeader">
            <div class="cContentUploadHeader flex items-center justify-between p-3 bg-blue-600 rounded-t-md">
                <div class="UploadDocuments text-white">
                    <p>Finish</p>
                </div>

                <div class="placeSignature">
                    <button type="button" wire:click='download' class=" text-white">
                        <span class="icon flex items-center gap-2 text-xs bg-blue-400 hover:bg-blue-500 p-1 rounded-md">
                            <p>Download</p>
                            <i class="fas fa-download"></i>
                        </span>
                    </button>
                </div>
            </div>          
        </div>
        <div>
            <h1>Thank You!</h1>
            <p>Here is your signature:</p>
            @if ($signatureUrl)
                <img src="{{ $signatureUrl }}" alt="Signature" />
            @else
                <p>No signature found.</p>
            @endif
        </div>        
    </div>
</div>    