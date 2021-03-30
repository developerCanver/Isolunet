@extends('voyager::master')
<title>Sedes Y Cuartos</title>

@section('css')

    @include('voyager::compass.includes.styles')

@stop
<script type="text/javascript">
    var i = 1;

    function nuevos() {

        i++;
        $('#dynamic_field').append('<tr id="row' + i +
            '"><td><h5>Sede ' + i +
            '</h5><strong>Cantidad De Sistemas De Refrigeración: </strong><input type="number" name="name[]" id="name" class="form-control name_list" required required="true"/></td><td><input type="button" name="remove" id="' +
            i + '" class="btn btn-danger btn_remove" value="Eliminar" onclick="eliminar(this.id);"></td></tr>');
    };

    function eliminar(clicked_id) {
        var button_id = clicked_id;
        $("#row" + button_id + "").remove();
    };

</script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-file-text"></i>
            <p> {{ __('Agregar Sedes Y Sistemas') }}</p>
        </h1>
    </div>
@stop
@section('content')
    <div class="page-content edit-add ">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form autocomplete="off" class="form-edit-add" method="POST"
                            action="{{ route('storeSedesCuartos') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label><strong>Cliente:</strong></label>
                                                <select id="cliente_id" name="cliente_id" class="form-control" required="true">
                                                    <option disabled selected value="">Seleccione El Cliente</option>
                                                    @foreach ($clientes as $cliente)
                                                        <option value="{{ $cliente->id }}">
                                                            {{ $cliente->razon_social }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <table class="table table-bordered" id="dynamic_field">
                                                    <tr>
                                                        <td>
                                                            <h5>Sede 1</h5>
                                                            <strong>Cantidad De Sistemas De Refrigeración </strong> <input type="number"
                                                                name="name[]" id="name" class="form-control name_list" required required="true" />
                                                        </td>
                                                        <td><input type="button" name="nuevo" id="nuevo"
                                                                class="btn btn-success" value="Añadir Nueva Sede"
                                                                onclick="nuevos();"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Agregar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
