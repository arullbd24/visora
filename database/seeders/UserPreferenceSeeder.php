<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserPreference;

class UserPreferenceSeeder extends Seeder
{
    public function run(): void
    {
        UserPreference::create([
            'user_id' => 1,
            'theme' => 'dark',
            'notification' => true,
        ]);
    }
}
