@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrizacion</a>
	  <span class="breadcrumb-item active">Agregar Empresa</span>
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
{{  Form::open(['action' => 'Parametrizacion\EmpresaController@store','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
{!! Form::token() !!}

		<br>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Razón Social</label>
			    	<input type="text" class="form-control" id="razon_social" name="razon_social" aria-describedby="" value="{{ old('razon_social') }}" style="color: #D20000;">
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">NIT</label>
			    	<input type="text" class="form-control input-number" id="nit" name="nit" aria-describedby="" value="{{ old('nit') }}">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Representante</label>
			    	<input type="text" class="form-control" id="representante" name="representante" aria-describedby="" value="{{ old('representante') }}">
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Dirección</label>
			    	<input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="" value="{{ old('direccion') }}">
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Celular</label>
			    	<input type="text" class="form-control input-number" id="celular" name="celular" aria-describedby="" value="{{ old('celular') }}">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Logo de la Empresa</label>
			    	<input type="file" class="form-control" id="image" name="image" aria-describedby="" value="{{ old('image') }}">
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Usuario Administrador</label>
			    	<select name="fk_usuario" class="form-control select2">
			    		<option value="">Seleccionar...</option>
			    		@foreach ($usuarios as $element)
			    			<option value="{{ $element->id }}">{{ $element->name }}</option>
			    		@endforeach
			    	</select>
				</div>
			</div>
		</div>
  		
		
 
  		<button type="submit" class="btn btn-primary">Guardar</button>	
  		<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
  {!!Form::close()!!}
<br>


<div class="br-section-wrapper">
	<div class="row">
		<h4>Listado De Empresas</h4>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
			<div class="table-responsive">
			  <table class="table">
			    <thead>
			    	<tr>
			    		<th>
			    			Razón Social
			    		</th>
			    		<th>
			    			NIT
			    		</th>
			    		<th>
			    			Dirección
			    		</th>
			    		<th>
			    			Logo
			    		</th>
			    		<th colspan="2">
			    			Opciones
			    		</th>
			    	</tr>			    	
			    </thead>
			    <tbody>
			    	@foreach($empresa as $h)
			    	<tr>
			    		<td>{{ $h->razon_social }}</td>
			    		<td>{{ $h->nit }}</td>			    
			    		<td>{{ $h->direccion }}</td>
			    		<td><img src="{{asset('imgs/logo_empresa/'.$h->image)}}" alt="{{$h->image}}" height="100px" width="100px" class="img-thumbnail">  </td>
			    		<td colspan="2">
			    			<a href="{{ URL::action('Parametrizacion\EmpresaController@edit',$h->id_empresa) }}""><i class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
			    			<a href="{{ URL::action('Parametrizacion\EmpresaController@destroy',$h->id_empresa) }}" ><i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
			    		</td>
			    	</tr>
			    	@endforeach
			    </tbody>
			  </table>
			</div>
			{{ $empresa->onEachSide(5)->links() }}
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