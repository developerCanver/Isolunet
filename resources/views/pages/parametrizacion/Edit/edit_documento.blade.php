@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrizacion</a>
	  <span class="breadcrumb-item active">Editar Documentos</span>
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
		{{  Form::open(['action' => ['Parametrizacion\DocumentosController@update_documento',$documento->id_documento],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
		{!! Form::token() !!}


		<div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Nombre de Documento</label>
			    	<input type="text" name="nombre_documento" class="form-control" value="{{ $documento->nombre_documento }}" required>
				</div>
			</div>

            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Sigla</label>
			    	<input type="text" name="sigla" class="form-control" value="{{ $documento->sigla_documento }}" required>
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