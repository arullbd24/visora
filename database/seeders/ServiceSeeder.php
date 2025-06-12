<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Service::create([
            'name' => 'Paket A - Company Profile',
            'description' => 'Paket lengkap untuk company profile formal',
            'categories' => json_encode(['videografi', 'editing']),
        ]);

        Service::create([
            'name' => 'Paket B - Yearbook Video',
            'description' => 'Dokumentasi kreatif untuk buku tahunan',
            'categories' => json_encode(['fotografi', 'editing']),
        ]);
    }
}
