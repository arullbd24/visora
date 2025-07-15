@extends('admin.layouts.admin')

@section('title', 'Daftar Pesanan Masuk')

@section('content')

    <body class="bg-gray-100 min-h-screen p-6">
        <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow">
            <link rel="icon" href="{{ asset('assets/img/visora..png') }}" type="image/x-icon">

            <h1 class="text-2xl font-bold text-blue-700 mb-4">Daftar Pesanan Masuk</h1>

            @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full table-auto text-sm border">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700 text-left">
                            <th class="px-4 py-2">Layanan</th>
                            <th class="px-4 py-2">Pemesan</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">WhatsApp</th>
                            <th class="px-4 py-2">Tanggal Acara</th>
                            <th class="px-4 py-2">Harga Final</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $order->service_name }}</td>
                                <td class="px-4 py-2">{{ $order->nama_pemesan }}</td>
                                <td class="px-4 py-2">{{ $order->email }}</td>
                                <td class="px-4 py-2">{{ $order->whatsapp }}</td>
                                <td class="px-4 py-2">{{ $order->tanggal_acara }}</td>

                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td class="px-4 py-2">
                                        <input type="number" name="harga_final"
                                            value="{{ old('harga_final', $order->harga_final) }}"
                                            class="w-24 px-2 py-1 border rounded text-sm" placeholder="Rp">
                                    </td>
                                    <td class="px-4 py-2">
                                        <select name="status" class="text-sm px-2 py-1 rounded border w-40">
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
                                    <td class="px-4 py-2 text-center">
                                        <button type="submit"
                                            class="bg-blue-600 text-white text-xs px-3 py-1 rounded hover:bg-blue-700">
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
                <p class="text-center text-gray-500 mt-6">Belum ada pesanan.</p>
            @endif
        </div>
    </body>

@endsection
