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
                            <td><h1>1</h1></td>
                            <td>
                            <textarea name="cualitativa5" rows="3" class="form-control">@isset ($forminfluencia->calcualitativa5){{ $forminfluencia->calcualitativa5 }}@endisset</textarea>
                            </td>
                            <td><textarea name="descripcion5" rows="3" class="form-control">@isset ($forminfluencia->descripcion5){{  $forminfluencia->descripcion5 }}@endisset</textarea></td>
                     </tr>
                     <tr>
                            <td><h1>2</h1></td>
                            <td><textarea name="cualitativa4" rows="3" class="form-control">@isset ($forminfluencia->calcualitativa4 ){{ $forminfluencia->calcualitativa4 }}@endisset</textarea></td>
                            <td><textarea name="descripcion4" rows="3" class="form-control">@isset ($forminfluencia->descripcion4){{ $forminfluencia->descripcion4 }}@endisset</textarea></td>
                     </tr>
                     <tr>
                            <td><h1>3</h1></td>
                            <td><textarea name="cualitativa3" rows="3" class="form-control">@isset ($forminfluencia->calcualitativa3){{ $forminfluencia->calcualitativa3 }}@endisset</textarea></td>
                            <td><textarea name="descripcion3" rows="3" class="form-control">@isset ($forminfluencia->descripcion3){{ $forminfluencia->descripcion3 }}@endisset</textarea></td>
                     </tr>
                     <tr>
                            <td><h1>4</h1></td>
                            <td><textarea name="cualitativa2" rows="3" class="form-control">@isset ($forminfluencia->calcualitativa2){{ $forminfluencia->calcualitativa2 }}@endisset</textarea></td>
                            <td><textarea name="descripcion2" rows="3" class="form-control">@isset ($forminfluencia->descripcion2){{ $forminfluencia->descripcion2 }}@endisset</textarea></td>
                     </tr>
                     <tr>
                            <td><h1>5</h1></td>
                            <td><textarea name="cualitativa1" rows="3" class="form-control">@isset ($forminfluencia->calcualitativa1){{ $forminfluencia->calcualitativa1 }}@endisset</textarea></td>
                            <td><textarea name="descripcion1" rows="3" class="form-control">@isset ($forminfluencia->descripcion1){{ $forminfluencia->descripcion1 }}@endisset</textarea></td>
                     </tr>
       	</tbody>
       </table>