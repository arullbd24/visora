<div>
    <div class="c">
        <div class="ctr-headerDetailSign">
            <div class="cHeaderDetailSign md:flex justify-between">
                <div class="leftDetailSign">
                    <div class="typeSign text-xl">
                        <strong class="font-semibold">{{ ucwords($type_sign) }} Document</strong>
                    </div>
                    <div class="nmeDocs mt-1.5">
                        <p>Document: <b>{{ $fileDisk_data->file_client_name }}</b> </p>
                    </div>
                </div>
                <div class="rghtDetailSign max-md:mt-8">
                    <div class="headerRghtDetail text-center text-lg">
                        <strong class="font-semibold">Author</strong>
                    </div>
                    <div class="cRghtDetailSign mt-2 flex md:flex-row-reverse gap-4 items-center">
                        <div class="iconAuthor">
                            <ag-icon class="flex items-center justify-center size-12 text-xl rounded-full bg-orange-200 text-blue-600">
                                <i class="fas fa-user{{ $authorDocument->status ? '' : '-slash' }}"></i>
                            </ag-icon>
                        </div>
                        <div class="detailAuthor">
                            <div class="nmeAuthor">
                                <p>Name: {{ $authorDocument->data->fullname }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            x-data="pdfViewer"
            class="ctr-mainSignPdf relative mt-8">
            
            <div class="cMainSignPdf rounded-lg">
                <div class="ctr-actionPdfSign bg-blue-600 p-3 rounded-t-lg">
                    <div class="cActionPdfSign flex justify-between items-center">
                        <div class="leftActionPdfSign">
                            <div class="pdfActionBTn flex items-center gap-4">
                                <div class="prevAction">
                                    <button @click="showPrevPage" class="flex items-center gap-3 px-2 py-1 rounded-xl bg-blue-800 text-white hover:bg-blue-900">
                                        <ag-icon class="flex items-center justify-center size-8">
                                            <i class="fas fa-arrow-left"></i>
                                        </ag-icon>
                                        <p>Prev Page</p>
                                    </button>
                                </div>
                                <div class="prevAction">
                                    <button @click="showNextPage" class="flex items-center gap-3 px-2 py-1 rounded-xl bg-blue-800 text-white hover:bg-blue-900">
                                        <p>Next Page</p>
                                        <ag-icon class="flex items-center justify-center size-8">
                                            <i class="fas fa-arrow-right"></i>
                                        </ag-icon>
                                    </button>
                                </div>
                                <div class="page-info text-white">
                                    Page <input type="number" x-model="pageNum" @keyup.debounce="setPage" class="rounded-md hide-input-arrow p-1 text-center bg-blue-500 border-none outline-none" style="width: 26px;"> of <span x-text="pageCount"></span>
                                </div>
                            </div>
                        </div>
                        <div class="rghtActionPdfSign">
                            <div class="placeSignAction">
                                <button 
                                    {{-- @click="$store.signModalStatus.value = !$store.signModalStatus.value"  --}}
                                    @click="$dispatch('showmodalsign')"
                                    {{-- @click="$dispatch('generateSignQrCode')" --}}
                                    class="flex items-center gap-3 px-2 py-1 rounded-xl bg-blue-800 text-white hover:bg-blue-900"
                                    >
                                    <p>Place sign</p>
                                    <ag-icon class="flex items-center justify-center size-8">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#fff" fill="none">
                                            <path d="M3 6C3 4.58579 3 3.87868 3.43934 3.43934C3.87868 3 4.58579 3 6 3C7.41421 3 8.12132 3 8.56066 3.43934C9 3.87868 9 4.58579 9 6C9 7.41421 9 8.12132 8.56066 8.56066C8.12132 9 7.41421 9 6 9C4.58579 9 3.87868 9 3.43934 8.56066C3 8.12132 3 7.41421 3 6Z" stroke="currentColor" stroke-width="1.5" />
                                            <path d="M3 18C3 16.5858 3 15.8787 3.43934 15.4393C3.87868 15 4.58579 15 6 15C7.41421 15 8.12132 15 8.56066 15.4393C9 15.8787 9 16.5858 9 18C9 19.4142 9 20.1213 8.56066 20.5607C8.12132 21 7.41421 21 6 21C4.58579 21 3.87868 21 3.43934 20.5607C3 20.1213 3 19.4142 3 18Z" stroke="currentColor" stroke-width="1.5" />
                                            <path d="M3 12L9 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 3V8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M15 6C15 4.58579 15 3.87868 15.4393 3.43934C15.8787 3 16.5858 3 18 3C19.4142 3 20.1213 3 20.5607 3.43934C21 3.87868 21 4.58579 21 6C21 7.41421 21 8.12132 20.5607 8.56066C20.1213 9 19.4142 9 18 9C16.5858 9 15.8787 9 15.4393 8.56066C15 8.12132 15 7.41421 15 6Z" stroke="currentColor" stroke-width="1.5" />
                                            <path d="M21 12H15C13.5858 12 12.8787 12 12.4393 12.4393C12 12.8787 12 13.5858 12 15M12 17.7692V20.5385M15 15V16.5C15 17.9464 15.7837 18 17 18C17.5523 18 18 18.4477 18 19M16 21H15M18 15C19.4142 15 20.1213 15 20.5607 15.44C21 15.8799 21 16.5881 21 18.0043C21 19.4206 21 20.1287 20.5607 20.5687C20.24 20.8898 19.7767 20.9766 19 21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                    </ag-icon>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ctr-pdfView relative border border-gray-400 rounded-b-lg">
                    <div class="cPdfView">
                        <div x-ref="loadCanvas" class="loadCanvas w-full h-[80vh] bg-black/60 absolute top-full left-0 flex items-center justify-center">
                            <ag-icon class="text-6xl text-white">
                                <i class="fas fa-spinner animate-spin"></i>
                            </ag-icon>
                        </div>
                        <div x-show="canvasIsRendering" class="ctr-canvas p-2 md:p-8 xl:p-12 flex items-center justify-center relative" style="display: none;">
                            <div class="cCanvas relative rounded-lg overflow-hidden outline outline-gray-200" x-ref="pdfElement">
                                <div x-show="pageIsRendering" class="loadCanvas size-full bg-black/60 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex items-center justify-center" style="display: none;">
                                    <ag-icon class="text-6xl text-white">
                                        <i class="fas fa-spinner animate-spin"></i>
                                    </ag-icon>
                                </div>
                                <canvas x-ref="pdfRender" class="size-full"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('additional-content')
    <div x-data="placeSignature" 
        @showmodalsign.window="changeDisplayModal" 
        {{-- x-show="modalStatus"
        x-transition --}}
        class="ctr-modalPlaceSignature w-[26rem] p-2 bg-white rounded-lg shadow-md shadow-gray-400 fixed left-1/2 -translate-x-1/2 -translate-y-1/2 transition-all top-2/3 invisible opacity-0"
        :class="{'top-1/2 visible opacity-100': modalStatus, 'top-2/3 invisible opacity-0': !modalStatus}"
        {{-- style="display: none;" --}}
        >
        <div class="cModalPlaceSignature h-full">
            
            <div class="headerModalPlaceSignature relative select-none">
                <div class="detailHeaderModal">
                    <div class="txHeaderModal">
                        <strong class="text-lg font-semibold">Place Signature</strong>  
                    </div>
                    <div class="detailDocsModel mt-1.5">
                        <div class="txNmeDocs">
                            <p>Document: <b>{{ $fileDisk_data->file_client_name }}</b> </p>
                        </div>
                        <div class="txAuthorDocs text-sm">
                            <p>{{ $authorDocument->data->fullname }}</p>
                        </div>
                    </div>
                </div>
                </div>
                <div class="closeModal absolute right-1 top-1">
                    <button
                        @click="closeDisplayModal" 
                        class="btnClose size-9 flex items-center justify-center rounded-lg border border-black">
                        <ag-icon class="text-xl">
                            <i class="fas fa-xmark"></i>
                        </ag-icon>
                    </button>
                </div>
            </div>
            
            @livewire('Dashboard.SignIniti.Action')
        </div>
    </div>
@endpush


@push('script-body-field')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js" data-navigate-once></script>
    <script>
        Alpine.store('pdfStore', {
            idDocument: "{{ $id_document }}",
            pageNum: null,
            positionSign: {
                x: null,
                y: null,
            },
            dataSign: {
                status: false,
                idSign: null,
                typeSign: null,
            },
        });
        
        Alpine.store('qrElementStatus', {
            value: false,
        });
    </script>
    <script>
        Alpine.data('pdfViewer', () => {
            let pdfDoc = null;
            return {
                pageNum: 1,
                pageInputNum: 1,
                pageCount: 0,
                pageIsRendering: false,
                pageNumIsPending: null,
                scale: 1,
                canvas: null,
                canvasIsRendering: false,
                ctx: null,
                
                init() {
                    this.canvas = this.$refs.pdfRender;
                    this.ctx = this.canvas.getContext('2d');
                    
                    const url = "{{ route('place_sign.view_file', ['token' => $token]) }}";
                    this.loadPdf(url);
                },
                
                async loadPdf(url) {
                    try {
                        pdfDoc = await pdfjsLib.getDocument(url).promise;
                        this.pageCount = pdfDoc.numPages;
                        
                        this.firstRenderPage();
                    } 
                    catch (error) {
                        console.error('Error loading PDF:', error);
                    }
                },
                
                firstRenderPage() {
                    this.pageIsRendering = true;
                    
                    pdfDoc.getPage(1).then(page => {
                        const viewport = page.getViewport({ scale: this.scale });
                        
                        this.canvas.height = viewport.height;
                        this.canvas.width = viewport.width;
                        
                        const renderCtx = {
                            canvasContext: this.ctx,
                            viewport,
                        };
                        
                        this.canvasIsRendering = true;
                        this.$refs.loadCanvas.remove();
                        
                        page.render(renderCtx).promise.then(() => {
                            this.pageIsRendering = false;
                            
                            if (this.pageNumIsPending !== null) {
                                this.renderPage(this.pageNumIsPending);
                                this.pageNumIsPending = null;
                            }
                        });
                        Alpine.store('pdfStore').pageNum = 1;
                        this.pageNum = 1;
                    }).catch((error) => {
                        console.error('Error rendering page:', error);
                    });
                },
                
                renderPage(num) {
                    this.pageIsRendering = true;
                    
                    pdfDoc.getPage(num).then(page => {
                        const viewport = page.getViewport({ scale: this.scale });
                        
                        this.canvas.height = viewport.height;
                        this.canvas.width = viewport.width;
                        
                        const renderCtx = {
                            canvasContext: this.ctx,
                            viewport,
                        };
                        
                        page.render(renderCtx).promise.then(() => {
                            this.pageIsRendering = false;
                            
                            if (this.pageNumIsPending !== null) {
                                this.renderPage(this.pageNumIsPending);
                                this.pageNumIsPending = null;
                            }
                        });
                        Alpine.store('pdfStore').pageNum = num;
                        this.pageNum = num;
                    }).catch((error) => {
                        console.error('Error rendering page:', error);
                    });
                },
                
                queueRenderPage(num) {
                    if (this.pageIsRendering) {
                        this.pageNumIsPending = num;
                    } else {
                        this.renderPage(num);
                    }
                },
                
                showPrevPage() {
                    if (this.pageNum <= 1) {
                        this.pageNum = this.pageCount;
                    } else {
                        this.pageNum--;
                    }
                    this.queueRenderPage(this.pageNum);
                },
                
                showNextPage() {
                    if (this.pageNum >= this.pageCount) {
                        this.pageNum = 1;
                    } else {
                        this.pageNum++;
                    }
                    this.queueRenderPage(this.pageNum);
                },
                
                setPage(event) {
                    let evVal = parseInt(event.target.value);
                    let valWidth = 20 + (evVal.toString().length * 6) + 'px';
                    event.target.style.width = valWidth;
                    
                    if (isNaN(evVal) || evVal < 1) {
                        evVal = 1;
                    }
                    
                    if (evVal > this.pageCount) {
                        evVal = this.pageCount;
                    }
                    
                    event.target.value = evVal;
                    
                    if (evVal == this.pageInputNum) {
                        valWidth = 20 + (evVal.toString().length * 6) + 'px';
                        event.target.style.width = valWidth;
                        return;
                    }
                    
                    
                    this.pageInputNum = evVal;
                    this.queueRenderPage(evVal);
                }
            }
        });
    </script>
    <script>
        Alpine.data('placeSignature', () => {
            return {
                modalStatus: false,
                
                changeDisplayModal() {
                    if (this.$store.pdfStore.dataSign.status) {
                        return;
                    }
                    this.modalStatus = !this.modalStatus;
                },
                
                closeDisplayModal() {
                    console.log('close modal');
                    this.modalStatus = false;
                },
                
                awayCloseDisplayModal() {
                    console.log('away close modal');
                    if (this.$el.click)
                    this.modalStatus = false;
                }
            }
        });
    </script>
@endpush