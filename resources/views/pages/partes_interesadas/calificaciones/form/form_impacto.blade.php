<table class="table" style="border: 12px;">
	<thead>
		<tr>
			<th style="width: 5%;">Calificacion Cuantitativa</th>
			<th style="width: 45%;">Calificacion Cualitativa</th>
			<th style="width: 50%;">Descripcion</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><h1>5</h1></td>
			<td>
                     <textarea name="cualitativa5" rows="3" class="form-control">@isset ($formimpacto->calcualitativa5){{ $formimpacto->calcualitativa5 }}@endisset</textarea>
                     </td>
			<td><textarea name="descripcion5" rows="3" class="form-control">@isset ($formimpacto->descripcion5){{  $formimpacto->descripcion5 }}@endisset</textarea></td>
		</tr>
		<tr>
			<td><h1>4</h1></td>
			<td><textarea name="cualitativa4" rows="3" class="form-control">@isset ($formimpacto->calcualitativa4 ){{ $formimpacto->calcualitativa4 }}@endisset</textarea></td>
			<td><textarea name="descripcion4" rows="3" class="form-control">@isset ($formimpacto->descripcion4){{ $formimpacto->descripcion4 }}@endisset</textarea></td>
		</tr>
		<tr>
			<td><h1>3</h1></td>
			<td><textarea name="cualitativa3" rows="3" class="form-control">@isset ($formimpacto->calcualitativa3){{ $formimpacto->calcualitativa3 }}@endisset</textarea></td>
			<td><textarea name="descripcion3" rows="3" class="form-control">@isset ($formimpacto->descripcion3){{ $formimpacto->descripcion3 }}@endisset</textarea></td>
		</tr>
		<tr>
			<td><h1>2</h1></td>
			<td><textarea name="cualitativa2" rows="3" class="form-control">@isset ($formimpacto->calcualitativa2){{ $formimpacto->calcualitativa2 }}@endisset</textarea></td>
			<td><textarea name="descripcion2" rows="3" class="form-control">@isset ($formimpacto->descripcion2){{ $formimpacto->descripcion2 }}@endisset</textarea></td>
		</tr>
		<tr>
			<td><h1>1</h1></td>
			<td><textarea name="cualitativa1" rows="3" class="form-control">@isset ($formimpacto->calcualitativa1){{ $formimpacto->calcualitativa1 }}@endisset</textarea></td>
			<td><textarea name="descripcion1" rows="3" class="form-control">@isset ($formimpacto->descripcion1){{ $formimpacto->descripcion1 }}@endisset</textarea></td>
		</tr>
	</tbody>
</table>