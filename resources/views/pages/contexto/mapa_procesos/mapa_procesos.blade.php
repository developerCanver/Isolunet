@extends('layouts.dashboard')

@section('content')
<style>
    .cont {
        height: 110px;
        width: 100%;
		padding: 5px;
        background: #0866c6;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;

        box-shadow: 0px 3px 9px 3px #9d9b9b;
        -moz-box-shadow: 0px 3px 9px 3px #9d9b9b;
        -webkit-box-shadow: 0px 3px 9px 3px #9d9b9b;
    }

</style>
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="">Contexto</a>
        <span class="breadcrumb-item active">Mapa de Procesos</span>
    </nav>
</div>
<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Mapa de Procesos</h4>
        <p class="mg-b-0">Proceso</p>
    </div>
</div>

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
        @include('partials.message_flash')

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" align="center">
                <h3><b style="color: #91D04D;">MAPA DE PROCESOS</b></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" align="center">
                <h4>Procesos de Direccion</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12" align="left">
                <div style="height: 150px;"></div>
                <h3>Entrada</h3>
                <img src="{{ asset('img/procesos.png') }}" alt="" width="100" height="100">
                <h6>clientes y partes interesadas</h6>
                <h5>(Requisitos)</h5>
            </div>

            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12" align="center">
                <div class="row">
                    @foreach ($pro_direcciones as $pro_direccion)
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12" align="center" style="margin-top: 10px;">
                        <div class="cont">
                            {{$pro_direccion->nom_proceso}}
                        </div>
                    </div>
                    @endforeach
                </div>
				<br>
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" align="center">
                        <h3>CADENA DE TRANSFORMACION (CADENA DE VALOR)</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach ($proceso_misional as $proceso_mision)
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12" style="margin-top: 10px;">
                        <div class="cont">
                            {{$proceso_mision->nom_proceso}}
                        </div>
                    </div>
                    @endforeach
                </div>
				<br>
				<hr>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" align="center">
                        <h3><b style="color: #91D04D;">PROCESOS DE APOYO</b></h3>
                    </div>
                </div>
                <div class="row">
                    @foreach ($proceso_apoyo as $proceso_apo)
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12" align-self-end style="margin-top: 10px;">
                        <div class="cont">
                            {{$proceso_apo->nom_proceso}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12" align="right">
                <div style="height: 150px;"></div>
                <h3>Salida</h3>
                <img src="{{ asset('img/procesos.png') }}" alt="" width="100" height="100">
                <h6>clientes y partes interesadas</h6>
                <h5>(Satisfacción)</h5>
            </div>
        </div>


    </div>
</div>


@endsection


@push('scripts')

<script type="text/javascript">
    // In your Javascript (external .js resource or <script> tag)


    $('.input-number').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

</script>
@endpush
