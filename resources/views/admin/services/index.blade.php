@extends('admin.layouts.admin')

@section('title', 'Daftar Layanan')

@section('content')
<div class="max-w-7xl mx-auto bg-white p-8 rounded-2xl shadow-xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-blue-800">Daftar Semua Layanan</h1>
        <a href="{{ route('admin.services.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm shadow">
            + Tambah Layanan
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full table-auto text-sm text-left rounded overflow-hidden shadow-sm">
            <thead class="bg-blue-100 text-blue-800 text-sm uppercase">
                <tr>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Deskripsi</th>
                    <th class="px-4 py-3 text-center">Kategori</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y">
                @forelse ($services as $service)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 font-medium">{{ $service->name }}</td>
                        <td class="px-4 py-3">{{ \Illuminate\Support\Str::limit($service->description, 60) }}</td>
                        <td class="px-4 py-3 text-center">{{ $service->categories ?? '-' }}</td>
                        <td class="px-4 py-3 text-center space-x-2">
                            <a href="{{ route('admin.services.edit', $service->id) }}"
                                class="text-blue-600 hover:underline text-sm">Edit</a>

                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                                  class="inline-block"
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
</div>
@endsection
