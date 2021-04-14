@extends('layouts.dashboard')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{ URL::to('/seguimiento_medicion') }}">
                Seguimiento Medicion
            </a>

            <a class="nav-item nav-link" href="{{ URL::to('/encuesta_satisfaccion') }}">
                <h5><span class="badge badge-info">Encuesta satisfacción
                    </span></h5>
            </a>

        </div>
    </div>
</nav>

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Evaluación Desempeño</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Encuesta satisfacción</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Evaluación Desempeño</h4>
        <p class="mg-b-0">Encuesta satisfacción</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('encuesta_satisfaccion.store')}}" method="POST">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>
            <br><br>

            <input type="hidden" name="fk_empresa" class="form-control" value="{{$empresa->id_empresa}}">


            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Cliente (Nombre o Razón Social):</strong></label>
                        <input type="text" required name="cliente" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Quién Responde la Encuesta:</strong></label>
                        <input type="text" required name="quien" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Cargo:</strong></label>
                        <input type="text" required name="cargo" class="form-control">
                    </div>
                </div>
            </div>
            <br>
            <h5 style="color: rgb(60, 60, 60);">Su opinión nos importa</h5>
            <label><strong>¿Cuál es su opinión sobre los siguientes aspectos de nuestra gestión?:</strong></label>
            <br>

            <div class="row">
                <div class="col-md-6 col-s6 col-xs-1 col-lg-6">

                </div>
                <div class="col-1">
                    <div class="form-group">
                        <label><strong> <b style="color: #6a6a6a">Malo</b></strong></label>
                    </div>

                </div>
                <div class="col-1">
                    <div class="form-group">
                        <label><strong> <b style="color: #6a6a6a">Regular</b></strong></label>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <label><strong> <b style="color: #6a6a6a">Bueno</b></strong></label>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <label><strong> <b style="color: #6a6a6a">Muy Bueno</b></strong></label>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <label><strong> <b style="color: #6a6a6a">Excelente</b></strong></label>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    <label><strong> ¿Cómo evalúa la calidad de nuestros productos?</strong></label>

                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio"  name="calidad" value="Malo"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="calidad" value="Regular"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="calidad" value="Bueno"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="calidad" value="Muy Bueno"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" required name="calidad" value="Excelente"></center>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label><strong>Nivel con el cual nuestros servicios satisface sus necesidades</strong></label>

                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="nivel" value="Malo"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="nivel" value="Regular"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="nivel" value="Bueno"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="nivel" value="Muy Bueno"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" required name="nivel" value="Excelente"></center>
                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <label><strong>Tiempo de respuesta al pedido de cotización</strong></label>

                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="tiempo" value="Malo"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="tiempo" value="Regular"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="tiempo" value="Bueno"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="tiempo" value="Muy Bueno"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" required name="tiempo" value="Excelente"></center>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label><strong> Cumplimiento de los plazos de entrega</strong></label>

                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="plazos" value="Malo"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="plazos" value="Regular"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="plazos" value="Bueno"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="plazos" value="Muy Bueno"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" required name="plazos" value="Excelente"></center>
                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <label><strong>Calidad de atención y asesoramiento técnica comercial</strong></label>

                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="atencion" value="Malo"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="atencion" value="Regular"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="atencion" value="Bueno"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="atencion" value="Muy Bueno"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" required name="atencion" value="Excelente"></center>
                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <label><strong>Calidad de respuesta ante inconvenientes</strong></label>

                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="inconvenientes" value="Malo"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="inconvenientes" value="Regular"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="inconvenientes" value="Bueno"></center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" name="inconvenientes" value="Muy Bueno">
                    </center>
                </div>
                <div class="col-1">
                    <center><input class="form-check-input" type="radio" required name="inconvenientes" value="Excelente">
                    </center>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label><strong>¿Tiene alguna propuesta de mejora para sugerirnos? </strong></label>
                        <textarea name="propuesta" rows="3" cols="140" required="true"></textarea>
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
                        <th>Cliente </th>
                        <th>Quién Responde</th>
                        <th>Cargo</th>
                        <th title="¿Cómo evalúa la calidad de nuestros productos?">¿Cómo evalúa...</th>
                        <th title="Nivel con el cual nuestros servicios satisface sus necesidades">Nivel nuestros servicios...</th>
                        <th title="Tiempo de respuesta al pedido de cotización">Tiempo de respuesta...</th>
                        <th title="Cumplimiento de los plazos de entrega">Cumplimiento entrega...</th>
                        <th title="Calidad de atención y asesoramiento técnica comercial">Calidad asesoramiento...</th>
                        <th title="Calidad de respuesta ante inconvenientes">Calidad de respuesta...</th>
                        <th>Propuesta </th>


                        <td style="color: #FF0024"><b>Opciones</b></td>
                    </tr>
                    @foreach ($consultas as $consulta)


                    <tr>
                        <td>{{ $consulta->cliente }}</td>
                        <td>{{ $consulta->quien }}</td>
                        <td>{{ $consulta->cargo }}</td>
                        <td>{{ $consulta->calidad }}</td>
                        <td>{{ $consulta->nivel }}</td>
                        <td>{{ $consulta->tiempo }}</td>
                        <td>{{ $consulta->plazos }}</td>
                        <td>{{ $consulta->atencion }}</td>
                        <td>{{ $consulta->inconvenientes }}</td>
                        <td>{{ $consulta->propuesta }}</td>
                        <td>
                            <div class="form-row align-items-center">
                                <a data-toggle="modal" data-target="#myModal-{{ $consulta->id_encuesta }}"
                                    style="color: #18A4B4" title="Editar"><i class="fas fa-pencil-alt fa-2x"></i></a>

                                <form action="{{route('encuesta_satisfaccion.destroy', $consulta->id_encuesta)}}"
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
                        aria-labelledby="myLargeModalLabel" id="myModal-{{ $consulta->id_encuesta }}">
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


                                    <form action="{{ route('encuesta_satisfaccion.update', $consulta->id_encuesta)}}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    <label><strong>Cliente (Nombre o Razón Social):</strong></label>
                                                    <input type="text" required name="cliente" class="form-control" value="{{ $consulta->cliente}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    <label><strong>Quién Responde la Encuesta:</strong></label>
                                                    <input type="text" required name="quien" class="form-control"  value="{{ $consulta->quien}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    <label><strong>Cargo:</strong></label>
                                                    <input type="text" required name="cargo" class="form-control" value="{{ $consulta->cargo}}">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <h5 style="color: rgb(60, 60, 60);">Su opinión nos importa</h5>
                                        <label><strong>¿Cuál es su opinión sobre los siguientes aspectos de nuestra gestión?:</strong></label>
                                        <br>
                                        <br>
                            
                                        <div class="row">
                                            <div class="col-md-6 col-s6 col-xs-1 col-lg-6">
                            
                                            </div>
                                            <div class="col-1">
                                                <div class="form-group">
                                                    <label><strong> <b style="color: #6a6a6a">Malo</b></strong></label>
                                                </div>
                            
                                            </div>
                                            <div class="col-1">
                                                <div class="form-group">
                                                    <label><strong> <b style="color: #6a6a6a">Regular</b></strong></label>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="form-group">
                                                    <label><strong> <b style="color: #6a6a6a">Bueno</b></strong></label>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="form-group">
                                                    <label><strong> <b style="color: #6a6a6a">Muy Bueno</b></strong></label>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="form-group">
                                                    <label><strong> <b style="color: #6a6a6a">Excelente</b></strong></label>
                                                </div>
                                            </div>
                            
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label><strong> ¿Cómo evalúa la calidad de nuestros productos?</strong></label>
                            
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->calidad== 'Malo')
                                                <center><input class="form-check-input" type="radio" checked name="calidad" value="Malo"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio"  name="calidad" value="Malo"></center>
                                                @endif
                                                
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->calidad== 'Regular')
                                                <center><input class="form-check-input" type="radio" checked name="calidad" value="Regular"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" name="calidad" value="Regular"></center>
                                                @endif
                                               
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->calidad== 'Bueno')
                                                <center><input class="form-check-input" type="radio" checked name="calidad" value="Bueno"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" name="calidad" value="Bueno"></center>
                                                @endif
                                               
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->calidad== 'Muy Bueno')
                                                <center><input class="form-check-input" type="radio" checked name="calidad" value="Muy Bueno"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" name="calidad" value="Muy Bueno"></center>
                                                @endif
                                           
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->calidad== 'Excelente')
                                                <center><input class="form-check-input" type="radio" required checked name="calidad" value="Excelente"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" required name="calidad" value="Excelente"></center>
                                                @endif
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label><strong>Nivel con el cual nuestros servicios satisface sus necesidades</strong></label>
                            
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->nivel== 'Malo')
                                                <center><input class="form-check-input" type="radio" checked name="nivel" value="Malo"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" name="nivel" value="Malo"></center>
                                                @endif
                                               
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->nivel== 'Regular')
                                                <center><input class="form-check-input" type="radio" checked name="nivel" value="Regular"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" name="nivel" value="Regular"></center>
                                                @endif
                                          
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->nivel== 'Bueno')
                                                <center><input class="form-check-input" type="radio" checked name="nivel" value="Bueno"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" name="nivel" value="Bueno"></center>
                                                @endif
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->nivel== 'Muy Bueno')
                                                <center><input class="form-check-input" type="radio" checked name="nivel" value="Muy Bueno"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" name="nivel" value="Muy Bueno"></center>
                                                @endif

                                             
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->nivel== 'Excelente')
                                                <center><input class="form-check-input" type="radio" required checked name="nivel" value="Excelente"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" required name="nivel" value="Excelente"></center>
                                                @endif

                                            </div>
                                        </div>
                            
                            
                                        <div class="row">
                                            <div class="col-6">
                                                <label><strong>Tiempo de respuesta al pedido de cotización</strong></label>
                            
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->tiempo== 'Malo')
                                                <center><input class="form-check-input" type="radio" checked name="tiempo" value="Malo"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" name="tiempo" value="Malo"></center>
                                                @endif

                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->tiempo== 'Regular')
                                                <center><input class="form-check-input" type="radio" checked name="tiempo" value="Regular"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" name="tiempo" value="Regular"></center>
                                                @endif
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->tiempo== 'Bueno')
                                                <center><input class="form-check-input" type="radio" checked name="tiempo" value="Bueno"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" name="tiempo" value="Bueno"></center>
                                                @endif

                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->tiempo== 'Muy Bueno')
                                                <center><input class="form-check-input" type="radio" checked name="tiempo" value="Muy Bueno"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" name="tiempo" value="Muy Bueno"></center>
                                                @endif

                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->tiempo== 'Excelente')
                                                <center><input class="form-check-input" type="radio" required checked name="tiempo" value="Excelente"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" required name="tiempo" value="Excelente"></center>
                                                @endif

                                            </div>
                                        </div>
                            
                                        <div class="row">
                                            <div class="col-6">
                                                <label><strong> Cumplimiento de los plazos de entrega</strong></label>
                            
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->plazos== 'Malo')
                                                <center><input class="form-check-input" type="radio"  checked name="plazos" value="Malo"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio"  name="plazos" value="Malo"></center>
                                                @endif

                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->plazos== 'Regular')
                                                <center><input class="form-check-input" type="radio"  checked name="plazos" value="Regular"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio"  name="plazos" value="Regular"></center>
                                                @endif

                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->plazos== 'Bueno')
                                                <center><input class="form-check-input" type="radio"  checked name="plazos" value="Bueno"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio"  name="plazos" value="Bueno"></center>
                                                @endif
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->plazos== 'Muy Bueno')
                                                <center><input class="form-check-input" type="radio"  checked name="plazos" value="Muy Bueno"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio"  name="plazos" value="Muy Bueno"></center>
                                                @endif

                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->plazos== 'Excelente')
                                                <center><input class="form-check-input" type="radio" required checked name="plazos" value="Excelente"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" required  name="plazos" value="Excelente"></center>
                                                @endif

                                            </div>
                                        </div>
                            
                            
                                        <div class="row">
                                            <div class="col-6">
                                                <label><strong>Calidad de atención y asesoramiento técnica comercial</strong></label>
                            
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->atencion== 'Malo')
                                                <center><input class="form-check-input" type="radio"  checked name="atencion" value="Malo"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio"   name="atencion" value="Malo"></center>
                                                @endif
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->atencion== 'Regular')
                                                <center><input class="form-check-input" type="radio"  checked name="atencion" value="Regular"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio"   name="atencion" value="Regular"></center>
                                                @endif
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->atencion== 'Bueno')
                                                <center><input class="form-check-input" type="radio"  checked name="atencion" value="Bueno"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio"   name="atencion" value="Bueno"></center>
                                                @endif

                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->atencion== 'Muy Bueno')
                                                <center><input class="form-check-input" type="radio"  checked name="atencion" value="Muy Bueno"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio"   name="atencion" value="Muy Bueno"></center>
                                                @endif
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->atencion== 'Excelente')
                                                <center><input class="form-check-input" type="radio" required checked name="atencion" value="Excelente"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" required  name="atencion" value="Excelente"></center>
                                                @endif

                                            </div>
                                        </div>
                            
                            
                                        <div class="row">
                                            <div class="col-6">
                                                <label><strong>Calidad de respuesta ante inconvenientes</strong></label>
                            
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->inconvenientes== 'Malo')
                                                <center><input class="form-check-input" type="radio" required checked name="inconvenientes" value="Malo"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio" required  name="inconvenientes" value="Malo"></center>
                                                @endif

                                              
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->inconvenientes== 'Regular')
                                                <center><input class="form-check-input" type="radio"  checked name="inconvenientes" value="Regular"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio"   name="inconvenientes" value="Regular"></center>
                                                @endif
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->inconvenientes== 'Bueno')
                                                <center><input class="form-check-input" type="radio"  checked name="inconvenientes" value="Bueno"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio"   name="inconvenientes" value="Bueno"></center>
                                                @endif

                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->inconvenientes== 'Muy Bueno')
                                                <center><input class="form-check-input" type="radio"  checked name="inconvenientes" value="Muy Bueno"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio"   name="inconvenientes" value="Muy Bueno"></center>
                                                @endif

                                             
                                            </div>
                                            <div class="col-1">
                                                @if ($consulta->inconvenientes== 'Excelente')
                                                <center><input class="form-check-input" type="radio"  checked name="inconvenientes" value="Excelente"></center>
                                                  @else  
                                                  <center><input class="form-check-input" type="radio"   name="inconvenientes" value="Excelente"></center>
                                                @endif

                                               
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                            
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                                <div class="form-group">
                                                    <label><strong>¿Tiene alguna propuesta de mejora para sugerirnos? </strong></label>
                                                    <textarea name="propuesta" rows="3" cols="90" required="true">{{$consulta->propuesta}}</textarea>
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
