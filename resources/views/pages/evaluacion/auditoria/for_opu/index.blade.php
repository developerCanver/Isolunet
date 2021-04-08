@extends('layouts.dashboard')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{ URL::to('/auditoria') }}">Auditorían Interna</a>
            <a class="nav-item nav-link" href="{{ URL::to('/chequeo_auditoria') }}">Chequeo</a>
            <a class="nav-item nav-link" href="{{ URL::to('/fortalezas_opurtunidades') }}">
                <h5><span class="badge badge-info">Fortalezas y Oportunidades</span></h5>
            </a>
            <a class="nav-item nav-link" href="{{ URL::to('/hallasgos') }}">Hallazgos</a>
        </div>
    </div>
</nav>

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Evaluación de desempeño</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Auditoría </span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Evaluación de desempeño</h4>
        <p class="mg-b-0">Fortalezas y Oportunidades</p>
    </div>
</div><!-- d-flex -->


<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('fortalezas_opurtunidades.store')}}" method="POST">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>
            <br><br>

            <input type="hidden" name="fk_empresa" class="form-control" required value="{{$empresa->id_empresa}}">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Proceso a Auditar:</strong></label>
                        <select name="fk_proceso" class="form-control select2" required>
                            <option selected disabled value="">Seleccione Proceso...</option>
                            @foreach ($procesos as $proceso)
                            <option value="{{ $proceso->id_proceso }}">{{ $proceso->nom_proceso }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                    <div class="form-group">
                        <label><strong>Responsable:</strong></label>
                        <select name="fk_usuario" class="form-control select2" required>
                            <option selected disabled value="">Seleccione Usuario...</option>
                            @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label for="datos"><strong>Fecha:</strong></label>
                        <input type="date" required name="fecha_foropur" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Auditor Líder:</strong></label>
                        <input type="text" required name="lider" class="form-control">
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                    <div class="form-group">
                        <label><strong>Equipo Auditor:</strong></label>
                        <input type="text" required name="equipo" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label for="datos"><strong>Tipo informe:</strong></label>
                        <select name="tipo_informe" required class="form-control select2">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="FORTALEZAS">FORTALEZAS</option>
                            <option value="OPORTUNIDADES ">OPORTUNIDADES </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label for="datos"><strong>Descripción:</strong></label>
                        <textarea name="descripcion_foropur" rows="2" cols="140" required="true"></textarea>
                    </div>
                </div>
            </div>



            @foreach ($gestiones as $gestione)
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>{{$gestione->str_nombre}}:</strong></label>
                        <input type="hidden" name="fk_sisgestion[]" value="  {{$gestione->id_sisgestion}}">

                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <select name="seleccion_foropur[]" required class="form-control select2">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>

    </div>
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
                            <th>Proceso a Auditar</th>
                            <th>Responsable</th>
                            <th>Fecha</th>
                            <th>Auditor Líder</th>
                            <th>Equipo Auditor</th>
                            <th>Descripción</th>

                            <th colspan="2">Opciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php $cont=0;      @endphp
                        @foreach ($chequeos as $chequeo)

                        @if ($chequeo->tipo_informe == "FORTALEZAS")

                        <tr>
                            <td>{{$chequeo->nom_proceso}}</td>
                            <td>{{$chequeo->name}}</td>
                            <td>{{$chequeo->fecha_foropur}}</td>
                            <td>{{$chequeo->lider}}</td>
                            <td>{{$chequeo->equipo}}</td>
                            <td>{{$chequeo->descripcion_foropur}}</td>
                            <td>
                                <div class="form-row align-items-center">

                                    <a
                                        href="{{ URL::action('Evaluacion\FortalesasOportunidadesController@edit',$chequeo->id_foropur) }}"><i
                                            class=" form-inline fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>

                                    <form action="{{route('fortalezas_opurtunidades.destroy', $chequeo->id_foropur)}}"
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
                        @else
                            @php $cont=$cont+1; @endphp

                            @if ($cont == 1)
                            <td colspan="7">
                                <div class="alert alert-primary" role="alert">
                                    <p class="text-center m-3"> Ups! no hay registros 😥</p>

                                </div>
                            </td>
                            <br>
                            @endif

                        @endif



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


    <br>
    <br><br>
    <h5 style="color: rgb(82, 82, 82)">Oportunidades De Mejora</h5>
    <div class="row">
        <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
            <div class="table-responsive">
                @if ($chequeos->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Proceso a Auditar</th>
                            <th>Responsable</th>
                            <th>Fecha</th>
                            <th>Auditor Líder</th>
                            <th>Equipo Auditor</th>
                            <th>Descripción</th>

                            <th colspan="2">Opciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php $cont=0; @endphp
                        @foreach ($chequeos as $chequeo)
                        @if ($chequeo->tipo_informe == "OPORTUNIDADES")
                        <tr>
                            <td>{{$chequeo->nom_proceso}}</td>
                            <td>{{$chequeo->name}}</td>
                            <td>{{$chequeo->fecha_foropur}}</td>
                            <td>{{$chequeo->lider}}</td>
                            <td>{{$chequeo->equipo}}</td>
                            <td>{{$chequeo->descripcion_foropur}}</td>
                            <td>
                                <div class="form-row align-items-center">

                                    <a
                                        href="{{ URL::action('Evaluacion\FortalesasOportunidadesController@edit',$chequeo->id_foropur) }}"><i
                                            class=" form-inline fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>

                                    <form action="{{route('fortalezas_opurtunidades.destroy', $chequeo->id_foropur)}}"
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
                        @else
                        @php $cont=$cont+1; @endphp

                            @if ($cont == 1)
                            <td colspan="7">
                                <div class="alert alert-primary" role="alert">
                                    <p class="text-center m-3"> Ups! no hay registros 😥</p>

                                </div>
                            </td>
                            <br>
                            @endif

                    @endif


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
