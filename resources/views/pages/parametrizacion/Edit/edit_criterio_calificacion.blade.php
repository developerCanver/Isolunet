@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="#">Parametrizacion</a>
        <span class="breadcrumb-item active">Editar criterios de calificación</span>
    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Criterios de Calificación</h4>
        <p class="mg-b-0">Editar Criterio</p>
    </div>
</div><!-- d-flex -->

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
        {{  Form::open(['action' => ['Parametrizacion\CriteroCalificacionController@update',$criticidad->id_cri_calificacion ],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}
        <input type="hidden"  name="id_cal_proveedor"
        value="{{$criticidad->id_cal_proveedor}}" >

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label for="datos">Calificación Total</label>
                    <input type="text" class="form-control" id="nom_proveedor" name="nom_proveedor" aria-describedby=""
                        value="{{$criticidad->nom_proveedor}}" disabled>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label for="datos">Calificación Total</label>
                    <input type="text" class="form-control" id="nom_insumo" name="nom_insumo" aria-describedby=""
                        value="{{$criticidad->nom_insumo}}" disabled>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">Fecha a Evaluar</label>
                    <input type="date" class="form-control" name="fecha_calificacion" id="fecha_calificacion" value="{{$criticidad->fecha_calificacion}}" required>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">Promedio Reevaluación / Si = 5, No = 1</label>
                    <select name="pro_reevaluacion" id="pro_reevaluacion" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="5" @if($criticidad->pro_reevaluacion == '5') selected  @endif >Si</option>
                        <option value="1" @if($criticidad->pro_reevaluacion == '1') selected  @endif >No</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Editar</button>

        <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        {!!Form::close()!!}
        <br><br>

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
