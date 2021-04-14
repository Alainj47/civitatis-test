<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{    

    protected $table = "actividades";
	
    protected $fillable = ['titulo','fecha_desde','fecha_hasta','precio_persona','popularidad'];

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }
}
