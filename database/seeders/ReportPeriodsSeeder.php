<?php

namespace Database\Seeders;

use App\Models\ReportPeriods;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportPeriodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportPeriods::create([
            "name"       => "Reporte 1",
            "start_date" => "2025-01-27",
            "end_date"   => "2025-03-09"
        ]);

        ReportPeriods::create([
            "name"       => "Reporte 2",
            "start_date" => "2025-03-10",
            "end_date"   => "2025-04-20"
        ]);

        ReportPeriods::create([
            "name"       => "Reporte 3",
            "start_date" => "2025-04-21",
            "end_date"   => "2025-05-30"
        ]);
    }
}
