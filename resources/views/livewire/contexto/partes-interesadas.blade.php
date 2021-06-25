<div>
    <form>
        <div wire:ignore.self class="row">
            <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
                <div class="form-group">
                    <label for="">Partes Interesadas</label>
                    <input type="text" class="form-control" name="nombreInteresada" wire:model="nombreInteresada">
                    @error('nombreInteresada') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
                <div class="form-group">
                    <label for="">Impacto</label>
                    <select class="form-control" name="impacto" wire:model="impacto">
                        <option value="0" selected>Seleccionar</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    @error('impacto') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
                <div class="form-group">
                    <label for="">Influencia</label>
                    <select class="form-control" wire:model="influencia">
                        <option value="" selected>Seleccionar</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    @error('influencia') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
           
            <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12" style="margin-top: 3%;">
            @if ($opcion=='guardar')
            <button type="submit" wire:click="store" class="btn btn-success">Agregar</button>
            @else
            <input type="hidden" class="form-control"  wire:model="id_partei_master">
            <button type="button"
            wire:click.prevent="updatePartes()"
            class="btn btn-primary" data-dismiss="modal">Actualizar</button>
            @endif
               

            </div>
        </div>
    </form>
    {{-- {{  Form::open(['action' => 'partes_interesadas\PartesInteresadasController@form_partes','autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
    {!! Form::token() !!}

    {!!Form::close()!!} --}}

    <hr>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
            @livewire('contexto.partes-interesadas-grafica')

        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead style="background: #18A6B0; color: #FFFFFF;">
                        <tr>
                            <th>Partes Interesadas</th>
                            <th>Impacto</th>
                            <th>Influencia</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($table_partes_interesadas as $element)
                        <tr>
                            <th>{{ $element->nombreInteresada }}</th>
                            <th>{{ $element->impacto }}</th>
                            <th>{{ $element->influencia }}</th>

                    
                            <th>  
                                <button data-toggle="modal"                            
                                    style="color:#18A4B4;"  wire:click="edit({{ $element->id_partei_master }})"
                                    class="btn-sm">
                                    <i class="  fas fa-pencil-alt " style="color:#18A4B4;"></i>
                                </button>

                            <button                            
                                 wire:click="delete({{ $element->id_partei_master }})"
                                class="btn-sm">
                                <i style="color: #F7072F" class="fas fa-trash-alt "></i>
                            </button>
                        
                            </th>
                    
        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <p>IDENTIFICACION DE ESTRATEGIAS PARA SATISFACER REQUISITOS DE PARTES INTERESADAS</p>
        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
            <table class="table table-hover">
                <thead style="background: #18A6B0; color: #FFFFFF;">
                    <tr>
                        <th>ID</th>
                        <th>Partes Interesadas</th>
                        <th>Necesidad</th>
                        <th>Expectativa</th>
                        <th>Estrategia Destacada</th>
                        <th>Medicion del Desempeño</th>
                        <th>Empresa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($table_partes_interesadas as $element)
                        @if ($element->impacto >= 3 && $element->influencia >= 2 )
                    <tr>
                        <th>{{ $cont++ }}</th>
                        <th>{{ $element->nombreInteresada }}</th>
                        <th>
                            <center>
                                @if ($element->necesidad)
                                {{$element->necesidad}}
                                @else
                                <a class="btn btn-success" style="color: #FFFFFF" data-toggle="modal"
                                    data-target="#necesidad{{ $element->id_partei_master }}">+</a>
                                @endif
                            </center>
                        </th>
                        <th>
                            <center>
                                @if ($element->expectativa)
                                {{$element->expectativa}}
                                @else
                                <a class="btn btn-success" style="color: #FFFFFF" data-toggle="modal"
                                    data-target="#expectativa{{ $element->id_partei_master }}">+</a>
                                @endif
                            </center>
                        </th>
                        <th>
                            <center>
                                @if ($element->estrategia)
                                {{$element->estrategia}}
                                @else
                                <a class="btn btn-success" style="color: #FFFFFF" data-toggle="modal"
                                    data-target="#estrategia{{ $element->id_partei_master }}">+</a>
                                @endif
                            </center>
                        </th>
                        <th>
                            <center>
                                @if ($element->medicion)
                                {{$element->medicion}}
                                @else
                                <a class="btn btn-success" style="color: #FFFFFF" data-toggle="modal"
                                    data-target="#medicion{{ $element->id_partei_master }}">+</a>
                                @endif
                            </center>
                        </th>
                        <th>
                            {{ $element->razon_social }}
                        </th>
                    </tr>


                    <!-- Modal -->
                    <div wire:ignore.self class="modal  fade" id="necesidad{{ $element->id_partei_master }}"
                        tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Necesidad</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <input type="text" class="form-control" wire:model="necesidad" value="1">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button"
                                        wire:click.prevent="update({{ $element->id_partei_master }},'necesidad')"
                                        class="btn btn-primary" data-dismiss="modal">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->

                    <!-- Modal -->
                    <div wire:ignore.self class="modal fade" id="expectativa{{ $element->id_partei_master }}"
                        tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Expectativa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <input type="text" class="form-control" wire:model="expectativa">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button"
                                        wire:click.prevent="update({{ $element->id_partei_master }},'expectativa')"
                                        class="btn btn-primary" data-dismiss="modal">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->


                    <!-- Modal -->
                    <div wire:ignore.self class="modal fade" id="estrategia{{ $element->id_partei_master }}"
                        tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Estrategia Destacada</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <input type="text" class="form-control" wire:model="estrategia">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button"
                                        wire:click.prevent="update({{ $element->id_partei_master }},'estrategia')"
                                        class="btn btn-primary" data-dismiss="modal">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div wire:ignore.self class="modal fade" id="medicion{{ $element->id_partei_master }}" tabindex="-1"
                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Medicion del Desempeño</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <input type="text" class="form-control" wire:model="medicion">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button"
                                        wire:click.prevent="update({{ $element->id_partei_master }},'medicion')"
                                        class="btn btn-primary" data-dismiss="modal">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    @endif
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

    </div>


</div>
