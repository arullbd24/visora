@extends('admin.layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-4">
        <!-- Card: Total Layanan -->
        <div class="bg-white p-4 rounded-lg shadow flex items-center justify-between">
            <div>
                <h3 class="text-xs text-gray-500 mb-1">Total Layanan</h3>
                <p class="text-xl font-bold text-blue-700">{{ $totalServices }}</p>
            </div>
            <div class="p-2 bg-blue-100 text-blue-600 rounded-full">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 7H7v6h6V7z" />
                    <path fill-rule="evenodd"
                          d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5z"
                          clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <!-- Card: Total Pengguna -->
        <div class="bg-white p-4 rounded-lg shadow flex items-center justify-between">
            <div>
                <h3 class="text-xs text-gray-500 mb-1">Total Pengguna</h3>
                <p class="text-xl font-bold text-blue-700">{{ $totalUsers }}</p>
            </div>
            <div class="p-2 bg-green-100 text-green-600 rounded-full">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M10 2a4 4 0 00-4 4v2a4 4 0 104 4h2a4 4 0 100-8h-2zM3 14a7 7 0 0114 0v1H3v-1z"
                          clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>
    <!-- Chart Section -->
    <div class="bg-white p-4 rounded-lg shadow mb-4">
        <h3 class="text-base font-semibold mb-2 text-blue-800">Statistik Layanan Bulanan</h3>
        <div class="w-full overflow-x-auto">
            <canvas id="serviceChart" height="80"></canvas>
        </div>
    </div>
    <!-- Recent Orders -->
    <div class="bg-white p-4 rounded-lg shadow mb-4">
        <h3 class="text-base font-semibold mb-2 text-blue-800">Pemesanan Terbaru</h3>
        @if ($recentOrders->isEmpty())
            <p class="text-gray-500 text-sm">Belum ada pemesanan terbaru.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full text-xs text-left">
                    <thead class="bg-gray-100 text-gray-600 uppercase">
                        <tr>
                            <th class="px-2 py-2">Pengguna</th>
                            <th class="px-2 py-2">Layanan</th>
                            <th class="px-2 py-2">Catatan</th>
                            <th class="px-2 py-2">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-gray-700">
                        @foreach ($recentOrders as $order)
                            <tr class="hover:bg-gray-50">
                                <td class="px-2 py-2">{{ $order->user->name ?? '-' }}</td>
                                <td class="px-2 py-2">{{ $order->service->nama ?? '-' }}</td>
                                <td class="px-2 py-2">{{ $order->notes ?? '-' }}</td>
                                <td class="px-2 py-2">{{ $order->created_at->format('d M y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('serviceChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($monthLabels) !!},
                datasets: [{
                    label: 'Layanan Dibuat',
                    data: {!! json_encode($serviceCounts) !!},
                    backgroundColor: 'rgba(37, 99, 235, 0.6)',
                    borderColor: 'rgba(37, 99, 235, 1)',
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
                    }
                }
            }
        });
    </script>
    <style>
        /* Responsive height for chart container */
        #serviceChart {
            min-width: 350px;
            max-width: 100%;
            height: 250px !important;
        }
        @media (max-width: 640px) {
            .grid-cols-2, .sm\:grid-cols-2 {
                grid-template-columns: 1fr !important;
            }
            #serviceChart {
                height: 180px !important;
            }
        }
    </style>
@endsection
