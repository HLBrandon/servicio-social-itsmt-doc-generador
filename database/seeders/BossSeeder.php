<?php

namespace Database\Seeders;

use App\Models\Boss;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BossSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Boss::create([
            "name" => "Avelino"
        ]);

        Boss::create([
            "name" => "Paco"
        ]);

        Boss::create([
            "name" => "Laura"
        ]);
    }
}
