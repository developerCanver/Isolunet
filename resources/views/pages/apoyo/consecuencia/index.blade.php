@extends('layouts.dashboard')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css"
    integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA=="
    crossorigin="anonymous" />
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
        <p class="mg-b-0">Editar archivos</p>
    </div>
</div><!-- d-flex -->

<style>
    .trans {
        display: flex;
        justify-content: center;
    }

    img {
        max-height: 160px;
    }

    .card {
        box-shadow: 0px 2px 16px 0px #9f9d9d;
        -moz-box-shadow: 0px 2px 16px 0px #9f9d9d;
        -webkit-box-shadow: 0px 2px 16px 0px #9f9d9d;
        margin: 7px 0;
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
            </div>

        </div>
        <br>

        <div class="row">

            @foreach ($imagenes as $imagen)
            <div class="col-3">
                <div class="card">
                    @php
                    $info = new SplFileInfo($imagen->url);
                    $ext=$info->getExtension();

                    @endphp
                    @if ($ext =='docx')
                    <img src="/img/word.png" alt="">
                    @elseif($ext =='xlsx')
                    <img src="/img/excel.png" alt="">
                    @elseif($ext =='pdf')
                    <img src="/img/pdf.png" alt="">
                    @else
                    <img src="/archivos/consecuencia/{{$imagen->url}}" alt="">
                    @endif

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12">
                                <div class="trans">
                                    <div class="form-group">
                                        <h6>{{$imagen->url}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="trans">
                                    <form class="form-inline"
                                        action="{{route('tomaconsecuencia.destroy',$imagen->id_recurso)}}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button style="font-size:18px; font-size: 25px;"" type=" submit"
                                            class="btn btn-light"><i class="fas fa-trash-alt "
                                                style="color:#C10000;"></i></button>
                                    </form>


                                    <a title="Descargar Archivo" href="/archivos/consecuencia/{{$imagen->url}}"
                                        class="btn btn-light" download="{{$imagen->url}}"
                                        style="color: rgb(53, 87, 53); font-size:18px; font-size:18px; font-size: 25px;""> <i
                                            class=" fas fa-file-download "></i></a>

                                            <a title=" Ver " href="/archivos/consecuencia/{{$imagen->url}}"
                                        target="_black" class="btn btn-light"
                                        style="color: rgb(143, 93, 148); font-size:18px; font-size: 25px;"><i
                                            class="fas fa-eye "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
        {{$imagenes->links()}}
    </div>
</div>
</div>


@endsection
