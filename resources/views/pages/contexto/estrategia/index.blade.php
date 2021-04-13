@extends('layouts.dashboard')

@section('content')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Planeación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Diseño y Desarrollo</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Planeación</h4>
        <p class="mg-b-0">Diseño y Desarrollo</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('diseno_desarrollo.store')}}" method="POST">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>
            <br><br>

            <input type="hidden" name="fk_empresa" class="form-control"  value="{{$empresa->id_empresa}}">

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Tipo PESTAL</strong></label>
                        <select name="pestal" required class="form-control select2">
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
                        <input type="text" required name="unitarios" class="form-control">
                    </div>
                </div>
            </div>
      
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Que voy a hacer</strong></label>
                        <input type="text" required name="unitarios" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Como lo voy a hacer:</strong></label>
                        <input type="text" required name="unitarios" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Por qué lo voy a hacer:</strong></label>
                        <input type="text" required name="cate_aspectos" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Quien lo va hacer:</strong></label>
                        <input type="text" required name="aspectos_ambiental" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Proceso involucrado:</strong></label>
                        <input type="text" required name="impacto" class="form-control">
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
                                <th>Proceso General</th>
                                <th>Procesos Unitario</th>
                                <th>Categoría Aspecto Ambiental</th>
                                <th>Aspecto Ambiental a Evaluar</th>
                                <th>Impacto Ambiental</th>
                                <th>Responsabilidad:</th>

                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($consultas as $consulta)


                            <tr>
                                <td>{{$consulta->general}}</td>
                                <td>{{$consulta->unitarios}}</td>
                                <td>{{$consulta->cate_aspectos}}</td>
                                <td>{{$consulta->aspectos_ambiental}}</td>
                                <td>{{$consulta->impacto}}</td>
                                <td>{{$consulta->responsabilidad}}</td>
                                <td>
                                    <div class="form-row align-items-center">
                                        <a
                                            href="{{ URL::action('Planeacion\DiseñoController@edit',$consulta->id_diseno ) }}"><i
                                                class=" form-inline fas fa-pencil-alt fa-2x"
                                                style="color:#18A4B4;"></i></a>

                                        <form
                                            action="{{route('diseno_desarrollo.destroy',$consulta->id_diseno )}}"
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
