<?php

namespace App\Http\Controllers;

use App\Models\Consultorios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConsultoriosController extends Controller
{
    public function index(Request $req)
    {
        if($req->id)
        {
            $consultorio = Consultorios::find($req->id);
        }
        else
        {
            $consultorio = new Consultorios;
        }

        //return "Ta bien";
        return view('consultorio',compact('consultorio'));
    }

    public function store(Request $req)
    {
        if($req->id !=0)
        {
            $consultorio = Consultorios::find($req->id);
        }
        else
        {
            $consultorio = new Consultorios();
            Log::debug('Se esta registrando un nuevo consultoio');
        }
        $consultorio->numero = $req->numero;
        $consultorio->edificio = $req->edificio;
        $consultorio->nivel = $req->nivel;

        $consultorio->save();

        //return "Ok";

        //Pa ver que se guardo chido
        Log::info('El consul se registro con el nombre de: '.$consultorio->numero);

        //Pa ver como se guardo
        Log::debug('Detalle del consul: ',[
            'id'=>$consultorio->id,
            'numero'=>$consultorio->numero,
        ]);
        return redirect()->route('consultorios.lista');
    }

    public function list()
    {
        $consultorios = Consultorios::all();

        //return $consultorios;
        return view('consultorios',compact('consultorios'));
    }

    public function delete(Request $req)
    {
        $consultorio = Consultorios::find($req->id);
        $consultorio->delete();
        //return "Ok";
        return redirect()->route('consultorios.lista');
    }

    ////////////////////API

    public function modifyAPI(Request $req){

       
        $consultorio = Consultorios::find($req->id);

        $consultorio->numero = $req->numero;
        $consultorio->edificio = $req->edificio;
        $consultorio->nivel = $req->nivel;

        $consultorio->save();//insert
        return "Ok";

    }

    public function indexAPI(Request $req)
    {
        if($req->id){
            $consultorio = Consultorios::find($req->id);
        }else{
            $consultorio = new Consultorios();
        }
        return "Ok";
        return view('consultorio', compact('consultorio'));
    }

    public function storeAPI(Request $req)
    {
        if($req->id !=0){
            $consultorio = Consultorios::find($req->id);
        }else{
            $consultorio = new Consultorios();
        }

        $consultorio->numero = $req->numero;
        $consultorio->edificio = $req->edificio;
        $consultorio->nivel = $req->nivel;

        $consultorio->save();//insert
        return "Ok";
        //return redirect()->to('/divisiones');
        return redirect()->route('consultorios.lista');
    }

    public function listAPI()
    {
        $consultorios = Consultorios::all();
        return $consultorios;
    }

    public function deleteAPI(Request $id){
        $consultorio = Consultorios::find($id->id);
        $consultorio->delete();
        return "Ok";
        return redirect()->route('consultorios.lista');
    }

}
