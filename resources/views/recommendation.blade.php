@extends('dashboard.layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-4xl mx-auto pt-10 px-6">
    {{-- Flash Messages --}}
    <div class="fixed top-6 right-6 z-40 space-y-3" x-data="{ show: true }">
        @foreach (['success' => 'green', 'warning' => 'yellow', 'error' => 'red'] as $type => $color)
            @if (session($type))
                <div x-show="show" x-init="setTimeout(() => show = false, 4000)" x-transition
                    class="flex items-center gap-4 p-4 bg-{{ $color }}-100 border border-{{ $color }}-300 text-{{ $color }}-800 rounded-lg shadow-md">
                    <span class="text-2xl">
                        {{ $type === 'success' ? '✅' : ($type === 'warning' ? '⚠️' : '❌') }}
                    </span>
                    <div class="flex-1">
                        <p class="font-semibold">{{ ucfirst($type) }}</p>
                        <p class="text-sm">{{ session($type) }}</p>
                    </div>
                    <button @click="show = false"
                        class="text-{{ $color }}-500 hover:text-{{ $color }}-800 font-bold text-lg">&times;</button>
                </div>
            @endif
        @endforeach
    </div>

    <h1 class="text-3xl font-bold text-center text-blue-800 mb-10">Hasil Rekomendasi Layanan</h1>

    @if ($recommendations->isEmpty())
        <div class="text-center text-gray-500">Belum ada rekomendasi yang cocok.</div>
    @else
        <div class="grid md:grid-cols-2 gap-6">
            @foreach ($recommendations as $index => $rekom)
                <div class="bg-white p-5 rounded shadow text-center relative overflow-hidden">
                    <h3 class="text-lg font-bold mb-1">{{ $rekom['nama'] }}</h3>
                    <p class="text-sm text-gray-600 mb-2">{{ $rekom['deskripsi'] }}</p>

                    <p class="text-sm">
                        <strong>Skor Kecocokan:</strong>
                        <span class="{{ $rekom['score'] >= 70 ? 'text-green-600' : ($rekom['score'] >= 50 ? 'text-yellow-600' : 'text-red-600') }}">
                            {{ $rekom['score'] }}%
                        </span>
                    </p>
                    <p class="text-xs italic text-gray-500 mb-4">{{ $rekom['justifikasi'] }}</p>

                    {{-- Carousel --}}
                    <div id="carousel-{{ $index }}" class="relative w-full mb-4" data-carousel="slide">
                        <div class="relative h-40 min-h-[160px] overflow-hidden rounded-lg flex items-center justify-center">
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
                                            class="block w-full h-40 object-cover rounded"
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
                                            class="block w-full h-40 object-cover rounded"
                                            alt="Slide {{ $i }} {{ $rekom['nama'] }}">
                                    </div>
                                @endfor
                            @endif
                        </div>

                        {{-- Indicators --}}
                        <div class="absolute z-30 flex -translate-x-1/2 bottom-2 left-1/2 space-x-2">
                            @for ($i = 0; $i < 3; $i++)
                                <button type="button" class="w-2 h-2 rounded-full bg-white"
                                    aria-label="Slide {{ $i + 1 }}" data-carousel-slide-to="{{ $i }}"></button>
                            @endfor
                        </div>

                        {{-- Controls --}}
                        <button type="button"
                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-2 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 group-hover:bg-white/50">
                                <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-2 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 group-hover:bg-white/50">
                                <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                            </span>
                        </button>
                    </div>

                    <button onclick="openModal({{ $index }})"
                        class="bg-gray-300 text-sm text-gray-800 px-3 py-1 rounded hover:bg-gray-400 mb-2">
                        Lihat Detail
                    </button>

                    <a href="{{ route('order.form', ['service_name' => $rekom['nama']]) }}"
                        class="bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700">
                        Pesan Sekarang
                    </a>
                </div>
            @endforeach
        </div>
        {{-- Modal --}}
        @foreach ($recommendations as $index => $rekom)
            <div id="modal-{{ $index }}"
                class="fixed z-50 inset-0 hidden bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center">
                <div class="bg-white w-full max-w-lg rounded-2xl shadow-xl p-6 relative">
                    <button onclick="closeModal({{ $index }})"
                        class="absolute top-3 right-3 text-gray-500 hover:text-red-500 text-2xl font-bold">&times;</button>
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $rekom['nama'] }}</h2>
                    <div class="text-sm text-gray-700 whitespace-pre-line leading-relaxed max-h-[60vh] overflow-y-auto px-1 pr-3">
                        {!! nl2br(e($rekom['details'] ?? 'Detail tidak tersedia.')) !!}
                    </div>
                    <div class="mt-6 text-right">
                        <button onclick="closeModal({{ $index }})"
                            class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 transition text-sm text-gray-700">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <div class="text-center mt-6">
        <a href="{{ route('recommend.history') }}" class="text-blue-600 hover:underline">
            Lihat Riwayat Rekomendasi
        </a>
    </div>
</div>
<script>
    function openModal(index) {
        document.getElementById('modal-' + index).classList.remove('hidden');
    }

    function closeModal(index) {
        document.getElementById('modal-' + index).classList.add('hidden');
    }
</script>
@endsection
