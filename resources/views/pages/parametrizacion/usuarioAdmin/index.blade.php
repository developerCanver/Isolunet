@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="#">Parametrizacicon</a>
        <span class="breadcrumb-item active">Agregar Usuarios</span>
    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Administracion de Usuarios</h4>
        <p class="mg-b-0">Usuarios</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">

        {{-- <div class="row">
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
</div> --}}

<br>
@include('partials.message_flash')

<form action="{{route('parametrizacion_users.store')}}" method="POST">
    @csrf


    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
            <div class="form-group">
                <label for="datos">Nombre Completo</label>
                <input type="text" name="nom_completo" required class="form-control" value="{{old('nom_completo')}}">
                @error('nom_completo') <span class="text-danger">{{ $message }}</span>@enderror

            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
            <div class="form-group">
                <label for="datos">Empresa</label>
                <select name="fk_empresa" required class="form-control select2">
                    @foreach ($empresas as $empresa)
                    <option value="{{ $empresa->id_empresa }}">{{ $empresa->razon_social }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
            <div class="form-group">
                <label for="datos">Tipo Usuario</label>
                <select name="fk_rol" required class="form-control select2">
                    <option value="0" selected disabled>Selecione tipo usuario...</option>
                    {{-- <option value="1">Super Admin</option> --}}
                    <option value="2">Admin</option>
                    <option value="2">Cliente</option>

                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <div class="form-group">
                <label for="datos">Correo Electronico</label>
                <input type="email" required name="correo" class="form-control" value="{{old('correo')}}">
                @error('correo') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <div class="form-group">
                <label for="datos">Contraseña</label>
                <input type="password" required name="password" class="form-control" value="{{old('password')}}">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

    <a href="{{ URL::previous() }}" class="btn btn-danger"><i class="fas fa-backward"></i></a>
</form>
<br><br>

<div class="br-section-wrapper">
    <div class="row">
        <h4>Listado De Usuarios</h4>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Nombre de usuario
                            </th>
                            <th>
                                Correo Electronico
                            </th>
                            <th>
                                Empresa
                            </th>
                            <th>
                                Tipo Usuario
                            </th>
                            <th colspan="2">
                                Opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($consultas as $h)
                        <tr>
                            <td>{{ $h->name }}</td>
                            <td>{{ $h->email }}</td>
                            <td>{{ $h->razon_social }}</td>
                            <td>{{ $h->name_rol }}</td>
                            <td colspan="2">
                                <a type="button" data-toggle="modal" data-target="#exampleModal"><i class="
                                    fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
                                <a
                                    href="{{ URL::action('Parametrizacion\AreasCargoController@destroy_cargos',$h->id) }}"><i
                                        class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
                            </td>
                        </tr>

                        {{-- 	modal editar --}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('parametrizacion_users.update', $h->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="datos">Nombre Completo</label>
                                                        <input type="text" name="nom_completo" required
                                                            class="form-control" value="{{$h->name}}">
                                                        @error('nom_completo') <span
                                                            class="text-danger">{{ $message }}</span>@enderror

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="datos">Empresa</label>
                                                        <select name="fk_empresa" required class="form-control ">
                                                            @foreach ($empresas as $empresa)
                                                            <option value="{{ $empresa->id_empresa }}"  
																{{ $empresa->id_empresa == $h->fk_empresa ? 'selected' : '' }}>
                                                                {{ $empresa->razon_social }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
											</div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="datos">Tipo Usuario</label>
                                                        <select name="fk_rol" required class="form-control ">                                                    
															<option value="2" @if($h->fk_rol == '2') selected  @endif >Admin</option>
															<option value="3" @if($h->fk_rol == '3') selected  @endif >Cliente</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="datos">Correo Electronico</label>
                                                        <input type="email" required name="correo" class="form-control"
                                                            value="{{$h->email}}">
                                                        @error('correo') <span
                                                            class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
											</div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="datos">Contraseña</label>
                                                        <input type="password"  name="password"
                                                            class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
												<button type="submit" class="btn btn-primary">Guardar</button>
											</div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $consultas->links() }}
        </div>
    </div>
</div>

</div>
</div>
@endsection


@push('scripts')
<script type="text/javascript">
    // In your Javascript (external .js resource or <script> tag)

    $('.input-number').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

</script>
@endpush
