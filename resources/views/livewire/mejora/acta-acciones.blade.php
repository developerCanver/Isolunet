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
                </div>
            </div>
        </div>
    </div>
    <div class="m-2"></div>
    @foreach($inputs as $key => $value)

    @php

    @endphp
    <div class=" add-input">

        <div class="card text-left mt-2">
            @php
            if (((max($inputs)-1)==$key+1)) {
                $color="style=background:#b0e7d7";
            } else {
                $color="style=background:#e8e9fe";
            }
             
            @endphp
            <div class="card-body p-1" {{$color}}>
        
                    <center>
                        @if ((max($inputs)-1)==$key+1)
                       
                        <div class="card-body p-2 ">
                            <div class="card-body d-flex justify-content-between align-items-center"> 
                            <h5  style="color: #883edd;"><strong>Nueva Acción y Compromiso:</strong></h5>
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

            @else

            {{-- -------------------------EDITAR--------------------- --}}
            <div class="row">
                <div class="col-md-12 col-md-offset-2">
                    <div class="card">

                        <div class="card-body ">
                            {{-- <div class="card-body d-flex justify-content-between align-items-center"> --}}
                            <h5 class="pt-3" style="color: rgb(46, 46, 46);">Acciones y Compromisos</h5>
                            <button class="btn text-white btn-info btn-sm"
                                wire:click.prevent="add({{$i}})">Añadir</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-2"></div>

            @foreach($consulta as $key => $consul)
            <div class=" add-input">
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
                            <input type="date" required name="fecha_inicio_acc[]" class="form-control"  value="{{$consul->fecha_inicio_acc}}">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label><strong>Fecha Final:</strong></label>
                            <input type="date" required name="fecha_final_acc[]" class="form-control" value="{{$consul->fecha_final_acc}}">
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
            @foreach($inputs as $key => $value)
            <div class="card text-left mt-2">
                @if ((max($inputs)-1)==$key+1)

                <div class="card-body" style="background: #b0e7d7;">
                    @else
                    <div class="card-body">
                        @endif
                        <center>
                            @if ((max($inputs)-1)==$key+1)
                            <h3 for="datos" style="color:#883edd"><strong>Nueva Acción y Compromiso:</strong></h5>
                                @else
                                <label for="datos"><strong>Accion #{{$key+1}}</strong></label>
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
                <br>


            </div>
