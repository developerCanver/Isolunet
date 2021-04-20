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
        <h4>Operación</h4>
        <p class="mg-b-0">Editar Trazabilidad</p>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">

        <form action="{{ route('trazabilidad.update', $consulta->id_trazabilidad  )}}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h4>{{$empresa->razon_social}} </h4>

            <br><br>
           
            <h5 style="color: rgb(46, 46, 46);">Trazabilidad</h5>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Fecha de Trazabilidad:</strong></label>
                        <input type="date" required name="fecha_trazabilidad" class="form-control" value="{{$consulta->fecha_trazabilidad}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Identificación producto/servicio terminado:</strong></label>
                        <input type="text" required name="terminado" class="form-control" value="{{$consulta->terminado}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Cliente destino:</strong></label>
                        <input type="text" required name="cliente_destino" class="form-control" value="{{$consulta->cliente_destino}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Orden de compra/servicio:</strong></label>
                        <input type="text" required name="orden_compra" class="form-control" value="{{$consulta->orden_compra}}">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Orden de producción/servicio:</strong></label>
                        <input type="text" required name="orden_produccion" class="form-control" value="{{$consulta->orden_produccion}}">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Fecha de producción/servicio:</strong></label>
                        <input type="date" required name="fecha_produccion" class="form-control" value="{{$consulta->fecha_produccion}}">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Unidades o servicios producidos:</strong></label>
                        <input type="text" required name="unidades" class="form-control" value="{{$consulta->unidades}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Materias Primas o Insumos Utilizados:</strong></label>
                        <input type="text" required name="utilizados" class="form-control" value="{{$consulta->utilizados}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Identificación de Materias primas o Insumos utilizados (lote / Serie /
                                N°)</strong></label>
                        <input type="text" required name="utilizados_lotes" class="form-control" value="{{$consulta->utilizados_lotes}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Proveedor de Materias primas o Insumos utilizados:</strong></label>
                        <input type="text" required name="provedor_materias" class="form-control" value="{{$consulta->provedor_materias}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Cantidad:</strong></label>
                        <input type="text" required name="cantidad" class="form-control" value="{{$consulta->cantidad}}">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Destino del producto:</strong></label>
                        <input type="text" required name="destino_producto" class="form-control" value="{{$consulta->destino_producto}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Fecha de Entrega:</strong></label>
                        <input type="date" required name="fecha_entrega" class="form-control" value="{{$consulta->fecha_entrega}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Cantidad Entregada:</strong></label>
                        <input type="number" required name="cantidad_entrega" class="form-control" value="{{$consulta->cantidad_entrega}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Empresa o Persona que entrega el producto/servicio:</strong></label>
                        <input type="text" required name="entrega" class="form-control" value="{{$consulta->entrega}}">
                    </div>
                </div>
            </div>
         
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Archivo:</strong></label>
                        <input type="file" name="archivo_tra">
                        <input type="hidden" name="archivo_tra_anterior" value="{{$consulta->archivo_tra}}">
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12 col-lg-8">
                    <div class="form-group">
                        <label><strong>Observaciones:</strong></label>
                        <textarea name="observaciones_trazabilidad" rows="2" cols="140" required="true">{{$consulta->observaciones_trazabilidad}}</textarea>
                   
                    </div>
                </div>
            </div>
           


 

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
    {!!Form::close()!!}
    <br>
</div>
</div>


<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>


<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)

 CKEDITOR.replace( 'entrada_salida' );

$('.input-number').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});

</script>

@endsection
