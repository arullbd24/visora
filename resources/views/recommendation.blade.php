<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rekomendasi Layanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-slate-100 to-white min-h-screen py-10 px-4">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-center text-indigo-700 mb-10">Rekomendasi Layanan Untukmu</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach($recommendations as $recommendation)
                <div class="bg-white border border-gray-200 rounded-xl shadow hover:shadow-md transition p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $recommendation['nama'] }}</h2>
                    <p class="text-gray-600 mb-4">{{ $recommendation['deskripsi'] }}</p>
                    <div class="text-sm text-blue-600 font-medium">
                        Skor Kecocokan: {{ $recommendation['score'] * 100 }}%
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
