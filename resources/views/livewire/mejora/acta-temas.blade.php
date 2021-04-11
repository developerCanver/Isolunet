<div>

    @if ($this->post == null)


    {{-- agregar --}}
    <h5 class="pt-3" style="color: rgb(46, 46, 46);">Temas Tratados</h5>
    <div class=" add-input">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                <div class="form-group">
                    <label><strong>Tema Tratado:</strong></label>
                    <input type="text" required name="tema[]" class="form-control">
                </div>
            </div>

            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                <div class="form-group">
                    <label><strong>Comentarios Relevantes :</strong></label>
                    <input type="text" required name="comentario[]" class="form-control">
                </div>
            </div>

            <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Añadir</button>
            </div>
        </div>
    </div>

    @foreach($inputs as $key => $value)
    <div class=" add-input">
        <p class="mg-b-0">Tema N°{{$key+1}}</p>
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                <div class="form-group">
                    <label><strong>Tema Tratado:</strong></label>
                    <input type="text" required name="tema[]" class="form-control">
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                <div class="form-group">
                    <label><strong>Comentarios Relevantes :</strong></label>
                    <input type="text" required name="comentario[]" class="form-control">
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
                <h5 style="color: rgb(46, 46, 46);">Temas Tratados</h5>
                <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Añadir</button>
            </div>
        </div>
    </div>
    <br>

    @foreach($consulta as $key => $consul)
    <div class=" add-input">
        <p class="mg-b-0">Tema N°{{$key+1}}</p>
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                <div class="form-group">
                       <label><strong>Tema Tratado:</strong></label>
                    <input type="text" required name="tema[]" class="form-control" value="{{$consul->tema }}">
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                <div class="form-group">
                    <label><strong>Comentarios Relevantes :</strong></label>
                    <input type="text" required name="comentario[]" class="form-control" value="{{$consul->comentario }}">

                </div>
            </div>

            <div class="col-md-2">
                <a href="{{url('tema_delete', array('id'=>$consul->id_tema,'tipo_informacion'=>$post))}}"><i
                        class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
            </div>
        </div>
    </div>
    @endforeach

    @foreach($inputs as $key => $value)
    <div class=" add-input">
        <p class="mg-b-0">Tema N°{{$key+1}}</p>
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                <div class="form-group">
                     <label><strong>Tema Tratado:</strong></label>
                    <input type="text" required name="tema[]" class="form-control">
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                <div class="form-group">
                     <label><strong>Comentarios Relevantes :</strong></label>
                    <input type="text" required name="comentario[]" class="form-control">
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