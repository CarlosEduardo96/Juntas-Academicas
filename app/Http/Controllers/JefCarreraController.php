<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;
class JefCarreraController extends Controller
{
    //
    public function addjefe(Request $request){
        if($request->contraseñajefe==$request->confirmarjefe){
            $users = DB::table('logins')->where('usuario', '=', $request->correojefe);
            if(!$users) {
                $jefe=new App\jef_carrera;
                $user= new App\login;
                $jefe->nombre= $request->nombrejefe;
                $jefe->ap_paterno= $request->paternojefe;
                $jefe->ap_materno= $request->maternojefe;            
                $jefe->edad= $request->edadjefe;
                $jefe->sexo= $request->sexojefe;
                $jefe->telefono= $request->telefonojefe;
                $jefe->correo= $request->correojefe;
                $jefe->area= $request->areajefe;
                $jefe->save();
                $user->nombre=$request->nombrejefe;
                $user->usuario=$request->correojefe;
                $user->contraseña=$request->confirmarjefe;
                $user->tipo="JEFE";
                $user->idJefe=$jefe->id;            
                $user->save();
                return back()->with('mensajejefe', '¡Datos guardados!');
            } else {
                return back()->with('errorjefe', '¡El correo elentrinico ya esta registrado!');
            }
        }
        else{
            return back()->with('contrajefe', '¡Las Contraseñas no Coinciden!');
        }
       
        /*return $request;*/
    }
    public function editar($item){
        $jefe=App\jef_carrera::findOrFail($item);
        return view('panel.edits.editajefe',compact('jefe'));

    }

    public function update(Request $request, $item){
        $jefe=App\jef_carrera::findOrFail($item);
        $jefe->nombre= $request->nombrejefe;
        $jefe->ap_paterno= $request->paternojefe;
        $jefe->ap_materno= $request->maternojefe;            
        $jefe->edad= $request->edadjefe;
        $jefe->sexo= $request->sexojefe;
        $jefe->telefono= $request->telefonojefe;
        $jefe->correo= $request->correojefe;
        $jefe->area= $request->areajefe;
        $jefe->save();
        return back()->with('mensajejefe','¡Acuerdo Actualizado Exitosamente!');
    }
    
    public function deljefe($item){        
        $deljefe=App\jef_carrera::findOrFail($item);

        $users = App\login::where("idJefe","=",$item);
        // En la vista        
        $users->delete();
        $deljefe->delete();          
        return back()->with('deljefe','¡El lefe y los datos relacionados han sido eliminados correctamente! ');
    }

}
