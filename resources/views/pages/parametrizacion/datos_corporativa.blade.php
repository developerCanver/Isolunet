@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrizacion</a>
	  <span class="breadcrumb-item active">Agregar Datos Corporativos</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Administración de Datos Corporativos</h4>
  		<p class="mg-b-0">Datos Corporativos</p>
	</div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
	
  	 <div class="row">
	    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	        @if (count($errors) > 0)
	        <div class="alert alert-danger">
		        <ul>
		            @foreach($errors -> all() as $error)
		                <li>{{$error}}</li>
		            @endforeach
		        </ul>
	        </div>
	        @endif
	    </div>
	</div>

<br>
@include('partials.message_flash')
{{  Form::open(['action' => 'Parametrizacion\DatosCorporativosController@store','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
{!! Form::token() !!}

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
			    	<label for="datos">Nombre del Empresa</label>
			    	<h4 for="">{{ $empresa->razon_social }}</h4>
			    	<input type="hidden" class="form-control" name="fk_empresa" aria-describedby="" value="{{ $empresa->id_empresa }}" style="color: #D20000;" readonly>
				</div>
			</div>	
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
			    	<label for="datos">Misión</label>
			    	<textarea name="str_mision" class="form-control" row="5">@if(count($datos_corporativos_count) == 1){{ $datos_corporativos->str_mision}}@endif</textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
			    	<label for="datos">Visión</label>
			    	<textarea name="str_vision" class="form-control" row="5">@if(count($datos_corporativos_count) == 1){{ $datos_corporativos->str_vision}}@endif</textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
			    	<label for="datos">Principios</label>
			    	<textarea name="str_principios" class="form-control" row="5">@if(count($datos_corporativos_count) == 1){{ $datos_corporativos->str_principios}}@endif</textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
			    	<label for="datos">Estrategia</label>
			    	<textarea name="str_estrategias" class="form-control" row="5">@if(count($datos_corporativos_count) == 1){{ $datos_corporativos->str_estrategias}}@endif</textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
			    	<label for="datos">Política</label>
			    	<textarea name="str_politica" class="form-control" row="5">@if(count($datos_corporativos_count) == 1){{ $datos_corporativos->str_politica}}@endif</textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
			    	<label for="datos">Objetivos</label>
			    	<textarea name="str_Objetivos" class="form-control" row="5">@if(count($datos_corporativos_count) == 1){{ $datos_corporativos->str_Objetivos}}@endif</textarea>
				</div>
			</div>
		</div>
		
		 @if(count($datos_corporativos_count) == 1)
		 	<button type="submit" class="btn btn-warning">Editar</button>
		 @else
			<button type="submit" class="btn btn-primary">Guardar</button>
		 @endif
  			
  		<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
  {!!Form::close()!!}


  </div>
</div>
@endsection


@push('scripts')
<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)

$('.input-number').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});

</script>
@endpush 