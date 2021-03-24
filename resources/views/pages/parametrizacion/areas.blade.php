@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrizacion</a>
	  <span class="breadcrumb-item active">Agregar Areas</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Administración de Areas</h4>
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
{{  Form::open(['action' => 'Parametrizacion\AreasCargoController@store_areas','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
{!! Form::token() !!}


		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Empresa</label>
			    	<select name="empresa" class="form-control select2" required>			    				    		
			    		<option value="{{ $empresa->id_empresa }}" selected>{{ $empresa->razon_social }}</option>				 			    
			    	</select>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Nombre Area</label>
			    	<input type="text" name="nom_area" class="form-control" required>
				</div>
			</div>
		</div>

	
			<button type="submit" class="btn btn-primary">Guardar</button>
			
  		<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
  {!!Form::close()!!}
<br><br>

<div class="br-section-wrapper">
	<div class="row">
		<h4>Listado De Areas</h4>
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
			    			Nombre Area
			    		</th>
			    		<th>
			    			Logo Empresa
			    		</th>
			    		<th colspan="2">
			    			Opciones
			    		</th>
			    	</tr>			    	
			    </thead>
			    <tbody>
			    	@foreach($tabla_areas as $h)
			    	<tr>
			    		<td>{{ $h->razon_social }}</td>
			    		<td>{{ $h->nom_area }}</td>
			    		<td><img src="{{asset('imgs/logo_empresa/'.$h ->image)}}" alt="{{$h ->image}}" height="100px" width="100px" class="img-thumbnail">  </td>
			    		<td colspan="2">
			    			<a href="{{ URL::action('Parametrizacion\AreasCargoController@edit_areas',$h->id_area) }}"><i class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
			    			<a href="{{ URL::action('Parametrizacion\AreasCargoController@destroy',$h->id_area) }}" ><i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
			    		</td>
			    	</tr>
			    	@endforeach
			    </tbody>
			  </table>
			</div>
			{{ $tabla_areas->onEachSide(5)->links() }}
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