<div>



    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <div class="form-group">
                <label><strong>Oportunidades/Amenazas</strong></label>
                <select name="tipo_oa" required class="form-control " wire:model="externo">
                    <option   value=""  selected>Seleccione...</option>
                    <option value="Oportunidades">Oportunidades</option>
                    <option value="Amenazas">Amenazas</option>

                </select>

            </div>
        </div>
        @if(count($externos) > 0)
        @if ($externo == 'Oportunidades')
        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <div class="form-group">
                <label><strong>Oportunidades</strong></label>
                <select name="opo_ame" class="form-control select2" required>
                    <option selected disabled value="">Seleccione Oportunidades...</option>
                    @foreach ($externos as $externo)
                    <option value="{{ $externo->id_dofa }}">{{ $externo->oportunidades }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @else
        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <div class="form-group">
                <label><strong>Amenazas</strong></label>
                <select name="opo_ame" class="form-control select2" required>
                    <option selected disabled value="">Seleccione Amenazas...</option>
                    @foreach ($externos as $externo)
                    <option value="{{ $externo->id_dofa }}">{{ $externo->amenazas }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        @endif
        @endif

        

    </div>
    <div class="row">

        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <div class="form-group">
                <label><strong>Fortaleza/Debilidad</strong></label>
                <select name="tipo_fd" required class="form-control " wire:model="interno">
                    <option selected  value="" >Seleccione...</option>
                    <option value="Fortalezas">Fortalezas</option>
                    <option value="Debilidaddes">Debilidaddes</option>

                </select>
            </div>
        </div>
        @if(count($internos) > 0)
        @if ($interno == 'Fortalezas')
        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <div class="form-group">
                <label><strong>Fortalezas</strong></label>
                <select name="for_deb" class="form-control " required>
                    <option selected disabled value="">Seleccione Fortalezas...</option>
                    @foreach ($internos as $interno)
                    <option value="{{ $interno->id_dofa }}">{{ $interno->fortalezas }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @else
        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <div class="form-group">
                <label><strong>Debilidades</strong></label>
                <select name="for_deb" class="form-control " required>
                    <option selected disabled value="">Seleccione Debilidades...</option>
                    @foreach ($internos as $interno)
                    <option value="{{ $interno->id_dofa }}">{{ $interno->debilidades }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        @endif
        @endif

        

    </div>
</div>
