<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PacientesController extends Controller
{
    public function index(Request $req)
    {
        if($req->id)
        {
            $paciente = Pacientes::find($req->id);
        }
        else
        {
            $paciente = new Pacientes();
        }
        //return "Ta bien";
        return view('paciente',compact('paciente'));
    }

    public function store(Request $req)
    {
        if($req->id !=0)
        {
            $paciente = Pacientes::find($req->id);
        }
        else
        {
            $paciente = new Pacientes();
            Log::debug('Se esta registrando un nuevo paciente');
        }
        $paciente->nombre = $req->nombre;
        $paciente->edad = $req->edad;
        $paciente->telefono = $req->telefono;
        $paciente->peso = $req->peso;
        $paciente->altura = $req->altura;
        $paciente->direccion = $req->direccion;
        $paciente->correo = $req->correo;
        $paciente->tipo_sangre = $req->tipo_sangre;

        
        $paciente->save();
        //return "Ta bien";
        //Pa ver que si se guardo chido
        Log::info('El paciente fue registrado con el nombre:'.$paciente->nombre);

        //Pa que se vea que doc se guardo
        Log::debug('Detalles del paciente: ',[
            'id'=>$paciente->id,
            'Nombre'=>$paciente->nombre,
            'Telefono'=>$paciente->telefono,
        ]);
        return redirect()->route('pacientes.lista');
    }

    public function list()
    {
        $pacientes = Pacientes::all();

        //return $doctores;
        return view('pacientes',compact('pacientes'));
    }

    public function delete(Request $req)
    {
        $paciente = Pacientes::find($req->id);
        $paciente->delete();
        //return "Ta bien";
        return redirect()->route('pacientes.lista');
    }

    ///////////////////API

    public function modifyAPI(Request $req){

       
       
        $paciente = Pacientes::find($req->id);
      
        $paciente->nombre = $req->nombre;
        $paciente->edad = $req->edad;
        $paciente->telefono = $req->telefono;
        $paciente->peso = $req->peso;
        $paciente->altura = $req->altura;
        $paciente->direccion = $req->direccion;
        $paciente->correo = $req->correo;
        $paciente->tipo_sangre = $req->tipo_sangre;

        $paciente->save();//insert

        return "Ok";

    }

    public function indexAPI(Request $req)
    {
        if($req->id){
            $paciente = Pacientes::find($req->id);
        }else{
            $paciente = new Pacientes();
        }

        return "Ok";
    }

    public function storeAPI(Request $req)
    {
        if($req->id !=0){
            $paciente = Pacientes::find($req->id);
        }else{
            $paciente = new Pacientes();
        }

        $paciente->nombre = $req->nombre;
        $paciente->edad = $req->edad;
        $paciente->telefono = $req->telefono;
        $paciente->peso = $req->peso;
        $paciente->altura = $req->altura;
        $paciente->direccion = $req->direccion;
        $paciente->correo = $req->correo;
        $paciente->tipo_sangre = $req->tipo_sangre;

        $paciente->save();//insert

        return "Ok";
    }

    public function listAPI()
    {
        $pacientes = Pacientes::all();

        return $pacientes;
    }

    public function showAPI(Request $request)
    {
        $paciente = Pacientes::find($request->id);
        return response()->json($paciente);
    }

    public function deleteAPI(Request $id){
        $paciente = Pacientes::find($id->id);
        $paciente->delete();
        
        return "Ok";
    }
}
