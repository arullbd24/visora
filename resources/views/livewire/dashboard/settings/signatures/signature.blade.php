<div x-data="signaturePadComponent()">
    {{-- <p>{{ $draw_data }}</p> --}}
    <div class="ctr-headerInitial">
        <div class="cHeaderInitial flex relative transition-transform duration-500 ease-in-out" :class="{'mr-64': open}">
            <div class="container mx-auto p-6 overflow-auto">
                <!-- Konten Utama -->
                <div class="titleHeaderInitial w-full">
                    <div class="txHeaderInitial flex justify-between items-center">
                        <h1 class="text-2xl font-semibold text-gray-900">Signature design</h1>
                        <button @click="open = !open" class="bg-gray-100 text-blue-600 px-4 py-2 rounded-lg shadow hover:bg-gray-200">
                            Create new <span class="ml-2">+</span>
                        </button>
                    </div>
                    <div class="descHeaderSignature">
                        <div class="txDescHeader text-gray-600 text-sm">
                            <p>Choose the signature design that will be used in your document</p>
                        </div>
                    </div>
                    
                    <!-- Sidebar dengan sliding effect -->
                    <div class="fixed inset-y-20 right-0 w-64 h-full bg-white shadow-md transform transition-transform duration-500 ease-in-out"
                         :class="{'translate-x-full': !open, 'translate-x-0': open}">
                        <div class="p-6">
                            <div class="ctr-slideCreateNew mt-4 space-y-4">
                                <div class="cSlideCreateNew">
                                    <div class="ctr-slideCreateNewTitle">
                                        <div class="cSlideCreateNewtitle flex items-center justify-between">
                                            <div class="texTitle text-md">
                                                <p class="">Create new signature</p>
                                            </div>
                                            <div class="backSlide">
                                                <span>
                                                    <i class="far fa-circle-xmark cursor-pointer text-lg" @click="open = false"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button @click="isDrawOpen = true" class="w-full bg-gray-100 text-blue-600 px-4 py-2 rounded-lg shadow flex items-center justify-between hover:bg-gray-200">
                                    Draw
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </button>
                                <button @click="isUploadOpen = true" class="w-full bg-gray-100 text-blue-600 px-4 py-2 rounded-lg shadow flex items-center justify-between hover:bg-gray-200">
                                    Upload
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v6h16V4m0 6l-8 8-8-8" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Draw Signature Modal -->
                <div x-show="isDrawOpen" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-white w-full max-w-lg p-6 rounded-lg">
                        <h2 class="text-lg font-bold">Draw</h2>

                        <!-- Color Selection -->
                        <div class="flex items-center my-4">
                            <label class="inline-flex items-center mr-4">
                                <input type="radio" name="color" value="black" class="form-radio" x-model="penColor" checked>
                                <span class="ml-2">Black</span>
                            </label>
                            <label class="inline-flex items-center mr-4">
                                <input type="radio" name="color" value="blue" class="form-radio" x-model="penColor">
                                <span class="ml-2">Blue</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="color" value="green" class="form-radio" x-model="penColor">
                                <span class="ml-2">Green</span>
                            </label>
                        </div>

                        <!-- Signature Pad -->
                        <div class="border p-4">
                            <p class="text-sm text-gray-500">Draw signature here</p>
                            <canvas id="signaturePad" width="400" height="200" style="border:1px solid #000;"></canvas>
                        </div>                

                        <!-- Buttons -->
                        <div class="flex justify-end mt-4">
                            <button @click="isDrawOpen = false, clearSignature()" class="bg-slate-200 hover:bg-slate-300 text-gray-500 px-3 py-2 rounded-lg mr-4">Cancel</button>
                            <button @click="saveSignature" class="bg-red-400 hover:bg-red-500 text-white px-4 py-2 rounded-lg">Save</button>
                        </div>
                    </div>
                </div>

                <!-- Upload Signature Modal -->
                <div x-show="isUploadOpen" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-white w-full max-w-lg p-6 rounded-lg">
                        <h2 class="text-lg font-bold">Upload</h2>
                        <div class="border p-4">
                            <p class="text-sm text-gray-500">Upload signature</p>
                            <input type="file" wire:model="file_signature" accept="image/png, image/jpeg" class="w-full text-sm" />
                        </div>
                        <div class="flex justify-end mt-4">
                            <button @click="isUploadOpen = false, clearSignature()" class="bg-slate-200 hover:bg-slate-300 text-gray-500 px-3 py-2 rounded-lg mr-4">Cancel</button>
                            <button wire:click="storeUpload" @click="isUploadOpen = false" class="bg-red-400 hover:bg-red-500 text-white px-4 py-2 rounded-lg">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="ctr-mainSignature mt-12 transition-transform duration-500 ease-in-out" :class="{'mr-64': open}">
        @livewire('Dashboard.Settings.Signatures.Data.Signatures', ['lazy' => true])
    </div>
    
    
    {{-- <div class="bg-gray-50 mt-20">
        <div class="flex relative transition-transform duration-500 ease-in-out" :class="{'mr-64': open}">
            <div class="container mx-auto bg-white rounded-lg shadow-sm p-6 overflow-auto">
                <!-- Konten Utama -->
                <div class="w-full">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl font-semibold text-gray-900">Signature design</h1>
                        <button @click="open = !open" class="bg-gray-100 text-blue-600 px-4 py-2 rounded-lg shadow hover:bg-gray-200">
                            Create new <span class="ml-2">+</span>
                        </button>
                    </div>

                    <div class="flex items-center mt-6">
                        <label class="flex items-center">
                            <input type="checkbox" class="toggle-checkbox h-5 w-5 cursor-pointer rounded-md" checked>
                            <span class="ml-2 text-gray-700">Show signature detail</span>
                        </label>
                    </div>

                    <div class="mt-6 border rounded-lg p-4">
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700 mb-2">Signature</h2>
                                <p class="text-gray-500 text-sm">Signed by {{ auth()->user()->userPersonal->fullname }} ({{ auth()->user()->username }})</p>
                                <p class="text-gray-500 text-sm">{{ date('d - m - Y', time ()) }}</p>
                            </div>
                        </div>

                        <div class="mt-4 border rounded-lg p-4">
                            <img src="{{ Storage::url('signatures671b481b6cd9a.png') }}" alt="Signature" class="w-full max-w-md mx-auto" />
                        </div>

                        <div class="mt-4 text-right">
                            <button class="bg-gray-100 text-blue-600 px-4 py-2 rounded-lg shadow hover:bg-gray-200">
                                Default
                            </button>
                        </div>
                    </div>
                    
                    <!-- Sidebar dengan sliding effect -->
                    <div class="fixed inset-y-20 right-0 w-64 h-full bg-white shadow-md transform transition-transform duration-500 ease-in-out"
                         :class="{'translate-x-full': !open, 'translate-x-0': open}">
                        <div class="p-6">
                            <div class="ctr-slideCreateNew mt-4 space-y-4">
                                <div class="cSlideCreateNew">
                                    <div class="ctr-slideCreateNewTitle">
                                        <div class="cSlideCreateNewtitle flex items-center justify-between">
                                            <div class="texTitle text-md">
                                                <p class="">Create new signature</p>
                                            </div>
                                            <div class="backSlide">
                                                <span>
                                                    <i class="far fa-circle-xmark cursor-pointer text-lg" @click="open = false"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button @click="isDrawOpen = true" class="w-full bg-gray-100 text-blue-600 px-4 py-2 rounded-lg shadow flex items-center justify-between hover:bg-gray-200">
                                    Draw
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </button>
                                <button @click="isUploadOpen = true" class="w-full bg-gray-100 text-blue-600 px-4 py-2 rounded-lg shadow flex items-center justify-between hover:bg-gray-200">
                                    Upload
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v6h16V4m0 6l-8 8-8-8" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Draw Signature Modal -->
                <div x-show="isDrawOpen" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-white w-full max-w-lg p-6 rounded-lg">
                        <h2 class="text-lg font-bold">Draw</h2>

                        <!-- Color Selection -->
                        <div class="flex items-center my-4">
                            <label class="inline-flex items-center mr-4">
                                <input type="radio" name="color" value="black" class="form-radio" x-model="penColor" checked>
                                <span class="ml-2">Black</span>
                            </label>
                            <label class="inline-flex items-center mr-4">
                                <input type="radio" name="color" value="blue" class="form-radio" x-model="penColor">
                                <span class="ml-2">Blue</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="color" value="green" class="form-radio" x-model="penColor">
                                <span class="ml-2">Green</span>
                            </label>
                        </div>

                        <!-- Signature Pad -->
                        <div class="border p-4">
                            <p class="text-sm text-gray-500">Draw signature here</p>
                            <canvas id="signaturePad" width="400" height="200" style="border:1px solid #000;"></canvas>
                        </div>                

                        <!-- Buttons -->
                        <div class="flex justify-end mt-4">
                            <button @click="isDrawOpen = false, clearSignature()" class="bg-slate-200 hover:bg-slate-300 text-gray-500 px-3 py-2 rounded-lg mr-4">Cancel</button>
                            <button @click="saveSignature" class="bg-red-400 hover:bg-red-500 text-white px-4 py-2 rounded-lg">Save</button>
                        </div>
                    </div>
                </div>

                <!-- Upload Signature Modal -->
                <div x-show="isUploadOpen" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-white w-full max-w-lg p-6 rounded-lg">
                        <h2 class="text-lg font-bold">Upload</h2>
                        <div class="border p-4">
                            <p class="text-sm text-gray-500">Upload signature</p>
                            <input type="file" wire:model="file_signature" accept="image/png, image/jpeg" class="w-full text-sm" />
                        </div>
                        <div class="flex justify-end mt-4">
                            <button @click="isUploadOpen = false, clearSignature()" class="bg-slate-200 hover:bg-slate-300 text-gray-500 px-3 py-2 rounded-lg mr-4">Cancel</button>
                            <button wire:click="storeUpload"  @click="isUploadOpen = false" class="bg-red-400 hover:bg-red-500 text-white px-4 py-2 rounded-lg">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>

@push('script-body-field')
    <script>
        function signaturePadComponent() {
            return {
                isDrawOpen: false,
                isUploadOpen: false,
                signaturePad: null,
                fileSignature: null,
                penColor: 'black', // Default pen color
                open: false, // Sidebar toggle state

                init() {
                    const canvas = document.getElementById('signaturePad');
                    this.signaturePad = new SignaturePad(canvas, {
                        penColor: this.penColor
                    });

                    // Watch penColor and update the Signature Pad color dynamically
                    this.$watch('penColor', (value) => {
                        this.signaturePad.penColor = value;
                    });
                },
                
                clearSignature() {
                    this.signaturePad.clear();
                    this.fileSignature = null;
                    @this.set('file_signature', null); // Reset binding Livewire
                    console.log("File signature reset:", this.fileSignature);
                },

                saveSignature() {
                    console.log(this.signaturePad);
                    console.log(this.signaturePad.toDataURL());
                    const drawData = this.signaturePad.toDataURL(); // Get base64 data
                    console.log(drawData);
                    console.log(drawData);
                    console.log(drawData);
                    // Livewire.dispatch('storeDraw', { draw_data: drawData });
                    @this.call('storeDraw', { draw_data_input: drawData });
                    this.isDrawOpen = false;
                    this.clearSignature();
                },

            //     uploadSignature() {
            //     if (this.fileSignature) {
            //         const formData = new FormData();
            //         formData.append('file_signature', this.fileSignature);

            //         // Memanggil metode storeUpload di controller menggunakan Livewire atau Ajax
            //         @this.call('storeUpload', formData).then(() => {
            //             this.isUploadOpen = false;
            //             this.fileSignature = null; // Reset setelah upload
            //         });
            //     }
            //   },
            //   // Function to handle file input change
            //     handleFileChange(event) {
            //         this.fileSignature = event.target.files[0];
            //     }
            }
        }
    </script>
@endpush

