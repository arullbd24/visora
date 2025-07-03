@extends('admin.layouts.admin')

@section('title', 'Edit Layanan')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-xl">
        <h2 class="text-2xl font-bold mb-6 text-blue-800 flex items-center gap-2">
            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M17.414 2.586a2 2 0 010 2.828l-1.829 1.829-2.828-2.828 1.829-1.829a2 2 0 012.828 0zM2 13.414V18h4.586l9.293-9.293-4.586-4.586L2 13.414z" />
            </svg>
            Edit Layanan
        </h2>

        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div>
                <label for="name" class="block mb-1 text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name" value="{{ $service->name }}" required
                    class="w-full border border-gray-300 text-sm rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="description" class="block mb-1 text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="3"
                    class="w-full border border-gray-300 text-sm rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500 shadow-sm">{{ $service->description }}</textarea>
            </div>

            <!-- Detail Layanan -->
            <div>
                <label for="details" class="block mb-1 text-sm font-medium text-gray-700">Detail Layanan</label>
                <textarea name="details" id="details" rows="5"
                    class="w-full border border-gray-300 text-sm rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500 shadow-sm">{{ $service->details }}</textarea>
            </div>

            <!-- Kategori -->
            <div>
                <label for="categories" class="block mb-1 text-sm font-medium text-gray-700">
                    Kategori <span class="text-gray-400 text-xs">(opsional)</span>
                </label>
                <input type="text" name="categories" id="categories" value="{{ $service->categories }}"
                    class="w-full border border-gray-300 text-sm rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-between items-center pt-4">
                <a href="{{ route('admin.services.index') }}"
                    class="inline-flex items-center text-sm text-gray-600 hover:text-blue-600 transition">
                    ← Kembali
                </a>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 shadow">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

@endsection
