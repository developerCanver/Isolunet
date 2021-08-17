@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="">Liderazgo</a>
        <span class="breadcrumb-item active">Política</span>
    </nav>
</div>
<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Política Integrida</h4>
        <p class="mg-b-0">Liderazgo</p>
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
        @if(count($validacion) == 0)
        {{  Form::open(['action' => 'Liderazgo\PoliticaController@store','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <div class="form-group">
                    <label for="datos">POLÍTICA INTEGRIDA SISTEMAS DE GESTIÓN</label><br>
                    <textarea required name="politica" id="editor1"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Archivo:</strong></label>
                    <input type="file" name="archivo" class="form-control">

                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        {!!Form::close()!!}

        @else
        {{  Form::open(['action' => ['Liderazgo\PoliticaController@update',$tendencia->id_politica],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <div class="form-group">
                    <label for="datos">POLÍTICA INTEGRIDA SISTEMAS DE GESTIÓN</label><br>
                    <textarea name="politica"
                        id="editor1">@if(count($validacion) !=0){{ $tendencia->politica }}@endif</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Archivo:</strong></label>
                    <input type="file" name="archivo" class="form-control">

                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                @if ($tendencia->archivo!='Archivo no cargado')
				<input type="hidden" name="archivo_anterior" value="{{$tendencia->archivo}}">
				<label><strong>{{substr(($tendencia->archivo), 10)}}</strong></label>
				
                <a title="Descargar Archivo" href="/archivos/liderazgo/{{$tendencia->archivo}}" download="{{$tendencia->archivo}}"
                    style="color: rgb(53, 87, 53); font-size:18px;"> <i class="fas fa-file-download"></i></a>

                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-warning">Editar</button>
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

    CKEDITOR.replace('politica');

    $('.input-number').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

</script>
@endpush
