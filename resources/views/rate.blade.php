@extends('dashboard.layouts.main')
@section('title', 'Form Preferensi Layanan')
@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-200 px-2 sm:px-4">
        <div class="bg-white p-4 sm:p-8 md:p-10 rounded-2xl shadow-xl w-full max-w-md border border-blue-100">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-center mb-6 sm:mb-8 text-blue-700 tracking-tight">Preferensi Layanan</h1>

            <form action="{{ route('rate') }}" method="POST" class="space-y-5 sm:space-y-7">
                @csrf

                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                        Seberapa kamu menyukai layanan yang <span class="text-blue-600 font-bold">profesional</span>?
                    </label>
                    <input type="number" name="ratings[profesional]" min="1" max="10" placeholder="Nilai 1-10"
                        class="w-full border border-blue-300 rounded-lg px-3 py-2 sm:px-4 sm:py-2 focus:ring-2 focus:ring-blue-400 transition duration-150 outline-none shadow-sm bg-blue-50 placeholder-gray-400 text-sm sm:text-base">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                        Seberapa kamu menyukai layanan yang <span class="text-blue-600 font-bold">cinematic</span>?
                    </label>
                    <input type="number" name="ratings[cinematic]" min="1" max="10" placeholder="Nilai 1-10"
                        class="w-full border border-blue-300 rounded-lg px-3 py-2 sm:px-4 sm:py-2 focus:ring-2 focus:ring-blue-400 transition duration-150 outline-none shadow-sm bg-blue-50 placeholder-gray-400 text-sm sm:text-base">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                        Seberapa kamu menyukai layanan yang <span class="text-blue-600 font-bold">formal</span>?
                    </label>
                    <input type="number" name="ratings[formal]" min="1" max="10" placeholder="Nilai 1-10"
                        class="w-full border border-blue-300 rounded-lg px-3 py-2 sm:px-4 sm:py-2 focus:ring-2 focus:ring-blue-400 transition duration-150 outline-none shadow-sm bg-blue-50 placeholder-gray-400 text-sm sm:text-base">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                        Seberapa kamu menyukai layanan yang <span class="text-blue-600 font-bold">informal</span>?
                    </label>
                    <input type="number" name="ratings[informal]" min="1" max="10" placeholder="Nilai 1-10"
                        class="w-full border border-blue-300 rounded-lg px-3 py-2 sm:px-4 sm:py-2 focus:ring-2 focus:ring-blue-400 transition duration-150 outline-none shadow-sm bg-blue-50 placeholder-gray-400 text-sm sm:text-base">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                        Kamu sedang mencari layanan untuk keperluan apa?
                    </label>
                    <select name="tujuan_pemesanan"
                        class="w-full border border-blue-300 rounded-lg px-3 py-2 sm:px-4 sm:py-2 focus:ring-2 focus:ring-blue-400 transition duration-150 outline-none shadow-sm bg-blue-50 text-gray-700 text-sm sm:text-base">
                        <option disabled selected>Pilih salah satu...</option>
                        <option value="wedding">Wedding</option>
                        <option value="graduation">Graduation</option>
                        <option value="company_profile">Company Profile</option>
                        <option value="yearbook">Yearbook</option>
                        <option value="event">Event</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-blue-700 text-white py-2 sm:py-3 rounded-xl font-bold hover:scale-105 hover:shadow-lg transition duration-200 text-sm sm:text-base">
                    Simpan & Lihat Rekomendasi
                </button>
            </form>
        </div>
    </div>
@endsection
