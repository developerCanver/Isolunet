@extends('layouts.dashboard')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{ URL::to('/contexto_dofa') }}">Análisis</a>
            <a class="nav-item nav-link" href="{{ URL::to('/estrategias') }}">Estrategia</a>
            <a class="nav-item nav-link" href="{{ URL::to('/matriz_dofa') }}">
                <h5><span class="badge badge-info">Matriz</span></h5>
            </a>

        </div>
    </div>
</nav>

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Contexto</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Matriz DOFA</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Matriz DOFA</h4>
        <p class="mg-b-0">Contexto</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('matriz_dofa.store')}}" method="POST">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>
            <br><br>

            <input type="hidden" name="fk_empresa" class="form-control" value="{{$empresa->id_empresa}}">

            @livewire('contexto.matriz-dofa')


            <style>
                .cont {
                    min-height: 110px;
                    width: 100%;
                    padding: 5px;
                    background: #0866c6;
                    color: #fff;
                    display: grid;
                    justify-content: center;
                    align-items: center;
                    border-radius: 10px;

                    box-shadow: 0px 3px 9px 3px #9d9b9b;
                    -moz-box-shadow: 0px 3px 9px 3px #9d9b9b;
                    -webkit-box-shadow: 0px 3px 9px 3px #9d9b9b;
                }

            </style>



            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label><strong>Descripción</strong></label>
                        <textarea name="descrpcion_matriz" id="descrpcion_matriz" class="form-control" required
                            cols="140" rows="2"></textarea>
                    </div>
                </div>
            </div>




            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>


        <br>
        <br>
        <h5 style="color: rgb(82, 82, 82)">Matriz DOFA </h5>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    <br>


                    <div class="container">
                        @if ($consulta_opor->isNotEmpty())
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                <div class="form-group">
                                    <center>
                                        <h5 style="color: rgb(82, 82, 82)">Estrategias F.O.</h5>
                                    </center>
                                    <div class="cont">
                                        
                                        @foreach ($consulta_opor as $oportunidad)
                                        @if ($oportunidad->tipo_fd == 'Fortalezas')

                                            <div class=" form-row align-items-center">
                                                <p class="mg-b-0 pr-3">{{$oportunidad->descrpcion_matriz}}</p>
                                                <a data-toggle="modal" data-target="#myModal-{{ $oportunidad->id_matriz  }}"
                                                    style="color: #61ccff" title="Editar"><i
                                                        class="fas fa-pencil-alt "></i></a>

                                                <form action="{{route('matriz_dofa.destroy',$oportunidad->id_matriz   )}}"
                                                    method="POST">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button class=" btn btn-light btn-sm"
                                                        style="background: #6b573b00;border: aliceblue;">
                                                        <i class="fas fa-trash-alt " style="color:#eda4a4;"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                        {{-- editar analisis interno --}}

                                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                            aria-labelledby="myLargeModalLabel"
                                            id="myModal-{{ $oportunidad->id_matriz }}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <center>
                                                            <h5 style="color: rgb(46, 46, 46);" class="p-2">Editar
                                                                Estrategia DOFA
                                                            </h5>
                                                        </center>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form
                                                        action="{{ route('matriz_dofa.update', $oportunidad->id_matriz)}}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                      
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label><strong style="color: rgb(46, 46, 46);">Descripción</strong></label>
                                                                        <textarea name="descrpcion_matriz" id="descrpcion_matriz" class="form-control" required
                                                                            cols="40" rows="2">{{$oportunidad->descrpcion_matriz}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Cerrar</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Editar</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- fin momdal --}}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                <div class="form-group">
                                    <center>
                                        <h5 style="color: rgb(82, 82, 82)">Estrategias D.O.</h5>
                                    </center>
                                    <div class="cont">
                                        @foreach ($consulta_opor as $oportunidad)
                                        @if ($oportunidad->tipo_fd == 'Debilidaddes')
                                        <div class=" form-row align-items-center">
                                            <p class="mg-b-0 pr-3">{{$oportunidad->descrpcion_matriz}}</p>
                                            <a data-toggle="modal" data-target="#myModal-{{ $oportunidad->id_matriz  }}"
                                                style="color: #61ccff" title="Editar"><i
                                                    class="fas fa-pencil-alt "></i></a>

                                            <form action="{{route('matriz_dofa.destroy',$oportunidad->id_matriz   )}}"
                                                method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button class=" btn btn-light btn-sm"
                                                    style="background: #6b573b00;border: aliceblue;">
                                                    <i class="fas fa-trash-alt " style="color:#eda4a4;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                    {{-- editar analisis interno --}}

                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                        aria-labelledby="myLargeModalLabel"
                                        id="myModal-{{ $oportunidad->id_matriz }}">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <center>
                                                        <h5 style="color: rgb(46, 46, 46);" class="p-2">Editar
                                                            Estrategia DOFA
                                                        </h5>
                                                    </center>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form
                                                    action="{{ route('matriz_dofa.update', $oportunidad->id_matriz)}}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                  
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                                                <div class="form-group">
                                                                    <label><strong style="color: rgb(46, 46, 46);">Descripción</strong></label>
                                                                    <textarea name="descrpcion_matriz" id="descrpcion_matriz" class="form-control" required
                                                                        cols="40" rows="2">{{$oportunidad->descrpcion_matriz}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cerrar</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Editar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- fin momdal --}}
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
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
                        @if ($consulta_ame->isNotEmpty())
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                <div class="form-group">
                                    <center>
                                        <h5 style="color: rgb(82, 82, 82)">Estrategias F.A.</h5>
                                    </center>
                                    <div class="cont">
                                        @foreach ($consulta_ame as $amenazas)
                                        @if ($amenazas->tipo_fd == 'Fortalezas')
                                        <div class=" form-row align-items-center">
                                            <p class="mg-b-0 pr-3">{{$amenazas->descrpcion_matriz}}</p>
                                            <a data-toggle="modal" data-target="#myModal-{{ $amenazas->id_matriz  }}"
                                                style="color: #61ccff" title="Editar"><i
                                                    class="fas fa-pencil-alt "></i></a>

                                            <form action="{{route('matriz_dofa.destroy',$amenazas->id_matriz   )}}"
                                                method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button class=" btn btn-light btn-sm"
                                                    style="background: #6b573b00;border: aliceblue;">
                                                    <i class="fas fa-trash-alt " style="color:#eda4a4;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                    {{-- editar analisis interno --}}

                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                        aria-labelledby="myLargeModalLabel"
                                        id="myModal-{{ $amenazas->id_matriz }}">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <center>
                                                        <h5 style="color: rgb(46, 46, 46);" class="p-2">Editar
                                                            Estrategia DOFA
                                                        </h5>
                                                    </center>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form
                                                    action="{{ route('matriz_dofa.update', $amenazas->id_matriz)}}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                  
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                                                <div class="form-group">
                                                                    <label><strong style="color: rgb(46, 46, 46);">Descripción</strong></label>
                                                                    <textarea name="descrpcion_matriz" id="descrpcion_matriz" class="form-control" required
                                                                        cols="40" rows="2">{{$amenazas->descrpcion_matriz}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cerrar</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Editar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- fin momdal --}}
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                <div class="form-group">
                                    <center>
                                        <h5 style="color: rgb(82, 82, 82)">Estrategias D.A.</h5>
                                    </center>
                                    <div class="cont">
                                        @foreach ($consulta_ame as $amenazas)
                                        @if ($amenazas->tipo_fd == 'Debilidaddes')
                                        <div class=" form-row align-items-center">
                                            <p class="mg-b-0 pr-3">{{$amenazas->descrpcion_matriz}}</p>
                                            <a data-toggle="modal" data-target="#myModal-{{ $amenazas->id_matriz  }}"
                                                style="color: #61ccff" title="Editar"><i
                                                    class="fas fa-pencil-alt "></i></a>

                                            <form action="{{route('matriz_dofa.destroy',$amenazas->id_matriz   )}}"
                                                method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button class=" btn btn-light btn-sm"
                                                    style="background: #6b573b00;border: aliceblue;">
                                                    <i class="fas fa-trash-alt " style="color:#eda4a4;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                    {{-- editar analisis interno --}}

                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                        aria-labelledby="myLargeModalLabel"
                                        id="myModal-{{ $amenazas->id_matriz }}">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <center>
                                                        <h5 style="color: rgb(46, 46, 46);" class="p-2">Editar
                                                            Estrategia DOFA
                                                        </h5>
                                                    </center>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form
                                                    action="{{ route('matriz_dofa.update', $amenazas->id_matriz)}}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                  
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                                                <div class="form-group">
                                                                    <label><strong style="color: rgb(46, 46, 46);">Descripción</strong></label>
                                                                    <textarea name="descrpcion_matriz" id="descrpcion_matriz" class="form-control" required
                                                                        cols="40" rows="2">{{$amenazas->descrpcion_matriz}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cerrar</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Editar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- fin momdal --}}
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
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
</div>




@endsection
