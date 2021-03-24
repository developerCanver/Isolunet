@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="index.html">Bracket</a>
	  <a class="breadcrumb-item" href="">Cards &amp; Widgets</a>
	  <span class="breadcrumb-item active">Dashboard</span>
	</nav>
</div>

<div style="margin: 5% !important;">
<div class="row row-sm mg-t-20">
  <div class="col-lg-6">
    <div class="card shadow-base card-body pd-25 bd-0" style="height: 100%;">
      <div class="row">
        <div class="col-sm-6">
          <h6 class="card-title tx-uppercase tx-12">1. Registro de Anomalia</h6>
          <p class="display-4 tx-medium tx-inverse mg-b-5 tx-lato">0%</p>
          <div class="progress mg-b-10">
            <div class="progress-bar bg-primary progress-bar-xs wd-0p" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
          </div><!-- progress -->
          <p class="tx-12">Registro de anomalia</p>
          <p class="tx-11 lh-3 mg-b-0"><a href="{{ URL::to('anomalia_index') }}" class="btn btn-info btn-xs">Diligenciar</a></p>
        </div><!-- col-6 -->
        <div class="col-sm-6 mg-t-20 mg-sm-t-0 d-flex align-items-center justify-content-center">
        	<img src="{{ asset('image/undraw_folder_files_nweq.svg') }}" alt="" height="180" width="180" class=" img-responsive" >
        </div><!-- col-6 -->
      </div><!-- row -->
    </div><!-- card -->
  </div><!-- col-6 -->

  <div class="col-lg-6">
    <div class="card shadow-base card-body pd-25 bd-0" style="height: 100%;">
      <div class="row">
        <div class="col-sm-6">
          <h6 class="card-title tx-uppercase tx-12">2. Causa Raiz</h6>
          <p class="display-4 tx-medium tx-inverse mg-b-5 tx-lato">0%</p>
          <div class="progress mg-b-10">
            <div class="progress-bar bg-primary progress-bar-xs wd-0p" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
          </div><!-- progress -->
          <p class="tx-12">Registro de anomalia</p>
          <p class="tx-11 lh-3 mg-b-0"><a href="{{ URL::to('causa_raiz') }}" class="btn btn-info btn-xs">Diligenciar</a></p>
        </div><!-- col-6 -->
        <div class="col-sm-6 mg-t-20 mg-sm-t-0 d-flex align-items-center justify-content-center">
          <img src="{{ asset('image/undraw_progress_indicator_p84k.svg') }}" alt="" height="180" width="180" class=" img-responsive" >
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
          <h6 class="card-title tx-uppercase tx-12">3. Acciones Correctivas</h6>
          <p class="display-4 tx-medium tx-inverse mg-b-5 tx-lato">0%</p>
          <div class="progress mg-b-10">
            <div class="progress-bar bg-primary progress-bar-xs wd-0p" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
          </div><!-- progress -->
          <p class="tx-12">Registro de anomalia</p>
          <p class="tx-11 lh-3 mg-b-0"><a href="{{ URL::to('acciones_correctivas') }}" class="btn btn-info btn-xs">Diligenciar</a></p>
        </div><!-- col-6 -->
        <div class="col-sm-6 mg-t-20 mg-sm-t-0 d-flex align-items-center justify-content-center">
          <img src="{{ asset('image/undraw_check_boxes_m3d0.svg') }}" alt="" height="180" width="180" class=" img-responsive" >
        </div><!-- col-6 -->
      </div><!-- row -->
    </div><!-- card -->
  </div><!-- col-6 -->

  <div class="col-lg-6">
    <div class="card shadow-base card-body pd-25 bd-0" style="height: 100%;">
      <div class="row">
        <div class="col-sm-6">
          <h6 class="card-title tx-uppercase tx-12">Listado de Anomalias</h6>
          <p class="display-4 tx-medium tx-inverse mg-b-5 tx-lato">100%</p>
          <div class="progress mg-b-10">
            <div class="progress-bar bg-primary progress-bar-xs wd-100p" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
          </div><!-- progress -->
          <p class="tx-12">Registro de anomalia</p>
          <p class="tx-11 lh-3 mg-b-0"><a href="{{ URL::to('anomalia_index') }}" class="btn btn-success btn-xs">Generar</a></p>
        </div><!-- col-6 -->
        <div class="col-sm-6 mg-t-20 mg-sm-t-0 d-flex align-items-center justify-content-center">
          <img src="{{ asset('image/undraw_contract_uy56.svg') }}" alt="" height="180" width="180" class=" img-responsive" >
        </div><!-- col-6 -->
      </div><!-- row -->
    </div><!-- card -->
  </div><!-- col-6 -->
</div>

  

</div>


@endsection
@push('scripts')
@endpush 