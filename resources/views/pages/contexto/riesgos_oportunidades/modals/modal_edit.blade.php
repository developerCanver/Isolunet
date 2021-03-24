<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal-{{ $e->id_riesgos_oportunidades }}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
	    
	    <div class="modal-header">
	    	{{ $e->razon_social }}
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	     </div>
{{  Form::open(['action' => ['Contexto\RiesgoOportunidadesController@update',$e->id_riesgos_oportunidades],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
	    <div class="modal-body">
	    	

	{!! Form::token() !!}
		<div class="form-group">
		    	<label for="datos">Descripción del riesgo u oportunidad</label><br>
		    	<input type="text" name="riesgo"  class="form-control" value="{{ $e->riesgo_oportunidad }}">
		</div>
		<div class="form-group">
		    	<label for="datos">Clasificación</label><br>
		    	<input type="text" name="clasificacion"  class="form-control" value="{{ $e->clasificacion }}">
		</div>
	




	    </div>
	    <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-warning">Editar</button>
	    </div>
	  {!!Form::close()!!}
    </div>
  </div>
</div>
