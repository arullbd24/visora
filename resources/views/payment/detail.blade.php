@extends('dashboard.layouts.main')
@section('title', 'Detail Pembayaran')
@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-gradient-to-br from-indigo-50 via-white to-indigo-100 shadow-xl rounded-2xl p-8 border border-indigo-200">
        <h2 class="text-3xl font-extrabold text-indigo-700 mb-8 border-b-2 border-indigo-200 pb-3 flex items-center gap-2">
            <span>💳</span> Ringkasan Pesanan
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-gray-800 text-base">
            <div>
                <span class="font-semibold text-indigo-600">Nama Pemesan:</span>
                <span class="ml-2">{{ $order->nama_pemesan }}</span>
            </div>
            <div>
                <span class="font-semibold text-indigo-600">Email:</span>
                <span class="ml-2">{{ $order->email }}</span>
            </div>
            <div>
                <span class="font-semibold text-indigo-600">No. WhatsApp:</span>
                <span class="ml-2">{{ $order->whatsapp }}</span>
            </div>
            <div>
                <span class="font-semibold text-indigo-600">Layanan:</span>
                <span class="ml-2">{{ $order->service_name }}</span>
            </div>
            <div>
                <span class="font-semibold text-indigo-600">Tanggal Acara:</span>
                <span class="ml-2">{{ \Carbon\Carbon::parse($order->tanggal_acara)->format('d M Y') }}</span>
            </div>
            <div>
                <span class="font-semibold text-indigo-600">Catatan:</span>
                <span class="ml-2">{{ $order->catatan ?: '-' }}</span>
            </div>
            <div>
                <span class="font-semibold text-indigo-600">Status:</span>
                <span class="ml-2">
                    @if ($order->status == 'lunas')
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded font-bold">Lunas</span>
                    @elseif($order->status == 'pending')
                        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded font-bold">Menunggu Pembayaran</span>
                    @else
                        <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded font-bold capitalize">{{ $order->status }}</span>
                    @endif
                </span>
            </div>
            @if ($order->harga_final)
                <div class="sm:col-span-2 mt-2 flex items-center justify-between bg-indigo-50 rounded-lg px-4 py-3 border border-indigo-100">
                    <span class="font-semibold text-indigo-700">Total Pembayaran:</span>
                    <span class="text-xl font-extrabold text-indigo-600">Rp {{ number_format($order->harga_final, 0, ',', '.') }}</span>
                </div>
            @endif
        </div>
        @if ($order->harga_final && $order->status !== 'lunas')
            <div class="mt-8 text-center">
                <button id="pay-button"
                    class="inline-block px-8 py-4 bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-bold rounded-xl shadow-lg hover:scale-105 hover:from-indigo-600 transition-all duration-200">
                    Bayar Sekarang
                </button>
            </div>
        @elseif($order->status === 'lunas')
            <div class="mt-8 text-center text-green-700 font-bold text-lg">
                ✅ Pembayaran telah diterima. Terima kasih!
            </div>
        @else
            <div class="mt-8 text-center text-red-600 font-bold text-lg">
                ⚠️ Harga final belum ditentukan oleh admin. Harap tunggu konfirmasi.
            </div>
        @endif
    </div>

    @if ($order->harga_final && $order->status !== 'lunas')
        <script type="text/javascript">
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function() {
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        alert("Payment Success!");
                        console.log(result);
                    },
                    onPending: function(result) {
                        alert("Waiting for payment...");
                        console.log(result);
                    },
                    onError: function(result) {
                        alert("Payment Failed!");
                        console.log(result);
                    },
                    onClose: function() {
                        alert("You closed the popup.");
                    }
                });
            });
        </script>
    @endif
@endsection
