<?php

namespace App\Http\Controllers;

use App\Models\Especialidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EspecialidadesController extends Controller
{
    public function index(Request $req)
    {
        if($req->id)
        {
            $especialidad = Especialidades::find($req->id);
        }
        else
        {
            $especialidad = new Especialidades;
        }
        //return "Ta bien";
        return view('especialidad',compact('especialidad'));

    }

    public function store(Request $req)
    {
        if($req->id !=0)
        {
            $especialidad = Especialidades::find($req->id);
        }
        else
        {
            $especialidad = new Especialidades();
        }
        $especialidad->nombre = $req->nombre;
        $especialidad->save();

        //Pa ver que se guardo esa madre
        Log::info('La especialidad fue guardada con el nombre: '.$especialidad->nombre);

        //Pa ver como se guardo esa madre
        Log::debug('Detalles de la especialidad: ',[
            'id'=>$especialidad->id,
            'Nombre'=>$especialidad->nombre,
        ]);
        return redirect()->route('especialidades.lista');
        
    }

    public function list()
    {
        $especialidades = Especialidades::all();

        return view('especialidades',compact('especialidades'));
    }

    public function delete(Request $req)
    {
        $especialidad = Especialidades::find($req->id);
        $especialidad->delete();
        return redirect()->route('especialidades.lista');
    }


    //APIS
    public function indexAPI(Request $req)
    {
        if($req->id)
        {
            $especialidad = Especialidades::find($req->id);
        }
        else
        {
            $especialidad = new Especialidades;
        }
        return "Ok";
        return view('especialidad',compact('especialidad'));

    }

    public function listAPI()
    {
        $especialidades = Especialidades::all();

        return $especialidades;
    }

    public function showAPI(Request $request)
    {
        $especialidad = Especialidades::find($request->id);
        return response()->json($especialidad);
    }

    public function modifyAPI(Request $req){
        $especialidad = Especialidades::find($req->id);

        $especialidad->codigo = $req->codigo;
        $especialidad->nombre = $req->nombre;

        $especialidad->save();

        return "Ok";
    }

    public function storeAPI(Request $req)
    {
        if($req->id !=0){
            $especialidad = Especialidades::find($req->id);
        }else{
            $especialidad = new Especialidades();
        }
        $especialidad->nombre = $req->nombre;
        $especialidad->save();//insert

        return "Ok";
    }

    public function deleteAPI( Request $id){
        $especialidad = Especialidades::find($id->id);
        $especialidad->delete();

        return "Ok";
    }

}
