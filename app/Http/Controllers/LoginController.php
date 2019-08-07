<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;

class LoginController extends Controller
{
    //
    public function inicio(){
        return view('login/login');
    } 

    public function menu($id="ADMIN"){          
        return view('menu/menu',compact('id'));
    }

    public function validar(Request $request){        
        
        
        /*
        return back()->with('errorlogin', '¡No se encuentra el usuario!');  
        */
    }

    public function panel(){
        $academia= App\academia::all();
        $acuerdos= App\acuerdo::all();
        $users=App\login::all();
        $jefe=APP\jef_carrera::all();
        $docente=APP\docente::all();
        $orden=APP\orden_dia::all();
        $junta=APP\junta::all();
        return view('jpanel',compact('academia','acuerdos','users','jefe','docente','orden','junta'));
    }

    public function adduser(Request $request){
        $request->validate([
            'nombre'=>'required',
            'usuario' => 'required',
            'contraseña' => 'required',
            'confirmar'=> 'required'            
        ]);
        $pass1=$request->contraseña;
        $pass2=$request->confirmar;
        if ($pass1==$pass2) {
            $loginnew = new App\login;
            $loginnew->nombre=$request->nombre;
            $loginnew ->usuario= $request->usuario;
            $loginnew ->contraseña= $request->contraseña;
            $loginnew ->tipo= "ADMIN";            
            $loginnew ->save();
            return back()->with('crearlogin', '¡Usuario Creado con exito!');  
        } else {
            return back()->with('crearlogin', '¡Vefique que la contraseña coincidan!' );  
        }
        
        /*
        return $request;
        */
    }
}
