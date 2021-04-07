@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Evaluación de desempeño</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Fortalezas y Oportunidades</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Evaluación de desempeño</h4>
        <p class="mg-b-0">Editar Fortalezas y Oportunidades</p>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">

        <form action="{{ route('fortalezas_opurtunidades.update', $chequeo->id_foropur)}}" method="POST">
            @csrf
            @method('PUT')

            <h4>{{$empresa->razon_social}} </h4>

            <br><br>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Proceso a Auditar:</strong></label>
                        <select name="fk_proceso" class="form-control select2" required>
                            <option selected disabled value="">Seleccione Proceso...</option>
                            @foreach ($procesos as $proceso)
                            <option value="{{ $proceso->id_proceso }}"
                                {{ $proceso->id_proceso == $chequeo->fk_proceso ? 'selected' : '' }}>
                                {{ $proceso->nom_proceso }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                    <div class="form-group">
                        <label><strong>Responsable:</strong></label>
                        <select name="fk_usuario" class="form-control select2" required>
                            <option selected disabled value="">Seleccione Usuario...</option>
                            @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}"
                                {{ $usuario->id ==  $chequeo->fk_usuario ? 'selected' : ''}}>
                                {{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label for="datos"><strong>Fecha:</strong></label>
                        <input type="date" required name="fecha_foropur" class="form-control"
                            value="{{$chequeo->fecha_foropur}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Auditor Líder:</strong></label>
                        <input type="text" required name="lider" class="form-control" value="{{$chequeo->lider}}">
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                    <div class="form-group">
                        <label><strong>Equipo Auditor:</strong></label>
                        <input type="text" required name="equipo" class="form-control" value="{{$chequeo->equipo}}">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label for="datos"><strong>Tipo informe:</strong></label>
                        <select name="tipo_informe" required class="form-control select2">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="FORTALEZAS" @if($chequeo->tipo_informe == 'FORTALEZAS') selected @endif
                                >FORTALEZAS</option>
                            <option value="OPORTUNIDADES" @if($chequeo->tipo_informe == 'OPORTUNIDADES') selected @endif
                                >OPORTUNIDADES</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label for="datos"><strong>Descripción:</strong></label>
                        <textarea name="descripcion_foropur" rows="2" cols="140"
                            required="true">{{$chequeo->descripcion_foropur}}</textarea>
                    </div>
                </div>
            </div>
            @foreach ($cheSisGestiones as $cheSisGestione)

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>{{$cheSisGestione->str_nombre}}:</strong></label>
                        <input type="hidden" name="fk_sisgestion[]" value="  {{$cheSisGestione->id_sisgestion}}">

                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <select name="seleccion_foropur[]" required class="form-control ">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="Si" @if($cheSisGestione->seleccion_foropur == 'Si') selected @endif >Si
                            </option>
                            <option value="No" @if($cheSisGestione->seleccion_foropur == 'No') selected @endif >No
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            @endforeach


    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
    {!!Form::close()!!}
    <br>

</div>




@endsection
