<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Rekomendasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-100 to-white min-h-screen py-10 px-6">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-center text-blue-800 mb-10">Hasil Rekomendasi Layanan</h1>

        @if ($recommendations->isEmpty())
            <div class="text-center text-gray-500">Belum ada rekomendasi yang cocok.</div>
        @else
            <div class="grid md:grid-cols-2 gap-6">
                @foreach ($recommendations as $rekom)
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $rekom['nama'] }}</h2>
                        <p class="text-gray-600 mb-3">{{ $rekom['deskripsi'] }}</p>
                        <p class="font-medium">
                            Skor Kecocokan:
                            <span
                                class="
                                {{ $rekom['score'] >= 80 ? 'text-green-600' : ($rekom['score'] >= 60 ? 'text-yellow-500' : 'text-red-500') }}">
                                {{ $rekom['score'] }}%
                            </span>
                        </p>
                        <p class="text-sm text-gray-500 italic mt-1">{{ $rekom['justifikasi'] }}</p>
                        <a href="#"
                            class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            Pesan Sekarang
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="text-center mt-6">
            <a href="{{ route('recommend.history') }}" class="text-blue-600 hover:underline">
                Lihat Riwayat Rekomendasi
            </a>
        </div>

    </div>
</body>

</html>
