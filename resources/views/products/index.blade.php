@extends('layouts.app')

@section('content')
<h1>Daftar Produk</h1>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

@foreach($products as $product)
    <div>
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->description }}</p>
        <p>Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <button type="submit">Tambah ke Keranjang</button>
        </form>
    </div>
@endforeach

<a href="{{ route('cart.view') }}">Lihat Keranjang</a>
@endsection
