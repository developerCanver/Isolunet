@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="#">Parametrizacion</a>
        <span class="breadcrumb-item active">Identificar Criticidad</span>
    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Identificar Criticidad</h4>
    </div>
</div><!-- d-flex -->
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
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
        {{  Form::open(['action' => 'Parametrizacion\CriticidadController@store','autocomplete'=>'off', 'metod' => 'POST', 'files' => true]) }}
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
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label for="datos">Antiguedad</label>
                    <select name="antiguedad" class="form-control select2" required>
                        <option value="">Seleccionar</option>
                        <option value="10">10</option>
                        <option value="5">5</option>
                        <option value="1">1</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label for="datos">Calidad</label>
                    <select name="calidad" class="form-control select2" required>
                        <option value="">Seleccionar</option>
                        <option value="10">10</option>
                        <option value="5">5</option>
                        <option value="1">1</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos">Ubicación</label>
                    <select name="ubicacion" class="form-control select2" required>
                        <option value="">Seleccionar</option>
                        <option value="10">10</option>
                        <option value="5">5</option>
                        <option value="1">1</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos">Servicio postventa</label>
                    <select name="postventa" class="form-control select2" required>
                        <option value="">Seleccionar</option>
                        <option value="10">10</option>
                        <option value="5">5</option>
                        <option value="1">1</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos">Calificación Total</label>
                    <input type="text" class="form-control" id="cal_total" name="cal_total" aria-describedby=""
                        value="{{ old('cal_total') }}" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        {!!Form::close()!!}
        <br>

        <div class="br-section-wrapper">
            <div class="row">
                <h4>Listado de Criticidad</h4>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        Proveedor
                                    </th>
                                    <th>
                                        Insumo
                                    </th>
                                    <th>
                                        Antiguedad
                                    </th>
                                    <th>
                                        Calidad
                                    </th>
                                    <th>
                                        Ubicación
                                    </th>
                                    <th>
                                        Servicio postventa
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <th colspan="2">
                                        Opciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($criticidades as $criticidad)
                                <tr>
                                    <td>{{ $criticidad->nom_proveedor }}</td>
                                    <td>{{ $criticidad->nom_insumo }}</td>
                                    <td>{{ $criticidad->antiguedad }}</td>
                                    <td>{{ $criticidad->calidad }}</td>
                                    <td>{{ $criticidad->ubicacion }}</td>
                                    <td>{{ $criticidad->postventa }}</td>
                                    <td>{{ $criticidad->cal_total }}</td>

                                    <td colspan="2">
                                        <a
                                            href="{{ URL::action('Parametrizacion\CriticidadController@edit',$criticidad->id_criticidad) }}"><i
                                                class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
                                        <a
                                            href="{{ URL::action('Parametrizacion\CriticidadController@destroy',$criticidad->id_criticidad) }}"><i
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#proveedor').on('change', function() {
            var id_proveedor = $(this).val();
            //console.log(id_proveedor);
            $('#insumo').empty();
            if ($.trim(id_proveedor) != '') {
                $.get('/proveedores', {
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