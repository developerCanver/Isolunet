<div>

    @if ($this->post == null)


    {{-- agregar --}}

    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">

                <div class="card-body ">
                    {{-- <div class="card-body d-flex justify-content-between align-items-center"> --}}
                    <h5 class="pt-3" style="color: rgb(46, 46, 46);">Acciones y Compromisos</h5>
                    <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Añadir</button>
                    <input type="hidden" required>
                </div>
            </div>
        </div>
    </div>
    <div class="m-2"></div>

    @foreach($inputs as $key => $value)

    <div class=" add-input">
       
        <div class="card text-left mt-2">
            @php
            if (((max($inputs))==$key)) {
            $color="style=background:#b0e7d7";
            } else {
            $color="style=background:#d0e4e2";
            }
            @endphp

            <div class="card-body p-1" {{$color}}>

                <center>
                    @if ((max($inputs))==$key)

                    <div class="card-body p-2 ">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 style="color: #883edd;"><strong>Nueva Acción y Compromiso:</strong></h5>
                            <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">X</button>
                        </div>
                        @else
                        <div class="card-body p-2 ">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <label for="datos"><strong>Accion #{{$key+1}}</strong></label>
                                <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">X</button>
                            </div>


                            @endif
                </center>

                <p class="mg-b-0">Acciones N°{{$key+1}}</p>

                <div class="row">
                    <div class="col-md-12 col-sm-10 col-xs-12 col-lg-12">
                        <div class="form-group">
                            <textarea rows="6" required class="form-control" name="accion[]"></textarea>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label><strong>Responsable:</strong></label>
                            <select name="responsable[]" class="form-control " required>
                                <option selected disabled value="">Seleccione Usuario...</option>
                                @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->name }}">{{ $usuario->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label><strong>Fecha Inicio:</strong></label>
                            <input type="date" required name="fecha_inicio_acc[]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label><strong>Fecha Final:</strong></label>
                            <input type="date" required name="fecha_final_acc[]" class="form-control">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
        @endforeach

        @else

        {{-- -------------------------EDITAR--------------------- --}}



        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="card">

                    <div class="card-body ">
                        {{-- <div class="card-body d-flex justify-content-between align-items-center"> --}}
                        <h5 class="pt-3" style="color: rgb(46, 46, 46);">Acciones y Compromisos</h5>
                        <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Añadir</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-2"></div>

        @foreach($consulta as $key => $consul)
        {{-- acciones cargadas --}}

        <div class="card p-2">
            <div class="card-body">


                <p class="mg-b-0">Acciones Registradas</p>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="form-group">
                            <textarea rows="7" class="form-control" name="accion[]">{{$consul->accion}}</textarea>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label><strong>Responsable:</strong></label>
                            <select name="responsable[]" class="form-control " required>
                                <option disabled value="">Seleccione Usuario...</option>
                                @foreach ($usuarios as $usuario)


                                <option value="{{ $usuario->name}}"
                                    {{$usuario->name == $consul->responsable ? 'selected' : ''}}>
                                    {{ $usuario->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label><strong>Fecha Inicio:</strong></label>
                            <input type="date" required name="fecha_inicio_acc[]" class="form-control"
                                value="{{$consul->fecha_inicio_acc}}">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label><strong>Fecha Final:</strong></label>
                            <input type="date" required name="fecha_final_acc[]" class="form-control"
                                value="{{$consul->fecha_final_acc}}">
                        </div>
                    </div>

                </div>


                <div class="card p-2">
                    <div class="card-body">
                        @php
                        if($consul->terminada==1){
                        $terminada="<h5><strong style='color:rgb(15, 165, 40)'>Ejecucción Compromiso TERMINADA</strong>
                        </h5>";
                        }else{
                        $terminada="<h5> <strong style='color:rgb(248, 41, 41)'>Ejecucción Compromiso en
                                PROCESO</strong> </h5>";
                        }
                        @endphp
                        @php
                        echo$terminada;
                        @endphp


                        <input type="hidden" name="terminada[]" value="{{$consul->terminada}}">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <label><strong>Compromiso:</strong></label>
                                    <input type="text" name="compromiso[]" class="form-control"
                                        value="{{$consul->compromiso}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <label><strong>Acción Ejecutable:</strong></label>
                                    <input type="text" name="ejecutable[]" class="form-control"
                                        value="{{$consul->ejecutable}}">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                                <div class="form-group">
                                    <label><strong>Fecha Inicio Ejecucció:</strong></label>
                                    <input type="date" name="fecha_inicio_eje[]" class="form-control"
                                        value="{{$consul->fecha_inicio_eje}}">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                                <div class="form-group">
                                    <label><strong>Fecha Final Ejecucció:</strong></label>
                                    <input type="date" name="fecha_final_eje[]" class="form-control"
                                        value="{{$consul->fecha_final_eje}}">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                                <div class="form-group">
                                    <label><strong>Archivo Ejecucció:
                                            @if ($consul->archivo)

                                            {{substr(($consul->archivo), 10)}}
                                            <a title="Descargar Archivo" href="/archivos/acta/{{$consul->archivo}}"
                                                class="btn btn-light" download="{{$consul->archivo}}"
                                                style="color: rgb(53, 87, 53); font-size:18px; font-size:18px; font-size: 25px;""> <i
                                                        class=" fas fa-file-download "></i>
                                            </a>
                                      
                                        @else
                                        No existe
                                        @endif
                                
                                </strong></label>
                                    <input type="file" class="form-control" name="archivo_eje[]">
                                                <input type="hidden" name="archivo_anterior_eje[]"
                                                    value="{{$consul->archivo}}">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                <div class="form-group">
                                    <label><strong>Observaciones Ejecucción:</strong></label>
                                    <textarea name="observaciones_ejecuccion[]"
                                        class="form-control">{{$consul->observaciones_eje}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="pt-3"></div>
        @endforeach


        {{-- nuevos registros   en editar --}}

        @foreach($inputs as $key => $value)
        <div class="card text-left mt-2">
            @php
            if (((max($inputs))==$key+1)) {
            $color="style=background:#b0e7d7";
            } else {
            $color="style=background:#d0e4e2";
            }
            //print_r($inputs);
            @endphp


            <div class="card-body p-1" {{$color}}>

                <center>
                    @if ((max($inputs))==$key+1)

                    <div class="card-body p-2 ">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 style="color: #883edd;"><strong>Nueva Acción y Compromiso:</strong></h5>
                            <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">X</button>
                        </div>
                        @else
                        <div class="card-body p-2 ">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <label for="datos"><strong>Accion #{{$key+1}}</strong></label>
                                <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">X</button>
                            </div>


                            @endif
                </center>

                <p class="mg-b-0">Acciones N°{{$key+1}}</p>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="form-group">
                            <textarea rows="7" class="form-control" name="accion[]"></textarea>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label><strong>Responsable:</strong></label>
                            <select name="responsable[]" class="form-control " required>
                                <option selected disabled value="">Seleccione Usuario...</option>
                                @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->name }}">{{ $usuario->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label><strong>Fecha Inicio:</strong></label>
                            <input type="date" required name="fecha_inicio_acc[]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label><strong>Fecha Final:</strong></label>
                            <input type="date" required name="fecha_final_acc[]" class="form-control">
                        </div>
                    </div>

                </div>




            </div>
        </div>
        @endforeach
        @endif

        <br>
  
</div>
