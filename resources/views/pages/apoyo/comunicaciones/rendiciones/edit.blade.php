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

        {{  Form::open(['action' => ['Planificacion\CambioController@update',$cambios->id_cambio],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <h4>  </h4>
        <label><strong>Identificación y análisis del cambio </strong></label>
        <div class="row">

          
          <input type="hidden" class="form-control" name="fk_proceso" value="{{$fk_proceso}}"> 

        </div><br><br>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong> Cargo:</strong></label>
                            <select name="fk_cargo" class="form-control select2" required>
                                @foreach ($cargos as $cargo)
                                <option value="{{ $cargo->id_cargo  }}">{{ $cargo->nom_cargo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong>Usuario:</strong></label>
                            <select name="fk_usuario" class="form-control select2" required>
                                @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id  }}">{{ $usuario->name }}</option>
                                @endforeach
                            </select>
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
                            <label><strong>Sistema Gestion:</strong></label>
                            <select name="usuarios_relacionados[]" class="form-control select2" required >
                                @foreach ($sistema_gestiones as $sistema_gestion)
                                <option value="{{ $sistema_gestion->id_sisgestion  }}">
                                    {{ $sistema_gestion->str_nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong>fecha:</strong></label>
                            <input type="date" class="form-control" name="fecha_cambio" id="fecha_cambio" value="{{$cambios->fecha_cambio}}"
                                required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Cambio Interno:</strong></label>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                Introducción de nuevos Procesos
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                @if (($cambios->cambio_interno)==1)
                                <input type="radio" name="cambio_interno" id="cambio_interno" value="1" checked required> 
                                @else
                                <input type="radio" name="cambio_interno" id="cambio_interno" value="1" required> 
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                Cambio en la estructura organizacional
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                @if (($cambios->cambio_interno)==2)
                                <input type="radio" name="cambio_interno" id="cambio_interno" value="2" checked required>
                                @else
                                <input type="radio" name="cambio_interno" id="cambio_interno" value="2" required>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="form-group">
                            <label for="datos">Otro?</label>
                            @if (($cambios->cambio_interno)==3)
                            <input type="radio" name="cambio_interno" id="cambio_interno" value="3" checked required> 
                            @else
                            <input type="radio" name="cambio_interno" id="cambio_interno" value="3" required> 
                            @endif

                            @if (($cambios->otro_interno))
                            <input type="text" name="otro_interno" class="form-control" value="{{$cambios->otro_interno}}">
                            @else
                            <input type="text" name="otro_interno" class="form-control" placeholder="Cual interno?">
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Cambios Externos:</strong></label>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                Legislación
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                @if (($cambios->cambio_externo)==1)
                                <input type="radio" name="cambio_externo" id="cambio_externo" value="1" checked required> 
                                @else
                                <input type="radio" name="cambio_externo" id="cambio_externo" value="1" required> 
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                Cambios en el Contexto de la Entidad
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                @if (($cambios->cambio_externo)==2)
                                <input type="radio" name="cambio_externo" id="cambio_externo" value="2" checked required> 
                                @else
                                <input type="radio" name="cambio_externo" id="cambio_externo" value="2" required> 
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="form-group">
                            <label for="datos">Otro?</label>
                            @if (($cambios->cambio_externo)==3)
                            <input type="radio" name="cambio_externo" id="cambio_externo" value="3" checked required> 
                            @else
                            <input type="radio" name="cambio_externo" id="cambio_externo" value="3" required> 
                            @endif
                            @if (($cambios->otro_externo))
                            <input type="text" name="otro_externo" class="form-control" value="{{$cambios->otro_externo}}">
                            @else
                            <input type="text" name="otro_externo" class="form-control" placeholder="Cual interno?">
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                   <label><strong>Actividad:</strong></label>
                    <input type="text" name="actividad" class="form-control" value="{{$cambios->actividad}}" required>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                     <label><strong>Responsable y dependencia:</strong></label>
                    <input type="text" name="responsable" class="form-control" value="{{$cambios->responsable}}" required>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Tiempo a emplear:</strong></label>
                    <input type="text" name="tiempo" class="form-control"  value="{{$cambios->tiempo}}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Recursos necesarios:</strong></label>
                    <input type="text" name="recursos" class="form-control"   value="{{$cambios->recursos}}"  required>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                   <label><strong>Seguimiento:</strong></label>
                    <input type="text" name="seguimiento" class="form-control" value="{{$cambios->seguimiento}}" required>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                   <label><strong>Validad:</strong></label>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                            Si
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                            @if (($cambios->validad)==1)
                            <input type="radio" name="validad" id="validad" value="1" checked required> 
                            @else
                            <input type="radio" name="validad" id="validad" value="1" required>
                            @endif

                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                            No
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                            @if (($cambios->validad)==2)
                            <input type="radio" name="validad" id="validad" value="2" checked required> 
                            @else
                            <input type="radio" name="validad" id="validad" value="2" required>
                            @endif
                        </div>
                    </div>
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
