@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <span class="breadcrumb-item active">Partes Interesadas</span>
    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Partes Interesadas</h4>
        <p class="mg-b-0"></p>
        @if ($rolUsuario==1)
            
        <a href="{{ URL::to('pi_calificaciones') }}" class="btn btn-primary btn-xs">Agregar Calificaciones</a>
        @endif
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors -> all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>

        <br>

        <div class="row">

            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <p>Criterio de calificación Impacto (Impacto en la capacidad de la organización para proporcionar
                    productos y servicios que cumplan los requisitos)</p>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <p>Criterio de calificación Influencia (Influencia en el desempeño o las decisiones de la organización,
                    influencia para crear riesgos y oportunidades, influencia en el mercado, influencia en la capacidad
                    para afectar la organización mediante sus decisiones o actividades)</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="table-responsive">
                    <p>IMPACTO</p>
                    <table class="table table-hover">
                        <thead style="background: #18A6B0; color: #FFFFFF;">
                            <tr>
                                <th>Calificación cuantitativa</th>
                                <th>Calificacion cualitativa</th>
                                <th>Descripcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($forminfluencia)
                            <tr>
                                <td>5</td>
                                <td>{{ $formimpacto->calcualitativa5 }}</td>
                                <td>{{ $formimpacto->descripcion5 }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>{{ $formimpacto->calcualitativa4 }}</td>
                                <td>{{ $formimpacto->descripcion4 }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>{{ $formimpacto->calcualitativa3 }}</td>
                                <td>{{ $formimpacto->descripcion3 }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>{{ $formimpacto->calcualitativa2 }}</td>
                                <td>{{ $formimpacto->descripcion2 }}</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>{{ $formimpacto->calcualitativa1 }}</td>
                                <td>{{ $formimpacto->descripcion1 }}</td>
                            </tr>
                            @else
                            <tr>
                                <td>No existen Datos</td>
                                
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="table-responsive">
                    <p>INFLUENCIA</p>
                    <table class="table table-hover">
                        <thead style="background: #18A6B0; color: #FFFFFF;">
                            <tr>
                                <th>Calificación cuantitativa</th>
                                <th>Calificacion cualitativa</th>
                                <th>Descripcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($forminfluencia)
                            <tr>
                                <td>1</td>
                                <td>{{ $forminfluencia->calcualitativa5 }}</td>
                                <td>{{ $forminfluencia->descripcion5 }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>{{ $forminfluencia->calcualitativa4 }}</td>
                                <td>{{ $forminfluencia->descripcion4 }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>{{ $forminfluencia->calcualitativa3 }}</td>
                                <td>{{ $forminfluencia->descripcion3 }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>{{ $forminfluencia->calcualitativa2 }}</td>
                                <td>{{ $forminfluencia->descripcion2 }}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>{{ $forminfluencia->calcualitativa1 }}</td>
                                <td>{{ $forminfluencia->descripcion1 }}</td>
                            </tr>
                            @else
                            <tr>
                                <td>No existen Datos</td>
                                
                            </tr>
                            @endif
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @livewire('contexto.partes-interesadas')
        <hr>

    </div>
</div>


@endsection


