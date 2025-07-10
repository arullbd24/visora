<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function pay()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Data transaksi
        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => 100000, // jumlah pembayaran
            ],
            'customer_details' => [
                'first_name' => 'Delon',
                'email' => 'delon@example.com',
            ],
        ];

        // Ambil Snap token
        $snapToken = Snap::getSnapToken($params);

        return view('payment', compact('snapToken'));
    }
}
