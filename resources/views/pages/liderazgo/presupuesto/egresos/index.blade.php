@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Liderazgo</a>
        <a class="breadcrumb-item" href="{{ URL::to('/parm_presupuesto') }}">Presupuesto</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Egreso</span></a>
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

    <div class="br-section-wrapper">
        {{  Form::open(['action' => 'Liderazgo\EgresoController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

         <h4>Egresos - {{$empresa_selecionada->razon_social}}</h4>
        <div class="row">
             <input type="hidden" class="form-control" name="empresa" value="{{$empresa_selecionada->id_empresa}}">
           
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
                        <label><strong>2021 Proyecto:</strong></label>
                        <input type="number" class="form-control" name="proyectado_egreso" required>

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <div class="form-group">
                        <label><strong>2021 Real:</strong></label>
                        <input type="number" class="form-control" name="real_egreso" required value="0">

                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
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
                        @php
                      
                        $tot_egreso=0;
                        $egreso_real=0;
                        $egreso_total_diferencia=0;
                        
                    @endphp
                        <tbody>

                            @foreach ($egresos as $egreso)
                                     @php
                                    $tot_egreso=$tot_egreso+$egreso->proyectado_egreso;
                                    $egreso_real=$egreso_real+$egreso->real_egreso;
                                    $egreso_total_diferencia=$egreso_total_diferencia+$egreso->total_diferencia_egreso;
                                    @endphp
                            <tr>
                                <td>{{$egreso->nom_egreso}}</td>
                                <td> {{$egreso->proyectado_egreso}}</td>
                                <td> {{$egreso->real_egreso}} </td>
                                <td> {{$egreso->total_diferencia_egreso}}</td>
                                <td>{{$egreso->diferencia_egreso}}&nbsp;%</td>
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
                               
                                @if ($tot_egreso != 0)
                                <td>{{round(((($egreso_real-$tot_egreso)/$tot_egreso)*100),0)}} &nbsp;%</td>
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


@endsection
