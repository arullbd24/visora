<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'Menunggu Konfirmasi')->count();

        return view('admin.dashboard', compact('totalOrders', 'pendingOrders'));
    }

    public function orders()
    {
        $orders = Order::latest()->get();
        return view('admin.orders', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        return back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
