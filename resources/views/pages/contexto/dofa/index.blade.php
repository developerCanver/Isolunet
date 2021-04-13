@extends('layouts.dashboard')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
		<a class="nav-item nav-link" href="{{ URL::to('/contexto_dofa') }}"><h5><span class="badge badge-info">Análisis DOFA</span></h5></a>
        <a class="nav-item nav-link" href="{{ URL::to('/estrategias') }}">Estrategias</a>
        <a class="nav-item nav-link" href="{{ URL::to('/matriz_dofa') }}">Matriz DOFA</a>
 
      </div>
    </div>
  </nav>

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="">Contexto</a>

		<a class="breadcrumb-item" href=""><span class="badge badge-dark">Análisis </span></a>
    </nav>
</div>
<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Análisis DOFA </h4>
        <p class="mg-b-0">Contexto</p>
    </div>
</div>


<div class="br-pagebody">
    <div class="br-section-wrapper">

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

        <p>Con base en la identificación de las anteriores cuestiones externas e internas que puede afectar el sistema
            de gestión de calidad de XXX, se elaboró la matriz DOFA, la cual después de analizarla nos permitió
            identificar los riesgos y oportunidades estratégicas para el sistema de gestión de calidad:</p>
        <br>
        @include('partials.message_flash')
        {{  Form::open(['action' => 'Contexto\DofaController@store','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <input type="hidden" name="tipo_factor" value="interno">
        <center>
            <h5 style="color: rgb(46, 46, 46);" class="p-2">ANÁLISIS INTERNO</h5>
        </center>

        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Seleccionar Proceso</strong></label>
                    <select name="proceso" class="form-control select2" required>
                        <option selected disabled value="">Seleccione Proceso...</option>
                        @foreach ($procesos as $proceso)
                        <option value="{{ $proceso->nom_proceso }}">{{ $proceso->nom_proceso }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Debilidades:</strong></label>
                    <textarea name="debilidades" id="debilidades" class="form-control" cols="30" rows="2"></textarea>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Fortalezas</strong></label>
                    <textarea name="fortalezas" id="fortalezas" class="form-control" cols="30" rows="2"></textarea>
                </div>
            </div>

        </div>
        <button type="submit" id="bt_add" class="btn btn-primary">Agregar</button>


        {!!Form::close()!!}
        <hr>
        <h5>Lista Análisis Interno</h5>
        <div class="table-responsive">

            <table class="table table-bordered">

                <tbody>
                    <tr>
                        <td style="color:#C10000">Empresa</td>
                        <td style="color: #00B050"><b>Proceso</b></td>
                        <td style="color: #00B050"><b>Debilidades</b></td>
                        <td style="color: #00B050"><b>Fortalezas</b></td>
                        <td style="color: #FF0024"><b>Opciones</b></td>
                    </tr>
                    @foreach ($dofa as $e)
                    @if ( $e->tipo_factor == "interno" )


                    <tr>
                        <td>{{ $e->razon_social }}</td>
                        <td>{{ $e->proceso }}</td>
                        <td>{{ $e->debilidades }}</td>
                        <td>{{ $e->fortalezas }}</td>
                        <td>
                            <a data-toggle="modal" data-target="#myModal-{{ $e->id_dofa }}" style="color: #00BE31"
                                title="Editar"><i class="fas fa-pencil-alt fa-2x"></i></a>
                            <a data-toggle="modal" data-target="#myModal-delete-{{ $e->id_dofa }}"
                                style="color: #F7072F" title="Eliminar"><i class="fas fa-trash-alt fa-2x"></i></a>
                        </td>
                    </tr>

					{{-- editar analisis interno --}}	

                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" id="myModal-{{ $e->id_dofa }}">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
									<center>
										<h5 style="color: rgb(46, 46, 46);" class="p-2">Editar Análisis Interno</h5>
									</center> 
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>
                                {{  Form::open(['action' => ['Contexto\DofaController@update',$e->id_dofa],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
                                <div class="modal-body">


                                    {!! Form::token() !!}

                                    <div class="form-group">
                                        <label><strong>Seleccionar Proceso</strong></label>
                                        <select name="proceso" class="form-control " required>
                                            <option selected disabled value="">Seleccione Proceso...</option>
                                            @foreach ($procesos as $proceso)
                                            <option value="{{ $proceso->nom_proceso }}"
                                                {{ $proceso->nom_proceso ==  $e->proceso ? 'selected' : ''}}>
                                                {{ $proceso->nom_proceso }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                             
                                <div class="form-group">
                                    <label><strong>Debilidades</strong></label>
                                    <input type="text" name="debilidades" class="form-control"
                                        value="{{ $e->debilidades }}">
                                </div>
                                <div class="form-group">
                                    <label><strong>Fortalezas</strong></label>
                                    <input type="text" name="fortalezas" class="form-control"
                                        value="{{ $e->fortalezas }}">
                                </div>



                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </div>
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
					{{-- fin momdal --}}


                    @include('pages.contexto.dofa.modals.modal_delete')
                    @endif
                    @endforeach


                </tbody>

            </table>

        </div>

        <br>
        <hr>
        @include('partials.message_flash')
        {{  Form::open(['action' => 'Contexto\DofaController@store','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        <input type="hidden" name="tipo_factor" value="externo">

        <strong class="p-2">
            <center>
                <h5 style="color: rgb(46, 46, 46);">ANÁLISIS EXTERNO</h5>
            </center>

        </strong>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Tipo PESTAL</strong></label>
                    <select name="pestal" required class="form-control select2">
                        <option selected disabled value="">Seleccionar...</option>
                        <option value="Políticas">Políticas</option>
                        <option value="Económicas">Económicas</option>
                        <option value="Sociales">Sociales</option>
                        <option value="Tecnológicas">Tecnológicas</option>
                        <option value="Ambientales">Ambientales</option>
                        <option value="Legales">Legales</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Amenazas</strong></label>
                    <textarea name="amenazas" id="amenazas" class="form-control" cols="30" rows="2"></textarea>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Oportunidades:</strong></label>
                    <textarea name="oportunidades" id="oportunidades" class="form-control" cols="30"
                        rows="2"></textarea>
                </div>
            </div>


        </div>
        <button type="submit" id="bt_add" class="btn btn-primary">Agregar</button>

        {!!Form::close()!!}
        <br>
        <br>
        <h5>Lista Análisis Externo</h5>

        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td style="color:#C10000">Empresa</td>
                        <td style="color: #00B050"><b>Pestal</b></td>
                        <td style="color: #00B050"><b>Amenazas</b></td>
                        <td style="color: #00B050"><b>Opurtunidades</b></td>
                        <td style="color: #FF0024"><b>Opciones</b></td>
                    </tr>
                    @foreach ($dofa as $e)
                    @if ( $e->tipo_factor == "externo" )

                    <tr>
                        <td>{{ $e->razon_social }}</td>
                        <td>{{ $e->pestal }}</td>
                        <td>{{ $e->amenazas }}</td>
                        <td>{{ $e->oportunidades }}</td>
                        <td>
                            <a data-toggle="modal" data-target="#myModal-{{ $e->id_dofa }}" style="color: #00BE31"
                                title="Editar"><i class="fas fa-pencil-alt fa-2x"></i></a>
                            <a data-toggle="modal" data-target="#myModal-delete-{{ $e->id_dofa }}"
                                style="color: #F7072F" title="Eliminar"><i class="fas fa-trash-alt fa-2x"></i></a>
                        </td>
                    </tr>



              		{{-- editar analisis externo --}}	

					  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
					  aria-labelledby="myLargeModalLabel" id="myModal-{{ $e->id_dofa }}">
					  <div class="modal-dialog modal-lg" role="document">
						  <div class="modal-content">

							  <div class="modal-header">
								  <center>
									  <h5 style="color: rgb(46, 46, 46);" class="p-2">Editar Análisis Externo</h5>
								  </center> 
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
										  aria-hidden="true">&times;</span></button>
							  </div>
							  {{  Form::open(['action' => ['Contexto\DofaController@update',$e->id_dofa],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
							  <div class="modal-body">


								  {!! Form::token() !!}

								  <div class="form-group">
									<label><strong>Tipo PESTAL</strong></label>
									<select name="pestal" required class="form-control">
										<option selected disabled value="">Seleccionar...</option>
										<option value="Políticas" {{$e->pestal == "Políticas" ? 'selected' : '' }}>Políticas</option>
										<option value="Económicas" {{$e->pestal == "Económicas" ? 'selected' : '' }}>Económicas</option>
										<option value="Sociales" {{$e->pestal == "Sociales" ? 'selected' : '' }}>Sociales</option>
										<option value="Tecnológicas" {{$e->pestal == "Tecnológicas" ? 'selected' : '' }}>Tecnológicas</option>
										<option value="Ambientales" {{$e->pestal == "Ambientales" ? 'selected' : '' }}>Ambientales</option>
										<option value="Legales" {{$e->pestal == "Legales" ? 'selected' : '' }}>Legales</option>
									</select>
								  </div>
						   
							  <div class="form-group">
								  <label><strong>Amenazas</strong></label>
								  <input type="text" name="amenazas" class="form-control"
									  value="{{ $e->amenazas }}">
							  </div>
							  <div class="form-group">
								  <label><strong>Oportunidades</strong></label>
								  <input type="text" name="oportunidades" class="form-control"
									  value="{{ $e->oportunidades }}">
							  </div>



							  <div class="modal-footer">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								  <button type="submit" class="btn btn-primary">Editar</button>
							  </div>
							  {!!Form::close()!!}
						  </div>
					  </div>
				  </div>
				  {{-- fin momdal --}}

                    @include('pages.contexto.dofa.modals.modal_delete')
                    @endif
                    @endforeach


                </tbody>

            </table>

        </div>


    </div>
</div>


@endsection


@push('scripts')

<script type="text/javascript">
    // In your Javascript (external .js resource or <script> tag)


    $('.input-number').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

</script>
@endpush
