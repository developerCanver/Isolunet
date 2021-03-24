@extends('layouts.dashboard')

@Push('styles')
    <style>

    </style>
@endpush

@section('content')
@inject('sgcs', 'App\Services\SistemasGestion')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Seguimiento y Medición</a>
	  <span class="breadcrumb-item active">Indicadores</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon ion-ios-pulse-strong"></i>
	<div>
  		<h4>Indicadores</h4>
  		<p class="mg-b-0">Gestión de Indicadores</p>
	</div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="iso-section-wraper">

    <div class="container">

        @if ($errors)
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors -> all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        @endif

        <div class="row float-right">
            <button class="btn btn-success" data-toggle="modal" data-target="#mdlNuevoIndicador"><i class="fa fa-plus"></i> Nuevo</button>
        </div>
        <br>
        <div class="row mt-5">
            <center class="mt-5">
                <h3>En el momento no existen indicadores creados, para iniciar, presione el boton "Nuevo".</h3>
            </center>
        </div>

        <div class="row mt-5">

            <div class="table-wrapper">
                <table id="tbl_indicadores" class="table display responsive nowrap">
                  <thead>
                    <tr>
                      <th class="wd-15p">First name</th>
                      <th class="wd-15p">Last name</th>
                      <th class="wd-20p">Position</th>
                      <th class="wd-15p">Start date</th>
                      <th class="wd-10p">Salary</th>
                      <th class="wd-25p">E-mail</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger</td>
                      <td>Nixon</td>
                      <td>System Architect</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                      <td>t.nixon@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Garrett</td>
                      <td>Winters</td>
                      <td>Accountant</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                      <td>g.winters@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Ashton</td>
                      <td>Cox</td>
                      <td>Junior Technical Author</td>
                      <td>2009/01/12</td>
                      <td>$86,000</td>
                      <td>a.cox@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Cedric</td>
                      <td>Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>2012/03/29</td>
                      <td>$433,060</td>
                      <td>c.kelly@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Airi</td>
                      <td>Satou</td>
                      <td>Accountant</td>
                      <td>2008/11/28</td>
                      <td>$162,700</td>
                      <td>a.satou@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Brielle</td>
                      <td>Williamson</td>
                      <td>Integration Specialist</td>
                      <td>2012/12/02</td>
                      <td>$372,000</td>
                      <td>b.williamson@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Herrod</td>
                      <td>Chandler</td>
                      <td>Sales Assistant</td>
                      <td>2012/08/06</td>
                      <td>$137,500</td>
                      <td>h.chandler@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Rhona</td>
                      <td>Davidson</td>
                      <td>Integration Specialist</td>
                      <td>2010/10/14</td>
                      <td>$327,900</td>
                      <td>r.davidson@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Colleen</td>
                      <td>Hurst</td>
                      <td>Javascript Developer</td>
                      <td>2009/09/15</td>
                      <td>$205,500</td>
                      <td>c.hurst@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Sonya</td>
                      <td>Frost</td>
                      <td>Software Engineer</td>
                      <td>2008/12/13</td>
                      <td>$103,600</td>
                      <td>s.frost@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Jena</td>
                      <td>Gaines</td>
                      <td>Office Manager</td>
                      <td>2008/12/19</td>
                      <td>$90,560</td>
                      <td>j.gaines@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Quinn</td>
                      <td>Flynn</td>
                      <td>Support Lead</td>
                      <td>2013/03/03</td>
                      <td>$342,000</td>
                      <td>q.flynn@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Charde</td>
                      <td>Marshall</td>
                      <td>Regional Director</td>
                      <td>2008/10/16</td>
                      <td>$470,600</td>
                      <td>c.marshall@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Haley</td>
                      <td>Kennedy</td>
                      <td>Senior Marketing Designer</td>
                      <td>2012/12/18</td>
                      <td>$313,500</td>
                      <td>h.kennedy@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Tatyana</td>
                      <td>Fitzpatrick</td>
                      <td>Regional Director</td>
                      <td>2010/03/17</td>
                      <td>$385,750</td>
                      <td>t.fitzpatrick@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Michael</td>
                      <td>Silva</td>
                      <td>Marketing Designer</td>
                      <td>2012/11/27</td>
                      <td>$198,500</td>
                      <td>m.silva@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Paul</td>
                      <td>Byrd</td>
                      <td>Chief Financial Officer</td>
                      <td>2010/06/09</td>
                      <td>$725,000</td>
                      <td>p.byrd@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Gloria</td>
                      <td>Little</td>
                      <td>Systems Administrator</td>
                      <td>2009/04/10</td>
                      <td>$237,500</td>
                      <td>g.little@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Bradley</td>
                      <td>Greer</td>
                      <td>Software Engineer</td>
                      <td>2012/10/13</td>
                      <td>$132,000</td>
                      <td>b.greer@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Dai</td>
                      <td>Rios</td>
                      <td>Personnel Lead</td>
                      <td>2012/09/26</td>
                      <td>$217,500</td>
                      <td>d.rios@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Jenette</td>
                      <td>Caldwell</td>
                      <td>Development Lead</td>
                      <td>2011/09/03</td>
                      <td>$345,000</td>
                      <td>j.caldwell@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Yuri</td>
                      <td>Berry</td>
                      <td>Chief Marketing Officer</td>
                      <td>2009/06/25</td>
                      <td>$675,000</td>
                      <td>y.berry@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Caesar</td>
                      <td>Vance</td>
                      <td>Pre-Sales Support</td>
                      <td>2011/12/12</td>
                      <td>$106,450</td>
                      <td>c.vance@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Doris</td>
                      <td>Wilder</td>
                      <td>Sales Assistant</td>
                      <td>2010/09/20</td>
                      <td>$85,600</td>
                      <td>d.wilder@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Angelica</td>
                      <td>Ramos</td>
                      <td>Chief Executive Officer</td>
                      <td>2009/10/09</td>
                      <td>$1,200,000</td>
                      <td>a.ramos@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Gavin</td>
                      <td>Joyce</td>
                      <td>Developer</td>
                      <td>2010/12/22</td>
                      <td>$92,575</td>
                      <td>g.joyce@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Jennifer</td>
                      <td>Chang</td>
                      <td>Regional Director</td>
                      <td>2010/11/14</td>
                      <td>$357,650</td>
                      <td>j.chang@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Brenden</td>
                      <td>Wagner</td>
                      <td>Software Engineer</td>
                      <td>2011/06/07</td>
                      <td>$206,850</td>
                      <td>b.wagner@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Fiona</td>
                      <td>Green</td>
                      <td>Chief Operating Officer</td>
                      <td>2010/03/11</td>
                      <td>$850,000</td>
                      <td>f.green@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Shou</td>
                      <td>Itou</td>
                      <td>Regional Marketing</td>
                      <td>2011/08/14</td>
                      <td>$163,000</td>
                      <td>s.itou@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Michelle</td>
                      <td>House</td>
                      <td>Integration Specialist</td>
                      <td>2011/06/02</td>
                      <td>$95,400</td>
                      <td>m.house@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Suki</td>
                      <td>Burks</td>
                      <td>Developer</td>
                      <td>2009/10/22</td>
                      <td>$114,500</td>
                      <td>s.burks@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Prescott</td>
                      <td>Bartlett</td>
                      <td>Technical Author</td>
                      <td>2011/05/07</td>
                      <td>$145,000</td>
                      <td>p.bartlett@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Gavin</td>
                      <td>Cortez</td>
                      <td>Team Leader</td>
                      <td>2008/10/26</td>
                      <td>$235,500</td>
                      <td>g.cortez@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Martena</td>
                      <td>Mccray</td>
                      <td>Post-Sales support</td>
                      <td>2011/03/09</td>
                      <td>$324,050</td>
                      <td>m.mccray@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Unity</td>
                      <td>Butler</td>
                      <td>Marketing Designer</td>
                      <td>2009/12/09</td>
                      <td>$85,675</td>
                      <td>u.butler@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Howard</td>
                      <td>Hatfield</td>
                      <td>Office Manager</td>
                      <td>2008/12/16</td>
                      <td>$164,500</td>
                      <td>h.hatfield@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Hope</td>
                      <td>Fuentes</td>
                      <td>Secretary</td>
                      <td>2010/02/12</td>
                      <td>$109,850</td>
                      <td>h.fuentes@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Vivian</td>
                      <td>Harrell</td>
                      <td>Financial Controller</td>
                      <td>2009/02/14</td>
                      <td>$452,500</td>
                      <td>v.harrell@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Timothy</td>
                      <td>Mooney</td>
                      <td>Office Manager</td>
                      <td>2008/12/11</td>
                      <td>$136,200</td>
                      <td>t.mooney@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Jackson</td>
                      <td>Bradshaw</td>
                      <td>Director</td>
                      <td>2008/09/26</td>
                      <td>$645,750</td>
                      <td>j.bradshaw@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Olivia</td>
                      <td>Liang</td>
                      <td>Support Engineer</td>
                      <td>2011/02/03</td>
                      <td>$234,500</td>
                      <td>o.liang@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Bruno</td>
                      <td>Nash</td>
                      <td>Software Engineer</td>
                      <td>2011/05/03</td>
                      <td>$163,500</td>
                      <td>b.nash@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Sakura</td>
                      <td>Yamamoto</td>
                      <td>Support Engineer</td>
                      <td>2009/08/19</td>
                      <td>$139,575</td>
                      <td>s.yamamoto@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Thor</td>
                      <td>Walton</td>
                      <td>Developer</td>
                      <td>2013/08/11</td>
                      <td>$98,540</td>
                      <td>t.walton@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Finn</td>
                      <td>Camacho</td>
                      <td>Support Engineer</td>
                      <td>2009/07/07</td>
                      <td>$87,500</td>
                      <td>f.camacho@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Serge</td>
                      <td>Baldwin</td>
                      <td>Data Coordinator</td>
                      <td>2012/04/09</td>
                      <td>$138,575</td>
                      <td>s.baldwin@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Zenaida</td>
                      <td>Frank</td>
                      <td>Software Engineer</td>
                      <td>2010/01/04</td>
                      <td>$125,250</td>
                      <td>z.frank@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Zorita</td>
                      <td>Serrano</td>
                      <td>Software Engineer</td>
                      <td>2012/06/01</td>
                      <td>$115,000</td>
                      <td>z.serrano@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Jennifer</td>
                      <td>Acosta</td>
                      <td>Junior Javascript Developer</td>
                      <td>2013/02/01</td>
                      <td>$75,650</td>
                      <td>j.acosta@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Cara</td>
                      <td>Stevens</td>
                      <td>Sales Assistant</td>
                      <td>2011/12/06</td>
                      <td>$145,600</td>
                      <td>c.stevens@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Hermione</td>
                      <td>Butler</td>
                      <td>Regional Director</td>
                      <td>2011/03/21</td>
                      <td>$356,250</td>
                      <td>h.butler@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Lael</td>
                      <td>Greer</td>
                      <td>Systems Administrator</td>
                      <td>2009/02/27</td>
                      <td>$103,500</td>
                      <td>l.greer@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Jonas</td>
                      <td>Alexander</td>
                      <td>Developer</td>
                      <td>2010/07/14</td>
                      <td>$86,500</td>
                      <td>j.alexander@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Shad</td>
                      <td>Decker</td>
                      <td>Regional Director</td>
                      <td>2008/11/13</td>
                      <td>$183,000</td>
                      <td>s.decker@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Michael</td>
                      <td>Bruce</td>
                      <td>Javascript Developer</td>
                      <td>2011/06/27</td>
                      <td>$183,000</td>
                      <td>m.bruce@datatables.net</td>
                    </tr>
                    <tr>
                      <td>Donna</td>
                      <td>Snider</td>
                      <td>Customer Support</td>
                      <td>2011/01/25</td>
                      <td>$112,000</td>
                      <td>d.snider@datatables.net</td>
                    </tr>
                  </tbody>
                </table>
              </div>


        </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlNuevoIndicador" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="ion-ios-pulse-strong"></i> Nuevo indicador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="container-fluid">
            {{  Form::open(['action' => ['sgto_medicion\IndicadoresController@store'],'autocomplete'=>'off', 'method' => 'POST', 'files' => false]) }}

                {!! Form::token() !!}
                <div class="row">
                    <div class="col-md-6">
                        <label for="sgc">Sistema de Gestión:</label>
                        <select class="form-control {{ $errors->has('sgc_id') ? ' is-invalid' : '' }}" name="sgc" id="sgc" required>
                            @foreach($sgcs->get() as $index => $sgc)
                                <option value="{{ $index }}" {{ old('sgc_id') == $index ? 'selected' : '' }}>
                                    {{ $sgc }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="proceso">Proceso:</label>
                        <select data-old="{{ old('proceso_id') }}" name="proceso" id="proceso" required class="form-control{{ $errors->has('proceso_id') ? ' is-invalid' : '' }}"></select>
                        <h1 class="text-center"><i id="loadingProcesos" class="fa fa-spinner fa-spin" aria-hidden="true"></i></h1>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <label for="frecuencia">Frecuencia:</label>
                        <select class="form-control" name="frecuencia" id="frecuencia" required>
                            <option value="1">Mensual</option>
                            <option value="2">Bimestral</option>
                            <option value="2">Trimenstral</option>
                            <option value="2">Semestral</option>
                            <option value="2">Anual</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="freq_inicio">Frecuencia inicia desde:</label>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker10'>
                                <input type='text' name="freq_inicio" id="freq_inicio" class="form-control" required onclick="calendarioIconCall()"/>
                                <span id="calendarioIcon" class="input-group-addon" style="align-items: center; vertical-align: middle; margin: auto; height: 100%; padding: 10px;">
                                    <span class="fa fa-calendar">
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <label for="nombre_indicador">Nombre del Indicador:</label>
                        <input type="text" class="form-control" id="nombre_indicador" name="nombre_indicador" required>
                    </div>

                    <div class="col-md-6">
                        <label for="mejor_hacia">Mejor hacia:</label>
                        <select class="form-control" name="mejor_hacia" id="mejor_hacia" required>
                            <option value="1">Arriba</option>
                            <option value="2">Abajo</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <label for="titulo_eje_y">Título del Eje Y:</label>
                        <input type="text" class="form-control" id="titulo_eje_y" name="titulo_eje_y">
                    </div>

                    <div class="col-md-6">
                        <label for="decimales">Cantidad de Decimales:</label>
                        <input class="form-control" type="number" max="3" min="0" id="decimales" name="decimales">
                    </div>
                </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
      </div>
    </div>
    {!!Form::close()!!}
  </div>
</div>
@endsection


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">

    function calendarioIconCall() {
        $('#calendarioIcon').click();
    };

    $('#datetimepicker10').datetimepicker({
        viewMode: 'years',
        format: 'MM/YYYY'
    });

    $('.input-number').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g,'');
    });

    $('#tbl_indicadores').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });

</script>

<script>
    $(document).ready(function(){

        function loadProcesos() {
            var sgc_id = $('#sgc').val();
            if ($.trim(sgc_id) != '') {
                $('#proceso').hide(100);
                $('#loadingProcesos').show(100);
                $.get('procesos', {sgc_id: sgc_id}, function (procesos) {
                    var old = $('#proceso').data('old') != '' ? $('#proceso').data('old') : '';
                    $('#proceso').empty();
                    $('#proceso').append("<option value=''>Selecciona una Proceso</option>");
                    $.each(procesos, function (index, value) {
                        $('#proceso').append("<option value='" + index + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                    })
                });
                setInterval(()=> {
                    $('#loadingProcesos').hide(100);
                    $('#proceso').show(100);
                }, 800);
            }
        }
        loadProcesos();
        $('#loadingProcesos').hide(100);
        $('#sgc').on('change', loadProcesos);
    });

</script>
@endpush
