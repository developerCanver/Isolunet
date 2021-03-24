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
  {{  Form::open(['action' => ['Liderazgo\EgresoController@update',$egreso->id_egreso],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
  {!! Form::token() !!}
  
  
  <div class="row">
    <h4>egresos - {{$empresa->razon_social}}</h4>
</div><br>

<input type="hidden" class="form-control" name="empresa" value="{{$empresa->id_empresa}}">
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <div class="form-group">
                <div class="form-group">
                    <label><strong>ITEM:</strong></label>
                    <input type="text" class="form-control" name="nom_egreso" value="{{$egreso->nom_egreso}}" required>
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <div class="form-group">
                <label><strong>2021 Proyecto:</strong></label>
                <input type="number" class="form-control" name="proyectado_egreso" value="{{$egreso->proyectado_egreso}}" required>

            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
        <div class="form-group">
            <div class="form-group">
                <label><strong>2021 Real:</strong></label>
                <input type="number" class="form-control" name="real_egreso"  value="{{$egreso->real_egreso}}" required>

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