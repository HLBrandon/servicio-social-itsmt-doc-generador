<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [FrontController::class, 'index'])->name('index');

Route::get('/anexo-xviii', [FrontController::class, 'solicitudCreate'])->name('solicitud.create');
Route::post('/anexo-xviii', [FrontController::class, 'solicitudStore'])->name('solicitud.store');

Route::get('/anexo-xx', [FrontController::class, 'compromisoCreate'])->name('compromiso.create');
Route::post('/anexo-xx', [FrontController::class, 'compromisoStore'])->name('compromiso.store');

Route::get('/plan-de-trabajo', [FrontController::class, 'planTrabajoCreate'])->name('plan.trabajo.create');
Route::post('/plan-de-trabajo', [FrontController::class, 'planTrabajoStore'])->name('plan.trabajo.store');

Route::get('/anexo-xxii', [FrontController::class, 'reporteBimestralCreate'])->name('reporte.bimestral.create');
Route::post('/anexo-xxii', [FrontController::class, 'reporteBimestralStore'])->name('reporte.bimestral.store');

Route::get('/anexo-xxiii', [FrontController::class, 'evaluacionEmpresaCreate'])->name('formato.evaluacion.empresa.create');
Route::post('/anexo-xxiii', [FrontController::class, 'evaluacionEmpresaStore'])->name('formato.evaluacion.empresa.store');

Route::get('/anexo-xxiv', [FrontController::class, 'autoevaluacionCreate'])->name('formato.autoevaluacion.create');
Route::post('/anexo-xxiv', [FrontController::class, 'autoevaluacionStore'])->name('formato.autoevaluacion.store');

Route::get('/anexo-xxv', [FrontController::class, 'evaluacionActividadesCreate'])->name('formato.evaluacion.actividades.create');
Route::post('/anexo-xxv', [FrontController::class, 'evaluacionActividadesStore'])->name('formato.evaluacion.actividades.store');

require_once __DIR__ . "/admin.php";