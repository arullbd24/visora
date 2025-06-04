@section('head-style-field')
    <style>
        #qr-reader {
            width: 300px;
            margin: 50px auto;
            text-align: center;
        }
    </style>
@endsection

<div>
    <h1 style="text-align: center;">QR Code Scanner with Laravel Livewire</h1>
    <div id="qr-reader"></div>
    <div id="qr-result">Result: <span>{{ $qrCodeResult }}</span></div>
    <button id="stop-scanner" style="display: none;">Stop Scanning</button>
    {{-- <div style="width: 500px" id="reader"></div> --}}
    <script>
        
    </script>
</div>

@section('script-field')
    <script>
        $(document).ready(function () {
            const QR_RESULT_ELMNT = $('#qr-result');
            const stopButton = document.getElementById("stop-scanner");
            let QR_RESULT;
            
            // const scanner = new Html5QrcodeScanner('qr-reader');
            const scanner = new Html5QrcodeScanner('qr-reader', {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250,
                    },
                });
            
            scanner.render(onScanSuccess, onScanFailure);
            
            function onScanSuccess(decodedText, decodedResult) {
                // scanner.stop().then(() => {
                //     console.log("QR Scanning stopped.");
                //     QR_RESULT_ELMNT.find('span').html(decodedText);
                    
                // }).catch(err => {
                //     console.error("Error stopping scanning: ", err);
                // });
                QR_RESULT = decodedText;
                QR_RESULT_ELMNT.find('span').html(decodedText);
                // Livewire.emit('handleQrCodeScanned', decodedText);
                // console.log(`Code matched = ${decodedText}`, decodedResult);
            }
            function onScanFailure(err) {
                console.warn(`QR error = ${error}`);
            }
            
            // window.Livewire.emit('handleQrCodeScanned', QR_RESULT);
            
            scanner.start(
                {facingMode: "environment"},
                {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250,
                    },
                },
                onScanSuccess,
                onScanFailure,
            ).catch(err => {
                console.error(`Unable to start scanning: ${err}`);
            });
            ////////
            // document.addEventListener('livewire:load', function () {
            // });
            // function onScanSuccess(decodedText, decodedResult) {
            //     // Kirim hasil scan ke Livewire component
            //     Livewire.emit('qrCodeScanned', decodedText);
            //     console.log(`Code matched = ${decodedText}`, decodedResult);
            //     // console.log(`Scan result: ${decodedText}`, decodedResult)
            // }
    
            // function onScanFailure(error) {
            //     // Dapat digunakan untuk menangani kesalahan saat pemindaian
            //     console.warn(`QR error = ${error}`);
            // }
    
            // // Inisialisasi pemindai QR code
            // let qrCodeScanner = new Html5Qrcode("qr-reader");
    
            // // Konfigurasi pemindai, disini 'width' menentukan ukuran viewport kamera
            // const config = { 
            //     fps: 10, 
            //     qrbox: { width: 250, height: 250 } 
            // };
            // // qrCodeScanner.getCameras().then(devices => {
            // //     console.log(devices);
            // //     if(devices && devices.length) {
            // //         var cameraId = devices[0].id;
            // //         console.log(cameraId)
            // //     }
            // // });
            
            // qrCodeScanner.start(
            //     {facingMode: "environment"},
            //     config,
            //     onScanSuccess,
            //     onScanFailure
            // ).catch((err) => {
            //     console.error(`Unable to start scanning, error: ${err}`);
            // });
            
            // qrCodeScanner.start({ facingMode: "environment" }, config, onScanSuccess, onScanFailure)
            //     .catch(err => {
            //         console.error(`Unable to start scanning, error: ${err}`);
            //     });
            
            // function onScanSuccess(decodedText, decodedResult) {
            //         // Kirim hasil scan ke Livewire component
            //         // Livewire.emit('qrCodeScanned', decodedText);
            //         // console.log(`Code matched = ${decodedText}`, decodedResult);
            //         console.log(`Scan result: ${decodedText}`, decodedResult)
            //     }
            ///////
    
    
            // function onScanSuccess(decodedText, decodedResult) {
            //     // Handle on success condition with the decoded text or result.
            //     console.log(`Scan result: ${decodedText}`, decodedResult);
            // }
    
            // var html5QrcodeScanner = new Html5QrcodeScanner(
            //     // "reader", { fps: 30, qrbox: 250 },
            //     "qr-reader", { fps: 30, qrbox: 250 },
            // );
            // html5QrcodeScanner.render(onScanSuccess);
        });
        
    </script>
@endsection