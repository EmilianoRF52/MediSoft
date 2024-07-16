<?php

use App\Http\Controllers\CitasController;
use App\Http\Controllers\ConsultoriosController;
use App\Http\Controllers\DoctoresController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\MedicamentosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login',[LoginController::class,'login']);

//Doctor
Route::get('/doctor', [DoctoresController::class, 'indexAPI']) ;
Route::post('/doctor/guardar', [DoctoresController::class, 'storeAPI']);
Route::post('/doctor/modificar', [DoctoresController::class, 'modifyAPI']);
Route::get('doctores', [DoctoresController::class, 'listAPI']);
Route::post('/doctor/delete', [DoctoresController::class, 'deleteAPI']);

//Consultorios
Route::get('/consultorio', [ConsultoriosController::class, 'indexAPI']);
Route::post('/consultorio/guardar', [ConsultoriosController::class, 'storeAPI']);
Route::post('/consultorio/modificar', [ConsultoriosController::class, 'modifyAPI']);
Route::get('consultorios', [ConsultoriosController::class, 'listAPI']) ; // Se pasa de get a post 
Route::post('/consultorio/delete', [ConsultoriosController::class, 'deleteAPI']) ;

//Medicamentos
Route::get('/medicamento', [MedicamentosController::class, 'indexAPI']) ;
Route::post('/medicamento/guardar', [MedicamentosController::class, 'storeAPI']) ;
Route::post('/medicamento/modificar', [MedicamentosController::class, 'modifyAPI']);
Route::get('medicamentos', [MedicamentosController::class, 'listAPI']);
Route::post('/medicamento/delete', [MedicamentosController::class, 'deleteAPI']);

//Especialidad
Route::get('especialidad',[EspecialidadesController::class,'indexAPI']);
Route::get('especialidades',[EspecialidadesController::class,'listAPI']);
Route::post('especialidad',[EspecialidadesController::class,'showAPI']);
Route::post('especialidad/modificar',[EspecialidadesController::class,'modifyAPI']);
Route::post('especialidad/guardar',[EspecialidadesController::class,'storeAPI']);
Route::post('especialidad/eliminar',[EspecialidadesController::class,'deleteAPI']);

//Paciente
Route::get('paciente',[PacientesController::class,'indexAPI']);
Route::get('pacientes',[PacientesController::class,'listAPI']);
Route::post('paciente',[PacientesController::class,'showAPI']);
Route::post('paciente/modificar',[PacientesController::class,'modifyAPI']);
Route::post('paciente/guardar',[PacientesController::class,'storeAPI']);
Route::post('paciente/eliminar',[PacientesController::class,'deleteAPI']);

//Usuario
Route::get('usuario',[UsuariosController::class,'indexAPI']);
Route::get('usuarios',[UsuariosController::class,'listAPI']);
Route::post('usuarioo',[UsuariosController::class,'showAPI']);
Route::post('usuario/modificar',[UsuariosController::class,'modifyAPI']);
Route::post('usuario/guardar',[UsuariosController::class,'storeAPI']);
Route::post('usuario/eliminar',[UsuariosController::class,'deleteAPI']);

//Cita
Route::get('cita',[CitasController::class,'indexAPI']);
Route::get('citas',[CitasController::class,'listAPI']);
Route::post('cita',[CitasController::class,'showAPI']);
Route::post('cita/modificar',[CitasController::class,'modifyAPI']);
Route::post('cita/guardar',[CitasController::class,'storeAPI']);
Route::post('cita/eliminar',[CitasController::class,'deleteAPI']);