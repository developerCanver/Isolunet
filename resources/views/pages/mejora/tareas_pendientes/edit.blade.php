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

        <form action="{{ route('tareas_pendientes.update', $consulta->id_acta   )}}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h4>{{$empresa->razon_social}} </h4>

            <br><br>
           
            <h5 style="color: rgb(46, 46, 46);">Acta</h5>

    

            <h5 class="pt-3" style="color: rgb(46, 46, 46);">Ejecucción de Compromisos</h5>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Compromiso:</strong></label>
                        <input type="text" required name="compromiso" class="form-control" >
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Acción Ejecutable:</strong></label>
                        <input type="text" required name="ejecutable" class="form-control" >
                   
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Fecha Inicio:</strong></label>
                        <input type="date" required name="fecha_inicio_eje" class="form-control" >
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label><strong>Fecha Final:</strong></label>
                        <input type="date" required name="fecha_final_eje" class="form-control" >
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
                        <textarea name="observaciones_ejecuccion" class="form-control" required="true"></textarea>
                    </div>
                </div>
            </div>
  
          
           

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
