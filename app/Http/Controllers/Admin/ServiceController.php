<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ServiceController extends Controller
{
    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'nullable|string',
            'categories' => 'nullable|string',
        ]);

        DB::table('services')->insert([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'details' => $validated['details'],
            'categories' => $validated['categories'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.services.create')->with('success', 'Layanan berhasil ditambahkan.');
    }
    public function index()
    {
        $services = DB::table('services')->orderByDesc('created_at')->get();

        return view('admin.services.index', compact('services'));
    }
    public function edit($id)
{
    $service = DB::table('services')->where('id', $id)->first();

    if (!$service) {
        return redirect()->route('admin.services.index')->with('error', 'Layanan tidak ditemukan.');
    }

    return view('admin.services.edit', compact('service'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'details' => 'nullable|string',
        'categories' => 'nullable|string',
    ]);

    DB::table('services')->where('id', $id)->update([
        'name' => $request->name,
        'description' => $request->description,
        'details' => $request->details,
        'categories' => $request->categories,
        'updated_at' => now(),
    ]);

    return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui.');
}

public function destroy($id)
{
    DB::table('services')->where('id', $id)->delete();
    return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus.');
}
 
}
