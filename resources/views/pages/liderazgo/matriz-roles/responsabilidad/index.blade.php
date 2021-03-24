@extends('layouts.dashboard')

@section('content')
<script type="text/javascript">
    var i = 1;

    function nuevos() {

        i++;
        $('#dynamic_field').append('<tr id="row' + i +
            '">'+
            '<td><label><strong>Responsabilidad: ' + i +
            '</strong></label><textarea name="nom_responsabilidades[]" rows="2" cols="50" required> </textarea></td>'+
            '<td><label><strong>¿Qué Cuentas Rinde?: ' + i +
            '</strong></label><textarea name="cuentas_rinde[]" rows="2" cols="50" ></textarea></td>'+
            '<td><input type="button" name="remove" id="' +
            i + '" class="btn btn-danger btn_remove" value="Eliminar" onclick="eliminar(this.id);"></td></tr>');
    };
    function nuevosDos() {

        i++;
        $('#dynamic_field2').append('<tr id="row' + i +
            '">'+
            '<td><label><strong>Autoridad: ' + i +
            '</strong></label><textarea name="Autoridad[]" rows="2" cols="30" > </textarea></td>'+
            '<td><label><strong>¿A Quién? ' + i +
            '</strong></label><textarea name="a_quien[]" rows="2" cols="30" ></textarea></td>'+
            '<td><label><strong>¿Cada Cuánto? ' + i +
            '</strong></label><textarea name="cada_cuanto[]" rows="2" cols="30" ></textarea></td>'+
            '<td><input type="button" name="remove" id="' +
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
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Responsabilidad</span></a>
       

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4> Responsabilidades</h4>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">

    <div class="br-section-wrapper">
        {{  Form::open(['action' => 'Liderazgo\ResponsabilidadesController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <h6>Responsabilidades - {{$rolesresponsabilidad->nom_rol_res}}</h6>
        <div class="row">
            <input type="hidden" class="form-control" name="empresa" value="{{$empresas->id_empresa}}">
            <input type="hidden" class="form-control" name="fk_roles_res" value="{{$rolesresponsabilidad->id_rol_res }}">
            <input type="hidden" class="form-control" name="id_cargo" value="{{$id_cargo}}">

        </div><br>

        <div class="row">


        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <td>
                                <label><strong>Responsabilidad:</strong></label>
                                <textarea name="nom_responsabilidades[]" rows="2" cols="50" required="true" ></textarea>
                             </td>
                             <td>
                                <label><strong>¿Qué Cuentas Rinde?:</strong></label>
                                <textarea name="cuentas_rinde[]" rows="2" cols="50"  ></textarea>
                             </td>


                            <td><input type="button" name="nuevo" id="nuevo" class="btn btn-success"
                                    value="+" onclick="nuevos();"></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <table class="table table-bordered" id="dynamic_field2">
                        <tr>
                            <td>
                                <label><strong>Autoridad:</strong></label>
                                <textarea name="autoridad[]" rows="2" cols="30"  ></textarea>
                             </td>
                             <td>
                                <label><strong>¿A Quién?:</strong></label>
                                <textarea name="a_quien[]" rows="2" cols="30"  ></textarea>
                             </td>
                             <td>
                                <label><strong>¿Cada Cuánto?:</strong></label>
                                <textarea name="cada_cuanto[]" rows="2" cols="30"  ></textarea>
                             </td>


                            <td><input type="button" name="nuevo" id="nuevo" class="btn btn-success"
                                    value="+" onclick="nuevosDos();"></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        {!!Form::close()!!}


        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($responsabilidades->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Responsabilidad</th>
                                <th>¿Qué Cuentas Rinde?</th>
                                <th> Autoridad</th>
                                <th>¿A Quién?</th>
                                <th>¿Cada Cuánto?</th>
                                
                                <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($responsabilidades as $responsabilidad)
                                 
                            <tr>
                                <td>{{$responsabilidad->nom_responsabilidades}}</td>
                                <td>{{$responsabilidad->cuentas_rinde}}</td>
                                <td>{{$responsabilidad->autoridad}}</td>
                                <td>{{$responsabilidad->a_quien}}</td>
                                <td>{{$responsabilidad->cada_cuanto}}</td>
                              
                            <td>
                                <a href="{{ URL::action('Liderazgo\ResponsabilidadesController@edit',$responsabilidad->id_responsabilidades  ) }}"><i
                                        class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
                                <a href="{{ URL::action('Liderazgo\ResponsabilidadesController@destroy',$responsabilidad->id_responsabilidades  ) }}"><i
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
