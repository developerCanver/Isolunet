{{-- @extends('layouts.dashboard',['body_class'=>'collapsed-menu']) --}}
@extends('layouts.dashboard')

@section('content')

{{  Form::open(['action' => 'mejora\AnomaliasController@store_anomalia','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
	{!! Form::token() !!}
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <span class="breadcrumb-item active">Anomalia</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Analisis de Anomalia </h4>
  		<p class="mg-b-0">Problema o Mejora</p>
	</div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
  	<div class="row">
  		<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
  			<div class="form-group">
			    <label for="exampleInputEmail1">Sistema de Gestion</label>
			    <select name="sistema_gestion" class="form-control">
			    	<option value="" selected>Seleccionar</option>
			    	@foreach ($sistema_gestion as $value)
			    		<option value="{{ $value->id_sisgestion }}" >{{ $value->str_nombre }}</option>
			    	@endforeach
			    	
			    </select>
			</div>
  		</div>
  		<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
  			<div class="form-group">
			    <label for="exampleInputEmail1">Proceso</label>
			    <select name="procesos" id="procesos" class="form-control">
			    </select>
			</div>
  		</div>
  	</div>

  	<div class="row">
  		<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
  			<div class="form-group">
			    <label for="exampleInputEmail1">Origen Anomalia</label>
			    <select name="origen_anomalia" class="form-control">
			    	<option value="" selected>Seleccionar</option>
			    	@foreach ($origen_anomalias as $element)
			    		<option value="{{ $element->id_origen_anomalia }}">{{ $element->nombre }}</option>
			    	@endforeach

			    </select>
			</div>
  		</div>
  	</div>
	
  	<div class="row">
  		<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
  			<div class="form-group">
			    <label for="exampleInputEmail1">Reportado por </label>
			    <select name="reportado_por" class="form-control">
			    	<option value="" selected>Seleccionar</option>
			    	@foreach ($usuarios as $element)
			    		<option value="{{ $element->name }}" >{{ $element->name }}</option>
			    	@endforeach
			    </select>
			</div>
  		</div>
  		<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
  			<div class="form-group">
			    <label for="exampleInputEmail1">Fecha </label>
			    <input type="date" name="fecha" class="form-control" value="{{ date("Y-m-d") }}">
			</div>
  		</div>
  	</div>

  	<div class="row" style="background-color: #18A4B4; padding: 1%;">
  		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
	  		<center style="color: #FFFFFF;">
	  			Anomalia
	  		</center>
	  		<br>
	  		<textarea name="anomalia" class="form-control" rows="5"></textarea>
	  	</div>
  	</div>
  	<div class="row" style="background-color: #18A4B4; padding: 1%;">
  		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
	  		<input type="file" name="documento_anomalia" class="form-control">
	  	</div>
  	</div>
	<hr>
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
			<div class="form-group">
			    <label for="exampleInputEmail1">Correccion </label>
			    <textarea name="correcion" id="correcion" class="form-control" rows="3"></textarea>
			</div>
		</div>
	</div>
	<div class="row">
  		<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
  			<div class="form-group">
			    <label for="exampleInputEmail1">Quien? </label>
			     <select name="quien" id="quien" class="form-control">
			    	<option value="" selected>Seleccionar</option>
			    	@foreach ($usuarios as $element)
			    		<option value="{{ $element->name }}" >{{ $element->name }}</option>
			    	@endforeach
			    </select>
			</div>
  		</div>
  		<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
  			<div class="form-group">
			    <label for="exampleInputEmail1">Fecha </label>
			    <input type="date" name="fechaanomalia" id="fechaanomalia" class="form-control" value="{{ date("Y-m-d") }}">
			</div>
  		</div>
  	</div>
  	<div class="row">
  		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
  			<label for="exampleInputEmail1">Solo un archivo para todas las correcciones </label>
	  		<input type="file" name="documento_correcciones" class="form-control">
	  	</div>
  	</div>
	<br>
	<div class="row">
		<div class="col-sm-1 col-md-1 col-lg-1 col-xs-12">
			<a class="btn btn-success" title="Agregar" id="bt_add" style="color: #FFFFFF">+</a>
		</div>
	</div>

	
	<br>
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" id="mostrar_tabla">
			<div class="table-responsive">
				<table class="table table-striped" id="detalles">
					<caption>Correccionaes</caption>
					<thead>
						<tr>
							<th>Opciones</th>
							<th>Correccion</th>
							<th>Quien</th>
							<th>Fecha</th>
							
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
  	<hr>

  	<div class="row">
		<div class="col-sm-1 col-md-1 col-lg-1 col-xs-12">
			<button type="submit" class="btn btn-info" id="guardar">Enviar</button>
		</div>
	</div>


  </div>
</div>

{!!Form::close()!!}
@endsection
@push('scripts')

<script>
	
 $(document).ready(function() {
        $('select[name="sistema_gestion"]').on('change', function() {

            var stateID = $(this).val();

            if(stateID) {
                $.ajax({
                    url: "{{ URL::to('sistemagestion/proceso') }}/"+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(res) {

                    	if(res)
		                {
		                    $('#procesos').empty();
		                    $('#procesos').append('<option>Selecccionar</option>');
		                    $.each(res,function(key,value){
		                      $('#procesos').append('<option value="'+key+'">'+value+'</option>');
		                    });
		                }
                    }
                });
            }else{
                $('#procesos').empty();
            }
        });



    $("#bt_add").click(function(){
	      agregar();
	      // alert("entro");
	    });
	

 	var cont=0;
  	$('#guardar').hide();
  	$('#mostrar_tabla').hide();

  	function agregar(){

    // keys
    var str_correccion		= $('#correcion').val();
    var str_quien			= $("#quien option:selected").text();
    var date_fecha 			= $('#fechaanomalia').val();

 
    
    if (str_correccion != ""  && str_quien != "" && date_fecha != "")
    {

      $('#detalles').css('display','inline');
      $('#mostrar_tabla').css('display','inline');
      

      var 	fila = '<tr class="selected" id="fila'+cont+'">';
        	fila+= '<td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>';
        	fila+= '<td>';
	        fila+= '<textarea name="str_correccion[]" class="form-control" row="5">'+str_correccion+'</textarea>';
	        fila+= '</td>';
	        fila+= '<td>';
	        fila+= '<input type="text" class="form-control" name="str_quien[]" id="str_quien" value="'+str_quien+'" >';
	      	fila+= '<input type="hidden" class="form-control" name="cont[]" value="'+cont+'" >';
	        /*fila+= '<input type="hidden" class="form-control" name="articulo_id[]" value="'+articulo_id+'" >';*/
	        fila+= '</td>';
	        fila+= '<td>';
	        fila+= '<input type="text" class="form-control" name="date_fecha[]" id="date_fecha" value="'+date_fecha+'" >';
	        fila+= '</td>';
        	fila+= '</tr>';
	        cont++;
        	// limpiar();
        	alert("Se Agrago Correctamente");
    	    evaluar();
       		 $('#detalles').append(fila); 

    }
    else{
      alert('Error al Ingresar el detalle, revise los detalles');
    }
   
  }

   function limpiar() {
   	$('#correcion').val("");
  
  }

  function evaluar(){
     
    
      $("#guardar").show();
  
  }

  function eliminar(index){
  
    $('#fila'+index).remove();
    evaluar();
  }





});

</script>

 



@endpush 