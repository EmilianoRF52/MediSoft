<?php

namespace App\Http\Controllers;

use App\Models\Medicamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MedicamentosController extends Controller
{
    public function index(Request $req)
    {
        if($req->id)
        {
            $medicamento = Medicamentos::find($req->id);
        }
        else
        {
            $medicamento = new Medicamentos;
        }

        //return "Ta bien";
        return view('medicamento',compact('medicamento'));
    }

    public function store(Request $req)
    {
        if($req->id !=0)
        {
            $medicamento = Medicamentos::find($req->id);
        }
        else
        {
            $medicamento = new Medicamentos();
            Log::debug('Se esta registrando un nuevo medicamento');
        }
        $medicamento->nombre = $req->nombre;
        $medicamento->marca = $req->marca;
        $medicamento->tipo_medicamento = $req->tipo_medicamento;
        $medicamento->presentacion = $req->presentacion;
        $medicamento->fecha_caducidad = $req->fecha_caducidad;
        $medicamento->lote = $req->lote;

        $medicamento->save();

        //return "Ta bien";
        //Pa ver si se guardo bien esa madre
        Log::info('El medicamento se guardo chido con nombre: '.$medicamento->nombre);

        //Pa ver que se guardo en esa madre
        Log::debug('Detalles del medicamento: ',[
            'id'=>$medicamento->id,
            'nombre'=>$medicamento->nombre,
            'marca'=>$medicamento->marca,
            'tipo_medicamento'=>$medicamento->tipo_medicamento,
        ]);
        return redirect()->route('medicamentos.lista');
    }

    public function list()
    {
        $medicamentos = Medicamentos::all();
        //return $medicamentos;
        return view('medicamentos',compact('medicamentos'));
    }

    public function delete(Request $req)
    {
        $medicamento = Medicamentos::find($req->id);
        $medicamento->delete();
        //return "Ta bien";
        return redirect()->route('medicamentos.lista');
    }

    ////////////////////////////API 

    public function modifyAPI(Request $req){

    
        $medicamento = Medicamentos::find($req->id);
        
        $medicamento->nombre = $req->nombre;
        $medicamento->marca = $req->marca;
        $medicamento->tipo_medicamento = $req->tipo_medicamento;
        $medicamento->presentacion = $req->presentacion;
        $medicamento->fecha_caducidad = $req->fecha_caducidad;
        $medicamento->lote = $req->lote;


        $medicamento->save();//insert

        return "Ok";
    }

    public function indexAPI(Request $req)
    {
        if($req->id){
            $medicamento = Medicamentos::find($req->id);
        }else{
            $medicamento = new Medicamentos();
        }
        return "Ok";
    }

    public function storeAPI(Request $req)
    {
        if($req->id !=0){
            $medicamento = Medicamentos::find($req->id);
        }else{
            $medicamento = new Medicamentos();
        }

        $medicamento->nombre = $req->nombre;
        $medicamento->marca = $req->marca;
        $medicamento->tipo_medicamento = $req->tipo_medicamento;
        $medicamento->presentacion = $req->presentacion;
        $medicamento->fecha_caducidad = $req->fecha_caducidad;
        $medicamento->lote = $req->lote;

        $medicamento->save();//insert
        return "Ok";
    }

    public function listAPI()
    {
        $medicamentos = Medicamentos::all();

        return $medicamentos;
    }

    public function deleteAPI(Request $id){
        $medicamento = Medicamentos::find($id->id);
        $medicamento->delete();

        return "Ok";
    }
}