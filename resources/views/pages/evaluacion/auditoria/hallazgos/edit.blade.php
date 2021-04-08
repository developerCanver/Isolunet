@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Evaluación de desempeño</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Fortalezas y Oportunidades</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Evaluación de desempeño</h4>
        <p class="mg-b-0">Editar Fortalezas y Oportunidades</p>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">

        <form action="{{ route('hallasgos.update', $chequeo->id_hallazgos)}}" method="POST">
            @csrf
            @method('PUT')

            <h4>{{$empresa->razon_social}} </h4>

            <br><br>
       

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Ubicación:</strong></label>
                        <input type="text" required name="ubicacion" class="form-control" value="{{$chequeo->ubicacion}}">
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                    <div class="form-group">
                        <label><strong>Descripción:</strong></label>
                        <input type="text" required name="descripciones" class="form-control" value="{{$chequeo->descripciones}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Evidencia:</strong></label>
                        <input type="text" required name="evidencia" class="form-control"  value="{{$chequeo->evidencia}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Requisito:</strong></label>
                        <input type="text" required name="requisito" class="form-control" value="{{$chequeo->requisito}}">
                    </div>
                </div>
            </div>



  
            
            @foreach ($cheSisGestiones as $cheSisGestione)

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>{{$cheSisGestione->str_nombre}}:</strong></label>
                        <input type="hidden" name="fk_sisgestion[]" value="{{$cheSisGestione->id_sisgestion}}">

                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <select name="seleccion_hallazgos[]" required class="form-control ">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="Si" @if($cheSisGestione->seleccion_hallazgos == 'Si') selected @endif >Si
                            </option>
                            <option value="No" @if($cheSisGestione->seleccion_hallazgos == 'No') selected @endif >No
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            @endforeach

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>No conformidades detectadas en esta auditoria:</strong></label>
                        <input type="number" required name="num_detectadas" class="form-control"  value="{{$chequeo->num_detectadas}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>No conformidades cerradas de auditorias anteriores:</strong></label>
                        <input type="number" required name="num_cerredas" class="form-control"  value="{{$chequeo->num_cerredas}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Revisó:</strong></label>
                        <select name="reviso" class="form-control select2" required>
                            <option selected disabled value="">Seleccione Usuario que Revisó...</option>
                            @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->name}}" {{$usuario->name ==  $chequeo->reviso ? 'selected' : '' }}>{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Aprobó:</strong></label>
                        <select name="aprobo" class="form-control select2" required>
                            <option selected disabled value="">Seleccione Usuario que Aprobó...</option>
                            @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->name}}" {{$usuario->name ==   $chequeo->aprobo ? 'selected' : '' }}>{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
    {!!Form::close()!!}
    <br>

</div>




@endsection
