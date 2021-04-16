<div>
    @if ($id_anomalia == null)
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <center>
                    <label for="">Seleccionar Anomalia </label>
                    <select name="fk_anomalia" required class="form-control" wire:model="causa">
                        <option value="" selected>Seleccione anomalia...</option>
                        @foreach ($anomalias as $element)
                        <option value="{{ $element->id_anomalia }}">{{ $element->id_anomalia }} -
                            {{ $element->str_anomalia }}</option>
                        @endforeach
                    </select>
                </center>
            </div>
        </div>
        <br>

        <div class="row" style="background-color: #18A4B5; margin: 2%; color: #FFFFFF;">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <center>
                    <h3>Acciones Correctivas</h3>
                </center>
            </div>
        </div>
        @if ($causa)
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Causa Raiz </label>
                    <select name="fk_causa" required class="form-control">
                        <option value="" selected>Seleccione Causa...</option>
                        @foreach ($causas as $causa)
                        <option value="{{ $causa->id_causas }}">{{ $causa->id_causas }} -
                            {{ $causa->causa }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        @endif

    @else
{{$id_anomalia}}
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                    <center>
                        <label for="">Seleccionar Anomalia </label>
                        <select name="fk_anomalia" required class="form-control" >
                            <option value="" selected>Seleccione anomalia...</option>
                            @foreach ($anomalias as $element)
                            <option value="{{ $element->id_anomalia }}" {{ $element->id_anomalia == $id_anomalia ? 'selected' : '' }}>
                                {{ $element->id_anomalia }} -
                                {{ $element->str_anomalia }}</option>
                            @endforeach

                          
                        </select>
                    </center>
                </div>
            </div>
            <br>

            <div class="row" style="background-color: #18A4B5; margin: 2%; color: #FFFFFF;">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                    <center>
                        <h3>Acciones Correctivas</h3>
                    </center>
                </div>
            </div>
        
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Causa Raiz </label>
                        <select name="fk_causa" required class="form-control">
                            <option value="" selected>Seleccione Causa...</option>
                            @foreach ($causas as $causa)
                            <option value="{{ $causa->id_causas }}" {{ $causa->id_causas == $fk_correctiva ? 'selected' : '' }}>
                                {{ $causa->id_causas }} -
                                {{ $causa->causa }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

    @endif


</div>
