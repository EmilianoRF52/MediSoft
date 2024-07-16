<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UsuariosController extends Controller
{
    public function index(Request $req)
    {
        if($req->id)
        {
            $usuario = User::find($req->id);
        }
        else
        {
            $usuario = new User;
        }
        //return "Ta bien";
        return view('usuario',compact('usuario'));//////////////
        
    }

    public function store(Request $req)
    {
        if($req->id !=0)
        {
            $usuario = User::find($req->id);
        }
        else
        {
            $usuario = new User();
            Log::debug('Se esta registrando un nuevo usuario');
            $usuario->password = $req->password;
        }
        $usuario->name = $req->name;
        $usuario->email = $req->email;
        $usuario->rol = $req->rol;
        

        $usuario->save();
//        return $usuario;
        /*
        name
        email
        password
        rol
        */
        
        //Pa ver que si se guardo chido
        Log::info('El usuario fue registrado con el nombre:'.$usuario->name);

        //Pa que se vea que doc se guardo
        Log::debug('Detalles del paciente: ',[
            'id'=>$usuario->id,
            'Nombre'=>$usuario->name,
            'Telefono'=>$usuario->temail,
        ]);

        return redirect()->route('usuarios.lista');/////////////////////////////////////////////////////////////
        //pacunetes.lista'
        //User.lista'
    }

    public function list()
    {
        $usuarios = User::all();
//        return $usuarios;
        return view('usuarios',compact('usuarios'));/////////////////////////////////////////////////////////
        //pacientes
    }

    public function delete(Request $req)
    {
        $usuario = User::find($req->id);
        $usuario->delete();
        //return "Ta bien";
        return redirect()->route('usuarios.lista');/////////////////////////////////////////////////////////
    }

    ///////////////////API

    public function modifyAPI(Request $req){

        $usuario = User::find($req->id);
        $usuario->name = $req->name;
        $usuario->email = $req->email;
        $usuario->password = $req->password;

        $usuario->save();//insert

        return "Ok";

    }

    public function indexAPI(Request $req)
    {
        if($req->id){
            $usuario = User::find($req->id);
        }else{
            $usuario = new User();
        }
        return "Ok";
    }

    public function storeAPI(Request $req)
    {
        if($req->id !=0){
            $usuario = User::find($req->id);
        }else{
            $usuario = new User();
        }
        $usuario->name = $req->name;
        $usuario->email = $req->email;
        $usuario->password = $req->password;

        $usuario->save();//insert

        return "Ok";
    }

    public function listAPI()
    {
        $usuarios = User::all();

        return $usuarios;
    }

    public function deleteAPI(Request $id){
        $usuario = User::find($id->id);
        $usuario->delete();
        
        return "Ok";
    }

    public function showAPI(Request $request)
    {
        $usuario = User::find($request->id);
        return response()->json($usuario);
    }
}
