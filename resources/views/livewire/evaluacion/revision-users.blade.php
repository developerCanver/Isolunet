<div>

    @if ($this->post == null)


    {{-- agregar --}}
    <div class=" add-input">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label for="datos"><strong>Nombre:</strong></label>
                    <select name="fk_user[]" class="form-control " required>
                        <option selected disabled value="">Seleccione Usuario...</option>
                        @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label for="datos"><strong>Cargo:</strong></label>
                    <select name="fk_cargor[]" class="form-control " required>
                        <option value="" disabled selected>Seleccione...</option>
                        @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->id_cargo }}">{{ $cargo->nom_cargo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos"><strong>Represeta A:</strong></label>
                    <input type="text" required name="represeta[]" class="form-control">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Añadir</button>
            </div>
        </div>
    </div>

    @foreach($inputs as $key => $value)
    <div class=" add-input">
        <p class="mg-b-0">Participante {{$key+1}}</p>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label for="datos"><strong>Nombre:</strong></label>
                    <select name="fk_user[]" class="form-control " required>
                        <option selected disabled value="">Seleccione Usuario...</option>
                        @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label for="datos"><strong>Cargo:</strong></label>
                    <select name="fk_cargor[]" class="form-control " required>
                        <option value="" disabled selected>Seleccione...</option>
                        @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->id_cargo }}">{{ $cargo->nom_cargo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos"><strong>Represeta A:</strong></label>
                    <input type="text" required name="represeta[]" class="form-control">
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Eliminar</button>
            </div>
        </div>
    </div>
    @endforeach

    @else
    {{-- -------------------------EDITAR--------------------- --}}
    <div class="col-md-11 col-md-offset-2">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5 style="color: rgb(46, 46, 46);">2. Participantes del Ejercicio</h5>
                <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Añadir</button>
            </div>
        </div>
    </div>
    <br>

    @foreach($consulta as $key => $consul)
    <div class=" add-input">
        <p class="mg-b-0">Participante {{$key+1}}</p>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label for="datos"><strong>Nombre:</strong></label>
                    <select name="fk_user[]" class="form-control " required>
                        <option selected disabled value="">Seleccione Usuario...</option>
                        @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $usuario->id ==  $consul->fk_user ? 'selected' : '' }}>
                            {{ $usuario->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label for="datos"><strong>Cargo:</strong></label>
                    <select name="fk_cargor[]" class="form-control " required>
                        <option value="" disabled selected>Seleccione...</option>
                        @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->id_cargo }}"
                            {{$cargo->id_cargo == $consul->fk_cargor ? 'selected' : '' }}>{{$cargo->nom_cargo}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos"><strong>Represeta A:</strong></label>
                    <input type="text" required name="represeta[]" class="form-control" value="{{$consul->represeta}}">
                </div>
            </div>
            <div class="col-md-2">
                <a href="{{url('revision_delete', array('id'=>$consul->id_revision_user,'tipo_informacion'=>$post))}}"><i
                        class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
            </div>
        </div>
    </div>
    @endforeach

    @foreach($inputs as $key => $value)
    <div class=" add-input">
        <p class="mg-b-0">Participante {{$key+1}}</p>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label for="datos"><strong>Nombre:</strong></label>
                    <select name="fk_user[]" class="form-control " required>
                        <option selected disabled value="">Seleccione Usuario...</option>
                        @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label for="datos"><strong>Cargo:</strong></label>
                    <select name="fk_cargor[]" class="form-control " required>
                        <option value="" disabled selected>Seleccione...</option>
                        @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->id_cargo }}">{{ $cargo->nom_cargo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label for="datos"><strong>Represeta A:</strong></label>
                    <input type="text" required name="represeta[]" class="form-control">
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Eliminar</button>
            </div>
        </div>
    </div>
    @endforeach
    @endif

<br>
<br>

</div>
