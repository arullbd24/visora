<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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


        try {
            DB::table('orders')->insert([
                'user_id'        => Auth::id(),
                'service_name'   => $request->input('service_name'),
                'nama_pemesan'   => $request->input('nama_pemesan'),
                'whatsapp'       => $request->input('whatsapp'), // ✅ Tambah ini
                'email'          => $request->input('email'),
                'tanggal_acara'  => $request->input('tanggal_acara'),
                'catatan'        => $request->input('catatan'),
                'status'         => 'Menunggu Konfirmasi',
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);


            return redirect()->route('recommend.user')->with('success', 'Pesanan berhasil dikirim!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menyimpan: ' . $e->getMessage());
        }
    }

    public function adminIndex()
    {
        $orders = DB::table('orders')->orderByDesc('created_at')->get();
        return view('admin.orders', compact('orders'));
    }

    public function updateStatus($id, Request $request)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        DB::table('orders')->where('id', $id)->update([
            'status' => $request->input('status'),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Status pesanan diperbarui.');
    }
}
