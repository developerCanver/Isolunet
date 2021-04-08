@extends('layouts.dashboard')

@section('content')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Planeación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Diseño y Desarrollo</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Planeación</h4>
        <p class="mg-b-0">Diseño y Desarrollo</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('diseño_desarrollo.store')}}" method="POST">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>
            <br><br>

            <input type="hidden" name="fk_empresa" class="form-control" required value="{{$empresa->id_empresa}}">

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Proceso General/Zona:</strong></label>
                        <input type="text" required name="ubicacion" class="form-control">
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                    <div class="form-group">
                        <label><strong>Procesos Unitarios:</strong></label>
                        <input type="text" required name="descripciones" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Aspecto Ambiental a Evaluar:</strong></label>
                        <input type="text" required name="evidencia" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Impacto Ambiental:</strong></label>
                        <input type="text" required name="requisito" class="form-control">
                    </div>
                </div>
            </div>

            <h5>Calificación del Impacto</h5>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Responsabilidad:</strong></label>
                        <input type="text" required name="num_detectadas" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Situación Operacional:</strong></label>
                        <input type="text" required name="num_cerredas" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Tipo De Impacto:</strong></label>
                        <input type="text" required name="num_cerredas" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>cumple Requisito Legal:</strong></label>
                        <select name="seleccion_hallazgos" required class="form-control ">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Cumple Control:)</strong></label>
                        <select name="seleccion_hallazgos" required class="form-control ">
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
                        <select name="seleccion_hallazgos" required class="form-control ">
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
                        <select name="seleccion_hallazgos" required class="form-control ">
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
                        <select name="seleccion_hallazgos" required class="form-control ">
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
                        <input type="number" required name="num_detectadas" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>N° Significancia:</strong></label>
                        <input type="number" required name="num_cerredas" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Significancia:</strong></label>
                        <select name="seleccion_hallazgos" required class="form-control ">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="Alta">Alta</option>
                            <option value="Media">Media</option>
                            <option value="Baja">Baja</option>
                            <option value="Ninguna">Ninguna</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label for="datos"><strong>Programa ambiental asociado/tipo de control:</strong></label>
                        <input type="number" required name="num_detectadas" class="form-control">
                    </div>
                </div>

            </div>



            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>


        <br>
        <br>
        <h5 style="color: rgb(82, 82, 82)">Aspectos Positivos / Fortalezas</h5>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($chequeos->isNotEmpty())

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ubicación</th>
                                <th>Descripción</th>
                                <th>Evidencia</th>
                                <th>Requisito</th>
                                <th>Revisó</th>
                                <th>Aprobó</th>

                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($chequeos as $chequeo)


                            <tr>
                                <td>{{$chequeo->ubicacion}}</td>
                                <td>{{$chequeo->descripciones}}</td>
                                <td>{{$chequeo->evidencia}}</td>
                                <td>{{$chequeo->requisito}}</td>
                                <td>{{$chequeo->reviso}}</td>
                                <td>{{$chequeo->aprobo}}</td>
                                <td>
                                    <div class="form-row align-items-center">

                                        <a
                                            href="{{ URL::action('Evaluacion\HallazgosController@edit',$chequeo->id_hallazgos) }}"><i
                                                class=" form-inline fas fa-pencil-alt fa-2x"
                                                style="color:#18A4B4;"></i></a>

                                        <form action="{{route('hallasgos.destroy', $chequeo->id_hallazgos)}}"
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
                    {{ $chequeos->links() }}
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
