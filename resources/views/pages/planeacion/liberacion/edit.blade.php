@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Planeación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Liberación de los Productos</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Planeación</h4>
        <p class="mg-b-0">Editar Liberación de los Productos</p>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">

        <form action="{{ route('liberacion.update', $consulta->id_liberacion )}}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h4>{{$empresa->razon_social}} </h4>

            <br><br>
            <h5 style="color: rgb(46, 46, 46);">Liberación de Productos/Servicios</h5>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Producto/Servicio:</strong></label>
                        <select name="fk_producto" class="form-control select2" required>
                            <option selected disabled value=""> Seleccione Producto..</option>
                            @foreach ($Productos as $Producto)
                            <option value="{{ $Producto->id_producto }}" {{ $Producto->id_producto == $consulta->fk_producto ?  'selected' : ''}}>
                                {{ $Producto->str_producto }}</option>
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
                            <option value="{{ $usuario->id }}" {{ $usuario->id == $consulta->fk_cliente ?  'selected' : ''}}>
                                {{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Lote/Serie/N°:</strong></label>
                        <input type="text" required name="lote" class="form-control" value="{{$consulta->lote}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Fecha de Realización:</strong></label>
                        <input type="date" required name="fecha_realizacion" class="form-control"  value="{{$consulta->fecha_realizacion}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Quien realizó verificación:</strong></label>
                        <input type="text" required name="verificacion" class="form-control" value="{{$consulta->verificacion}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Quien liberó el producto / servicio:</strong></label>
                        <input type="text" required name="libero" class="form-control" value="{{$consulta->libero}}">
                    </div>
                </div>
            </div>
            												
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Requisitos exigidos por el cliente (criterios aceptación):</strong></label>
                        <input type="text" required name="exigido" class="form-control" value="{{$consulta->exigido}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Resultados Obtenidos (monitoreo y medición del
                                producto/servicio):</strong></label>
                        <input type="text" required name="obtenido" class="form-control" value="{{$consulta->obtenido}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Indicación de cumplimiento de requisitos:</strong></label>
                        <input type="text" required name="indicacion" class="form-control" value="{{$consulta->indicacion}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Equipos de medición utilizados:</strong></label>
                        <input type="text" required name="equipo" class="form-control" value="{{$consulta->equipo}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Condiciones ambientales del producto:</strong></label>
                        <input type="text" required name="condicion" class="form-control" value="{{$consulta->condicion}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Evidencia Liberación:</strong></label>
                        <input type="file" name="evidencia" >
                        <input type="hidden" name="evidencia_anterior" value="{{$consulta->evidencia}}">
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
