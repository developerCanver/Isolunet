@extends('layouts.dashboard')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{ URL::to('/seguimiento_medicion') }}">
                <h5><span class="badge badge-info">Seguimiento Medicion</span></h5>
            </a>

            <a class="nav-item nav-link" href="{{ URL::to('/encuesta_satisfaccion') }}">Encuesta satisfacción</a>

        </div>
    </div>
</nav>

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Evaluación Desempeño</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Seguimiento</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Evaluación Desempeño</h4>
        <p class="mg-b-0">Seguimiento Medicion</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('seguimiento_medicion.store')}}" method="POST">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>
            <br><br>

            <input type="hidden" name="fk_empresa" class="form-control" value="{{$empresa->id_empresa}}">

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Proceso:</strong></label>
                        <select name="proceso" class="form-control select2" required>
                            <option selected disabled value="">Seleccione Proceso...</option>
                            @foreach ($procesos as $proceso)
                            <option value="{{ $proceso->nom_proceso }}">{{ $proceso->nom_proceso }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Qué Medir:</strong></label>
                        <input type="text" required name="medir" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Fuente:</strong></label>
                        <input type="text" required name="fuente" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Metodo:</strong></label>
                        <input type="text" required name="metodo" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Frecuencia de Medición:</strong></label>
                        <input type="text" required name="medicion" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Frecuencia de Analisis y Evaluación:</strong></label>
                        <input type="text" required name="evaluacion" class="form-control">
                    </div>
                </div>
            </div>






            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>


        <br>
        <br>
        <h5 style="color: rgb(82, 82, 82)">Lista Seguimiento Medición </h5>

        <div class="table-responsive">
            @if ($consultas->isNotEmpty())
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Proceso</th>
                        <th>Qué Medir</th>
                        <th>Fuente</th>
                        <th>Metodo</th>
                        <th>Frecuencia Medición</th>
                        <th>Frecuencia Analisis y Evaluación</th>


                        <td style="color: #FF0024"><b>Opciones</b></td>
                    </tr>
                    @foreach ($consultas as $consulta)


                    <tr>
                        <td>{{ $consulta->proceso }}</td>
                        <td>{{ $consulta->medir }}</td>
                        <td>{{ $consulta->fuente }}</td>
                        <td>{{ $consulta->metodo }}</td>
                        <td>{{ $consulta->medicion }}</td>
                        <td>{{ $consulta->evaluacion }}</td>
                        <td>
                            <div class="form-row align-items-center">
                            <a data-toggle="modal" data-target="#myModal-{{ $consulta->id_seguimiento }}"
                                style="color: #18A4B4" title="Editar"><i class="fas fa-pencil-alt fa-2x"></i></a>

                                <form action="{{route('seguimiento_medicion.destroy', $consulta->id_seguimiento)}}"
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
                        aria-labelledby="myLargeModalLabel" id="myModal-{{ $consulta->id_seguimiento }}">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <center>
                                        <h5 style="color: rgb(46, 46, 46);" class="p-2">Editar Seguimiento Medición</h5>
                                    </center>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>

                                <div class="modal-body">


                                    <form action="{{ route('seguimiento_medicion.update', $consulta->id_seguimiento)}}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="datos"><strong>Proceso:</strong></label>
                                                    <select name="proceso" class="form-control" required>
                                                        <option selected disabled value="">Seleccione Proceso...
                                                        </option>
                                                        @foreach ($procesos as $proceso)
                                                        <option value="{{ $proceso->nom_proceso }}"
                                                            {{ $proceso->nom_proceso == $consulta->proceso ? 'selected' : '' }}>
                                                            {{ $proceso->nom_proceso }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                <div class="form-group">
                                                    <label><strong>Qué Medir:</strong></label>
                                                    <input type="text" required name="medir" class="form-control"
                                                        value="{{$consulta->medir}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                <div class="form-group">
                                                    <label><strong>Fuente:</strong></label>
                                                    <input type="text" required name="fuente" class="form-control"
                                                        value="{{$consulta->fuente}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="datos"><strong>Metodo:</strong></label>
                                                    <input type="text" required name="metodo" class="form-control"
                                                        value="{{$consulta->metodo}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                <div class="form-group">
                                                    <label><strong>Frecuencia de Medición:</strong></label>
                                                    <input type="text" required name="medicion" class="form-control"
                                                        value="{{$consulta->medicion}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                <div class="form-group">
                                                    <label><strong>Frecuencia de Analisis y Evaluación:</strong></label>
                                                    <input type="text" required name="evaluacion" class="form-control"
                                                        value="{{$consulta->evaluacion}}">
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




@endsection
