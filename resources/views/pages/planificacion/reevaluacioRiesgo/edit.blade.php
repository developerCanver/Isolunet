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

  {{-- <form autocomplete="off"
  action="{{ route('riesgo_oportuno.update', $riesgos->id_riesgo_opurtuno) }}" method="post"
  enctype="multipart/form-data">
  @csrf
  @method('PUT') --}}
  
  <div class="row">
    <h4>Editar Causa </h4>
</div><br>

<input type="hidden" class="form-control" name="fk_proceso" value="{{$id_proceso}}">
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
        <div class="form-group">
            <label for="datos">Efectos negativos:</label>
            <input type="text" class="form-control"  name="nom_negativo" aria-describedby=""
                value="{{$riesgos->nom_negativo}}" >
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
        <div class="form-group">
            <label for="datos">Efectos positivos:</label>
            <input type="text" class="form-control"  name="nom_insumo" aria-describedby=""
                value="{{$riesgos->nom_posivito}}" >
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
        <div class="form-group">
            <label for="datos">Riesgo negativo: </label>
            <input type="text" class="form-control"  name="nom_riesgo" aria-describedby=""
                value="{{$riesgos->nom_riesgo}}" >
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
       
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
    </div>

</div>
      
              <button type="submit" class="btn btn-primary">Editar</button>
              
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
        </form>
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