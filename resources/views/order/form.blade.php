@extends('dashboard.layouts.main')
@section('title', 'Dashboard')
@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-white to-blue-200 p-6">
        <div class="bg-white p-10 rounded-2xl shadow-lg w-full max-w-xl border border-blue-200">
            <h2 class="text-3xl font-extrabold text-blue-800 mb-8 text-center tracking-wide">Form Pemesanan Layanan</h2>

            <form method="POST" action="{{ route('order.submit') }}" class="space-y-6">
                @csrf
                <input type="hidden" name="service_name" value="{{ $service }}">

                <div>
                    <label class="font-semibold text-gray-700 block mb-2">Layanan</label>
                    <input type="text" value="{{ $service }}" disabled
                        class="w-full border border-blue-200 rounded-lg px-4 py-2 bg-blue-50 text-blue-700 font-medium cursor-not-allowed">
                </div>

                <div>
                    <label class="font-semibold text-gray-700 block mb-2">Nama Pemesan</label>
                    <input type="text" name="nama_pemesan" required
                        class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300 transition">
                </div>

                <div>
                    <label class="font-semibold text-gray-700 block mb-2">Email</label>
                    <input type="email" name="email" required
                        class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300 transition">
                </div>

                <div>
                    <label for="whatsapp" class="block text-sm font-semibold text-gray-700 mb-2">No. WhatsApp</label>
                    <input type="text" name="whatsapp" id="whatsapp"
                        class="block w-full border border-blue-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300 transition"
                        placeholder="08xxxxxxxxxx" required>
                </div>

                <div>
                    <label class="font-semibold text-gray-700 block mb-2">Tanggal Acara</label>
                    <input type="date" name="tanggal_acara" required
                        class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300 transition">
                </div>

                <div>
                    <label class="font-semibold text-gray-700 block mb-2">Catatan (Opsional)</label>
                    <textarea name="catatan" rows="3"
                        class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300 transition"></textarea>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-400 text-white py-3 rounded-lg font-bold hover:from-blue-700 hover:to-blue-500 transition shadow">
                    Kirim Pesanan
                </button>
            </form>
        </div>
    </div>
@endsection
