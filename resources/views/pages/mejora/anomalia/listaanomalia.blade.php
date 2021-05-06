@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Mejora</a>
        <a class="breadcrumb-item" href="{{ URL::to('/anomalia') }}">Acciones Correlativas y Preventivas</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Lista  Anomalias</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Mejora</h4>
        <p class="mg-b-0">Registros de Anomalias</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <br>
        <br>
        <h5 style="color: rgb(82, 82, 82)">Lista de Plantillas </h5>

        <div class="table-responsive">
            @if ($consultas->isNotEmpty())
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th colspan="3">Anomalia</th>
                        <th colspan="1">Causa</th>
                        
                        <th colspan="4">Acciones Correctivas</th>
                

                        <td style="color: #8f8f8f"><b>Tareas</b></td>
                    </tr>

                    <tr>
                        <th>Anomalia</th>
                        <th>Responsable</th>
                        <th>Fecha</th>
                        <th>Nombre Causa</th>
                        <th>Acciones Correctivas</th>
                        <th>Quien</th>
                        <th>Fecha </th>
                        <th>archivo</th>
                        <th>Compromiso</th>
                        <th>Accion</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Observación</th>
                    </tr>
                    @foreach ($consultas as $consulta)


                    <tr>
                        <td>{{ $consulta->str_anomalia }}</td>
                        <td>{{ $consulta->str_reportado_por }}</td>
                        <td>{{ $consulta->fecha }}</td>
                        <td>{{ $consulta->causa }}</td>
                        <td>{{ $consulta->que }}</td>
                        <td>{{ $consulta->quien }}</td>
                        <td>{{ $consulta->fecha_cer }}</td>
                       @if ($consulta->archivo)
                        <td>{{ substr(($consulta->archivo), 10)}}
                            <a title="Descargar Archivo" href="/archivos/acta/{{$consulta->archivo}}"
                                class="btn btn-light" download="{{$consulta->archivo}}"
                                style="color: rgb(53, 87, 53); font-size:18px; font-size:18px; font-size: 25px;""> <i
                                class=" fas fa-file-download "></i></a></td>
                        @else
                        <td>No existe</td>
                        @endif 
                        <td>{{ $consulta->compromiso_co	 }}</td>
                        <td>{{ $consulta->accion_co }}</td>
                        <td>{{ $consulta->fecha_ini_co }}</td>
                        <td>{{ $consulta->fecha_fin_co }}</td>
                        <td>{{ $consulta->observaciones_co }}</td>

                      
                      
                        {{-- <td>
                            <div class=" form-row align-items-center">
                                <a data-toggle="modal" data-target="#myModal-{{ $consulta->id_plantilla }}"
                                    style="color: #18A4B4" title="Editar"><i class="fas fa-pencil-alt fa-2x"></i></a>

                                <form action="{{route('plantillas.destroy', $consulta->id_plantilla)}}"
                                    class="form-inline formulario-eliminar" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class=" btn btn-light btn-sm">
                                        <i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i>
                                    </button>
                                </form>
                            </div>
                            </td> --}}
        </tr>

        {{-- editar modal --}}

     {{--    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            id="myModal-{{ $consulta->id_plantilla }}">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <center>
                            <h5 style="color: rgb(46, 46, 46);" class="p-2">Editar Plantilla </h5>
                           
                        </center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">


                        <form action="{{ route('plantillas.update', $consulta->id_plantilla)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                    <div class="form-group">
                                        <label><strong>Archivo:</strong></label>
                                        <input type="file" name="plantilla">
                                        <input type="hidden" name="plantilla_anterior" value="{{$consulta->plantilla}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                    <div class="form-group">
                                        <label><strong>Observaciones:</strong></label>
                                        <textarea name="obs_plantilla" rows="2"
                                            cols="100">{{$consulta->obs_plantilla}}</textarea>
                                    </div>
                                </div>
                            </div> 


                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>--}}
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




@endsection
