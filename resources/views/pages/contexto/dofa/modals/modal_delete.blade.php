<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal-delete-{{ $e->id_dofa }}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
	    
	    <div class="modal-header">
	    	{{ $e->razon_social }}
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	     </div>
{{  Form::open(['action' => ['Contexto\DofaController@destroy',$e->id_dofa],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
	   <div class="form-group">
	    	por favor confirme si desea eliminar el registro
		</div>
	{!! Form::token() !!}
		

	 
	    <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-danger">Eliminar</button>
	    </div>
	  {!!Form::close()!!}
    </div>
  </div>
</div>
