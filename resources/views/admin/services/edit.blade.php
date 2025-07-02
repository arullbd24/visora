<div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-xl">
    <h2 class="text-2xl font-bold mb-6 text-blue-800">Edit Layanan</h2>

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" name="name" value="{{ $service->name }}" required
                class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="description" rows="3"
                class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition">{{ $service->description }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Detail Layanan</label>
            <textarea name="details" rows="5"
                class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition">{{ $service->details }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori <span class="text-gray-400 text-xs">(opsional)</span></label>
            <input type="text" name="categories" value="{{ $service->categories }}"
                class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
        </div>

        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('admin.services.index') }}"
                class="text-sm text-gray-500 hover:text-blue-600 transit
