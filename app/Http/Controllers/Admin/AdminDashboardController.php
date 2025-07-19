<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\StatusPemesananUpdated;
use Carbon\Carbon;
use App\Models\Service;
use App\Models\User;
use App\Models\Order;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalServices = Service::count();
        $totalUsers = User::count();

        // Data bulanan untuk grafik
        $months = collect(range(1, 6))->map(function ($i) {
            return now()->subMonths(6 - $i);
        });

        $monthLabels = $months->map(fn($m) => $m->format('M Y'));
        $serviceCounts = $months->map(
            fn($m) =>
            Service::whereYear('created_at', $m->year)
                ->whereMonth('created_at', $m->month)
                ->count()
        );

        // Pemesanan terbaru
        $recentOrders = Order::with(['user', 'service'])->latest()->limit(5)->get();

        return view('admin.dashboard.index', compact(
            'totalServices',
            'totalUsers',
            'monthLabels',
            'serviceCounts',
            'recentOrders',
        ));
    }
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'harga_final' => 'nullable|string', // ubah jadi string dulu
            'status' => 'required|string',
        ]);

        $cleanedHarga = str_replace('.', '', $request->harga_final); // buang semua titik

        $order->update([
            'harga_final' => is_numeric($cleanedHarga) ? intval($cleanedHarga) : null,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Pesanan berhasil diperbarui.');
    }
}
