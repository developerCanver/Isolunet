@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <span class="breadcrumb-item active">Partes Interesadas - Calificaciones</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Partes Interesadas - Calificaciones</h4>
  		<p class="mg-b-0">Partes Interesadas</p>
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

<div class="row">
  @include('partials.message_flash')
	<div class="col-sm-6">
	  <a title="Dar Click" data-toggle="modal" data-target="#impacto">
      <div class="tx-center pd-y-15 bd">
        <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Calificaciones de IMPACTO</p>
        <h4 class="tx-lato tx-inverse tx-bold mg-b-0">Item Completo</h4>
        <span class="tx-12 tx-danger tx-roboto">100% Actualizado</span>
      </div>
      </a>
    </div>
    <div class="col-sm-6">
    <a title="Dar Click" data-toggle="modal" data-target="#influencia">
      <div class="tx-center pd-y-15 bd">
        <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Calificaciones de INFLUENCIA</p>
        <h4 class="tx-lato tx-inverse tx-bold mg-b-0">Item Completo</h4>
        <span class="tx-12 tx-danger tx-roboto">100% Actualizado</span>
      </div>
     </a>
    </div>
</div>

	</div>
</div>


@if ($validador == 1)

<div class="modal fade bs-example-modal-lg" id="impacto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">

{{  Form::open(['action' => ['partes_interesadas\PartesInteresadasController@impacto_update',$formimpacto->id_calificaciones],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}

  {!! Form::token() !!}
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"></h4>
        </div>
        <div class="modal-body">
          @include('pages.partes_interesadas.calificaciones.form.form_impacto')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-warning">Modificar</button>
        </div>
      </div>
    </div>
      {!!Form::close()!!}
  </div> 

@elseif($validador == 0) 
{{-- primer modal impacto --}}
<div class="modal fade bs-example-modal-lg" id="impacto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">


{{-- este sirve para guardar --}}
  {{  Form::open(['action' => 'partes_interesadas\PartesInteresadasController@impacto','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
  {!! Form::token() !!}
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"></h4>
        </div>
        <div class="modal-body">
          @include('pages.partes_interesadas.calificaciones.form.form_impacto')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
      {!!Form::close()!!}
  </div>

@endif



@if ($validador_influencia == 1)

{{-- primer modal influencia --}}
<div class="modal fade bs-example-modal-lg" id="influencia" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">

{{  Form::open(['action' => ['partes_interesadas\PartesInteresadasController@influencia_update',$forminfluencia->id_calificaciones],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}

{!! Form::token() !!}
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        @include('pages.partes_interesadas.calificaciones.form.form_influencia')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-warning">Modificar</button>
      </div>
    </div>
  </div>
    {!!Form::close()!!}
</div>

@elseif($validador_influencia == 0) 

{{-- primer modal influencia --}}
<div class="modal fade bs-example-modal-lg" id="influencia" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
{{  Form::open(['action' => 'partes_interesadas\PartesInteresadasController@influencia','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
{!! Form::token() !!}
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        @include('pages.partes_interesadas.calificaciones.form.form_influencia')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
    {!!Form::close()!!}
</div>

@endif
@endsection