<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultoriosController;
use App\Http\Controllers\DoctoresController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\MedicamentosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Doctor 

Route::get('/doctor',[DoctoresController::class, 'index'])
            ->name('nuevo.doctor');

Route::post('/doctor/guardar',[DoctoresController::class, 'store'])
            ->name('doctor.guardar');

Route::get('/doctores',[DoctoresController::class, 'list'])
            ->name('doctores.lista');

Route::delete('/doctores/eliminar',[DoctoresController::class, 'delete'])
            ->name('eliminar.doctor');

//Consultorio
Route::get('/consultorio',[ConsultoriosController::class, 'index'])
            ->name('nuevo.consultorio');

Route::post('/consultorio/guardar',[ConsultoriosController::class, 'store'])
            ->name('consultorio.guardar');

Route::get('/consultorios',[ConsultoriosController::class, 'list'])
            ->name('consultorios.lista');

Route::delete('/consultorios/eliminar',[ConsultoriosController::class, 'delete'])
            ->name('eliminar.consultorio');

//Medicamento
Route::get('/medicamento',[MedicamentosController::class, 'index'])
            ->name('nuevo.medicamento');

Route::post('/medicamento/guardar',[MedicamentosController::class, 'store'])
            ->name('medicamento.guardar');

Route::get('/medicamentos',[MedicamentosController::class, 'list'])
            ->name('medicamentos.lista');

Route::delete('/medicamentos/eliminar',[MedicamentosController::class, 'delete'])
            ->name('eliminar.medicamento');

//Especialidad
Route::get('/especialidad',[EspecialidadesController::class, 'index'])
            ->name('nuevo.especialidad');

Route::post('/especialidad/guardar',[EspecialidadesController::class, 'store'])
            ->name('especialidad.guardar');

Route::get('/especialidades',[EspecialidadesController::class, 'list'])
            ->name('especialidades.lista');

Route::delete('/especialidades/eliminar',[EspecialidadesController::class, 'delete'])
            ->name('eliminar.especialidad');
        
        