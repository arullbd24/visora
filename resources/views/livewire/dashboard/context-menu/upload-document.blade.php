<div
    class="custom-contextMenu ctr-contextUploadDocs bg-white py-2 rounded-lg shadow-md shadow-gray-800 z-[110] transition-opacity duration-150"
    id="context-uploadDocs-menu"
    style="position: fixed; opacity: 0; visibility: hidden"
    aria-hidden="true"
    x-data="uploaderFile"
>
    <div class="cContextUploadDocs">
        <div class="itmContextUpload">
            <label for="inp-uploadDocs" class="lblContext block cursor-pointer hover:bg-gray-200 py-2 px-4">
                <div class="cLblInp flex gap-4">
                    <div class="icn text-sm">
                        <i class="fas fa-file-arrow-up"></i>
                    </div>
                    <div class="txLbl text-sm">
                        <span>Upload Document</span>
                    </div>
                </div>
                {{-- <input type="file" id="inp-uploadDocs" wire:model='fileUpload' class="sr-only" accept="application/pdf"> --}}
                <input
                    {{-- x-model="fileInput"  --}}
                    {{-- x-ref="fileInput"  --}}
                    type="file" 
                    id="inp-uploadDocs" 
                    class="sr-only" 
                    accept="application/pdf"
                    @change="uploadFile"
                    >
            </label>
        </div>
    </div>
</div>

@push('script-body-field')
    <script src="{{ asset("assets/js/contextmenu/uploadDocument.js") }}"></script>
    <script>
        Alpine.data('uploaderFile', () => ({
            uploadFile(event) {
                $csrfToken = '{{ csrf_token() }}';
                $target = '{{ route("upchunk.document") }}';
                
                handleFileUpload(event, $csrfToken, $target);
            }
        }));
    </script>
@endpush
