@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="">Contexto</a>
        <span class="breadcrumb-item active">Tendencias</span>
    </nav>
</div>
<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Administración de Tendencias</h4>
        <p class="mg-b-0">Contexto</p>
    </div>
</div>

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
        @if($tendencia == null)
        {{  Form::open(['action' => 'Contexto\TendeciasController@store','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <div class="form-group">
                    <label for="datos">Contribuye a identificar los elementos que marcaran el rumbo de la organización.</label><br> 
                    <textarea name="tendencia" id="editor1"></textarea>
                </div>
            </div>
        </div>

        @if ($tipoUser == 1 || $tipoUser == 2)
        <button type="submit" class="btn btn-primary">Guardar</button>
        @endif

        <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        {!!Form::close()!!}

        @else
        {{  Form::open(['action' => ['Contexto\TendeciasController@update',$tendencia->id_tendencia_colombia],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <div class="form-group">
                  <label for="datos">Contribuye a identificar los elementos que marcaran el rumbo de la organización.</label><br>
                    <textarea name="tendencia"
                        id="editor1">@if(($tendencia) != null){{ $tendencia->tendencia_colombia }}@endif</textarea>
                </div>
            </div>
        </div>

        @if ($tipoUser == 1 || $tipoUser == 2)
        <button type="submit" class="btn btn-warning">Editar</button>
        @endif

        <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        {!!Form::close()!!}
        @endif








    </div>
</div>

@endsection


@push('scripts')
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>


<script type="text/javascript">
    // In your Javascript (external .js resource or <script> tag)

    CKEDITOR.replace('tendencia');

    $('.input-number').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

</script>
@endpush
