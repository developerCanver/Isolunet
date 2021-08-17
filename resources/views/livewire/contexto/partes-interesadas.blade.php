<div>


    <br>
    <hr>
    <div class="row">

        <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
            <div class="card p-3">
                <form wire:ignore.self>
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <div class="form-group">
                                <label for="">Partes Interesadas</label>
                                <input type="text" class="form-control" name="nombreInteresada"
                                    wire:model="nombreInteresada">
                                @error('nombreInteresada') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
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
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
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
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12" style="margin-top: 3%;">
                            @if ($opcion=='guardar')
                            <button type="submit" wire:click="store" class="btn btn-success">Agregar</button>
                            @else
                            <input type="hidden" class="form-control" wire:model="id_partei_master">
                            <button type="button" wire:click.prevent="updatePartes()" class="btn btn-primary"
                                data-dismiss="modal">Actualizar</button>
                            @endif

                        </div>
                    </div>

                </form>

            </div>
        </div>

        <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">
            <div class="row">
                <div class="card p-3">


                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style=" display: block;
                max-height: 500px;
                overflow-y: scroll;
                scroll-behavior: smooth;">
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
                                            <button data-toggle="modal" style="color:#18A4B4;"
                                                wire:click="edit({{ $element->id_partei_master }})" class="btn-sm">
                                                <i class="  fas fa-pencil-alt " style="color:#18A4B4;"></i>
                                            </button>

                                            <button wire:click="delete({{ $element->id_partei_master }})"
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
            </div>


        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-10 col-sm-10 col-lg-10 col-xs-10">
            @livewire('contexto.partes-interesadas-grafica')
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
                        
                                @if ($element->necesidad)
                                {{$element->necesidad}}
                                <button data-toggle="modal" style="color:#18A4B4; float: right;" 
                                wire:click="editPartes({{ $element->id_partei_master }},'necesidad')" data-target="#necesidad{{ $element->id_partei_master }}" class="btn-sm">
                                <i class="  fas fa-pencil-alt " style="color:#18A4B4;"></i>
                            </button>
                               
                                @else
                                <a class="btn btn-success" style="color: #FFFFFF" data-toggle="modal"
                                    data-target="#necesidad{{ $element->id_partei_master }}">+</a>
                                @endif
                           
                        </th>
                        <th>
                          
                                @if ($element->expectativa)
                                {{$element->expectativa}}
                                <button data-toggle="modal" style="color:#18A4B4; float: right;" 
                                wire:click="editPartes({{ $element->id_partei_master }},'expectativa')" data-target="#expectativa{{ $element->id_partei_master }}" class="btn-sm">
                                <i class="  fas fa-pencil-alt " style="color:#18A4B4;"></i>
                                @else
                                <a class="btn btn-success" style="color: #FFFFFF" data-toggle="modal"
                                    data-target="#expectativa{{ $element->id_partei_master }}">+</a>
                                @endif
                          
                        </th>
                        <th>
                       
                                @if ($element->estrategia)
                                {{$element->estrategia}}
                                <button data-toggle="modal" style="color:#18A4B4; float: right;" 
                                wire:click="editPartes({{ $element->id_partei_master }},'estrategia')" data-target="#estrategia{{ $element->id_partei_master }}" class="btn-sm">
                                <i class="  fas fa-pencil-alt " style="color:#18A4B4;"></i>
                                @else
                                <a class="btn btn-success" style="color: #FFFFFF" data-toggle="modal"
                                    data-target="#estrategia{{ $element->id_partei_master }}">+</a>
                                @endif
                          
                        </th>
                        <th>
                         
                                @if ($element->medicion)
                                {{$element->medicion}}
                                <button data-toggle="modal" style="color:#18A4B4; float: right;" 
                                wire:click="editPartes({{ $element->id_partei_master }},'medicion')" data-target="#medicion{{ $element->id_partei_master }}" class="btn-sm">
                                <i class="  fas fa-pencil-alt " style="color:#18A4B4;"></i>
                                @else
                                <a class="btn btn-success" style="color: #FFFFFF" data-toggle="modal"
                                    data-target="#medicion{{ $element->id_partei_master }}">+</a>
                                @endif
                         
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
                                            
                                            <input type="text" class="form-control" wire:model="necesidad" >
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
