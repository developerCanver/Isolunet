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
        <p class="mg-b-0">Control de procesos producto y servicios suministrados externamente</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">

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
        @include('partials.message_flash')

        <form action="{{route('producto_servicio.store')}}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Proveedor:</strong></label>
                        <select id="proveedor" name="id_proveedor" class="form-control" required>
                            <option selected="true" disabled="disabled">Seleccione Proveedor
                            </option>
                            @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id_proveedor }}">
                                {{ $proveedor->nom_proveedor }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Insumo:</strong></label>
                        <select id="insumo" name="fk_insumo" class="form-control" required>
                        </select>
                    </div>
                </div>

            </div>
            <br>
            <h5 style="color: rgb(82, 82, 82)">Calidad</h5>
            <div class="row"> 
                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label for="datos">El insumo o servicio en su utilización puede causar un impacto en el cumplimiento de las especificaciones del producto?</label>
                        <input type="text" class="form-control" name="calidad_n1"  >
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label for="datos">El insumo o servicio en su utilización puede generar un incumplimiento de los requisitos legales que ocasione reclamaciones o sanciones significativas a la empresa?</label>
                        <input type="text" class="form-control" name="calidad_n2"  >
                    </div>
                </div>
            </div>
            <br>
        			
            <h5 style="color: rgb(82, 82, 82)">Ambiental</h5>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label for="datos">El insumo o servicio en su utilización puede causar un impacto ambiental significativo?</label>
                        <input type="text" class="form-control" name="ambiental_n1"  >
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label for="datos">El insumo o servicio en su utilización puede generar un incumplimiento de la ley ambiental, que ocasione sanciones significativas al Ingenio?</label>
                        <input type="text" class="form-control" name="ambiental_n2"  >
                    </div>
                </div>
            </div>
            <br>
            <h5 style="color: rgb(82, 82, 82)">SST</h5>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label for="datos">El insumo o servicio en su utilización puede causar en forma significativa un accidente de trabajo o enfermedad general en las personas?</label>
                        <input type="text" class="form-control" name="sst_n1"  >
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label for="datos">El insumo o servicio en su utilización puede generar un incumplimiento de ley en Seguridad y Salud en el Trabajo, que ocasione sanciones significativas al Ingenio?</label>
                        <input type="text" class="form-control" name="sst_n2"  >
                    </div>
                </div>
            </div>
            <br>
            <h5 style="color: rgb(82, 82, 82)">Inocuidad</h5>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label for="datos">El insumo o servicio en su utilización puede impactar en forma directa las Especificaciones de inocuidad del producto establecidas por la ley o pactadas con los clientes ?</label>
                        <input type="text" class="form-control" name="inocuidad_n1"  >
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label for="datos">El insumo o servicio en su utilización puede generar riesgos de inocuidad en el producto final, que causen daño a la salud de los consumidores?</label>
                        <input type="text" class="form-control" name="inocuidad_n2"  >
                    </div>
                </div>
            </div>
            <br>
            		
            <h5 style="color: rgb(82, 82, 82)">BASIC</h5>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label for="datos">El insumo o servicio en su utilización puede generar un riesgo significativo de contaminación con sustancias ilícitas en el producto terminado?</label>
                        <input type="text" class="form-control" name="basic_n1"  >
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label for="datos">El insumo o servicio en su utilización puede generar un incumplimiento de ley en la cadena logística de suministro hacia el cliente, que ocasione sanciones significativas al Ingenio?</label>
                        <input type="text" class="form-control" name="basic_n2"  >
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
                        <input type="text" class="form-control" name="compra"  >
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                    <div class="form-group">
                        <label for="datos">Transporte</label>
                        <input type="text" class="form-control" name="transporte"  >
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                    <div class="form-group">
                        <label for="datos">Recibo</label>
                        <input type="text" class="form-control" name="recibo"  >
                    </div>
                </div>
            </div>
            					
            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                    <div class="form-group">
                        <label for="datos">Almacenamiento</label>
                        <input type="text" class="form-control" name="almacenamiento"  >
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                    <div class="form-group">
                        <label for="datos">Uso</label>
                        <input type="text" class="form-control" name="uso"  >
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                    <div class="form-group">
                        <label for="datos">Disposición Final</label>
                        <input type="text" class="form-control" name="final"  >
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>

            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
            {!!Form::close()!!}
            <br><br>

            <div class="br-section-wrapper">
                <div class="row">
                    <h4>Lista De Control de procesos producto y servicios suministrados externamente</h4>
                </div>
             <div class="row">
                    <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                        <div class="table-responsive">
                            @if ($consultas->isNotEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Insumo </th>
                                        <th colspan="2">Calidad </th>
                                        <th colspan="2">Ambiental</th>
                                        <th colspan="2"> SST</th>
                                        <th colspan="2"> Inocuidad </th>
                                        <th colspan="2">Basic</th>
                                        <th colspan="2"></th>
                                    </tr>
                                    <tr>
                                        <th> </th>
                                        <th>N.º1</th>
                                        <th>N.º2</th>
                                        <th>N.º1</th>
                                        <th>N.º2</th>
                                        <th>N.º1</th>
                                        <th>N.º2</th>
                                        <th>N.º1</th>
                                        <th>N.º2</th>
                                        <th>N.º1</th>
                                        <th>N.º2</th>
                                     

                                        <th colspan="2">Opciones</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach ($consultas as $consulta)

                                    <tr>
                                        <td>{{$consulta->nom_insumo}}</td>
                                        <td>{{$consulta->calidad_n1}}</td>
                                        <td>{{$consulta->calidad_n2}}</td>
                                        <td>{{$consulta->ambiental_n1}}</td>
                                        <td>{{$consulta->ambiental_n2}}</td>
                                        <td>{{$consulta->sst_n1}}</td>
                                        <td>{{$consulta->sst_n2}}</td>
                                        <td>{{$consulta->inocuidad_n1}}</td>
                                        <td>{{$consulta->inocuidad_n2}}</td>
                                        <td>{{$consulta->basic_n1}}</td>
                                        <td>{{$consulta->basic_n2}}</td>
                                    
                                       
                                        <td>
                                            <div class="form-row align-items-center">
                                                <a
                                                    href="{{ URL::action('Planeacion\ProductoServicioController@edit',$consulta->id_pro_servicio) }}"><i
                                                        class=" form-inline fas fa-pencil-alt fa-2x"
                                                        style="color:#18A4B4;"></i></a>

                                                <form
                                                    action="{{route('producto_servicio.destroy', $consulta->id_pro_servicio)}}"
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
</div>

<script src="/js/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#proveedor').on('change', function () {
            var id_proveedor = $(this).val();
            //console.log(id_proveedor);
            $('#insumo').empty();
            if ($.trim(id_proveedor) != '') {
                $.get('/insumos', {
                    id_proveedor: id_proveedor
                }, function (insumos) {
                    $('#insumo').empty();
                    $('#insumo').append(
                        "<option value='' >Seleccionar insumo</option>");
                    $.each(insumos, function (index, value) {
                        $('#insumo').append("<option value='" + index + "'>" +
                            value + "</option>");
                    })
                });
            }
        });


    });

</script>
@endsection
@push('scripts')
<script type="text/javascript">
    // In your Javascript (external .js resource or <script> tag)

    $('.input-number').on('input', function () {
        tdis.value = tdis.value.replace(/[^0-9]/g, '');
    });

</script>
@endpush
