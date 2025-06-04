<div class="ctr-selectDocument mt-5 rounded-xl bg-blue-800 px-20 py-14 text-center sm:px-[68] h-80">
    <div class="cSelectDocument flex flex-col items-center justify-center relative">
        {{-- <button  @click="triggerFileInput()" type="button" class="btnSelectDocument"> --}}
        {{-- <button type="button" class="btnSelectDocument">
            <div class="lblInp flex items-center justify-center w-20 h-20 cursor-pointer  bg-yellow-500 rounded-full mb-4">
                <span class="iconB text-white text-3xl">
                    <i class="fas fa-plus"></i>
                </span>
            </div>
        </button> --}}
        <label for="fileInput" class="block">
            <div class="lblInp flex items-center justify-center w-20 h-20 cursor-pointer  bg-yellow-500 rounded-full mb-4">
                <span class="iconB text-white text-3xl">
                    <i class="fas fa-plus"></i>
                </span>
            </div>
        </label>
        <div class="input">
            {{-- <input type="file" x-ref="fileInput" @change="handleFileUpload" id="fileInput" class="hidden"> --}}
            <input type="file" id="fileInput" class="hidden" wire:model='temporaryFile'>
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
{{-- @if ($temporaryFile)
    <p>File sementara: {{ $temporaryFile->getClientOriginalName() }}</p>
    <p>File sementara: {{ $temporaryFile }}</p>
@endif --}}

{{-- <p class="pt-12 text-white">File Name: {{ $fileName }}</p>

@error('temporaryFile') <span class="error text-white mt-12">{{ $message }}</span> @enderror --}}

<script>
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
</script>