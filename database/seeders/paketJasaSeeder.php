<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaketJasa;
use App\Models\Kategori;


class paketJasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
     {
        // Kategori
        $video = Kategori::create(['nama' => 'videografi']);
        $foto = Kategori::create(['nama' => 'fotografi']);
        $edit = Kategori::create(['nama' => 'editing']);

        // Paket Company Profile
        $paket1 = PaketJasa::create([
            'nama' => 'Paket Company Profile',
            'deskripsi' => 'Pembuatan video profil perusahaan secara profesional dengan proses pengambilan video dan editing formal untuk presentasi klien.',
        ]);
        $paket1->kategori()->attach([$video->id, $edit->id]);

        // Paket Yearbook
        $paket2 = PaketJasa::create([
            'nama' => 'Paket Yearbook',
            'deskripsi' => 'Paket dokumentasi lengkap berupa pemotretan kegiatan tahunan dan editing desain layout buku tahunan yang rapi dan elegan.',
        ]);
        $paket2->kategori()->attach([$foto->id, $edit->id]);

        // Paket Annual Report
        $paket3 = PaketJasa::create([
            'nama' => 'Paket Video Annual Report',
            'deskripsi' => 'Video laporan tahunan perusahaan dengan gaya formal, mencakup footage kegiatan dan narasi data perusahaan.',
        ]);
        $paket3->kategori()->attach([$video->id, $edit->id]);

        // Paket Dokumentasi Formal
        $paket4 = PaketJasa::create([
            'nama' => 'Paket Dokumentasi Acara Formal',
            'deskripsi' => 'Dokumentasi berupa foto dan video pada acara resmi perusahaan seperti rapat umum pemegang saham atau seminar bisnis.',
        ]);
        $paket4->kategori()->attach([$foto->id, $video->id]);
    }
}

