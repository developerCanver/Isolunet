@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Liderazgo</a>
        <a class="breadcrumb-item" href="{{ URL::to('/parm_presupuesto') }}">Presupuesto</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Ingreso</span></a>
        
    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Presupuesto</h4>
    </div>
</div><!-- d-flex -->


@if (!empty($empresa_selecionada->id_empresa))

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')
        {{  Form::open(['action' => 'Liderazgo\IngresoController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <div class="row">
            <h4>Ingresos - {{$empresa_selecionada->razon_social}}</h4>
        </div><br>

        <input type="hidden" class="form-control" name="empresa" value="{{$empresa_selecionada->id_empresa}}">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong>ITEM:</strong></label>
                            <input type="text" class="form-control" name="nom_ingreso" placeholder="Digite nombre Ingreso" required>
                        </div>
                    </div>

                </div>
            </div>
           
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <div class="form-group">
                        <label><strong>2021 Proyecto:</strong></label>
                        <input type="number" class="form-control" name="proyectado_ingreso" required>

                    </div>
                </div>
            </div>
             <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <div class="form-group">
                        <label><strong>2021 Real:</strong></label>
                        <input type="number" class="form-control" name="real_ingreso"   value="0" required>

                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        {!!Form::close()!!}

        <br>
        <br>

        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($ingresos->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item </th>
                                <th> 2020 Proyectado</th>
                                <th>2020 Real</th>
                                <th> Total Diferencia</th>
                                <th>% Diferencia</th>
                                <th> Opciones</th>
                            </tr>
                        </thead>
                        @php
                            $tot_ingreso=0;
                            $ingreso_real=0;
                            $ingreso_total_diferencia=0;
                        
                        @endphp
                        <tbody>

                            @foreach ($ingresos as $ingreso)
                                     @php
                                    $tot_ingreso=$tot_ingreso+$ingreso->proyectado_ingreso;
                                    $ingreso_real=$ingreso_real+$ingreso->real_ingreso;
                                    $ingreso_total_diferencia=$ingreso_total_diferencia+$ingreso->total_diferencia_ingreso;
                                   
                                     @endphp
                            <tr>
                                <td>{{$ingreso->nom_ingreso}}</td>
                                <td> {{$ingreso->proyectado_ingreso}}</td>
                                <td> {{$ingreso->real_ingreso}} </td>
                                <td> {{$ingreso->total_diferencia_ingreso}}</td>
                                <td>{{$ingreso->diferencia_ingreso}}&nbsp;%</td>
                                
                                    <td>
                                        <a href="{{ URL::action('Liderazgo\IngresoController@edit',$ingreso->id_ingreso) }}"><i class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
                                        <a href="{{ URL::action('Liderazgo\IngresoController@destroy',$ingreso->id_ingreso) }}" ><i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
                                    </td>
                               
                            </tr>
                            @endforeach
                            <tr>
                                <td><B>TOTAL INGRESOS</b>  </td>
                                <td>{{$tot_ingreso}}</td>
                                <td>{{$ingreso_real}}</td>
                                <td>{{$ingreso_total_diferencia}}</td>
                               
                                @if ($tot_ingreso != 0)
                                <td>{{round(((($ingreso_real-$tot_ingreso)/$tot_ingreso)*100),0)}} &nbsp;%</td>
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
                            <p class="text-center m-3"> Ups! no hay registros 😥 para la empresa {{$empresa_selecionada->razon_social}}</p>
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
