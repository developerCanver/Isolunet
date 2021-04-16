@extends('layouts.dashboard')

@section('content')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Mejora</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Tareas Pendientes</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Mejora</a>
        </h4>
        <p class="mg-b-0">Tareas Pendientes</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')




        <h4>{{$empresa->razon_social}} </h4>
        <br><br>

        <input type="hidden" name="fk_empresa" class="form-control" value="{{$empresa->id_empresa}}">

        <div class="col-md-11 col-md-offset-2">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 style="color: rgb(46, 46, 46);">Compromiso Adicional</h5>

                    <a class="btn text-white btn-info btn" data-toggle="modal" data-target="#adicionarModal"
                        style="color: #18A4B4" title="Añadir">Añadir</a>

                </div>
            </div>
        </div>
        <br>
        <br>






        {{-- Adicionar modal --}}

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            id="adicionarModal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header" style="background: #7ee5cd;">
                        <center>
                            <h5 style="color: rgb(46, 46, 46);" class="p-2">Añadir Compromiso</h5>
                        </center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">


                        <form action="{{route('tareas_pendientes.store')}}" method="POST">
                            @csrf


                            <input type="hidden" name="fk_empresa" class="form-control"
                                value="{{$empresa->id_empresa}}">
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label><strong>Acciones ó Actividad:</strong></label>
                                        <input type="text" required name="acciones_ta" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label><strong>Responsable:</strong></label>
                                        <select name="responsable_ta" class="form-control " required>
                                            <option selected disabled value="">Seleccione Usuario...</option>
                                            @foreach ($usuarios as $usuario)
                                            <option value="{{ $usuario->name }}">{{ $usuario->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label><strong>Fecha Inicio:</strong></label>
                                        <input type="date" required name="fechaini" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label><strong>Fecha Final:</strong></label>
                                        <input type="date" required name="fechafin" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- fin momdal --}}


        <h5 style="color: rgb(82, 82, 82)">Compromiso Adicionales</h5>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($adicionales->isNotEmpty())

                    <table class="table">
                        <thead>
                            <tr>
                                <th title="Codigo Compromiso Adicional">Codigo Adicional</th>
                                <th>Acciones ó Actividad</th>
                                <th>Responsable</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Final</th>
                                <th>Estado</th>

                                <th>Opcion</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($adicionales as $consulta)

                            @if ($consulta->terminada == 0)

                            <tr>
                                <td>
                                    <center>{{$consulta->id_tareas}}</center>
                                </td>
                                <td>{{$consulta->acciones_ta}}</td>
                                <td>{{$consulta->responsable_ta}}</td>
                                <td>{{$consulta->fechaini}}</td>
                                <td>{{$consulta->fechafin}}</td>
                                @php
                                $diferencia = ((strtotime($consulta->fechafin) - strtotime(date("Y-m-d")
                                ))/86400);
                                @endphp
                                @if ($diferencia >= 15)
                                <td style="background: #1d9612;    font-weight: 600;
                                color: white;">
                                    <center> {{ $diferencia  }}</center>
                                </td>

                                @elseif ($diferencia >= 1)
                                <td style="background: #d3d616;    font-weight: 600;
                                color: #000;">
                                    <center> {{ $diferencia  }}</center>
                                </td>

                                @elseif ($diferencia <= 0) <td style="background: #d62916;    font-weight: 600;
                                color: white;">
                                    <center> {{ $diferencia  }}</center>
                                    </td>
                                    @endif


                                    @else

                            <tr>
                                <td style="background: #b6ffde;">
                                    <center>{{$consulta->id_tareas}}</center>
                                </td>
                                <td style="background: #b6ffde;">{{$consulta->acciones_ta}}</td>
                                <td style="background: #b6ffde;">{{$consulta->responsable_ta}}</td>
                                <td style="background: #b6ffde;">{{$consulta->fechaini}}</td>
                                <td style="background: #b6ffde;">{{$consulta->fechafin}}</td>


                                @if ($consulta->archivo_ta)
                                <td style="background: #b6ffde;">{{substr(($consulta->archivo_ta), 10)}}
                                    <a title="Descargar Archivo" href="/archivos/acta/{{$consulta->archivo_ta}}"
                                        class="btn btn-light" download="{{$consulta->archivo_ta}}"
                                        style="color: rgb(53, 87, 53); font-size:18px; font-size:18px; font-size: 25px;""> <i
                                        class=" fas fa-file-download "></i></a></td>
                                @else
                                <td style=" background: #b6ffde;">No existe</td>
                                @endif

                                @endif

                                <td>
                                    <div class=" form-row align-items-center">
                                        <a data-toggle="modal" data-target="#myModal-{{ $consulta->id_tareas }}"
                                            style="color: #18A4B4" title="Editar"><i
                                                class="fas fa-pencil-alt fa-2x"></i></a>

                                    </div>

                                </td>
                            </tr>
                            {{-- editar modal --}}

                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" id="myModal-{{ $consulta->id_tareas }}">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <center>
                                                <h5 style="color: rgb(46, 46, 46);" class="p-2">Termino de Compromiso
                                                    Medición</h5>
                                            </center>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>

                                        <div class="modal-body">


                                            <form action="{{ route('tareas_pendientes.update', $consulta->id_tareas)}}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" name="mejora_compromiso" value="adicional">

                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label><strong>Compromiso:</strong></label>
                                                            <input type="text" required name="compromiso_ta"
                                                                class="form-control"
                                                                value="{{$consulta->compromiso_ta}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label><strong>Acción Ejecutable:</strong></label>
                                                            <input type="text" required name="accion_ta"
                                                                class="form-control" value="{{$consulta->accion_ta}}">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label><strong>Fecha Inicio:</strong></label>
                                                            <input type="date" required name="fecha_ini_ta"
                                                                class="form-control"
                                                                value="{{$consulta->fecha_ini_ta}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label><strong>Fecha Final:</strong></label>
                                                            <input type="date" required name="fecha_fin_ta"
                                                                class="form-control"
                                                                value="{{$consulta->fecha_fin_ta}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label><strong>Archivo:</strong></label>
                                                            <input type="file" name="archivo_ta">
                                                            <input type="hidden" name="archivo_ta_anterior"
                                                                value="{{$consulta->archivo_ta}}">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label><strong>Observaciones Ejecucción:</strong></label>
                                                            <textarea name="observaciones_ta" rows="2" cols="100"
                                                                required="true">{{$consulta->observaciones_ta}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Editar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- fin momdal --}}

                            @endforeach
                        </tbody>
                    </table>
                    {{ $adicionales->links() }}
                    @else

                    <br><br>
                    <div class="container m-5">
                        <div class="alert alert-primary" role="alert">
                            <p class="text-center m-3"> Ups! no hay registros Compromiso adicionales 😥
                            </p>
                        </div>
                    </div>
                    <br><br>
                    @endif
                </div>
            </div>
        </div>
        <br>
        <br>

        <h5 style="color: rgb(82, 82, 82)">Compromiso en las Actas </h5>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($consultas->isNotEmpty())

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Codigo Acta</th>
                                <th>Nombre Acta</th>
                                <th>Acciones ó Actividad</th>
                                <th>Responsable</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Final</th>
                                <th>Estado</th>
                                <th>Opcion</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($consultas as $consulta)
                            <tr>
                                <td>
                                    <center>{{$consulta->id_acta}}</center>
                                </td>
                                <td>{{$consulta->acta}}</td>
                                <td>{{$consulta->accion}}</td>
                                <td>{{$consulta->responsable}}</td>
                                <td>{{$consulta->fecha_inicio_acc}}</td>
                                <td>{{$consulta->fecha_final_acc}}</td>
                                @php
                                $diferencia = ((strtotime($consulta->fecha_final_acc) - strtotime(date("Y-m-d")
                                ))/86400);
                                @endphp
                                @if ($diferencia >= 15)
                                <td style="background: #1d9612;    font-weight: 600;
                                color: white;">
                                    <center> {{ $diferencia  }}</center>
                                </td>

                                @elseif ($diferencia >= 1)
                                <td style="background: #d3d616;    font-weight: 600;
                                color: #000;">
                                    <center> {{ $diferencia  }}</center>
                                </td>

                                @elseif ($diferencia <= 0) <td style="background: #d62916;    font-weight: 600;
                                color: white;">
                                    <center> {{ $diferencia  }}</center>
                                    </td>
                                    @endif
                                    <td>
                                        <div class=" form-row align-items-center">
                                            <div class=" form-row align-items-center">
                                                <a data-toggle="modal" data-target="#actaModal{{ $consulta->id_acta }}"
                                                    style="color: #18A4B4" title="Editar"><i
                                                        class="fas fa-pencil-alt fa-2x"></i></a>

                                            </div>


                                        </div>
                                    </td>
                            </tr>

                            {{-- editar modal Acta --}}

                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" id="actaModal{{ $consulta->id_acta }}">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <center>
                                                <h5 style="color: rgb(46, 46, 46);" class="p-2">Compromiso en las Actas
                                                </h5>
                                            </center>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ route('tareas_pendientes.update', $consulta->id_acta)}}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')



                                            <h5 style="color: rgb(46, 46, 46);">Acta</h5>

                                            <input type="hidden" name="mejora_compromiso" value="acta">

                                            <h5 class="pt-3" style="color: rgb(46, 46, 46);">Ejecucción de Compromisos
                                            </h5>

                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label><strong>Compromiso:</strong></label>
                                                        <input type="text" required name="compromiso"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label><strong>Acción Ejecutable:</strong></label>
                                                        <input type="text" required name="ejecutable"
                                                            class="form-control">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label><strong>Fecha Inicio:</strong></label>
                                                        <input type="date" required name="fecha_inicio_eje"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label><strong>Fecha Final:</strong></label>
                                                        <input type="date" required name="fecha_final_eje"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label><strong>Archivo:</strong></label>
                                                        <input type="file" name="archivo">
                                                        <input type="hidden" name="archivo_anterior"
                                                            value="{{$consulta->archivo}}">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label><strong>Observaciones Ejecucción:</strong></label>
                                                        <textarea name="observaciones_ejecuccion" rows="2" cols="100"
                                                            required="true"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Editar</button>
                                            </div>
                                        </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- fin momdal --}}


                            @endforeach
                        </tbody>
                    </table>
                    {{ $consultas->links() }}
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
        <br>
        <br>
        <h5 style="color: rgb(82, 82, 82)">Compromiso Anomalias </h5>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($anomalias->isNotEmpty())

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Codigo Anomalia</th>
                                <th>Descripción</th>
                                <th>Acciones ó Correctiva</th>
                                <th>Quién</th>
                                <th>Fecha </th>
                                <th>Estado</th>

                                <th>Opcion</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($anomalias as $anomalia)


                            <tr>
                                <td>
                                    <center>{{$anomalia->id_correlativa}}</center>
                                </td>
                                <td>{{$anomalia->str_anomalia}}</td>
                                <td>{{$anomalia->que}}</td>
                                <td>{{$anomalia->quien}}</td>
                                <td>{{$anomalia->fecha}}</td>
                                @php
                                $diferencia = ((strtotime($anomalia->fecha) - strtotime(date("Y-m-d") ))/86400);
                                @endphp
                                @if ($diferencia >= 15)
                                <td style="background: #1d9612;    font-weight: 600;
                                color: white;">
                                    <center> {{ $diferencia  }}</center>
                                </td>

                                @elseif ($diferencia >= 1)
                                <td style="background: #d3d616;    font-weight: 600;
                                color: #000;">
                                    <center> {{ $diferencia  }}</center>
                                </td>

                                @elseif ($diferencia <= 0) <td style="background: #d62916;    font-weight: 600;
                                color: white;">
                                    <center> {{ $diferencia  }}</center>
                                    </td>
                                    @endif

                                    <td>

                                        <div class=" form-row align-items-center">
                                            <a data-toggle="modal"
                                                data-target="#anomaliaModal{{ $anomalia->id_causas }}"
                                                style="color: #18A4B4" title="Editar"><i
                                                    class="fas fa-pencil-alt fa-2x"></i></a>

                                        </div>


                                    </td>
                            </tr>

                            {{-- editar modal Anomalia--}}

                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" id="anomaliaModal{{ $anomalia->id_causas }}">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <center>
                                                <h5 style="color: rgb(46, 46, 46);" class="p-2">Termino de Compromiso
                                                    Medición</h5>
                                            </center>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>

                                        <div class="modal-body">


                                            <form action="{{ route('tareas_pendientes.update', $anomalia->id_correlativa)}}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" name="mejora_compromiso" value="anomalia">

                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label><strong>Compromiso:</strong></label>
                                                            <input type="text" required name="compromiso_co" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label><strong>Acción Ejecutable:</strong></label>
                                                            <input type="text" required name="accion_co" class="form-control">
            
                                                        </div>
                                                    </div>
                                                </div>
            
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label><strong>Fecha Inicio:</strong></label>
                                                            <input type="date" required name="fecha_ini_co" class="form-control"  >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label><strong>Fecha Final:</strong></label>
                                                            <input type="date" required name="fecha_fin_co" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                             
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label><strong>Observaciones Ejecucción:</strong></label>
                                                            <textarea name="observaciones_co" rows="2" cols="100"
                                                                required="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
            
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label><strong>Archivo:</strong></label>
                                                            <input type="file" name="archivo">
                                                            <input type="hidden" name="archivo_anterior" value="{{$anomalia->archivo}}">
            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Editar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- fin momdal --}}

                            @endforeach
                        </tbody>
                    </table>
                    {{ $anomalias->links() }}
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
