@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Planificación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Planificación y control</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Planificación y control</h4>
        <p class="mg-b-0">Planificación</p>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('planeacio_control.store')}}" method="POST">
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
                        <select name="proceso" class="form-control select2" required>
                            <option value="" selected="true" disabled="disabled"> Seleccione Producto..</option>
                            @foreach ($Productos as $Producto)
                            <option value="{{ $Producto->id_producto  }}">{{ $Producto->str_producto }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Descripción del producto:</strong></label>
                        <input type="text" name="material" class="form-control">
                    </div>
                </div>
            </div>
            <br>
            <h5 style="color: rgb(82, 82, 82)">2. Composición</h5>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>composición:</strong></label>
                        <textarea name="nom_rol_res" rows="3" cols="60" disabled></textarea>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Norma Técniva Colombiana:</strong></label>
                        <textarea name="nom_rol_res" rows="3" cols="60" disabled></textarea>
                    </div>
                </div>
            </div>
            <br>

            {{-- ------------------3 CARACTERISTICAS QWUIMICAS--------------------- --}}


            <h5 style="color: rgb(82, 82, 82)">3. Caracteristicas</h5>
            <div class="card" style="padding: 10px 10px;">
                <p class="mg-b-0">Química 1</p>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Química:</strong></label>
                            <input type="text" name="nivel1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Unidad:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="button" id="boton" value="+" class="btn btn-info btn-sm"
                            onclick="mostrar_ocultar()" />
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
            <script>
                function mostrar_ocultar() {
                    var caja = document.getElementById("car2");
                    if (caja.style.display == "none") {
                        document.getElementById("car2").style.display = "flex";
                        document.getElementById("boton").value = "-";
                        document.getElementById("boton").style.backgroundColor = "red";

                    } else {
                        document.getElementById("car2").style.display = "none";
                        document.getElementById("boton").value = "+";
                        document.getElementById("boton").style.backgroundColor = "#17a2b8";
                    }
                }

            </script>




            <div class="card" style="padding: 10px 10px; display: none" id="car2">
                <p class="mg-b-0">Química 2</p>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Química:</strong></label>
                            <input type="text" name="nivel1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Unidad:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="button" id="boton2" value="+" class="btn btn-info btn-sm" onclick="mos_ocu2()" />
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


            <script>
                function mos_ocu2() {
                    var caja = document.getElementById("car3");
                    if (caja.style.display == "none") {
                        document.getElementById("car3").style.display = "flex";
                        document.getElementById("boton2").value = "-";
                        document.getElementById("boton2").style.backgroundColor = "red";

                    } else {
                        document.getElementById("car3").style.display = "none";
                        document.getElementById("boton2").value = "+";
                        document.getElementById("boton2").style.backgroundColor = "#17a2b8";
                    }
                }

            </script>

            <div class="card" style="padding: 10px 10px; display: none" id="car3">
                <p class="mg-b-0">Química 3</p>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Química:</strong></label>
                            <input type="text" name="nivel1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Unidad:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="button" id="boton3" value="+" class="btn btn-info btn-sm" onclick="mos_ocu3()" />
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

            <script>
                function mos_ocu3() {
                    var caja = document.getElementById("car4");
                    if (caja.style.display == "none") {
                        document.getElementById("car4").style.display = "flex";
                        document.getElementById("boton3").value = "-";
                        document.getElementById("boton3").style.backgroundColor = "red";

                    } else {
                        document.getElementById("car4").style.display = "none";
                        document.getElementById("boton3").value = "+";
                        document.getElementById("boton3").style.backgroundColor = "#17a2b8";
                    }
                }

            </script>

            <div class="card" style="padding: 10px 10px; display: none" id="car4">
                <p class="mg-b-0">Química 4</p>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Química:</strong></label>
                            <input type="text" name="nivel1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Unidad:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="button" id="boton4" value="+" class="btn btn-info btn-sm" onclick="mos_ocu4()" />
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

            <script>
                function mos_ocu4() {
                    var caja = document.getElementById("car5");
                    if (caja.style.display == "none") {
                        document.getElementById("car5").style.display = "flex";
                        document.getElementById("boton4").value = "-";
                        document.getElementById("boton4").style.backgroundColor = "red";

                    } else {
                        document.getElementById("car5").style.display = "none";
                        document.getElementById("boton4").value = "+";
                        document.getElementById("boton4").style.backgroundColor = "#17a2b8";
                    }
                }

            </script>

            <div class="card" style="padding: 10px 10px; display: none" id="car5">
                <p class="mg-b-0">Química 5</p>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Química:</strong></label>
                            <input type="text" name="nivel1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Unidad:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="button" id="boton5" value="+" class="btn btn-info btn-sm" onclick="mos_ocu5()" />
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


            <script>
                function mos_ocu5() {
                    var caja = document.getElementById("car6");
                    if (caja.style.display == "none") {
                        document.getElementById("car6").style.display = "flex";
                        document.getElementById("boton5").value = "-";
                        document.getElementById("boton5").style.backgroundColor = "red";

                    } else {
                        document.getElementById("car6").style.display = "none";
                        document.getElementById("boton5").value = "+";
                        document.getElementById("boton5").style.backgroundColor = "#17a2b8";
                    }
                }

            </script>

            <div class="card" style="padding: 10px 10px; display: none" id="car6">
                <p class="mg-b-0">Química 6</p>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Química:</strong></label>
                            <input type="text" name="nivel1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Unidad:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="button" id="boto6" value="+" class="btn btn-info btn-sm" onclick="mos_ocu6()" />
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


            <script>
                function mos_ocu6() {
                    var caja = document.getElementById("car7");
                    if (caja.style.display == "none") {
                        document.getElementById("car7").style.display = "flex";
                        document.getElementById("boto6").value = "-";
                        document.getElementById("boto6").style.backgroundColor = "red";

                    } else {
                        document.getElementById("car7").style.display = "none";
                        document.getElementById("boto6").value = "+";
                        document.getElementById("boto6").style.backgroundColor = "#17a2b8";
                    }
                }

            </script>

            <div class="card" style="padding: 10px 10px; display: none" id="car7">
                <p class="mg-b-0">Química 7</p>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Química:</strong></label>
                            <input type="text" name="nivel1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Unidad:</strong></label>
                            <input type="text" name="especialidad1" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="button" id="boton7" value="+" class="btn btn-info btn-sm" onclick="mos_ocu7()" />
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


            <script>
                function mos_ocu7() {
                    var caja = document.getElementById("car8");
                    if (caja.style.display == "none") {
                        document.getElementById("car8").style.display = "flex";
                        document.getElementById("boton7").value = "-";
                        document.getElementById("boton7").style.backgroundColor = "red";

                    } else {
                        document.getElementById("car8").style.display = "none";
                        document.getElementById("boton7").value = "+";
                        document.getElementById("boton7").style.backgroundColor = "#17a2b8";
                    }
                }

            </script>

            <div class="card" style="padding: 10px 10px; display: none" id="car8">
                <p class="mg-b-0">Química 8</p>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Química:</strong></label>
                            <input type="text" name="nivel1" class="form-control">
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
             {{-- ------------------Fin QUIMICAS--------------------- --}}

             














    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
    </form>
    <br>
    {{-- <div class="row">
        <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
            <div class="table-responsive">
                @if ($planeaciones->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Proceso</th>
                            <th>Material</th>
                            <th>Variable</th>
                            <th>Unidad</th>
                            <th>LI</th>
                            <th>LC</th>
                            <th>LS</th>
                            <th>Control</th>
                            <th>Responsable Operación</th>
                            <th>Frecuencia Medición</th>
                            <th>Metodo</th>
                            <th>Responsable Registro</th>
                            <th>Instrumento Medición</th>
                            <th>Registro Seguimiento</th>

                            <th colspan="2">Opciones</th>
                        </tr>
                    </thead>

                    <tbody>


                        @foreach ($planeaciones as $planeacion)

                        <tr>
                            <td>{{$planeacion->proceso}}</td>
    <td>{{$planeacion->material}}</td>
    <td>{{$planeacion->variable}}</td>
    <td>{{$planeacion->unidad}}</td>
    <td>{{$planeacion->li}}</td>
    <td>{{$planeacion->lc}}</td>
    <td>{{$planeacion->ls}}</td>
    <td>{{$planeacion->control}}</td>
    <td>{{$planeacion->operacion}}</td>
    <td>{{$planeacion->frecuencia}}</td>
    <td>{{$planeacion->metodo}}</td>
    <td>{{$planeacion->registro}}</td>
    <td>{{$planeacion->instrumento}}</td>
    <td>{{$planeacion->seguimiento}}</td>
    <td>
        <div class="form-row align-items-center">


            <a href="{{ URL::action('Planeacion\PlaneacioControlController@edit',$planeacion->id_planeacion) }}"><i
                    class=" form-inline fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>

            <form action="{{route('planeacio_control.destroy', $planeacion->id_planeacion)}}"
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
    {{ $planeaciones->links() }}
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
</div> --}}
</div>

</div>


@endsection
