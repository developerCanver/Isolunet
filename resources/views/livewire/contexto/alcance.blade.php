<div>
    @include('partials.message_flash')

 

    <div class="card-body">
        <div class="row">
           
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12" id="card-font">
                        <div class="card">
                        <h5 class="card-header" style="background: #1F0182; color: #FFFFFF;">Proceso y Limites</h5>
                        <div class="card-body">
                              <ul>
                                  @foreach ($procesos as $proceso)
                                  <li>{{$proceso->nom_proceso}}</li>
                                  @endforeach
                                    
                                  {{ $procesos->links() }}
                                </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12" id="card-font">
                        <div class="card">
                        <h5 class="card-header" style="background: #1F0182; color: #FFFFFF;">Producto</h5>
                        <div class="card-body">
                              <ul>
                                @foreach ($productos as $producto)
                                <li>{{$producto->str_producto}}</li>
                                @endforeach
                                  
                                {{ $procesos->links() }}

                                  
                                </ul>
                        </div>
                      </div>	
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <div class="row">
                            
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                <img src="{{ asset('img/imagen1.svg') }}" alt="" width="300" height="300">
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                @if ($alert==1)
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                {{$msjAlert}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                            
                                @endif
                               
                                <h5>Alcance del SGC</h5>
                                <select wire:model="id_isGesion" wire:change="change" name="id_isGesion" required class="form-control" >
                                    <option value=""  selected>Seleccione Gestion Sistema...</option>
                                    @foreach ($sisGesiones as $sisGesion)                             
                                    <option value="{{$sisGesion->id_sisgestion}}">{{$sisGesion->str_nombre}}</option>
                                    @endforeach
                                </select>
                      
                                <br>
                                <textarea   wire:model="nombre1" rows="3" class="form-control"></textarea>
                                @error('nombre1') <span class="text-danger">{{ $message }}</span>@enderror
                                <br>
                                <textarea   wire:model="nombre2" rows="3" class="form-control"></textarea>
                                @error('nombre2') <span class="text-danger">{{ $message }}</span>@enderror
                                <div class="mb-3"></div>

                                @if ($opcion=='guardar')
                                <button type="submit" wire:click="store" class="btn btn-success">Agregar</button>
                                @else
                                
                                <button type="button" wire:click="update()"
                                class="btn btn-primary" data-dismiss="modal">Actualizar</button>
                                @endif

                            </div>
                         
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                <img src="{{ asset('img/imagen2.svg') }}" alt="" width="300" height="300">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12" id="card-font">

                        <div class="card">
                        <h5 class="card-header" style="background: #1F0182; color: #FFFFFF;">Entorno</h5>
                        <div class="card-body">
                              <ul>
                                    <li>Político</li>
                                    <li>Económico</li>
                                    <li>Social</li>
                                    <li>Tecnológico</li>
                                    <li>Ambiental</li>
                                    <li>Legal</li>
                                    
                                </ul>
                        </div>
                      </div>	  					
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12" id="card-font">
                        <div class="card">
                        <h5 class="card-header" style="background: #1F0182; color: #FFFFFF;">Partes Interesadas</h5>
                        <div class="card-body">
                            <ul>
                                @foreach ($partesInteresadas as $partesInteresada)
                                <li>{{$partesInteresada->nombreInteresada}}</li>
                                @endforeach
                                  
                                {{ $partesInteresadas->links() }}
                                </ul>
                        </div>
                      </div>	  	
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
