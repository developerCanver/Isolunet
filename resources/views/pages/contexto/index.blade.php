@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="index.html">Bracket</a>
	  <a class="breadcrumb-item" href="">Cards &amp; Widgets</a>
	  <span class="breadcrumb-item active">Contexto</span>
	</nav>
</div>

<div class="br-pagebody pd-x-20 pd-sm-x-30"> 	
	
	<div class="row row-sm mg-t-20">
	  	
		  <div class="col-lg-6">
	    	<div class="card shadow-base card-body pd-25 bd-0" style="height: 100%;">
	      		<div class="row">
					<div class="col-sm-6">
						<h6 class="card-title tx-uppercase tx-12">Datos Empresariales</h6>
						<p class="display-4 tx-medium tx-inverse mg-b-5 tx-lato">{{ $cont }}%</p>
						<div class="progress mg-b-10">
							<div class="progress-bar bg-primary progress-bar-xs wd-{{ $cont }}p" role="progressbar" aria-valuenow="{{ $cont }}" aria-valuemin="0" aria-valuemax="100"></div>
	          			</div><!-- progress -->
	          			<p class="tx-12">Informacion básica para la empresa</p>
	          			<p class="tx-11 lh-3 mg-b-0"><a href="{{ URL::to('parm_datos_corportativo') }}" class="btn btn-success btn-xs">Diligenciar</a></p>
	        		</div><!-- col-6 -->
	        		<div class="col-sm-6 mg-t-20 mg-sm-t-0 d-flex align-items-center justify-content-center">
	        			<img src="{{ asset('image/empresa.jpg') }}" alt="" height="180" width="180" class="img-circle img-responsive" style="border-radius: 50%;">
	        		</div><!-- col-6 -->
	      		</div><!-- row -->
	    	</div><!-- card -->
	  	</div><!-- col-6 -->

	   	<div class="col-lg-6">
	    	<div class="card shadow-base card-body pd-25 bd-0" style="height: 100%;">
	      		<div class="row">
	        		<div class="col-sm-6">
	          			<h6 class="card-title tx-uppercase tx-12">Tendencias en Colombia</h6>
	          			<p class="display-4 tx-medium tx-inverse mg-b-5 tx-lato">{{ $cont1 }}%</p>
	          		<div class="progress mg-b-10">
	            	<div class="progress-bar bg-primary progress-bar-xs wd-{{ $cont1 }}p" role="progressbar" aria-valuenow="{{ $cont1 }}" aria-valuemin="0" aria-valuemax="100"></div>
	          		</div><!-- progress -->
	          			<p class="tx-12">Consolidar la información y focalizarla para definir su futuro estratégico.</p>
	          			<p class="tx-11 lh-3 mg-b-0"><a href="{{ URL::to('contexto_tendencias_en_colombia') }}" class="btn btn-success btn-xs">Diligenciar</a></p>
	        		</div><!-- col-6 -->
	        		<div class="col-sm-6 mg-t-20 mg-sm-t-0 d-flex align-items-center justify-content-center">
	        			<img src="{{ asset('image/tendencia.jpg') }}" alt="" height="180" width="180" class="img-circle img-responsive" style="border-radius: 50%;">
	        		</div><!-- col-6 -->
	      		</div><!-- row -->
	    	</div><!-- card -->
	  	</div><!-- col-6 -->
	</div>

	<div class="row row-sm mg-t-20">
	  	<div class="col-lg-6">
	    	<div class="card shadow-base card-body pd-25 bd-0" style="height: 100%;">
	      		<div class="row">
	        		<div class="col-sm-6">
						<h6 class="card-title tx-uppercase tx-12">Análisis PESTAL</h6>
						<p class="display-4 tx-medium tx-inverse mg-b-5 tx-lato">{{ $cont3 }}%</p>
	          		<div class="progress mg-b-10">
	            	<div class="progress-bar bg-primary progress-bar-xs wd-{{ $cont3 }}p" role="progressbar" aria-valuenow="{{ $cont3 }}" aria-valuemin="0" aria-valuemax="100"></div>
	          		</div><!-- progress -->
						<p class="tx-12">Los tipos de estrategias que utilizará XXX, son el análisis PESTAL, matriz DOFA</p>
						<p class="tx-11 lh-3 mg-b-0"><a href="{{ URL::to('contexto_analisis_pestal') }}" class="btn btn-success btn-xs">Diligenciar</a></p>
					</div><!-- col-6 -->
	        		<div class="col-sm-6 mg-t-20 mg-sm-t-0 d-flex align-items-center justify-content-center">
	        			<img src="{{ asset('image/pestal.jpg') }}" alt="" height="180" width="180" class="img-circle img-responsive" style="border-radius: 50%;">
	        		</div><!-- col-6 -->
	      		</div><!-- row -->
	    	</div><!-- card -->
	  	</div><!-- col-6 -->

	   	<div class="col-lg-6">
	    	<div class="card shadow-base card-body pd-25 bd-0" style="height: 100%;">
	      		<div class="row">
	        		<div class="col-sm-6">
						<h6 class="card-title tx-uppercase tx-12">Análisis DOFA</h6>
						<p class="display-4 tx-medium tx-inverse mg-b-5 tx-lato">{{ $cont4 }}%</p>
	          		<div class="progress mg-b-10">
					<div class="progress-bar bg-primary progress-bar-xs wd-{{ $cont4 }}p" role="progressbar" aria-valuenow="{{ $cont4 }}" aria-valuemin="0" aria-valuemax="100"></div>
					</div><!-- progress -->
						<p class="tx-12">identificar los riesgos y oportunidades estratégicas para el sistema de gestión de calidad</p>
						<p class="tx-11 lh-3 mg-b-0"><a href="{{ URL::to('contexto_dofa') }}" class="btn btn-success btn-xs">Diligenciar</a></p>
					</div><!-- col-6 -->
					<div class="col-sm-6 mg-t-20 mg-sm-t-0 d-flex align-items-center justify-content-center">
						<img src="{{ asset('image/dofa.jpg') }}" alt="" height="180" width="180" class="img-circle img-responsive" style="border-radius: 50%;">
	        		</div><!-- col-6 -->
	      		</div><!-- row -->
	    	</div><!-- card -->
		</div><!-- col-6 -->
	</div>

	<div class="row row-sm mg-t-20">
	  	<div class="col-lg-6">
	    	<div class="card shadow-base card-body pd-25 bd-0" style="height: 100%;">
	      		<div class="row">
	        		<div class="col-sm-6">
						<h6 class="card-title tx-uppercase tx-12">Riesgos y Oportunidades Estratégicas</h6>
						<p class="display-4 tx-medium tx-inverse mg-b-5 tx-lato">{{ $cont5 }}%</p>
	          		<div class="progress mg-b-10">
	            	<div class="progress-bar bg-primary progress-bar-xs wd-{{ $cont5 }}p" role="progressbar" aria-valuenow="{{ $cont5 }}" aria-valuemin="0" aria-valuemax="100"></div>
	          		</div><!-- progress -->
						<p class="tx-12">Se identifican los riesgos, oportunidades y estratégicas</p>
						<p class="tx-11 lh-3 mg-b-0"><a href="{{ URL::to('contexto_riesgo') }}" class="btn btn-success btn-xs">Diligenciar</a></p>
	        		</div><!-- col-6 -->
	        		<div class="col-sm-6 mg-t-20 mg-sm-t-0 d-flex align-items-center justify-content-center">
	        			<img src="{{ asset('image/riegos.jpg') }}" alt="" height="180" width="180" class="img-circle img-responsive" style="border-radius: 50%;">
	        		</div><!-- col-6 -->
	      		</div><!-- row -->
	    	</div><!-- card -->
	  	</div><!-- col-6 -->

	   	<div class="col-lg-6">
	    	<div class="card shadow-base card-body pd-25 bd-0" style="height: 100%;">
	      		<div class="row">
	        		<div class="col-sm-6">
						<h6 class="card-title tx-uppercase tx-12">Reporte general</h6>
						<p class="display-4 tx-medium tx-inverse mg-b-5 tx-lato">100%</p>
	          		<div class="progress mg-b-10">
	            	<div class="progress-bar bg-primary progress-bar-xs wd-100p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
	          		</div><!-- progress -->
						<p class="tx-12">Reporte en PDF de todos los registros</p>
						<p class="tx-11 lh-3 mg-b-0">
	          			{{-- @if ($total < 100) --}}
	          				{{-- <a href="" class="btn btn-success btn-xs" disabled="true" >Diligenciar</a> --}}
	          				<input type="button" disabled="true" class="btn btn-success btn-xs" value="Diligenciar" /> 
						{{-- 	@else --}}
							<a href="" class="btn btn-success btn-xs">Diligenciar</a>
						{{-- 	@endif --}}
	          			</p>
	        		</div><!-- col-6 -->
	        		<div class="col-sm-6 mg-t-20 mg-sm-t-0 d-flex align-items-center justify-content-center">
	        			<img src="{{ asset('image/report.png') }}" alt="" height="180" width="180" class="img-circle img-responsive" style="border-radius: 50%;">
	        		</div><!-- col-6 -->
	      		</div><!-- row -->
	    	</div><!-- card -->
	  	</div><!-- col-6 -->
	</div>
</div>
@endsection