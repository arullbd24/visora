@extends('dashboard.layouts.main')
@section('title', 'Dashboard')
@section('content')
    <body class="bg-gradient-to-br from-blue-50 to-blue-100 py-10 px-4 min-h-screen">
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8 border border-blue-100">
            <h1 class="text-3xl font-extrabold text-center text-blue-800 mb-8 tracking-tight">Riwayat Rekomendasi Kamu</h1>
            <form action="{{ route('recommend.history.delete') }}" method="POST" class="text-right mb-6">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin menghapus semua riwayat?')"
                    class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-5 py-2 rounded-lg shadow hover:from-red-600 hover:to-pink-600 transition">
                    Hapus Semua Riwayat
                </button>
            </form>
            <form method="GET" action="{{ route('recommend.history') }}" class="mb-8 flex items-center gap-4 justify-center">
                <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                    class="border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 shadow-sm" />
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                    Filter
                </button>
            </form>
            @forelse ($history as $item)
                <div class="border-b border-blue-100 py-6 hover:bg-blue-50 transition rounded-lg mb-2">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-bold text-blue-700">{{ $item->service_name }}</h2>
                            <p class="text-sm text-gray-500 mb-2">{{ $item->description }}</p>
                            <p class="text-sm text-blue-600 italic">
                                <span class="font-semibold">Alasan:</span> {{ $item->justification }}
                            </p>
                        </div>
                        <div class="text-right min-w-[90px]">
                            <span
                                class="inline-block font-bold px-4 py-2 rounded-full text-base shadow
                                @if ($item->score >= 80) bg-green-100 text-green-700
                                @elseif($item->score >= 60)
                                    bg-yellow-100 text-yellow-700
                                @else
                                    bg-red-100 text-red-700 @endif
                            ">
                                {{ $item->score }}%
                            </span>
                            <p class="text-xs text-gray-400 mt-2">
                                {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-blue-500 font-medium py-8">Belum ada riwayat rekomendasi.</p>
            @endforelse
        </div>
    </body>
@endsection
