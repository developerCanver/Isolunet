
<div class="row">
	<div class="col-3">

		@if ($form == 'create')
			{{  Form::open(['url' => 'store_usuarios','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
			<h5>Registro de Usuario</h5>
			
		@else
			{{  Form::open(['url' => ['update_usuarios',$user->id],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
			<h5>Editar de Usuario</h5>
			<p>Deja el campo de Contraseña en blanco si no deseas actualizarla</p>
			
		@endif
		{!! Form::token() !!}
			@include('administracion_usuarios.usuarios.form')
			<button type="submit" class="btn btn-primary"><i class="fas fa-file-export"></i> Enviar</button>
		 {!!Form::close()!!}
	</div>
	<div class="col-9">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Correo Electronico</th>
						<th>Rol</th>
						<th colspan="2">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
					   <tr>
					   	    <td>{{ $user->id }}</td>
					   	    <td>{{ $user->name }}</td>
					   	    <td>{{ $user->email }}</td>
					   	    <td>{{ $user->roles->implode('name',', ') }}</td>
					   	    <td>
					   	   	    <a href="{{ URL::action( [App\Http\Controllers\Usuarios\UsuariosController::class, 'edit'], ['id' => $user->id]) }}" class="btn btn-warning">
					   	   	    	<i class="fas fa-user-edit"></i> Editar
					   	   	    </a>
					   	   	     <a href="{{ URL::action( [App\Http\Controllers\Usuarios\UsuariosController::class, 'destroy'], ['id' => $user->id]) }}" class="btn btn-danger">
					   	   	    	<i class="fas fa-user-times"></i> Eliminar
					   	   	    </a>
					   	    </td>
					   </tr>
					@endforeach
				</tbody>
			</table>
		</div>
		{{ $users->links() }}
	</div>		
</div>