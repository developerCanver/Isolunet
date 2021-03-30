@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Apoyo</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Información</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Presupuesto</h4>
    </div>
</div><!-- d-flex -->
<div class="container-fluid h-100">
    <div class="row w-100 align-items-center">
        <div class="col text-center">

        </div>
    </div>


</div>
<div class="br-pagebody">

    <form>

        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <h4>Seleccione Tipo de Información</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">

                    @if (empty($tipo_informacion))
                    <select name="tipo_informacion" class="form-control select2" required>
                        <option value="" selected="true" disabled="disabled"> Seleccione Tipo Información..</option>
                        <option value="Documentos">Documentos</option>
                        <option value="Documentos_externos">Documentos Externos</option>
                        <option value="Registros">Registros</option>
                    </select>

                    @else
                    <select name="tipo_informacion" class="form-control select2" required>
                        <option value="" selected="true" disabled="disabled"> Seleccione Tipo Información..</option>
                        <option value="Documentos" @if($tipo_informacion=='Documentos' ) selected @endif> Documentos
                        </option>
                        <option value="Documentos_externos" @if($tipo_informacion=='Documentos_externos' ) selected
                            @endif>Documentos Externos</option>
                        <option value="Registros" @if($tipo_informacion=='Registros' ) selected @endif>Registros
                        </option>
                    </select>

                    @endif

                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">

                <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Buscar </button>

                {{-- <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
                --}}


            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
            </div>

        </div>

    </form>

  

</div>
    @endsection
