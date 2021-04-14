@extends('layouts.app')

@section('title', 'Civitatis | Buscar Actividades')

@section('content')

{!! Form::open(['route' => 'buscar' , 'method' => 'post']) !!}
{{Form::token()}}

<div class="text-center">
    <h3 >Busqueda de Actividades Civitatis</h3><br>
    <span class="text-muted "> Indique el numero de personas y una fecha. Luego haga clic en "Buscar actividades" </span><br><br>
</div>
<div class="form-group row" > 
    {{Form::label('cantidad', 'Cantidad de personas (*) ')}}
    <div class="col-4">
        {{ Form::number('cantidad_personas','', ['required'])}}
    </div>

    {{ Form::label('fecha', 'Fecha:') }}
    <div class="col-4">
    {{
        Form::date('fecha', \Carbon\Carbon::now())
    }}
    </div>
    
    <div id="div-save" class="col text-right">        
        <input type="submit" class="submit_form btn btn-success btn-sm pull-right" value=" Buscar actividades ">        
    </div>    
</div> 
{!! Form::close() !!}

@endsection