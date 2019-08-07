<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;

class DocenteController extends Controller
{
    //

    public function adddocente(Request $request){
        $pass1=$request->contraseñadocente;
        $pass2=$request->confirmardocente;
        $users = DB::table('logins')->where('usuario', '=', $request->correodocente);
        if(!$users){
            if ($pass1==$pass2) {
                $docente=new App\docente;
                $docente->cedula=$request->ceduladocente;            
                $docente->nombre=$request->nombredocente;
                $docente->ap_paterno=$request->paternodocente;
                $docente->ap_materno=$request->maternodocente;
                $docente->edad=$request->edaddocente;
                $docente->sexo=$request->sexodocente;
                $docente->telefono=$request->telefonodocente;
                $docente->correo=$request->correodocente;
                $docente->puesto=$request->puestodocente;
                $docente->area=$request->areadocente;
                $docente->idAcademia=$request->academiadocente;
                $docente->idJefe=$request->jefedocente;
                $docente->save();
                $user= new App\login;
                $user->nombre=$request->nombredocente;
                $user->usuario=$request->correodocente;
                $user->contraseña=$request->confirmardocente;
                $user->tipo="DOCENTE";
                $user->iddocente=$docente->id;            
                $user->save();
                return back()->with('mensajedocente', '¡Datos guardados!');
            } else {
                return back()->with('contradocente', '¡Verifique que la contraseña coincidan!');
            }
        } 
        else{
            return back()->with('contradocente', '¡El correo ya se encuentra registrado!');
        }       
    }


    public function editar($item){
        $docente=App\docente::findOrFail($item);
        $academia= App\academia::all();
        $jefe=APP\jef_carrera::all();
        return view('panel.edits.editadocente',compact('docente','academia','jefe'));
    }

    public function update(Request $request,$item){
        $docente=App\docente::findOrFail($item);
        $docente->cedula=$request->ceduladocente;            
        $docente->nombre=$request->nombredocente;
        $docente->ap_paterno=$request->paternodocente;
        $docente->ap_materno=$request->maternodocente;
        $docente->edad=$request->edaddocente;
        $docente->sexo=$request->sexodocente;
        $docente->telefono=$request->telefonodocente;
        $docente->correo=$request->correodocente;
        $docente->puesto=$request->puestodocente;
        $docente->area=$request->areadocente;
        $docente->idAcademia=$request->academiadocente;
        $docente->idJefe=$request->jefedocente;
        $docente->save();
        return back()->with('actualizar', '¡Datos actualizados con exito!'); 
    }

    public function delete($item){
        $docente=App\docente::findOrFail($item);
        $users = App\login::where("iddocente","=",$item);
        $docente->delete();
        return back()->with('deldocente','¡Docente eliminado Exitosamente!');
    }
}
