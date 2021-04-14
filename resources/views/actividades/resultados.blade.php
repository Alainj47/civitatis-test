@extends('layouts.app')
@section('title', 'Civitatis | Lista de Actividades')
@section('content')

{!! Form::open(['route' => 'comprar' , 'method' => 'post']) !!}
{{Form::token()}}

<div class="content">
    @if($actividades)
    <h3 class="text-center">Actividades Civitatis</h3><br>
    <h5>Resultados de actividades para la fecha <b> {{$fecha}} </b> </h5>
    <h5>Total de personas : {{$cantidad}} </h5> <br>
    <table class="table table-responsive">    
        <tr>
            <th>#</th>
            <th>Actividad</th>
            <th>Fecha desde</th>
            <th>Fecha hasta</th>
            <th>Precio por persona</th>
            <th>Precio Total <br>({{$cantidad}} personas) </th>
            <th>Popularidad</th>
            <th>Acción</th>
        </tr>
        @foreach($actividades as $key => $actividad)
        <tr>
            @php $total = $actividad->precio_persona*$cantidad @endphp

            <td> {{++$key}} </td>
            <td> {{ $actividad->titulo }} </td>
            <td> {{ $actividad->fecha_desde }} </td>
            <td> {{ $actividad->fecha_hasta }} </td>
            <td> {{ $actividad->precio_persona }} </td>
            <td> <b>{{ $total }} </b></td>
            <td> {{ $actividad->popularidad }} </td>
            <td> <a href=" {{ url('comprar/?id='.$actividad->id.'&fecha='.$fecha.'&cantidad='.$cantidad.'&total='.$total) }} " class="btn btn-success"> Comprar</a></td>
        </tr>
        @endforeach
    </table>
    @else
        <h4>No hay resultados de actividades encontradas para la fecha: <b>{{$fecha}}</b> </h4>        
    @endif
    <div class="text-center">
        <br>
        <a href="actividades" class="btn btn-danger">Regresar</a>
    </div>
    
</div>
{!! Form::close() !!}

@endsection