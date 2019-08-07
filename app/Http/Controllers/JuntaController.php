<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class JuntaController extends Controller
{
    //
    public function addjunta(Request $request){        
        if(($request->datos)){            
            $idjunta=$this->crearjunta($request);        
            $idordenes=$this->saveorden($request);
            $this->savehacen($idordenes,$idjunta);
            $this->saveobtienen($idordenes,$idjunta);

            return back()->with('mensajejunta','¡Datos guardados Exitosmente!');
        }
        else{
            return back()->with('errorjunta','¡Porfavor Agregue Una orden!');
        }        
    }
    public function crearjunta($request){
        $juntas=new App\junta;
        $juntas->nombre=$request->nombrejunta;
        $juntas->descripcion=$request->descripcionjunta;
        $juntas->fecha=$request->fechajunta;
        $date = date_create($request->horajunta);
        $juntas->hora=date_format($date,'Y-m-d H:i:s');
        $juntas->id_aca=$request->academiajunta;
        $juntas->save();
        return $juntas->id;
    }

    public function saveorden($request){
        $ultimo=array(); 
        foreach ($request->datos as $value) {
            //ordenes del dia
            $orden=new App\orden_dia;
            $orden->nombre=$value;
            $orden->fecha=$request->fechajunta;
            $orden->save();
        }   
        return $ultimo;
    }
    public function saveobtienen($datos,$idjunta){        
        foreach ($datos as $value) {
            //ordenes del dia
            $obtienen=new App\obtiene;
            $obtienen->idjunta=$idjunta;
            $obtienen->idOrden=$value;
            $obtienen->save();
            
        }        
    }

    public function savehacen($datos,$idjunta){        
        foreach ($datos as $value) {
            //ordenes del dia
            $hacen=new App\hacen;
            $hacen->idjunta=$idjunta;
            $hacen->idOrden=$value;
            $hacen->save();
            array_push($ultimo, $hacen->id);
        }
    }
}
