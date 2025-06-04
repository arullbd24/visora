<div x-data="{ qrCodeData: null, fullname: '', employment: '', timestamp: '', showPopup: false, 
                left: 50,
                top: 100,
                isDragging: false,
                startX: 0,
                startY: 0, 
            onMouseDown(event) {
            this.isDragging = true;
            this.startX = event.clientX - this.left;
            this.startY = event.clientY - this.top;
        },
            onMouseMove(event) {
            if (this.isDragging) {
                this.left = event.clientX - this.startX;
                this.top = event.clientY - this.startY;
        }
        },
            onMouseUp() {
            this.isDragging = false;
        }
    }" 
                
    x-init="
    {{-- window.addEventListener('qrCodeGenerated', event => {
        qrCodeData = event.detail.qrCode;
        console.log('QR Code Base64:', event.detail.qrCodeBase64);
        console.log('QR Code Base64:', event.detail.qrCode);
        console.log('QR JSON Data:', event.detail.qrJson);
        console.log('QR Code successfully generated:', qrCodeData); // Log QR Code
    }); --}}
    {{-- console.log(qrCodeData); --}}
    window.addEventListener('qrCodeGenerated', function(event) {
        const dataEvent = event.__livewire.params[0];
        qrCodeData = dataEvent.qrCode;
        fullname = dataEvent.fullname;
        employment = dataEvent.employment;

         // Ambil waktu saat acara dipicu
        const currentDate = new Date();
        const formattedDate = currentDate.toLocaleString('id-ID', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        }).replace(/\//g, '-').replace(/\./g, ':');

        {{-- timestamp = formattedDate;  --}}
        timestamp = dataEvent.timestamps;
        console.log(dataEvent);
        {{-- console.log('employment:', employment); --}}
        {{-- console.log('Timestamp:', formattedDate); --}}
    });
    "
    @mousemove="onMouseMove($event)" 
    @mouseup="onMouseUp" 
    @mouseleave="onMouseUp">
{{-- <div class="ctr-mainContentSign relative w-full h-screen bg-slate-200 rounded-md shadow-lg mt-5"> --}}
    <div class="cMainContentSign">
        <div class="ctr-contentUploadHeader">
            <div class="cContentUploadHeader flex items-center justify-between p-3 bg-blue-600 rounded-t-md">
                <div class="UploadDocuments text-white">
                    <p>Sign Documents</p>
                </div>

                <div class="placeSignature">
                    <button type="button" class="text-white"  @click="showPopup = true">
                    {{-- <button type="button" class="text-white" @click="generateQrCode"> --}}
                        <span class="icon flex items-center gap-2 text-xs bg-blue-400 hover:bg-blue-500 p-1 rounded-md">
                            <p>Place Signature</p>
                            <i class="fas fa-qrcode"></i>
                        </span>
                    </button>
                    <button wire:click="newDocument" class="bg-green-400 text-white w-16 text-xs p-1 rounded-md ml-2"
                        :disabled="@js(!$isDoneButtonEnabled)"
                        :class="{ 'opacity-50 cursor-not-allowed': @js(!$isDoneButtonEnabled) }">
                        Done
                    </button>
                    <!-- Pesan berhasil -->
                    @if (session()->has('message'))
                        <div class="mt-4 text-green-600">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>          
        </div>
        <div class="ctr-contentUploadMain border rounded-md">
            <div class="cContentUploadMain flex items-center justify-center p-2">
                <div class="ctr-selectDocument border rounded-md">
                    {{-- <div class="cSelectDocument flex items-center justify-center"> --}}
                    <div class="cSelectDocument  items-center justify-center space-y-4">
                        @if (session('uploadedFileUrl'))
                        {{-- @php
                            dd(session('uploadedFileUrl'));
                        @endphp --}}
                        <p>{{ session('uploadedFileUrl') }}</p>
                        {{-- <a href="{{ $uploadedFileUrl }}" target="_blank">Buka File</a> --}}
                        <canvas id="pdfRender" class="canvasViewer border-2">Canvas not rendered</canvas>

                            <div class="top-bar flex items-center gap-3">
                                <button class="btn flex items-center gap-3" id="prev-page">
                                    <i class="fas fas fa-arrow-left"></i>
                                    <p>Prev Page</p>
                                </button>
                                <button class="btn flex items-center gap-3" id="next-page">
                                    Next Page 
                                    <i class="fas fas fa-arrow-right"></i>
                                </button>
                                <span class="page-info">
                                    Page <span id="page-num"></span> of <span id="page-count"></span>
                                </span>
                            </div>
                        
                            
                             {{-- Tambahkan elemen hidden untuk menyimpan URL --}}
                             {{-- <p>{{ session('uploadedFileUrl') }}</p>
                            <input type="hidden" id="pdf-url" value="{{ session('uploadedFileUrl') }}"> --}}
                        @else
                            <p class="text-gray-500">Tidak ada dokumen yang diunggah.</p>
                        @endif

                        {{-- Menampilkan file PDF menggunakan embed --}}
                        {{-- @if (session('uploadedFileUrl'))
                        <p>{{ session('temporaryFile') }}</p>
                        @php
                            $protocol = request()->secure() ? 'https' : 'http';
                            $host = request()->getHost();
                            $port = request()->getPort();
                            $currentHost = (function() use($host, $port) {
                                if ($port) {
                                    return $host . ':' . $port;
                                } 
                                return $host;
                            })();
                            $currentUrl = $protocol . '://' . $currentHost;
                        @endphp
                        <p>{{ session('filename') }}</p>
                        <p>{{ session('storagepath') }}</p>
                        <embed src="{{ $currentUrl . '/temp/livewire-tmp/' . session('storagepath') }}" type="application/pdf" class="w-full h-screen" />
                        @else
                            <p class="text-gray-500">Tidak ada dokumen yang diunggah.</p>
                        @endif --}}
                        {{-- <p>{{ session('realpath') }}</p>
                        <p>{{ Storage::disk('temp')->url(session('storagepath')) }}</p>
                        <p>{{ Storage::disk('temp')->path(session('storagepath')) }}</p>
                        <p>{{ Storage::url('temp') }}</p>
                        <p>{{ Storage::path('temp') }}</p> --}}
                        {{-- <embed src="{{ Storage::disk('temp' . session('storagepath')) }}" type="application/pdf" width="100%" height="600px" /> --}}
                        {{-- <embed src="{{ Storage::disk('temp/documents' . session('storagepath')) asset('temp/documents/' . session('storagepath')) }}" type="application/pdf" width="100%" height="600px" /> --}}
                        {{-- <embed src="{{ session('uploadedFileUrl') }}" type="application/pdf" width="100%" height="600px" /> --}}
                        {{-- <embed src="{{ Storage::url (session('uploadedFileUrl'))}}" type="application/pdf"/> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- //Popup placement signature --}}
        <div x-show="showPopup" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="ctr-popUpGenerateQR w-1/2 border-2 bg-slate-200 rounded-md mt-3">
                <div class="cPopUpGenerateQR p-2">
                    <div class="imgHeadPopup flex items-center justify-center">
                        <img src="{{ asset('components/icon/logo/logoD.svg') }}" alt="logo" class="size-20 object-cover object-center">
                    </div>
                    <div class="TitleHeadPopup text-center">
                        <p class="text-xl font-semibold">Authentic Signature Placement</p>
                    </div>
                    <div class="ctr-popUpGenerateQRMain mt-3">
                        <div class="cPopUpGenerateQRMain p-2">
                            <div class="ctr-selectEmployment">
                                <div class="cSelectEmployment flex-col items-center justify-center space-y-1">
                                    <div class="TitlePopup">
                                        <div class="title text-md text-left">
                                            <h2>Please select employment to Generate QR</h2>
                                        </div>
                                    </div>
                                    <div class="cSelectEmploymentItem w-full relative">
                                        <select wire:model="selectedEmployment" class="custom-select w-full p-3 bg-gray-50 border border-gray-300 rounded-md text-gray-700 focus:border-indigo-500 focus:ring-indigo-500 appearance-none pr-10">
                                            @if($user_profiles && $user_profiles->isNotEmpty())
                                                @foreach($user_profiles as $user_profile)
                                                    <option value="{{ $user_profile->employment }}">{{ $user_profile->employment }}</option>
                                                @endforeach
                                            @else
                                                <option value="">No Employment Available</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="ctr-buttonSubmitePlacement mt-5">
                                <div class="cButtonSubmitePlacement">
                                    <div class="ButtonConfirm flex items-center justify-center gap-3">
                                        <div class="buttonPlacement">
                                            <button wire:click="generateQrCode" @click="showPopup = false" class="w-28 bg-blue-500 hover:bg-blue-700 text-md text-white font-semibold rounded-md p-2">Placement</button>
                                        </div>
                                        <div class="buttonCancel">
                                            <button @click="showPopup = false" class="w-28 bg-slate-500 hover:bg-slate-700 text-md text-white font-semibold rounded-md p-2">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Popup --}}
        <!-- Tampilkan QR Code jika sudah di-generate -->
        <div x-show="qrCodeData && fullname && employment" class="flex items-center justify-center cursor-pointer">
            <div class="qrCodeContainer absolute flex justify-center gap-2" 
            :style="`top: ${top}px; left: ${left}px;`" 
            @mousedown="onMouseDown($event)">
                <button @click="qrCodeData = null" class="absolute -top-1 -left-7 rounded-full px-1 flex items-center justify-center">
                    <i class="fas fa-circle-xmark text-red-600 text-lg"></i>
                </button>
                <div class="qrCodeImg size-20 relative">
                    <img :src="`data:image/svg+xml;base64,${qrCodeData}`" alt="Generated QR Code" class="size-full object-cover object-center">
                </div>
                {{-- <button id="savePosition" title="Fix Position" class="absolute top-4 right-4 bg-green-500 text-white rounded-full p-2 shadow-lg hover:bg-green-600">
                    <i class="far fa-circle-check"></i>
                </button> --}}
                <div class="flex flex-col justify-star">
                    <p class="text-[0.6rem] text-gray-500 w-32">ditanda tangani secara elektronik oleh :</p> 
                    <span x-text="fullname" class="text-xs font-semibold">{{ auth()->user() }}</span>
                    <span x-text="employment" class="text-xs font-semibold">{{ $selectedEmployment }}</span>
                    <span x-text="timestamp" class="text-xs mt-2"></span>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script-body-field')
    <script>
        var pdfDoc = null,
        pageNum = 1,
        pageRendering = false,
        pageNumPending = null,
        scale = 1.5,
        canvas = document.getElementById('pdfCanvas'),
        ctx = canvas.getContext('2d');

        function renderPage(num){
            pageRendering = true;
            pdfDoc.getPage(num).then((page)=> {
                var viewport = page.getViewport({scale:scale});
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                var renderContext = {
                    canvasContext: ctx,
                    viewport: viewport,
                }
                var renderTask = page.render(renderContext);
                renderTask.promise.then(()=>{
                    pageRendering = false;
                    if (pageNumPending !== null){
                        renderPage(pageNumPending)
                        pageNumPending = null
                    }

                })
            })
            document.getElementById('page_num').textContent = num;
        }

        function queueRenderingPage(num){
            if (pageRendering){
                pageNumPending = num;
            }else{
                renderPage(num);
            }
        }

        function onPrevPage(){
            if (pageNum <= 1){
                return
            }
                pageNum--;
                queueRenderingPage(pageNum);
        }
        document.getElementById('prev').addEventListener('click',onPrevPage)

        function onNextPage(){
            if (pageNum >= pdfDoc.numPages){
                return;
            }
            pageNum++;
            queueRenderingPage(pageNum);
        }
        document.getElementById('next').addEventListener('click',onNextPage)

        function zoomOut(){
            scale -= 0.1;
            renderPage(pageNum);
        }
        document.getElementById('zoomOut').addEventListener('click',zoomOut)
        
        function zoomIn(){
            scale += 0.1;
            renderPage(pageNum);
        }
        document.getElementById('zoomIn').addEventListener('click',zoomIn)

        pdfjsLib.getDocument('temporaryUrl').promise.then((doc)=>{
            pdfDoc = doc
            document.getElementById('page_count').textContent = doc.numPages;
            renderPage(pageNum)
        })
    </script>
    {{-- <script>
        document.addEventListener('employment-changed', function(event) {
        const employment = event.detail.employment;
        Livewire.emit('setEmployment', employment);
    });

        window.addEventListener('qrCodeGenerated', function(event) {
        const dataEvent = event.__livewire.params[0];
        console.log('Employment:', dataEvent.employment); // Tambahkan log ini
        qrCodeData = dataEvent.qrCode;
        fullname = dataEvent.fullname;
        employment = dataEvent.employment || 'Unknown'; // Pastikan ada fallback
    });
    </script> --}}
    {{-- <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('qrCodeComponent', () => ({
                qrCodeData: null,

                async generateQrCode() {
                    try {
                        // Data yang ingin diencode ke dalam QR
                        const data = JSON.stringify({
                            id_signature: "your_signature_id",
                            id_user: "your_user_id"
                        });

                        // Encode data ke base64 dengan memanggil backend endpoint Laravel Anda
                        const response = await fetch('/generate-qr', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({ data })
                        });
                        
                        const result = await response.json();
                        if (result.qrCodeBase64) {
                            this.qrCodeData = result.qrCodeBase64;
                        } else {
                            console.error('Failed to generate QR code');
                        }
                    } catch (error) {
                        console.error('Error generating QR code:', error);
                    }
                }
            }));
        });
    </script> --}}
@endpush
