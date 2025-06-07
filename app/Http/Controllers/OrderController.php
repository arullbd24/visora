<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function products()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function addToCart(Product $product)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.view')->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if(!$cart) {
            return redirect()->route('products.list')->with('error', 'Keranjang kosong');
        }

        $totalPrice = 0;
        foreach($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
            'total_price' => $totalPrice,
        ]);

        foreach($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('products.list')->with('success', 'Order berhasil dibuat');
    }
}
