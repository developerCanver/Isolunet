@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Planificación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">planificación de cambio</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Planificación de Cambio</h4>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">

        {{  Form::open(['action' => ['Planificacion\PoliticaVSObjetivosController@update_politica'],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <h4>  </h4>
        <label><strong>Identificación y análisis del cambio </strong></label>
        <div class="row">

          
            <input type="hidden" class="form-control" name="fk_politica" value="{{$fk_politica}}">  
            <input type="hidden" class="form-control" name="id_politica_objetivo" value="{{$politica->id_politica_objetivo}}">  

        </div><br><br>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong> Política Integrada:</strong></label>
                            <input type="text" name="integrada" class="form-control" value="{{$politica->integrada}}"  required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong>Directrices Política Integrada:</strong></label>
                            <input type="text" name="directrices" class="form-control" value="{{$politica->directrices}}"  required >
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong>Objetivos:</strong></label>
                            <input type="text" name="nom_objetivos" class="form-control" value="{{$politica->nom_objetivos}}"  required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong>Indicador:</strong></label>
                            <input type="text" name="indicador" class="form-control" value="{{$politica->indicador}}"  required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                   <label><strong>Unidad:</strong></label>
                    <input type="text" name="unidad" class="form-control" value="{{$politica->unidad}}"  required>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                     <label><strong>Frecuencia:</strong></label>
                    <input type="text" name="frecuencia" class="form-control" value="{{$politica->frecuencia}}"  required>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Mejor hacia:</strong></label>
                    <input type="text" name="mejor" class="form-control" value="{{$politica->mejor}}"  required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                   <label><strong>Meta Indicador:</strong></label>
                    <input type="text" name="meta" class="form-control" value="{{$politica->meta}}"  required>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                     <label><strong>Proceso:</strong></label>
                     <select id="cliente" name="fk_proceso" class="form-control">
                        <option selected="true" disabled="disabled">Seleccione Proceso</option>
                        @foreach ($procesos as $proceso)
                            <option value="{{ $proceso->id_proceso }}"
                                {{ $proceso->id_proceso == $politica->fk_proceso ? 'selected' : '' }}>
                                {{ $proceso->nom_proceso }}</option>
                        @endforeach
                    </select>

                    
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Actividades Objetivos:</strong></label>
                    <input type="text" name="actividad" class="form-control" value="{{$politica->actividad}}"  required>
                </div>
            </div>
        </div>
      
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                   <label><strong>Recursos:</strong></label>
                    <input type="text" name="recurso" class="form-control" value="{{$politica->recurso}}"  required>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                     <label><strong>Responsable:</strong></label>
                     <select id="cliente" name="fk_cargo" class="form-control">
                        <option selected="true" disabled="disabled">Seleccione responsable</option>
                        @foreach ($cargos as $cargo)
                            <option value="{{ $cargo->id_cargo }}"
                                {{ $cargo->id_cargo == $politica->fk_cargo ? 'selected' : '' }}>
                                {{ $cargo->nom_cargo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Fecha Finalización:</strong></label>
                    <input type="date" name="fecha_finilizacion" class="form-control" value="{{$politica->fecha_finilizacion}}"  required>
                </div>
            </div>
        </div>
        <div class="row">
          
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Evaluación Resultados:</strong></label>
                    <input type="text" name="evaluacion" class="form-control" value="{{$politica->evaluacion}}"  required>
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    {!!Form::close()!!}
    <br>
   
</div>

</div>


@endsection
