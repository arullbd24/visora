<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Layanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-blue-700">Daftar Semua Layanan</h1>
            <a href="{{ route('admin.services.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">+ Tambah Layanan</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full table-auto text-sm">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">Deskripsi</th>
                    <th class="px-4 py-2">Kategori</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold">{{ $service->name }}</td>
                        <td class="px-4 py-2">{{ \Illuminate\Support\Str::limit($service->description, 60) }}</td>
                        <td class="px-4 py-2 text-center">{{ $service->categories ?? '-' }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('admin.services.edit', $service->id) }}"
                                class="text-blue-600 hover:underline text-sm">Edit</a>

                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                                class="inline-block ml-2"
                                onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">Hapus</button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500 py-6">Belum ada layanan.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</body>

</html>
