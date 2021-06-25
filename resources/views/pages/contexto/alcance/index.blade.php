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
	  @livewire('contexto.alcance')
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

