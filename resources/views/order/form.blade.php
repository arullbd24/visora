<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pemesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-lg">
        <h2 class="text-2xl font-bold text-blue-700 mb-6">Form Pemesanan Layanan</h2>
        <form method="POST" action="{{ route('order.submit') }}" class="space-y-4">
            @csrf
            <input type="hidden" name="service_name" value="{{ $service }}">

            <div>
                <label class="font-medium text-gray-700 block mb-1">Layanan</label>
                <input type="text" value="{{ $service }}" disabled
                       class="w-full border rounded px-3 py-2 bg-gray-100 text-gray-600">
            </div>

            <div>
                <label class="font-medium text-gray-700 block mb-1">Nama Pemesan</label>
                <input type="text" name="nama_pemesan" required
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="font-medium text-gray-700 block mb-1">Email</label>
                <input type="email" name="email" required
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="font-medium text-gray-700 block mb-1">Tanggal Acara</label>
                <input type="date" name="tanggal_acara" required
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="font-medium text-gray-700 block mb-1">Catatan (Opsional)</label>
                <textarea name="catatan" rows="3"
                          class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"></textarea>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Kirim Pesanan
            </button>
        </form>
    </div>
</body>
</html>
