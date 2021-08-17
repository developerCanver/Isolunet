@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Liderazgo</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Presupuesto</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Presupuesto</h4>
    </div>
</div><!-- d-flex -->
<div class="container-fluid h-100">
    <div class="row w-100 align-items-center">
        <div class="col text-center">

        </div>
    </div>


</div>

        @php
        $tot_ingreso=0;
        $ingreso_real=0;
        $ingreso_total_diferencia=0;
        $ingreso_diferencia=0;
        $tot_egreso=0;
        $egreso_real=0;
        $egreso_total_diferencia=0;
        $egreso_diferencia=0;
        @endphp

@if (!empty($id_empresa))

<div class="br-pagebody">
    <div class="br-section-wrapper">


        <div class="row">

            <a href="{{ URL::to("/ingreso/{$id_empresa}") }}" class="btn btn-outline-info">Ingresos -
                {{$empresa_selecionada->razon_social}} <i class="fas fa-plus-circle"></i></a>

        </div><br>

        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($ingresos->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item </th>
                                <th> 2021 Proyectado</th>
                                <th>2021 Real</th>
                                <th> Total Diferencia</th>
                                <th>% De Cumplimiento</th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($ingresos as $ingreso)
                            @php
                            $tot_ingreso=$tot_ingreso+$ingreso->proyectado_ingreso;
                            $ingreso_real=$ingreso_real+$ingreso->real_ingreso;
                            $ingreso_total_diferencia=$ingreso_total_diferencia+$ingreso->total_diferencia_ingreso;
                            $ingreso_diferencia=$ingreso_diferencia+$ingreso->diferencia_ingreso;
                            @endphp
                            <tr>
                                <td>{{$ingreso->nom_ingreso}}</td>
                                <td>$ {{number_format($ingreso->proyectado_ingreso)}}</td>
                                <td>$ {{number_format($ingreso->real_ingreso)}} </td>
                                <td>$ {{number_format($ingreso->total_diferencia_ingreso)}}</td>
                                <td>{{($ingreso->diferencia_ingreso)*-1}} %</td>


                            </tr>
                            @endforeach
                            <tr>
                                <td><B>TOTAL INGRESOS</b> </td>
                                <td>$ {{number_format($tot_ingreso)}}</td>
                                <td>$ {{number_format($ingreso_real)}}</td>
                                <td>{{number_format($ingreso_total_diferencia)}}</td>
                                @if ($tot_ingreso != 0)
                                @php
                                    $tot_dif_ingreso=round(((($ingreso_real-$tot_ingreso)/$tot_ingreso)*100),0);
                                @endphp
                                <td>{{($tot_dif_ingreso)*-1}} &nbsp;%</td>
                                @else
                                <td>#Ref</td>
                                @endif


                            </tr>
                        </tbody>
                    </table>
                    @else
                    <br><br>
                    <div class="container m-5">
                        <div class="alert alert-primary" role="alert">
                            <p class="text-center m-3"> Ups! no hay registros 😥 para la empresa
                                {{$empresa_selecionada->razon_social}}</p>
                        </div>
                    </div>
                    <br><br>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="br-pagebody">

    <div class="br-section-wrapper">

        <div class="row">
            <a href="{{ URL::to("/egreso/{$id_empresa}") }}" class="btn btn-outline-info">Egresos -
                {{$empresa_selecionada->razon_social}} <i class="fas fa-plus-circle"></i></a>

        </div><br>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($egresos->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Item</th>
                                <th> 2021 Proyectado</th>
                                <th>2021 Real</th>
                                <th> Total Diferencia</th>
                                <th>% De Cumplimiento</th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($egresos as $egreso)
                            @php
                            $tot_egreso=$tot_egreso+$egreso->proyectado_egreso;
                            $egreso_real=$egreso_real+$egreso->real_egreso;
                            $egreso_total_diferencia=$egreso_total_diferencia+$egreso->total_diferencia_egreso;
                            $egreso_diferencia=$egreso_diferencia+$egreso->diferencia_egreso;
                            @endphp
                            <tr>
                                <td>{{$egreso->nom_egreso}}</td>
                                <td>$ {{number_format($egreso->proyectado_egreso)}}</td>
                                <td>$ {{number_format($egreso->real_egreso)}} </td>
                                <td>$ {{number_format($egreso->total_diferencia_egreso)}} </td>
                                <td>{{$egreso->diferencia_egreso}} %</td>

                            </tr>
                            @endforeach
                            <tr>
                                <td> <B>TOTAL EGRESOS</b></td>
                                <td>$ {{number_format($tot_egreso)}}</td>
                                <td>$ {{number_format($egreso_real)}}</td>
                                <td>$ {{number_format($egreso_total_diferencia)}} </td>
                                @if ($tot_egreso != 0)
                                @php
                                $tot_dif_egreso=round(((($egreso_real-$tot_egreso)/$tot_egreso)*100),0);
                            @endphp

                                <td>{{$tot_dif_egreso}} &nbsp;%</td>
                                @else
                                <td>#Ref</td>
                                @endif

                            </tr>
                        </tbody>
                    </table>
                    @else

                    <br><br>
                    <div class="container m-5">
                        <div class="alert alert-primary" role="alert">
                            <p class="text-center m-3"> Ups! no hay registros 😥 para la empresa
                                {{$empresa_selecionada->razon_social}}</p>
                        </div>
                    </div>
                    <br><br>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">
        <div class="row">
            <h4>Ingresos - Egresos de {{$empresa_selecionada->razon_social}}</h4>

        </div><br>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ( !empty($tot_ingreso) && !empty($tot_egreso))
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Total 2021 Proyectado
                                </th>
                                <th>
                                    Total 2021 Real
                                </th>
                                <th>
                                    Total Diferencia
                                </th>
                                <th>
                                    Total % Diferencia
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    {{number_format($tot_ingreso-$tot_egreso)}}
                                </td>
                                <td>
                                    {{number_format($ingreso_real-$egreso_real)}}
                                </td>
                                <td>
                                    {{number_format($ingreso_total_diferencia-$egreso_total_diferencia)}}
                                </td>
                                <td>
                                    {{($tot_dif_ingreso-$tot_dif_egreso)}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    {{-- <table>

                        <thead>
                            <tr>
                                <th colspan="2">
                                    % de Cumplimiento del Presupuesto
                                </th>
                                <th colspan="2">
                                    % de Utilidad
                                </th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr>
                                <td colspan="2">
                                    {{round(((($egreso_real/$tot_egreso)*100)),1)}}
                                </td>
                                <td colspan="2">
                                    @if (($ingreso_real-$egreso_real)!=0)
                                    {{round(((($ingreso_real-$egreso_real)/($ingreso_real))*100),1)}}
                                    @endif


                                </td>
                            </tr>
                        </tbody>
                    </table> --}}
                    @else
                    <br><br>
                    <div class="container m-5">
                        <div class="alert alert-primary" role="alert">
                            <p class="text-center m-3"> Ups! no hay registros. INGRESOS y EGRESOS para la empresa
                                {{$empresa_selecionada->razon_social}}</p>
                        </div>
                    </div>
                    <br><br>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> 

@endif

@endsection
