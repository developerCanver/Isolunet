@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrización</a>
	  <span class="breadcrumb-item active">Agregar Proceso</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Administración de Proceso</h4>
  		<p class="mg-b-0">Procesos</p>
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
		{{  Form::open(['action' => 'Parametrizacion\ProcesosController@store_misionales','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
		{!! Form::token() !!}

		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<input type="text" name="cod_proceso" class="form-control" required value="Procesos Misionales" readonly>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<input type="text" name="cod_empresa" class="form-control" required value="{{ $empresa->id_empresa }}" readonly style="display: none;">
			    	<input type="text" name="" class="form-control" required value="{{ $empresa->razon_social }}" readonly >
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Nombre del Proceso</label>
			    	<input type="text" name="nom_proceso" class="form-control" required value="{{ old('nom_proceso') }}">
				</div>
			</div>

			<div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
				<div class="form-group">
			    	<label for="datos">Sigla</label>
			    	<input type="text" name="sigla" class="form-control" required value="{{ old('sigla') }}">
				</div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Usuario Responsable</label>
			    	<select name="usuario_responsable" class="form-control select2" required>
			    		<option value="" selected>Seleccionar....</option>
			    		@foreach ($tabla_usuarios_cliente as $element)
			    			<option value="{{ $element->id }}" >{{ $element->name }}</option>
			    		@endforeach
			    	</select>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12s">
				<div class="form-group">
			    	<label for="datos">Descripción</label>
			    	<textarea class="form-control" rows="5" name="descripcion" required></textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12s">
				<div class="form-group">
			    	<label for="datos">Usuarios Relacionados</label>
			    	<select name="usuarios_relacionados[]" class="form-control select2" required multiple>
			    		
			    		@foreach ($tabla_usuarios_cliente as $element)
			    			<option value="{{ $element->id }}" >{{ $element->name }}</option>
			    		@endforeach
			    	</select>
				</div>
			</div>
		</div>
	
		<button type="submit" class="btn btn-primary">Guardar</button>
			
  		<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
  		{!!Form::close()!!}
		<br><br>

		<div class="br-section-wrapper">
			<div class="row">
				<h4>Listado de procesos Misionales</h4>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>
										Nombre Proceso
									</th>
									<th>
										Sigla
									</th>
									<th>
										Usuario responsable
									</th><th>
										Descripción
									</th>
									<th>
										Usuarios relacionados
									</th>
									<th colspan="2">
										Opciones
									</th>
								</tr>			    	
							</thead>
							<tbody>
								@foreach($proceso_misional as $pm)
								<tr>
									<td>{{ $pm->nom_proceso }}</td>
									<td>{{ $pm->sigla }}</td>
									<td>{{ $pm->name }}</td>
									<td>{{ $pm->descripcion }}</td>
									<td>{{ $pm->name.' '.$pm->fk_usuario_responsable }}</td>
									<td colspan="2">
										<a href="{{ URL::action('Parametrizacion\ProcesosController@edit_proceso_misional',$pm->id_proceso) }}""><i class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>
										<a href="{{ URL::action('Parametrizacion\ProcesosController@destroy_proceso_misional',$pm->id_proceso) }}" ><i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>					
				</div>
			</div>
		</div>
  </div>
</div>
@endsection