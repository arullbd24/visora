<section class="bg-gradient-to-br from-blue-50 via-white to-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8 sm:py-12">
        <header class="mb-8 sm:mb-10">
            <div class="flex flex-col gap-2">
                <h1 class="text-2xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                    Welcome, {{ auth()->user()->userPersonal->fullname }}
                </h1>
                <p class="text-gray-600 text-base sm:text-lg">
                    Hi {{ auth()->user()->userPersonal->fullname }}! Discover your progress and important updates in your dashboard.
                </p>
            </div>
        </header>
        <!-- Service Recommendations -->
        <div class="bg-white rounded-2xl shadow-xl p-4 sm:p-8 border border-gray-100">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 sm:mb-8 gap-4">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Rekomendasi Untuk Anda</h2>
                <a href="{{ route('rate') }}" class="w-full sm:w-auto">
                    <button class="w-full sm:w-auto px-5 py-2.5 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition font-semibold">
                        Lihat Rekomendasi
                    </button>
                </a>
            </div>
            <!-- Tabs -->
            <ul class="flex flex-wrap gap-2 sm:gap-4 mb-6 sm:mb-8">
                <li>
                    <a href="#" class="px-4 sm:px-5 py-2 rounded-lg bg-blue-100 text-blue-700 font-semibold shadow hover:bg-blue-200 transition">Semua</a>
                </li>
                <li>
                    <a href="#" class="px-4 sm:px-5 py-2 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition font-semibold">Company Profile</a>
                </li>
                <li>
                    <a href="#" class="px-4 sm:px-5 py-2 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition font-semibold">Yearbook</a>
                </li>
                <li>
                    <a href="#" class="px-4 sm:px-5 py-2 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition font-semibold">Event</a>
                </li>
                <li>
                    <a href="#" class="px-4 sm:px-5 py-2 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition font-semibold">Graduation</a>
                </li>
                <li>
                    <a href="#" class="px-4 sm:px-5 py-2 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition font-semibold">Wedding</a>
                </li>
            </ul>
            <!-- Services Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8">
                @php
                    $services = [
                        [
                            'title' => 'Company Profile',
                            'desc' => 'Layanan pembuatan company profile profesional untuk bisnis Anda.',
                            'img' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80',
                        ],
                        [
                            'title' => 'Yearbook',
                            'desc' => 'Abadikan momen spesial tahun ini dengan yearbook berkualitas.',
                            'img' => 'https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=400&q=80',
                        ],
                        [
                            'title' => 'Event',
                            'desc' => 'Dokumentasikan setiap acara penting Anda secara profesional.',
                            'img' => 'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80',
                        ],
                        [
                            'title' => 'Graduation',
                            'desc' => 'Rayakan kelulusan dengan foto dan video terbaik.',
                            'img' => 'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=400&q=80',
                        ],
                        [
                            'title' => 'Wedding',
                            'desc' => 'Abadikan hari bahagia Anda dengan layanan wedding terbaik.',
                            'img' => 'https://images.unsplash.com/photo-1508672019048-805c876b67e2?auto=format&fit=crop&w=400&q=80',
                        ],
                    ];
                @endphp
                @foreach($services as $service)
                <div class="bg-white rounded-xl overflow-hidden shadow-lg flex flex-col">
                    <img class="w-full h-40 sm:h-48 object-cover" src="{{ $service['img'] }}" alt="{{ $service['title'] }}">
                    <div class="p-4 sm:p-5 flex-1 flex flex-col">
                        <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-1 sm:mb-2">{{ $service['title'] }}</h3>
                        <p class="text-gray-600 mb-3 sm:mb-4 flex-1 text-sm sm:text-base">{{ $service['desc'] }}</p>
                        <a href="#" class="mt-auto inline-block px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold shadow hover:bg-blue-700 transition text-center text-sm sm:text-base">Pesan Sekarang</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
