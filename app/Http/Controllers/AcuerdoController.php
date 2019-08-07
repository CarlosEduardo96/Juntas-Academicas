<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;

class AcuerdoController extends Controller
{
    //
    public function addacuerdo(Request $request){
        $request->validate([
            'nombreacuerdo' => 'required',
            'fechaacuerdo' => 'required',
            'statusacuerdo'=> 'required'
        ]);
        $acuerdonew = new App\acuerdo;
        $acuerdonew ->nombre= $request->nombreacuerdo;
        $acuerdonew ->fecha= $request->fechaacuerdo;
        $acuerdonew ->status= $request->statusacuerdo;
        $acuerdonew ->save();
        return back()->with('mensajeacuerdo', '¡Datos Guardados!');  
        /*
        return $request;
        */
    }
    public function editar(Request $request, $item){
        $acuerdo=App\acuerdo::findOrFail($item);
        return view('panel.edits.editacuerdo',compact('acuerdo'));
    }

    public function update(Request $request, $item){
        $acuerdo=App\acuerdo::findOrFail($item);
        $acuerdo->nombre= $request->nombreacuerdo;
        $acuerdo->fecha= $request->fechaacuerdo;
        $acuerdo->status= $request->statusacuerdo;
        $acuerdo->save();
        return back()->with('delacuerdo','¡Acuerdo Actualizado Exitosamente!');
    }



    public function delacuerdo($item){
        $acuerdodel=App\acuerdo::findOrFail($item);
        $acuerdodel->delete();
        return back()->with('delacuerdo','¡Acuerdo Eliminada Exitosamente!');
    }
}
