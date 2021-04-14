@extends('layouts.app')

@section('title', 'Civitatis | Buscar Actividades')

@section('content')


<div class="text-center">
    <h3 >Actividad Reservada con Éxito</h3><br>    
</div>
<div class="form-group row " > 
    <table class="table ">
        <tr>
            <th>Numero de Reserva</th>
            <td> {{  $reserva->id}} </td>            
        </tr>
        <tr>
            <th>Actividad</th>
            <td> {{$reserva->actividades->titulo}} </td>
        </tr>
        <tr>
            <th>Cantidad de personas</th>
            <td>{{$reserva->cantidad_personas}} </td>
        </tr>
        <tr>
            <th>Precio Total</th>
            <td>{{ $reserva->precio_total}} </td>            
        </tr>
        <tr>
            <th>Fecha de Reserva</th>
            <td> {{$reserva->fecha_reserva}} </td>
        </tr>
        <tr>
            <th>Fecha de la Actividad</th>
            <td>{{$reserva->fecha_actividad}} </td>
        </tr>
    </table>
</div>
<div class="text-center">
        <br>
        <a href="actividades" class="btn btn-danger">Regresar</a>
    </div>
@endsection