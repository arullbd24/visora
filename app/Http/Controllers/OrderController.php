<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Notifications\StatusPemesananUpdated;
use App\Models\Order;

class OrderController extends Controller
{
    public function showForm(Request $request)
    {
        $serviceName = $request->input('service_name');
        return view('order.form', ['service' => $serviceName]);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'service_name'   => 'required|string|max:255',
            'nama_pemesan'   => 'required|string|max:255',
            'whatsapp'       => 'required|string|max:20',
            'email'          => 'required|email|max:255',
            'tanggal_acara'  => 'required|date',
            'catatan'        => 'nullable|string',
        ]);

        // Atur harga default berdasarkan nama layanan
        $defaultHarga = match (strtolower($request->input('service_name'))) {
            'event' => 5000000,
            'dokumentasi' => 350000,
            'pernikahan' => 1000000,
            'company profile' => 5000000,
            'wedding' => 5000000,
            'graduation' => 5000000,
            default => 250000, // harga default jika tidak dikenal
        };

        try {
            $order = Order::create([
                'user_id'        => Auth::id(),
                'service_name'   => $request->input('service_name'),
                'nama_pemesan'   => $request->input('nama_pemesan'),
                'whatsapp'       => $request->input('whatsapp'),
                'email'          => $request->input('email'),
                'tanggal_acara'  => $request->input('tanggal_acara'),
                'catatan'        => $request->input('catatan'),
                'status'         => 'Menunggu Konfirmasi',
                'harga_final'    => $defaultHarga, // ⬅️ nilai ini penting untuk Midtrans
            ]);

            return redirect()->route('payment.detail', ['order' => $order->id])
                ->with('success', 'Pesanan berhasil dikirim!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menyimpan: ' . $e->getMessage());
        }
    }

    public function adminIndex()
    {
        $orders = DB::table('orders')->orderByDesc('created_at')->get();
        return view('admin.orders', compact('orders'));
    }

    // public function updateStatus(Request $request, $id)
    // {
    //     $order = Order::findOrFail($id);
    //     $order->status = $request->status;
    //     $order->save();

    //     $snapUrl = null;

    //     if ($order->status === 'Menunggu Pembayaran') {
    //         // Pastikan relasi ke pembayaran dan token Snap tersedia
    //         $snapUrl = $order->pembayaran && $order->pembayaran->snap_token
    //             ? 'https://app.midtrans.com/snap/v2/vtweb/' . $order->pembayaran->snap_token
    //             : null;
    //     }

    //     $order->user->notify(new StatusPemesananUpdated($order->status, $snapUrl));

    //     return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    // }
}
