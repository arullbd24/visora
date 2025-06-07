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
                    <p>Hi {{ auth()->user()->userPersonal->fullname }}! Discover your progress and important updates in your dashboard.</p>
                </div>
            </div>
        </div>
    </header>
     <div class="container mx-auto px-4 py-8 min-h-screen">
        <!-- Service Recommendations -->
        <div id="serviceRecommendations">
            <div class="flex items-center mb-6">
                <h2 id="selectedServiceTypeTitle" class="text-2xl font-bold text-gray-800">Rekomendasi Untuk Anda</h2>
            </div>

            <div class="mb-6">
                <div class="relative">
                    <input type="text" placeholder="Cari berdasarkan lokasi/kecamatan..."
                        class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-[#1C64F2]">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="recommendationsContainer">
                <!-- Recommendations will be dynamically inserted here -->
            </div>
        </div>
    </div>
    <!-- First Modal - Service Type Selection -->
    <div id="serviceTypeModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl w-full max-w-md mx-4">
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Apa yang Anda butuhkan hari ini?</h3>
                <div class="space-y-3" id="serviceTypeOptions">
                    <div class="border rounded-lg p-4 hover:bg-yellow-50 cursor-pointer" onclick="selectServiceType('Fotografi')">
                        <h4 class="font-medium text-gray-800">Fotografi</h4>
                        <p class="text-sm text-gray-500 mt-1">Jasa pemotretan profesional</p>
                    </div>
                    <div class="border rounded-lg p-4 hover:bg-yellow-50 cursor-pointer" onclick="selectServiceType('Videografi')">
                        <h4 class="font-medium text-gray-800">Videografi</h4>
                        <p class="text-sm text-gray-500 mt-1">Jasa pembuatan video profesional</p>
                    </div>
                    <div class="border rounded-lg p-4 hover:bg-yellow-50 cursor-pointer" onclick="selectServiceType('Editing')">
                        <h4 class="font-medium text-gray-800">Editing</h4>
                        <p class="text-sm text-gray-500 mt-1">Jasa pengeditan foto & video</p>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button onclick="hideModal('serviceTypeModal')" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="categoryModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl w-full max-w-md mx-4">
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Pilih Kategori Khusus</h3>
                <div class="space-y-3" id="categoryOptions">
                    <!-- Categories will be dynamically inserted here -->
                </div>
                <div class="mt-6 flex justify-between">
                    <button onclick="backToServiceType()" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                        Kembali
                    </button>
                    <button onclick="hideModal('categoryModal')" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Service categories mapping
        const serviceCategories = {
            "Fotografi": [
                { name: "Wedding", description: "Pernikahan dan pre-wedding" },
                { name: "Produk", description: "Foto produk untuk bisnis" },
                { name: "Year Book", description: "Foto kenangan sekolah" },
                { name: "Portrait", description: "Foto profesional individu" },
                { name: "Event", description: "Foto acara dan kegiatan" }
            ],
            "Videografi": [
                { name: "Wedding", description: "Video pernikahan profesional" },
                { name: "Company Profile", description: "Video profil perusahaan" },
                { name: "Event", description: "Video dokumentasi acara" },
                { name: "Iklan", description: "Video iklan produk" },
                { name: "Kreatif", description: "Video konten kreatif" }
            ],
            "Editing": [
                { name: "Foto", description: "Editing foto profesional" },
                { name: "Video Wedding", description: "Editing video pernikahan" },
                { name: "Video Iklan", description: "Editing video iklan" },
                { name: "Color Grading", description: "Penyempurnaan warna video" },
                { name: "Motion Graphic", description: "Editing dengan animasi" }
            ]
        };

        // Comprehensive recommendations data with tags for content-based filtering
        const recommendations = [
            {
                id: 1,
                name: "Paket Wedding Premium",
                type: "Fotografi",
                category: "Wedding",
                vendor: "Bajrasaadya",
                price: "Rp 2.500.000",
                rating: 4.8,
                reviews: 32,
                image: "https://images.unsplash.com/photo-1523438885200-e635ba2c371e",
                tags: ["premium", "full-day", "album", "makeup-artist"]
            },
            {
                id: 2,
                name: "Fotografi Pernikahan Lengkap",
                type: "Fotografi",
                category: "Wedding",
                vendor: "Bajrasaadya",
                price: "Rp 1.800.000",
                rating: 4.7,
                reviews: 28,
                image: "https://images.unsplash.com/photo-1497215728101-856f4ea42174",
                tags: ["full-day", "album", "drone"]
            },
            {
                id: 3,
                name: "Paket Pre-Wedding Outdoor",
                type: "Fotografi",
                category: "Wedding",
                vendor: "Bajrasaadya",
                price: "Rp 1.200.000",
                rating: 4.5,
                reviews: 18,
                image: "https://images.unsplash.com/photo-1519225421980-715cb0215aed",
                tags: ["outdoor", "3-lokasi", "softcopy"]
            },
            {
                id: 4,
                name: "Foto Produk E-commerce",
                type: "Fotografi",
                category: "Produk",
                vendor: "Bajrasaadya",
                price: "Rp 500.000",
                rating: 4.9,
                reviews: 45,
                image: "https://images.unsplash.com/photo-1602143407151-7111542de6e8",
                tags: ["white-background", "10-produk", "editing"]
            },
            {
                id: 5,
                name: "Foto Produk Makanan",
                type: "Fotografi",
                category: "Produk",
                vendor: "Bajrasaadya",
                price: "Rp 600.000",
                rating: 4.7,
                reviews: 36,
                image: "https://images.unsplash.com/photo-1563805042-7684c019e1cb",
                tags: ["food-styling", "10-foto", "editing"]
            },
            {
                id: 6,
                name: "Year Book Sekolah",
                type: "Fotografi",
                category: "Year Book",
                vendor: "Bajrasaadya",
                price: "Rp 1.500.000",
                rating: 4.6,
                reviews: 22,
                image: "https://images.unsplash.com/photo-1523050854058-8df90110c9f1",
                tags: ["kelas", "grup", "individu", "design"]
            },
            {
                id: 7,
                name: "Paket Video Wedding Full Day",
                type: "Videografi",
                category: "Wedding",
                vendor: "Bajrasaadya",
                price: "Rp 3.200.000",
                rating: 4.9,
                reviews: 41,
                image: "https://images.unsplash.com/photo-1519671482749-fd09be7ccebf",
                tags: ["full-day", "cinematic", "drone", "highlight"]
            },
            {
                id: 8,
                name: "Cinematic Wedding",
                type: "Videografi",
                category: "Wedding",
                vendor: "Bajrasaadya",
                price: "Rp 4.500.000",
                rating: 5.0,
                reviews: 25,
                image: "https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6",
                tags: ["premium", "cinematic", "teaser", "drone"]
            },
            {
                id: 9,
                name: "Company Profile Perusahaan",
                type: "Videografi",
                category: "Company Profile",
                vendor: "Bajrasaadya",
                price: "Rp 5.000.000",
                rating: 4.8,
                reviews: 30,
                image: "https://images.unsplash.com/photo-1552664730-d307ca884978",
                tags: ["corporate", "interview", "dubbing", "motion-graphic"]
            },
            {
                id: 10,
                name: "Editing Video Pernikahan",
                type: "Editing",
                category: "Video Wedding",
                vendor: "Bajrasaadya",
                price: "Rp 800.000",
                rating: 4.6,
                reviews: 22,
                image: "https://images.unsplash.com/photo-1626785774573-4b799315345d",
                tags: ["color-grading", "transisi", "music", "highlight"]
            },
            {
                id: 11,
                name: "Color Grading Professional",
                type: "Editing",
                category: "Color Grading",
                vendor: "Bajrasaadya",
                price: "Rp 1.200.000",
                rating: 4.8,
                reviews: 31,
                image: "https://images.unsplash.com/photo-1579389083078-4e7018379f7e",
                tags: ["color-correction", "4k", "cinematic-look"]
            },
            {
                id: 12,
                name: "Editing Foto Produk",
                type: "Editing",
                category: "Foto",
                vendor: "Bajrasaadya",
                price: "Rp 300.000",
                rating: 4.7,
                reviews: 45,
                image: "https://images.unsplash.com/photo-1556228453-efd6c1ff04f6",
                tags: ["background-removal", "color-enhance", "retouch"]
            }
        ];

        // Content-based filtering weights
        const contentWeights = {
            type: 3,       // Higher weight for main service type
            category: 2,    // Medium weight for category
            tags: 1         // Lower weight for individual tags
        };

        // Global variables to store user selections
        let selectedServiceType = '';
        let selectedCategory = '';

        // Show recommendations based on selected service type and category
        function showRecommendations() {
            document.getElementById('selectedServiceTypeTitle').textContent = 
                `Rekomendasi ${selectedServiceType} ${selectedCategory}`;
            
            // Filter recommendations based on content similarity
            const filteredRecs = getContentBasedRecommendations();
            
            // Populate recommendations
            const container = document.getElementById('recommendationsContainer');
            container.innerHTML = '';

            if (filteredRecs.length === 0) {
                container.innerHTML = `
                    <div class="col-span-full text-center py-10">
                        <i class="fas fa-camera-retro text-4xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500">Belum ada rekomendasi tersedia untuk kategori ini</p>
                        <button onclick="showAllRecommendations()" class="mt-4 text-yellow-600 hover:text-yellow-800 font-medium">
                            Lihat semua rekomendasi
                        </button>
                    </div>
                `;
            } else {
                filteredRecs.forEach(service => {
                    container.innerHTML += `
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 ease-in-out hover:-translate-y-1 hover:shadow-lg">
                            <div class="relative h-48">
                                <img src="${service.image}" alt="${service.name}" class="w-full h-full object-cover">
                                <span class="absolute bottom-2 left-2 bg-blue-600 text-white text-xs px-2 py-1 rounded">
                                    ${service.vendor}
                                </span>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-lg mb-1">${service.name}</h3>
                                <div class="flex items-center mb-3">
                                    <div class="flex text-yellow-400">
                                        ${renderStars(service.rating)}
                                    </div>
                                    <span class="text-gray-500 text-sm ml-2">${service.rating} (${service.reviews} review)</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <button class="bg-[#1C64F2] text-white px-3 py-1 rounded hover:bg-[#1C64F2] transition">
                                        Detail
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                });
            }
        }
        // Content-based filtering algorithm
        function getContentBasedRecommendations() {
            // First filter by exact type and category matches
            const exactMatches = recommendations.filter(rec => 
                rec.type === selectedServiceType && rec.category === selectedCategory
            );
            
            if (exactMatches.length >= 3) return exactMatches;
            
            // If not enough exact matches, use scoring system
            const scoredRecs = recommendations.map(rec => {
                let score = 0;
                
                // Score for type match
                if (rec.type === selectedServiceType) {
                    score += contentWeights.type;
                }
                
                // Score for category match
                if (rec.category === selectedCategory) {
                    score += contentWeights.category;
                }
                
                // Additional scoring based on tags (simplified for this example)
                // In a real app, you'd have a more sophisticated tag matching system
                
                return { ...rec, score };
            });
            
            // Sort by score descending
            scoredRecs.sort((a, b) => b.score - a.score);
            
            // Return top 6 recommendations
            return scoredRecs.slice(0, 6);
        }

        // Show all recommendations regardless of category
        function showAllRecommendations() {
            selectedCategory = '';
            showRecommendations();
        }

        // Select service type from first modal
        function selectServiceType(serviceType) {
            selectedServiceType = serviceType;
            hideModal('serviceTypeModal');
            showCategoryModal(serviceType);
        }

        // Show category selection modal
        function showCategoryModal(serviceType) {
            const categories = serviceCategories[serviceType] || [];
            const container = document.getElementById('categoryOptions');
            container.innerHTML = '';
            
            categories.forEach(category => {
                container.innerHTML += `
                    <div class="border rounded-lg p-4 hover:bg-yellow-50 cursor-pointer" 
                         onclick="selectCategory('${category.name}')">
                        <h4 class="font-medium text-gray-800">${category.name}</h4>
                        <p class="text-sm text-gray-500 mt-1">${category.description}</p>
                    </div>
                `;
            });
            
            document.getElementById('categoryModal').classList.remove('hidden');
        }

        // Select category from second modal
        function selectCategory(category) {
            selectedCategory = category;
            hideModal('categoryModal');
            showRecommendations();
        }

        // Back to service type selection
        function backToServiceType() {
            document.getElementById('categoryModal').classList.add('hidden');
            document.getElementById('serviceTypeModal').style.display = 'flex';
        }

        // Hide modal
        function hideModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Render star ratings
        function renderStars(rating) {
            let stars = '';
            const fullStars = Math.floor(rating);
            const hasHalfStar = rating % 1 >= 0.5;

            for (let i = 0; i < fullStars; i++) {
                stars += '<i class="fas fa-star"></i>';
            }

            if (hasHalfStar) {
                stars += '<i class="fas fa-star-half-alt"></i>';
            }

            const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);
            for (let i = 0; i < emptyStars; i++) {
                stars += '<i class="far fa-star"></i>';
            }

            return stars;
        }

        // Show first modal on page load
        window.onload = function() {
            document.getElementById('serviceTypeModal').style.display = 'flex';
        };
        
    </script>
</div>
</section>
