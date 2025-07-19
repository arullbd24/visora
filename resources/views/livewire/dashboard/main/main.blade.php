<section class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <header class="mb-8">
            <div class="flex flex-col gap-2">
                <h1 class="text-3xl font-bold text-gray-900">Welcome, {{ auth()->user()->userPersonal->fullname }}</h1>
                <p class="text-gray-500 text-base">
                    Hi {{ auth()->user()->userPersonal->fullname }}! Discover your progress and important updates in your dashboard.
                </p>
            </div>
        </header>

        <!-- Service Recommendations -->
        <div class="bg-white rounded-xl shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Rekomendasi Untuk Anda</h2>
                <a href="{{ route('rate') }}">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                        Lihat Rekomendasi
                    </button>
                </a>
            </div>

            <!-- Tabs -->
            <ul class="flex gap-4 mb-6">
                <li>
                    <a href="#" class="px-4 py-2 rounded-lg bg-blue-50 text-blue-600 font-medium hover:bg-blue-100 transition">Semua</a>
                </li>
                <li>
                    <a href="#" class="px-4 py-2 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition">Fotografi</a>
                </li>
                <li>
                    <a href="#" class="px-4 py-2 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition">Videografi</a>
                </li>
                <li>
                    <a href="#" class="px-4 py-2 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition">Booking</a>
                </li>
            </ul>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach([
                    'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/content-gallery-3.png',
                    'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80',
                    'https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=400&q=80',
                    'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80',
                    'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=400&q=80',
                    'https://images.unsplash.com/photo-1508672019048-805c876b67e2?auto=format&fit=crop&w=400&q=80'
                ] as $img)
                <figure class="relative rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                    <a href="#">
                        <img class="w-full h-48 object-cover" src="{{ $img }}" alt="Rekomendasi">
                    </a>
                    <figcaption class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent px-4 py-2 text-white text-sm">
                        Rekomendasi layanan untuk Anda
                    </figcaption>
                </figure>
                @endforeach
            </div>
        </div>
    </div>
</section>
