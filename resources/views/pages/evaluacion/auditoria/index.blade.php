@extends('layouts.dashboard')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="{{ URL::to('/auditoria') }}"><h5><span class="badge badge-info">Auditorían Interna</span></h5></a>
        <a class="nav-item nav-link" href="{{ URL::to('/chequeo_auditoria') }}">Chequeo</a>
        <a class="nav-item nav-link" href="{{ URL::to('/fortalezas_opurtunidades') }}">Fortalezas y Oportunidades</a>
        <a class="nav-item nav-link" href="{{ URL::to('/hallasgos') }}">Hallazgos</a>
      </div>
    </div>
  </nav>

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
        <p class="mg-b-0">Plan Auditorían Interna</p>
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
<script src="js/jquery-1.11.1.min.js"></script>

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('auditoria.store')}}" method="POST">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>
            <br><br>

            <input type="hidden" name="fk_empresa" class="form-control" required value="{{$empresa->id_empresa}}">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Dirección del sitio:</strong></label>
                        <input type="text" required name="direcion" required class="form-control">


                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Representante de la organización:</strong></label>
                        <input type="text" name="representante" class="form-control">

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Cargo:</strong></label>
                        <select name="fk_cargo" class="form-control select2" required>

                            @foreach ($cargos as $cargo)
                            <option value="{{ $cargo->id_cargo }}">{{ $cargo->nom_cargo }}</option>
                            @endforeach
                        </select>


                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Correo:</strong></label>
                        <input type="text" name="correo" class="form-control">

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Alcance:</strong></label>
                        <textarea name="alcance" required rows="2" cols="60" required="true"></textarea>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Criterios de Auditoría:</strong></label>
                        <textarea name="criterios" rows="2" cols="60" required="true"></textarea>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">

                        <label><strong>Tipo de auditoría:</strong></label>
                        <input type="text" name="tipo_auditoria" class="form-control" required>


                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Aplica toma de muestra por multisitio:</strong></label>
                        <select name="multisitio" class="form-control select2" required>
                            <option selected disabled value="">Seleccionar</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>


                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Existen actividades/procesos de turno nocturno:</strong></label>
                        <select name="nocturno" class="form-control select2" required>
                            <option selected disabled value="">Seleccionar</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label for="datos"><strong>Descripción de Auditoría:</strong></label>
                        <textarea name="descripcion" rows="10" cols="140" required="true"></textarea>
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
                        <input type="text" name="auditor_1" class="form-control">
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                    <div class="form-group">
                        <label><strong>Correo:</strong></label>
                        <input type="text" name="cooreo_aud_1" class="form-control">
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
                            <input type="text" name="auditor_2" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Correo:</strong></label>
                            <input type="text" name="cooreo_aud_2" class="form-control">
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
                            <input type="text" name="auditor_3" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Correo:</strong></label>
                            <input type="text" name="cooreo_aud_3" class="form-control">
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
                            <input type="text" name="auditor_4" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Correo:</strong></label>
                            <input type="text" name="cooreo_aud_4" class="form-control">
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
                            <input type="text" name="auditor_5" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Correo:</strong></label>
                            <input type="text" name="cooreo_aud_5" class="form-control">
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
                            <input type="text" name="auditor_6" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Correo:</strong></label>
                            <input type="text" name="cooreo_aud_6" class="form-control">
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
                <h6 style="color: rgb(82, 82, 82)">Auditoría 1</h6>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">

                            <label><strong>Fecha:</strong></label>
                            <input type="date" name="fecha_multiple[]" class="form-control" required>


                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Hora de inicio:</strong></label>
                            <input type="text" name="hora_inicio[]" class="form-control">


                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label><strong>Hora de finalización:</strong></label>
                            <input type="text" name="hora_fin[]" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Requisitos para Auditar:</strong></label>
                            <input type="text" name="requisitos[]" class="form-control">


                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">

                        <div class="form-group">
                            <label><strong>Equipo Auditor:</strong></label>
                            <input type="text" name="equipo[]" class="form-control">


                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Info de personas que serán entrevistadas:</strong></label>
                            <input type="text" name="info_personas[]" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label for="datos">Observaciones:</label>
                        <textarea name="observaciones" rows="2" cols="140" required="true"></textarea>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Modalidad de auditoría:</strong></label>
                        <input type="text" name="modalidad" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Fecha de emisión del plan de auditoría:</strong></label>
                        <input type="date" name="fecha_emision" class="form-control" required>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>
        <br>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
            <div class="table-responsive">
                @if ($auditorias->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Dirección del sitio</th>
                            <th>Representante / organización</th>
                            <th>Cargo</th>
                            <th>Correo</th>
                            <th>Alcance</th>
                            <th>Criterios de Auditoría</th>
                            <th>Tipo de auditoría</th>

                            <th colspan="2">Opciones</th>
                        </tr>
                    </thead>

                    <tbody>


                        @foreach ($auditorias as $auditoria)

                        <tr>
                            <td>{{$auditoria->direcion}}</td>
                            <td>{{$auditoria->representante}}</td>
                            <td>{{$auditoria->nom_cargo}}</td>
                            <td>{{$auditoria->correo}}</td>
                            <td>{{$auditoria->alcance}}</td>
                            <td>{{$auditoria->criterios}}</td>
                            <td>{{$auditoria->tipo_auditoria}}</td>
                            <td>
                                <div class="form-row align-items-center">
                                    <a
                                        href="{{ URL::action('Evaluacion\AuditoriaController@edit',$auditoria->id_auditoria) }}"><i
                                            class=" form-inline fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>

                                    <form action="{{route('auditoria.destroy', $auditoria->id_auditoria)}}"
                                        class="form-inline formulario-eliminar" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button class=" btn btn-light btn-sm">
                                            <i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i>
                                        </button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $auditorias->links() }}
                @else

                <br><br>
                <div class="container m-5">
                    <div class="alert alert-primary" role="alert">
                        <p class="text-center m-3"> Ups! no hay registros 😥
                        </p>
                    </div>
                </div>
                <br><br>
                @endif
            </div>
        </div>
    </div>
</div>

</div>


@endsection
