@extends('layouts.dashboard')

@section('content')


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
    @include('partials.message_flash')
    <div class="br-section-wrapper">
        {{  Form::open(['action' => 'Liderazgo\MatrizRolesController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <h4>Rol </h4>
        <div class="row">
            <input type="hidden" class="form-control" name="empresa" value="{{$empresas->id_empresa}}">

        </div><br>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <div class="form-group">
                    <label><strong>Rol de los cargos en los sistemas de gestión?
                        </strong></label>
                    <textarea name="nom_rol_res" rows="2" cols="140" required="true"></textarea>
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
                    @if ($responsabilidades->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Rol</th>

                                <th> Opciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($responsabilidades as $responsabilidad)

                            <tr>
                                <td>{{$responsabilidad->nom_rol_res}}</td>
                                <td>
                                    <a
                                        href="{{ URL::action('Liderazgo\MatrizRolesController@edit',$responsabilidad->id_rol_res ) }}"><i
                                            class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
                                    <a
                                        href="{{ URL::action('Liderazgo\MatrizRolesController@destroy',$responsabilidad->id_rol_res ) }}"><i
                                            class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
                                    <a
                                        href="{{ URL::action('Liderazgo\MatrizRolesController@index_cargo_rol',$responsabilidad->id_rol_res ) }}"><i
                                            title="Cargo que asume el Rol" class="fas fa-arrow-circle-right  fa-2x"
                                            style="color:#4000c1;"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @else

                    <br><br>
                    <div class="container m-5">
                        <div class="alert alert-primary" role="alert">
                            <p class="text-center m-3"> Ups! no hay registros 😥 para la empresa
                                {{$empresas->razon_social}}
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
