<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\UserPreferenceSeeder; 

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PaketJasaSeeder::class,
            ServiceSeeder::class,
            UserPreferenceSeeder::class,
        ]);
    }
}
