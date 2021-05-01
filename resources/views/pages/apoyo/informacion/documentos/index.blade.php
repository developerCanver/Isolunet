@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/informacion') }}">Apoyo</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Información Documentada</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Información Documentada</h4>
        <p class="mg-b-0">Documentos</p>

    </div>
</div><!-- d-flex -->

<div class="br-pagebody">

    <div class="br-section-wrapper">
        <form>

            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <h4>Seleccione Tipo de Información</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">

                        @if (empty($tipo_informacion))
                        <select name="tipo_informacion" class="form-control select2" required>
                            <option value="" selected="true" disabled="disabled"> Seleccione Tipo Información..</option>
                            <option value="Documentos">Documentos</option>
                            <option value="Documentos_externos">Documentos Externos</option>
                            <option value="Registros">Registros</option>
                        </select>

                        @else
                        <select name="tipo_informacion" class="form-control select2" required>
                            <option value="" selected="true" disabled="disabled"> Seleccione Tipo Información..</option>
                            <option value="Documentos" @if($tipo_informacion=='Documentos' ) selected @endif> Documentos
                            </option>
                            <option value="Documentos_externos" @if($tipo_informacion=='Documentos_externos' ) selected
                                @endif>Documentos Externos</option>
                            <option value="Registros" @if($tipo_informacion=='Registros' ) selected @endif>Registros
                            </option>
                        </select>

                        @endif

                    </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">

                    <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Buscar </button>

                    {{-- <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i
                        class="fas fa-backward"></i></a>
                    --}}


                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                </div>

            </div>

        </form>


        @if ($tipo_informacion=="Documentos")


        {{  Form::open(['action' => 'Apoyo\InformacionController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <div class="row">
            <h4>Documentos</h4>
        </div><br><br>

        <input type="hidden" name="fk_empresa" value="{{$empresa->id_empresa}}">
        <input type="hidden" name="tipo_informacion" value="{{$tipo_informacion}}">


        <input type="hidden" name="conservasion" value="conservasion">
        <input type="hidden" name="dis_final" value="dis_final">
        <input type="hidden" name="organiza" value="organiza">
        <input type="hidden" name="vigente" value="0">
        <input type="hidden" name="contralado" value="0">
        <input type="hidden" name="no_copia" value="0">
        <input type="hidden" name="tit_registro" value="tit_registro">
        <input type="hidden" name="descripcion" value="descripcion">
        <input type="hidden" name="digital" value="0">
        <input type="hidden" name="tie_retencion" value="tie_retencion">



        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Proceso:</strong></label>
                    <select name="proceso" class="form-control select2" required>
                        <option value="" selected="true" disabled="disabled"> Seleccione Reporte Proceso..</option>
                        @foreach ($procesos as $proceso)
                        <option value="{{ $proceso->nom_proceso  }}">{{ $proceso->nom_proceso }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Código:</strong></label>
                    <input type="text" name="codigo" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Título Documento:</strong></label>
                    <input type="text" name="tit_documento" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Responsable:</strong></label>
                    <select name="responsable" class="form-control select2" required>
                        <option value="" selected="true" disabled="disabled"> Seleccione Responsable..</option>
                        @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->nom_cargo  }}">{{ $cargo->nom_cargo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <br>
        <h5>Estado del Documento</h5>

        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label><strong>Versión:</strong></label>
                    <input type="number" name="version" class="form-control" required>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label><strong>Fecha Actualización:</strong></label>
                    <input type="date" name="fecha_info" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Lugar de Archivo:</strong></label>
                    <input type="text" name="lugar_archivo" class="form-control" required>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Vigente:</strong></label>
                    <select name="vigente" class="form-control select2" required>
                        <option value="" selected="true" disabled="disabled"> Seleccione..</option>
                        <option value="1"> Si</option>
                        <option value="2"> No</option>
                    </select>

                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Controlador:</strong></label>
                    <select name="contralado" class="form-control select2" required>
                        <option value="" selected="true" disabled="disabled"> Seleccione..</option>
                        <option value="1"> Si</option>
                        <option value="2"> No</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Sistema de Gestión:</strong></label>
                    <select name="sis_gestion[]" class="form-control select2" required multiple>                       
                        @foreach ($sistema_gestiones as $sistema_gestione)
                        <option value="{{ $sistema_gestione->id_sisgestion  }}">{{ $sistema_gestione->str_nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Archivo:</strong></label>
                    <input type="file" name="archivo" class="form-control">
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        {!!Form::close()!!}

        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($informaciones->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Proceso</th>
                                <th>Código</th>
                                <th>Título Documento</th>
                                <th>Responsable</th>
                                <th>Versión</th>
                                <th>Fecha Actualización</th>
                                <th>Lugar de Archivo</th>
                                <th>Vigente</th>
                                <th>Controlador</th>
                                {{-- <th>Sistema Gestión</th> --}}
                                <th>Archivo</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($informaciones as $informacion)

                            <tr>
                                <td>{{$informacion->proceso}}</td>
                                <td>{{$informacion->codigo}}</td>
                                <td>{{$informacion->tit_documento}}</td>
                                <td>{{$informacion->responsable}}</td>
                                <td>{{$informacion->version}}</td>
                                <td>{{$informacion->fecha_info}}</td>
                                <td>{{$informacion->lugar_archivo}}</td>
                                <td>{{$informacion->vigente}}</td>
                                <td>{{$informacion->contralado}}</td>
                                {{-- <td>{{$informacion->sis_gestion}}</td> --}}
                                @if ($informacion->archivo == 'Archivo no cargado')
                                <td>{{$informacion->archivo}}</td>
                                @else
                                <td>{{substr(($informacion->archivo), 10)}} </td>
                                @endif
                                
                              

                                <td>
                                    <a
                                        href="{{url('info_editar', array('id'=>$informacion->id_informacion,'tipo_informacion'=>$tipo_informacion))}}"><i
                                            class="fas fa-pencil-alt " style="color:#18A4B4;"></i></a>&nbsp;

                                    <a
                                        href="{{url('informacion_delete', array('id'=>$informacion->id_informacion,'tipo_informacion'=>$tipo_informacion))}}"><i
                                            class="fas fa-trash-alt " style="color:#C10000;"></i></a>&nbsp;

                                    @if ($informacion->archivo!='Archivo no cargado')
                                    <a title="Descargar Archivo" href="ifo/documentada/{{$informacion->archivo}}"
                                        download="{{$informacion->archivo}}"
                                        style="color: rgb(53, 87, 53); font-size:18px;"> <i
                                            class="fas fa-file-download"></i></a>

                                    @endif


                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $informaciones->links() }}
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

    @endif
    <!-- DOCUMENTOS EXTERNOS -->

    @if ($tipo_informacion=="Documentos_externos")


    {{  Form::open(['action' => 'Apoyo\InformacionController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
    {!! Form::token() !!}

    <div class="row">
        <h4>Documentos Externos</h4>
    </div><br><br>

    <input type="hidden" name="fk_empresa" value="{{$empresa->id_empresa}}">
    <input type="hidden" name="tipo_informacion" value="{{$tipo_informacion}}">

    <input type="hidden" name="version" value="version">
    <input type="hidden" name="conservasion" value="conservasion">

    <input type="hidden" name="digital" value="digital">
    <input type="hidden" name="digital" value="digital">
    <input type="hidden" name="digital" value="digital">
    <input type="hidden" name="tit_documento" value="tit_documento">
    <input type="hidden" name="codigo" value="codigo">
    <input type="hidden" name="dis_final" value="dis_final">
    <input type="hidden" name="organiza" value="organiza">
    <input type="hidden" name="fecha_info" value="2010-10-10">
    <input type="hidden" name="tit_registro" value="tit_registro">
    <input type="hidden" name="digital" value="0">
    <input type="hidden" name="tie_retencion" value="tie_retencion">
    <input type="hidden" name="proceso" value="proceso">


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
            <div class="form-group">
                <label><strong>Descripción:</strong></label>
                <textarea name="descripcion" rows="4" cols="150" required="true"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <div class="form-group">
                <label><strong>Título del Documento:</strong></label>
                <input type="text" name="tit_documento" class="form-control" required>

            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <div class="form-group">
                <label><strong>Responsable:</strong></label>
                <select name="responsable" class="form-control select2" required>
                    <option value="" selected="true" disabled="disabled"> Seleccione Responsable..</option>
                    @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->nom_cargo  }}">{{ $cargo->nom_cargo }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
    <br>

    <div class="dow">
        <h6>Estado del Documento</h6>

        <hr>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
            <div class="form-group">
                <label><strong>Lugar de Archivo:</strong></label>
                <input type="text" name="lugar_archivo" class="form-control" required>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
            <div class="form-group">
                <label><strong>N° Copias:</strong></label>
                <input type="number" name="no_copia" class="form-control" required>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
            <div class="form-group">
                <label><strong>Vigente:</strong></label>
                <select name="vigente" class="form-control select2" required>
                    <option value="" selected="true" disabled="disabled"> Seleccione..</option>
                    <option value="1"> Si</option>
                    <option value="2"> No</option>
                </select>

            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <div class="form-group">
                <label><strong>Controlado:</strong></label>
                <select name="contralado" class="form-control select2" required>
                    <option value="" selected="true" disabled="disabled"> Seleccione..</option>
                    <option value="1"> Si</option>
                    <option value="2"> No</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <div class="form-group">
                <label><strong>Archivo:</strong></label>
                <input type="file" name="archivo" class="form-control">
            </div>
        </div>

    </div>


    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
    {!!Form::close()!!}

    <div class="row">
        <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
            <div class="table-responsive">
                @if ($informaciones->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Descripción:</th>
                            <th>Título del Documento:</th>
                            <th>Responsable</th>
                            <th>Lugar de Archivo:</th>
                            <th>N° Copias:</th>
                            <th>Vigente:</th>
                            <th>Controlado:</th>
                            <th>Archivo</th>
                            <th colspan="2">Opciones</th>
                        </tr>
                    </thead>

                    <tbody>


                        @foreach ($informaciones as $informacion)

                        <tr>
                            <td>{{$informacion->descripcion}}</td>
                            <td>{{$informacion->tit_documento}}</td>
                            <td>{{$informacion->responsable}}</td>
                            <td>{{$informacion->lugar_archivo}}</td>
                            <td>{{$informacion->no_copia}}</td>
                            <td>{{$informacion->vigente}}</td>
                            <td>{{$informacion->contralado}}</td>
                            @if ($informacion->archivo == 'Archivo no cargado')
                            <td>{{$informacion->archivo}}</td>
                            @else
                            <td>{{substr(($informacion->archivo), 10)}} qwe</td>
                            @endif
                            

                            <td>
                                <a
                                    href="{{url('info_editar', array('id'=>$informacion->id_informacion,'tipo_informacion'=>$tipo_informacion))}}"><i
                                        class="fas fa-pencil-alt " style="color:#18A4B4;"></i></a>&nbsp;

                                <a
                                    href="{{url('informacion_delete', array('id'=>$informacion->id_informacion,'tipo_informacion'=>$tipo_informacion))}}"><i
                                        class="fas fa-trash-alt " style="color:#C10000;"></i></a>&nbsp;

                                @if ($informacion->archivo!='Archivo no cargado')
                                <a title="Descargar Archivo" href="ifo/documentada/{{$informacion->archivo}}"
                                    download="{{$informacion->archivo}}"
                                    style="color: rgb(53, 87, 53); font-size:18px;"> <i
                                        class="fas fa-file-download"></i></a>

                                @endif


                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $informaciones->links() }}
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

@endif


<!-- REGISTROS -->

@if ($tipo_informacion=="Registros")


{{  Form::open(['action' => 'Apoyo\InformacionController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
{!! Form::token() !!}

<div class="row">
    <h4>Registros</h4>
</div><br><br>

<input type="hidden" name="fk_empresa" value="{{$empresa->id_empresa}}">
<input type="hidden" name="tipo_informacion" value="{{$tipo_informacion}}">
<input type="hidden" name="digital" value="digital">
<input type="hidden" name="tit_documento" value="tit_documento">
<input type="hidden" name="fecha_info" value="2010-10-10">
<input type="hidden" name="vigente" value="0">
<input type="hidden" name="contralado" value="0">
<input type="hidden" name="no_copia" value="0">




<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <label><strong>Código:</strong></label>
            <input type="text" name="codigo" class="form-control" required>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <label><strong>Proceso:</strong></label>
            <select name="proceso" class="form-control select2" required>
                <option value="" selected="true" disabled="disabled"> Seleccione Reporte Proceso..</option>
                @foreach ($procesos as $proceso)
                <option value="{{ $proceso->nom_proceso  }}">{{ $proceso->nom_proceso }}</option>
                @endforeach
            </select>

        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <label><strong>Titulo del Registro:</strong></label>
            <input type="text" name="tit_registro" class="form-control" required>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <label><strong>Versión:</strong></label>
            <input type="number" name="version" class="form-control" required>

        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <label><strong>Responsable:</strong></label>
            <select name="responsable" class="form-control select2" required>
                <option value="" selected="true" disabled="disabled"> Seleccione Responsable..</option>
                @foreach ($cargos as $cargo)
                <option value="{{ $cargo->nom_cargo  }}">{{ $cargo->nom_cargo }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <label><strong>lugar de Archivo final:</strong></label>
            <input type="text" name="lugar_archivo" class="form-control" required>
        </div>
    </div>

</div>
<div class="row">
    
   
    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <label><strong>Disposición Digital:</strong></label>
            <select name="digital" class="form-control select2" required>
                <option value="" selected="true" disabled="disabled"> Seleccione..</option>
                <option value="1"> Si</option>
                <option value="2"> No</option>
            </select>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <label><strong>Como se Organiza:</strong></label>
            <input type="text" name="organiza" class="form-control" required>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <label><strong>Tiempo de Retención:</strong></label>
            <input type="text" name="tie_retencion" class="form-control" required>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <label><strong>Disposicion Final:</strong></label>
            <input type="text" name="dis_final" class="form-control" required>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <label><strong>conservasión:</strong></label>
            <input type="text" name="conservasion" class="form-control" required>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <label><strong>Sistema de Gestión:</strong></label>
            <select name="sis_gestion[]" class="form-control select2" required multiple>                       
                @foreach ($sistema_gestiones as $sistema_gestione)
                <option value="{{ $sistema_gestione->id_sisgestion  }}">{{ $sistema_gestione->str_nombre }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row">
   <div class="col-md-9 col-sm-9 col-xs-12 col-lg-9">
        <div class="form-group">
            <label><strong>Descripción:</strong></label>
            <textarea name="descripcion" rows="3" cols="140" required="true"></textarea>
        </div>
    </div> 

  
    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <label><strong>Archivo:</strong></label>
            <input type="file" name="archivo" class="form-control">

        </div>
    </div>
</div>



<button type="submit" class="btn btn-primary">Guardar</button>
<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
{!!Form::close()!!}
<br>
<br>

<div class="row">
    <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
        <div class="table-responsive">
            @if ($informaciones->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>Código:</th>
                        <th>Proceso:</th>
                        <th>Titulo del Registro:</th>
                        <th>Versión:</th>
                        <th>Descripción:</th>
                        <th>lugar Archivo:</th>
                        <th>Disposición Digital:</th>
                        <th>Como se Organiza:</th>
                        <th>Tiempo de Retención:</th>
                        <th>Disposicion Final:</th>
                        <th>conservasión:</th>
                        {{-- <th>Sistema de Gestión:</th> --}}
                        <th>Archivo</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($informaciones as $informacion)

                    <tr>
                        <td>{{$informacion->codigo}}</td>
                        <td>{{$informacion->proceso}}</td>
                        <td>{{$informacion->tit_registro}}</td>
                        <td>{{$informacion->version}}</td>
                        <td>{{$informacion->descripcion}}</td>
                        <td>{{$informacion->lugar_archivo}}</td>
                        <td>{{$informacion->digital}}</td>
                        <td>{{$informacion->organiza}}</td>
                        <td>{{$informacion->tie_retencion}}</td>
                        <td>{{$informacion->dis_final}}</td>
                        <td>{{$informacion->conservasion}}</td>
                        {{-- <td>{{$informacion->sis_gestion}}</td> --}}
                        <td>{{$informacion->archivo}}</td>

                        <td>
                            <a
                                href="{{url('info_editar', array('id'=>$informacion->id_informacion,'tipo_informacion'=>$tipo_informacion))}}"><i
                                    class="fas fa-pencil-alt " style="color:#18A4B4;"></i></a>&nbsp;

                            <a
                                href="{{url('informacion_delete', array('id'=>$informacion->id_informacion,'tipo_informacion'=>$tipo_informacion))}}"><i
                                    class="fas fa-trash-alt " style="color:#C10000;"></i></a>&nbsp;

                            @if ($informacion->archivo!='Archivo no cargado')
                            <a title="Descargar Archivo" href="ifo/documentada/{{$informacion->archivo}}"
                                download="{{$informacion->archivo}}" style="color: rgb(53, 87, 53); font-size:18px;"> <i
                                    class="fas fa-file-download"></i></a>

                            @endif


                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $informaciones->links() }}
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


@endif




@endsection
