@extends('layouts.dashboard')

@section('content')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Mejora</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Acta</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Mejora</a>
        </h4>
        <p class="mg-b-0">Acta</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('acta.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>
            <br><br>

            <input type="hidden" name="fk_empresa" class="form-control" required value="{{$empresa->id_empresa}}">

            <h5 style="color: rgb(46, 46, 46);">Acta</h5>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Nombre de Acta:</strong></label>
                        <input type="text" required name="acta" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Sistema de Gestión:</strong></label>
                        <select name="gestion[]" class="form-control select2" required multiple>

                            @foreach ($gestiones as $gestion)
                            <option value="{{ $gestion->id_sisgestion }}">{{ $gestion->str_nombre }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Proceso:</strong></label>
                        <select name="proceso[]" class="form-control select2" required multiple>                           
                            @foreach ($procesos as $proceso)
                            <option value="{{ $proceso->id_proceso }}">{{ $proceso->nom_proceso }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <h5 style="color: rgb(46, 46, 46);">Información de Reunión</h5>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Tipo Reunión:</strong></label>
                        <input type="text" class="form-control" name="tipo_acta">
                       
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Fecha:</strong></label>
                        <input type="date" required name="fecha_acta" class="form-control" value="{{date("Y-m-d") }}">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>lugar:</strong></label>
                        <input type="text" required name="lugar" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Hora:</strong></label>
                        <input type="text" required name="hora_acta" class="form-control" value="{{date("H:i:s") }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Fecha Próxima Reunión:</strong></label>
                        <input type="date"  name="fecha_proxima" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Registrado por</strong></label>
                        <input type="text" required name="registrado" class="form-control"
                            value="{{ Auth::User()->name }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label><strong>Observaciones:</strong></label>
                        <textarea name="observaciones_acta" class="form-control" required="true"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Usuarios:</strong></label>
                        <select name="fk_user[]" class="form-control select2" required multiple>                           
                            @foreach ($usuarios as $user)
                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Otros Usuarios:</strong></label>
                        <label for="datos"><strong>Otros Usuarios:</strong></label>
                        <input type="text" name="otros_user" class="form-control" >
                    </div>
                </div>
            </div>
            {{-- @ livewire('mejora.acta-asistentes', ['post' => null ]) --}}

            @livewire('mejora.acta-temas', ['post' => null ])

            <h5 class="pt-3" style="color: rgb(46, 46, 46);">Acciones y Compromisos</h5>


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                       
                        <textarea name="accion"
                            id="editor1"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
           
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Responsable:</strong></label>
                        <select name="responsable" class="form-control " required>
                            <option selected disabled value="">Seleccione Usuario...</option>
                            @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->name }}">{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Fecha Inicio:</strong></label>
                        <input type="date" required name="fecha_inicio_acc" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Fecha Final:</strong></label>
                        <input type="date" required name="fecha_final_acc" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Archivo:</strong></label>
                        <input type="file"  name="archivo"  class="form-control" >
                    </div>
                </div>
            </div>

            {{-- <h5 class="pt-3" style="color: rgb(46, 46, 46);">Ejecucción de Compromisos</h5>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Compromiso:</strong></label>
                        <input type="text" required name="compromiso" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Acción Ejecutable:</strong></label>
                        <input type="text" required name="ejecutable" class="form-control">
                   
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Fecha Inicio:</strong></label>
                        <input type="date" required name="fecha_inicio_eje" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Fecha Final:</strong></label>
                        <input type="date" required name="fecha_final_eje" class="form-control">
                    </div>
                </div>
                			
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Archivo:</strong></label>
                        <input type="file"  name="archivo" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label><strong>Observaciones Ejecucción:</strong></label>
                        <textarea name="observaciones_ejecuccion" rows="2" cols="140" required="true"></textarea>
                    </div>
                </div>
            </div> --}}


            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>


        <br>
        <br>
        <h5 style="color: rgb(82, 82, 82)">Lista Actas </h5>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($consultas->isNotEmpty())

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Codigo Acta:</th>
                                <th>Nombre Acta</th>
                          
                                <th>Tipo Acta</th>
                                <th>Fecha</th>
                                <th>Lugar</th>
                                <th>Hora</th>
                                <th>Próxima Reunion</th>
                                <th>Registrado por</th>
                                <th>Archivo</th>

                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($consultas as $consulta)

                            @if ($consulta->terminada == 0)
                            <tr>
                                <td>{{$consulta->id_acta}}</td>
                                <td>{{$consulta->acta}}</td>
                             
                                <td>{{$consulta->tipo_acta}}</td>
                                <td>{{$consulta->fecha_acta}}</td>
                                <td>{{$consulta->lugar}}</td>
                                <td>{{$consulta->hora_acta}}</td>
                                <td>{{$consulta->fecha_proxima}}</td>
                                <td>{{$consulta->registrado}}</td>

                                @if ($consulta->archivo)
                                <td>{{substr(($consulta->archivo), 10)}}
                                    <a title="Descargar Archivo" href="/archivos/acta/{{$consulta->archivo}}"
                                        class="btn btn-light" download="{{$consulta->archivo}}"
                                        style="color: rgb(53, 87, 53); font-size:18px; font-size:18px; font-size: 25px;""> <i
                                        class=" fas fa-file-download "></i></a></td>
                                @else
                                <td>No existe</td>
                                @endif
                       
                              
                                <td>
                                    <div class=" form-row align-items-center">
                                        <a href="{{ URL::action('mejora\ActaController@edit',$consulta->id_acta   ) }}"><i
                                                class=" form-inline fas fa-pencil-alt fa-2x"
                                                style="color:#18A4B4;"></i></a>

                                        <form action="{{route('acta.destroy',$consulta->id_acta   )}}"
                                            class="form-inline formulario-eliminar" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button class=" btn btn-light btn-sm">
                                                <i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i>
                                            </button>
                                        </form>
                                 </div>

                                </td>
                            </tr>
                       
                                
                            @else

                            <tr>
                                <td  style="background: #b6ffde;">{{$consulta->id_acta}}</td>
                                <td  style="background: #b6ffde;">{{$consulta->acta}}</td>
                                <td  style="background: #b6ffde;">{{$consulta->gestion}}</td>
                                <td  style="background: #b6ffde;">{{$consulta->proceso}}</td>
                                <td  style="background: #b6ffde;">{{$consulta->tipo_acta}}</td>
                                <td  style="background: #b6ffde;">{{$consulta->fecha_acta}}</td>
                                <td  style="background: #b6ffde;">{{$consulta->lugar}}</td>
                                <td  style="background: #b6ffde;">{{$consulta->hora_acta}}</td>
                                <td  style="background: #b6ffde;">{{$consulta->fecha_proxima}}</td>
                                <td  style="background: #b6ffde;">{{$consulta->registrado}}</td>

                                @if ($consulta->archivo)
                                <td  style="background: #b6ffde;">{{substr(($consulta->archivo), 10)}}
                                    <a title="Descargar Archivo" href="/archivos/acta/{{$consulta->archivo}}"
                                        class="btn btn-light" download="{{$consulta->archivo}}"
                                        style="color: rgb(53, 87, 53); font-size:18px; font-size:18px; font-size: 25px;""> <i
                                        class=" fas fa-file-download "></i></a></td>
                                @else
                                <td  style="background: #b6ffde;">No existe</td>
                                @endif
                              
                                <td >
                                    <div class=" form-row align-items-center">
                                        <a href="{{ URL::action('mejora\ActaController@edit',$consulta->id_acta   ) }}"><i
                                                class=" form-inline fas fa-pencil-alt fa-2x"
                                                style="color:#18A4B4;"></i></a>

                                        <form action="{{route('acta.destroy',$consulta->id_acta   )}}"
                                            class="form-inline formulario-eliminar" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button class=" btn btn-light btn-sm">
                                                <i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i>
                                            </button>
                                        </form>
                                 </div>

                                </td>
                            </tr>

                            @endif
                @endforeach

                </tbody>
                </table>
                {{ $consultas->links() }}
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

<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>


<script type="text/javascript">
    // In your Javascript (external .js resource or <script> tag)

    CKEDITOR.replace('accion');

    $('.input-number').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

</script>


@endsection
