@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="">Alcance</a>
	  <span class="breadcrumb-item active">Dashboard</span>
	</nav>
</div>


<div class="br-pagebody"> 	
	<div class="card">
	  <div class="card-header">
	    <center>Alcance</center>
	  </div>
	  <div class="card-body">
	  	<div class="row">
	  		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
	  			<div class="row">
	  				<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12" id="card-font">
	  					<div class="card">
						  <h5 class="card-header" style="background: #1F0182; color: #FFFFFF;">Proceso y Limites</h5>
						  <div class="card-body">
						    	<ul>
			  						<li>Proceso y Limites</li>
			  						<li>Proceso y Limites</li>
			  						<li>Proceso y Limites</li>
			  						<li>Proceso y Limites</li>
			  						<li>Proceso y Limites</li>
			  					</ul>
						  </div>
						</div>
	  				</div>
	  				<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
	  				</div>
	  				<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12" id="card-font">
	  					<div class="card">
						  <h5 class="card-header" style="background: #1F0182; color: #FFFFFF;">Producto</h5>
						  <div class="card-body">
						    	<ul>
			  						<li>Azucar</li>
			  						<li>Cal</li>
			  						<li>Sulfato</li>
			  						<li>producto</li>
			  					</ul>
						  </div>
						</div>	
	  				</div>
	  			</div>
	  			<div class="row">
	  				<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
	  					<div class="row">
	  						
	  						<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
	  							<img src="{{ asset('img/imagen1.svg') }}" alt="" width="300" height="300">
	  						</div>
	  						<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
	  							<h5>Alcance del SGC</h5>
	  							<select name="" id="" class="form-control">
	  								<option value="">Seleccionar</option>
	  							</select>
	  							<br>
	  							<textarea name="" id="" rows="3" class="form-control"></textarea>
	  							<br>
	  							<textarea name="" id="" rows="3" class="form-control"></textarea>
	  						</div>
	  						<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
	  							<img src="{{ asset('img/imagen2.svg') }}" alt="" width="300" height="300">
	  						</div>
	  					</div>
	  				</div>
	  			</div>
	  			<div class="row">
	  				<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12" id="card-font">

	  					<div class="card">
						  <h5 class="card-header" style="background: #1F0182; color: #FFFFFF;">Entorno</h5>
						  <div class="card-body">
						    	<ul>
			  						<li>Gestion</li>
			  						<li>Gestion</li>
			  						<li>Gestion</li>
			  						<li>Gestion</li>
			  						<li>Gestion</li>
			  					</ul>
						  </div>
						</div>	  					
	  				</div>
	  				<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
	  				</div>
	  				<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12" id="card-font">
	  					<div class="card">
						  <h5 class="card-header" style="background: #1F0182; color: #FFFFFF;">Partes Interesadas</h5>
						  <div class="card-body">
						    	<ul>
			  						<li>Partes Interesadas</li>
			  						<li>Partes Interesadas</li>
			  						<li>Partes Interesadas</li>
			  						<li>Partes Interesadas</li>
			  						<li>Partes Interesadas</li>
			  					</ul>
						  </div>
						</div>	  	
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  </div>
	</div>
</div>
@endsection
@push('scripts')
@endpush 
@push('css')
<style>
	#card-font{
		-webkit-box-shadow: 20px 17px 15px -8px rgba(128,128,128,1);
		-moz-box-shadow: 20px 17px 15px -8px rgba(128,128,128,1);
		box-shadow: 20px 17px 15px -8px rgba(128,128,128,1);
		padding-right: 0px;
	}
</style>
@endpush 

