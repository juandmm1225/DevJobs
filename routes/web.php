<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\VacanteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',HomeController::class )->name('home');

Route::get('/dashboard', [VacanteController::class, 'index'])->middleware(['auth','rol.reclutador'])->name('vacantes.index');
//->middleware(['auth','verified'])->name('dashboard');
Route::get('/vacantes/create', [VacanteController::class, 'create'])->middleware(['auth'])->name('vacantes.create');
Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->middleware(['auth'])->name('vacantes.edit');
Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');
Route::get('/candidatos/{vacante}', [CandidatoController::class, 'index'])->name('candidatos.index');

Route::get('/notificaciones', NotificacionesController::class)->middleware(['auth','rol.reclutador'])->name('notificaciones');

require __DIR__.'/auth.php';
