<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Riwayat Rekomendasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('assets/img/visora..png') }}" type="image/x-icon">
</head>

<body class="bg-gray-100 py-8 px-4 min-h-screen">
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-6">
        <h1 class="text-2xl font-bold text-center text-blue-700 mb-6">Riwayat Rekomendasi Kamu</h1>
        <form action="{{ route('recommend.history.delete') }}" method="POST" class="text-right mb-4">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Yakin ingin menghapus semua riwayat?')"
                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Hapus Semua Riwayat
            </button>
        </form>
        <form method="GET" action="{{ route('recommend.history') }}" class="mb-6 flex items-center gap-4">
            <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                class="border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" />
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Filter
            </button>
        </form>

        @forelse ($history as $item)
            <div class="border-b border-gray-200 py-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">{{ $item->service_name }}</h2>
                        <p class="text-sm text-gray-500 mb-1">{{ $item->description }}</p>
                        <p class="text-sm text-gray-600 italic">
                            <span class="font-medium">Alasan:</span> {{ $item->justification }}
                        </p>
                    </div>
                    <div class="text-right">
                        <span
                            class="inline-block font-bold px-3 py-1 rounded-full 
                            @if ($item->score >= 80) bg-green-100 text-green-700
                            @elseif($item->score >= 60)
                                bg-yellow-100 text-yellow-700
                            @else
                                bg-red-100 text-red-700 @endif
                        ">
                            {{ $item->score }}%
                        </span>
                        <p class="text-xs text-gray-400 mt-1">
                            {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-600">Belum ada riwayat rekomendasi.</p>
        @endforelse
    </div>
</body>

</html>
