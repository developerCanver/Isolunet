@extends('layouts.dashboard')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endsection

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Apoyo</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Recursos</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Recursos</h4>
        <p class="mg-b-0">Subir archivos</p>
    </div>
</div><!-- d-flex -->

<style>
.trans{
    display: flex;
    justify-content: center;
    }
    .dz-default{
        color: #000;
    }
</style>

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')
    
        <div class="row">
            <div class="col">
               
                <div class="trans"> 
                    <a href="{{ URL::to('recursosApp') }}" class="btn btn-info btn-sm">Agregar</a>
                        <a href="{{ URL::to('recursosverimg') }}" class="btn btn-primary btn-sm">Ver</a>
                  </div> 
                  <br>
                  
                {{-- <form action="{{route('recursosApp.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="fk_empresa" value="{{$empresa->id_empresa}}">
                    <div class="form-group">
                        <label for="">Imagen</label>
                        <input type="file" name="file" id="">
                        @error('file')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">subir imagen</button>
                    <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
                </form> --}}

                <form action="{{route('recursosApp.store')}}"
                    method="POST"
                    class="dropzone"
                    id="my-awesome-dropzone">
                 
                </form>

            </div>
        </div>

      
        <br>


    </div>


    @endsection
    @section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>

    <script>
        Dropzone.options.myAwesomeDropzone = {
            headers:{
                'X-CSRF-TOKEN' : "{{csrf_token()}}"
            },
            dictDefaultMessage: "Adjunte aquí archivos, fotos etc…  <br> Relacionados con recursos del sistema de gestión, personas (ej: organigrama) <br> e infraestructura  (ej: edificios, equipos, tecnología)",
            maxFilesize: 10,
            maxFiles: 20,
        };
    </script>
@endsection
