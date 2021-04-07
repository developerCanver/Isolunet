@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Evaluación de desempeño</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Plan Auditorían Interna</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Evaluación de desempeño</h4>
        <p class="mg-b-0">Editar Plan Auditorían Interna</p>
    </div>
</div><!-- d-flex -->
<script type="text/javascript">
    var i = 1;

    function nuevos() {

        i++;
        $('#dynamic_field').append(
            '<div class="card" style="padding: 10px 10px;"  id="row' + i +
            '"><h6 style="color: rgb(82, 82, 82)">Auditoría ' +
            i + '</h6><div class="row">' +
            '<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">' +
            '<div class="form-group">' +
            '<label><strong>Fecha:</strong></label>' +
            '<input type="date" name="fecha_multiple[]" required class="form-control">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">' +
            '<div class="form-group">' +
            '<label><strong>Hora de inicio:</strong></label>' +
            '<input type="text" name="hora_inicio[]" class="form-control">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">' +
            '<div class="form-group">' +
            '<label><strong>Hora de finalización:</strong></label>' +
            '<input type="text" name="hora_fin[]" class="form-control">' +
            '</div>' +
            '</div>' +
            '<div class="form-group">' +
            '<input type="button" name="remove" id="' +
            i +
            '" class="btn btn-danger btn_remove btn-sm" value="Eliminar" onclick="eliminar(this.id);"> ' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">' +
            '<div class="form-group">' +
            '<label><strong>Requisitos para Auditar:</strong></label>' +
            '<input type="text" name="requisitos[]" class="form-control">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">' +
            '<div class="form-group">' +
            '<label><strong>Equipo Auditor:</strong></label>' +
            '<input type="text" name="equipo[]" class="form-control">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">' +
            '<div class="form-group">' +
            '<label><strong>Info de personas que serán entrevistadas:</strong></label>' +
            '<input type="text" name="info_personas[]" class="form-control">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
    };


    function eliminar(clicked_id) {
        var button_id = clicked_id;
        $("#row" + button_id + "").remove();
    };

</script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>


<div class="br-pagebody">
    <div class="br-section-wrapper">

        <form action="{{ route('chequeo_auditoria.update', $chequeo->id_chequeo)}}" method="POST">
            @csrf
            @method('PUT')

            <h4>{{$empresa->razon_social}} </h4>

            <br><br>
   
      
                                
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label for="datos"><strong>Proceso a Auditar:</strong></label>
                            <select name="fk_proceso" class="form-control " required>
                                <option selected disabled value="">Seleccione Proceso...</option>
                                @foreach ($procesos as $proceso)
                                <option value="{{ $proceso->id_proceso }}" {{ $proceso->id_proceso == $chequeo->fk_proceso ? 'selected' : '' }}>{{ $proceso->nom_proceso }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Equipo Auditor:</strong></label>
                            <input type="text"  required name="equi_auditor"   value="{{$chequeo->equi_auditor}}" class="form-control">
    
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label for="datos"><strong>Fecha:</strong></label>
                            <input type="date" required name="fecha_chequeo" class="form-control" value="{{$chequeo->fecha_chequeo}}">
                        </div>
                    </div>
                </div>
    
    
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="form-group">
                            <label for="datos"><strong>Aspectos a tener en cuenta durante la auditoría interna:</strong></label>
                            <textarea name="aspectos" rows="2" cols="140" required="true">{{$chequeo->aspectos}}</textarea>
                        </div>
                    </div>
                </div>
    
    
    
                @foreach ($cheSisGestiones as $cheSisGestione)
              
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label for="datos"><strong>{{$cheSisGestione->str_nombre}}:</strong></label>
                            <input type="hidden"  name="fk_sisgestion[]" value="  {{$cheSisGestione->id_sisgestion}}" >
                          
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <select name="seleccion_chequeo[]" required class="form-control select2" >
                                <option selected disabled value="">Seleccionar...</option>
                                <option value="Si" @if($cheSisGestione->seleccion_chequeo == 'Si') selected  @endif >Si</option>
                                <option value="No" @if($cheSisGestione->seleccion_chequeo == 'No') selected  @endif >No</option>
                            </select>
                        </div>
                    </div>
                </div>
              
                @endforeach
              
                    
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                        <div class="form-group">
                            <label for="datos"><strong>Cumple:</strong></label>
                            <select name="cumple" class="form-control select2" required>
                                <option selected disabled value="">Seleccionar</option>
                                <option value="Si" @if($chequeo->cumple == 'Si') selected  @endif >Si</option>
                                <option value="No" @if($chequeo->cumple == 'No') selected  @endif >No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="form-group">
                            <label for="datos"><strong>Observaciones:</strong></label>
                            <textarea name="obervaciones_chequeo" rows="2" cols="140" required="true">{{$chequeo->obervaciones_chequeo}}</textarea>
                        </div>
                    </div>
                </div>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
    {!!Form::close()!!}
    <br>

</div>




@endsection
