@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrizacicon</a>
	  <span class="breadcrumb-item active">Procesos</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Administración de Procesos</h4>
  		<p class="mg-b-0">Procesos</p>
	</div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
	
	<div class="row">
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
			<a href="{{ URL::to('parm_proceso_gerenciales') }}">
			<div class="br-section-wrapper">
				<h4>Procesos Gerenciales</h4>
			</div>	
			</a>
			<br>			
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
			<a href="{{ URL::to('parm_proceso_misionales') }}">
			<div class="br-section-wrapper">
				<h4>Procesos Misionales</h4>
			</div>	
			</a>
			<br>			
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
			<a href="{{ URL::to('parm_proceso_apoyo') }}">
			<div class="br-section-wrapper">
				<h4>Procesos de Apoyo</h4>
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