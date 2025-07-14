@extends('dashboard.layouts.main')
@section('title', 'Detail Pembayaran')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Detail Pemesanan</h2>

    <div class="space-y-4 text-gray-700">
        <div><strong>Nama Pemesan:</strong> {{ $order->nama_pemesan }}</div>
        <div><strong>Email:</strong> {{ $order->email }}</div>
        <div><strong>No. WhatsApp:</strong> {{ $order->whatsapp }}</div>
        <div><strong>Layanan:</strong> {{ $order->service_name }}</div>
        <div><strong>Tanggal Acara:</strong> {{ \Carbon\Carbon::parse($order->tanggal_acara)->format('d M Y') }}</div>
        <div><strong>Catatan:</strong> {{ $order->catatan }}</div>
        <div><strong>Status:</strong> {{ $order->status }}</div>

        @if ($order->harga_final)
            <div><strong>Total Pembayaran:</strong> Rp {{ number_format($order->harga_final, 0, ',', '.') }}</div>

            <button id="pay-button" 
                    class="mt-4 px-6 py-2 bg-indigo-600 text-white font-medium rounded hover:bg-indigo-700 transition">
                Bayar Sekarang
            </button>
        @else
            <div class="text-red-500 font-semibold mt-4">
                Harga final belum ditentukan oleh admin. Harap tunggu konfirmasi.
            </div>
        @endif
    </div>
</div>

@if ($order->harga_final)
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    document.getElementById('pay-button').addEventListener('click', function () {
        // Di tahap lanjut, kamu bisa generate Snap token di controller dan oper ke sini
        fetch('/generate-snap-token/{{ $order->id }}')
            .then(res => res.json())
            .then(data => {
                window.snap.pay(data.snapToken);
            });
    });
</script>
@endif
@endsection