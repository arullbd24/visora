<div  x-data="fileUploader()" class="ctr-contentUploadMain w-full h-screen p-4 bg-slate-200 rounded-md shadow-lg mt-5">
    <div class="cContentUploadMain flex items-center justify-center">
        <div x-show="!files.length" class="ctr-selectDocument mt-5 rounded-xl bg-blue-800 px-20 py-14 text-center sm:px-[68] h-80">
            <div class="cSelectDocument flex flex-col items-center justify-center relative">
                <button  @click="triggerFileInput()" type="button" class="btnSelectDocument">
                    <div class="lblInp flex items-center justify-center w-20 h-20 cursor-pointer  bg-yellow-500 rounded-full mb-4">
                        <span class="iconB text-white text-3xl">
                            <i class="fas fa-plus"></i>
                        </span>
                    </div>
                </button>
                <div class="input">
                    <input type="file" x-ref="fileInput" @change="handleFileUpload" id="fileInput" class="hidden">
                </div>
                <div class="txval font-semibold text-white text-base mt-2">
                    <h2>Select a document to sign</h2>
                </div>
                <div class="groupText flex items-center justify-center gap-2 mt-2">
                    <div class="txval text-xs text-white">
                        <p>Drag your document here on</p>
                    </div>
                    <div class="txval text-xs text-yellow-500">
                        <p>sign or paraf</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>    

@push('script-body-field')
    {{-- <script src="{{ asset('assets/upload/listdoc.alpin.js') }}"></script> --}}
    {{-- <script>
        function fileUploader() {
            return {
                files: [],
                triggerFileInput() {
                    this.$refs.fileInput.click();
                },
                handleFileUpload(event) {
                    const uploadedFiles = Array.from(event.target.files);
                    this.files = this.files.concat(uploadedFiles);
                }
            };
        }
    </script> --}}
@endpush