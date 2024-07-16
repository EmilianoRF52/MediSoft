<?php

namespace App\Http\Controllers;

use App\Models\Doctores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DoctoresController extends Controller
{
    public function index(Request $req)
    {
        if($req->id)
        {
            $doctor = Doctores::find($req->id);
        }
        else
        {
            $doctor = new Doctores;
        }
        //return "Ta bien";
        return view('doctor',compact('doctor'));
    }

    public function store(Request $req)
    {
        if($req->id !=0)
        {
            $doctor = Doctores::find($req->id);
        }
        else
        {
            $doctor = new Doctores();
            Log::debug('Se esta registrando un nuevo doctor');
        }
        $doctor->nombre = $req->nombre;
        $doctor->cedula = $req->cedula;
        $doctor->telefono = $req->telefono;
        $doctor->correo = $req->correo;

        
        $doctor->save();
        //return "Ta bien";
        //Pa ver que si se guardo chido
        Log::info('El doctor fue registrado chido con su cedula:'.$doctor->cedula);

        //Pa que se vea que doc se guardo
        Log::debug('Detalles del doc: ',[
            'id'=>$doctor->id,
            'Nombre'=>$doctor->nombre,
            'Cedula'=>$doctor->cedula,
        ]);
        return redirect()->route('doctores.lista');
    }

    public function list()
    {
        $doctores = Doctores::all();

        //return $doctores;
        return view('doctores',compact('doctores'));
    }

    public function delete(Request $req)
    {
        $doctor = Doctores::find($req->id);
        $doctor->delete();
        //return "Ta bien";
        return redirect()->route('doctores.lista');
    }

    ///////////////////API

    public function modifyAPI(Request $req){

       
       
        $doctor = Doctores::find($req->id);
      
        $doctor->nombre = $req->nombre;
        $doctor->cedula = $req->cedula;
        $doctor->telefono = $req->telefono;
        $doctor->correo = $req->correo;

        $doctor->save();//insert

        return "Ok";

    }

    public function indexAPI(Request $req)
    {
        if($req->id){
            $doctor = Doctores::find($req->id);
        }else{
            $doctor = new Doctores();
        }

        return "Ok";
    }

    public function storeAPI(Request $req)
    {
        if($req->id !=0){
            $doctor = Doctores::find($req->id);
        }else{
            $doctor = new Doctores();
        }

        $doctor->nombre = $req->nombre;
        $doctor->cedula = $req->cedula;
        $doctor->telefono = $req->telefono;
        $doctor->correo = $req->correo;

        $doctor->save();//insert

        return "Ok";
    }

    public function listAPI()
    {
        $doctores = Doctores::all();

        return $doctores;
    }

    public function deleteAPI(Request $id){
        $doctor = Doctores::find($id->id);
        $doctor->delete();
        
        return "Ok";
    }
}
