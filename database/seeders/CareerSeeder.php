<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Career::create([
            "name" => "Ingeniería en Sistemas Computacionales",
            "boss_id" => 1
        ]);

        Career::create([
            "name" => "Ingeniería en Mecatrónica",
            "boss_id" => 1
        ]);

        Career::create([
            "name" => "Ingeniería en Gestión Empresarial",
            "boss_id" => 2
        ]);

        Career::create([
            "name" => "Ingeniería en Industrial Alimentarias",
            "boss_id" => 3
        ]);
    }
}
