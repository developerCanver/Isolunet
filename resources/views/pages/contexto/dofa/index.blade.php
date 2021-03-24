@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="">Contexto</a>
	  <span class="breadcrumb-item active">Dofa</span>
	</nav>
</div>
<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Administración DOFA</h4>
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
		</div>
<br>

<p>Con base en la identificación de las anteriores cuestiones externas e internas que puede afectar el sistema de gestión de calidad de XXX, se elaboró la matriz DOFA, la cual después de analizarla nos permitió identificar los riesgos y oportunidades estratégicas para el sistema de gestión de calidad:</p>
<br>
@include('partials.message_flash')
	{{  Form::open(['action' => 'Contexto\DofaController@store','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
	{!! Form::token() !!}
<div class="table-responsive">
	  <table class="table table-bordered">
    	<thead>
	        <tr><th colspan="2"><center>ANÁLISIS INTERNO</center></th>
	        <th colspan="2"><center>ANÁLISIS EXTERNO</center></th>
      	</tr></thead>
      	<tbody>
      		<tr>
	      		<td>Debilidades</td>
	      		<td>Fortalezas</td>
	      		<td>Amenazas</td>
	      		<td>Opurtunidades</td>
      		</tr>
      		<tr>
      			<td>
      				<textarea name="debilidades" id="debilidades" class="form-control" cols="30" rows="3"></textarea>
      			</td>
      			<td>
      				<textarea name="fortalezas" id="fortalezas" class="form-control" cols="30" rows="3"></textarea>
      			</td>
      			<td>
      				<textarea name="amenazas" id="amenazas" class="form-control" cols="30" rows="3"></textarea>
      			</td>
      			<td>
      				<textarea name="oportunidades" id="oportunidades" class="form-control" cols="30" rows="3"></textarea>
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
          <tr><th></th>
	        <th colspan="2"><center>ANALISIS INTERNO</center></th>
	        <th colspan="2"><center>ANALISIS EXTERNO</center></th>
	        <th></th>
      	</tr></thead>
      	<tbody>
      		<tr>
            <td style="color:#C10000">Empresa</td>
	      		<td style="color: #00B050"><b>Debilidades</b></td>
	      		<td style="color: #00B050"><b>Fortalezas</b></td>
	      		<td style="color: #00B050"><b>Amenazas</b></td>
	      		<td style="color: #00B050"><b>Opurtunidades</b></td>
	      		<td style="color: #FF0024"><b>Opciones</b></td>
      		</tr>
      		@foreach ($dofa as $e)
      			<tr>
      			<td>{{ $e->razon_social }}</td>
      			<td>{{ $e->debilidades }}</td>
      			<td>{{ $e->fortalezas }}</td>
      			<td>{{ $e->amenazas }}</td>
            	<td>{{ $e->oportunidades }}</td>
            	<td>
            		<a data-toggle="modal" data-target="#myModal-{{ $e->id_dofa }}" style="color: #00BE31" title="Editar"><i class="fas fa-pencil-alt fa-2x"></i></a>
            		<a data-toggle="modal" data-target="#myModal-delete-{{ $e->id_dofa }}" style="color: #F7072F" title="Eliminar"><i class="fas fa-trash-alt fa-2x"></i></a>
            	</td>
      		</tr>



			@include('pages.contexto.dofa.modals.modal_edit')
			@include('pages.contexto.dofa.modals.modal_delete')

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