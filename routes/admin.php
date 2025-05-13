<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SemesterController;

Route::prefix("admin")->middleware("auth")->group(function () {

    Route::resource("/careers", CareerController::class);
    Route::resource("/periods", PeriodController::class);
    Route::resource("/programs", ProgramController::class);
    Route::resource("/semesters", SemesterController::class);

});
