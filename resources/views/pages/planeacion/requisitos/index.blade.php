@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Planeación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Requisitos productos y servicios</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Requisitos productos y servicios</h4>
        <p class="mg-b-0">Planeación</p>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')
        <script type="text/javascript">
            var i = 1;

            function nuevos() {

                i++;
                $('#dynamic_field').append(
                    '<div class="card" style="padding: 10px 10px;"  id="row' + i + '"><h5>Química ' +
                    i + '</h5><div class="row">' +
                    '<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">' +
                    '<div class="form-group">' +
                    '<label><strong>Química:</strong></label>' +
                    '<input type="text" name="nombre_qui[]" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">' +
                    '<div class="form-group">' +
                    '<label><strong>Unidad:</strong></label>' +
                    '<input type="text" name="unidad_qui[]" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<input type="button" name="remove" id="' +
                    i +
                    '" class="btn btn-danger btn_remove btn-sm" value="Eliminar" onclick="eliminar(this.id);"> ' +
                    '</div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">' +
                    '<div class="form-group">' +
                    '<label><strong>Mínimo:</strong></label>' +
                    '<input type="text" name="minimo_qui[]" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">' +
                    '<div class="form-group">' +
                    '<label><strong>Máximo:</strong></label>' +
                    '<input type="text" name="maximo_qui[]" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">' +
                    '<div class="form-group">' +
                    '<label><strong>Método de Ensayo:</strong></label>' +
                    '<input type="text" name="metodo_qui[]" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            };

            function eliminar(clicked_id) {
                var button_id = clicked_id;
                $("#row" + button_id + "").remove();
            };

        </script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>


        <form action="{{route('productos_servicios.store')}}" method="POST">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>

            <div class="row">
            </div><br><br>

            <input type="hidden" name="fk_empresa" class="form-control" required value="{{$empresa->id_empresa}}">
            <br>

            <h5 style="color: rgb(82, 82, 82)">1. Nombre o Identificación</h5>
            <div class="row">

                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>producto:</strong></label>
                        <select name="fk_producto" class="form-control select2" required>
                            <option value="" selected="true"=""> Seleccione Producto..</option>
                            @foreach ($Productos as $Producto)
                            <option value="{{ $Producto->id_producto  }}">{{ $Producto->str_producto }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Norma Técniva Colombiana:</strong></label>
                        <input type="text" name="tecnica" class="form-control" value="tecnica" required>
                    </div>
                </div>
            </div>
            <br>

            <h5 style="color: rgb(82, 82, 82)">2. Composición</h5>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Descripción del producto:</strong></label>
                        <textarea name="des_producto" rows="3" cols="60"></textarea>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Composición:</strong></label>
                        <textarea name="composicion" rows="3" cols="60"></textarea>
                    </div>
                </div>
            </div>
            <br>
            {{-- ------------------3 CARACTERISTICAS QWUIMICAS--------------------- --}}

            <div class="row">
                <div class="col-md-12 col-md-offset-2">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 style="color: rgb(82, 82, 82)">3. Caracteristicas</h5>
                            <input type="button" name="nuevo" id="nuevo" class="btn btn-info btn-sm"
                                value="Añadir Nueva Química" onclick="nuevos();">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="padding: 10px 10px;" id="dynamic_field">
                <h5>Química 1</h5>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Química:</strong></label>
                            <input type="text" name="nombre_qui[]" class="form-control" required value="quimica">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Unidad:</strong></label>
                            <input type="text" name="unidad_qui[]" class="form-control" value="Unidad">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Mínimo:</strong></label>
                            <input type="text" name="minimo_qui[]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Máximo:</strong></label>
                            <input type="text" name="maximo_qui[]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Método de Ensayo:</strong></label>
                            <input type="text" name="metodo_qui[]" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <br>

            {{-- ------------------Fin QUIMICAS--------------------- --}}
            <div class="card" style="padding: 10px 10px;" id="fisica">
                <h5>Fisica 1</h5>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Fisica:</strong></label>
                            <input type="text" name="nivel1" class="form-control" required required value="fisica">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Unidad:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Mínimo:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Máximo:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Método de Ensayo:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            {{-- ------------------Biologicas--------------------- --}}
            <div class="card" style="padding: 10px 10px;" id="fisica">
                <h5>Biológia 1</h5>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Biológia :</strong></label>
                            <input type="text" name="nivel1" class="form-control" required required value="Biológia">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Unidad:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Mínimo:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Máximo:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Método de Ensayo:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            {{-- ------------------Biologicas--------------------- --}}
            <div class="card" style="padding: 10px 10px;" id="fisica">
                <h5>Sensoriales 1</h5>

                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Sensoriales:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Especificaciones Y/O Tolerancias:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Método de Ensayo:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <br>
            <h5 style="color: rgb(82, 82, 82)">4. Vida útil prevista y condiciones de almacenamiento</h5>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Vida útil estimada:</strong></label>
                        <textarea name="vida" rows="3" cols="60"></textarea>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Condiciones de manejo/almacenamiento:</strong></label>
                        <textarea name="condicion" rows="3" cols="60"></textarea>
                    </div>
                </div>
            </div>

            <h5 style="color: rgb(82, 82, 82)">5. Envase y embalaje</h5>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label><strong>Envase y embalaje:</strong></label>
                        <textarea name="envase" rows="2" cols="140"></textarea>
                    </div>
                </div>
            </div>


            <h5 style="color: rgb(82, 82, 82)">6.Uso y 7.Método(s)</h5>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Etiquetado e instrucciones para manipulación preparación y uso:</strong></label>
                        <textarea name="etiquetado" rows="3" cols="65"></textarea>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Método(s) de distribución y entrega:</strong></label>
                        <textarea name="metodo" rows="3" cols="65"></textarea>
                    </div>
                </div>
            </div>
            <h5 style="color: rgb(82, 82, 82)">8. Requisitos legales y reglamentarios</h5>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label><strong>Requisitos legales y reglamentarios:</strong></label>
                        <textarea name="requisito" rows="4" cols="140"></textarea>
                    </div>
                </div>
            </div>

            <h5 style="color: rgb(82, 82, 82)">9. Uso previsto</h5>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <label><strong>Manipulación Esperada:</strong></label>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <label><strong>Manipulación Inapropiada:</strong></label>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <label><strong>Grupo de usuarios o consumidores:</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <textarea name="uso" rows="4" cols="140"></textarea>
                    </div>
                </div>
            </div>
            <h5 style="color: rgb(82, 82, 82)">10. Riesgo de inocuidad alimentaria</h5>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <label><strong>Riesgo Físico:</strong></label>
                    <textarea name="fisico" rows="3" cols="45"></textarea>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <label><strong>Riesgo Biológico:</strong></label>
                    <textarea name="biologico" rows="3" cols="45"></textarea>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <label><strong>Riesgo Químico:</strong></label>
                    <textarea name="quimico" rows="3" cols="45"></textarea>
                </div>
            </div>
            <h5 style="color: rgb(82, 82, 82)">11. Presentaciones disponibles</h5>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <textarea name="presentacion" rows="4" cols="140"></textarea>
                    </div>
                </div>
            </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
    </form>
    <br>
    <div class="row">
        <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
            <div class="table-responsive">
                @if ($requisitos->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Norma Técniva Colombiana</th>
                            <th>Descripción del producto</th>
                            <th>Composición</th>
                            <th>Vida útil estimada</th>
                            <th>Condiciones de manejo</th>
                            <th>Envase y embalaje</th>
                            <th>Preparación y uso</th>
                            <th>Método(s)</th>

                            <th colspan="2">Opciones</th>
                        </tr>
                    </thead>

                    <tbody>


                        @foreach ($requisitos as $requisito)

                        <tr>
                            <td>{{$requisito->str_producto}}</td>
                            <td>{{$requisito->tecnica}}</td>
                            <td>{{$requisito->des_producto}}</td>
                            <td>{{$requisito->composicion}}</td>
                            <td>{{$requisito->vida}}</td>
                            <td>{{$requisito->condicion}}</td>
                            <td>{{$requisito->envase}}</td>
                            <td>{{$requisito->etiquetado}}</td>
                            <td>{{$requisito->etiquetado}}</td>
                            <td>
                                <div class="form-row align-items-center">
                                    <a href="{{ URL::action('Planeacion\RequisitosController@edit',$requisito->id_pla_control) }}"><i
                                            class=" form-inline fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>

                                    <form action="{{route('productos_servicios.destroy', $requisito->id_pla_control)}}"
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
                {{ $requisitos->links() }}
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


@endsection
