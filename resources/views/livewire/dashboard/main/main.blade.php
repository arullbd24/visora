<section class="bg-gradient-to-br from-blue-50 via-white to-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-12">
        <header class="mb-10">
            <div class="flex flex-col gap-2">
                <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Welcome, {{ auth()->user()->userPersonal->fullname }}</h1>
                <p class="text-gray-600 text-lg">
                    Hi {{ auth()->user()->userPersonal->fullname }}! Discover your progress and important updates in your dashboard.
                </p>
            </div>
        </header>
        <!-- Service Recommendations -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Rekomendasi Untuk Anda</h2>
                <a href="{{ route('rate') }}">
                    <button class="px-5 py-2.5 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition font-semibold">
                        Lihat Rekomendasi
                    </button>
                </a>
            </div>

            <!-- Tabs -->
            <ul class="flex gap-4 mb-8">
                <li>
                    <a href="#" class="px-5 py-2 rounded-lg bg-blue-100 text-blue-700 font-semibold shadow hover:bg-blue-200 transition">Semua</a>
                </li>
                <li>
                    <a href="#" class="px-5 py-2 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition font-semibold">Fotografi</a>
                </li>
                <li>
                    <a href="#" class="px-5 py-2 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition font-semibold">Videografi</a>
                </li>
                <li>
                    <a href="#" class="px-5 py-2 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition font-semibold">Booking</a>
                </li>
            </ul>
            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach([
                    'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/content-gallery-3.png',
                    'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80',
                    'https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=400&q=80',
                    'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80',
                    'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=400&q=80',
                    'https://images.unsplash.com/photo-1508672019048-805c876b67e2?auto=format&fit=crop&w=400&q=80'
                ] as $img)
                <figure class="relative rounded-xl overflow-hidden shadow-lg hover:scale-105 hover:shadow-2xl transition duration-300">
                    <a href="#">
                        <img class="w-full h-56 object-cover" src="{{ $img }}" alt="Rekomendasi">
                    </a>
                    <figcaption class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent px-4 py-3 text-white text-base font-medium">
                        Rekomendasi layanan untuk Anda
                    </figcaption>
                </figure>
                @endforeach
            </div>
        </div>
    </div>
</section>
