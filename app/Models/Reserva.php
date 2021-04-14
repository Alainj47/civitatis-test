<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{    

    protected $table = "reservas";
	
    protected $fillable = ['actividad_id','cantidad_personas','precio_total','fecha_reserva','fecha_actividad'];

    public function actividades(){
        return $this->belongsTo('App\Models\Actividad','actividad_id');
    }
}
