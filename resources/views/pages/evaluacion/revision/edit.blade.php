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
        <p class="mg-b-0"> Editar Diseño y Desarrollo</p>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">

        <form action="{{ route('revision.update', $consulta->id_revision)}}" method="POST">
            @csrf
            @method('PUT')

            <h4>{{$empresa->razon_social}} </h4>

            <br><br>
            <h5 style="color: rgb(46, 46, 46);">1. Identificación del Informe</h5>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Fecha de revisión por la dirección:</strong></label>
                        <input type="date" required name="fecha_revision" class="form-control" value="{{$consulta->fecha_revision}}">
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                    <div class="form-group">
                        <label><strong>Periodo analizado por la dirección:</strong></label>
                        <input type="text" required name="periodo" class="form-control" value="{{$consulta->periodo}}">
                    </div>
                </div>
            </div>
            

            @livewire('evaluacion.revision-users', ['post' => $consulta->id_revision])
            {{-- <livewire:evaluacion.revision-users /> --}}
            
            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
					<div class="form-group">
                        <h5 style="color: rgb(46, 46, 46);">3. Entradas y 4. Salidas</h5>
						<textarea name="entrada_salida" id="editor1">{{$consulta->entrada_salida}}</textarea>
					</div>
				</div>
			</div>
           


 

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
