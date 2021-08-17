@extends('layouts.dashboard')

@section('content')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Planificación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Aspectos e Impactos Ambientales</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Planificación</h4>
        <p class="mg-b-0">Aspectos e Impactos Ambientales</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('diseno_desarrollo.store')}}" method="POST">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>
            <br><br>

            <input type="hidden" name="fk_empresa" class="form-control" required value="{{$empresa->id_empresa}}">

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Proceso General/Zona:</strong></label>
                        <input type="text" required name="general" class="form-control">
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                    <div class="form-group">
                        <label><strong>Procesos Unitarios:</strong></label>
                        <input type="text" required name="unitarios" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Categoría Aspecto Ambiental:</strong></label>
                        <input type="text" required name="cate_aspectos" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Aspecto Ambiental a Evaluar:</strong></label>
                        <input type="text" required name="aspectos_ambiental" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Impacto Ambiental:</strong></label>
                        <input type="text" required name="impacto" class="form-control">
                    </div>
                </div>
            </div>

            <h5>Calificación del Impacto</h5>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Responsabilidad:</strong></label>
                        <input type="text" required name="responsabilidad" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Situación Operacional:</strong></label>
                        <input type="text" required name="situacion" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Tipo De Impacto:</strong></label>
                        <input type="text" required name="tipo_impacto" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>cumple Requisito Legal:</strong></label>
                        <select name="legal" required class="form-control ">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Cumple Control:</strong></label>
                        <select name="control" required class="form-control ">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <h5>Grado de Afectación al Medio</h5>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Periodicidad (P):</strong></label>
                        <select name="periodicidad" required class="form-control ">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="No Aplica">No Aplica</option>
                            <option value="Afectación Leve">Afectación Leve</option>
                            <option value="Afectación significativa">Afectación significativa</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Intensidad (I):</strong></label>
                        <select name="intensidad" required class="form-control ">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="No Aplica">No Aplica</option>
                            <option value="Afectación Leve">Afectación Leve</option>
                            <option value="Afectación significativa">Afectación significativa</option>
                        </select>
                    </div>
                </div>															
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Permanencia Del Impacto (PI):</strong></label>
                        <select name="permanencia" required class="form-control ">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="No Aplica">No Aplica</option>
                            <option value="Afectación Leve">Afectación Leve</option>
                            <option value="Afectación significativa">Afectación significativa</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Afectación De Las Partes Interesadas:</strong></label>
                        <input type="number" required name="afectacion" class="form-control">
                    </div>
                </div>
                {{-- <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>N° Significancia:</strong></label>
                        <input type="number" required name="num_sinificancia" class="form-control">
                    </div>
                </div> --}}
                {{-- <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Significancia:</strong></label>
                        <select name="sinificancia" required class="form-control ">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="Alta">Alta</option>
                            <option value="Media">Media</option>
                            <option value="Baja">Baja</option>
                            <option value="Ninguna">Ninguna</option>
                        </select>
                    </div>
                </div> --}}
      
                <div class="col-md-8 col-sm-8 col-xs-12 col-lg-8">
                    <div class="form-group">
                        <label for="datos"><strong>Programa ambiental asociado/tipo de control:</strong></label>
                        <input type="text" required name="programa" class="form-control">
                    </div>
                </div>

            </div>



            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>


        <br>
        <br>
        <h5 style="color: rgb(82, 82, 82)">Matriz aspectos e impactos </h5>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($consultas->isNotEmpty())

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Proceso General</th>
                                <th>Procesos Unitario</th>
                                <th>Categoría Aspecto Ambiental</th>
                                <th>Aspecto Ambiental a Evaluar</th>
                                <th>Impacto Ambiental</th>
                                <th>Responsabilidad:</th>
                                <th>N° Sinificancia :</th>
                                <th>Sinificancia:</th>

                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($consultas as $consulta)


                            <tr>
                                <td>{{$consulta->general}}</td>
                                <td>{{$consulta->unitarios}}</td>
                                <td>{{$consulta->cate_aspectos}}</td>
                                <td>{{$consulta->aspectos_ambiental}}</td>
                                <td>{{$consulta->impacto}}</td>
                                <td>{{$consulta->responsabilidad}}</td>
                                <td>{{$consulta->num_sinificancia}}</td>
                                <td>{{$consulta->sinificancia}}</td>
                                <td>
                                    <div class="form-row align-items-center">
                                        <a
                                            href="{{ URL::action('Planeacion\DisenoController@edit',$consulta->id_diseno ) }}"><i
                                                class=" form-inline fas fa-pencil-alt fa-2x"
                                                style="color:#18A4B4;"></i></a>

                                        <form
                                            action="{{route('diseno_desarrollo.destroy',$consulta->id_diseno )}}"
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
</div>




@endsection
