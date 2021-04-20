@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Operación</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">planificación de cambio</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4> Editar Planificación de Cambio</h4>
        <p class="mg-b-0">Operación</p>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">

        <form action="{{ route('productos_servicios.update', $requisito->id_pla_control)}}" method="POST">
            @csrf
            @method('PUT')

            <h4>{{$empresa->razon_social}} </h4>

            <div class="row">
            </div><br><br>

            <input type="hidden" name="fk_empresa" class="form-control" required value="{{$empresa->id_empresa}}">
            <br>

            <h5 style="color: rgb(82, 82, 82)">1. Nombre o Identificación</h5>
            <div class="row">

                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>producto:</strong></label>
                        <select name="fk_producto" class="form-control select2" required>
                            <option value="" selected="true"=""> Seleccione Producto..</option>
                            @foreach ($Productos as $Producto)
                            <option value="{{ $Producto->id_producto }}"
                                {{ $Producto->id_producto == $requisito->fk_producto ? 'selected' : '' }}>
                                {{ $Producto->str_producto }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Norma Técniva Colombiana:</strong></label>
                        <input type="text" name="tecnica" class="form-control" value="{{$requisito->tecnica}}" required>
                    </div>
                </div>
            </div>
            <br>

            <h5 style="color: rgb(82, 82, 82)">2. Composición</h5>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Descripción del producto:</strong></label>
                        <textarea name="des_producto" rows="3" cols="60">{{$requisito->des_producto}}</textarea>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Composición:</strong></label>
                        <textarea name="composicion" rows="3" cols="60">{{$requisito->composicion}}</textarea>
                    </div>
                </div>
            </div>
            <br>
            {{-- ------------------3 CARACTERISTICAS QWUIMICAS--------------------- --}}

            <div class="row">
                <div class="col-md-12 col-md-offset-2">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 style="color: rgb(82, 82, 82)">3. Caracteristicas</h5>
                            {{-- <input type="button" name="nuevo" id="nuevo" class="btn btn-info btn-sm"
                            value="Añadir Nueva Química" onclick="nuevos();"> --}}
                        </div>
                    </div>
                </div>
            </div>

            @php
            $fis=0;
            $bio=0;
            $sen=0;
            @endphp
            @foreach ($tipos as $key => $tipo)

            @if ($tipo->tipo_cataa=="quimica")
            @if ($key ==0)
            <h5 style="color: rgb(82, 82, 82)">3.1 Químicas</h5>
            @endif
            <div class="card" style="padding: 10px 10px;" id="dynamic_field">
                <h5>Química {{$key+1}}</h5>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Química:</strong></label>
                            <input type="text" name="nombre_qui[]" class="form-control" required
                                value="{{$tipo->nombre}}">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Unidad:</strong></label>
                            <input type="text" name="unidad_qui[]" class="form-control" value="{{$tipo->unidad}}">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Mínimo:</strong></label>
                            <input type="text" name="minimo_qui[]" class="form-control" value="{{$tipo->minimo}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Máximo:</strong></label>
                            <input type="text" name="maximo_qui[]" class="form-control" value="{{$tipo->maximo}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Método de Ensayo:</strong></label>
                            <input type="text" name="metodo_qui[]" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if ($tipo->tipo_cataa=="fisica")
            @php
            $fis=$fis+1;
            @endphp
            <div class="card" style="padding: 10px 10px;" id="fisica">
                <h5>Física {{$fis}}</h5>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Física:</strong></label>
                            <input type="text" name="nombre_fis[]" class="form-control" required
                                value="{{$tipo->nombre}}">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Unidad:</strong></label>
                            <input type="text" name="unidad_fis[]" class="form-control" value="{{$tipo->unidad}}">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Mínimo:</strong></label>
                            <input type="text" name="minimo_fis[]" class="form-control" value="{{$tipo->minimo}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Máximo:</strong></label>
                            <input type="text" name="maximo_fis[]" class="form-control" value="{{$tipo->maximo}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Método de Ensayo:</strong></label>
                            <input type="text" name="metodo_fis[]" class="form-control" value="{{$tipo->metodo}}">
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <br>


            @if ($tipo->tipo_cataa=="biologia")
            @php
            $bio=$bio+1;
            @endphp
            @if ($bio ==1)
            <h5 style="color: rgb(82, 82, 82)">3.2 Biológicas</h5>
            @endif
            <div class="card" style="padding: 10px 10px;" id="biologia">
                <h5>Biológia {{$bio}}</h5>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label><strong>Biológia :</strong></label>
                            <input type="text" name="nombre_bio[]" class="form-control" required
                                value="{{$tipo->nombre}}">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                        <div class="form-group">
                            <label><strong>Unidad:</strong></label>
                            <input type="text" name="unidad_bio[]" class="form-control" value="{{$tipo->unidad}}">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Mínimo:</strong></label>
                            <input type="text" name="minimo_bio[]" class="form-control" value="{{$tipo->minimo}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Máximo:</strong></label>
                            <input type="text" name="maximo_bio[]" class="form-control" value="{{$tipo->maximo}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Método de Ensayo:</strong></label>
                            <input type="text" name="metodo_bio[]" class="form-control" value="{{$tipo->metodo}}">
                        </div>
                    </div>
                </div>
            </div>

            @endif

            @if ($tipo->tipo_cataa=="sensorial")
            @php
            $sen=$sen+1;
            @endphp
            @if ($sen ==1)
            <h5 style="color: rgb(82, 82, 82)">3.1 Sensoriales</h5>
            @endif
            <div class="card" style="padding: 10px 10px;" id="sensorial">
                <h5>Sensoriales {{$sen}}</h5>

                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Sensoriales:</strong></label>
                            <input type="text" name="nombre_sen[]" class="form-control" required
                                value="{{$tipo->nombre}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Especificaciones Y/O Tolerancias:</strong></label>
                            <input type="text" name="unidad_sen[]" class="form-control" value="{{$tipo->unidad}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label><strong>Método de Ensayo:</strong></label>
                            <input type="text" name="metodo_sen[]" class="form-control" value="{{$tipo->metodo}}">
                        </div>
                    </div>
                </div>
            </div>

            @endif

            {{-- ------------------fin--------------------- --}}

            @endforeach





            <br>
            <h5 style="color: rgb(82, 82, 82)">4. Vida útil prevista y condiciones de almacenamiento</h5>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Vida útil estimada:</strong></label>
                        <textarea name="vida" rows="3" cols="60">{{$requisito->vida}}</textarea>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Condiciones de manejo/almacenamiento:</strong></label>
                        <textarea name="condicion" rows="3" cols="60">{{$requisito->condicion}}</textarea>
                    </div>
                </div>
            </div>

            <h5 style="color: rgb(82, 82, 82)">5. Envase y embalaje</h5>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label><strong>Envase y embalaje:</strong></label>
                        <textarea name="envase" rows="2" cols="140">{{$requisito->envase}}</textarea>
                    </div>
                </div>
            </div>


            <h5 style="color: rgb(82, 82, 82)">6.Uso y 7.Método(s)</h5>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Etiquetado e instrucciones para manipulación preparación y uso:</strong></label>
                        <textarea name="etiquetado" rows="3" cols="65">{{$requisito->etiquetado}}</textarea>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label><strong>Método(s) de distribución y entrega:</strong></label>
                        <textarea name="metodo" rows="3" cols="65">{{$requisito->metodo}}</textarea>
                    </div>
                </div>
            </div>
            <h5 style="color: rgb(82, 82, 82)">8. Requisitos legales y reglamentarios</h5>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label><strong>Requisitos legales y reglamentarios:</strong></label>
                        <textarea name="requisito" rows="4" cols="140">{{$requisito->requisito}}</textarea>
                    </div>
                </div>
            </div>

            <h5 style="color: rgb(82, 82, 82)">9. Uso previsto</h5>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <label><strong>Manipulación Esperada:</strong></label>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <label><strong>Manipulación Inapropiada:</strong></label>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <label><strong>Grupo de usuarios o consumidores:</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <textarea name="uso" rows="4" cols="140">{{$requisito->uso}}</textarea>
                    </div>
                </div>
            </div>
            <h5 style="color: rgb(82, 82, 82)">10. Riesgo de inocuidad alimentaria</h5>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <label><strong>Riesgo Físico:</strong></label>
                    <textarea name="fisico" rows="3" cols="45">{{$requisito->fisico}}</textarea>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <label><strong>Riesgo Biológico:</strong></label>
                    <textarea name="biologico" rows="3" cols="45">{{$requisito->biologico}}</textarea>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                    <label><strong>Riesgo Químico:</strong></label>
                    <textarea name="quimico" rows="3" cols="45">{{$requisito->quimico}}</textarea>
                </div>
            </div>
            <h5 style="color: rgb(82, 82, 82)">11. Presentaciones disponibles</h5>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <textarea name="presentacion" rows="4" cols="140">{{$requisito->presentacion}}</textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
            {!!Form::close()!!}
            <br>
    </div>
</div>




@endsection
