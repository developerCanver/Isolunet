@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="#">Parametrizacion</a>
        <span class="breadcrumb-item active">Editar Proveedor</span>
    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Administración de Proveedor</h4>
        <p class="mg-b-0">Proveedor</p>
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
        @include('partials.message_flash')
        {{  Form::open(['action' => ['Parametrizacion\ProveedorController@update',$proveedor->id_proveedor],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}


        <div class="row">
            <input type="hidden" class="form-control"  name="empresa"
            value="{{ $empresa->id_empresa }}" >
            
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos">Ciudad</label>
                    <input type="text" name="ciudad" class="form-control" value="{{ $proveedor->ciudad }}" required>

                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos">Nit proveedor</label>
                    <input type="text" name="nit_proveedor" class="form-control" value="{{ $proveedor->nit_proveedor }}"
                        required>

                </div>
            </div>
        </div>
        <div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos">Teléfono</label>
                    <input type="text" name="teléfono" class="form-control" value="{{ $proveedor->teléfono }}"
                        required>

                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos">Nombre Proveedor</label>
                    <input type="text" name="nom_proveedor" class="form-control" value="{{ $proveedor->nom_proveedor }}"
                        required>
                    {{-- <select id="cliente" name="nom_proveedor" class="form-control" required>

						<option selected="true" disabled="disabled">Seleccione Proveedor</option>
						@foreach ($proveedores as $provee)
							<option value="{{ $provee->nom_proveedor }}"
                    {{ $provee->id_proveedor == $proveedor->id_proveedor ? 'selected' : '' }}>
                    {{ $provee->nom_proveedor }}</option>
                    @endforeach
                    </select> --}}
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos">Nombre Insumo</label>
                    <input type="text" name="nom_insumo" class="form-control" value="{{ $proveedor->nom_insumo }}"
                        required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Editar</button>

        <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        {!!Form::close()!!}
        <br><br>

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
