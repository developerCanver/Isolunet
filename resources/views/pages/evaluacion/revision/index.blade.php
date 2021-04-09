@extends('layouts.dashboard')

@section('content')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Evaluación Desempeño</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Revisión por la Dirección</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Evaluación Desempeño</h4>
        <p class="mg-b-0">Revisión por la Dirección</p>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('revision.store')}}" method="POST">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>
            <br><br>

            <input type="hidden" name="fk_empresa" class="form-control" required value="{{$empresa->id_empresa}}">

            <h5 style="color: rgb(46, 46, 46);">1. Identificación del Informe</h5>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>Fecha de revisión por la dirección:</strong></label>
                        <input type="date" required name="fecha_revision" class="form-control">
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                    <div class="form-group">
                        <label><strong>Periodo analizado por la dirección:</strong></label>
                        <input type="text" required name="periodo" class="form-control">
                    </div>
                </div>
            </div>
            <h5 style="color: rgb(46, 46, 46);">2. Participantes del Ejercicio</h5>

            @livewire('evaluacion.revision-users', ['post' => null ]);
            {{-- <livewire:evaluacion.revision-users /> --}}
            
            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
					<div class="form-group">
                        <h5 style="color: rgb(46, 46, 46);">3. Entradas y 4. Salidas</h5>
						<textarea name="entrada_salida" id="editor1" ></textarea>
					</div>
				</div>
			</div>



            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>


        <br>
        <br>
        <h5 style="color: rgb(82, 82, 82)">Lista Revisión por la Dirección </h5>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    @if ($consultas->isNotEmpty())

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha de revisión</th>
                                <th>Periodo analizado</th>
                     

                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($consultas as $consulta)


                            <tr>
                                <td>{{$consulta->fecha_revision}}</td>
                                <td>{{$consulta->periodo}}</td>
                                <td>
                                    <div class="form-row align-items-center">
                                        <a
                                            href="{{ URL::action('Evaluacion\RevisionController@edit',$consulta->id_revision ) }}"><i
                                                class=" form-inline fas fa-pencil-alt fa-2x"
                                                style="color:#18A4B4;"></i></a>

                                        <form
                                            action="{{route('revision.destroy',$consulta->id_revision )}}"
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

   <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>


<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)

 CKEDITOR.replace( 'entrada_salida' );

$('.input-number').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});

</script>


@endsection
