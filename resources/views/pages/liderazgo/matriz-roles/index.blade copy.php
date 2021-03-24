@extends('layouts.dashboard')

@section('content')
<script type="text/javascript">
    var i = 1;

    function nuevos() {

        i++;
        $('#dynamic_field').append('<tr id="row' + i +
            '"><td><label><strong>Responsabilidad: ' + i +
            '</strong></label><textarea name="nom_responsabilidades[]" rows="2" cols="100" required> </textarea></td><td><input type="button" name="remove" id="' +
            i + '" class="btn btn-danger btn_remove" value="Eliminar" onclick="eliminar(this.id);"></td></tr>');
    };

    function eliminar(clicked_id) {
        var button_id = clicked_id;
        $("#row" + button_id + "").remove();
    };

</script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Liderazgo</a>
        <a class="breadcrumb-item" href="{{ URL::to('/roles_responsabilidades') }}">Rol y Responsabilidad</a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Rol y Responsabilidad</h4>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">

    <div class="br-section-wrapper">
        {{  Form::open(['action' => 'Liderazgo\MatrizRolesController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <h4>Egresos - </h4>
        <div class="row">
            <input type="hidden" class="form-control" name="empresa" value="{{$empresas->id_empresa}}">

        </div><br>

        <div class="row">

            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong>Rol:</strong></label>
                            <input type="text" class="form-control" name="nom_rol_res" placeholder="ALTA DIRECCION"
                                value="ALTA DIRECCION" required>
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label for="datos">Cargo que asume el Rol:</label>
                    <select name="fk_cargo[]" class="form-control select2" required multiple>

                        @foreach ($tabla_usuarios_cliente as $element)
                        <option value="{{ $element->id_cargo }}">{{ $element->nom_cargo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>



        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <td>
                                <label><strong>Responsabilidad:</strong></label>
                                <textarea name="nom_responsabilidades[]" rows="2" cols="100" required="true" ></textarea>


                            </td>


                            <td><input type="button" name="nuevo" id="nuevo" class="btn btn-success"
                                    value="Nueva Responsabilidad" onclick="nuevos();"></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        {{--<div class="row">
            <div class="form-group">
                <table class="table table-bordered" id="dynamic_input">
                    <tr>
                        <td>
                            <label><strong>¿Qué Cuentas Rinde</strong></label>
                            <textarea name="cuentas_rinde[]" rows="2" cols="50">Definir y aprobar la política SIG ( Calidad/ Ambiental). </textarea>
                        </td>
                       
                        <td>
                            <label><strong>Autoridad</strong></label>
                            <textarea name="autoridad[]" rows="2" cols="50">Establecer las directrices para la implementación, mantenimiento, revisión y mejora del Sistema Integrado de Gestión SIG. </textarea>
                        </td>
                        <td>
                            <label><strong>A quien?</strong></label>
                            <textarea name="a_quien[]" rows="2" cols="50">Establecer las directrices para la implementación, mantenimiento, revisión y mejora del Sistema Integrado de Gestión SIG. </textarea>
                        </td>
                        <td>
                            <label><strong>Cada cuanto?</strong></label>
                            <textarea name="cada_cuanto[]" rows="2" cols="50">Minimo una vez al año  </textarea>
                        </td>
                        <td><input type="button" name="nuevo" id="nuevo"
                                class="btn btn-success" value="Añadir Nueva"
                                onclick="nuevos();"></td>
                    </tr>
                </table>
            </div>
            
        </div> --}}
        <button type="submit" class="btn btn-primary">Guardar</button>
        {!!Form::close()!!}


        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($responsabilidades->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Rol</th>
                                <th>Cargo que asume el rol</th>
                                <th>Responsabilidad</th>
                                
                                <th>
                                    Opciones
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($responsabilidades as $responsabilidad)
                                 
                            <tr>
                                <td>{{$responsabilidad->nom_rol_res}}</td>
                                <td>{{$responsabilidad->nom_cargo}}</td>
                                <td>{{$responsabilidad->nom_responsabilidades}}</td>

                            <td>
                                <a href="{{ URL::action('Liderazgo\MatrizRolesController@edit',$responsabilidad->id_rol_res ) }}"><i
                                        class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
                                <a href="{{ URL::action('Liderazgo\MatrizRolesController@destroy',$responsabilidad->id_rol_res ) }}"><i
                                        class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
                            </td>
                            </tr>
                            @endforeach 

                        </tbody>
                    </table>
                    @else
                    
                    <br><br>
                    <div class="container m-5">
                        <div class="alert alert-primary" role="alert">
                            <p class="text-center m-3"> Ups! no hay registros 😥 para la empresa {{$empresas->razon_social}}
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
