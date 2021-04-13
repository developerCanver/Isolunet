@extends('layouts.dashboard')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
		<a class="nav-item nav-link" href="{{ URL::to('/contexto_dofa') }}">Análisis</a>
        <a class="nav-item nav-link" href="{{ URL::to('/estrategias') }}"><h5><span class="badge badge-info">Estrategia</span></h5></a>
        <a class="nav-item nav-link" href="{{ URL::to('/matriz_dofa') }}">Matriz</a>
 
      </div>
    </div>
  </nav>

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Contexto</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Estrategia DOFA</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Estrategia FODA</h4>
        <p class="mg-b-0">Contexto</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('estrategias.store')}}" method="POST">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>
            <br><br>

            <input type="hidden" name="fk_empresa" class="form-control" value="{{$empresa->id_empresa}}">

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Tipo PESTAL</strong></label>
                        <select name="pestal_est" required class="form-control select2">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="Políticas">Políticas</option>
                            <option value="Económicas">Económicas</option>
                            <option value="Sociales">Sociales</option>
                            <option value="Tecnológicas">Tecnológicas</option>
                            <option value="Ambientales">Ambientales</option>
                            <option value="Legales">Legales</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Estrategias:</strong></label>
                        <input type="text" required name="estretegia" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Que voy a hacer</strong></label>
                        <input type="text" required name="que_hacer" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Como lo voy a hacer:</strong></label>
                        <input type="text" required name="como_hacer" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Por qué lo voy a hacer:</strong></label>
                        <input type="text" required name="porque_hacer" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Quien lo va hacer:</strong></label>
                        <input type="text" required name="quien" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Proceso involucrado:</strong></label>
                        <input type="text" required name="proceso" class="form-control">
                    </div>
                </div>
            </div>



            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>


        <br>
        <br>
        <h5 style="color: rgb(82, 82, 82)">Matriz aspectos e impactos </h5>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($consultas->isNotEmpty())

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Pestal</th>
                                <th>Estrategia</th>
                                <th>Que Hacer</th>
                                <th>como Hacer</th>
                                <th>Por qué</th>
                                <th>Quién</th>
                                <th>Proceso</th>

                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($consultas as $consulta)


                            <tr>
                                <td>{{$consulta->pestal_est}}</td>
                                <td>{{$consulta->estretegia}}</td>
                                <td>{{$consulta->que_hacer}}</td>
                                <td>{{$consulta->como_hacer}}</td>
                                <td>{{$consulta->porque_hacer}}</td>
                                <td>{{$consulta->quien}}</td>
                                <td>{{$consulta->proceso}}</td>
                                <td>
                                    <div class="form-row align-items-center">
                                        <a data-toggle="modal" data-target="#myModal-{{ $consulta->id_estrategia  }}"
                                            style="color: #18A4B4" title="Editar"><i
                                                class="fas fa-pencil-alt fa-2x"></i></a>

                                        <form action="{{route('estrategias.destroy',$consulta->id_estrategia  )}}"
                                            class="form-inline formulario-eliminar" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button class=" btn btn-light btn-sm">
                                                <i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i>
                                            </button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                            {{-- editar analisis interno --}}

                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" id="myModal-{{ $consulta->id_estrategia }}">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <center>
                                                <h5 style="color: rgb(46, 46, 46);" class="p-2">Editar Estrategia DOFA
                                                </h5>
                                            </center>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form action="{{ route('estrategias.update', $consulta->id_estrategia)}}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="container">

                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label><strong>Tipo PESTAL</strong></label>
                                                            <select name="pestal_est" required class="form-control ">
                                                                <option selected disabled value="">Seleccionar...
                                                                </option>
                                                                <option value="Políticas"
                                                                    {{ $consulta->pestal_est == "Políticas" ? 'selected' : ''}}>
                                                                    Políticas</option>
                                                                <option value="Económicas"
                                                                    {{ $consulta->pestal_est == "Económicas" ? 'selected' : ''}}>
                                                                    Económicas</option>
                                                                <option value="Sociales"
                                                                    {{ $consulta->pestal_est == "Sociales" ? 'selected' : ''}}>
                                                                    Sociales</option>
                                                                <option value="Tecnológicas"
                                                                    {{ $consulta->pestal_est == "Tecnológicas" ? 'selected' : ''}}>
                                                                    Tecnológicas</option>
                                                                <option value="Ambientales"
                                                                    {{ $consulta->pestal_est == "Ambientales" ? 'selected' : ''}}>
                                                                    Ambientales</option>
                                                                <option value="Legales"
                                                                    {{ $consulta->pestal_est == "Legales" ? 'selected' : ''}}>
                                                                    Legales</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label><strong>Estrategias:</strong></label>
                                                            <input type="text" required name="estretegia"
                                                                class="form-control" value="{{$consulta->estretegia}}">
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label><strong>Que voy a hacer</strong></label>
                                                            <input type="text" required name="que_hacer"
                                                                class="form-control" value="{{$consulta->que_hacer}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label><strong>Como lo voy a hacer:</strong></label>
                                                            <input type="text" required name="como_hacer"
                                                                class="form-control" value="{{$consulta->como_hacer}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="datos"><strong>Por qué lo voy a
                                                                    hacer:</strong></label>
                                                            <input type="text" required name="porque_hacer"
                                                                class="form-control"
                                                                value="{{$consulta->porque_hacer}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="datos"><strong>Quien lo va
                                                                    hacer:</strong></label>
                                                            <input type="text" required name="quien"
                                                                class="form-control" value="{{$consulta->quien}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="datos"><strong>Proceso
                                                                    involucrado:</strong></label>
                                                            <input type="text" required name="proceso"
                                                                class="form-control" value="{{$consulta->proceso}}">
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Editar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- fin momdal --}}

                            @endforeach

                        </tbody>
                    </table>
                    {{ $consultas->links() }}
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




@endsection
