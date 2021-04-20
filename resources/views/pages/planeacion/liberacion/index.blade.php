@extends('layouts.dashboard')

@section('content')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Operación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Liberación de los Productos</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Liberación Productos y Servicios </h4>z
        <p class="mg-b-0">Operación</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('liberacion.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>
            <br><br>

            <input type="hidden" name="fk_empresa" class="form-control" required value="{{$empresa->id_empresa}}">

            <h5 style="color: rgb(46, 46, 46);">Liberación de Productos/Servicios</h5>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Producto/Servicio:</strong></label>
                        <select name="fk_producto" class="form-control select2" required>
                            <option selected disabled value=""> Seleccione Producto..</option>
                            @foreach ($Productos as $Producto)
                            <option value="{{ $Producto->id_producto  }}">{{ $Producto->str_producto }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Cliente Destino:</strong></label>
                        <select name="fk_cliente" class="form-control " required>
                            <option selected disabled value="">Seleccione Usuario...</option>
                            @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Lote/Serie/N°:</strong></label>
                        <input type="text" required name="lote" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Fecha de Realización:</strong></label>
                        <input type="date" required name="fecha_realizacion" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Quien realizó verificación:</strong></label>
                        <input type="text" required name="verificacion" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Quien liberó el producto / servicio:</strong></label>
                        <input type="text" required name="libero" class="form-control">
                    </div>
                </div>
            </div>
            												
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Requisitos exigidos por el cliente (criterios aceptación):</strong></label>
                        <input type="text" required name="exigido" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Resultados Obtenidos (monitoreo y medición del
                                producto/servicio):</strong></label>
                        <input type="text" required name="obtenido" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Indicación de cumplimiento de requisitos:</strong></label>
                        <input type="text" required name="indicacion" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Equipos de medición utilizados:</strong></label>
                        <input type="text" required name="equipo" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Condiciones ambientales del producto:</strong></label>
                        <input type="text" required name="condicion" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Evidencia Liberación:</strong></label>
                        <input type="file" name="evidencia" >
                    </div>
                </div>
            </div>



            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>


        <br>
        <br>
        <h5 style="color: rgb(82, 82, 82)">Lista Revisión por la Dirección </h5>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($consultas->isNotEmpty())

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto/Servicio</th>
                                <th>Cliente Destino</th>
                                <th>Lote/N°</th>
                                <th>Fecha</th>
                                <th>Quien realizó verificación</th>
                                <th>Quien liberó el producto</th>
                                <th>Requisitos exigidos</th>
                                <th>Resultados Obtenidos</th>
                                <th>Archivo</th>


                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($consultas as $consulta)


                            <tr>
                                <td>{{$consulta->str_producto}}</td>
                                <td>{{$consulta->name}}</td>
                                <td>{{$consulta->lote}}</td>
                                <td>{{$consulta->fecha_realizacion}}</td>
                                <td>{{$consulta->verificacion}}</td>
                                <td>{{$consulta->libero}}</td>
                                <td>{{$consulta->exigido}}</td>
                                <td>{{$consulta->obtenido}}</td>
                                @if ($consulta->evidencia)
                                <td>{{substr(($consulta->evidencia), 10)}}    
                                    <a title="Descargar Archivo" href="/archivos/liberacion/{{$consulta->evidencia}}" class="btn btn-light"
                                    download="{{$consulta->evidencia}}" style="color: rgb(53, 87, 53); font-size:18px; font-size:18px; font-size: 25px;""> <i
                                        class="fas fa-file-download "></i></a></td>
                                @else
                                <td>No existe</td>
                                @endif
                              
                                <td>
                                    <div class="form-row align-items-center">
                                        <a
                                            href="{{ URL::action('Planeacion\LiberacionController@edit',$consulta->id_liberacion  ) }}"><i
                                                class=" form-inline fas fa-pencil-alt fa-2x"
                                                style="color:#18A4B4;"></i></a>

                                        <form action="{{route('liberacion.destroy',$consulta->id_liberacion  )}}"
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

    CKEDITOR.replace('entrada_salida');

    $('.input-number').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

</script>


@endsection
