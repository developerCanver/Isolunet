@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrización</a>
	  <span class="breadcrumb-item active">Editar Sistema de Gestión</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Editar Sistema de Gestón</h4>
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
{{  Form::open(['action' => ['Parametrizacion\SistemaGestionController@update',$registro->id_sisgestion],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
{!! Form::token() !!}


		<div class="row">


			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Nombre Sistema de Gestión</label>
			    	<input type="text" name="nom_sisgestion" class="form-control" value="{{ $registro->str_nombre }}" required>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<div class="form-group">
			    	<label for="datos">Sigla</label>
			    	<input type="text" name="sigla" class="form-control" required value="{{ $registro->str_sigla }}">
				</div>
			</div>
		</div>

		<div class="row">
			

			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
			    	<label for="datos">Descripción</label>
			    	<textarea name="descripcion" class="form-control" rows="5" required>{{ $registro->str_descripcion }}</textarea>
				</div>
			</div>
		</div>

	
			<button type="submit" class="btn btn-warning">Editar</button>			
  		<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
  {!!Form::close()!!}
<br><br>



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