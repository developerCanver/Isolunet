@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Liderazgo</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Rol y Responsabilidad</span></a>


    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4> Responsabilidades</h4>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    @include('partials.message_flash')
    <div class="br-section-wrapper">
        {{  Form::open(['action' => 'Liderazgo\ResponsabilidadesController@store','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}


        <div class="row">
            <input type="hidden" class="form-control" name="fk_empresa" value="{{$empresas->id_empresa}}">

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
                    <label for="datos"><strong>Cargo que asume el Rol:</strong></label>
                    <select name="fk_cargo[]" class="form-control select2" required multiple>
                        @foreach ($tabla_usuarios_cliente as $element)
                        <option value="{{ $element->id_cargo }}">{{ $element->nom_cargo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Responsabilidad:</strong></label>
                    <textarea name="nom_responsabilidades" rows="2" cols="60" required="true"></textarea>

                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">

                    <label><strong>¿Qué Cuentas Rinde?:</strong></label>
                    <textarea name="cuentas_rinde" rows="2" cols="60"></textarea>
                </div>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Autoridad:</strong></label>
                    <textarea name="autoridad" rows="2" cols="40"></textarea>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>¿A Quién?:</strong></label>
                    <textarea name="a_quien" rows="2" cols="40"></textarea>
                </div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>¿Cada Cuánto?:</strong></label>
                    <textarea name="cada_cuanto" rows="2" cols="40"></textarea>
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
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
                                <th title="Rol de los cargos en los sistemas de gestión?">Rol</th>
                                <th>Responsabilidad</th>                                
                                <th title="¿Qué Cuentas Rinde?">¿Qué Cuentas...</th>
                                <th> Autoridad</th>
                                <th>¿A Quién?</th>
                                <th>¿Cada Cuánto?</th>

                                <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($responsabilidades as $responsabilidad)

                            <tr>
                                <td>{{$responsabilidad->nom_rol_res}}</td>
                                <td>{{$responsabilidad->nom_responsabilidades}}</td>
                                <td>{{$responsabilidad->cuentas_rinde}}</td>
                                <td>{{$responsabilidad->autoridad}}</td>
                                <td>{{$responsabilidad->a_quien}}</td>
                                <td>{{$responsabilidad->cada_cuanto}}</td>

                                <td>
                                    <a
                                        href="{{ URL::action('Liderazgo\ResponsabilidadesController@edit',$responsabilidad->id_responsabilidades  ) }}"><i
                                            class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
                                    <a
                                        href="{{ URL::action('Liderazgo\ResponsabilidadesController@destroy',$responsabilidad->id_responsabilidades  ) }}"><i
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
