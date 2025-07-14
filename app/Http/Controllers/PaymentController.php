<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function __construct()
    {
        // parent::__construct(); // Panggil konstruktor parent agar bisa pakai middleware()
        // $this->middleware('auth');
    }

    public function pay()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Dummy transaksi untuk testing
        $params = [
            'transaction_details' => [
                'order_id' => 'VISORA-' . rand(1000, 9999),
                'gross_amount' => 100000,
            ],
            'customer_details' => [
                'first_name' => 'Delon',
                'email' => 'delon@example.com',
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('payment', compact('snapToken'));
    }

    public function show($orderId)
    {
        // Ambil data order berdasarkan ID
        $order = \App\Models\Order::findOrFail($orderId);

        // // Cek user login sesuai pemilik order
        // if (!auth()->check() || auth()->id() !== $order->user_id) {
        //     abort(403, 'Unauthorized');
        // }
      return view('payment.detail', compact('order'));
    }

    public function generateSnapToken($orderId)
    {
        // $order = Order::findOrFail($orderId);

        // if (auth()->id() !== $order->user_id) {
        //     abort(403);
    }

    //     Config::$serverKey = config('midtrans.server_key');
    //     Config::$isProduction = config('midtrans.is_production');
    //     Config::$isSanitized = true;
    //     Config::$is3ds = true;

    //     $params = [
    //         'transaction_details' => [
    //             'order_id' => 'VISORA-' . $order->id . '-' . rand(1000, 9999),
    //             'gross_amount' => $order->harga_final,
    //         ],
    //         'customer_details' => [
    //             'first_name' => $order->nama_pemesan,
    //             'email' => $order->email,
    //         ],
    //     ];

    //     $snapToken = Snap::getSnapToken($params);

    //     return response()->json(['snapToken' => $snapToken]);
    // }
}
