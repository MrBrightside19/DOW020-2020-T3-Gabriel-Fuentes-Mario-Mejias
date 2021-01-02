<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\PDF;

use App\Models\Arriendo;
use PDF;

use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    
    

    private function getArriendos(){
        $tablaArriendos = collect();
        foreach(Arriendo::all() as $arriendo){
            $tablaArriendos->add([
                'id' => $arriendo->id,
                'estado' => $arriendo->estado,
                'nombres' => $arriendo->cliente->nombres,
                'apellidos' => $arriendo->cliente->apellidos,
                'fecha_o' => $arriendo->fecha_origen,
                'hora_o' => $arriendo->hora_origen,
                'fecha_d' => $arriendo->fecha_destino,
                'hora_d' => $arriendo->hora_destino,
                'valorfinal' => $arriendo->valorfinal,
                'total' => $arriendo->getTotalIngresos()
            ]);            
        }
        return $tablaArriendos->values()->all();
    }
    
    public function tablaArriendos(){   
        $tablaArriendos = $this->getArriendos();
        return view('estadisticas.estadisticas',compact('tablaArriendos'));
    }

    public function descargarTablaArriendos(){
        $tablaArriendos = $this->getArriendos();
        $pdf = PDF::loadView('estadisticas.estadisticas',compact('tablaArriendos'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('ingresos-arriendos.pdf');
    }

}
