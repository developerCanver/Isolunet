@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Liderazgo</a>
        <a class="breadcrumb-item" href="{{ URL::to('/parm_presupuesto') }}">Presupuesto</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Editar Egreso</span></a>
    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Presupuesto</h4>
    </div>
</div><!-- d-flex -->

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
  @include('partials.message_flash')
  {{  Form::open(['action' => ['Planificacion\RiesgosOportunoController@update',$riesgos->id_riesgo],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
  {!! Form::token() !!}
  
  
  <div class="row">
    <h4>Editar Causa </h4>
</div><br>

<input type="hidden" class="form-control" name="fk_proceso" value="{{$id_proceso}}">
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <div class="form-group">
                <div class="form-group">
                    <label><strong>Causa:</strong></label>
                    <textarea name="nom_causa" rows="2" cols="80" required="true" >{{$riesgos->nom_causa}}</textarea>
                </div>
            </div>

        </div>
    </div>
</div>
      
              <button type="submit" class="btn btn-primary">Editar</button>
              
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
    {!!Form::close()!!}
  <br><br>
  
    </div>
  </div>
  @endsection
  
  
  @push('scripts')
  <script type="text/javascript">
      // In your Javascript (external .js resource or <script> tag)
  
  $('.input-number').on('input', function () { 
      this.value = this.value.replace(/[^0-9]/g,'');
  });
  
  </script>
  @endpush 