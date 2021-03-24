@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="index.html">Bracket</a>
	  <a class="breadcrumb-item" href="">Cards &amp; Widgets</a>
	  <span class="breadcrumb-item active">Dashboard</span>
	</nav>
</div>

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Analisis de Anomalia </h4>
  		<p class="mg-b-0">Problema o Mejora</p>
	</div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">

<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
		<center>
			<label for="">Seleccionar Anomalia </label>
      <select name="" class="form-control">
        <option value="" selected>Seleccioanr</option>
        @foreach ($anomalias as $element)
          <option value="{{ $element->id_anomalia }}">{{ $element->id_anomalia }} - {{ $element->str_anomalia }}</option>
        @endforeach
      </select><br>
      <label for="">Causa Raíz </label>
			<textarea name="" class="form-control" rows="2" readonly id="resultado"></textarea>
		</center>
	</div>
</div>
<br>

 	<div class="row">
  		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
  			<div class="form-group">
			    <label for="exampleInputEmail1">6M </label>
			</div>
  		</div>
  		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
  			<div class="form-group">
			    <label for="exampleInputEmail1">Porque? </label>
			</div>
  		</div>
  		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
  			<div class="form-group">
			    <label for="exampleInputEmail1">Porque? </label>
			</div>
  		</div>
  		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
  			<div class="form-group">
			    <label for="exampleInputEmail1">Porque? </label>
			</div>
  		</div>
  		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
  			<div class="form-group">
			    <label for="exampleInputEmail1">Porque? </label>
			</div>
  		</div>
  		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
  			<div class="form-group">
			    <label for="exampleInputEmail1">Porque? </label>
			</div>
  		</div>
  	</div>

  	  	<div class="row">
  		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
  			<div class="form-group">
			    <textarea name="" class="form-control" rows="3" id="6m" value="{{ old(6m, $causa->str_6m) }}"></textarea>
			</div>
  		</div>
  		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
  			<div class="form-group">
			    <textarea name="" class="form-control" rows="3" id="porque1"></textarea>
			</div>
  		</div>
  		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
  			<div class="form-group">
			    <textarea name="" class="form-control" rows="3" id="porque2"></textarea>
			</div>
  		</div>
  		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
  			<div class="form-group">
			    <textarea name="" class="form-control" rows="3" id="porque3"></textarea>
			</div>
  		</div>
  		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
  			<div class="form-group">
			    <textarea name="" class="form-control" rows="3" id="porque4"></textarea>
			</div>
  		</div>
  		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
  			<div class="form-group">
			    <textarea name="" class="form-control" rows="3" id="porque5"></textarea>
			</div>
  		</div>
  	</div>
  	<div class="row">
  		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
  			<a href="" class="btn btn-success">+</a>
  		</div>
  	</div>

</div>
</div>
@endsection
@push('scripts')
<script>

  $(document).ready(function () {
        $("#6m").keyup(function () {
           var primercampo = $('#6m').val(); 
          $('#resultado').val(primercampo);
        });

    var 6m          = $('#6m').val(); 
    var proque1     = $('#porque1').val(); 
    var proque2     = $('#porque2').val(); 
    var proque3     = $('#porque3').val(); 
    var proque4     = $('#porque4').val(); 
    var proque5     = $('#porque5').val(); 

    if ($("#porque5").val() != "") {
       
    }
  });
  
</script>
@endpush 