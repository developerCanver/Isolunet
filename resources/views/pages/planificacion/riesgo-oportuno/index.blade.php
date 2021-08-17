@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Liderazgo</a>
        <a class="breadcrumb-item" href="{{ URL::to('/matriz_riesgos') }}">Matriz y Riesgos</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Causas</span></a>
    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Causas</h4>
    </div>
</div><!-- d-flex -->


<div class="br-pagebody">
    @include('partials.message_flash')
    <div class="br-section-wrapper">
        {{  Form::open(['action' => 'Planificacion\RiesgosOportunoController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}


        <h4 style="color: #414141;"> Causa - {{$causa->nom_proceso}}</h4>
        <label><strong>¿Qué podría pasar que afecte el objetivo del proceso?</strong></label>
        <div class="row">
            {{-- <input type="hidden" class="form-control" name="empresa" value="{{$empresa_selecionada->id_empresa}}">
            --}}
            <input type="hidden" class="form-control" name="fk_riesgo" value="{{$fk_riesgo}}">

        </div><br><br>


        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos"><strong>Efectos negativos:</strong></label>
                    <input type="text" required class="form-control" name="nom_negativo">
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos"><strong>Efectos positivos:</strong></label>
                    <input type="text" required class="form-control" name="nom_posivito">
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Riesgo negativo:</strong></label>
                    <input type="text" required class="form-control" name="nom_riesgo" required>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label><strong>Probabilidad:</strong></label>
                    <select name="probabilidad" required class="form-control select2" required>
                        <option value="">Seleccionar</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label><strong>Impacto :</strong></label>
                    <select name="impacto" required class="form-control select2" required>
                        <option value="">Seleccionar</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label for="datos"><strong>Control:</strong></label>
                    <input type="text" required name="control" class="form-control">
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label for="datos"><strong>Fecha Evaluación:</strong></label>
                    <input type="date" required name="fechaEvaluacion" class="form-control" value="{{date('Y-m-d')}}">
                </div>
            </div>
        </div>
        <h4><label for="datos">Reevaluación</label></h4>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Probabilidad:</strong></label>
                    <select name="ree_probabilidad" required class="form-control select2">
                        <option value="">Seleccionar</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Impacto :</strong></label>
                    <select name="ree_impacto" required class="form-control select2">
                        <option value="">Seleccionar</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos"><strong>Acciones:</strong></label>
                    <input type="text" required name="nom_accion" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos"><strong>Responsable:</strong></label>
                    <input type="text" required name="nom_responsable" class="form-control">
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label for="datos"><strong>Indicador:</strong></label>
                    <input type="text" required name="nom_indicador" class="form-control">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                <div class="form-group">
                    <label for="datos"><strong>Fecha Reevaluación:</strong></label>
                    <input type="date" required name="fechaReevaluacion" class="form-control" value="{{date('Y-m-d')}}">
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label for="datos">Archivo</label>
                    <input type="file" class="form-control" name="archivo">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        {!!Form::close()!!}

        <br><br>
        <div class="card ">
            <div class="card-header">
            Gestión de Riesgos
            </div>
            <div class="card-body">
                <h6 class="card-title"> Proceso {{$causa->nom_proceso}}</h6>


                <p class="card-text"> Causa {{$causa->nom_causa}}</p>

            </div>

        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($riesgos->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <td colspan="2">
                                    <label><strong>Riesgo u oportunidad:</strong></label>
                                </td>
                                <td>
                                    <label><strong>Consecuencia negativo:</strong></label>
                                </td>
                                <td colspan="2">
                                    <label><strong>Calificación:</strong></label>
                                </td>
                                <td colspan="4">
                                    <label><strong>Evaluación:</strong></label>
                                </td>
                                <th colspan="2">
                                    Opciones
                                </th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($riesgos as $riesgo)
                            @php
                            $mul=($riesgo->probabilidad)*($riesgo->impacto);
                            $mulDos=($riesgo->ree_probabilidad)*($riesgo->ree_impacto);
                            @endphp
                            <tr>
                                <th style="background: #e8e1e1"> Recha Evaluación</th>
                                <th style="background: #e8e1e1"> Efectos negativos (Riesgo)</th>
                                <th style="background: #e8e1e1"> Efectos positivos (Oportunidad)</th>
                                <th style="background: #e8e1e1"> Riesgo negativo</th>
                                <th style="background: #e8e1e1"> Probabilidad</th>
                                <th style="background: #e8e1e1"> Impacto</th>
                                <th style="background: #e8e1e1">Puntaje </th>
                                <th style="background: #e8e1e1">Calificación </th>
                                <th style="background: #e8e1e1">Controles</th>
                                <th colspan="2" style="background: #e8e1e1">Acciones</th>

                              

                            </tr>

                            <tr>
                                <td>{{$riesgo->fechaEvaluacion}}</td>
                                <td>{{$riesgo->nom_negativo}}</td>
                                <td>{{$riesgo->nom_posivito}}</td>
                                <td>{{$riesgo->nom_riesgo}}</td>
                                <td>{{$riesgo->probabilidad}}</td>
                                <td>{{$riesgo->impacto}}</td>
                                <td>{{$mul}}</td>


                                @if ($mul==9)
                                <td style="background: #C10000;color: aliceblue;">E</td>
                                @else
                                @if ($mul<=2) <td style="background: #209209; color: aliceblue;">B</td>
                                    @else
                                    @if ($mul==6)
                                    <td style="background: #f4fd46;color: rgb(5, 5, 5);">A</td>
                                    @else
                                    @if ($mul<=3) <td style="background: #cec4c4;color: rgb(41, 42, 43);">M</td>
                                        @endif
                                        @if ($mul>=4)
                                        <td style="background: #cec4c4;color: rgb(41, 42, 43);">M</td>
                                        @endif
                                        @endif
                                        @endif

                                        @endif
                                        <td>{{$riesgo->control}}</td>
                                       
                                        <td>
                                            <a
                                                href="{{ URL::action('Planificacion\RiesgosOportunoController@editar',$riesgo->id_riesgo_opurtuno ) }}"><i
                                                    class="fas fa-pencil-alt " style="color:#18A4B4;"></i></a>
                                        </td>
                                        <td>
                                            <a
                                                href="{{ URL::action('Planificacion\RiesgosOportunoController@destroy',$riesgo->id_riesgo_opurtuno ) }}"><i
                                                    class="fas fa-trash-alt " style="color:#C10000;"></i></a>
                                        </td>
                                        {{-- <td>
                                         <a href="{{ URL::action('Planificacion\RiesgosOportunoReeController@reeeriesgo',$riesgo->id_riesgo_opurtuno ) }}"><i
                                            title="Cargo que asume el Rol" class="fas fa-arrow-circle-right  "
                                            style="color:#665ca7;"></i></a>
                                        </td> --}}
                            </tr>
                            <tr>

                                <th> Fecha Reevaluación</th>
                                <th> Nueva Probabilidad</th>
                                <th> Nuevo Impacto</th>
                                <th colspan="2"> Evaluación riesgo nueva</th>
                                <th> Opciones de Manejo</th>
                                <th>Accion </th>
                                <th>Responsable </th>
                                <th>Indicador </th>
                                <th>Archivo</th>

                            </tr>
                            <tr>

                                <td>{{$riesgo->fechaReevaluacion}}</td>
                                <td>{{$riesgo->ree_probabilidad}}</td>
                                <td>{{$riesgo->ree_impacto}}</td>
                                <td>{{$mulDos}}</td>
                                @if ($mulDos==9)
                                <td style="background: #C10000;color: aliceblue;">E</td>
                                @else
                                @if ($mulDos<=2) <td style="background: #209209; color: aliceblue;">B</td>
                                    @else
                                    @if ($mulDos==6)
                                    <td style="background: #f4fd46;color: rgb(5, 5, 5);">A</td>
                                    @else
                                    @if ($mulDos<=3) <td style="background: #cec4c4;color: rgb(41, 42, 43);">M</td>
                                        @endif
                                        @if ($mulDos>=4)
                                        <td style="background: #cec4c4;color: rgb(41, 42, 43);">M</td>
                                        @endif
                                        @endif
                                        @endif

                                        @endif
                                        <td>@if ($mulDos==9)
                                            Reducir el riesgo,evitar,compartir o transferir
                                            @else
                                            @if ($mulDos<=2) Tolerar o Asumir el riesgo @else @if ($mulDos==6) Reducir
                                                el riesgo,evitar,compartir o transferir @else @if ($mulDos<=3) Asumir el
                                                riesgo, @endif @if ($mulDos>=4)
                                                Asumir el riesgo,
                                                @endif
                                                @endif
                                                @endif

                                                @endif</td>
                                        <td>{{$riesgo->nom_accion}}</td>
                                        <td>{{$riesgo->nom_responsable}}</td>
                                        <td>{{$riesgo->nom_indicador}}</td>

                                        @if ($riesgo->archivo)
                                        <td style="background: #f9faf9;">
                                            <a title="Descargar {{substr(($riesgo->archivo), 10)}}" href="/archivos/planificacion/{{$riesgo->archivo}}"
                                                class="btn btn-light" download="{{$riesgo->archivo}}"
                                                style="color: rgb(53, 87, 53); font-size:25px; "> <i
                                                class=" fas fa-file-download "></i></a></td>
                                        @else
                                        <td ><span class="badge badge-warning">No existe</span></td>
                                        @endif

                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    {{ $riesgos->links() }}
                    @else

                    <br><br>
                    <div class="container m-5">
                        <div class="alert alert-primary" role="alert">
                            <p class="text-center m-3"> Ups! no hay registros 😥 </p>
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
