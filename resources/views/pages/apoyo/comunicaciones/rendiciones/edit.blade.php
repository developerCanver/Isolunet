@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Planificación</a>
        <a class="breadcrumb-item" href="{{ URL::to('/comunicaciones') }}">Comunicaciones</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">IR Comunicaciones</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Comunicaciones - <a class="breadcrumb-item" href="{{ URL::to('/competencia_rendicion') }}">IR Comunicaciones</a> </h4>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">
        {{-- url("competencia_rendicion/{$rendicion->id_rendiciones}") --}}
        {{  Form::open(['action' => ['Apoyo\ComunicacionesController@update_rendicion',$comunicacion->id_rendiciones],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

            <h4> </h4>
            <div class="row">
                {{-- <input type="hidden" name="fk_empresa" value="{{$empresa->id_empresa}}"> --}}
            </div><br><br>

            <hr>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Quién:</strong></label>
                        <select name="Quien" class="form-control select2" required>
                            <option value="" selected="true" disabled="disabled"> Seleccione Cargo...</option>
                            @foreach ($cargos as $cargo)
                            <option value="{{ $cargo->nom_cargo }}"
                                {{ $cargo->nom_cargo == $comunicacion->Quien ? 'selected' : '' }}>
                                {{ $cargo->nom_cargo }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Mecanismo y Medios:</strong></label>
                        <input type="text" class="form-control" name="mecanismo"  value="{{$comunicacion->mecanismo}}" required>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Frecuencia:</strong></label>
                        <input type="text" name="frecuencia" class="form-control"   value="{{$comunicacion->frecuencia}}"  required>
    
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong> A Quién:</strong></label>
                        <input type="text" class="form-control" name="a_quien"   value="{{$comunicacion->a_quien}}" required>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong> Registro:</strong></label>
                        <input type="text" name="registro" class="form-control"    value="{{$comunicacion->registro}}" required>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Sistema de Gestión:</strong></label>
                        <input type="text" class="form-control" name="sistema"   value="{{$comunicacion->sistema}}" required>
                    </div>
                </div>
            </div>


    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
    </form>
    <br>

</div>



@endsection
