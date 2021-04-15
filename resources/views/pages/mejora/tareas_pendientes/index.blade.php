@extends('layouts.dashboard')

@section('content')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Mejora</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Acta</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Mejora</a>
        </h4>
        <p class="mg-b-0">Acta</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')

   

        <h5 style="color: rgb(82, 82, 82)">Compromiso en las Actas </h5>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($consultas->isNotEmpty())

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Codigo Acta:</th>
                                <th>Nombre Acta</th>
                                <th>Acciones ó Actividad</th>
                                <th>Responsable</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Final</th>
                                <th>Estado</th>

                                <th >Opcion</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($consultas as $consulta)


                            <tr>
                                <td>{{$consulta->id_acta}}</td>
                                <td>{{$consulta->acta}}</td>
                                <td>{{$consulta->accion}}</td>
                                <td>{{$consulta->responsable}}</td>
                                <td>{{$consulta->fecha_inicio_acc}}</td>
                                <td>{{$consulta->fecha_final_acc}}</td>
                                @php
                                   $diferencia = ((strtotime($consulta->fecha_final_acc) - strtotime(date("Y-m-d") ))/86400);  
                                @endphp
                                @if ($diferencia >= 15)
                                <td style="background: #1d9612;    font-weight: 600;
                                color: white;"><center> {{ $diferencia  }}</center></td>
                               
                                @elseif ($diferencia >= 1)
                                <td style="background: #d3d616;    font-weight: 600;
                                color: #000;"><center> {{ $diferencia  }}</center></td>
                             
                                @elseif ($diferencia <= 0)
                                <td style="background: #d62916;    font-weight: 600;
                                color: white;"><center> {{ $diferencia  }}</center> </td>
                                @endif
                               
                               


                                <td>
                                    <div class=" form-row align-items-center">
                                       
                                        <a href="{{ URL::action('mejora\TareasPendiente@edit',$consulta->id_acta   ) }}"><i
                                                class=" form-inline fas fa-pencil-alt fa-2x"
                                                style="color:#18A4B4;"></i></a>

                                         
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
