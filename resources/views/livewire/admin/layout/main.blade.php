<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Main</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-100 via-blue-50 to-indigo-100 min-h-screen">
    <div class="flex flex-col md:flex-row h-full min-h-screen">
        @include('livewire.admin.sidebarnav')
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Header --}}
            @include('livewire.admin.header')
            <main class="flex-1 overflow-y-auto p-6 space-y-8 w-full">
                <div class="max-w-full mx-auto px-2 sm:px-6 lg:px-10">
                    <h1 class="text-3xl font-extrabold text-indigo-800 mb-6 drop-shadow">Selamat datang kembali, Sahrul!</h1>
                    <!-- Statistik Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <!-- Column 1 -->
                        <div class="space-y-6">
                            <div class="bg-gradient-to-r from-green-200 to-green-100 p-5 rounded-2xl shadow hover:scale-105 transition">
                                <div class="text-xs text-gray-600 font-semibold">HISTORY CHECK</div>
                                <div class="text-3xl font-bold text-green-900">776</div>
                            </div>
                            <div class="bg-gradient-to-r from-emerald-200 to-emerald-100 p-5 rounded-2xl shadow hover:scale-105 transition">
                                <div class="text-xs text-gray-600 font-semibold">STOCK</div>
                                <div class="text-3xl font-bold text-emerald-900">726</div>
                            </div>
                        </div>
                        <!-- Column 2 -->
                        <div class="space-y-6">
                            <div class="bg-gradient-to-r from-cyan-200 to-cyan-100 p-5 rounded-2xl shadow hover:scale-105 transition">
                                <div class="text-xs text-gray-600 font-semibold">HISTORY CLAIM</div>
                                <div class="text-3xl font-bold text-cyan-900">670</div>
                            </div>
                            <div class="bg-gradient-to-r from-rose-200 to-rose-100 p-5 rounded-2xl shadow hover:scale-105 transition">
                                <div class="text-xs text-gray-600 font-semibold">ORDERS</div>
                                <div class="text-3xl font-bold text-rose-900">441</div>
                            </div>
                        </div>
                        <!-- Column 3 -->
                        <div class="space-y-6">
                            <div class="bg-gradient-to-r from-indigo-200 to-indigo-100 p-5 rounded-2xl shadow hover:scale-105 transition">
                                <div class="text-xs text-gray-600 font-semibold">BRANDS</div>
                                <div class="text-3xl font-bold text-indigo-900">393</div>
                            </div>
                            <div class="bg-gradient-to-r from-lime-200 to-lime-100 p-5 rounded-2xl shadow hover:scale-105 transition">
                                <div class="text-xs text-gray-600 font-semibold">AVERAGE PRICES</div>
                                <div class="text-3xl font-bold text-lime-900">676</div>
                            </div>
                        </div>
                    </div>
                    <!-- Bar Chart Section -->
                    <div class="bg-gradient-to-r from-yellow-100 to-yellow-50 p-6 rounded-2xl shadow mb-8">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="font-bold text-gray-800 text-lg">Bar Chart</h2>
                            <select class="border rounded px-3 py-2 text-sm text-gray-700 focus:ring focus:ring-yellow-200">
                                <option>2024</option>
                                <option>2023</option>
                            </select>
                        </div>
                        <p class="text-center text-sm italic text-gray-500">
                            Grafik data pemasukan/pengeluaran akan ditampilkan di sini.
                        </p>
                    </div>

                    <!-- Client List Table -->
                    <div class="bg-white p-6 rounded-2xl shadow overflow-x-auto mb-8">
                        <h3 class="font-bold text-gray-800 mb-4 text-lg">Top 10 Client in Order</h3>
                        <div class="min-w-[600px]">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="text-left text-gray-600 border-b">
                                        <th class="pb-3">Client List</th>
                                        <th class="pb-3 text-right">Percentage %</th>
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
