@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="#">Planeación</a>
        <span class="breadcrumb-item active">Producto y Servicios</span>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Planeación Producto y Servicios</h4>
        <p class="mg-b-0"> Editar Control de procesos producto y servicios suministrados externamente</p>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">

        <form action="{{ route('producto_servicio.update', $insumo->id_pro_servicio)}}" method="POST">
            @csrf
            @method('PUT')

            <h4>{{$insumo->razon_social}} </h4>

           <br><br>
           <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Proveedor:</strong></label>
                    <input type="text" class="form-control"  disabled value="{{$insumo->nom_proveedor}}"  >
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Insumo:</strong></label>
                    <input type="text" class="form-control" name="fk_insumo"  disabled  value="{{$insumo->nom_insumo}}" >
                </div>
            </div>

        </div>
        <br>
        <h5 style="color: rgb(82, 82, 82)">Calidad</h5>
        <div class="row"> 
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">El insumo o servicio en su utilización puede causar un impacto en el cumplimiento de las especificaciones del producto?</label>
                    <input type="text" class="form-control" name="calidad_n1"  value="{{$insumo->calidad_n1}}" >
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">El insumo o servicio en su utilización puede generar un incumplimiento de los requisitos legales que ocasione reclamaciones o sanciones significativas a la empresa?</label>
                    <input type="text" class="form-control" name="calidad_n2"   value="{{$insumo->calidad_n2}}" >
                </div>
            </div>
        </div>
        <br>
                
        <h5 style="color: rgb(82, 82, 82)">Ambiental</h5>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">El insumo o servicio en su utilización puede causar un impacto ambiental significativo?</label>
                    <input type="text" class="form-control" name="ambiental_n1"   value="{{$insumo->ambiental_n1}}" >
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">El insumo o servicio en su utilización puede generar un incumplimiento de la ley ambiental, que ocasione sanciones significativas al Ingenio?</label>
                    <input type="text" class="form-control" name="ambiental_n2"  value="{{$insumo->ambiental_n2}}" >
                </div>
            </div>
        </div>
        <br>
        <h5 style="color: rgb(82, 82, 82)">SST</h5>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">El insumo o servicio en su utilización puede causar en forma significativa un accidente de trabajo o enfermedad general en las personas?</label>
                    <input type="text" class="form-control" name="sst_n1"  value="{{$insumo->sst_n1}}">
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">El insumo o servicio en su utilización puede generar un incumplimiento de ley en Seguridad y Salud en el Trabajo, que ocasione sanciones significativas al Ingenio?</label>
                    <input type="text" class="form-control" name="sst_n2"   value="{{$insumo->sst_n2}}">
                </div>
            </div>
        </div>
        <br>
        <h5 style="color: rgb(82, 82, 82)">Inocuidad</h5>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">El insumo o servicio en su utilización puede impactar en forma directa las Especificaciones de inocuidad del producto establecidas por la ley o pactadas con los clientes ?</label>
                    <input type="text" class="form-control" name="inocuidad_n1"   value="{{$insumo->inocuidad_n1}}">
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">El insumo o servicio en su utilización puede generar riesgos de inocuidad en el producto final, que causen daño a la salud de los consumidores?</label>
                    <input type="text" class="form-control" name="inocuidad_n2"  value="{{$insumo->inocuidad_n2}}">
                </div>
            </div>
        </div>
        <br>
                
        <h5 style="color: rgb(82, 82, 82)">BASIC</h5>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">El insumo o servicio en su utilización puede generar un riesgo significativo de contaminación con sustancias ilícitas en el producto terminado?</label>
                    <input type="text" class="form-control" name="basic_n1"  value="{{$insumo->basic_n1}}">
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">El insumo o servicio en su utilización puede generar un incumplimiento de ley en la cadena logística de suministro hacia el cliente, que ocasione sanciones significativas al Ingenio?</label>
                    <input type="text" class="form-control" name="basic_n2"  value="{{$insumo->basic_n2}}">
                </div>
            </div>
        </div>

        <br>
        <h5 style="color: rgb(82, 82, 82)">Controles</h5>
        <h6 style="color: rgb(82, 82, 82)">Ciclo de vida del Pruducto</h6>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                <div class="form-group">
                    <label for="datos">Compra</label>
                    <input type="text" class="form-control" name="compra"  value="{{$insumo->compra}}">
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                <div class="form-group">
                    <label for="datos">Transporte</label>
                    <input type="text" class="form-control" name="transporte"  value="{{$insumo->transporte}}">
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                <div class="form-group">
                    <label for="datos">Recibo</label>
                    <input type="text" class="form-control" name="recibo"  value="{{$insumo->recibo}}">
                </div>
            </div>
        </div>
                            
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                <div class="form-group">
                    <label for="datos">Almacenamiento</label>
                    <input type="text" class="form-control" name="almacenamiento"  value="{{$insumo->almacenamiento}}">
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                <div class="form-group">
                    <label for="datos">Uso</label>
                    <input type="text" class="form-control" name="uso"  value="{{$insumo->uso}}">
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                <div class="form-group">
                    <label for="datos">Disposición Final</label>
                    <input type="text" class="form-control" name="final"   value="{{$insumo->final}}">
                </div>
            </div>
        </div>

     

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
    {!!Form::close()!!}
    <br>

</div>




@endsection
