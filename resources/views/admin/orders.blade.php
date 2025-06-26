<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold text-blue-700 mb-4">Daftar Pesanan Masuk</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full table-auto text-sm">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="px-4 py-2 text-left">Layanan</th>
                    <th class="px-4 py-2">Pemesan</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Tanggal Acara</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $order->service_name }}</td>
                    <td class="px-4 py-2">{{ $order->nama_pemesan }}</td>
                    <td class="px-4 py-2">{{ $order->email }}</td>
                    <td class="px-4 py-2">{{ $order->tanggal_acara }}</td>
                    <td class="px-4 py-2">
                        <span class="text-sm font-semibold 
                            {{ $order->status == 'Menunggu Konfirmasi' ? 'text-yellow-600' : ($order->status == 'Dikonfirmasi' ? 'text-green-600' : 'text-red-600') }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td class="px-4 py-2">
                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="flex gap-2">
                            @csrf
                            <select name="status" class="text-sm px-2 py-1 rounded border">
                                <option value="Menunggu Konfirmasi" {{ $order->status == 'Menunggu Konfirmasi' ? 'selected' : '' }}>Menunggu</option>
                                <option value="Dikonfirmasi" {{ $order->status == 'Dikonfirmasi' ? 'selected' : '' }}>Konfirmasi</option>
                                <option value="Ditolak" {{ $order->status == 'Ditolak' ? 'selected' : '' }}>Tolak</option>
                            </select>
                            <button type="submit" class="bg-blue-600 text-white text-xs px-3 py-1 rounded hover:bg-blue-700">
                                Simpan
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($orders->isEmpty())
            <p class="text-center text-gray-500 mt-6">Belum ada pesanan.</p>
        @endif
    </div>
</body>
</html>
