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
                <div class="col-md-7 col-sm-7 col-xs-12 col-lg-7">
                    <div class="form-group">
                        <label><strong>Nombre de Acta:</strong></label>
                        <input type="text" required name="acta" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Archivo Acta:</strong></label>
                        <input type="file"  name="archivo" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Sistema de Gestión:</strong></label>
                        <select name="gestion[]" class="form-control select2" required multiple>

                            @foreach ($gestiones as $gestion)
                            <option value="{{ $gestion->id_sisgestion }}">{{ $gestion->str_nombre }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
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
                        <input type="text" required class="form-control" name="tipo_acta">

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
                        <input type="date" name="fecha_proxima" class="form-control">
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
                        <input type="text" name="otros_user" class="form-control">
                    </div>
                </div>
            </div>
        

            @livewire('mejora.acta-temas', ['post' => null ])


            @livewire('mejora.acta-acciones', ['post' => null ])

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>



        <br>
        <h5 style="color: rgb(82, 82, 82)">Lista Actas </h5>
        <div class="mb-2"></div>
        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
            <div class="row">

                <nav class="navbar navbar-light ">
                    <form class="form-inline" action="{{route('acta.index')}}" method="GET">
                        <input class="form-control" value="{{$busqueda}}" name="buscador" type="search"
                            placeholder="Buscar Tipo Reunión" aria-label="Search">
                        <button title="Buscar Tipo Reunión o Código Acta" class="btn btn-outline-info  my-2 my-sm-0"
                            type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </nav>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($consultas->isNotEmpty())

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Codigo Acta:</th>
                                <th>Tipo Reunión</th>
                                <th>Nombre Acta</th>
                                <th>Fecha</th>
                                <th>Lugar</th>
                                <th>Hora</th>
                                <th>Próxima Reunion</th>
                                <th>Registrado por</th>
                                <th>Archivo</th>
                                <th>Accion</th>
                                <th>Responsable</th>

                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($consultas as $consulta)

                            @php
                            if ($consulta->terminada == 1 ) {
                            $color="style=background:#ecf7f2";
                            } else {
                            $color="";
                            }
                            @endphp


                            <tr>
                                <td {{$color}}>{{$consulta->id_acta}}</td>
                                <td {{$color}}>{{$consulta->tipo_acta}}</td>
                                <td {{$color}}>{{$consulta->acta}}</td>

                                <td {{$color}}>{{$consulta->fecha_acta}}</td>
                                <td {{$color}}>{{$consulta->lugar}}</td>
                                <td {{$color}}>{{$consulta->hora_acta}}</td>
                                <td {{$color}}>{{$consulta->fecha_proxima}}</td>
                                <td {{$color}}>{{$consulta->registrado}}</td>

                                @if ($consulta->archivo)
                                <td {{$color}}>{{substr(($consulta->archivo), 10)}}
                                    <a title="Descargar Archivo" href="/archivos/acta/{{$consulta->archivo}}"
                                        class="btn btn-light" download="{{$consulta->archivo}}"
                                        style="color: rgb(53, 87, 53); font-size:18px; font-size:18px; font-size: 25px;""> <i
                                            class=" fas fa-file-download "></i></a>
                            </td>
                        @else
                        <td  {{$color}}>No existe</td>
                        @endif
                          
                        <td {{$color}}>{{$consulta->accion}}</td>
                        <td {{$color}}>{{$consulta->responsable}}</td>
                              
                            <td>
                                <div class=" form-row align-items-center">
                                        <a href="{{ URL::action('mejora\ActaController@edit',$consulta->id_acta   ) }}"><i
                                                class=" form-inline fas fa-pencil-alt fa-2x"
                                                style="color:#18A4B4;"></i></a>

                                        <form action="{{route('acta.destroy',$consulta->id_acciones   )}}"
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
    CKEDITOR.replace('accion_');

    $('.input-number').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

</script>


@endsection
