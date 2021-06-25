@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrización</a>
	  <span class="breadcrumb-item active">Editar Empresa</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Administración de Empresa</h4>
  		<p class="mg-b-0">Empresas</p>
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
{{  Form::open(['action' => ['Parametrizacion\EmpresaController@update',$empresa->id_empresa],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
{!! Form::token() !!}

		<br>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Razón Social</label>
			    	<input type="text" class="form-control" required name="razon_social" aria-describedby="" value="{{ $empresa->razon_social }}" style="color: #D20000;">
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">NIT</label>
			    	<input type="text" class="form-control input-number" required name="nit" aria-describedby="" value="{{ $empresa->nit }}">
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Representante</label>
			    	<input type="text" class="form-control" required name="representante" aria-describedby="" value="{{ $empresa->representante }}">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Ciudad</label>
			    	<input type="text" class="form-control" required name="ciudad" aria-describedby="" value="{{ $empresa->ciudad }}">
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Dirección</label>
			    	<input type="text" class="form-control" required name="direccion" aria-describedby="" value="{{ $empresa->direccion }}">
				</div>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Logo de la Empresa</label>
			    	<input type="file" class="form-control" id="image" name="image" aria-describedby="" value="{{ old('image') }}"><br>
			    	<img src="{{asset('imgs/logo_empresa/'.$empresa->image)}}" alt="{{$empresa->image}}" height="200px" width="200px" class="img-thumbnail">
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Celular</label>
			    	<input type="text" class="form-control input-number" required name="celular" aria-describedby="" value="{{ $empresa->celular }}">
				</div>
			</div>		
		</div>
		@if ($empresa->bool_estado==0)
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
					<label for="datos">Estado</label>
					<select class="form-control" name="bool_estado" >
					
						<option value="1">Activar</option>
						<option selected value="0">Desactivada</option>
					</select>
				</div>
			</div>
		@endif
		
			
		</div>
  
  		<button type="submit" class="btn btn-warning">Editar</button>	
  		<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
  {!!Form::close()!!}
<br>


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