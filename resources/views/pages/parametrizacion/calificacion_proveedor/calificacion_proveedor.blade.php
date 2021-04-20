@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="#">Operación</a>
        <span class="breadcrumb-item active">Calificar Proveedores</span>
    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Calificacion de Proveedores</h4>
        <p class="mg-b-0">Proveedores</p>
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
        {{  Form::open(['action' => 'Parametrizacion\CalificaionProveedorController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

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
    
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">Fecha a Evaluar</label>
                    <input type="date" class="form-control" name="fec_evaluar" id="fec_evaluar" required>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">Cumplimiento en Tiempo de entrega</label>
                    <select name="cum_entrega" id="cum_entrega" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">Cumplimiento en Items pedidos</label>
                    <select name="cum_pedidos" id="cum_pedidos" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="1% a 20%">1% a 20%</option>
                        <option value="21% a 40%">21% a 40%</option>
                        <option value="41% a 60%">41% a 60%</option>
                        <option value="61% a 80%">61% a 80%</option>
                        <option value="81% a 90%">81% a 90%</option>
                        <option value="100%">100%</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">Cumplimiento en precio</label>
                    <select name="cum_precios" id="cum_precios" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">Cumplimiento en Sevicio</label>
                    <select name="cum_servicios" id="cum_servicios" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">Cumplimiento productos / servicios conforme a especificaciones</label>
                    <select name="cum_productos" id="cum_productos" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="1% a 20%">1% a 20%</option>
                        <option value="21% a 40%">21% a 40%</option>
                        <option value="41% a 60%">41% a 60%</option>
                        <option value="61% a 80%">61% a 80%</option>
                        <option value="81% a 90%">81% a 90%</option>
                        <option value="100%">100%</option>
                    </select>
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>

        <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        {!!Form::close()!!}
        <br><br>

        <div class="br-section-wrapper">
            <div class="row">
                <h4>Listado De Proveedores Calificados</h4>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                    <div class="table-responsive">
                        <table class="table">

                            <tbody>
                                @foreach($consultas as $consulta)
                                <tr>
                                    <td rowspan="3">
                                        <b>N°{{$consulta->id_cal_proveedor}}</b>
                                    </td>
                                    <td>
                                        Insumo <br>
                                        <b> {{$consulta->nom_insumo}}</b>
                                    </td>
                                    <td>
                                        Proveedor <br>
                                        <b>{{$consulta->nom_proveedor}}</b>
                                    </td>
                                    <td>
                                        Fecha a Evaluar <br>
                                        <b>{{$consulta->fec_evaluar}}</b>
                                    </td>

                                    <td>
                                        Total
                                    </td>
                                    <td>
                                        Opciones
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Cumplimiento en tiempo de entrega <br>
                                        <b>{{$consulta->cum_entrega}}</b>
                                    </td>

                                    <td>
                                        Cumplimiento Items Pedidos <br>
                                        <b>{{$consulta->cum_pedidos}}</b>
                                    </td>
                                    <td>
                                        Cumplimiento en precio <br>
                                        <b>{{$consulta->cum_precios}}</b>
                                    </td>

                                    <td rowspan="2">
										<b>{{$consulta->total}}</b>
                                    </td>

                                    <td colspan="2">
                                        <a
                                            href="{{ URL::action('Parametrizacion\CalificaionProveedorController@edit',$consulta->id_cal_proveedor) }}"><i
                                                class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
                                        <a
                                            href="{{ URL::action('Parametrizacion\CalificaionProveedorController@destroy',$consulta->id_cal_proveedor) }}"><i
                                                class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Cumplimiento en servicios <br>
                                        <b>{{$consulta->cum_servicios}}</b>
                                    </td>


                                    <td colspan="2">
                                        Cumplimiento productos / servicios conforme a especificaciones <br>
                                        <b>{{$consulta->cum_productos}}</b>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#proveedor').on('change', function() {
            var id_proveedor = $(this).val();
            //console.log(id_proveedor);
            $('#insumo').empty();
            if ($.trim(id_proveedor) != '') {
                $.get('/calificaion', {
                    id_proveedor: id_proveedor
                }, function(insumos) {
                    $('#insumo').empty();
                    $('#insumo').append(
                        "<option value='' >Seleccionar insumo</option>");
                    $.each(insumos, function(index, value) {
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
