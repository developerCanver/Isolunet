@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Planeación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">planificación de cambio</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Planificación de Cambio</h4>
        <p class="mg-b-0">Editar Planeación</p>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">

        <form action="{{ route('planeacio_control.update', $planeacion->id_planeacion)}}" method="POST">
            @csrf
            @method('PUT')

            <h4>{{$empresa->razon_social}} </h4>

            <div class="row">
            </div><br><br>

            <input type="hidden" name="fk_empresa" class="form-control" required value="{{$empresa->id_empresa}}">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Proceso:</strong></label>
                        <select name="proceso" class="form-control " required>
                            <option value="" selected="true" disabled="disabled"> Seleccione proceso..</option>
                            @foreach ($procesos as $proceso)
                            <option value="{{ $proceso->nom_proceso }}"
                                {{ $proceso->nom_proceso == $planeacion->proceso ? 'selected' : '' }}>
                                {{ $proceso->nom_proceso }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Material:</strong></label>
                        <input type="text" name="material" class="form-control" value="{{$planeacion->material}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Variable:</strong></label>
                        <input type="text" name="variable" class="form-control" required
                            value="{{$planeacion->variable}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Unidad:</strong></label>
                        <input type="text" name="unidad" class="form-control" required value="{{$planeacion->unidad}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>LI:</strong></label>
                        <input type="number" name="li" class="form-control" step="any" value="{{$planeacion->li}}">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>LC:</strong></label>
                        <input type="number" name="lc" class="form-control" step="any" value="{{$planeacion->lc}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>LS:</strong></label>
                        <input type="number" name="ls" class="form-control" step="any" value="{{$planeacion->ls}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Control:</strong></label>
                        <input type="text" name="control" class="form-control" required
                            value="{{$planeacion->control}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Responsable de Operación:</strong></label>
                        <input type="text" name="operacion" class="form-control" required
                            value="{{$planeacion->operacion}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Frecuencia de Medición:</strong></label>
                        <input type="text" name="frecuencia" class="form-control" required
                            value="{{$planeacion->frecuencia}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Metodo:</strong></label>
                        <input type="text" name="metodo" class="form-control" value="{{$planeacion->metodo}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Responsable de Registro:</strong></label>
                        <input type="text" name="registro" class="form-control" value="{{$planeacion->registro}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Instrumento de Medición:</strong></label>
                        <input type="text" name="instrumento" class="form-control" value="{{$planeacion->instrumento}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Registro de Seguimiento:</strong></label>
                        <input type="text" name="seguimiento" class="form-control" required
                            value="{{$planeacion->seguimiento}}">
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
            {!!Form::close()!!}
            <br>

    </div>
</div>




@endsection
