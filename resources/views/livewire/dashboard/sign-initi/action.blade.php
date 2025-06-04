<div
    x-data="actionPlaceSignature"
    class="ctr-modalContentPlaceSignature mt-4 pr-2 h-96 overflow-auto overflow-c overflow-c-gray relative">
    <div class="cModalContentPlaceSignature">
        
        
        
        
        
        <button
            @click="$dispatch('actionGenerateQrCode')"
            >
            Click
        </button>
        @for ($i = 0; $i < 50; $i++)
            <p>{{ $i }}. Bjir</p>
        @endfor
    </div>
</div>


@push('script-body-field')
    <script>
        Alpine.data('actionPlaceSignature', () => {
            return {
                modalStatus: false,
                
                changeDisplayModal() {
                    this.modalStatus = !this.modalStatus;
                },
                
                generateQR() {
                    console.log('click to event generate qr code');
                    this.$dispatch('actionGenerateQrCode');
                    // this.$dispatch('generateSignQrCode');
                }
            }
        });
    </script>
@endpush