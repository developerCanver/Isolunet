@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Planificación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Matriz y Riesgos</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Matriz y Riesgos</h4>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">
        {{  Form::open(['action' => 'Planificacion\RiesgosController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <h4> CAUSAS  </h4>
        <label><strong>¿Qué podría pasar que afecte el objetivo del proceso?</strong></label>
        <div class="row">
             {{-- <input type="hidden" class="form-control" name="empresa" value="{{$empresa_selecionada->id_empresa}}"> --}}
             {{-- <input type="hidden" class="form-control" name="fk_proceso" value="{{$id_proceso}}"> --}}
           
        </div><br><br>

        <div class="row">

            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong>Usuario Cargo:</strong></label>
                            <input type="text" name="nom_area" class="form-control" required>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong>fecha:</strong></label>
                            <input type="text" name="nom_area" class="form-control" required>
                        </div>
                    </div>

                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong>Cambio Interno:</strong></label>
                                <input type="text" name="nom_area" class="form-control" required>
                            </div>
                        </div>
    
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong>Cambio Interno:</strong></label>
                                <input type="text" name="nom_area" class="form-control" required>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
            
          
       
        <button type="submit" class="btn btn-primary">Guardar</button>
        {!!Form::close()!!}
<br>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    {{-- @if ($procesos->isNotEmpty()) --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Procesos</th>
                                
                                <th> Opciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            {{-- @foreach ($procesos as $proceso)
                                 
                            <tr>
                                <td>{{$proceso->nom_proceso}}</td>
                               <td>
                                <a href="{{ URL::action('Planificacion\CambioController@index',$proceso->id_proceso ) }}"><i
                                            title="Cargo que asume el Rol" class="fas fa-arrow-circle-right  fa-2x" style="color:#665ca7;"></i></a>
                            </td>
                            </tr>
                            @endforeach  --}}

                        </tbody>
                    </table>
                    {{-- @else
                    
                    <br><br>
                    <div class="container m-5">
                        <div class="alert alert-primary" role="alert">
                            <p class="text-center m-3"> Ups! no hay registros 😥
                    </p>
                </div>
            </div>
            <br><br>
            @endif --}}
        </div>
    </div>
</div>
</div>

</div>


@endsection
