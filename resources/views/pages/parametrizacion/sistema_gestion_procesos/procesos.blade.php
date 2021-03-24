@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrizacion</a>
	  <span class="breadcrumb-item active">Agregar Sistema de Gestion</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Administración de Sistema de Gestión</h4>
  		<p class="mg-b-0">Sistema de Gestión</p>
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
{{  Form::open(['action' => 'Parametrizacion\SistemaGestionController@store','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
{!! Form::token() !!}

		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Seleccionar Procesos</label>
			    	<select name="procesos[]" class="form-control select2" required multiple>
			    		@foreach($proceso as $e)
			    		<option value="{{ $e->id_proceso }}">{{ $e->nom_proceso }}</option>
			    		@endforeach
			    	</select>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Nombre Sistema de Gestión</label>
			    	<input type="text" name="nom_sisgestion" class="form-control" required>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Sigla</label>
			    	<input type="text" name="sigla" class="form-control" required>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Descripción</label>
			    	<textarea name="descripcion" class="form-control" rows="5" required></textarea>
				</div>
			</div>
		</div>

	
			<button type="submit" class="btn btn-primary">Guardar</button>
			
  		<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
  {!!Form::close()!!}
<br><br>

<div class="br-section-wrapper">
	<div class="row">
		<h4>Listado De Sistema de Gestión</h4>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
			<div class="table-responsive">
			  <table class="table">
			    <thead>
			    	<tr>
			    		<th>
			    			Nombre Sistema de Gestión
			    		</th>
			    		<th>
			    			Sigla
			    		</th>
			    		<th>
			    			Descripción
			    		</th>
			    		<th>
			    			Procesos
			    		</th>
			    		<th colspan="2">
			    			Opciones
			    		</th>
			    	</tr>			    	
			    </thead>
			    <tbody>
			    	@foreach($tabla_sisgestion as $h)
			    	<tr>
			    		<td>{{ $h->str_nombre }}</td>
			    		<td>{{ $h->str_sigla }}</td>
			    		<td>{{ $h->str_descripcion }}</td>
			    		<td>
			    			<a href="{{ URL::action('Parametrizacion\SistemaGestionController@edit',$h->id_sisgestion) }}""><i class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
			    		</td>
			    		<td colspan="2">
			    			<a href="{{ URL::action('Parametrizacion\SistemaGestionController@edit',$h->id_sisgestion) }}""><i class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
			    			<a href="{{ URL::action('Parametrizacion\SistemaGestionController@destroy',$h->id_sisgestion) }}" ><i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
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


@push('scripts')
<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)

$('.input-number').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});

</script>
@endpush 