@extends('layouts.app')

@section('content')
<h1>Keranjang Belanja</h1>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

@if(empty($cart))
    <p>Keranjang kosong</p>
@else
    <table>
        <thead>
            <tr><th>Nama Produk</th><th>Qty</th><th>Harga</th><th>Subtotal</th></tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($cart as $item)
                @php $subtotal = $item['quantity'] * $item['price']; @endphp
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                </tr>
                @php $total += $subtotal; @endphp
            @endforeach
        </tbody>
    </table>
    <h3>Total: Rp {{ number_format($total, 0, ',', '.') }}</h3>
    
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <button type="submit">Checkout</button>
    </form>
@endif

<a href="{{ route('products.list') }}">Lanjutkan Belanja</a>
@endsection
