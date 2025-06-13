<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPreferencesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user_preferences')->insert([
            ['user_id' => 3, 'service_id' => 1, 'rating' => 4.5],
            ['user_id' => 3, 'service_id' => 2, 'rating' => 3.5],
            ['user_id' => 2, 'service_id' => 1, 'rating' => 2.0],
            ['user_id' => 2, 'service_id' => 3, 'rating' => 4.0],
        ]);
    }
}
