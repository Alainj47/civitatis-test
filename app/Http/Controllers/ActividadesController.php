<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Actividad;
use App\Models\Reserva;
use Illuminate\Http\Request; 
use DB;

class ActividadesController extends Controller
{
    public function index(){
        return view('actividades.index');
    }

    public function showall(){
        $actividades = Actividad::all();
        return $actividades->toJson();
    }

    public function search(Request $request){
        
        /* $actividades = Actividad::where('fecha_desde','>=',$request->fecha)
                                ->where('fecha_hasta','<=',$request->fecha)
                                ->orderBy('popularidad','desc')
                                ->get(); */
        $sql = "select * from actividades  where ('".$request->fecha."'  >= fecha_desde and '".$request->fecha."' <= fecha_hasta)";
        $actividades = DB::select($sql);
        return view('actividades.resultados')->with([
            'actividades' => $actividades, 
            'fecha' => $request->fecha,
            'cantidad'    => $request->cantidad_personas,
            ]);
    }

    public function reservar(Request $request){
        
        $reserva = new Reserva();
        $reserva->actividad_id = $request->id;
        $reserva->cantidad_personas = $request->cantidad;
        $reserva->precio_total = $request->total;
        $reserva->fecha_reserva = date('Y-m-d h:i:s');
        $reserva->fecha_actividad = $request->fecha;
        $reserva->save();

        return view('actividades.reserva')->with([
            'reserva' => $reserva]);
    }

}
