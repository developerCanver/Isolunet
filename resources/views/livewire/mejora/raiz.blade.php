<div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <center>

                <label for="">Causa Raíz </label>
                <textarea name="" class="form-control" rows="2" readonly id="resultado">{{$validacion}}</textarea>
            </center>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
            <div class="form-group">
                <label for="exampleInputEmail1">6M </label>
            </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Porque? </label>
            </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Porque? </label>
            </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Porque? </label>
            </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Porque? </label>
            </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Porque? </label>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
            <div class="form-group">

                <textarea name="" class="form-control" rows="3" required wire:model="m6"></textarea>
            </div>
        </div>

        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
            <div class="form-group">
                <textarea name="" class="form-control" rows="3" wire:model="pq1"></textarea>
            </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
            <div class="form-group">
                <textarea name="" class="form-control" rows="3" wire:model="pq2"></textarea>
            </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
            <div class="form-group">
                <textarea name="" class="form-control" rows="3" wire:model="pq3"></textarea>
            </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
            <div class="form-group">
                <textarea name="" class="form-control" rows="3" wire:model="pq4"></textarea>
            </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
            <div class="form-group">
                <textarea name="" class="form-control" rows="3" wire:model="pq5"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-11 col-md-offset-2">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5 style="color: rgb(46, 46, 46);">Temas Tratados</h5>
                <a class="btn text-white btn-info btn-sm" wire:click="add">Añadir </a>

            </div>
        </div>
    </div>
    <br>
    @if ($this->validacion != null)
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
    </form>
    @endif

</div>
