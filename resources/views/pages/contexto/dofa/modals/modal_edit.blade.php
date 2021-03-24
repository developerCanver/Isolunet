<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal-{{ $e->id_dofa }}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
	    
	    <div class="modal-header">
	    	{{ $e->razon_social }}
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	     </div>
{{  Form::open(['action' => ['Contexto\DofaController@update',$e->id_dofa],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
	    <div class="modal-body">
	    	

	{!! Form::token() !!}
		<div class="form-group">
		    	<label for="datos">Debilidades</label><br>
		    	<input type="text" name="debilidades"  class="form-control" value="{{ $e->debilidades }}">
		</div>
		<div class="form-group">
		    	<label for="datos">Fortalezas</label><br>
		    	<input type="text" name="fortalezas"  class="form-control" value="{{ $e->fortalezas }}">
		</div>
		<div class="form-group">
		    	<label for="datos">Amenazas</label><br>
		    	<input type="text" name="amenazas"  class="form-control" value="{{ $e->amenazas }}">
		</div>
		<div class="form-group">
		    	<label for="datos">oportunidades</label><br>
		    	<input type="text" name="oportunidades"  class="form-control" value="{{ $e->oportunidades }}">
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
