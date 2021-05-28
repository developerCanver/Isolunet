@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Liderazgo</a>
        <a class="breadcrumb-item" href="{{ URL::to('/roles_responsabilidades') }}">Rol y Responsabilidad</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Editar Responsabilidad</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Editar Responsabilidades</h4>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">

    <div class="br-section-wrapper">
   

        {{  Form::open(['action' => ['Liderazgo\ResponsabilidadesController@update',$responsabilidad->id_responsabilidades],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

        
        
        <input type="hidden" class="form-control" name="id_responsabilidad" value="{{$id_responsabilidad}}">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <div class="form-group">
                    <label><strong>Rol de los cargos en los sistemas de gestión?
                        </strong></label>
                    <textarea name="nom_rol_res" class="form-control" required="true">{{$responsabilidad->nom_rol_res}}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">                
                    <label for="datos">Cargos que asume el Rol guardados:</label>
                    <select name="fk_cargo[]" class="form-control select2"  multiple>
                        @foreach ($usuarios_cargados as $element)
                        <option value="{{ $element->id_cargo }}" 
                            {{ $element->fk_roles_res == $responsabilidad->id_responsabilidades ? 'selected' : '' }}>
                            {{ $element->nom_cargo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label for="datos">Adicionar + Cargos que asume el Rol:</label>
                    <select name="fk_cargo[]" class="form-control select2"  multiple>
                        @foreach ($tabla_usuarios_cliente as $element)
                        <option value="{{ $element->id_cargo }}">{{ $element->nom_cargo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <label><strong>Responsabilidad:</strong></label>
                            <textarea name="nom_responsabilidades" class="form-control" required="true" >{{$responsabilidad->nom_responsabilidades}}</textarea>
                           
                        </div>
                    </div>
        
                </div>
            </div>
        
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <label><strong>¿Qué Cuentas Rinde?:</strong></label>
                        <textarea name="cuentas_rinde" class="form-control" >{{$responsabilidad->cuentas_rinde}}</textarea>
                       
        
                    </div>
                </div>
            </div>
           
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <div class="form-group">
                        <label><strong>Autoridad:</strong></label>
                        <textarea name="autoridad" class="form-control"  >{{$responsabilidad->autoridad}}</textarea>
                       
                    </div>
                </div>
            </div>
          
        
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <div class="form-group">
                        <label><strong>¿A Quién?:</strong></label>
                        <textarea name="a_quien" class="form-control"  >{{$responsabilidad->a_quien}}</textarea>
                      
                    </div>
                </div>
            </div>
          
    
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <div class="form-group">
                        <label><strong>¿Cada Cuánto?:</strong></label>
                       
                        <textarea name="cada_cuanto" class="form-control" >{{$responsabilidad->cada_cuanto}}</textarea>
                      
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
