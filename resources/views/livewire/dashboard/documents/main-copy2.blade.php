<div>
    @php
        $listLivewire = [
            "documents.main" => "Dashboard.Documents.Page.Main",
            "documents.draft" => "Dashboard.Documents.Page.Draft",
            "documents.pending" => "Dashboard.Documents.Page.Pending",
            "documents.approved" => "Dashboard.Documents.Page.Approved",
            "documents.rejected" => "Dashboard.Documents.Page.Rejected",
            "documents.withdraw" => "Dashboard.Documents.Page.Withdraw",
            // "documents.expired" => "Dashboard.Documents.Page.Expired",
        ];
    @endphp
    
    {{ Route::currentRouteName() }}
    @livewire($listLivewire[Route::currentRouteName()], ['lazy' => true])
    
</div>

@push('script-body-field')
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
@endpush