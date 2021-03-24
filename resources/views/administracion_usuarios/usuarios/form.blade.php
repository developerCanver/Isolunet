
<div class="form-group">
	<label>Nombre Usuario</label>
	<input type="text" class="form-control" name="name" value="{{ old('name', $user->name ) }}" placeholder="Nombre de Usuario">
	@error('name') <span> <b style="color: #DC0000;"> {{ $message }}</b></span> @enderror
</div>

<div class="form-group">
	<label>Correo Electronico</label>
	<input type="email" class="form-control" name="email" value="{{ old('email', $user->email ) }}" placeholder="Correo Electronico">
	@error('email') <span> <b style="color: #DC0000;"> {{ $message }}</b></span> @enderror
</div>

<div class="form-group">
	<label>Cotraseña</label>
	<input type="password" class="form-control" name="password" value="{{ old('password' ) }}" placeholder="Contraseña">
	@error('password') <span> <b style="color: #DC0000;">  {{ $message }}</b></span> @enderror
</div>

<div class="form-group">
	<label>Rol</label>
	<select  class="form-control" name="rol">
		<option value="">Seleccionar</option>
		@foreach ($roles as $key  =>  $rol)
			<option {{ $user->hasRole($rol) ? 'selected="selected"' : "" }} value="{{ $key }}">{{ $rol }}</option>
		@endforeach
	</select>
	@error('password') <span> <b style="color: #DC0000;">  {{ $message }}</b></span> @enderror
</div>