<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class AcademiaController extends Controller
{
    //
    public function addacademia(Request $request){

        $request->validate([
            'nombreacademia' => 'required',
            'carreraacademia' => 'required'
        ]);
        
        $academianew = new App\academia;
        $academianew->nombre= $request->nombreacademia;
        $academianew->carrera= $request->carreraacademia;
        $academianew->save();
        return back()->with('mensajeacademia', '¡Datos Guardados!');  
        /*
        return $request;
        */
    }

    public function editar($id){
        $academia=App\academia::findOrFail($id);
        return view('panel.edits.editacademia',compact('academia'));
    }

    public function updateacademia(Request $request, $item){
        $academiaupdate=App\academia::findOrFail($item);
        $academiaupdate->nombre= $request->nombreacademia;
        $academiaupdate->carrera= $request->carreraacademia;
        $academiaupdate->save();
        return back()->with('delacademia','¡Nota actualizada Exitosamente!');
    }
    public function delacademia($item){
        
        $academiaeliminar=App\academia::findOrFail($item);
        $academiaeliminar->delete();
        return back()->with('delacademia','¡Academia Eliminada Exitosamente!');
    }
}
