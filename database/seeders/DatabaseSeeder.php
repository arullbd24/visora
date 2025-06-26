<?php

namespace Database\Seeders;

use App\Models\ServiceTag;
use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\UserPreferenceSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
{
    $this->call([
        PaketJasaSeeder::class,
        ServiceSeeder::class,
        UserPreferencesSeeder::class,
        ServiceTagsSeeder::class,
        AdminUserSeeder::class, 
    ]);
}

}
