@extends('admin.layouts.admin')
@section('title', 'Daftar Pesanan Masuk')
@section('content')
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen p-8">
    <div class="max-w-6xl mx-auto bg-white p-8 rounded-2xl shadow-lg border border-blue-100">
        <link rel="icon" href="{{ asset('assets/img/visora..png') }}" type="image/x-icon">

        <h1 class="text-3xl font-extrabold text-blue-800 mb-6 tracking-tight">Daftar Pesanan Masuk</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
            <table class="w-full table-auto text-sm border-collapse">
                <thead>
                    <tr class="bg-blue-100 text-blue-900 font-semibold">
                        <th class="px-4 py-3">Layanan</th>
                        <th class="px-4 py-3">Pemesan</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">WhatsApp</th>
                        <th class="px-4 py-3">Tanggal Acara</th>
                        <th class="px-4 py-3">Harga Final</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-b hover:bg-blue-50 transition">
                            <td class="px-4 py-3">{{ $order->service_name }}</td>
                            <td class="px-4 py-3">{{ $order->nama_pemesan }}</td>
                            <td class="px-4 py-3">{{ $order->email }}</td>
                            <td class="px-4 py-3">{{ $order->whatsapp }}</td>
                            <td class="px-4 py-3">{{ $order->tanggal_acara }}</td>
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <td class="px-4 py-3">
                                    <input type="number" name="harga_final"
                                        value="{{ old('harga_final', $order->harga_final) }}"
                                        class="w-28 px-3 py-2 border border-blue-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
                                        placeholder="Rp">
                                </td>
                                <td class="px-4 py-3">
                                    <select name="status" class="text-sm px-3 py-2 rounded-lg border border-blue-200 w-44 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                        <option value="Menunggu Konfirmasi"
                                            {{ $order->status == 'Menunggu Konfirmasi' ? 'selected' : '' }}>
                                            Menunggu</option>
                                        <option value="Dikonfirmasi"
                                            {{ $order->status == 'Dikonfirmasi' ? 'selected' : '' }}>
                                            Dikonfirmasi</option>
                                        <option value="Ditolak" {{ $order->status == 'Ditolak' ? 'selected' : '' }}>
                                            Ditolak</option>
                                        <option value="lunas" {{ $order->status == 'lunas' ? 'selected' : '' }}>
                                            Lunas</option>
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                    </select>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <button type="submit"
                                        class="bg-blue-600 text-white text-xs px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition font-semibold">
                                        Simpan
                                    </button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($orders->isEmpty())
            <p class="text-center text-gray-500 mt-8 text-lg">Belum ada pesanan.</p>
        @endif
    </div>
</body>
@endsection
