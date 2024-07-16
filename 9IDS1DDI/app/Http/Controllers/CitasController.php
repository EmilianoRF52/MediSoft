<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Consultorios;
use App\Models\Doctores;
use App\Models\Especialidades;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    public function index(Request $req)
    {
        if($req->id)
        {
            $cita = Citas::fin($req->id);
        }
        else
        {
            $cita = new Citas();
        }
        $pacientes = Pacientes::all();
        $especialidades = Especialidades::all();
        $doctores = Doctores::all();
        $consultorios = Consultorios::all();

        return view('cita',compact('cita','pacientes','especialidades','doctores','consultorios'));
    }

    public function store(Request $req)
    {
        if($req->id !=0)
        {
            $cita = Citas::find($req->id);
        }
        else
        {
            $cita = new Citas();
        }
        $cita->id_paciente = $req->id_paciente;
        $cita->id_especialidad = $req->id_especialidad;
        $cita->id_doctor = $req->id_doctor;
        $cita->id_consultorio = $req->id_consultorio;
        $cita->estado = $req->estado;
        $cita->fecha_hora = $req->fecha_hora;

        $cita->save();

        return redirect()->route('citas.lista');
    }

    public function list()
    {
        $citas = Citas::
            join('paciente','citas.id_paciente','=','paciente.id')
            ->join('especialidad','citas.id_especialidad','=','especialidad.id')
            ->join('doctor','citas.id_doctor','=','doctor.id')
            ->join('consultorio','citas.id_consultorio','=','consultorio.id')
            ->select('citas.*'
                    ,'especialidad.nombre as nombre_especialidad'
                    ,'doctor.nombre as nombre_doctor'
                    ,'consultorio.numero as numero_consultorio')
            ->get();

        return view('citas',compact('citas'));
    }

    public function delete(Request $req)
    {
        $cita = Citas::find($req->id);
        $cita->delete();
        return redirect()->route('citas.lista');
    }

    //APIS
    public function indexAPI(Request $req)
    {
        if($req->id)
        {
            $cita = Citas::find($req->id);
        }
        else
        {
            $cita = new Citas();
        }
        return "Ok";
    }

    public function listAPI()
    {
        $citas = Citas::all();

        return $citas;
    }

    public function showAPI(Request $request)
    {
        $cita = Citas::find($request->id);
        return response()->json($cita);
    }

    public function modifyAPI(Request $req)
    {
        $cita = Citas::find($req->id);

        $cita->estado = $req->cita;
        $cita->fecha_hora = $req->fecha_hora;

        $cita->save();

        return "Ok";
    }

    public function storeAPI(Request $req)
    {
        if($req->id !=0)
        {
            $cita = Citas::find($req->id);
        }
        else
        {
            $cita = new Citas();
        }
        $cita->id_paciente = $req->id_paciente;
        $cita->id_especialidad = $req->id_especialidad;
        $cita->id_doctor = $req->id_doctor;
        $cita->id_consultorio = $req->id_consultorio;
        $cita->estado = $req->estado;
        $cita->fecha_hora = $req->fecha_hora;

        $cita->save();

        return "Ok";
    }

    public function deletAPI(Request $id)
    {
        $cita = Citas::find($id->id);
        $cita->delete();

        return "Ok";
    }
}
