@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Mejora</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Acta</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Mejora</h4>
        <p class="mg-b-0">Editar Acta</p>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">

        <form action="{{ route('acta.update', $consulta->id_acta   )}}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h4>{{$empresa->razon_social}} </h4>

            <br><br>
           
            <h5 style="color: rgb(46, 46, 46);">Acta</h5>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Nombre de Acta:</strong></label>
                        <input type="text" required name="acta" class="form-control" value="{{$consulta->acta}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Sistema de Gestión:</strong></label>
                        <select name="gestion" class="form-control select2" required>
                            <option selected disabled value="">Seleccione Gestión...</option>
                            @foreach ($gestiones as $gestion)
                            <option value="{{ $gestion->str_nombre }}" {{ $gestion->str_nombre == $consulta->gestion ? 'selected' : ''}} >
                                {{ $gestion->str_nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Proceso:</strong></label>
                        <select name="proceso" class="form-control select2" required>
                            <option selected disabled value="">Seleccione Proceso...</option>
                            @foreach ($procesos as $proceso)
                            <option value="{{ $proceso->nom_proceso }}" {{ $proceso->nom_proceso == $consulta->proceso ? 'selected' : ''}} >
                                {{ $proceso->nom_proceso }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <h5 style="color: rgb(46, 46, 46);">Información de Reunión</h5>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Tipo de Acta:</strong></label>
                        <select name="tipo_acta" class="form-control select2" required>
                            <option selected disabled value="">Seleccionar</option>
                            <option value="Privada" {{ $consulta->tipo_acta == 'Privada' ? 'selected' : '' }} >Privada</option>
                            <option value="Publica" {{ $consulta->tipo_acta == 'Publica' ? 'selected' : '' }} >Publica</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Fecha:</strong></label>
                        <input type="date" required name="fecha_acta" class="form-control" value="{{$consulta->fecha_acta}}">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>lugar:</strong></label>
                        <input type="text" required name="lugar" class="form-control" value="{{$consulta->lugar}}">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Hora:</strong></label>
                        <input type="text" required name="hora_acta" class="form-control" value="{{$consulta->hora_acta}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Fecha Próxima Reunión:</strong></label>
                        <input type="date" required name="fecha_proxima" class="form-control" value="{{$consulta->fecha_proxima}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Registrado por</strong></label>
                        <input type="text" required name="registrado" class="form-control" value="{{$consulta->registrado}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label><strong>Observaciones:</strong></label>
                        <textarea name="observaciones_acta" rows="2" cols="140" required="true">{{$consulta->observaciones_acta}}</textarea>
                    </div>
                </div>
            </div>
            @livewire('mejora.acta-asistentes', ['post' => $consulta->id_acta ])

            @livewire('mejora.acta-temas', ['post' => $consulta->id_acta ])
          
            <h5 class="pt-3" style="color: rgb(46, 46, 46);">Acciones y Compromisos</h5>

            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Acción:</strong></label>
                        <input type="text" required name="accion" class="form-control" value="{{$consulta->accion}}">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Responsable:</strong></label>
                        <select name="responsable" class="form-control " required>
                            <option selected disabled value="">Seleccione Usuario...</option>
                            @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->name }}" {{ $usuario->name == $consulta->responsable ? 'selected' : ''}}>
                                {{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                						
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Fecha Inicio:</strong></label>
                        <input type="date" required name="fecha_inicio_acc" class="form-control" value="{{$consulta->fecha_inicio_acc}}">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Fecha Final:</strong></label>
                        <input type="date" required name="fecha_final_acc" class="form-control" value="{{$consulta->fecha_final_acc}}">
                    </div>
                </div>
            </div>
@if ($consulta->terminada == 1)
    

            <h5 class="pt-3" style="color: rgb(46, 46, 46);">Ejecucción de Compromisos</h5>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Compromiso:</strong></label>
                        <input type="text" required name="compromiso" class="form-control" value="{{$consulta->compromiso}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Acción Ejecutable:</strong></label>
                        <input type="text" required name="ejecutable" class="form-control" value="{{$consulta->ejecutable}}">
                   
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Fecha Inicio:</strong></label>
                        <input type="date" required name="fecha_inicio_eje" class="form-control" value="{{$consulta->fecha_inicio_eje}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Fecha Final:</strong></label>
                        <input type="date" required name="fecha_final_eje" class="form-control" value="{{$consulta->fecha_final_eje}}">
                    </div>
                </div>
                			
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Archivo:</strong></label>
                        <input type="file"  name="archivo" >
                        <input type="hidden"  name="archivo_anterior" value="{{$consulta->archivo}}">
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label><strong>Observaciones Ejecucción:</strong></label>
                        <textarea name="observaciones_ejecuccion" rows="2" cols="140" required="true">{{$consulta->observaciones_acta}}</textarea>
                    </div>
                </div>
            </div>
            @endif
          
           

<br>
<br>
 

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
    {!!Form::close()!!}
    <br>
</div>
</div>


<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>


<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)

 CKEDITOR.replace( 'entrada_salida' );

$('.input-number').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});

</script>

@endsection
