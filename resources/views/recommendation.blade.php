<!-- resources/views/recommendation.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Rekomendasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">
    <h1 class="text-2xl font-bold mb-4">Rekomendasi untuk User ID: {{ $userId }}</h1>
    <form method="GET" action="{{ url('recommendations/' . $userId) }}" class="mb-6">
        <label for="kategori" class="block text-sm font-medium text-gray-700">Filter Kategori:</label>
        <select name="kategori" id="kategori" class="mt-1 block w-1/3 rounded-md border-gray-300 shadow-sm">
            <option value="">-- Semua Kategori --</option>
            <option value="Company Profile">Company Profile</option>
            <option value="Wedding">Wedding</option>
            <option value="Yearbook">Yearbook</option>
        </select>
        <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md">Filter</button>
    </form>
    <ul class="space-y-4">
        @forelse ($recommendations as $item)
            <li class="p-4 bg-white rounded shadow">
                <div class="font-semibold text-lg">{{ $item['nama'] }}</div>
                <div class="text-gray-600 text-sm mb-1">{{ $item['deskripsi'] }}</div>
                <div class="text-blue-500 text-sm font-mono">Skor: {{ $item['score'] }}</div>
            </li>
        @empty
            <li class="text-gray-500">Tidak ada rekomendasi dengan skor yang relevan.</li>
        @endforelse
    </ul>

</body>

</html>
