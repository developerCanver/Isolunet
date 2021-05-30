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

        <form action="{{ route('auditoria.update', $auditoria->id_auditoria)}}" method="POST">
            @csrf
            @method('PUT')

            <h4>{{$auditoria->razon_social}} </h4>

            <br><br>
   
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Dirección del sitio:</strong></label>
                        <input type="text" required name="direcion" required class="form-control" value="{{ $auditoria->direcion}}">


                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Representante de la organización:</strong></label>
                        <input type="text" name="representante" class="form-control"  value="{{ $auditoria->representante}}">

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Cargo:</strong></label>
                        <select name="fk_cargo" class="form-control select2" required>

                            @foreach ($cargos as $cargo)
                            <option value="{{ $cargo->id_cargo }}"  {{ $cargo->id_cargo == $auditoria->id_cargo ? 'selected' : '' }}>
                                {{ $cargo->nom_cargo }}</option>
                            @endforeach
                        </select>

                    


                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Correo:</strong></label>
                        <input type="text" name="correo" class="form-control" value="{{$auditoria->correo}}">

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Alcance:</strong></label>
                        <textarea name="alcance" required class="form-control" required="true">{{$auditoria->alcance}}</textarea>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Criterios de Auditoría:</strong></label>
                        <textarea name="criterios" class="form-control" required="true">{{$auditoria->criterios}}</textarea>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">

                        <label><strong>Tipo de auditoría:</strong></label>
                        <input type="text" name="tipo_auditoria" class="form-control" required value="{{$auditoria->tipo_auditoria}}">


                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Aplica toma de muestra por multisitio:</strong></label>
                        <select name="multisitio" class="form-control select2" required>
                            <option selected disabled value="">Seleccionar</option>
                            <option value="Si" @if($auditoria->multisitio == 'Si') selected  @endif >Si</option>
                            <option value="No" @if($auditoria->multisitio == 'No') selected  @endif >No</option>
                        </select>


                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Existen actividades/procesos de turno nocturno:</strong></label>
                        <select name="nocturno" class="form-control select2" required>
                            <option selected disabled value="">Seleccionar</option>
                            <option value="Si" @if($auditoria->nocturno == 'Si') selected  @endif >Si</option>
                            <option value="No" @if($auditoria->nocturno == 'No') selected  @endif >No</option>
                        </select>

                        
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label for="datos"><strong>Descripción de Auditoría:</strong></label>
                        <textarea name="descripcion" class="form-control" required="true">{{$auditoria->descripcion}}</textarea>
                    </div>
                </div>
            </div>
            <script>
                function mostrar_ocultar() {
                    var caja = document.getElementById("car2");
                    if (caja.style.display == "none") {
                        document.getElementById("car2").style.display = "flex";
                        document.getElementById("boton").value = "-";
                        document.getElementById("boton").style.backgroundColor = "red";

                    } else {
                        document.getElementById("car2").style.display = "none";
                        document.getElementById("boton").value = "+";
                        document.getElementById("boton").style.backgroundColor = "#17a2b8";
                    }
                }

                function mostrar_ocultar2() {
                    var caja = document.getElementById("car3");
                    if (caja.style.display == "none") {
                        document.getElementById("car3").style.display = "flex";
                        document.getElementById("boton2").value = "-";
                        document.getElementById("boton2").style.backgroundColor = "red";

                    } else {
                        document.getElementById("car3").style.display = "none";
                        document.getElementById("boton2").value = "+";
                        document.getElementById("boton2").style.backgroundColor = "#17a2b8";
                    }
                }

                function mostrar_ocultar3() {
                    var caja = document.getElementById("car4");
                    if (caja.style.display == "none") {
                        document.getElementById("car4").style.display = "flex";
                        document.getElementById("boton3").value = "-";
                        document.getElementById("boton3").style.backgroundColor = "red";

                    } else {
                        document.getElementById("car4").style.display = "none";
                        document.getElementById("boton3").value = "+";
                        document.getElementById("boton3").style.backgroundColor = "#17a2b8";
                    }
                }

                function mostrar_ocultar4() {
                    var caja = document.getElementById("car5");
                    if (caja.style.display == "none") {
                        document.getElementById("car5").style.display = "flex";
                        document.getElementById("boton4").value = "-";
                        document.getElementById("boton4").style.backgroundColor = "red";

                    } else {
                        document.getElementById("car5").style.display = "none";
                        document.getElementById("boton4").value = "+";
                        document.getElementById("boton4").style.backgroundColor = "#17a2b8";
                    }
                }

                function mostrar_ocultar5() {
                    var caja = document.getElementById("car6");
                    if (caja.style.display == "none") {
                        document.getElementById("car6").style.display = "flex";
                        document.getElementById("boton5").value = "-";
                        document.getElementById("boton5").style.backgroundColor = "red";

                    } else {
                        document.getElementById("car6").style.display = "none";
                        document.getElementById("boton5").value = "+";
                        document.getElementById("boton5").style.backgroundColor = "#17a2b8";
                    }
                }

            </script>
            <p class="mg-b-0">Auditor 1</p>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Auditor Líder 9001, 14001 y Basc</strong></label>
                        <input type="text" name="auditor_1" class="form-control" value="{{$auditoria->auditor_1}}">
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                    <div class="form-group">
                        <label><strong>Correo:</strong></label>
                        <input type="text" name="cooreo_aud_1" class="form-control" value="{{$auditoria->cooreo_aud_1}}">
                    </div>
                </div>
                <div class="form-group">
                    <input type="button" id="boton" value="+" class="btn btn-info btn-sm" onclick="mostrar_ocultar()" />
                </div>
            </div>
            <div class="card" style="padding: 10px 10px; display: none" id="car2">
                <p class="mg-b-0">Auditor 2</p>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label for="datos"><strong>Auditor Líder 9001, 14001 y Basc</strong></label>
                            <input type="text" name="auditor_2" class="form-control" value="{{$auditoria->auditor_2}}">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Correo:</strong></label>
                            <input type="text" name="cooreo_aud_2" class="form-control" value="{{$auditoria->cooreo_aud_2}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="button" id="boton2" value="+" class="btn btn-info btn-sm"
                            onclick="mostrar_ocultar2()" />
                    </div>
                </div>
            </div>

            <div class="card" style="padding: 10px 10px; display: none" id="car3">
                <p class="mg-b-0">Auditor 3</p>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label for="datos"><strong>Auditor Líder 9001, 14001 y Basc</strong></label>
                            <input type="text" name="auditor_3" class="form-control"  value="{{$auditoria->auditor_3}}">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Correo:</strong></label>
                            <input type="text" name="cooreo_aud_3" class="form-control" value="{{$auditoria->cooreo_aud_3}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="button" id="boton3" value="+" class="btn btn-info btn-sm"
                            onclick="mostrar_ocultar3()" />
                    </div>
                </div>
            </div>
            <div class="card" style="padding: 10px 10px; display: none" id="car4">
                <p class="mg-b-0">Auditor 4</p>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label for="datos"><strong>Auditor Líder 9001, 14001 y Basc</strong></label>
                            <input type="text" name="auditor_4" class="form-control"  value="{{$auditoria->auditor_4}}">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Correo:</strong></label>
                            <input type="text" name="cooreo_aud_4" class="form-control" value="{{$auditoria->cooreo_aud_4}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="button" id="boton4" value="+" class="btn btn-info btn-sm"
                            onclick="mostrar_ocultar4()" />
                    </div>
                </div>
            </div>

            <div class="card" style="padding: 10px 10px; display: none" id="car5">
                <p class="mg-b-0">Auditor 5</p>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label for="datos"><strong>Auditor Líder 9001, 14001 y Basc</strong></label>
                            <input type="text" name="auditor_5" class="form-control"  value="{{$auditoria->auditor_5}}">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Correo:</strong></label>
                            <input type="text" name="cooreo_aud_5" class="form-control" value="{{$auditoria->cooreo_aud_5}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="button" id="boton5" value="+" class="btn btn-info btn-sm"
                            onclick="mostrar_ocultar5()" />
                    </div>
                </div>
            </div>
            <div class="card" style="padding: 10px 10px; display: none" id="car6">
                <p class="mg-b-0">Auditor 6</p>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label for="datos"><strong>Auditor Líder 9001, 14001 y Basc</strong></label>
                            <input type="text" name="auditor_6" class="form-control"  value="{{$auditoria->auditor_6}}">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Correo:</strong></label>
                            <input type="text" name="cooreo_aud_6" class="form-control" value="{{$auditoria->cooreo_aud_6}}">
                        </div>
                    </div>

                </div>
            </div>

            <br><br>
            <div class="row">
                <div class="col-md-12 col-md-offset-2">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 style="color: rgb(82, 82, 82)">Proceso de Auditar</h5>
                             <input type="button" name="nuevo" id="nuevo" class="btn btn-info btn-sm"
                                value="Añadir Nueva Auditoría" onclick="nuevos();">
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="card" style="padding: 10px 10px;" id="dynamic_field">

                @php  $audi=0;     @endphp
                @foreach ($multiples as $multiple)
                    
                @php  $audi=$audi+1;     @endphp
                <h6 style="color: rgb(82, 82, 82)">Auditoría {{$audi}}</h6>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">

                            <label><strong>Fecha:</strong></label>
                            <input type="date" name="fecha_multiple[]" class="form-control" required value="{{$multiple->fecha_multiple}}">


                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Hora de inicio:</strong></label>
                            <input type="text" name="hora_inicio[]" class="form-control" value="{{$multiple->hora_inicio}}">


                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label><strong>Hora de finalización:</strong></label>
                            <input type="text" name="hora_fin[]" class="form-control" value="{{$multiple->hora_fin}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Requisitos para Auditar:</strong></label>
                            <input type="text" name="requisitos[]" class="form-control" value="{{$multiple->requisitos}}">


                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">

                        <div class="form-group">
                            <label><strong>Equipo Auditor:</strong></label>
                            <input type="text" name="equipo[]" class="form-control" value="{{$multiple->equipo}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Info de personas que serán entrevistadas:</strong></label>
                            <input type="text" name="info_personas[]" class="form-control" value="{{$multiple->info_personas}}">
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label for="datos">Observaciones:</label>
                        <textarea name="observaciones" class="form-control" required="true">{{$auditoria->observaciones}}</textarea>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Modalidad de auditoría:</strong></label>
                        <input type="text" name="modalidad" class="form-control" required value="{{$auditoria->modalidad}}">
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Fecha de emisión del plan de auditoría:</strong></label>
                        <input type="date" name="fecha_emision" class="form-control" required value="{{$auditoria->fecha_emision}}">
                    </div>
                </div>
            </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
    {!!Form::close()!!}
    <br>

</div>




@endsection
