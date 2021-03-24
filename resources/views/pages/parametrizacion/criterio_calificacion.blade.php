@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="#">Parametrizacion</a>
        <span class="breadcrumb-item active">Calificar Proveedores</span>
    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Criterios de Calificación</h4>
        <p class="mg-b-0">Calificación</p>
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
        {{  Form::open(['action' => 'Parametrizacion\CriteroCalificacionController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Proveedor:</strong></label>
                    <select id="proveedor" name="id_proveedor" class="form-control">
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
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <div class="form-group">
                        <label><strong>Insumo:</strong></label>
                        <select id="insumo" name="fk_insumo" class="form-control" required>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <div class="form-group">
                        <label><strong>Calificación proveedor :</strong></label>
                        <select id="cal_proveedor" name="fk_cal_proveedor" class="form-control" required>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">Fecha a Evaluar</label>
                    <input type="date" class="form-control" name="fecha_calificacion" id="fecha_calificacion" required>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">Promedio Reevaluación / Si = 5, No = 1</label>
                    <select name="pro_reevaluacion" id="pro_reevaluacion" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="5">Si</option>
                        <option value="1">No</option>
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
                            <thead>
                                <tr>
                                    <th>ID Calificacion </th>
                                    <th> Nombre Proveedor </th>
                                    <th> Insumo</th>
                                    <th>Fecha  </th>
                                    <th>Reevaluación</th>
                                    <th> Promedio</th>
                                    <th> Cumple? </th>
                                    <th colspan="2"> Opciones </th>
                                </tr>
                            </thead>
                           <tbody>

                                @foreach($consultas as $consulta)
                                <tr>
                                    <td> ID {{ $consulta->fk_cal_proveedor   }}</td> 
                                   
                                    <td>{{ $consulta->nom_proveedor }}</td>
                                    <td>{{ $consulta->nom_insumo }}</td>
                                    <td>{{ $consulta->fecha_calificacion }}</td>
                                    <td>@if ($consulta->pro_reevaluacion ==5)
                                            Si 
                                        @else
                                            No 
                                        @endif 
                                    </td>
                                    <td> {{$consulta->promedio}} </td>
                                    
                                    <td>
                                        @if ($consulta->promedio >=3 )
                                            <b>cumple</b>
                                        @else
                                            No cumple
                                        @endif 
                                       
                                    </td>

                                    <td colspan="2">
                                        <a href="{{ URL::action('Parametrizacion\CriteroCalificacionController@edit',$consulta->id_cri_calificacion  ) }}"><i
                                                class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
                                        <a href="{{ URL::action('Parametrizacion\CriteroCalificacionController@destroy',$consulta->id_cri_calificacion  ) }}"><i
                                                class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
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
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#proveedor').on('change', function () {
            var id_proveedor = $(this).val();
            //console.log(id_proveedor);
            $('#insumo').empty();
            $('#cal_proveedor').empty();
            if ($.trim(id_proveedor) != '') {
                $.get('/calificaion_evaluados', {
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

        $('#insumo').on('change', function () {
            var id_calificacion = $(this).val();
            //console.log(id_calificacion);
            //$('#insumo').empty();
            if ($.trim(id_calificacion) != '') {
                $.get('/calificaion_proveedor', {
                    id_calificacion: id_calificacion
                }, function (insumos) {
                    $('#cal_proveedor').empty();
                    $('#cal_proveedor').append(
                        "<option value='' >Seleccionar Calificación</option>");
                    $.each(insumos, function (index, value) {
                        $('#cal_proveedor').append("<option value='" + index + "'>N° " +
                            value + "</option>");
                    })
                });
            }
        });


    });

</script>

@push('scripts')
<script type="text/javascript">
    // In your Javascript (external .js resource or <script> tag)

    $('.input-number').on('input', function () {
        tdis.value = tdis.value.replace(/[^0-9]/g, '');
    });

</script>
@endpush
