@extends('layouts.dashboard')

@section('content')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Operación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Trazabilidad</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Trazabilidad </a>
        </h4>
        <p class="mg-b-0">Operación</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('trazabilidad.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>
            <br><br>

            <input type="hidden" name="fk_empresa" class="form-control" required value="{{$empresa->id_empresa}}">

            <h5 style="color: rgb(46, 46, 46);">Trazabilidad</h5>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Fecha de Trazabilidad:</strong></label>
                        <input type="date" required name="fecha_trazabilidad" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Identificación producto/servicio terminado:</strong></label>
                        <input type="text" required name="terminado" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Cliente destino:</strong></label>
                        <input type="text" required name="cliente_destino" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Orden de compra/servicio:</strong></label>
                        <input type="text" required name="orden_compra" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Orden de producción/servicio:</strong></label>
                        <input type="text" required name="orden_produccion" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Fecha de producción/servicio:</strong></label>
                        <input type="date" required name="fecha_produccion" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Unidades o servicios producidos:</strong></label>
                        <input type="text" required name="unidades" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Materias Primas o Insumos Utilizados:</strong></label>
                        <input type="text" required name="utilizados" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Identificación de Materias primas o Insumos utilizados (lote / Serie /
                                N°)</strong></label>
                        <input type="text" required name="utilizados_lotes" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Proveedor de Materias primas o Insumos utilizados:</strong></label>
                        <input type="text" required name="provedor_materias" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Cantidad:</strong></label>
                        <input type="text" required name="cantidad" class="form-control">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Destino del producto:</strong></label>
                        <input type="text" required name="destino_producto" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Fecha de Entrega:</strong></label>
                        <input type="date" required name="fecha_entrega" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Cantidad Entregada:</strong></label>
                        <input type="number" required name="cantidad_entrega" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Empresa o Persona que entrega el producto/servicio:</strong></label>
                        <input type="text" required name="entrega" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Archivo:</strong></label>
                        <input type="file" name="archivo_tra" >
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12 col-lg-8">
                    <div class="form-group">
                        <label><strong>Observaciones:</strong></label>
                        <textarea name="observaciones_trazabilidad" rows="2" cols="90" required="true"></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>


        <br>
        <br>
        <h5 style="color: rgb(82, 82, 82)">Lista Trazabilidad </h5>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($consultas->isNotEmpty())

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha de Trazabilidad:</th>
                                <th>Producto terminado:</th>
                                <th>Cliente destino</th>
                                <th>Orden de compra</th>
                                <th>Orden de producción</th>
                                <th>Fecha de producción</th>
                                <th>Archivo</th>
                             


                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($consultas as $consulta)


                            <tr>
                                <td>{{$consulta->fecha_trazabilidad}}</td>
                                <td>{{$consulta->terminado}}</td>
                                <td>{{$consulta->cliente_destino}}</td>
                                <td>{{$consulta->orden_compra}}</td>
                                <td>{{$consulta->orden_produccion}}</td>
                                <td>{{$consulta->fecha_produccion}}</td>
                                @if ($consulta->archivo_tra)
                                <td>{{ substr(($consulta->archivo_tra), 10)}}    
                                    <a title="Descargar Archivo" href="/archivos/trazabilidad/{{$consulta->archivo_tra}}" class="btn btn-light"
                                    download="{{$consulta->archivo_tra}}" style="color: rgb(53, 87, 53); font-size:18px; font-size:18px; font-size: 25px;""> <i
                                        class="fas fa-file-download "></i></a></td>
                                @else
                                <td>No existe</td>
                                @endif
                               
                              
                                <td>
                                    <div class=" form-row align-items-center">
                                        <a
                                            href="{{ URL::action('Planeacion\TrazabilidadController@edit',$consulta->id_trazabilidad   ) }}"><i
                                                class=" form-inline fas fa-pencil-alt fa-2x"
                                                style="color:#18A4B4;"></i></a>

                                        <form action="{{route('trazabilidad.destroy',$consulta->id_trazabilidad   )}}"
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
