@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Liderazgo</a>
        <a class="breadcrumb-item" href="{{ URL::to('/roles_responsabilidades') }}">Rol y Responsabilidad</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Cargo que asume el rol</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Cargo que asume el Rol</h4>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    @include('partials.message_flash')
    <div class="br-section-wrapper">
        {{  Form::open(['action' => 'Liderazgo\MatrizRolesController@store_cargo','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <h4> Cargo - Usuario </h4>
        <div class="row">
            <input type="hidden" class="form-control" name="empresa" value="{{$empresas->id_empresa}}">
            <input type="hidden" class="form-control" name="fk_roles_res" value="{{$rol_res->id_rol_res}}">

        </div><br>

        <div class="row">

            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong>Rol:</strong></label>
                            <textarea name="nom_rol_res" rows="2" cols="100" disabled >{{$rol_res->nom_rol_res}}</textarea>
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <div class="row">
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
   
   
   
        <button type="submit" class="btn btn-primary">Guardar</button>
        {!!Form::close()!!}
        <br>
        <br>

        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($RolesCargos->isNotEmpty())

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-md-offset-2">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        Listas
                                        <a class="btn btn-info btn" href="{{ URL::action('Liderazgo\ResponsabilidadesController@index',$rol_res->id_rol_res ) }}">Crear Responsabilidades</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                             
                                <th>Cargo que asume el rol</th>
                                <th>
                                    Eliminar Cargo
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($RolesCargos as $RolesCargo)
                                 
                            <tr>
                                <td>{{$RolesCargo->nom_cargo}}</td>

                            <td>
                               
                                <a href="{{ URL::action('Liderazgo\MatrizRolesController@destroy_cargo_rol',$RolesCargo->id_roles_cargo ) }}"><i
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
