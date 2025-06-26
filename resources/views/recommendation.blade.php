<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Rekomendasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('assets/img/visora..png') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gradient-to-br from-blue-100 to-white min-h-screen py-10 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="fixed top-6 right-6 z-50 space-y-3" x-data="{ show: true }">

            {{-- Success (Hijau) --}}
            @if (session('success'))
                <div x-show="show" x-init="setTimeout(() => show = false, 4000)" x-transition
                    class="flex items-center gap-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg shadow-md">
                    <span class="text-2xl">✅</span>
                    <div class="flex-1">
                        <p class="font-semibold">Berhasil</p>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false"
                        class="text-green-500 hover:text-green-800 font-bold text-lg">&times;</button>
                </div>
            @endif

            {{-- Warning (Kuning) --}}
            @if (session('warning'))
                <div x-show="show" x-init="setTimeout(() => show = false, 4000)" x-transition
                    class="flex items-center gap-4 p-4 bg-yellow-100 border border-yellow-300 text-yellow-800 rounded-lg shadow-md">
                    <span class="text-2xl">⚠️</span>
                    <div class="flex-1">
                        <p class="font-semibold">Peringatan</p>
                        <p class="text-sm">{{ session('warning') }}</p>
                    </div>
                    <button @click="show = false"
                        class="text-yellow-500 hover:text-yellow-800 font-bold text-lg">&times;</button>
                </div>
            @endif

            {{-- Error (Merah) --}}
            @if (session('error'))
                <div x-show="show" x-init="setTimeout(() => show = false, 4000)" x-transition
                    class="flex items-center gap-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded-lg shadow-md">
                    <span class="text-2xl">❌</span>
                    <div class="flex-1">
                        <p class="font-semibold">Gagal</p>
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                    <button @click="show = false"
                        class="text-red-500 hover:text-red-800 font-bold text-lg">&times;</button>
                </div>
            @endif

        </div>


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
                        <form action="{{ route('order.form') }}" method="GET">
                            <input type="hidden" name="service_name" value="{{ $rekom['nama'] }}">
                            <button type="submit"
                                class="mt-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                                Pesan Sekarang
                            </button>
                        </form>
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
