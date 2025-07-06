
<section>
    <div>
        <header class="ctr-headerMainContent">
            <div class="cHeaderMainContent">
                <div class="txHeaderMainC">
                    <div class="txHead text-xl font-semibold">
                        <h1>Welcome {{ auth()->user()->userPersonal->fullname }}</h1>
                    </div>
                </div>
                <div class="txDescHead mt-4">
                    <div class="txMainDesc text-sm font-light text-gray-400">
                        <p>Hi {{ auth()->user()->userPersonal->fullname }}! Discover your progress and important updates
                            in your dashboard.</p>
                    </div>
                </div>
            </div>
        </header>
        <div class="container mx-auto px-4 py-8 min-h-screen">
            <!-- Service Recommendations -->
            <div id="serviceRecommendations">
                <div class="flex items-center justify-between mb-6">
                    <h2 id="selectedServiceTypeTitle" class="text-2xl font-bold text-gray-800">Rekomendasi Untuk Anda
                    </h2>
                    <a href="{{ route('rate') }}">
                        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Lihat Rekomendasi
                        </button>
                    </a>
                </div>
                {{-- <div class="mb-6">
                    <div class="relative">
                        <input type="text" placeholder="Cari layanan yang kamu mau"
                            class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-[#1C64F2]">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="recommendationsContainer">
                </div> --}}
            </div>
        </div>
    </div>
</section>
