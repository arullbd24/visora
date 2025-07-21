@extends('dashboard.layouts.main')
@section('title', 'Dashboard')
@section('content')
<div class="max-w-4xl mx-auto pt-10 px-6">
    {{-- Flash Messages --}}
    <div class="fixed top-6 right-6 z-40 space-y-3" x-data="{ show: true }">
        @foreach (['success' => 'green', 'warning' => 'yellow', 'error' => 'red'] as $type => $color)
            @if (session($type))
                <div x-show="show" x-init="setTimeout(() => show = false, 4000)" x-transition
                    class="flex items-center gap-4 p-4 bg-{{ $color }}-100 border border-{{ $color }}-300 text-{{ $color }}-800 rounded-lg shadow-lg ring-2 ring-{{ $color }}-200">
                    <span class="text-2xl">
                        {{ $type === 'success' ? '✅' : ($type === 'warning' ? '⚠️' : '❌') }}
                    </span>
                    <div class="flex-1">
                        <p class="font-semibold">{{ ucfirst($type) }}</p>
                        <p class="text-sm">{{ session($type) }}</p>
                    </div>
                    <button @click="show = false"
                        class="text-{{ $color }}-500 hover:text-{{ $color }}-800 font-bold text-lg transition">&times;</button>
                </div>
            @endif
        @endforeach
    </div>
    <div class="mb-10">
        <h1 class="text-4xl font-extrabold text-center bg-gradient-to-r from-blue-700 via-blue-400 to-blue-700 bg-clip-text text-transparent mb-2 drop-shadow-lg">Hasil Rekomendasi Layanan</h1>
        <p class="text-center text-gray-500">Temukan layanan terbaik sesuai kebutuhan Anda</p>
    </div>
    @if ($recommendations->isEmpty())
        <div class="text-center text-gray-500">Belum ada rekomendasi yang cocok.</div>
    @else
        <div class="grid md:grid-cols-2 gap-8">
            @foreach ($recommendations as $index => $rekom)
                <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 hover:shadow-2xl transition duration-300 relative overflow-hidden group">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 via-purple-400 to-pink-400"></div>
                    <h3 class="text-xl font-bold mb-2 text-blue-700 group-hover:text-blue-900 transition">{{ $rekom['nama'] }}</h3>
                    <p class="text-sm text-gray-600 mb-3">{{ $rekom['deskripsi'] }}</p>
                    <p class="text-sm mb-2">
                        <strong>Skor Kecocokan:</strong>
                        <span class="{{ $rekom['score'] >= 70 ? 'text-green-600' : ($rekom['score'] >= 50 ? 'text-yellow-600' : 'text-red-600') }} font-bold">
                            {{ $rekom['score'] }}%
                        </span>
                    </p>
                    <p class="text-xs italic text-gray-500 mb-4">{{ $rekom['justifikasi'] }}</p>
                    {{-- Carousel --}}
                    <div id="carousel-{{ $index }}" class="relative w-full mb-4" data-carousel="slide">
                        <div class="relative h-40 min-h-[160px] overflow-hidden rounded-xl flex items-center justify-center bg-gray-50">
                            @php
                                $slugNama = \Str::slug($rekom['nama'], '_');
                                $isYouTube = isset($rekom['youtube']) && Str::contains($rekom['youtube'], 'youtube.com/watch');
                            @endphp
                            @if ($isYouTube)
                                @php
                                    parse_str(parse_url($rekom['youtube'], PHP_URL_QUERY), $ytParams);
                                    $videoId = $ytParams['v'] ?? null;
                                @endphp
                                @if ($videoId)
                                    <div class="block duration-700 ease-in-out" data-carousel-item>
                                        <img src="https://img.youtube.com/vi/{{ $videoId }}/0.jpg"
                                            class="block w-full h-40 object-cover rounded-xl shadow"
                                            alt="Thumbnail YouTube {{ $rekom['nama'] }}">
                                    </div>
                                @else
                                    <div class="block text-center text-sm text-red-500">
                                        Thumbnail tidak dapat dimuat.
                                    </div>
                                @endif
                            @else
                                @for ($i = 1; $i <= 3; $i++)
                                    <div class="{{ $i === 1 ? 'block' : 'hidden' }} duration-700 ease-in-out"
                                        data-carousel-item>
                                        <img src="{{ asset('assets/img/' . $slugNama . '-' . $i . '.png') }}"
                                            class="block w-full h-40 object-cover rounded-xl shadow"
                                            alt="Slide {{ $i }} {{ $rekom['nama'] }}">
                                    </div>
                                @endfor
                            @endif
                        </div>
                        {{-- Indicators --}}
                        <div class="absolute z-30 flex -translate-x-1/2 bottom-2 left-1/2 space-x-2">
                            @for ($i = 0; $i < 3; $i++)
                                <button type="button" class="w-3 h-3 rounded-full bg-white border border-gray-300 shadow hover:bg-blue-400 transition"
                                    aria-label="Slide {{ $i + 1 }}" data-carousel-slide-to="{{ $i }}"></button>
                            @endfor
                        </div>
                        {{-- Controls --}}
                        <button type="button"
                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-2 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/40 group-hover:bg-blue-200 transition">
                                <svg class="w-3 h-3 text-blue-700" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-2 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/40 group-hover:bg-blue-200 transition">
                                <svg class="w-3 h-3 text-blue-700" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                            </span>
                        </button>
                    </div>
                    <div class="flex justify-center gap-2 mt-2">
                        <button onclick="openModal({{ $index }})"
                            class="bg-gray-200 text-sm text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition font-semibold shadow">
                            Lihat Detail
                        </button>
                        <a href="{{ route('order.form', ['service_name' => $rekom['nama']]) }}"
                            class="bg-gradient-to-r from-blue-600 to-blue-400 text-white text-sm px-5 py-2 rounded-lg hover:from-blue-700 hover:to-blue-500 transition font-semibold shadow">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- Modal --}}
        @foreach ($recommendations as $index => $rekom)
            <div id="modal-{{ $index }}"
                class="fixed z-50 inset-0 hidden bg-black bg-opacity-60 backdrop-blur-sm flex items-center justify-center transition-all duration-300">
                <div class="bg-gradient-to-br from-blue-50 via-white to-purple-100 w-full max-w-xl rounded-3xl shadow-2xl p-10 relative animate-fadeIn border-2 border-blue-200">
                    <button onclick="closeModal({{ $index }})"
                        class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-3xl font-bold transition focus:outline-none">
                        &times;
                    </button>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="flex-shrink-0 w-14 h-14 rounded-full bg-gradient-to-tr from-blue-400 to-purple-400 flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-blue-700">{{ $rekom['nama'] }}</h2>
                    </div>
                    <div class="text-base text-gray-700 whitespace-pre-line leading-relaxed max-h-[60vh] overflow-y-auto px-1 pr-3 mb-4">
                        {!! nl2br(e($rekom['details'] ?? 'Detail tidak tersedia.')) !!}
                    </div>
                    <div class="flex justify-end mt-8">
                        <button onclick="closeModal({{ $index }})"
                            class="px-6 py-2 bg-gradient-to-r from-blue-200 to-purple-200 rounded-lg hover:from-blue-300 hover:to-purple-300 transition text-base text-blue-700 font-semibold shadow">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <div class="flex justify-center mt-10">
        <a href="{{ route('recommend.history') }}"
            class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 via-blue-500 to-blue-400 text-white font-bold rounded-xl shadow-lg hover:from-blue-700 hover:to-purple-700 hover:scale-105 transition-all duration-200 ring-2 ring-blue-200">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 17l4 4 4-4m-4-5v9M20 12a8 8 0 10-16 0 8 8 0 0016 0z" />
            </svg>
            Lihat Riwayat Rekomendasi
        </a>
    </div>
</div>
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95);}
        to { opacity: 1; transform: scale(1);}
    }
    .animate-fadeIn {
        animation: fadeIn 0.3s ease;
    }
    /* Modal backdrop blur and transition */
    .modal-backdrop {
        transition: opacity 0.3s;
        backdrop-filter: blur(6px);
    }
</style>
<script>
    function openModal(index) {
        const modal = document.getElementById('modal-' + index);
        if (modal) {
            modal.classList.remove('hidden');
            setTimeout(() => modal.classList.add('modal-backdrop'), 10);
        }
        document.body.style.overflow = 'hidden';
    }
    function closeModal(index) {
        const modal = document.getElementById('modal-' + index);
        if (modal) {
            modal.classList.remove('modal-backdrop');
            setTimeout(() => modal.classList.add('hidden'), 200);
        }
        document.body.style.overflow = '';
    }
    // Optional: close modal on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('[id^="modal-"]').forEach(modal => {
                if (!modal.classList.contains('hidden')) {
                    modal.classList.remove('modal-backdrop');
                    setTimeout(() => modal.classList.add('hidden'), 200);
                    document.body.style.overflow = '';
                }
            });
        }
    });
</script>
@endsection
