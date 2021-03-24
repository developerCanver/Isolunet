@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrizacicon</a>
	  <span class="breadcrumb-item active">Agregar Origen Anomalia</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Origen Anomalia</h4>
  		<p class="mg-b-0">Anomalia</p>
	</div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
  	@include('partials.message_flash')
{{  Form::open(['action' => ['Parametrizacion\OrigenanomaliaController@edit',$anomalia->id_origen_anomalia],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
{!! Form::token() !!}
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
			    	<label for="datos">Origen</label>
			    	<input type="text" name="origen_anomalia" class="form-control" value="{{ $anomalia->nombre }}" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<button type="submit" class="btn btn-warning">Editar</button>
			</div>
		</div>

	  {!!Form::close()!!}


		<div class="row">
			<div class="table-responsive">
				<table class="table table-striped">
					<caption>Origen de anomalia</caption>
					<thead>
						<tr>
							<th>Origen</th>
							<th>
								Opciones
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($anomalias as $h)
							<tr>
								<td>{{ $h->nombre }}</td>
								<td>
									<a href="{{ URL::action('Parametrizacion\OrigenanomaliaController@edit_origen_anomalia',$h->id_origen_anomalia) }}"><i class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
				    				<a href="{{ URL::action('Parametrizacion\OrigenanomaliaController@delete',$h->id_origen_anomalia) }}" ><i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
								</td>
							</tr>
						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>





  </div>
</div>
@endsection


@push('scripts')

@endpush 