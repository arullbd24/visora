<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Penilaian Preferensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('assets/img/visora..png') }}" type="image/x-icon">

</head>

<body class="bg-gradient-to-br from-blue-50 to-white min-h-screen flex items-center justify-center p-6">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6 text-blue-700">Penilaian Preferensi Layanan</h1>

        <form action="{{ route('rate') }}" method="POST" class="space-y-4">
            @csrf
            @php
                $tags = ['profesional', 'cinematic', 'formal', 'informal'];
            @endphp

            @foreach ($tags as $tag)
                <div>
                    <label for="rating-{{ $tag }}"
                        class="block text-gray-700 capitalize font-medium mb-1">{{ $tag }}</label>
                    <input type="number" name="ratings[{{ $tag }}]" id="rating-{{ $tag }}"
                        min="1" max="10" placeholder="Nilai 1-10"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
            @endforeach

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Simpan & Lihat Rekomendasi
            </button>
        </form>
    </div>
</body>

</html>
