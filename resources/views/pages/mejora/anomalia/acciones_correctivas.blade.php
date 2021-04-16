@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Mejora</a>
        <a class="breadcrumb-item" href="{{ URL::to('/anomalia') }}">Anomalia</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Acciones Correctivas</span></a>
    </nav>
</div>

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Analisis de Anomalia </h4>
        <p class="mg-b-0">Acciones Correctivas</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">

        <form action="{{route('acciones_correctivas.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>


            @livewire('mejora.correlativas', ['id_anomalia' => null])


            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Qué </label>
                        <textarea name="que" class="form-control" rows="4"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Quien </label>
                        <select name="quien" class="form-control " required>
                            <option selected disabled value="">Seleccione Usuario...</option>
                            @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->name }}">{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fecha </label>
                        <input type="date" name="fecha_cer" class="form-control" value="{{ date("Y-m-d") }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Archivo </label>
                        <input type="file" name="archivo" class="form-control"">
                     </div>
                </div>
            </div>
           <br>
        <button type=" submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i
                                class="fas fa-backward"></i></a>
        </form>


        <br>
        <br>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <br>
                <br>
                <h5 style="color: rgb(82, 82, 82)">Lista de Acciones Correctivas </h5>

                <div class="table-responsive">
                    @if ($consultas->isNotEmpty())
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>CAUSA RAIZ</th>
                                <th>ACCION CORRECTIVA</th>
                                <th>QUIEN</th>
                                <th>FECHA</th>
                                <th>EVIDENCIA</th>

                                <td style="color: #FF0024"><b>Opciones</b></td>
                            </tr>

                            @foreach ($consultas as $consulta)
                            <tr>
                                @if ($consulta->terminada_co == 1)
                                <td style="background: #b6ffde;">{{ $consulta->causa }}</td>
                                <td style="background: #b6ffde;">{{ $consulta->que }}</td>
                                <td style="background: #b6ffde;">{{ $consulta->quien }}</td>
                                <td style="background: #b6ffde;">{{ $consulta->fecha_cer }}</td>
                                @if ($consulta->archivo)
                                <td style="background: #b6ffde;">{{ substr(($consulta->archivo), 10)}}
                                    <a title="Descargar Archivo" href="/archivos/acta/{{$consulta->archivo}}"
                                        class="btn btn-light" download="{{$consulta->archivo}}"
                                        style="color: rgb(53, 87, 53); font-size:18px; font-size:18px; font-size: 25px;""> <i
                                            class=" fas fa-file-download "></i></a></td>
                                        @else
                                            <td style=" background: #b6ffde;">No existe</td>
                                @endif

                                @else
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
                                
                                @endif

                      
                                <td>
                                    <div class=" form-row align-items-center">
                                        <a data-toggle="modal" data-target="#myModal-{{ $consulta->id_correlativa  }}"
                                            style="color: #18A4B4" title="Editar"><i
                                                class="fas fa-pencil-alt fa-2x"></i></a>

                                        <form
                                            action="{{route('acciones_correctivas.destroy', $consulta->id_correlativa )}}"
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

                {{-- editar modal --}}

                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" id="myModal-{{ $consulta->id_correlativa  }}">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <center>
                                    <h5 style="color: rgb(46, 46, 46);" class="p-2">Editar Acciones Correctivas </h5>
                                    {{$consulta->str_anomalia}} - {{$consulta->causa}}
                                </center>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>

                            <div class="modal-body">


                                <form action="{{ route('acciones_correctivas.update', $consulta->id_correlativa)}}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    {{-- @livewire('mejora.correlativas', ['id_anomalia' => $consulta->id_anomalia]) --}}


                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Qué </label>
                                                <textarea name="que" class="form-control"
                                                    rows="4">{{$consulta->que}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Quien </label>
                                                <select name="quien" class="form-control " required>
                                                    <option selected disabled value="">Seleccione Usuario...</option>
                                                    @foreach ($usuarios as $usuario)
                                                    <option value="{{ $usuario->name }}"
                                                        {{$usuario->name == $consulta->quien ? 'selected' : '' }}>
                                                        {{ $usuario->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Fecha </label>
                                                <input type="date" name="fecha_cer" class="form-control"
                                                    value="{{$consulta->fecha_cer}}">
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    @if ($consulta->terminada_co == 1)

                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                            <div class="form-group">
                                                <label><strong>Compromiso:</strong></label>
                                                <input type="text" required name="compromiso_co" class="form-control" value="{{$consulta->compromiso_co}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                            <div class="form-group">
                                                <label><strong>Acción Ejecutable:</strong></label>
                                                <input type="text" required name="accion_co" class="form-control" value="{{$consulta->accion_co}}">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                            <div class="form-group">
                                                <label><strong>Fecha Inicio:</strong></label>
                                                <input type="date" required name="fecha_ini_co" class="form-control"  value="{{$consulta->fecha_ini_co}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                            <div class="form-group">
                                                <label><strong>Fecha Final:</strong></label>
                                                <input type="date" required name="fecha_fin_co" class="form-control" value="{{$consulta->fecha_fin_co}}">
                                            </div>
                                        </div>
                                    </div>
                                 
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Observaciones Ejecucción:</strong></label>
                                                <textarea name="observaciones_co" rows="2" cols="100"
                                                    required="true">{{$consulta->observaciones_co}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    @endif
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                            <div class="form-group">
                                                <label><strong>Archivo:</strong></label>
                                                <input type="file" name="archivo">
                                                <input type="hidden" name="archivo_anterior" value="{{$consulta->archivo}}">

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
</div>
@endsection
@push('scripts')
@endpush
