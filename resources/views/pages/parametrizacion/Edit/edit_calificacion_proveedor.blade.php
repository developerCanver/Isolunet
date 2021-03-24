@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="#">Parametrizacion</a>
        <span class="breadcrumb-item active">Editar Calificación Proveedores</span>
    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Administración de Proveedor</h4>
        <p class="mg-b-0">Editar Proveedor</p>
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
        {{  Form::open(['action' => ['Parametrizacion\CalificaionProveedorController@update',$consultas->id_cal_proveedor],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}


        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label for="datos">Calificación Total</label>
                    <input type="text" class="form-control" id="nom_proveedor" name="nom_proveedor" aria-describedby=""
                        value="{{$consultas->nom_proveedor}}" disabled>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label for="datos">Calificación Total</label>
                    <input type="text" class="form-control" id="nom_insumo" name="nom_insumo" aria-describedby=""
                        value="{{$consultas->nom_insumo}}" disabled>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">Fecha a Evaluar</label>
                    <input type="date" class="form-control" name="fec_evaluar" id="fec_evaluar"  value="{{$consultas->fec_evaluar}}" required>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">Cumplimiento en Tiempo de entrega</label>
                    <select name="cum_entrega" id="cum_entrega" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="Si" @if($consultas->cum_entrega == 'Si') selected  @endif >Si</option>
                        <option value="No" @if($consultas->cum_entrega == 'No') selected  @endif >No</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">Cumplimiento en Items pedidos</label>
                    <select name="cum_pedidos" id="cum_pedidos" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="1% a 20%" @if($consultas->cum_pedidos == '1% a 20%') selected  @endif>1% a 20%</option>
                        <option value="21% a 40%" @if($consultas->cum_pedidos == '21% a 40%') selected  @endif>21% a 40%</option>
                        <option value="41% a 60%" @if($consultas->cum_pedidos == '41% a 60%') selected  @endif>41% a 60%</option>
                        <option value="61% a 80%" @if($consultas->cum_pedidos == '61% a 80%') selected  @endif>61% a 80%</option>
                        <option value="81% a 90%" @if($consultas->cum_pedidos == '81% a 90%') selected  @endif>81% a 90%</option>
                        <option value="100%" @if($consultas->cum_pedidos == '100%') selected  @endif>100%</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">Cumplimiento en precio</label>
                    <select name="cum_precios" id="cum_precios" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="Si" @if($consultas->cum_precios == 'Si') selected  @endif  >Si</option>
                        <option value="No" @if($consultas->cum_precios == 'No') selected  @endif >No</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">Cumplimiento en Sevicio</label>
                    <select name="cum_servicios" id="cum_servicios" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="Si" @if($consultas->cum_servicios == 'Si') selected  @endif >Si</option>
                        <option value="No" @if($consultas->cum_servicios == 'No') selected  @endif >No</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="datos">Cumplimiento productos / servicios conforme a especificaciones</label>
                    <select name="cum_productos" id="cum_productos" class="form-control" required>
                            <option value="">Seleccione una Opción</option>
                              <option value="1% a 20%" @if($consultas->cum_productos == '1% a 20%') selected  @endif >1% a 20%</option>
                              <option value="21% a 40%" @if($consultas->cum_productos == '21% a 40%') selected  @endif>21% a 40%</option>
                              <option value="41% a 60%" @if($consultas->cum_productos == '41% a 60%') selected  @endif>21% a 40%</option>
                              <option value="41% a 60%" @if($consultas->cum_productos == '61% a 80%') selected  @endif>21% a 40%</option>
                              <option value="81% a 90%" @if($consultas->cum_productos == '81% a 90%') selected  @endif>21% a 40%</option>
                              <option value="100%" @if($consultas->cum_productos == '100%') selected  @endif>21% a 40%</option>
                    </select>
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
