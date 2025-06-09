<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Main</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="flex flex-col md:flex-row h-full min-h-screen">
        @include('livewire.admin.sidebarnav')
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Header --}}
            @include('livewire.admin.header')
            <main class="flex-1 overflow-y-auto p-4 space-y-6 w-full">
                <div class="max-w-full mx-auto px-2 sm:px-4 lg:px-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">Selamat datang kembali, Sahrul!</h1>

                    <!-- Statistik Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                        <!-- Column 1 -->
                        <div class="space-y-4">
                            <div class="bg-green-100 p-4 rounded-xl shadow-sm">
                                <div class="text-sm text-gray-600">HISTORY CHECK</div>
                                <div class="text-2xl font-semibold text-green-800">776</div>
                            </div>
                            <div class="bg-emerald-100 p-4 rounded-xl shadow-sm">
                                <div class="text-sm text-gray-600">STOCK</div>
                                <div class="text-2xl font-semibold text-emerald-800">726</div>
                            </div>
                        </div>

                        <!-- Column 2 -->
                        <div class="space-y-4">
                            <div class="bg-cyan-100 p-4 rounded-xl shadow-sm">
                                <div class="text-sm text-gray-600">HISTORY CLAIM</div>
                                <div class="text-2xl font-semibold text-cyan-800">670</div>
                            </div>
                            <div class="bg-rose-100 p-4 rounded-xl shadow-sm">
                                <div class="text-sm text-gray-600">ORDERS</div>
                                <div class="text-2xl font-semibold text-rose-800">441</div>
                            </div>
                        </div>

                        <!-- Column 3 -->
                        <div class="space-y-4">
                            <div class="bg-indigo-100 p-4 rounded-xl shadow-sm">
                                <div class="text-sm text-gray-600">BRANDS</div>
                                <div class="text-2xl font-semibold text-indigo-800">393</div>
                            </div>
                            <div class="bg-lime-100 p-4 rounded-xl shadow-sm">
                                <div class="text-sm text-gray-600">AVERAGE PRICES</div>
                                <div class="text-2xl font-semibold text-lime-800">676</div>
                            </div>
                        </div>
                    </div>

                    <!-- Bar Chart Section -->
                    <div class="bg-yellow-50 p-4 rounded-xl shadow-sm mb-6">
                        <div class="flex justify-between items-center mb-3">
                            <h2 class="font-semibold text-gray-800">Bar Chart</h2>
                            <select class="border rounded px-2 py-1 text-sm text-gray-700">
                                <option>2024</option>
                                <option>2023</option>
                            </select>
                        </div>
                        <p class="text-center text-sm italic text-gray-500">
                            Grafik data pemasukan/pengeluaran akan ditampilkan di sini.
                        </p>
                    </div>

                    <!-- Client List Table -->
                    <div class="bg-white p-4 rounded-xl shadow-sm overflow-x-auto mb-6">
                        <h3 class="font-semibold text-gray-800 mb-3">Top 10 Client in Order</h3>
                        <div class="min-w-[600px]">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="text-left text-gray-600 border-b">
                                        <th class="pb-2">Client List</th>
                                        <th class="pb-2 text-right">Percentage %</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    <!-- Client rows here (same as your original code) -->
                                    <!-- ... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
