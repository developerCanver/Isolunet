@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrizacion</a>
	  <span class="breadcrumb-item active">Agregar Cargos</span>
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
		{{  Form::open(['action' => 'Parametrizacion\AreasCargoController@store_cargos','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
		{!! Form::token() !!}


		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Areas</label>
			    	<select name="area" class="form-control select2" required>
			    		<option value="" selected>Seleccionar...</option>
			    		@foreach($areas as $e)
			    		<option value="{{ $e->id_area }}">{{ $e->nom_area }}</option>
			    		@endforeach
			    	</select>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Nombre Cargo</label>
			    	<input type="text" name="nom_cargo" class="form-control" required>
				</div>
			</div>
		</div>

	
			<button type="submit" class="btn btn-primary">Guardar</button>
			
  		<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
  		{!!Form::close()!!}
		<br><br>

		<div class="br-section-wrapper">
			<div class="row">
				<h4>Listado De Cargos</h4>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
					<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>
									Area
								</th>
								<th>
									Nombre Cargo
								</th>
								<th>
									Empresa
								</th>
								<th colspan="2">
									Opciones
								</th>
							</tr>			    	
						</thead>
						<tbody>
							@foreach($tabla_cargos as $h)
							<tr>
								<td>{{ $h->nom_area }}</td>
								<td>{{ $h->nom_cargo }}</td>
								<td>{{ $h->razon_social }}</td>
								<td colspan="2">
									<a href="{{ URL::action('Parametrizacion\AreasCargoController@edit_cargo',$h->id_cargo) }}""><i class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
									<a href="{{ URL::action('Parametrizacion\AreasCargoController@destroy_cargos',$h->id_cargo) }}" ><i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					</div>
					{{ $tabla_cargos->onEachSide(5)->links() }}
				</div>
			</div>
		</div>
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