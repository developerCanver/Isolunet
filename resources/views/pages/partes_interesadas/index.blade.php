@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <span class="breadcrumb-item active">Partes Interesadas</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Partes Interesadas</h4>
  		<p class="mg-b-0"></p>
  		<a href="{{ URL::to('pi_calificaciones') }}" class="btn btn-primary btn-xs" >Agregar Calificaciones</a>
	</div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
	@include('partials.message_flash')
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

<div class="row">
	
	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
		<p>Criterio de calificación Impacto (Impacto en la capacidad de la organización para proporcionar productos y servicios que cumplan los requisitos)</p>
	</div>
	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
		<p>Criterio de calificación Influencia (Influencia en el desempeño o las decisiones de la organización, influencia para crear riesgos y oportunidades, influencia en el mercado, influencia en la capacidad para afectar la organización mediante sus decisiones o actividades)</p>
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
		<div class="table-responsive">
			<p>IMPACTO</p>
		  <table class="table table-hover">
		   		<thead style="background: #18A6B0; color: #FFFFFF;">
		   			<tr>
		   				<th>Calificación cuantitativa</th>
		   				<th>Calificacion cualitativa</th>
		   				<th>Descripcion</th>
		   			</tr>
		   		</thead>
		   		<tbody>
	   				<tr>
	   					<td>5</td>
	   					<td>{{ $formimpacto->calcualitativa5 }}</td>
	   					<td>{{ $formimpacto->descripcion5 }}</td>
	   				</tr>
	   				<tr>
	   					<td>4</td>
	   					<td>{{ $formimpacto->calcualitativa4 }}</td>
	   					<td>{{ $formimpacto->descripcion4 }}</td>
	   				</tr>
	   				<tr>
	   					<td>3</td>
	   					<td>{{ $formimpacto->calcualitativa3 }}</td>
	   					<td>{{ $formimpacto->descripcion3 }}</td>
	   				</tr>
	   				<tr>
	   					<td>2</td>
	   					<td>{{ $formimpacto->calcualitativa2 }}</td>
	   					<td>{{ $formimpacto->descripcion2 }}</td>
	   				</tr>
	   				<tr>
	   					<td>1</td>
	   					<td>{{ $formimpacto->calcualitativa1 }}</td>
	   					<td>{{ $formimpacto->descripcion1 }}</td>
	   				</tr>
		   		</tbody>
		  </table>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
		<div class="table-responsive">
			<p>INFLUENCIA</p>
		  <table class="table table-hover">
		   		<thead style="background: #18A6B0; color: #FFFFFF;">
		   			<tr>
		   				<th>Calificación cuantitativa</th>
		   				<th>Calificacion cualitativa</th>
		   				<th>Descripcion</th>
		   			</tr>
		   		</thead>
		   		<tbody>
				   <tr>
	   					<td>1</td>
	   					<td>{{ $forminfluencia->calcualitativa5 }}</td>
	   					<td>{{ $forminfluencia->descripcion5 }}</td>
	   				</tr>
	   				<tr>
	   					<td>2</td>
	   					<td>{{ $forminfluencia->calcualitativa4 }}</td>
	   					<td>{{ $forminfluencia->descripcion4 }}</td>
	   				</tr>
	   				<tr>
	   					<td>3</td>
	   					<td>{{ $forminfluencia->calcualitativa3 }}</td>
	   					<td>{{ $forminfluencia->descripcion3 }}</td>
	   				</tr>
	   				<tr>
	   					<td>4</td>
	   					<td>{{ $forminfluencia->calcualitativa2 }}</td>
	   					<td>{{ $forminfluencia->descripcion2 }}</td>
	   				</tr>
	   				<tr>
	   					<td>5</td>
	   					<td>{{ $forminfluencia->calcualitativa1 }}</td>
	   					<td>{{ $forminfluencia->descripcion1 }}</td>
	   				</tr>
		   		</tbody>
		  </table>
		</div>
	</div>
</div>

<hr>
{{  Form::open(['action' => 'partes_interesadas\PartesInteresadasController@form_partes','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
{!! Form::token() !!}
@include('pages.partes_interesadas.includes.form_parte_interesada')
{!!Form::close()!!}

<hr>
<div class="row">
	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
		  <div id="container" style="width: 100%;">
		      <canvas id="canvas"></canvas>
		  </div>
	</div>
	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
		<div class="table-responsive">
		  <table class="table table-hover">
		   		<thead style="background: #18A6B0; color: #FFFFFF;">
		   			<tr>
		   				<th>Partes Interesadas</th>
		   				<th>Impacto</th>
		   				<th>Influencia</th>
		   			</tr>
		   		</thead>
		   		<tbody>
		   			@foreach ($table_partes_interesadas as $element)
		   				<tr>
		   					<th>{{ $element->Partes_interesadas }}</th>
		   					<th>{{ $element->impacto }}</th>
		   					<th>{{ $element->influencia }}</th>
		   				</tr>
		   			@endforeach
		   		</tbody>
		  </table>
		 </div>
	</div>
</div>

<hr>
<div class="row">
	<p>IDENTIFICACION DE ESTRATEGIAS PARA SATISFACER REQUISITOS DE PARTES INTERESADAS</p>
	<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
	 	<table class="table table-hover">
	   		<thead style="background: #18A6B0; color: #FFFFFF;">
	   			<tr>
	   				<th>ID</th>
	   				<th>Partes Interesadas</th>
	   				<th>Necesidad</th>
	   				<th>Expectativa</th>
	   				<th>Estrategia Destacada</th>
	   				<th>Medicion del Desempeño</th>
	   				<th>Empresa</th>
	   			</tr>
	   		</thead>
	   		<tbody>
	   			<tr>
	   				@foreach ($table_partes_interesadas as $element)
	   					@if ($element->impacto >= 3 && $element->influencia >= 2 )
	   						<tr>
			   					<th>{{ $cont++ }}</th>
			   					<th>{{ $element->Partes_interesadas }}</th>
			   					<th>
			   						<center>
			   						<a class="btn btn-success" style="color: #FFFFFF"  data-toggle="modal" data-target="#necesidad{{ $element->id_partei_master }}" >+</a>
			   						</center>
			   					</th>
			   					<th>
			   						<center>
			   						<a class="btn btn-success" style="color: #FFFFFF" data-toggle="modal" data-target="#expectativa{{ $element->id_partei_master }}" >+</a>
			   						</center>
			   					</th>
			   					<th>
			   						<center>
			   						<a class="btn btn-success" style="color: #FFFFFF" data-toggle="modal" data-target="#estrategia{{ $element->id_partei_master }}" >+</a>
			   						</center>
			   					</th>
			   					<th>
			   						<center>
			   						<a class="btn btn-success" style="color: #FFFFFF" data-toggle="modal" data-target="#medicion{{ $element->id_partei_master }}" >+</a>
			   						</center>
			   					</th>
			   					<th>
			   						{{ $element->razon_social }}
			   					</th>
			   				</tr>

<!-- Modal -->
<div class="modal fade" id="necesidad{{ $element->id_partei_master }}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Necesidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="expectativa{{ $element->id_partei_master }}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Expectativa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="estrategia{{ $element->id_partei_master }}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Estrategia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="medicion{{ $element->id_partei_master }}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Medicion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


	   					@endif	   					
		   			@endforeach
	   			</tr>
	   		</tbody>
	  	</table>
	</div>

		</div>
	</div>
</div>


@endsection


@push('scripts')
<script src="{{ asset('backend/vendors/Chart.js/dist/Chart.bundle.js') }}"></script>
   <script>



        var DEFAULT_DATASET_SIZE = 7;

        var addedCount = 0;

        var randomScalingFactor = function() {
            return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
        };
        var randomColorFactor = function() {
            return Math.round(Math.random() * 255);
        };
        var randomColor = function() {
            return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',.7)';
        };

         var bubbleChartData = {
            animation: {
                duration: 10000
            },
            
             datasets: [{

              @foreach($table_partes_interesadas as$grafica)
                label: "{{ $grafica->Partes_interesadas }}",
                backgroundColor: randomColor(),
                data: [{
                   x: {{ $grafica->impacto }},
                   y: {{ $grafica->influencia }},
                   r: 10,
                }]
             },{
              @endforeach  
              
              label: "Punto de inicio",
                data: [{
                    x: 0,
                    y: 0,
                
                }] 
                },{
                    label: "Punto final",
                    data: [{
                    x: 8,
                    y: 8,
                }]         
            }]             
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myChart = new Chart(ctx, {
                type: 'bubble',
                data: bubbleChartData,
                options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:'DIAGRAMA PARTES INTERESADAS'
                    },
                }
            });
        };

        $('#randomizeData').click(function() {
            var zero = Math.random() < 0.2 ? true : false;
            $.each(bubbleChartData.datasets, function(i, dataset) {
                dataset.backgroundColor = randomColor();
                dataset.data = dataset.data.map(function() {
                    return {
                        x: randomScalingFactor(),
                        y: randomScalingFactor(),
                        r: Math.abs(randomScalingFactor()) / 5,
                    };
                });
            });
            window.myChart.update();
        });

        $('#addDataset').click(function() {
            ++addedCount;
            var newDataset = {
                label: "My added dataset " + addedCount,
                backgroundColor: randomColor(),
                data: []
            };

            for (var index = 0; index < DEFAULT_DATASET_SIZE; ++index) {
                newDataset.data.push({
                    x: randomScalingFactor(),
                    y: randomScalingFactor(),
                    r: Math.abs(randomScalingFactor()) / 5,
                });
            }

            bubbleChartData.datasets.push(newDataset);
            window.myChart.update();
        });

        $('#addData').click(function() {
            if (bubbleChartData.datasets.length > 0) {
                for (var index = 0; index < bubbleChartData.datasets.length; ++index) {
                    bubbleChartData.datasets[index].data.push({
                        x: randomScalingFactor(),
                        y: randomScalingFactor(),
                        r: Math.abs(randomScalingFactor()) / 5,
                    });
                }

                window.myChart.update();
            }
        });

        $('#removeDataset').click(function() {
            bubbleChartData.datasets.splice(0, 1);
            window.myChart.update();
        });

        $('#removeData').click(function() {

            bubbleChartData.datasets.forEach(function(dataset, datasetIndex) {
                dataset.data.pop();
            });

            window.myChart.update();
        });
    </script>
@endpush 