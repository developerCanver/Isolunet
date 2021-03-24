@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrizacion</a>
	  <span class="breadcrumb-item active">Agregar Datos Corporativos</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Administración de Datos Corporativos</h4>
  		<p class="mg-b-0">Datos Corporativos</p>
	</div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
	@include('partials.message_flash')
  	<h1>No perteneces a ninguna Empresa, por favor comunicarse con el Administrador.</h1> 

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