@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrizacion</a>
	  <span class="breadcrumb-item active">Agregar documentos</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Administración de Documentos</h4>
  		<p class="mg-b-0">Documentos</p>
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
		{{  Form::open(['action' => 'Parametrizacion\DocumentosController@store_documento','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
		{!! Form::token() !!}

		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Nombre de Documento</label>
			    	<input type="text" id ="nom_documento "name="nom_documento" class="form-control" required>
				</div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Sigla</label>
			    	<input type="text" name="sigla_documento" class="form-control" required>
				</div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
					<label for="datos">Empresa</label>
			    	<input type="text" name="cod_empresa" class="form-control" required value="{{ $empresa->id_empresa }}" readonly style="display: none;">
			    	<input type="text" name="" class="form-control" required value="{{ $empresa->razon_social }}" readonly >
				</div>
			</div>
		</div>
	
			<button type="submit" class="btn btn-primary">Guardar</button>
			
  		<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
  		{!!Form::close()!!}
		<br><br>

		<div class="br-section-wrapper">
			<div class="row">
				<h4>Listado De Tipo de Documentos</h4>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
					<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>
									Nombre Documento
								</th>
								<th>
									Sigla
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
							@foreach($documento as $d)
								<tr>
									<td>{{ $d->nombre_documento }}</td>
									<td>{{ $d->sigla_documento }}</td>
									<td>{{ $d->razon_social }}</td>
									<td colspan="2">
										<a href="{{ URL::action('Parametrizacion\DocumentosController@edit_documento',$d->id_documento) }}""><i class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
										<a href="{{ URL::action('Parametrizacion\DocumentosController@destroy_documento',$d->id_documento) }}" ><i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
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