@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrización</a>
	  <span class="breadcrumb-item active">Editar Proceso Gerencial</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Administración de Procesos Gerenciales</h4>
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
		{{  Form::open(['action' => ['Parametrizacion\ProcesosController@update_proceso_gerencial',$proceso->id_proceso],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
		{!! Form::token() !!}

		<div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Nombre del Proceso</label>
			    	<input type="text" name="nom_proceso" class="form-control" value="{{ $proceso->nom_proceso }}" required>
				</div>
			</div>

            <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
				<div class="form-group">
			    	<label for="datos">Sigla</label>
			    	<input type="text" name="sigla" class="form-control" value="{{ $proceso->sigla }}" required>
				</div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Usuario responsable</label>
			    	<select name="usuario_responsable" class="form-control select2" required>
			    		@foreach($usuario_responsable as $ur)
			    			@if($ur->id == $proceso->fk_usuario_responsable)
								<option value="{{ $ur->id }}" selected>{{ $ur->name }}</option>	
							@else
								<option value="{{ $ur->id }}" >{{ $ur->name }}</option>	
							@endif
			    		@endforeach
			    	</select>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
			    	<label for="datos">Descripción</label>
			    	<textarea class="form-control" rows="5" name="descripcion" required>{{ $proceso->descripcion }}</textarea>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12s">
				<div class="form-group">
			    	<label for="datos">Usuarios Relacionados</label>
			    	<select name="usuarios_relacionados[]" class="form-control select2" required multiple>
			    		
			    		@foreach ($proceso_gerencial as $pg)
			    			<option value="{{ $pg->id }}" >{{ $pg->name }}</option>
			    		@endforeach
			    	</select>
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