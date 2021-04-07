@extends('layouts.dashboard')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="{{ URL::to('/auditoria') }}">Auditorían Interna</a>
        <a class="nav-item nav-link" href="{{ URL::to('/chequeo_auditoria') }}"><h5><span class="badge badge-info">Chequeo</span></h5></a>
        <a class="nav-item nav-link" href="#">Fortalezas y Oportunidades</a>
        <a class="nav-item nav-link" href="#">Hallazgos</a>
      </div>
    </div>
  </nav>

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Evaluación de desempeño</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Auditorían </span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Evaluación de desempeño</h4>
        <p class="mg-b-0">Lista Chequeo</p>
    </div>
</div><!-- d-flex -->

<script type="text/javascript">
    var i = 1;

    function nuevos() {

        i++;
        $('#dynamic_field').append(
            '<div class="card" style="padding: 10px 10px;"  id="row' + i +
            '"><h6 style="color: rgb(82, 82, 82)">Auditoría ' +
            i + '</h6><div class="row">' +
            '<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">' +
            '<div class="form-group">' +
            '<label><strong>Fecha:</strong></label>' +
            '<input type="date" name="fecha_multiple[]" required class="form-control">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">' +
            '<div class="form-group">' +
            '<label><strong>Hora de inicio:</strong></label>' +
            '<input type="text" name="hora_inicio[]" class="form-control">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">' +
            '<div class="form-group">' +
            '<label><strong>Hora de finalización:</strong></label>' +
            '<input type="text" name="hora_fin[]" class="form-control">' +
            '</div>' +
            '</div>' +
            '<div class="form-group">' +
            '<input type="button" name="remove" id="' +
            i +
            '" class="btn btn-danger btn_remove btn-sm" value="Eliminar" onclick="eliminar(this.id);"> ' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">' +
            '<div class="form-group">' +
            '<label><strong>Requisitos para Auditar:</strong></label>' +
            '<input type="text" name="requisitos[]" class="form-control">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">' +
            '<div class="form-group">' +
            '<label><strong>Equipo Auditor:</strong></label>' +
            '<input type="text" name="equipo[]" class="form-control">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">' +
            '<div class="form-group">' +
            '<label><strong>Info de personas que serán entrevistadas:</strong></label>' +
            '<input type="text" name="info_personas[]" class="form-control">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
    };


    function eliminar(clicked_id) {
        var button_id = clicked_id;
        $("#row" + button_id + "").remove();
    };

</script>
<script src="js/jquery-1.11.1.min.js"></script>

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @include('partials.message_flash')



        <form action="{{route('chequeo_auditoria.store')}}" method="POST">
            @csrf

            <h4>{{$empresa->razon_social}} </h4>
            <br><br>

            <input type="hidden" name="fk_empresa" class="form-control" required value="{{$empresa->id_empresa}}">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <div class="form-group">
                        <label for="datos"><strong>Proceso a Auditar:</strong></label>
                        <select name="fk_proceso" class="form-control select2" required>
                            <option selected disabled value="">Seleccione Proceso...</option>
                            @foreach ($procesos as $proceso)
                            <option value="{{ $proceso->id_proceso }}">{{ $proceso->nom_proceso }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                    <div class="form-group">
                        <label><strong>Equipo Auditor:</strong></label>
                        <input type="text"  required name="equi_auditor" class="form-control">

                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label for="datos"><strong>Fecha:</strong></label>
                        <input type="date" required name="fecha_chequeo" class="form-control">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label for="datos"><strong>Aspectos a tener en cuenta durante la auditoría interna:</strong></label>
                        <textarea name="aspectos" rows="2" cols="140" required="true"></textarea>
                    </div>
                </div>
            </div>



            @foreach ($gestiones as $gestione)
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="datos"><strong>{{$gestione->str_nombre}}:</strong></label>
                        <input type="hidden"  name="fk_sisgestion[]" value="  {{$gestione->id_sisgestion}}">
                      
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <select name="seleccion_chequeo[]" required class="form-control select2" >
                            <option selected disabled value="">Seleccionar...</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            @endforeach
          
                
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                    <div class="form-group">
                        <label for="datos"><strong>Cumple:</strong></label>
                        <select name="cumple" class="form-control select2" required>
                            <option selected disabled value="">Seleccionar</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-10 col-sm-10 col-xs-12 col-lg-10">
                    <div class="form-group">
                        <label for="datos"><strong>Observaciones:</strong></label>
                        <textarea name="obervaciones_chequeo" rows="2" cols="110" required="true"></textarea>
                    </div>
                </div>
            </div>
         

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>
        <br>
    </div>
   <div class="row">
        <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
            <div class="table-responsive">
                @if ($chequeos->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Proceso a Auditar</th>
                            <th>Equipo Auditor</th>
                            <th>Fecha</th>
                            <th>auditoría interna</th>
                            <th>Cumple</th>
                            <th>Observaciones</th>

                            <th colspan="2">Opciones</th>
                        </tr>
                    </thead>

                    <tbody>


                        @foreach ($chequeos as $chequeo)

                        <tr>
                            <td>{{$chequeo->nom_proceso}}</td>
                            <td>{{$chequeo->equi_auditor}}</td>
                            <td>{{$chequeo->fecha_chequeo}}</td>
                            <td>{{$chequeo->aspectos}}</td>
                            <td>{{$chequeo->cumple}}</td>
                            <td>{{$chequeo->obervaciones_chequeo}}</td>
                            <td>
                                <div class="form-row align-items-center">
                               
                                    <a
                                        href="{{ URL::action('Evaluacion\ChequeoController@edit',$chequeo->id_chequeo) }}"><i
                                            class=" form-inline fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>

                                    <form action="{{route('chequeo_auditoria.destroy', $chequeo->id_chequeo)}}"
                                        class="form-inline formulario-eliminar" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button class=" btn btn-light btn-sm">
                                            <i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i>
                                        </button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                   
                          
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="datos"><strong>Proceso a Auditar:</strong></label>
                                                <select name="fk_proceso" class="form-control " required>
                                                    <option selected disabled value="">Seleccione Proceso...</option>
                                                    @foreach ($procesos as $proceso)
                                                    <option value="{{ $proceso->id_proceso }}" {{ $proceso->id_proceso == $chequeo->fk_proceso ? 'selected' : '' }}>{{ $proceso->nom_proceso }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                                            <div class="form-group">
                                                <label><strong>Equipo Auditor:</strong></label>
                                                <input type="text"  required name="equi_auditor"   value="{{$chequeo->equi_auditor}}" class="form-control">
                        
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                                            <div class="form-group">
                                                <label for="datos"><strong>Fecha:</strong></label>
                                                <input type="date" required name="fecha_chequeo" class="form-control" value="{{$chequeo->fecha_chequeo}}">
                                            </div>
                                        </div>
                                    </div>
                        
                        
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="datos"><strong>Aspectos a tener en cuenta durante la auditoría interna:</strong></label>
                                                <textarea name="aspectos" rows="2" cols="100" required="true">{{$chequeo->aspectos}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                        
                        
                        
                                    @foreach ($cheSisGestiones as $cheSisGestione)
                                    {{-- @if ($chequeo->id_chequeo == $cheSisGestione->fk_audchequeo) 
                                         --}}
                                   
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="datos"><strong>{{$cheSisGestione->str_nombre}}:</strong></label>
                                                <input type="hidden"  name="fk_sisgestion[]" value="  {{$cheSisGestione->id_sisgestion}}" >
                                              
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                            <div class="form-group">
                                                <select name="seleccion_chequeo[]" required class="form-control select2" >
                                                    <option selected disabled value="">Seleccionar...</option>
                                                    <option value="Si">Si</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @endif --}}
                                    @endforeach
                                  
                                        
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                                            <div class="form-group">
                                                <label for="datos"><strong>Cumple:</strong></label>
                                                <select name="cumple" class="form-control select2" required>
                                                    <option selected disabled value="">Seleccionar</option>
                                                    <option value="Si" @if($chequeo->cumple == 'Si') selected  @endif >Si</option>
                                                    <option value="No" @if($chequeo->cumple == 'No') selected  @endif >No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="datos"><strong>Observaciones:</strong></label>
                                                <textarea name="obervaciones_chequeo" rows="2" cols="100" required="true">{{$chequeo->obervaciones_chequeo}}</textarea>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                               
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach

                    </tbody>
                </table>
                {{ $chequeos->links() }}
                @else

                <br><br>
                <div class="container m-5">
                    <div class="alert alert-primary" role="alert">
                        <p class="text-center m-3"> Ups! no hay registros 😥
                        </p>
                    </div>
                </div>
                <br><br>
                @endif
            </div>
        </div>
    </div> 
</div>

</div>


@endsection
