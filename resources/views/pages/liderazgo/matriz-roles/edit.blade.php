@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Liderazgo</a>
        <a class="breadcrumb-item" href="{{ URL::to('/roles_responsabilidades') }}">Rol y Responsabilidad</a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Editar Rol</h4>
    </div>
</div><!-- d-flex -->

<div class="br-pagebody">

    <div class="br-section-wrapper">
   

        {{  Form::open(['action' => ['Liderazgo\MatrizRolesController@update',$rol->id_rol_res],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
{!! Form::token() !!}

        <h4>Rol  </h4>
        
    

        <div class="row">

            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            
                            <textarea name="nom_rol_res" rows="2" cols="100" required >{{$rol->nom_rol_res}}</textarea>
                           
                        </div>
                    </div>

                </div>
            </div>


        </div>
    
        <button type="submit" class="btn btn-primary">Editar</button>
			
        <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
{!!Form::close()!!}
  
    </div>
</div>
</div>

</div>


@endsection
