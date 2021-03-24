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
        <option value="">Seleccioanr</option>
      </select><br>
    </center>
  </div>
</div>
<br>

    <div class="row" style="background-color: #18A4B5; margin: 2%; color: #FFFFFF;">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
        <center>
          <h3>Acciones Correctivas</h3>
        </center>
      </div>
    </div>

    <div class="row">
      
      <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
        <div class="form-group">
          <label for="exampleInputEmail1">Causa Raiz </label>
          <select name="" class="form-control">
            <option value="" selected>Seleccionar</option>
          </select>
      </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
        <div class="form-group">
          <label for="exampleInputEmail1">Qué </label>
          <textarea name="" class="form-control" rows="4"></textarea>
      </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
        <div class="form-group">
          <label for="exampleInputEmail1">Quien </label>
          <select name="" class="form-control">
            <option value="" selected>Seleccionar</option>
          </select>
      </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
        <div class="form-group">
          <label for="exampleInputEmail1">Fecha  </label>
          <input type="date" name="" class="form-control" value="{{ date("Y-m-d") }}">
      </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-1 col-md-1 col-lg-1 col-xs-12">
      <a href="" class="btn btn-success" title="Agregar">+</a>
    </div>
    </div>


  <br>
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
      <div class="table-responsive">
        <table class="table table-striped">
          <caption>Acciones Correctivas</caption>
          <thead>
            <tr>
              <th>Causa Raiz</th>
              <th>Accion Correctiva</th>
              <th>Quien</th>
              <th>Fecha</th>
              <th>Evidencia</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                  <label for="exampleInputEmail1">Solo un archivo para todas las correcciones </label>
                  <input type="file" name="" class="form-control">
                </div>
              </td>
              <td>
                <a href="" class="btn btn-danger">B</a>
                <a href="" class="btn btn-success">C</a>
                <a href="" class="btn btn-warning">E</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>




  </div>
</div>
@endsection
@push('scripts')
@endpush 