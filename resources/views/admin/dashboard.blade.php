@extends('admin.layouts.admin')

@section('title', 'Dahsboard Admin')

@section('content')
<div class="max-w-7xl mx-auto bg-white p-8 rounded-2xl shadow-xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-blue-800">Dashboard Admin</h1>
        <a href="{{ route('admin.services.index') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm shadow">
            Kelola Layanan
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-blue-100 p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold text-blue-800">Total Layanan</h2>
            <p class="text-3xl font-bold text-blue-600">{{ $totalServices }}</p>
        </div>
        <div class="bg-green-100 p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold text-green-800">Total Pengguna</h2>
            <p class="text-3xl font-bold text-green-600">{{ $totalUsers }}</p>
        </div>
        <div class="bg-yellow-100 p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold text-yellow-800">Total Transaksi</h2>
            <p class="text-3xl font-bold text-yellow-600">{{ $totalTransactions }}</p>
        </div>
    </div>
@endsection