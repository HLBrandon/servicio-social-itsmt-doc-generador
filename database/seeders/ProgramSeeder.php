<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::create([
            "name" => "Educación para adultos"
        ]);
        Program::create([
            "name" => "Actividades cívicas"
        ]);
        Program::create([
            "name" => "Desarrollo sustentable"
        ]);
        Program::create([
            "name" => "Desarrollo de comunidad"
        ]);
        Program::create([
            "name" => "Actividades culturales"
        ]);
        Program::create([
            "name" => "Apoyo a la salud"
        ]);
        Program::create([
            "name" => "Actividades deportivas"
        ]);
        Program::create([
            "name" => "Medio Ambiente"
        ]);
        Program::create([
            "name" => "Otros"
        ]);
    }
}
