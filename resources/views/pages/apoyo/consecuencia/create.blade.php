@extends('layouts.dashboard')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endsection

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Apoyo</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Toma de Consecuencia</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Toma de Consecuencia</h4>
        <p class="mg-b-0">Subir archivos</p>
    </div>
</div><!-- d-flex -->

<style>
.trans{
    display: flex;
    justify-content: center;
    }
</style>

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')
    
        <div class="row">
            <div class="col">
               
                <div class="trans"> 
                    <a href="{{ URL::to('tomaconsecuencia') }}" class="btn btn-info">Agregar</a>
                        <a href="{{ URL::to('tomaconsecuenciaimg') }}" class="btn btn-primary">Ver</a>
                  </div> 
                  <br>

                <form action="{{route('tomaconsecuencia.store')}}"
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
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo",
            maxFilesize: 10,
            maxFiles: 20,
        };
    </script>
@endsection
