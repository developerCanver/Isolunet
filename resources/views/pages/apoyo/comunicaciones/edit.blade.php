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
                <p class="mg-b-0">Editar Comunicaciones</p>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">

        <form action="{{route('comunicaciones.update',$comunicacion->id_comunicaciones )}}" method="POST">
            @csrf
            @method('PUT')

            <h4> </h4>
            <div class="row">
                {{-- <input type="hidden" name="fk_empresa" value="{{$empresa->id_empresa}}"> --}}
            </div><br><br>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong> Parte Interesada:</strong></label>
                                <input type="text" name="parte" class="form-control" required
                                    value="{{$comunicacion->parte}}">
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
                                    @if ($comunicacion->sgc == 1)
                                    <input type="checkbox" name="sgc" id="cambio_externo" value="1" checked>
                                    @else
                                    <input type="checkbox" name="sgc" id="cambio_externo" value="1">
                                    @endif
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
                                    @if ($comunicacion->sga == 1)
                                    <input type="checkbox" name="sga" id="cambio_externo" value="1" checked>
                                    @else
                                    <input type="checkbox" name="sga" id="cambio_externo" value="1">
                                    @endif
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
                                    @if ($comunicacion->sgscs == 1)
                                    <input type="checkbox" name="sgscs" id="cambio_externo" value="1" checked>
                                    @else
                                    <input type="checkbox" name="sgscs" id="cambio_externo" value="1">
                                    @endif
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
                                    @if ($comunicacion->sgsst == 1)
                                    <input type="checkbox" name="sgsst" id="cambio_externo" value="1" checked>
                                    @else
                                    <input type="checkbox" name="sgsst" id="cambio_externo" value="1">
                                    @endif

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
                                <input type="text" name="asunto" class="form-control" value="{{$comunicacion->asunto}}"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong>Mecanismos y Medios:</strong></label>
                                <input type="text" class="form-control" name="mecanismo"
                                    value="{{$comunicacion->mecanismo}}" required>
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
                        <textarea name="detalle" rows="3" cols="140"
                            required="true">{{$comunicacion->detalle}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong>Frecuencia:</strong></label>
                                <input type="text" name="frecuencia" class="form-control"
                                    value="{{$comunicacion->frecuencia}}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong>Interlocutor de la Parte de Interesada:</strong></label>
                                <input type="text" class="form-control" name="interesada"
                                    value="{{$comunicacion->interesada}}" required>
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
                                <input type="text" name="apoyo" class="form-control" value="{{$comunicacion->apoyo}}"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong>Registros Relacionados:</strong></label>
                                <input type="text" class="form-control" name="registros"
                                    value="{{$comunicacion->parte}}" registros>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>
        <br>
    </div>
</div>



@endsection
