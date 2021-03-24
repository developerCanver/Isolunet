@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="#">Liderazgo</a>
        <span class="breadcrumb-item active">Presupuesto</span>
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
<div class="br-pagebody">
    {{  Form::open(['action' => 'Liderazgo\IngresoEgresoController@getEmpresa','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
    {!! Form::token() !!}

    <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
            <h4>Seleccione Empresa</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
            <div class="form-group">
                <select id="empresa" name="empresa" class="form-control select2" required>
                @if (empty($id_empresa))
                    @foreach ($empresas as $empresa)
                    <option value="{{ $empresa->id_empresa }}" selected>{{ $empresa->razon_social }}</option>
                    @endforeach
                @else
                    @foreach ($empresas as $empresa)
                    <option value="{{ $empresa->id_empresa }}"
                        {{ $empresa->id_empresa == $id_empresa ? 'selected' : '' }}>
                        {{ $empresa->razon_social }}</option>
                    @endforeach
                    
                @endif
            </select>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">

            <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Buscar </button>
            @if (empty($id_empresa))
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
            @endif

        </div>
        <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
        </div>

    </div>

    {!!Form::close()!!}

    <br>
</div>
@if (!empty($id_empresa))

<div class="br-pagebody">
    <div class="br-section-wrapper">
        {{  Form::open(['action' => 'Liderazgo\IngresoController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <div class="row">
            <h4>Ingresos - {{$empresa_selecionada->razon_social}}</h4>
        </div><br>

        <input type="hidden" class="form-control" name="empresa" value="{{$id_empresa}}">
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
                        <label><strong>2021 Real:</strong></label>
                        <input type="number" class="form-control" name="real_ingreso"   required>

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
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>

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
                            $ingreso_diferencia=0;
                            $tot_egreso=0;
                            $egreso_real=0;
                            $egreso_total_diferencia=0;
                            $egreso_diferencia=0;
                        @endphp
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
                                <td> {{$ingreso->proyectado_ingreso}}</td>
                                <td> {{$ingreso->real_ingreso}} </td>
                                <td> {{$ingreso->total_diferencia_ingreso}}</td>
                                <td>{{$ingreso->diferencia_ingreso}}</td>
                                
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
                                <td>{{$ingreso_diferencia}}</td>
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

<div class="br-pagebody">
    @if ($ingresos->isNotEmpty())
    <div class="br-section-wrapper">
        {{  Form::open(['action' => 'Liderazgo\EgresoController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <input type="hidden" class="form-control" name="empresa" value="{{$id_empresa}}">
        <div class="row">
            <h4>Egresos - {{$empresa_selecionada->razon_social}}</h4>
           
        </div><br>

        <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong>ITEM:</strong></label>
                            <input type="text" class="form-control" name="nom_egreso" placeholder="Digite nombre Egreso" required>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <div class="form-group">
                        <label><strong>2021 Real:</strong></label>
                        <input type="text" class="form-control" name="real_egreso" required>

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <div class="form-group">
                        <label><strong>2021 Proyecto:</strong></label>
                        <input type="text" class="form-control" name="proyectado_egreso" required>

                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        {!!Form::close()!!}


        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($egresos->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Item</th>
                                <th> 2020 Proyectado</th>
                                <th>2020 Real</th>
                                <th> Total Diferencia</th>
                                <th>% Diferencia</th>
                                <th>
                                   Opciones
                                </th>
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
                                <td> {{$egreso->proyectado_egreso}}</td>
                                <td> {{$egreso->real_egreso}} </td>
                                <td> {{$egreso->total_diferencia_egreso}}</td>
                                <td>{{$egreso->diferencia_egreso}}</td>
                                <td>
                                    <a href="{{ URL::action('Liderazgo\EgresoController@edit',$egreso->id_egreso) }}"><i class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
                                    <a href="{{ URL::action('Liderazgo\EgresoController@destroy',$egreso->id_egreso) }}" ><i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td> <B>TOTAL EGRESOS</b></td>
                                <td> {{$tot_egreso}}</td>
                                <td>{{$egreso_real}}</td>
                                <td> {{$egreso_total_diferencia}} </td>
                                <td> {{$egreso_diferencia}}</td>
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
    @else
    <div class="row">
        <h4>Egresos - {{$empresa_selecionada->razon_social}}</h4>
       
    </div><br>
    <br><br>
    
    @endif
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">
        <div class="row">
            <h4>Ingresos - Egresos de {{$empresa_selecionada->razon_social}}</h4>
            
        </div><br>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ( !empty($tot_ingreso) &&  !empty($tot_egreso))
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                  Total  2020 Proyectado
                                </th>
                                <th>
                                    Total  2020 Real
                                </th>
                                <th>
                                    Total  Total Diferencia
                                </th>
                                <th>
                                    Total % Diferencia
                                </th>
                            </tr>
                        </thead>
                      
                        <tbody>
                            <tr>
                                <td>
                                  {{($tot_ingreso-$tot_egreso)}}
                                </td>
                                <td>
                                    {{($ingreso_real-$egreso_real)}}
                                </td>
                                <td>
                                    {{($ingreso_total_diferencia-$egreso_total_diferencia)}}
                                </td>
                                <td>
                                    {{($ingreso_diferencia-$egreso_diferencia)}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                        <br>
                    <table>
                        
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
                               {{($egreso_real/$tot_egreso)}}
                           </td>
                           <td colspan="2">
                               {{($ingreso_real-$egreso_real)/($ingreso_real)}}
                           </td>
                       </tr>
                        </tbody>
                    </table>
                    @else
                    <br><br>
                    <div class="container m-5">
                        <div class="alert alert-primary" role="alert">
                            <p class="text-center m-3"> Ups! no hay registros. INGRESOS y EGRESOS para la empresa  {{$empresa_selecionada->razon_social}}</p>
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
