<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rekomendasi Layanan untuk Anda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tailwind CDN (styling modern) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold text-center mb-6">Rekomendasi Layanan untuk Anda</h2>

        @if ($recommendations->isEmpty())
    
            <p class="text-center text-gray-600">Belum ada rekomendasi yang tersedia saat ini.</p>
        @else
            <ul class="space-y-6">
                @foreach ($recommendations as $item)
                    <li class="border p-4 rounded hover:shadow transition">
                        <h3 class="text-xl font-semibold text-blue-700">{{ $item['nama'] }}</h3>
                        <p class="text-gray-700 mt-1">{{ $item['deskripsi'] }}</p>
                        <p class="text-sm text-gray-500 mt-2">Skor Kecocokan: <strong>{{ $item['score'] }}</strong></p>
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="mt-8 text-center">
            <a href="{{ route('rate') }}" class="text-blue-600 hover:underline">
                Ubah Preferensi
            </a>
        </div>
    </div>
</body>
</html>
