@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Liderazgo</a>
        <a class="breadcrumb-item" href="{{ URL::to('/informacion') }}">Apoyo</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Editar Información Documentada</span></a>
    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Información Documentada</h4>
        <p class="mg-b-0">Editar Documentos</p>
    </div>
</div><!-- d-flex -->





        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors -> all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>

        <br>
        @if ($tipo_informacion=='Documentos')


        {{  Form::open(['action' => ['Apoyo\InformacionController@actualizar_info',$informacion->id_informacion],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}



        <input type="hidden" name="lugar_archivo" value="lugar_archivo">
        <input type="hidden" name="conservasion" value="conservasion">
        <input type="hidden" name="dis_final" value="dis_final">
        <input type="hidden" name="organiza" value="organiza">
        <input type="hidden" name="fecha_info" value="2010-10-10">
        <input type="hidden" name="vigente" value="0">
        <input type="hidden" name="contralado" value="0">
        <input type="hidden" name="no_copia" value="0">
        <input type="hidden" name="tit_registro" value="tit_registro">
        <input type="hidden" name="descripcion" value="descripcion">
        <input type="hidden" name="digital" value="0">
        <input type="hidden" name="tie_retencion" value="tie_retencion">

        <input type="hidden" name="tipo_informacion" value="{{$tipo_informacion}}">

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Proceso:</strong></label>
                            <select name="proceso" class="form-control select2" required>
                                <option value="" selected="true" disabled="disabled"> Seleccione Reporte Proceso..
                                </option>
                                @foreach ($procesos as $proceso)
                                <option value="{{ $proceso->nom_proceso }}"
                                    {{ $proceso->nom_proceso == $informacion->proceso ? 'selected' : '' }}>
                                    {{ $proceso->nom_proceso }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Código:</strong></label>
                            <input type="text" name="codigo" class="form-control" required
                                value="{{$informacion->codigo}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Título Documento:</strong></label>
                            <input type="text" name="tit_documento" class="form-control" required
                                value="{{$informacion->tit_documento}}">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Responsable:</strong></label>
                            <select name="responsable" class="form-control select2" required>
                                <option value="" selected="true" disabled="disabled"> Seleccione Reporte A..</option>
                                @foreach ($cargos as $cargo)
                                <option value="{{ $cargo->nom_cargo }}"
                                    {{ $cargo->nom_cargo == $informacion->responsable ? 'selected' : '' }}>
                                    {{ $cargo->nom_cargo }}</option>
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
                            <input type="text" name="version" class="form-control" required
                                value="{{$informacion->version}}">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label><strong>Fecha Actualización:</strong></label>
                            <input type="date" name="fecha_info" class="form-control" required
                                value="{{$informacion->fecha_info}}">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Lugar de Archivo:</strong></label>
                            <input type="text" name="lugar_archivo" class="form-control" required
                                value="{{$informacion->lugar_archivo}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Vigente:</strong></label>
                            <select name="vigente" class="form-control select2" required>
                                <option value="" selected="true" disabled="disabled"> Seleccione..</option>
                                <option value="1" @if($informacion->vigente == '1') selected @endif >Si</option>
                                <option value="2" @if($informacion->vigente == '2') selected @endif >No</option>
                            </select>

                        </div>
                    </div>


                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Controlador:</strong></label>
                            <select name="contralado" class="form-control select2" required>
                                <option value="" selected="true" disabled="disabled"> Seleccione..</option>
                                <option value="1" @if($informacion->contralado == '1') selected @endif >Si</option>
                                <option value="2" @if($informacion->contralado == '2') selected @endif >No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Sistema de Gestión:</strong></label>
                            <select name="sis_gestion" class="form-control select2" required>
                                <option value="" selected="true" disabled="disabled"> Seleccione Gestión..</option>
                                @foreach ($sistema_gestiones as $sistema_gestion)
                                <option value="{{ $sistema_gestion->str_nombre }}"
                                    {{ $sistema_gestion->str_nombre == $informacion->sis_gestion ? 'selected' : '' }}>
                                    {{ $sistema_gestion->str_nombre }}</option>
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

                <button type="submit" class="btn btn-primary">Editar</button>

                <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
                {!!Form::close()!!}
                <br><br>


            </div>
        </div>

        @endif




        {{-- Documentos EXterns --}}

        @if ($tipo_informacion=='Documentos_externos')


        {{  Form::open(['action' => ['Apoyo\InformacionController@actualizar_info',$informacion->id_informacion],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <input type="hidden" name="tipo_informacion" value="{{$tipo_informacion}}">

        <input type="hidden" name="version" value="version">
        <input type="hidden" name="sis_gestion" value="sis_gestion">
        <input type="hidden" name="digital" value="digital">
        <input type="hidden" name="conservasion" value="conservasion">
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

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="form-group">
                            <label><strong>Descripción:</strong></label>
                            <textarea name="descripcion" rows="4" cols="150"
                                required="true">{{$informacion->descripcion}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Título del Documento:</strong></label>
                            <input type="text" name="tit_documento" class="form-control" required
                                value="{{$informacion->tit_documento}}">

                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Responsable:</strong></label>
                            <select name="responsable" class="form-control select2" required>
                                <option value="" selected="true" disabled="disabled"> Seleccione Reporte A..</option>
                                @foreach ($cargos as $cargo)
                                <option value="{{ $cargo->nom_cargo }}"
                                    {{ $cargo->nom_cargo == $informacion->responsable ? 'selected' : '' }}>
                                    {{ $cargo->nom_cargo }}</option>
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
                            <input type="text" name="lugar_archivo" class="form-control" required
                                value="{{$informacion->lugar_archivo}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>N° Copias:</strong></label>
                            <input type="number" name="no_copia" class="form-control" required
                                value="{{$informacion->no_copia}}">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Vigente:</strong></label>
                            <select name="vigente" class="form-control select2" required>
                                <option value="" selected="true" disabled="disabled"> Seleccione..</option>
                                <option value="1" @if($informacion->contralado == '1') selected @endif >Si</option>
                                <option value="2" @if($informacion->contralado == '2') selected @endif >No</option>
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
                                <option value="1" @if($informacion->contralado == '1') selected @endif >Si</option>
                                <option value="2" @if($informacion->contralado == '2') selected @endif >No</option>
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

                <button type="submit" class="btn btn-primary">Editar</button>

                <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
                {!!Form::close()!!}
                <br><br>
            </div>
        </div>

        @endif




        {{-- -----------------Registros---------- --}}
        @if ($tipo_informacion=='Registros')


        {{  Form::open(['action' => ['Apoyo\InformacionController@actualizar_info',$informacion->id_informacion],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <input type="hidden" name="tipo_informacion" value="{{$tipo_informacion}}">
        <input type="hidden" name="digital" value="digital">
        <input type="hidden" name="tit_documento" value="tit_documento">
        <input type="hidden" name="fecha_info" value="2010-10-10">
        <input type="hidden" name="vigente" value="0">
        <input type="hidden" name="contralado" value="0">
        <input type="hidden" name="no_copia" value="0">

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <div class="row">
                    <h4>Registros</h4>
                </div><br><br>
                <input type="hidden" name="tipo_informacion" value="{{$tipo_informacion}}">


                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Código:</strong></label>
                            <input type="text" name="codigo" class="form-control" required
                                value="{{$informacion->codigo}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Proceso:</strong></label>
                            <select name="proceso" class="form-control select2" required>
                                <option value="" selected="true" disabled="disabled"> Seleccione Reporte Proceso..
                                </option>
                                @foreach ($procesos as $proceso)
                                <option value="{{ $proceso->nom_proceso }}"
                                    {{ $proceso->nom_proceso == $informacion->proceso ? 'selected' : '' }}>
                                    {{ $proceso->nom_proceso }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Titulo del Registro:</strong></label>
                            <input type="text" name="tit_registro" class="form-control" required
                                value="{{$informacion->tit_registro}}">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label><strong>Versión:</strong></label>
                            <input type="number" name="version" class="form-control" required
                                value="{{$informacion->version}}">

                        </div>
                    </div>

                    <div class="col-md-9 col-sm-9 col-xs-12 col-lg-9">
                        <div class="form-group">
                            <label><strong>Descripción:</strong></label>
                            <textarea name="descripcion" rows="3" cols="110"
                                required="true">{{$informacion->descripcion}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <select name="responsable" class="form-control select2" required>
                                <option value="" selected="true" disabled="disabled"> Seleccione Reporte A..</option>
                                @foreach ($cargos as $cargo)
                                <option value="{{ $cargo->nom_cargo }}"
                                    {{ $cargo->nom_cargo == $informacion->responsable ? 'selected' : '' }}>
                                    {{ $cargo->nom_cargo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>lugar de Archivo final:</strong></label>
                            <input type="text" name="lugar_archivo" class="form-control" required
                                value="{{$informacion->lugar_archivo}}">



                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Disposición Digital:</strong></label>
                            <select name="digital" class="form-control select2" required>
                                <option value="" selected="true" disabled="disabled"> Seleccione..</option>
                                <option value="1" @if($informacion->digital == '1') selected @endif >Si</option>
                                <option value="2" @if($informacion->digital == '2') selected @endif >No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Como se Organiza:</strong></label>
                            <input type="text" name="organiza" class="form-control" required
                                value="{{$informacion->organiza}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Tiempo de Retención:</strong></label>
                            <input type="text" name="tie_retencion" class="form-control" required
                                value="{{$informacion->tie_retencion}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Disposicion Final:</strong></label>
                            <input type="text" name="dis_final" class="form-control" required
                                value="{{$informacion->dis_final}}">
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>conservasión:</strong></label>
                            <input type="text" name="conservasion" class="form-control" required
                                value="{{$informacion->conservasion}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Sistema de Gestión:</strong></label>
                            <select name="sis_gestion" class="form-control select2" required>
                                <option value="" selected="true" disabled="disabled"> Seleccione Gestión..</option>
                                @foreach ($sistema_gestiones as $sistema_gestion)
                                <option value="{{ $sistema_gestion->str_nombre }}"
                                    {{ $sistema_gestion->str_nombre == $informacion->sis_gestion ? 'selected' : '' }}>
                                    {{ $sistema_gestion->str_nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Archivo:</strong></label>
                            <input type="file" name="archivo" class="form-control">

                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Editar</button>

                <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
                {!!Form::close()!!}
            </div>
        </div>

        @endif

        @endsection




        @push('scripts')
        <script type="text/javascript">
            // In your Javascript (external .js resource or <script> tag)

            $('.input-number').on('input', function () {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

        </script>
        @endpush
