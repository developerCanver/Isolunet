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
		<form action="{{route('plantillas.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <center>
                    <label for="">Seleccione Anomalia </label>
                    <select name="" class="form-control">
                        <option value="" selected>Seleccioanr</option>
                        @foreach ($anomalias as $element)
                        <option value="{{ $element->id_anomalia }}">{{ $element->id_anomalia }} -
                            {{ $element->str_anomalia }}</option>
                        @endforeach
                    </select>
                </center>
            </div>
        </div>
        <br>

		@livewire('mejora.raiz')

    </div>
</div>
@endsection


