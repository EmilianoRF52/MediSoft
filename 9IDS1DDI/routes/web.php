<?php

use App\Http\Controllers\ConsultoriosController;
use App\Http\Controllers\DoctoresController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\MedicamentosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

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
    


//Usuarios
Route::get('/usuario',[UsuariosController::class, 'index'])
            ->name('nuevo.usuario');

Route::post('/usuario/guardar',[UsuariosController::class, 'store'])
            ->name('usuario.guardar');

Route::get('/usuarios',[UsuariosController::class, 'list'])
            ->name('usuarios.lista');

Route::delete('/usuarios/eliminar',[UsuariosController::class, 'delete'])
            ->name('eliminar.usuario');