@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrización</a>
	  <span class="breadcrumb-item active">Asignación de empresa</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Administración Asignación de Empresa</h4>
  		<p class="mg-b-0">Areas</p>
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
		{{  Form::open(['action' => 'Parametrizacion\UsuariosController@mover_usuario','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
		{!! Form::token() !!}
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Empresa</label>
			    	<select name="empresa" class="form-control select2" required>
			    		@foreach ($empresa as $element)
			    			<option value="{{ $element->id_empresa }}" selected>{{ $element->razon_social }}</option>	
			    		@endforeach
			    	</select>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Usuario</label>
			    	<select name="usuarios" class="form-control select2" required>
			    	@foreach ($usuarios as $element)
			    			<option value="{{ $element->id }}" selected>{{ $element->name }}</option>	
			    	@endforeach	  
			    	</select>
				</div>
			</div>
		</div>

	
			<button type="submit" class="btn btn-primary">Asignar</button>
			<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>

		{!!Form::close()!!}
		<br><br>

	<div class="br-section-wrapper">
		<div class="row">
			<h4>Listado Usuario - Empresa</h4>
		</div>
			<div class="row">
				<div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>
										Empresa
									</th>
									<th>
										Usuario
									</th>
								</tr>			    	
							</thead>
							<tbody>
								@foreach ($tabla as $element)
								<tr>
									<td>{{ $element->razon_social }}</td>
									<td>{{ $element->name }}</td>
								</tr>
								@endforeach								
							</tbody>
						</table>
					</div>
					{{ $tabla->onEachSide(15)->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection