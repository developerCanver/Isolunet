@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Operación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Planificación y control</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Planificación y control</h4>
        <p class="mg-b-0">Operación</p>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('planeacio_control.store')}}" method="POST">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>

            <div class="row">
            </div><br><br>

            <input type="hidden" name="fk_empresa" class="form-control" required value="{{$empresa->id_empresa}}">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Proceso:</strong></label>
                        <select name="proceso" class="form-control " required>
                            <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                            @foreach ($procesos as $procesos)
                            <option value="{{ $procesos->nom_proceso  }}">{{ $procesos->nom_proceso }}</option>
                            @endforeach
                        </select>


                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Material:</strong></label>
                        <input type="text" name="material" class="form-control">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">

                        <label><strong>Variable:</strong></label>
                        <input type="text" name="variable" class="form-control" required>


                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Unidad:</strong></label>
                        <input type="text" name="unidad" class="form-control" required>


                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>LI:</strong></label>
                        <input type="number" name="li" class="form-control" step="any">

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">

                        <label><strong>LC:</strong></label>
                        <input type="number" name="lc" class="form-control" step="any">


                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>LS:</strong></label>
                        <input type="number" name="ls" class="form-control" step="any">


                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Control:</strong></label>
                        <input type="text" name="control" class="form-control" required step="any">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Responsable de Operación:</strong></label>
                        <input type="text" name="operacion" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Frecuencia de Medición:</strong></label>
                        <input type="text" name="frecuencia" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Metodo:</strong></label>
                        <input type="text" name="metodo" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Responsable de Registro:</strong></label>
                        <input type="text" name="registro" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Instrumento de Medición:</strong></label>
                        <input type="text" name="instrumento" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Registro de Seguimiento:</strong></label>
                        <input type="text" name="seguimiento" class="form-control" required>
                    </div>
                </div>
            </div>





            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($planeaciones->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Proceso</th>
                                <th>Material</th>
                                <th>Variable</th>
                                <th>Unidad</th>
                                <th>LI</th>
                                <th>LC</th>
                                <th>LS</th>
                                <th>Control</th>
                                <th>Responsable Operación</th>
                                <th>Frecuencia Medición</th>
                                <th>Metodo</th>
                                <th>Responsable Registro</th>
                                <th>Instrumento Medición</th>
                                <th>Registro Seguimiento</th>

                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($planeaciones as $planeacion)

                            <tr>
                                <td>{{$planeacion->proceso}}</td>
                                <td>{{$planeacion->material}}</td>
                                <td>{{$planeacion->variable}}</td>
                                <td>{{$planeacion->unidad}}</td>
                                <td>{{$planeacion->li}}</td>
                                <td>{{$planeacion->lc}}</td>
                                <td>{{$planeacion->ls}}</td>
                                <td>{{$planeacion->control}}</td>
                                <td>{{$planeacion->operacion}}</td>
                                <td>{{$planeacion->frecuencia}}</td>
                                <td>{{$planeacion->metodo}}</td>
                                <td>{{$planeacion->registro}}</td>
                                <td>{{$planeacion->instrumento}}</td>
                                <td>{{$planeacion->seguimiento}}</td>
                                <td>
                                    <div class="form-row align-items-center">
                                        <a
                                            href="{{ URL::action('Planeacion\PlaneacioControlController@edit',$planeacion->id_planeacion) }}"><i
                                                class=" form-inline fas fa-pencil-alt fa-2x"
                                                style="color:#18A4B4;"></i></a>

                                        <form
                                            action="{{route('planeacio_control.destroy', $planeacion->id_planeacion)}}"
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
                    {{ $planeaciones->links() }}
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
