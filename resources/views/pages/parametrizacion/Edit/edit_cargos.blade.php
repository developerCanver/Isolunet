@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrización</a>
	  <span class="breadcrumb-item active">Editar Cargos</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Administración de Cargos</h4>
  		<p class="mg-b-0">Cargos</p>
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
		{{  Form::open(['action' => ['Parametrizacion\AreasCargoController@update_cargos',$cargos->id_cargo],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
		{!! Form::token() !!}


		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Area</label>
			    	<select name="area" class="form-control select2" required>
			    		
			    		@foreach($areas as $e)
			    			@if ($cargos->fk_area == $e->id_area)
								<option value="{{ $e->id_area }}" selected>{{ $e->nom_area }}</option>	
								<@else
								<option value="" selected>Seleccionar...</option>
								<option value="{{ $e->id_area }}" selected>{{ $e->nom_area }}</option>								
							@endif							
			    		@endforeach
			    	</select>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Nombre cargo</label>
			    	<input type="text" name="nom_cargo" class="form-control" value="{{ $cargos->nom_cargo }}" required>
				</div>
			</div>
		</div>
	
			<button type="submit" class="btn btn-primary">Editar</button>
			
  		<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
  {!!Form::close()!!}
<br><br>

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