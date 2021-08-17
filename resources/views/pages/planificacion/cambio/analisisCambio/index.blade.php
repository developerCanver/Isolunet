@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Planificación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Alineación Política, objetivos e indicadores</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Alineación Política, objetivos e indicadores</h4>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">
        {{  Form::open(['action' => 'Planificacion\CambioController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

       
        <div class="row">

            {{-- <input type="hidden" class="form-control" name="empresa" value="{{$empresa_selecionada->id_empresa}}">
            --}}
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
                            <input type="date" class="form-control" name="fecha_cambio" id="fecha_cambio"  required>
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
                                <input type="radio" name="cambio_interno" id="cambio_interno" value="1" required> 
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
                                <input type="radio" name="cambio_interno" id="cambio_interno" value="2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="form-group">
                            <label for="datos">Otro?</label>
                            <input type="radio" name="cambio_interno" id="cambio_interno" value="3">
                            <input type="text" name="otro_interno" class="form-control" placeholder="Otro interno">
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
                                <input type="radio" name="cambio_externo" id="cambio_externo" value="1" required>
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
                                <input type="radio" name="cambio_externo" id="cambio_externo" value="2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="form-group">
                            <label for="datos">Otro?</label>
                            <input type="radio" name="cambio_externo" id="cambio_externo" value="3">
                            <input type="text" name="otro_externo" class="form-control" placeholder="Otro Externo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                   <label><strong>Actividad:</strong></label>
                    <input type="text" name="actividad" class="form-control" placeholder="Cual actividad?" required>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                     <label><strong>Responsable y dependencia:</strong></label>
                    <input type="text" name="responsable" class="form-control" placeholder="Cual?" required>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Tiempo a emplear:</strong></label>
                    <input type="text" name="tiempo" class="form-control" placeholder="Cual?" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Recursos necesarios:</strong></label>
                    <input type="text" name="recursos" class="form-control" placeholder="Cual?" required>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                   <label><strong>Seguimiento:</strong></label>
                    <input type="text" name="seguimiento" class="form-control" placeholder="Cual?" required>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                   <label><strong>Viabilidad:</strong></label>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                            Si
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                            <input type="radio" name="validad" id="validad" value="1" required>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                            No
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                            <input type="radio" name="validad" id="validad" value="2">
                        </div>
                    </div>
                </div>
            </div>
           
          
    
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
            <div class="form-group">
                <label for="datos">Descripción</label>
                <input type="text" required class="form-control" name="descripcionCambio">
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
            <div class="form-group">
                <label for="datos">Justificación</label>
                <input type="text" required class="form-control" name="justificacionCambio">
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
            <div class="form-group">
                <label for="datos">Archivo</label>
                <input type="file" class="form-control" name="archivo">
            </div>
        </div>

    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
    {!!Form::close()!!}
    <br>
    <div class="row">
        <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
            <div class="table-responsive">
               @if ($planificaciones->isNotEmpty()) 
                <table class="table">
                    <thead>
                        <tr>
                            <th>Cargo</th>
                            <th>Usuario</th>
                            <th>Sistema Gestion</th>
                            <th>Fecha</th>
                            <th>Cambio Interno</th>
                            <th>Cambio Externo</th>
                            <th>Actividad</th>
                            <th>Responsable</th>
                            <th>Tiempo a emplear</th>
                            <th>Recursos</th>
                            <th>Seguimiento</th>
                            <th>Viabilidad</th>
                            <th>Archivo</th>

                            <th> Opciones</th>
                        </tr>
                    </thead>

                    <tbody>

                       @foreach ($planificaciones as $planificacion)
                                 
                            <tr>
                                <td>{{$planificacion->nom_cargo}}</td>
                                <td>{{$planificacion->name}}</td>
                                <td>{{$planificacion->str_nombre}}</td>
                                <td>{{$planificacion->fecha_cambio}}</td>

                                @if (($planificacion->cambio_interno) == 3)
                                <td>{{$planificacion->otro_interno}}</td>
                                @elseif(($planificacion->cambio_interno) == 1)
                                <td>Introducción de nuevos Procesos</td>
                                @else
                                <td>Cambio en la estructura organizacional</td>
                                @endif

                                @if (($planificacion->cambio_externo) == 3)
                                <td>{{$planificacion->otro_externo}}</td>
                                @elseif(($planificacion->cambio_externo) == 1)
                                <td>Legislación</td>
                                @else
                                <td>Cambios en el Contexto de la Entidad</td>
                                @endif
                                <td>{{$planificacion->actividad}}</td>
                                <td>{{$planificacion->responsable}}</td>
                                <td>{{$planificacion->tiempo}}</td>
                                <td>{{$planificacion->recursos}}</td>
                                <td>{{$planificacion->seguimiento}}</td>
                                
                                @if (($planificacion->validad) == 1)
                                <td>Si</td>
                                @else
                                <td>No</td>
                                @endif

                                @if ($planificacion->archivo)
                                <td style="background: #f9faf9;">
                                    <a title="Descargar {{substr(($planificacion->archivo), 10)}}" href="/archivos/planificacion/{{$planificacion->archivo}}"
                                        class="btn btn-light" download="{{$planificacion->archivo}}"
                                        style="color: rgb(53, 87, 53); font-size:25px; "> <i
                                        class=" fas fa-file-download "></i></a></td>
                                @else
                                <td ><span class="badge badge-warning">No existe</span></td>
                                @endif
                           
                            <td>
                                <a href="{{ URL::action('Planificacion\CambioController@edit',$planificacion->id_cambio) }}"><i class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
                                <a href="{{ URL::action('Planificacion\CambioController@destroy',$planificacion->id_cambio) }}" ><i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
                            </td>
                        </tr>
                        @endforeach 

                    </tbody>
                </table>
                {{ $planificaciones->links() }}
                @else
                    
                    <br><br>
                    <div class="container m-5">
                        <div class="alert alert-primary" role="alert">
                            <p class="text-center m-3"> Ups! no hay registros 😥
                    </p>
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
