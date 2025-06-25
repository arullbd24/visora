<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Preferensi Layanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-white min-h-screen flex items-center justify-center p-6">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6 text-blue-700">Preferensi Layanan</h1>

        <form action="{{ route('rate') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-gray-800 font-medium mb-1">
                    Seberapa kamu menyukai layanan yang <strong>profesional</strong>?
                </label>
                <input type="number" name="ratings[profesional]" min="1" max="10" placeholder="Nilai 1-10"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-800 font-medium mb-1">
                    Seberapa kamu menyukai layanan yang <strong>cinematic</strong>?
                </label>
                <input type="number" name="ratings[cinematic]" min="1" max="10" placeholder="Nilai 1-10"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-800 font-medium mb-1">
                    Seberapa kamu menyukai layanan yang <strong>formal</strong>?
                </label>
                <input type="number" name="ratings[formal]" min="1" max="10" placeholder="Nilai 1-10"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-800 font-medium mb-1">
                    Seberapa kamu menyukai layanan yang <strong>informal</strong>?
                </label>
                <input type="number" name="ratings[informal]" min="1" max="10" placeholder="Nilai 1-10"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-800 font-medium mb-1">
                    Kamu sedang mencari layanan untuk keperluan apa?
                </label>
                <select name="tujuan_pemesanan"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400">
                    <option disabled selected>Pilih salah satu...</option>
                    <option value="wedding">Wedding</option>
                    <option value="graduation">Graduation</option>
                    <option value="company_profile">Company Profile</option>
                    <option value="yearbook">Yearbook</option>
                </select>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Simpan & Lihat Rekomendasi
            </button>
        </form>
    </div>
</body>
</html>
