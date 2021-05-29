@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Apoyo</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Comunicaciones</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Comunicaciones - <a class="breadcrumb-item" href="{{ URL::to('/competencia_rendicion') }}">Rendición de
                Cuentas</a> </h4>
                <p class="mg-b-0">Comunicaciones</p>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')
        <form action="{{route('comunicaciones.store')}}" method="POST">
            @csrf

            <h4> </h4>
            <div class="row">
                <input type="hidden" name="fk_empresa" value="{{$empresa->id_empresa}}">
            </div><br><br>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong> Parte Interesada:</strong></label>
                                <input type="text" name="parte" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Cambio Interno:</strong></label>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                    SGC
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                    <input type="checkbox" name="sgc" id="cambio_interno" value="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                    SGA
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                    <input type="checkbox" name="sga" id="cambio_interno" value="1">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong></strong></label>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                    SGSCS
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                    <input type="checkbox" name="sgscs" id="cambio_externo" value="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                    SGSST
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                    <input type="checkbox" name="sgsst" id="cambio_externo" value="1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong>Asunto:</strong></label>
                                <input type="text" name="asunto" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong>Mecanismos y Medios:</strong></label>
                                <input type="text" class="form-control" name="mecanismo" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12  col-xs-12 col-lg-12 ">
                    <div class="form-group">
                        <label><strong>Detalle de la Información recolectada (necesidades y
                                expectativas):</strong></label>
                        <textarea name="detalle" class="form-control"required="true"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong>Frecuencia:</strong></label>
                                <input type="text" name="frecuencia" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong>Interlocutor de la Parte de Interesada:</strong></label>
                                <input type="text" class="form-control" name="interesada" id="fecha_cambio" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong>Interlocutor / Apoyo:</strong></label>
                                <input type="text" name="apoyo" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong>Registros Relacionados:</strong></label>
                                <input type="text" class="form-control" name="registros" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($comunicaciones->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Parte Interesada:</th>
                                <th colspan="4">Cambio Interno:</th>
                                <th>Asunto</th>
                                <th>Mecanismos y Medios:</th>
                                <th>Información</th>
                                <th>Frecuencia:</th>
                                <th colspan="2">Interlocutor </th>
                                <th>Registros Relacionados:</th>


                                <th> Opciones</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>SGC</th>
                                <th>SGC</th>
                                <th>SGC</th>
                                <th>SGC</th>
                                <th></th>
                                <th></th>
                                <th>(necesidades y expectativas):</th>
                                <th></th>
                                <th>Parte de Interesada:</th>
                                <th>Apoyo:</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($comunicaciones as $cumunicacion)

                            <tr>
                                <td>{{$cumunicacion->parte}}</td>


                                @if (($cumunicacion->sga) == 1)
                                <th>X</th>
                                @else
                                <td></td>
                                @endif
                                @if (($cumunicacion->sgc) == 1)
                                <th>X</th>
                                @else
                                <td></td>
                                @endif
                                @if (($cumunicacion->sgscs) == 1)
                                <th>X</th>
                                @else
                                <td></td>
                                @endif
                                @if (($cumunicacion->sgsst) == 1)
                                <th>X</th>
                                @else
                                <td></td>
                                @endif
                                <td>{{$cumunicacion->asunto}}</td>
                                <td>{{$cumunicacion->mecanismo}}</td>
                                <td>{{$cumunicacion->detalle}}</td>
                                <td>{{$cumunicacion->frecuencia}}</td>
                                <td>{{$cumunicacion->interesada}}</td>
                                <td>{{$cumunicacion->apoyo}}</td>
                                <td>{{$cumunicacion->registros}}</td>


                                <td>
                                    
                                    <div class="form-row align-items-center">

                                        <a
                                            href="{{ URL::action('Apoyo\ComunicacionesController@edit',$cumunicacion->id_comunicaciones ) }}"><i
                                                class=" form-inline fas fa-pencil-alt fa-2x"
                                                style="color:#18A4B4;"></i></a>
                                        <form method="POST" 
                                            action="{{ url("comunicaciones/{$cumunicacion->id_comunicaciones}") }}" class="form-inline formulario-eliminar">
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
                    {{ $comunicaciones->links() }}
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
