<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTagsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('service_tags')->insert([
            ['service_id' => 1, 'tag' => 'cinematic', 'weight' => 1.0],
            ['service_id' => 1, 'tag' => 'dark', 'weight' => 0.8],
            ['service_id' => 1, 'tag' => 'thriller', 'weight' => 0.6],
            ['service_id' => 2, 'tag' => 'cinematic', 'weight' => 0.9],
            ['service_id' => 2, 'tag' => 'drone', 'weight' => 0.7],
            ['service_id' => 3, 'tag' => 'uplifting', 'weight' => 0.8],
            ['service_id' => 3, 'tag' => 'warm_grading', 'weight' => 0.9],
        ]);
    }
}