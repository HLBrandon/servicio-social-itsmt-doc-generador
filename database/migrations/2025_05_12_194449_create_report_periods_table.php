<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('report_periods', function (Blueprint $table) {

            /**
             * Fechas en las que se deben entrar los reportes, para el 2025 es:
             * Reporte 1: 27/01/2025 al 09/03/2025
             * Reporte 2: 10/03/2025 al 20/04/2025
             * Reporte 3: 21/04/2025 al 30/05/2025
            */

            $table->id();
            $table->string("name", 120);
            $table->date("start_date");
            $table->date("end_date");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_periods');
    }
};
