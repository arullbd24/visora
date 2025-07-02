<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Layanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold text-blue-700 mb-4">Tambah Layanan Baru</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Layanan</label>
                <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                <textarea name="description" rows="2" class="w-full border px-3 py-2 rounded" required></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Detail Layanan</label>
                <textarea name="details" rows="5" class="w-full border px-3 py-2 rounded" placeholder="Contoh: Harga, perangkat, jadwal meeting, dll..."></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Kategori (Opsional)</label>
                <input type="text" name="categories" class="w-full border px-3 py-2 rounded" placeholder="contoh: wedding, graduation">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan Layanan
            </button>
        </form>
    </div>

</body>
</html>
