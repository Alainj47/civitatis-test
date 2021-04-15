@extends('layouts.app')
@section('title', 'Civitatis | Buscar Actividades')
@section('content')

{!! Form::open(['route' => 'buscar' , 'method' => 'post']) !!}
{{ csrf_field() }}
<div class="text-center">
    <h3 >Busqueda de Actividades Civitatis</h3><br>
    <span class="text-muted "> Indique el numero de personas y una fecha. Luego haga clic en "Buscar actividades" </span><br><br>
</div>
<div class="form-group row" > 
    {{Form::label('cantidad', 'Cantidad de personas (*) ')}}
    <div class="col-3">
        {{ Form::number('cantidad_personas','', ['required','class'=>'cantidad'])}}
    </div>
    {{ Form::label('fecha', 'Fecha:') }}
    <div class="col-3">
    {{
        Form::date('fecha', \Carbon\Carbon::now())
    }}
    </div>        
    <div class="col-2 text-right">        
        <input type="button" class="submit_form btn btn-info btn-sm pull-right" value=" Buscar actividades " name="find" id="find">        
    </div>        
</div> 
<div id="table-data" style="border:1px solid rgba(0,0,0,.2);border-radius:5px; display:none">aqui</div>
{!! Form::close() !!}

@endsection
@section('scripts')
    <script>    

        function comprar(id, cantidad, total){
            Swal.fire({
                        title: "Confirmación",
                        text: "Desea realizar esta compra?",
                        type: "warning",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: "Comprar",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.value) {
                            fetch('{{route("comprar")}}', {
                                headers: {
                                    "Content-Type": "application/json",
                                    "Accept": "application/json, text-plain, */*",
                                    "X-Requested-With": "XMLHttpRequest",
                                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                method: 'post',
                                credentials: "same-origin",
                                body: JSON.stringify({
                                    id: id, 
                                    fecha: document.getElementById('fecha').value,
                                    cantidad: cantidad,
                                    total: total
                                })
                                })
                                .then( response => response.json() )
                                .then( data => {
                                    $('#table-data').hide();
                                    $('.cantidad').val('');
                                    var htmlOut = `<table class="table table-responsive text-left" >
                                                    <tr>
                                                        <th>Numero de Reserva</th>
                                                        <td>`+data.id+ ` </td>            
                                                    </tr>
                                                    <tr>
                                                        <th>Actividad</th>
                                                        <td> `+data.actividades.titulo+ ` </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Cantidad de personas</th>
                                                        <td>`+data.cantidad_personas+ ` </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Precio Total</th>
                                                        <td>`+data.precio_total+ ` </td>            
                                                    </tr>
                                                    <tr>
                                                        <th>Fecha de Reserva</th>
                                                        <td> `+data.fecha_reserva+ `  </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Fecha de la Actividad</th>
                                                        <td> `+data.fecha_actividad+ `</td>
                                                    </tr>
                                                </table>`

                                    Swal.fire({
                                        title: "Reserva creada",
                                        html: htmlOut,
                                        icon: "success",
                                        type: "warning",
                                        showCancelButton: false,
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: "Ok",
                                    });
                                }); 
                        }else{
                            //alert('Elese inter')
                            console.log('No Confirmado')                            
                        }
                        });
                       
        
        }

        $(document).ready(function(){        
            $("#find").click(function(){
                var id = $("#instructores").val();
                let fechaForm = $("#fecha").val();
                var cantidad = $(".cantidad").val();
                var total = 0;

                if(!cantidad){

                    Swal.fire({
                        title: "Campos requeridos",
                        icon: "warning",
                        text: "Por favor coloca una cantidad de personas",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: "Ok",
                    });
                }else{
                    console.log(fechaForm);
                    console.log(cantidad);
                    var fecha2 = fechaForm;
                    
                    var table = new Tabulator("#table-data", {
                        ajaxURL:"{{route('buscar')}}", //ajax URL
                        ajaxConfig:"POST",
                        ajaxParams:{fecha:fechaForm, cantidad:cantidad, _token:"{{ csrf_token() }}"}, //ajax parameters
                        layout:"fitColumns",
                        responsiveLayout:true,
                        tooltips:true,
                        pagination:"local",
                        paginationSize: "20" ,
                        paginationSizeSelector:20,
                        movableColumns:true,
                        headerFilterPlaceholder:"",
                        placeholder:"No hay actividades disponible en esta fecha", //display message to user on empty table
                        langs:{
                            "es-es":{
                                "pagination":{
                                    "first":"Primero", //text for the first page button
                                    "first_title":"Primero", //tooltip text for the first page button
                                    "last":"Ultimo",
                                    "last_title":"Ultimo",
                                    "prev":"Anterior",
                                    "prev_title":"Anterior",
                                    "next":"Siguiente",
                                    "next_title":"Siguiente",
                                    "page_size":"Cantidad por pagina",
                                    "show_page_title": "Cantidad por pagina",
                                },
                            }
                        },
                        tooltips:function(cell){
                        return cell.getValue(); 
                    },
                        columns:[ 
                            {title:"Id", field:"id", headerFilter:"input",  headerSort:true},
                            {title:"Actividad", field:"titulo", headerFilter:"input",  headerSort:true},
                            {title:"F desde", field:"fecha_desde", headerFilter:"input",  headerSort:true},
                            {title:"F hasta", field:"fecha_hasta", headerFilter:"input",  headerSort:true},
                            {title:"Precio p/p", field:"precio_persona", headerFilter:"input",  headerSort:true},
                            {title:"Precio Total", field:"precio_persona",  headerFilter:"input",  headerSort:true, formatter:function(cell, formatterParams, onRendered){                                
                                total = cell.getData().precio_persona *cantidad ;
                                
                                return total;
                                },
                            },
                            {title:"Popularidad", field:"popularidad", headerFilter:"input"},                            
                            {title:"Acción",  download:false, field:"id",       headerSort:false, formatter:function(cell, formatterParams, onRendered){
                                
                                return `<div class="text-center">
                                            <input type="button" class="btn btn-success" value="Comprar" onclick="comprar(`+cell.getValue()+`,`+cantidad+`,`+total+`)">
                                        </div>`;
                                },
                            },
                        ],
                    });

                    table.setLocale("es-es");
                }
                });
        });

    </script>
@endsection