@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="">Contexto</a>
	  <span class="breadcrumb-item active">Riegsos y Oportunidades</span>
	</nav>
</div>
<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Administracion Riegos y Oportunidades</h4>
  		<p class="mg-b-0">Contexto</p>
	</div>
</div>

<div class="br-pagebody">
  <div class="br-section-wrapper">
	
	  	 <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		        @if (count($errors) > 0)
		        <div class="alert alert-danger">
			        <ul>
			            @foreach($errors -> all() as $error)
			                <li>{{$error}}</li>
			            @endforeach
			        </ul>
		        </div>
		        @endif
		    </div>
		</div><br>

<p>Una vez identificadas las fortalezas, debilidades, oportunidades y amenazas, se identificaron los riesgos y oportunidades estratégicas las cuales se describen a continuación:</p>
<br>
@include('partials.message_flash')
	{{  Form::open(['action' => 'Contexto\RiesgoOportunidadesController@store','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
	{!! Form::token() !!}
<div class="table-responsive">
	  <table class="table table-bordered">
    	<thead>
	     <tr>
	        <th colspan="2"><center>Descripción del riesgo u oportunidad</center></th>
	        <th colspan="2"><center>Clasificación</center></th>
      	</tr>
      </thead>
      	<tbody>      		
      		<tr>
      			<td colspan="2">
      				<textarea name="riesgo" id="riesgo" class="form-control" cols="30" rows="3"></textarea>
      			</td>
      			<td colspan="2">
      				<textarea name="clasificacion" id="clasificacion" class="form-control" cols="30" rows="3"></textarea>
      			</td>
      		</tr>
      	</tbody> 
      	<tfoot>
      		<tr><td colspan="4">
      			 <div class="form-group">
		           <button type="submit" id="bt_add" class="btn btn-primary">Agregar</button>
		        </div>
      		</td>
      	</tr></tfoot>
	  </table>
	</div>
	  {!!Form::close()!!}
<hr>
<div class="table-responsive">
	  <table class="table table-bordered">
    	<thead>
         <tr>
	        <th colspan="2"><center>Descripción del riesgo u oportunidad</center></th>
	        <th colspan="2"><center>Clasificación</center></th>
	        <th>opciones</th>
	       
      	</tr>
      </thead>
      	<tbody>
      		@foreach ($riesgo as $e)
      			<tr>
      			<td colspan="2">{{ $e->riesgo_oportunidad }}</td>
      			<td colspan="2">{{ $e->clasificacion }}</td>
            	<td>
            		<a data-toggle="modal" data-target="#myModal-{{ $e->id_riesgos_oportunidades }}" style="color: #00BE31" title="Editar"><i class="fas fa-pencil-alt fa-2x"></i></a>
            		<a data-toggle="modal" data-target="#myModal-delete-{{ $e->id_riesgos_oportunidades }}" style="color: #F7072F" title="Eliminar"><i class="fas fa-trash-alt fa-2x"></i></a>
            	</td>
      		</tr>



			@include('pages.contexto.riesgos_oportunidades.modals.modal_edit')
			@include('pages.contexto.riesgos_oportunidades.modals.modal_delete')

      		@endforeach
            
             
         </tbody> 
        
	  </table>
    
	</div>


	</div>
</div>


@endsection


@push('scripts')
  
<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)


$('.input-number').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});

 
</script>
@endpush 