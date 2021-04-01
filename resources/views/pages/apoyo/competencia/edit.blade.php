@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ URL::to('/') }}">Apoyo</a>
        <a class="breadcrumb-item" href=""><span class="badge badge-dark">Competencia</span></a>

    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon icon ion-aperture"></i>
    <div>
        <h4>Competencia</h4>
        <p class="mg-b-0">Editar Competencia</p>
    </div>
</div><!-- d-flex -->



<div class="br-pagebody">
    <div class="br-section-wrapper">
        {{  Form::open(['action' => ['Apoyo\CompetenciaController@update',$competencia->id_competencia],'autocomplete'=>'off', 'method' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

    

        <div class="row">
        </div><br>


        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Fecha:</strong></label>
                    <input type="date" name="fecha_competencia" class="form-control" required
                        value="{{$competencia->fecha_competencia}}">

                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Cargo:</strong></label>
                    <select name="cargo_com" class="form-control select2 " required>
                        <option selected="true" disabled="disabled">Seleccione responsable</option>
                        @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->nom_cargo }}"
                            {{ $cargo->nom_cargo == $competencia->cargo_com ? 'selected' : '' }}>
                            {{ $cargo->nom_cargo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">

                    <label><strong>Área:</strong></label>
                    <select name="area_com" class="form-control select2" required>
                        <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->nom_area }}"
                            {{ $area->nom_area == $competencia->area_com ? 'selected' : '' }}>
                            {{ $area->nom_area }}</option>
                    @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Género:</strong></label>
                    <select name="genero" class="form-control select2" required>
                        <option value="" selected="true" disabled="disabled"> Seleccione Género..</option>
                        <option value="Hombre" @if($competencia->genero == 'Hombre') selected  @endif > Hombre</option>
                        <option value="Mujer" @if($competencia->genero == 'Mujer') selected  @endif > Mujer</option>
                    </select>

                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Reporte A:</strong></label>
                    <select name="reporta_a" class="form-control select2" required>
                        <option value="" selected="true" disabled="disabled"> Seleccione Reporte A..</option>
                        @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->nom_cargo }}"
                            {{ $cargo->nom_cargo == $competencia->reporta_a ? 'selected' : '' }}>
                            {{ $cargo->nom_cargo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-10 col-lg-10">
                <div class="form-group">
                    <label><strong>Misión del Cargo:</strong></label>
                    <textarea name="mision_cargo" rows="3" cols="110" required="true">{{$competencia->mision_cargo}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Dimensión del Cargo:</strong></label>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                            Directas
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                            <input type="number" name="directas" class="form-control" value="{{$competencia->directas}}" required>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                            Indirectas
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                            <input type="number" name="indirectas" class="form-control"  value="{{$competencia->indirectas}}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <h5>Educación</h5>
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                <div class="form-group">
                    <label><strong>Nivel:</strong></label>
                    <input type="text" name="nivel1" class="form-control" value="{{$competencia->nivel1}}" required>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label><strong>Especialidad:</strong></label>
                    <input type="text" name="especialidad1" class="form-control" value="{{$competencia->especialidad1}}" required>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                <div class="form-group">
                    <label><strong>Área:</strong></label>
                    <select name="edu_area1" class="form-control " required>
                        <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->nom_area }}"
                            {{ $area->nom_area == $competencia->edu_area1 ? 'selected' : '' }}>
                            {{ $area->nom_area }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                <div class="form-group">
                    <label><strong>Idioma/Nivel:</strong></label>
                    <select name="idioma1" class="form-control " required>
                        <option value="" selected="true" disabled="disabled"> Seleccione Idioma..</option>
                        <option value="Bajo" @if($competencia->idioma1 == 'Bajo') selected  @endif > Bajo</option>
                        <option value="Intermedio" @if($competencia->idioma1 == 'Intermedio') selected  @endif > Intermedio</option>
                        <option value="Avanzado" @if($competencia->idioma1 == 'Avanzado') selected  @endif > Avanzado</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                <div class="form-group">
                    <label><strong>Sistema/Nivel:</strong></label>
                    <select name="sistema1" class="form-control " required>
                        <option value="" selected="true" disabled="disabled"> Seleccione Idioma..</option>
                        <option value="Bajo" @if($competencia->sistema1 == 'Bajo') selected  @endif > Bajo</option>
                        <option value="Intermedio" @if($competencia->sistema1 == 'Intermedio') selected  @endif > Intermedio</option>
                        <option value="Avanzado" @if($competencia->sistema1 == 'Avanzado') selected  @endif > Avanzado</option>
        
                    </select>
                </div>
            </div>
            <script>
                function mostrar() {
                    document.getElementById("educacion").style.display = "flex";
                }

                function ocultar() {
                    document.getElementById("educacion").style.display = "none";
                }

                function mostrar_ocultar() {
                    var caja = document.getElementById("educacion");
                    if (caja.style.display == "none") {
                        mostrar();
                    } else {
                        ocultar();
                    }
                }

            </script>
            <div class="form-group">
                <button type="button" class="btn btn-info btn-sm" onclick="mostrar_ocultar()">+</button>
            </div>

        </div>
        <div class="row">


            <div class="row" id="educacion" style="display: none">
                <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                    <div class="form-group">
                        <label><strong>Nivel:</strong></label>
                        <input type="text" name="nivel2" class="form-control" value="{{$competencia->nivel2}}">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label><strong>Especialidad:</strong></label>
                        <input type="text" name="especialidad2" class="form-control" value="{{$competencia->especialidad2}}">
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                    <div class="form-group">
                        <label><strong>Área:</strong></label>
                        <select name="edu_area2" class="form-control ">
                            <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                            @foreach ($areas as $area)
                            <option value="{{ $area->nom_area }}"
                                {{ $area->nom_area == $competencia->edu_area2 ? 'selected' : '' }}>
                                {{ $area->nom_area }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                    <div class="form-group">
                        <label><strong>Idioma/Nivel:</strong></label>
                        <select name="idioma2" class="form-control ">
                            <option value="" selected="true" disabled="disabled"> Seleccione Idioma..</option>
                            <option value="Bajo" @if($competencia->idioma2 == 'Bajo') selected  @endif > Bajo</option>
                            <option value="Intermedio" @if($competencia->idioma2 == 'Intermedio') selected  @endif > Intermedio</option>
                            <option value="Avanzado" @if($competencia->idioma2 == 'Avanzado') selected  @endif > Avanzado</option>
            
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 col-lg-2">
                    <div class="form-group">
                        <label><strong>Sistema/Nivel:</strong></label>
                        <select name="sistema2" class="form-control ">
                            <option value="" selected="true" disabled="disabled"> Seleccione Idioma..</option>
                            <option value="Bajo" @if($competencia->sistema2 == 'Bajo') selected  @endif > Bajo</option>
                            <option value="Intermedio" @if($competencia->sistema2 == 'Intermedio') selected  @endif > Intermedio</option>
                            <option value="Avanzado" @if($competencia->sistema2 == 'Avanzado') selected  @endif > Avanzado</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h5>Expreriencia</h5>
        <hr>
        <script>
            function mostrar_exp() {
                document.getElementById("experiencia").style.display = "flex";
            }

            function ocultar_exp() {
                document.getElementById("experiencia").style.display = "none";
            }

            function mostrar_ocultar_exp() {
                var caja = document.getElementById("experiencia");
                if (caja.style.display == "none") {
                    mostrar_exp();
                } else {
                    ocultar_exp();
                }
            }

            function mostrar_exp2() {
                document.getElementById("experiencia2").style.display = "flex";
            }

            function ocultar_exp2() {
                document.getElementById("experiencia2").style.display = "none";
            }

            function mostrar_ocultar_exp2() {
                var caja = document.getElementById("experiencia2");
                if (caja.style.display == "none") {
                    mostrar_exp2();
                } else {
                    ocultar_exp2();
                }
            }

        </script>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Sector / Área :</strong></label>
                    <select name="exp_area1" class="form-control " required>
                        <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->nom_area }}"
                            {{ $area->nom_area == $competencia->exp_area1 ? 'selected' : '' }}>
                            {{ $area->nom_area }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                <div class="form-group">
                    <label><strong>Tiempo (Años):</strong></label>
                    <select name="tiempo1" class="form-control " required>
                        <option value="" selected="true" disabled="disabled"> Seleccione Cantidad..</option>
                        <option value="< 3 Años" @if($competencia->tiempo1 == '< 3 Años') selected  @endif >< 3 Años</option>
                        <option value="3 a 5 Años" @if($competencia->tiempo1 == '3 a 5 Años') selected  @endif >3 a 5 Años</option>
                        <option value="5 a 10 Años" @if($competencia->tiempo1 == '5 a 10 Años') selected  @endif >5 a 10 Años</option>
                        <option value="> 10 Años" @if($competencia->tiempo1 == '> 10 Años') selected  @endif >> 10 Años</option>
                    </select>

                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-info btn-sm" onclick="mostrar_ocultar_exp()">+</button>
            </div>
        </div>
        <div class="row" id="experiencia" style="display: none">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Sector / Área :</strong></label>
                    <select name="exp_area2" class="form-control ">
                        <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->nom_area }}"
                            {{ $area->nom_area == $competencia->exp_area2 ? 'selected' : '' }}>
                            {{ $area->nom_area }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                <div class="form-group">
                    <label><strong>Tiempo (Años):</strong></label>
                    <select name="tiempo2" class="form-control ">
                        <option value="" selected="true" disabled="disabled"> Seleccione Cantidad..</option>
                        <option value="< 3 Años" @if($competencia->tiempo2 == '< 3 Años') selected  @endif >< 3 Años</option>
                        <option value="3 a 5 Años" @if($competencia->tiempo2 == '3 a 5 Años') selected  @endif >3 a 5 Años</option>
                        <option value="5 a 10 Años" @if($competencia->tiempo2 == '5 a 10 Años') selected  @endif >5 a 10 Años</option>
                        <option value="> 10 Años" @if($competencia->tiempo2 == '> 10 Años') selected  @endif >> 10 Años</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-info btn-sm" onclick="mostrar_ocultar_exp2()">+</button>
            </div>
        </div>
        <div class="row" id="experiencia2" style="display: none">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Sector / Área :</strong></label>
                    <select name="exp_area3" class="form-control ">
                        <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->nom_area }}"
                            {{ $area->nom_area == $competencia->exp_area3 ? 'selected' : '' }}>
                            {{ $area->nom_area }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Tiempo (Años):</strong></label>
                    <select name="tiempo3" class="form-control ">
                        <option value="" selected="true" disabled="disabled"> Seleccione Cantidad..</option>
                        <option value="< 3 Años" @if($competencia->tiempo3 == '< 3 Años') selected  @endif >< 3 Años</option>
                        <option value="3 a 5 Años" @if($competencia->tiempo3 == '3 a 5 Años') selected  @endif >3 a 5 Años</option>
                        <option value="5 a 10 Años" @if($competencia->tiempo3 == '5 a 10 Años') selected  @endif >5 a 10 Años</option>
                        <option value="> 10 Años" @if($competencia->tiempo3 == '> 10 Años') selected  @endif >> 10 Años</option>
                    </select>

                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <div class="form-group">
                    <label><strong>Descripción:</strong></label>
                    <textarea name="descripcion" rows="2" cols="130" required="true">{{$competencia->descripcion}}</textarea>
                </div>
            </div>
        </div>
        <br>
        <h5>Decisiones</h5>
        <hr>
        <script>
            function mos_des() {
                document.getElementById("decisiones").style.display = "flex";
            }

            function ocul_des() {
                document.getElementById("decisiones").style.display = "none";
            }

            function mos_ocul_des() {
                var caja = document.getElementById("decisiones");
                if (caja.style.display == "none") {
                    mos_des();
                } else {
                    ocul_des();
                }
            }

            function mos_des2() {
                document.getElementById("decisiones2").style.display = "flex";
            }

            function ocul_des2() {
                document.getElementById("decisiones2").style.display = "none";
            }

            function mos_ocul_des2() {
                var caja = document.getElementById("decisiones2");
                if (caja.style.display == "none") {
                    mos_des2();
                } else {
                    ocul_des2();
                }
            }

            function mos_des3() {
                document.getElementById("decisiones3").style.display = "flex";
            }

            function ocul_des3() {
                document.getElementById("decisiones3").style.display = "none";
            }

            function mos_ocul_des3() {
                var caja = document.getElementById("decisiones3");
                if (caja.style.display == "none") {
                    mos_des3();
                } else {
                    ocul_des3();
                }
            }

        </script>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Compartidas:</strong></label>
                    <input type="text" name="compartida1" class="form-control" required  value="{{$competencia->compartida1}}">
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label><strong> Área :</strong></label>
                    <select name="dec_area1" class="form-control " required>
                        <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->nom_area }}"
                            {{ $area->nom_area == $competencia->dec_area1 ? 'selected' : '' }}>
                            {{ $area->nom_area }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Autonomas:</strong></label>
                    <input type="text" name="autonoma1" class="form-control"  value="{{$competencia->autonoma1}}" required>
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-info btn-sm" onclick="mos_ocul_des()">+</button>
            </div>
        </div>
        <div class="row" id="decisiones" style="display: none">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Compartidas:</strong></label>
                    <input type="text" name="compartida2" class="form-control" value="{{$competencia->compartida2}}" >
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label><strong> Área :</strong></label>
                    <select name="dec_area2" class="form-control ">
                        <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->nom_area }}"
                            {{ $area->nom_area == $competencia->dec_area2 ? 'selected' : '' }}>
                            {{ $area->nom_area }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Autonomas:</strong></label>
                    <input type="text" name="autonoma2" class="form-control" value="{{$competencia->autonoma2}}">
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-info btn-sm" onclick="mos_ocul_des2()">+</button>
            </div>
        </div>
        <div class="row" id="decisiones2" style="display: none">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Compartidas:</strong></label>
                    <input type="text" name="compartida3" value="{{$competencia->compartida3}}" class="form-control">
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
                <div class="form-group">
                    <label><strong> Área :</strong></label>
                    <select name="dec_area3" class="form-control ">
                        <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->nom_area }}"
                            {{ $area->nom_area == $competencia->dec_area3 ? 'selected' : '' }}>
                            {{ $area->nom_area }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Autonomas:</strong></label>
                    <input type="text" name="autonoma3" class="form-control" value="{{$competencia->autonoma3}}" >
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-info btn-sm" onclick="mos_ocul_des3()">+</button>
            </div>
        </div>
        <div class="row" id="decisiones3" style="display: none">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Compartidas:</strong></label>
                    <input type="text" name="compartida4" class="form-control">
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong> Área :</strong></label>
                    <select name="dec_area4" class="form-control ">
                        <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->nom_area }}"
                            {{ $area->nom_area == $competencia->dec_area4 ? 'selected' : '' }}>
                            {{ $area->nom_area }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <div class="form-group">
                    <label><strong>Autonomas:</strong></label>
                    <input type="text" name="autonoma4" class="form-control" value="{{$competencia->autonoma4}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Técnicas:</strong></label>
                    <textarea name="tecnica" rows="2" cols="65" required="true">{{$competencia->tecnica}}</textarea>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Especiales:</strong></label>
                    <textarea name="especial" rows="2" cols="70" required="true">{{$competencia->especial}}</textarea>
                </div>
            </div>
        </div>
        <br>
        <h5>Relaciones Internas</h5>
        <hr>
        <script>
            function mos_int() {
                document.getElementById("internas").style.display = "flex";
            }

            function ocul_int() {
                document.getElementById("internas").style.display = "none";
            }

            function mos_ocul_int() {
                var caja = document.getElementById("internas");
                if (caja.style.display == "none") {
                    mos_int();
                } else {
                    ocul_int();
                }
            }

            function mos_int2() {
                document.getElementById("internas2").style.display = "flex";
            }

            function ocul_int2() {
                document.getElementById("internas2").style.display = "none";
            }

            function mos_ocul_int2() {
                var caja = document.getElementById("internas2");
                if (caja.style.display == "none") {
                    mos_int2();
                } else {
                    ocul_int2();
                }
            }

        </script>
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                <div class="form-group">
                    <label><strong>Área:</strong></label>
                    <select name="int_area1" class="form-control " required>
                        <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->nom_area }}"
                            {{ $area->nom_area == $competencia->int_area1 ? 'selected' : '' }}>
                            {{ $area->nom_area }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Objetivos:</strong></label>
                    <input type="text" name="int_objetivo1" class="form-control" required value="{{$competencia->int_objetivo1}}" >
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-info btn-sm" onclick="mos_ocul_int()">+</button>
            </div>
        </div>
        <div class="row" id="internas" style="display: none">
            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                <div class="form-group">
                    <label><strong>Área:</strong></label>
                    <select name="int_area2" class="form-control ">
                        <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->nom_area }}"
                            {{ $area->nom_area == $competencia->int_area2 ? 'selected' : '' }}>
                            {{ $area->nom_area }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Objetivos:</strong></label>
                    <input type="text" name="int_objetivo2" class="form-control" value="{{$competencia->int_objetivo2}}">
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-info btn-sm" onclick="mos_ocul_int2()">+</button>
            </div>
        </div>
        <div class="row" id="internas2" style="display: none">
            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                <div class="form-group">
                    <label><strong>Área:</strong></label>
                    <select name="int_area3" class="form-control ">
                        <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->nom_area }}"
                            {{ $area->nom_area == $competencia->int_area3 ? 'selected' : '' }}>
                            {{ $area->nom_area }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Objetivos:</strong></label>
                    <input type="text" name="int_objetivo3" class="form-control" value="{{$competencia->int_objetivo3}}">
                </div>
            </div>
        </div>
        <br>
        <h5>Relaciones Externas</h5>
        <hr>
        <script>
            function mos_ext() {
                document.getElementById("externas").style.display = "flex";
            }

            function ocul_ext() {
                document.getElementById("externas").style.display = "none";
            }

            function mos_ocul_ext() {
                var caja = document.getElementById("externas");
                if (caja.style.display == "none") {
                    mos_ext();
                } else {
                    ocul_ext();
                }
            }

            function mos_ext2() {
                document.getElementById("externas2").style.display = "flex";
            }

            function ocul_ext2() {
                document.getElementById("externas2").style.display = "none";
            }

            function mos_ocul_ext2() {
                var caja = document.getElementById("externas2");
                if (caja.style.display == "none") {
                    mos_ext2();
                } else {
                    ocul_ext2();
                }
            }

        </script>
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                <div class="form-group">
                    <label><strong>Área:</strong></label>
                    <select name="ext_area1" class="form-control " required>
                        <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->nom_area }}"
                            {{ $area->nom_area == $competencia->ext_area1 ? 'selected' : '' }}>
                            {{ $area->nom_area }}</option>
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Objetivos:</strong></label>
                    <input type="text" name="ext_objetivo1" class="form-control" required value="{{$competencia->ext_objetivo1}}">
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-info btn-sm" onclick="mos_ocul_ext()">+</button>
            </div>
        </div>
        <div class="row" id="externas" style="display: none">
            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                <div class="form-group">
                    <label><strong>Área:</strong></label>
                    <select name="ext_area2" class="form-control ">
                        <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->nom_area }}"
                            {{ $area->nom_area == $competencia->ext_area2 ? 'selected' : '' }}>
                            {{ $area->nom_area }}</option>
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Objetivos:</strong></label>
                    <input type="text" name="ext_objetivo2" class="form-control" value="{{$competencia->ext_objetivo2}}">
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-info btn-sm" onclick="mos_ocul_ext2()">+</button>
            </div>
        </div>
        <div class="row" id="externas2" style="display: none">
            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
                <div class="form-group">
                    <label><strong>Área:</strong></label>
                    <select name="ext_area3" class="form-control ">
                        <option value="" selected="true" disabled="disabled"> Seleccione Area..</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->nom_area }}"
                            {{ $area->nom_area == $competencia->ext_area3 ? 'selected' : '' }}>
                            {{ $area->nom_area }}</option>
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <div class="form-group">
                    <label><strong>Objetivos:</strong></label>
                    <input type="text" name="ext_objetivo3" class="form-control" value="{{$competencia->ext_objetivo3}}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <div class="form-group">
                    <label><strong>Actividades Transversales:</strong></label>
                    <textarea name="actividades" rows="5" cols="120" required="true">{{$competencia->actividades}}</textarea>
                </div>
            </div>
        </div>


    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
    {!!Form::close()!!}
    <br>

</div>




@endsection
