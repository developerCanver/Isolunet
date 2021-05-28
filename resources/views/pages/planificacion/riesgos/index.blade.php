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
        {{  Form::open(['action' => 'Planificacion\RiesgosController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}
        <h4>{{$proceso->nom_proceso}}</h4>
        <br>
        <h5> CAUSAS  </h5>
        <label><strong>¿Qué podría pasar que afecte el objetivo del proceso?</strong></label>
        <div class="row">
             {{-- <input type="hidden" class="form-control" name="empresa" value="{{$empresa_selecionada->id_empresa}}"> --}}
             <input type="hidden" class="form-control" name="fk_proceso" value="{{$id_proceso}}">
           
        </div><br><br>

        <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong>Causas:</strong></label>
                            <textarea name="nom_causa" rows="2" cols="80" required="true" ></textarea>
                        </div>
                    </div>

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
                                <th> Causa</th>
                                <th>
                                   Opciones
                                </th>
                            </tr>
                        </thead>
                   
                        <tbody>

                            @foreach ($riesgos as $riesgo)
                                
                            <tr>
                                <td>{{$riesgo->nom_causa}}</td>
                                <td>
                                    <a href="{{ URL::action('Planificacion\RiesgosController@edit',$riesgo->id_riesgo) }}"><i class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
                                    <a href="{{ URL::action('Planificacion\RiesgosController@destroy',$riesgo->id_riesgo) }}" ><i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
                                    <a href="{{ URL::action('Planificacion\RiesgosOportunoController@index_oportuno',$riesgo->id_riesgo ) }}"><i
                                        title="Cargo que asume el Rol" class="fas fa-arrow-circle-right  fa-2x" style="color:#665ca7;"></i></a>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                    {{ $riesgos->links() }}
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
