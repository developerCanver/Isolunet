@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Planificación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">planificación de cambio</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Planificación de Cambio</h4>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')

        {{  Form::open(['action' => 'Planificacion\PoliticaVSObjetivosController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <h4> </h4>
        <label><strong>Identificación y análisis del cambio </strong></label>
        <div class="row">

            <input type="hidden" class="form-control" name="fk_politica" value="{{$fk_politica}}">

        </div><br><br>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong> Política Integrada:</strong></label>
                            <input type="text" name="integrada" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong>Directrices Política Integrada:</strong></label>
                            <input type="text" name="directrices" class="form-control" required>
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
                            <label><strong>Objetivos:</strong></label>
                            <input type="text" name="nom_objetivos" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong>Indicador:</strong></label>
                            <input type="text" name="indicador" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Unidad:</strong></label>
                    <input type="text" name="unidad" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Frecuencia:</strong></label>
                    <input type="text" name="frecuencia" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Mejor hacia:</strong></label>
                    <input type="text" name="mejor" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Meta Indicador:</strong></label>
                    <input type="text" name="meta" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Proceso:</strong></label>
                    <select name="fk_proceso" class="form-control select2" required>
                        @foreach ($procesos as $proceso)
                        <option value="{{ $proceso->id_proceso  }}">{{ $proceso->nom_proceso }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Actividades Objetivos:</strong></label>
                    <input type="text" name="actividad" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Recursos:</strong></label>
                    <input type="text" name="recurso" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Responsable:</strong></label>
                    <select name="fk_cargo" class="form-control select2" required>
                        @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->id_cargo  }}">{{ $cargo->nom_cargo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Fecha Finalización:</strong></label>
                    <input type="date" name="fecha_finilizacion" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Evaluación Resultados:</strong></label>
                    <input type="text" name="evaluacion" class="form-control" required>
                </div>
            </div>
        </div>



        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        {!!Form::close()!!}
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($politicas->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Política Integrada:</th>
                                <th>Directrices Política Integrada:</th>
                                <th>Objetivos</th>
                                <th>Indicador</th>
                                <th>Unidad</th>
                                <th>frecuencia</th>
                                <th>Mejor hacia:</th>
                                <th>Meta Indicador:</th>
                                <th>Proceso:</th>
                                <th>Actividades Objetivos:</th>
                                <th>Recursos:</th>
                                <th>Responsable:</th>
                                <th>Fecha Finalización:</th>
                                <th>Evaluación Resultados::</th>



                                <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($politicas as $politica)

                            <tr>
                                <td>{{$politica->integrada}}</td>
                                <td>{{$politica->directrices}}</td>
                                <td>{{$politica->nom_objetivos}}</td>
                                <td>{{$politica->indicador}}</td>
                                <td>{{$politica->unidad}}</td>
                                <td>{{$politica->frecuencia}}</td>
                                <td>{{$politica->mejor}}</td>
                                <td>{{$politica->meta}}</td>
                                <td>{{$politica->nom_proceso}}</td>
                                <td>{{$politica->actividad}}</td>
                                <td>{{$politica->recurso}}</td>
                                <td>{{$politica->nom_cargo}}</td>
                                <td>{{$politica->fecha_finilizacion}}</td>
                                <td>{{$politica->evaluacion}}</td>



                                <td>
                                    <a
                                        href="{{ URL::action('Planificacion\PoliticaVSObjetivosController@edit',$politica->id_politica_objetivo) }}"><i
                                            class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
                                    <a
                                        href="{{ URL::action('Planificacion\PoliticaVSObjetivosController@destroy',$politica->id_politica_objetivo) }}"><i
                                            class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $politicas->links() }}
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
