@extends('dashboard.layouts.main')
@section('title', 'Detail Pembayaran')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-6 border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">💳 Ringkasan Pesanan</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700 text-sm">
            <div><span class="font-medium text-gray-600">Nama Pemesan:</span> {{ $order->nama_pemesan }}</div>
            <div><span class="font-medium text-gray-600">Email:</span> {{ $order->email }}</div>
            <div><span class="font-medium text-gray-600">No. WhatsApp:</span> {{ $order->whatsapp }}</div>
            <div><span class="font-medium text-gray-600">Layanan:</span> {{ $order->service_name }}</div>
            <div><span class="font-medium text-gray-600">Tanggal Acara:</span>
                {{ \Carbon\Carbon::parse($order->tanggal_acara)->format('d M Y') }}</div>
            <div><span class="font-medium text-gray-600">Catatan:</span> {{ $order->catatan ?: '-' }}</div>
            <div><span class="font-medium text-gray-600">Status:</span>
                @if ($order->status == 'lunas')
                    <span class="text-green-600 font-semibold">Lunas</span>
                @elseif($order->status == 'pending')
                    <span class="text-yellow-500 font-semibold">Menunggu Pembayaran</span>
                @else
                    <span class="text-gray-500 font-semibold capitalize">{{ $order->status }}</span>
                @endif
            </div>

            @if ($order->harga_final)
                <div class="sm:col-span-2 mt-2">
                    <span class="font-medium text-gray-600">Total Pembayaran:</span>
                    <span class="text-lg font-bold text-indigo-600">Rp
                        {{ number_format($order->harga_final, 0, ',', '.') }}</span>
                </div>
            @endif
        </div>

        @if ($order->harga_final && $order->status !== 'lunas')
            <div class="mt-6 text-center">
                <button id="pay-button"
                    class="inline-block px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 transition">
                    Bayar Sekarang
                </button>
            </div>
        @elseif($order->status === 'lunas')
            <div class="mt-6 text-center text-green-600 font-semibold">
                Pembayaran telah diterima. Terima kasih!
            </div>
        @else
            <div class="mt-6 text-center text-red-500 font-semibold">
                Harga final belum ditentukan oleh admin. Harap tunggu konfirmasi.
            </div>
        @endif
    </div>

    @if ($order->harga_final && $order->status !== 'lunas')
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
        </script>
        <script>
            document.getElementById('pay-button').addEventListener('click', function() {
                fetch('/generate-snap-token/{{ $order->id }}')
                    .then(res => res.json())
                    .then(data => {
                        window.snap.pay(data.snapToken);
                    });
            });
        </script>
    @endif
@endsection
