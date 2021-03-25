@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Liderazgo</a>
        <a class="breadcrumb-item" href="{{ URL::to('/parm_presupuesto') }}">Presupuesto</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">causas</span></a>
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

        <h4> CAUSAS  </h4>
        <label><strong>¿Qué podría pasar que afecte el objetivo del proceso?</strong></label>
        <div class="row">
             {{-- <input type="hidden" class="form-control" name="empresa" value="{{$empresa_selecionada->id_empresa}}"> --}}
             <input type="hidden" class="form-control" name="fk_riesgo" value="{{$fk_riesgo}}">
           
        </div><br><br>

        <div class="row">
        <div class="form-group">
            <table class="table table-bordered" id="dynamic_field">
                <tr>
                    <tr>
                        <td> 
                            <label><strong>Nueva Calificaión</strong></label>                     
                         </td>
                         <td colspan="2" > 
                            <label><strong>Calificación:</strong></label>                     
                         </td>
                    </tr>
                      
                     <td> 
                        <label><strong>Probabilidad:</strong></label>
                        <select name="ree_probabilidad" class="form-control select2" required>
                            <option value="">Seleccionar</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>                       
                     </td>
                     <td> 
                        <label><strong>Impacto  :</strong></label>
                        <select name="ree_impacto" class="form-control select2" required>
                            <option value="">Seleccionar</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>                    
                     </td>
                     
                    <td><input type="button" name="nuevo" id="nuevo" class="btn btn-success"
                            value="+" onclick="nuevos();"></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
            <div class="form-group">
                <label for="datos">Acciones</label>
                <input type="text" name="nom_accion" class="form-control" required>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
            <div class="form-group">
                <label for="datos">Responsable</label>
                <input type="text" name="nom_responsable" class="form-control" required>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
            <div class="form-group">
                <label for="datos">Indicador</label>
                <input type="text" name="nom_indicador" class="form-control" required>
            </div>
        </div>

    </div>

       
        <button type="submit" class="btn btn-primary">Guardar</button>
        {!!Form::close()!!}

        <br><br>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($riesgos->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <td colspan="2" > 
                                    <label><strong>Riesgo uoportunidad:</strong></label>                     
                                 </td>
                                 <td > 
                                    <label><strong>Consecuencia negativo:</strong></label>                     
                                 </td>
                                 <td colspan="2" > 
                                    <label><strong>Calificación:</strong></label>                     
                                 </td>
                                 <td colspan="2" > 
                                    <label><strong>Evaluación:</strong></label>                     
                                 </td>
                            </tr>
                            <tr>
                                <th> Efectos negativos</th>
                                <th> Efectos positivos</th>
                                <th> Riesgo negativo</th>
                                <th> Probabilidad</th>
                                <th> Impacto</th>
                                <th> </th>
                                <th> </th>
                                <th colspan="3"">
                                   Opciones
                                </th>
                            </tr>
                        </thead>
                   
                        <tbody>

                            @foreach ($riesgos as $riesgo)
                            @php
                                $mul=($riesgo->probabilidad)*($riesgo->impacto);
                            @endphp
                                
                            <tr>
                                <td>{{$riesgo->nom_negativo}}</td>
                                <td>{{$riesgo->nom_posivito}}</td>
                                <td>{{$riesgo->nom_riesgo}}</td>
                                <td>{{$riesgo->probabilidad}}</td>
                                <td>{{$riesgo->impacto}}</td>
                                <td>{{$mul}}</td>


                                @if ($mul==9)
                                <td style="background: #C10000;color: aliceblue;">E</td>
                                @else
                                    @if ($mul<=2)
                                    <td style="background: #209209; color: aliceblue;">B</td>
                                    @else
                                        @if ($mul==6)
                                        <td style="background: #f4fd46;color: rgb(5, 5, 5);">A</td>
                                        @else
                                            @if ($mul<=3)
                                            <td style="background: #cec4c4;color: rgb(41, 42, 43);">M</td>
                                            @endif
                                            @if ($mul>=4)
                                            <td style="background: #cec4c4;color: rgb(41, 42, 43);">M</td>
                                            @endif
                                        @endif
                                    @endif

                                @endif
                                <td>
                                    <a href="{{ URL::action('Planificacion\RiesgosOportunoController@editar',$riesgo->id_riesgo_opurtuno ) }}"><i class="fas fa-pencil-alt " style="color:#18A4B4;"></i></a>
                                </td>
                                <td>
                                    <a href="{{ URL::action('Planificacion\RiesgosOportunoController@destroy',$riesgo->id_riesgo_opurtuno ) }}" ><i class="fas fa-trash-alt " style="color:#C10000;"></i></a>
                                </td>
                                <td>
                                    <a href="{{ URL::action('Planificacion\RiesgosOportunoReeController@reeeriesgo',$riesgo->id_riesgo_opurtuno ) }}"><i
                                        title="Cargo que asume el Rol" class="fas fa-arrow-circle-right  " style="color:#665ca7;"></i></a>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                    @else
                    
                    <br><br>
                    <div class="container m-5">
                        <div class="alert alert-primary" role="alert">
                            <p class="text-center m-3"> Ups! no hay registros 😥  </p>
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
