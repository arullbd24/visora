<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->configureMidtrans();
    }

    /**
     * Konfigurasi Midtrans
     */
    private function configureMidtrans(): void
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production', false);
        Config::$isSanitized = config('midtrans.sanitized', true);
        Config::$is3ds = config('midtrans.3ds', true);

        // Tambahan: agar tidak error saat merge header
        Config::$curlOptions[CURLOPT_HTTPHEADER] = [];

        // Optional: untuk development (hilangkan di production)
        Config::$curlOptions[CURLOPT_SSL_VERIFYPEER] = false;
    }

    /**
     * Tampilkan halaman pembayaran berdasarkan Order ID
     */



    public function show($orderId)
    {
        $order = Order::findOrFail($orderId);

        // Batasi hanya pemilik order yang bisa melihat
        if (auth()->id() !== $order->user_id) {
            abort(403, 'Unauthorized');
        }

        // Validasi harga
        $grossAmount = (int) ($order->harga_final ?? 0);

        // Logging tambahan (opsional)
        if ($grossAmount <= 0) {
            Log::warning('Harga final order tidak valid', [
                'order_id' => $order->id,
                'harga_final' => $order->harga_final,
            ]);

            return redirect()->route('dashboard.main')->with('error', 'Harga layanan belum tersedia. Hubungi admin.');
        }

        // Siapkan parameter Midtrans Snap
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . $order->id . '-' . uniqid(),
                'gross_amount' => $grossAmount,
            ],
            'customer_details' => [
                'first_name' => $order->nama_pemesan ?? 'Pelanggan',
                'email' => $order->email ?? 'default@email.com',
                'phone' => $order->whatsapp ?? '08123456789',
            ],
        ];

        // Dapatkan Snap Token
        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mendapatkan token pembayaran: ' . $e->getMessage());
        }

        return view('payment.detail', compact('order', 'snapToken'));
    }
}
