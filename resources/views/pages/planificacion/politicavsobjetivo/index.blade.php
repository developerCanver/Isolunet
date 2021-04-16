@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Planificación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">políticas</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Objetivos VS Políticas</h4>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h4>poíticas agregadas</h4>
        <div class="row">
        </div><br>
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">

                    @if ($politicas->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>politicas</th>

                                <th> Opciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($politicas as $politica)

                            <tr>
                                <td>
                                    @php
                                    $poli=html_entity_decode($politica->politica);
                                    echo($poli);
                                    @endphp
                                </td>
                                <td>
                                    <a
                                        href="{{ URL::action('Planificacion\PoliticaVSObjetivosController@index',$politica->id_politica ) }}"><i
                                            title="Cargo que asume el Rol" class="fas fa-arrow-circle-right  fa-2x"
                                            style="color:#665ca7;"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
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
