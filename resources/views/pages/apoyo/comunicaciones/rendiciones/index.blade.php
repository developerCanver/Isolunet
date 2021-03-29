@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Planificación</a>
        <a class="breadcrumb-item" href="{{ URL::to('/comunicaciones') }}">Comunicaciones</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">IR Comunicaciones</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Comunicaciones - <a class="breadcrumb-item" href="{{ URL::to('/comunicaciones') }}">IR Comunicaciones</a>
        </h4>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')
        {{  Form::open(['action' => 'Apoyo\ComunicacionesController@store_rendicion','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <h4> </h4>
        <div class="row">
            <input type="hidden" name="fk_empresa" value="{{$empresa->id_empresa}}">
        </div><br><br>


        <hr>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Quién:</strong></label>
                    <select name="Quien" class="form-control select2" required>
                        <option value="" selected="true" disabled="disabled"> Seleccione Cargo...</option>
                        @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->nom_cargo  }}">{{ $cargo->nom_cargo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Mecanismo y Medios:</strong></label>
                    <input type="text" class="form-control" name="mecanismo" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Frecuencia:</strong></label>
                    <input type="text" name="frecuencia" class="form-control" required>

                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong> A Quién:</strong></label>
                    <input type="text" class="form-control" name="a_quien" id="fecha_cambio" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong> Registro:</strong></label>
                    <input type="text" name="registro" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Sistema de Gestión:</strong></label>
                    <input type="text" class="form-control" name="sistema" required>
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
                @if ($rendiciones->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Quién:</th>
                            <th>Mecanismo y Medios:</th>
                            <th>Frecuencia:</th>
                            <th>A Quién:</th>
                            <th>Registro:</th>
                            <th>Sistema de Gestión:</th>
                            <th> Opciones</th>
                        </tr>

                    </thead>

                    <tbody>
                        @foreach ($rendiciones as $rendicion)

                        <tr>
                            <td>{{$rendicion->Quien}}</td>
                            <td>{{$rendicion->mecanismo}}</td>
                            <td>{{$rendicion->frecuencia}}</td>
                            <td>{{$rendicion->a_quien}}</td>
                            <td>{{$rendicion->registro}}</td>
                            <td>{{$rendicion->sistema}}</td>


                            <td>
                                <a
                                    href="{{ URL::action('Apoyo\ComunicacionesController@edit_rendicion',$rendicion->id_rendiciones) }}"><i
                                        class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
                                <a
                                    href="{{ URL::action('Apoyo\ComunicacionesController@destroy_rendicion',$rendicion->id_rendiciones) }}"><i
                                        class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
                                        
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $rendiciones->links() }}
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
