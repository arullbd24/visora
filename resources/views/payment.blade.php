<!DOCTYPE html>
<html>
<head>
    <title>Bayar dengan Midtrans</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body>
    <h1>Bayar Sekarang</h1>
    <button id="pay-button">Bayar</button>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){ alert("Pembayaran sukses!"); },
                onPending: function(result){ alert("Menunggu pembayaran..."); },
                onError: function(result){ alert("Pembayaran gagal."); },
                onClose: function(){ alert("Anda menutup popup pembayaran."); }
            });
        });
    </script>
</body>
</html>
