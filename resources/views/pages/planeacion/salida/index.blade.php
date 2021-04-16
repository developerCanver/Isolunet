@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Planeación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Salidas no conformes</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Planeación</h4>
        <p class="mg-b-0">salidas no conformes</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('plantillas.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>
            <br><br>

            <input type="hidden" name="fk_empresa" class="form-control" value="{{$empresa->id_empresa}}">



            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Archivo:</strong></label>
                        <input type="file" name="plantilla" required>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12 col-lg-8">
                    <div class="form-group">
                        <label><strong>Observaciones:</strong></label>
                        <textarea name="obs_plantilla" rows="2" cols="90"></textarea>
                    </div>
                </div>
            </div>





            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>


        <br>
        <br>
        <h5 style="color: rgb(82, 82, 82)">Lista de Plantillas </h5>

        <div class="table-responsive">
            @if ($consultas->isNotEmpty())
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Empresa</th>
                        <th>Archivo</th>
                        <th>Observación</th>

                        <td style="color: #FF0024"><b>Opciones</b></td>
                    </tr>
                    @foreach ($consultas as $consulta)


                    <tr>
                        <td>{{ $consulta->razon_social }}</td>
                        @if ($consulta->plantilla)
                        <td>{{ substr(($consulta->plantilla), 10)}}
                            <a title="Descargar Archivo" href="/archivos/plantillas/{{$consulta->plantilla}}"
                                class="btn btn-light" download="{{$consulta->plantilla}}"
                                style="color: rgb(53, 87, 53); font-size:18px; font-size:18px; font-size: 25px;""> <i
                                class=" fas fa-file-download "></i></a></td>
                        @else
                        <td>No existe</td>
                        @endif

                        <td>{{ $consulta->obs_plantilla }}</td>
                      
                        <td>
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
        </td>
        </tr>

        {{-- editar modal --}}

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            id="myModal-{{ $consulta->id_plantilla }}">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <center>
                            <h5 style="color: rgb(46, 46, 46);" class="p-2">Editar Plantilla </h5>
                            {{ substr(($consulta->plantilla), 10)}}
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
