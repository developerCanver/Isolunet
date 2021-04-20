@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Planificación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Aspectos e Impactos Ambientales</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Planificación</h4>
        <p class="mg-b-0"> Editar Aspectos e Impactos Ambientales</p>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">

        <form action="{{ route('diseno_desarrollo.update', $consulta->id_diseno)}}" method="POST">
            @csrf
            @method('PUT')

            <h4>{{$empresa->razon_social}} </h4>

            <br><br>
       
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Proceso General/Zona:</strong></label>
                        <input type="text" required name="general" class="form-control" value="{{$consulta->general}}">
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                    <div class="form-group">
                        <label><strong>Procesos Unitarios:</strong></label>
                        <input type="text" required name="unitarios" class="form-control" value="{{$consulta->unitarios}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Categoría Aspecto Ambiental:</strong></label>
                        <input type="text" required name="cate_aspectos" class="form-control" value="{{$consulta->cate_aspectos}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Aspecto Ambiental a Evaluar:</strong></label>
                        <input type="text" required name="aspectos_ambiental" class="form-control" value="{{$consulta->aspectos_ambiental}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Impacto Ambiental:</strong></label>
                        <input type="text" required name="impacto" class="form-control" value="{{$consulta->impacto}}">
                    </div>
                </div>
            </div>

            <h5>Calificación del Impacto</h5>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Responsabilidad:</strong></label>
                        <input type="text" required name="responsabilidad" class="form-control" value="{{$consulta->responsabilidad}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Situación Operacional:</strong></label>
                        <input type="text" required name="situacion" class="form-control"  value="{{$consulta->situacion}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Tipo De Impacto:</strong></label>
                        <input type="text" required name="tipo_impacto" class="form-control"  value="{{$consulta->tipo_impacto}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>cumple Requisito Legal:</strong></label>
                        <select name="legal" required class="form-control ">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="Si" @if($consulta->legal == 'Si') selected  @endif >Si</option>
                            <option value="No" @if($consulta->legal == 'No') selected  @endif >No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Cumple Control:</strong></label>
                        <select name="control" required class="form-control ">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="Si" @if($consulta->control == 'Si') selected  @endif >Si</option>
                            <option value="No" @if($consulta->control == 'No') selected  @endif >No</option>
                        
                        </select>
                    </div>
                </div>
            </div>
            <h5>Grado de Afectación al Medio</h5>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Periodicidad (P):</strong></label>
                        <select name="periodicidad" required class="form-control ">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="No Aplica" @if($consulta->periodicidad == 'No Aplica') selected  @endif >No Aplica</option>
                            <option value="Afectación Leve" @if($consulta->periodicidad == 'Afectación Leve') selected  @endif >Afectación Leve</option>
                            <option value="Afectación significativa" @if($consulta->periodicidad == 'Afectación significativa') selected  @endif >Afectación significativa</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Intensidad (I):</strong></label>
                        <select name="intensidad" required class="form-control ">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="No Aplica" @if($consulta->intensidad == 'No Aplica') selected  @endif >No Aplica</option>
                            <option value="Afectación Leve" @if($consulta->intensidad == 'Afectación Leve') selected  @endif >Afectación Leve</option>
                            <option value="Afectación significativa" @if($consulta->intensidad == 'Afectación significativa') selected  @endif >Afectación significativa</option>
                        </select>
                    </div>
                </div>															
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Permanencia Del Impacto (PI):</strong></label>
                        <select name="permanencia" required class="form-control ">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="No Aplica" @if($consulta->permanencia == 'No Aplica') selected  @endif >No Aplica</option>
                            <option value="Afectación Leve" @if($consulta->permanencia == 'Afectación Leve') selected  @endif >Afectación Leve</option>
                            <option value="Afectación significativa" @if($consulta->permanencia == 'Afectación significativa') selected  @endif >Afectación significativa</option>
                          
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Afectación De Las Partes Interesadas:</strong></label>
                        <input type="number" required name="afectacion" class="form-control" value="{{$consulta->afectacion}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>N° Significancia:</strong></label>
                        <input type="number" required name="num_sinificancia" class="form-control" value="{{$consulta->num_sinificancia}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Significancia:</strong></label>
                        <select name="sinificancia" required class="form-control ">
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="Alta" @if($consulta->sinificancia == 'Alta') selected  @endif >Alta</option>
                            <option value="Media" @if($consulta->sinificancia == 'Media') selected  @endif >Media</option>
                            <option value="Baja" @if($consulta->sinificancia == 'Baja') selected  @endif >Baja</option>
                            <option value="Ninguna" @if($consulta->sinificancia == 'Ninguna') selected  @endif >Ninguna</option>
                     
                        </select>
                 

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label for="datos"><strong>Programa ambiental asociado/tipo de control:</strong></label>
                        <input type="text" required name="programa" class="form-control" value="{{$consulta->programa}}">
                    </div>
                </div>

            </div>
       



  




 

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
    {!!Form::close()!!}
    <br>
</div>
</div>




@endsection
