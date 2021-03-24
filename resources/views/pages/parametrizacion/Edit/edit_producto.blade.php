@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrización</a>
	  <span class="breadcrumb-item active">Editar Producto</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Administración de Productos</h4>
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
		{{  Form::open(['action' => ['Parametrizacion\ProductoController@update',$producto->id_producto],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
		{!! Form::token() !!}
		<br>
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Nombre Producto</label>
			    	<input type="text" class="form-control" id="producto" name="producto" aria-describedby="" value="{{ $producto->str_producto }}">
				</div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4s">
				<div class="form-group">
			    	<label for="datos">Imagen</label>
			    	<input type="file" class="form-control" id="str_imagen" name="str_imagen" aria-describedby="" value="{{ old('str_imagen') }}">
			    	<img src="{{asset('img/'.$producto->str_imagen)}}" alt="{{$producto->str_imagen}}" height="200px" width="200px" class="img-thumbnail">
				</div>
			</div>			
		</div> 
  		<button type="submit" class="btn btn-warning">Editar</button>	
  		<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
		{!!Form::close()!!}
		<br>
	</div>
</div>
@endsection