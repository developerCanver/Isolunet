@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrizacion</a>
	  <span class="breadcrumb-item active">Agregar Producto</span>
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
		{{  Form::open(['action' => 'Parametrizacion\ProductoController@store','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
		{!! Form::token() !!}
		<br>

		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Empresa</label>
			    	<select name="fk_empresa" class="form-control select2">
			    		<option value="">Seleccionar</option>			    		
			    		<option value="{{ $empresa->id_empresa }}" selected>{{ $empresa->razon_social }}</option>			    		
			    	</select>
				</div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Nombre Producto</label>
			    	<input type="text" class="form-control" id="producto" name="producto" aria-describedby="" value="{{ old('producto') }}">
				</div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4s">
				<div class="form-group">
			    	<label for="datos">Imagen</label>
			    	<input type="file" class="form-control" id="str_imagen" name="str_imagen" aria-describedby="" value="{{ old('str_imagen') }}">
				</div>
			</div>	
		</div>

			<button type="submit" class="btn btn-primary">Guardar</button>	
			<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
  		{!!Form::close()!!}
		<br>

		<div class="br-section-wrapper">
			<div class="row">
				<h4>Listado de Productos</h4>
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
										Producto
									</th>
									<th>
										Imagen
									</th>			    		
									<th colspan="2">
										Opciones
									</th>
								</tr>			    	
							</thead>
							<tbody>
								@foreach($producto as $p)
								<tr>
									<td>									
										{{ $p->razon_social }}										
									</td>
									<td>{{ $p->str_producto }}</td>			    
									<td><img src="{{asset('img/'.$p->str_imagen)}}" alt="{{$p->str_imagen}}" height="100px" width="100px" class="img-thumbnail">  </td>
									<td colspan="2">
										<a href="{{ URL::action('Parametrizacion\ProductoController@edit',$p->id_producto) }}""><i class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
										<a href="{{ URL::action('Parametrizacion\ProductoController@destroy',$p->id_producto) }}" ><i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					{{ $producto->onEachSide(5)->links() }}
				</div>
			</div>
		</div>
  	</div>
</div>
@endsection