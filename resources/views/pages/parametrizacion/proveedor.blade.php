@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="#">Parametrizacion</a>
        <span class="breadcrumb-item active">Agregar Proveedor</span>
    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Administración de Proveedores</h4>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        <div class="row">
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
        </div>

        <br>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Proveedor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{  Form::open(['action' => 'Parametrizacion\ProveedorController@store','autocomplete'=>'off', 'metod' => 'POST', 'files' => true]) }}
                        {!! Form::token() !!}

                 
                        <input type="hidden" class="form-control"  name="empresa"
                                        value="{{ $empresa->id_empresa }}" >

						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                <div class="form-group">
                                    <label for="datos">Ciudad</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad"
                                        aria-describedby="" value="{{ old('ciudad') }}" required>
                                </div>
                            </div>
						</div>

                        <div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                <div class="form-group">
                                    <label for="datos">Nit Proveedor</label>
                                    <input type="text" class="form-control" id="nit_proveedor" name="nit_proveedor"
                                        aria-describedby="" value="{{ old('nit_proveedor') }}" required>
                                </div>
                            </div>
						</div>
                        <div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                <div class="form-group">
                                    <label for="datos"> Nombre Proveedor</label>
                                    <input type="text" class="form-control" id="nom_proveedor" name="nom_proveedor"
                                        aria-describedby="" value="{{ old('nom_proveedor') }}" required>
                                </div>
                            </div>
						</div>


                        <div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                <div class="form-group">
                                    <label for="datos"> Teléfono</label>
                                    <input type="text" class="form-control" id="teléfono" name="teléfono"
                                        aria-describedby="" value="{{ old('teléfono') }}" required>
                                </div>
                            </div>
						</div>
                        

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
                       
                        {!!Form::close()!!}
                    </div>
                   
                </div>
            </div>
        </div>

        @include('partials.message_flash')
        {{  Form::open(['action' => 'Parametrizacion\ProveedorController@storeInsumo','autocomplete'=>'off', 'metod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <div class="row">
           

            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos">Proveedor /
                        <a type="button" class=" btn-light" data-toggle="modal" data-target="#exampleModal">  <span  style="color: aliceblue; font-size: 1em" class="badge bg-success btn">Nuevo Proveedor</span></a>
                    </label>
                    <select name="nom_proveedor" class="form-control select2" required>
                        @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id_proveedor }}" selected>{{ $proveedor->nom_proveedor }}</option>
                        
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos">Nombre Insumo</label>
                    <input type="text" class="form-control" id="nom_insumo" name="nom_insumo" aria-describedby=""
                        value="{{ old('nom_insumo') }}" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        {!!Form::close()!!}
        <br>

        <div class="br-section-wrapper">
            <div class="row">
                <h4>Listado de Proveedores</h4>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                    <div class="table-responsive">
                        @if ($tabla_proveedor->isNotEmpty())
                        <table class="table">
                            <thead>
                                <tr>
                                   
                                  
                                    <th>
                                        Proveedor
                                    </th>
                                    <th>
                                        Nit Proveedor
                                    </th>
                                    <th>
                                        Ciudad
                                    </th>
                                    <th>
                                        Teléfono
                                    </th> 
                                    <th>
                                        Insumo
                                    </th>
                                    <th colspan="2">
                                        Opciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($tabla_proveedor as $h)
                                <tr>
                                    <td>{{ $h->nom_proveedor }}</td>
                                    <td>{{ $h->nit_proveedor }}</td>
                                    <td>{{ $h->ciudad }}</td>
                                    <td>{{ $h->teléfono }}</td>
                                    <td>{{ $h->nom_insumo }}</td>

                                    <td colspan="2">
                                        <a
                                            href="{{ URL::action('Parametrizacion\ProveedorController@edit',$h->id_proveedor) }}"><i
                                                class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
                                        <a
                                            href="{{ URL::action('Parametrizacion\ProveedorController@destroy',$h->id_insumo) }}"><i
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
                                <p class="text-center m-3"> Ups! no hay registros 😥</p>
                            </div>
                        </div>

                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
