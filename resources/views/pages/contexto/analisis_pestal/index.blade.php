@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="">Contexto</a>
	  <span class="breadcrumb-item active">Análisis Pestal</span>
	</nav>
</div>
<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Administración de Análisis Pestal</h4>
  		<p class="mg-b-0">Contexto</p>
	</div>
</div>     
 
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
		</div><br>
	<p>
		Los tipos de estrategias que utilizará XXX, son el análisis PESTAL, matriz DOFA y el pensamiento basado en Riesgo, con el propósito de decidir cuáles son nuestras prioridades, que nos permitan gestionar estratégicamente la prestación de nuestros servicios tomando como referencia la información anteriormente mencionada, el grupo directivo aplicó la metodología PESTAL, analizando seis tipos de información, los cuales se enumeran a continuación:
	</p>
		<br>
	<p>
		<b>Factores Políticos</b>: Información del entorno político que afecte la situación actual o futura de la empresa. Por ejemplo, las diferentes políticas del gobierno, la política fiscal de los diferentes países, las modificaciones en los tratados comerciales.
	</p>
		<br>
	<p>
		<b>Factores Económicos</b>: Los ciclos económicos, las políticas económicas del gobierno, los tipos de interés, los factores macroeconómicos propios de cada país, los tipos de cambio o el nivel de inflación, han de ser tenidos en cuenta para la definición de los objetivos económicos de la empresa.
	</p>
		<br>
	<p>
		<b>Factores Socioculturales:</b> Aquellas variables sociales que pueden influir en la empresa. Cambios en los gustos o en las modas que repercutan en el nivel de consumo, cambios en el nivel de ingresos o cambios en el nivel poblacional.
	</p>
		<br>
	<p>
		<b>Factores Tecnológicos</b>: Un entorno que promulgue la innovación de las TIC, la inversión en I + D y la promoción del desarrollo tecnológico llevará a la empresa a integrar dichas variables dentro de su estrategia competitiva.
	</p>
		<br>
	<p>
		<b>Factores Ambientales o Ecológicos</b>: Leyes de protección medioambiental, regulación sobre el consumo de energía y el reciclaje de residuos, preocupación por el calentamiento global.
	</p>
		<br>
	<p>
		<b>Factores Legales</b>: Licencias, leyes sobre el empleo, derechos de propiedad intelectual, leyes de salud y seguridad laboral.
	</p>
		<br>
	<p>
		A través de esta metodología se logró identificar los factores externos e internos que y dar respuesta a cada uno de los componentes de la metodología PESTAL:
</p>

	@if (count($validacion) == 0)

		{{  Form::open(['action' => 'Contexto\AnalisisPestalController@create','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
		{!! Form::token() !!}
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
					<label for="datos"><b>1. POLÍTICOS</b><br>
					¿Qué factores políticos pueden generar Riesgos y/o Oportunidades adicionales para la implementación o mejora del Sistema de Gestión de Calidad?</label><br>
					<textarea name="politicos" class="form-control" rows="5"></textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
					<label for="datos"><b>2. ECONÓMICOS</b><br>
					¿Qué factores económicos pueden generar Riesgos y/o Oportunidades adicionales para la implementación o mejora del Sistema de Gestión de Calidad?</label><br>
					<textarea name="economicos" class="form-control" rows="5" ></textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
					<label for="datos"><b>3. SOCIALES</b><br>
					¿Qué factores sociales pueden generar Riesgos y/o Oportunidades adicionales para la implementación o mejora del Sistema de Gestión de Calidad?</label><br>
					<textarea name="sociales" class="form-control" rows="5" ></textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
					<label for="datos"><b>4. TECNOLÓGICOS</b><br>
					¿Qué factores tecnológicos pueden generar Riesgos y/o Oportunidades adicionales para la implementación o mejora del Sistema de Gestión de Calidad?</label><br>
					<textarea name="tecnologicos" class="form-control" rows="5" ></textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
					<label for="datos"><b>5. AMBIENTALES</b><br>
					¿Qué factores ambientales pueden generar Riesgos y/o Oportunidades adicionales para la implementación o mejora del Sistema de Gestión de Calidad?</label><br>
					<textarea name="ambientales" class="form-control" rows="5" ></textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
					<label for="datos"><b>6. LEGALES</b><br>
	¿Qué factores legales pueden generar Riesgos y/o Oportunidades adicionales para la implementación o mejora del Sistema de Gestión de Calidad?</label><br>
					<textarea name="legales" class="form-control" rows="5" ></textarea>
				</div>
			</div>
		</div>

			<button type="submit" class="btn btn-primary">Guardar</button>		
			<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
				
		{!!Form::close()!!}
	@else
	
		{{  Form::open(['action' => ['Contexto\AnalisisPestalController@update',$pestal->id_analisis_pestal],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
		{!! Form::token() !!}
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
					<label for="datos"><b>1. POLÍTICOS</b><br>
					¿Qué factores políticos pueden generar Riesgos y/o Oportunidades adicionales para la implementación o mejora del Sistema de Gestión de Calidad?</label><br>
					<textarea name="politicos" class="form-control" rows="5">{{ $pestal->politicos }}</textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
					<label for="datos"><b>2. ECONÓMICOS</b><br>
					¿Qué factores económicos pueden generar Riesgos y/o Oportunidades adicionales para la implementación o mejora del Sistema de Gestión de Calidad?</label><br>
					<textarea name="economicos" class="form-control" rows="5" >{{ $pestal->economicos }}</textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
					<label for="datos"><b>3. SOCIALES</b><br>
					¿Qué factores sociales pueden generar Riesgos y/o Oportunidades adicionales para la implementación o mejora del Sistema de Gestión de Calidad?</label><br>
					<textarea name="sociales" class="form-control" rows="5" >{{ $pestal->sociales }}</textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
					<label for="datos"><b>4. TECNOLÓGICOS</b><br>
					¿Qué factores tecnológicos pueden generar Riesgos y/o Oportunidades adicionales para la implementación o mejora del Sistema de Gestión de Calidad?</label><br>
					<textarea name="tecnologicos" class="form-control" rows="5" >{{ $pestal->tecnologicos }}</textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
					<label for="datos"><b>5. AMBIENTALES</b><br>
					¿Qué factores ambientales pueden generar Riesgos y/o Oportunidades adicionales para la implementación o mejora del Sistema de Gestión de Calidad?</label><br>
					<textarea name="ambientales" class="form-control" rows="5" >{{ $pestal->ambientales }}</textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="form-group">
					<label for="datos"><b>6. LEGALES</b><br>
					¿Qué factores legales pueden generar Riesgos y/o Oportunidades adicionales para la implementación o mejora del Sistema de Gestión de Calidad?</label><br>
					<textarea name="legales" class="form-control" rows="5" >{{ $pestal->legales }}</textarea>
				</div>
			</div>
		</div>

			<button type="submit" class="btn btn-warning">Editar</button>			
			<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
				
		{!!Form::close()!!}
	@endif
@endsection