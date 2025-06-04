<div>
    <div class="ctr-mainContentUpload">
        <div class="cMainContentUpload">
            <div class="ctr-contentUploadHeader">
                <div class="cContentUploadHeader flex items-start gap-3">
                    <div class="UploadDocuments bg-blue-700 text-white p-2 text-sm rounded-md">
                        <p>Sign / Paraf</p>
                    </div>
                    <div class="txBack flex items-center gap-2 bg-slate-400 text-white p-2 text-sm cursor-pointer rounded-md px-5">
                        <i class="fas fa-arrow-left"></i>
                        <p>Back</p>
                    </div>
                </div>
                <div class="ctr-slideStep mt-2">
                    <div class="cSlideStep grid grid-cols-3 items-center gap-2">
                        <div class="ctr-mainSlide1 flex items-center">
                            <button type="button"
                                wire:click='mainUpload'
                                class="block w-1/2 py-1 mx-auto rounded-xl hover:bg-gray-100"
                                wire:navigate
                                >
                                <div class="mainSlide1 border rounded-full size-12 mx-auto flex items-center justify-center {{ $stepUpload >= 1 ? 'bg-blue-500 text-white' : 'bg-slate-300 text-gray-600' }}">
                                    <p>1</p>
                                </div>
                                <div class="tx text-xs py-1 text-center">
                                    <p>Upload Documents</p>
                                </div>
                            </button>
                        </div>
                        <div class="ctr-mainSlide1 flex items-center">
                            <button type="button"
                                wire:click='placeSign'
                                class="block w-1/2 py-1 mx-auto rounded-xl hover:bg-gray-100"
                                wire:navigate
                                >
                                <div class="mainSlide1 border rounded-full size-12 mx-auto flex items-center justify-center {{ $stepUpload >= 2 ? 'bg-blue-500 text-white' : 'bg-slate-300 text-gray-600' }}">
                                    <p>2</p>
                                </div>
                                <div class="tx text-xs py-1 text-center">
                                    <p>Place Signature/Initial</p>
                                </div>
                            </button>
                        </div>
                        <div class="ctr-mainSlide1 flex items-center">
                            <button type="button"
                                wire:click='finish'
                                class="block w-1/2 py-1 mx-auto rounded-xl hover:bg-gray-100"
                                wire:navigate
                                >
                                <div class="mainSlide1 border rounded-full size-12 mx-auto flex items-center justify-center {{ $stepUpload >= 3 ? 'bg-blue-500 text-white' : 'bg-slate-300 text-gray-600' }}">
                                    <p>3</p>
                                </div>
                                <div class="tx text-xs py-1 text-center">
                                    <p>Finish</p>
                                </div>
                            </button>
                        </div>
                        {{-- <div class="ctr-mainSlide2 flex flex-col items-center w-1/4">
                            <div class="mainSlide2 border rounded-full bg-slate-300 p-2 px-5 py-3 text-white">
                                <p>2</p>
                            </div>
                            <div class="tx text-xs py-1">
                                <p>Place Signature/Initial</p>
                            </div>
                        </div>
                        <div class="ctr-mainSlide3 flex flex-col items-center w-1/4">
                            <div class="mainSlide3 border rounded-full bg-slate-300 p-2 px-5 py-3 text-white">
                                <p>3</p>
                            </div>
                            <div class="tx text-xs py-1">
                                <p>Finish</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="">
                    <h1>Step Upload: {{ $stepUpload }}</h1>
                </div>
                @if ($stepUpload == 1)
                   @livewire('Dashboard.Documents.Upload.Main')
                @endif
                @if ($stepUpload == 2)
                   @livewire('Dashboard.Documents.Upload.Sign')
                @endif
                @if ($stepUpload == 3)
                   @livewire('Dashboard.Documents.Upload.Finish')
                @endif
                
                {{-- @if (Str::contains(request()->route()->getName(), 'upload\main'))
                   @livewire('Dashboard.Documents.Upload.Main')
                @endif
                @if (Str::contains(request()->route()->getName(), 'upload\sign'))
                   @livewire('Dashboard.Documents.Upload.Sign')
                @endif
                @if (Str::contains(request()->route()->getName(), 'upload\finish'))
                   @livewire('Dashboard.Documents.Upload.Finish')
                @endif --}}
            </div>
        </div>
    </div>
</div>

@push('script-body-field')
    <!-- script layout -->
    <script src="{{ asset('assets/upload/slideStep/slidestep.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/pdf.js/main.js') }}"></script> --}}
    
    <!-- script drag -->
    {{-- <script>
        dragElement(document.getElementById("draggableQrCode"));
        function dragElement(elmnt) {
            var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
            if (document.getElementById(elmnt.id + "header")) {
                /* if present, the header is where you move the DIV from:*/
                document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
            } else {
                /* otherwise, move the DIV from anywhere inside the DIV:*/
                elmnt.onmousedown = dragMouseDown;
            }
    
            function dragMouseDown(e) {
                e = e || window.event;
                e.preventDefault();
                // get the mouse cursor position at startup:
                pos3 = e.clientX;
                pos4 = e.clientY;
                document.onmouseup = closeDragElement;
                // call a function whenever the cursor moves:
                document.onmousemove = elementDrag;
            }
    
            function elementDrag(e) {
                e = e || window.event;
                e.preventDefault();
                // calculate the new cursor position:
                pos1 = pos3 - e.clientX;
                pos2 = pos4 - e.clientY;
                pos3 = e.clientX;
                pos4 = e.clientY;
                // set the element's new position:
                elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
                elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
            }
    
            function closeDragElement() {
                /* stop moving when mouse button is released:*/
                document.onmouseup = null;
                document.onmousemove = null;
            }
        }
        // document.addEventListener('alpine:init', () => {
        //     Alpine.data('qrCodeComponent', () => ({
        //         qrCodeData: null,
        //     }));
        // });
        document.addEventListener('livewire:initialized', function() {
            window.generateQrCode = function() {
                Livewire.emit('generateQrCode');
            }
            
            
        });
        document.addEventListener('livewire:init', function() {
            window.addEventListener('qrCodeGenerated', function(event) {
                console.log('QR Code Base64:', event.detail.qrCodeBase64);
                console.log('QR Code Base64:', event.detail.qrCode);
                console.log('QR JSON Data:', event.detail.qrJson);
                console.log('fullname:', event.detail.fullname);
                // Jika Anda ingin menampilkan QR Code
                // let img = document.createElement('img');
                // img.src = `data:image/svg+xml;base64,${event.detail.qrCodeBase64}`;
                // document.querySelector('.qrCodeContainer').appendChild(img);
            });
        });
    </script> --}}
    @if ($stepUpload == 2)
        <script>
            console.log("Step upload 2");
            document.addEventListener('DOMContentLoaded', function () {
                const temporaryUrl = "{{ session('uploadedFileUrl') }}";
                console.log(temporaryUrl);

                const canvas = document.getElementById('pdfRender');
                console.log(document.getElementById('pdfRender'));
                if (!canvas) {
                    console.error("Canvas element with id 'pdfRender' not found!");
                    return; // Hentikan eksekusi jika canvas tidak ditemukan
                }
                const ctx = canvas.getContext('2d');
                const scale = 1;

                let pdfDoc = null,
                    pageNum = 1,
                    pageIsRendering = false,
                    pageNumIsPending = null;

                // Render page
                const renderPage = (num) => {
                    pageIsRendering = true;

                    // Get page
                    pdfDoc.getPage(num).then((page) => {
                        // Set scale
                        const viewport = page.getViewport({ scale });
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        const renderCtx = {
                            canvasContext: ctx,
                            viewport,
                        };
                        // Render PDF page into canvas context
                        page.render(renderCtx).promise.then(() => {
                            pageIsRendering = false;

                            if (pageNumIsPending !== null) {
                                renderPage(pageNumIsPending);
                                pageNumIsPending = null;
                            }
                        });

                        // Output current page
                        document.getElementById('page-num').textContent = num;
                    });
                };

                // Check for pages rendering
                const queueRenderPage = (num) => {
                    if (pageIsRendering) {
                        pageNumIsPending = num;
                    } else {
                        renderPage(num);
                    }
                };

                // Show previous page
                const showPrevPage = () => {
                    if (pageNum <= 1) {
                        return;
                    }
                    pageNum--;
                    queueRenderPage(pageNum);
                };

                // Show next page
                const showNextPage = () => {
                    if (pageNum >= pdfDoc.numPages) {
                        return;
                    }
                    pageNum++;
                    queueRenderPage(pageNum);
                };

                // Get document
                // const loadingTask = pdfjsLib.getDocument({
                //     url: temporaryUrl,
                //     httpHeaders: {
                //         Authorization: 'Bearer your-access-token-here'
                //     }
                // });
                pdfjsLib.getDocument(temporaryUrl).promise.then((pdfDoc_) => {
                    pdfDoc = pdfDoc_;
                    console.log(pdfDoc);

                    document.getElementById('page-count').textContent = pdfDoc.numPages;

                    renderPage(pageNum);
                }).catch((error) => {
                console.error("Error loading PDF document:", error);
            });

                // Button events
                document.getElementById('prev-page').addEventListener('click', showPrevPage);
                document.getElementById('next-page').addEventListener('click', showNextPage);

                    // canvas = document.querySelector('#pdf-render'),
                    // ctx = canvas.getContext('2d');
            })
            
        </script>
    @endif
@endpush
        {{-- // document.addEventListener('livewire:load', function () {
        //     Livewire.on('updateUrl', url => {
        //         window.history.pushState({}, '', url);
        //     });
        // }); --}}