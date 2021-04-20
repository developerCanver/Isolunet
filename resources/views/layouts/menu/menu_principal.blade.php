<div class="br-sideleft sideleft-scrollbar">

      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{ URL::to('/') }}" class="br-menu-link {{ Request::is('/') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-settings tx-20"></i>
            <span class="menu-item-label">Parametrizacion</span>
          </a><!-- br-menu-link -->
          @php
          $Parametrizacion='';
          if ( request()->is('control_ususarios*') || 
          request()->is('parm_empresa*') || 
          request()->is('parm_datos_corportativo*') || 
          request()->is('parm_areas*') || 
          request()->is('parm_cargo*') || 
          request()->is('parm_usuarios*') || 
          request()->is('parm_proceso*') || 
          request()->is('parm_documento_index*') || 
          request()->is('parm_sistema_gestion*') || 
          request()->is('parm_usuarios_camb*') || 
          request()->is('parm_origen_anomalia*') || 
          request()->is('parm_proveedor*') || 
          request()->is('parm_producto*') || 
        
          request()->is('edit_empresa*') ||  
          request()->is('edit_empresa*')  
          ||  request()->is('edit_parm_areas*')
          ||  request()->is('edit_parm_cargos*')
          ||  request()->is('parm_documento_edit*')
          ||  request()->is('parm_edit_sistema_gestion*')
          ||  request()->is('edit_parm_proveedor*')
          ||  request()->is('edit_parm_producto*')
           ) {
            $Parametrizacion="style=display:block;";
              }
          @endphp
          <ul class="br-menu-sub" {{$Parametrizacion}} >          
            <li class="sub-item"><a href="{{ URL::to('control_ususarios/users') }}"         class="sub-link {{ request()->is('control_ususarios/users*') ? 'active' : ''}}">Usuarios</a></li>          
            <li class="sub-item"><a href="{{ route('Mod_Parametrizacion::parm_empresa') }}" class="sub-link {{ request()->is('parm_empresa*') || request()->is('edit_empresa*') ? 'active' : ''}}">Empresas</a></li>          
            <li class="sub-item"><a href="{{ URL::to('parm_datos_corportativo') }}"         class="sub-link {{ request()->is('parm_datos_corportativo*') ? 'active' : ''}}">Datos Corporativos</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_areas') }}"                      class="sub-link {{ request()->is('parm_areas*') ||  request()->is('edit_parm_areas*') ? 'active' : ''}}">Areas</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_cargo') }}"                      class="sub-link {{ request()->is('parm_cargo*') ||  request()->is('edit_parm_cargos*') ? 'active' : ''}}">Cargos</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_usuarios') }}"                   class="sub-link {{ request()->is('parm_usuarios*') ? 'active' : ''}}">Usuarios Cliente</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_proceso') }}"                    class="sub-link {{ request()->is('parm_proceso*') ? 'active' : ''}}">Procesos</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_documento_index') }}"            class="sub-link {{ request()->is('parm_documento_index*') ||  request()->is('parm_documento_edit*') ? 'active' : ''}}">Documentos</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_sistema_gestion') }}"            class="sub-link {{ request()->is('parm_sistema_gestion*') ||  request()->is('parm_edit_sistema_gestion*') ? 'active' : ''}}">Sistema de Gestión</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_usuarios_camb') }}"              class="sub-link {{ request()->is('parm_usuarios_camb*') ? 'active' : ''}}">Cambiar Usuario-Empresa</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_origen_anomalia') }}"            class="sub-link {{ request()->is('parm_origen_anomalia*') ? 'active' : ''}}">Origen de anomalÍa</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_proveedor') }}"                  class="sub-link {{ request()->is('parm_proveedor*')  ||  request()->is('edit_parm_proveedor*') ? 'active' : ''}}">Proveedores</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_producto') }}"                   class="sub-link {{ request()->is('parm_producto*') ||  request()->is('edit_parm_producto*') ? 'active' : ''}}">Productos</a></li>

          
          </ul>
        </li>
        <li class="br-menu-item ">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-contact tx-24"></i>
            <span class="menu-item-label " >Contexto</span>
          </a><!-- br-menu-link -->
          @php
          $contexto='';
              if (request()->is('contexto_index') || request()->is('partes_interesadas') || request()->is('alcance') || request()->is('mapa_proceso') || request()->is('contexto_tendencias_en_colombia') || request()->is('contexto_analisis_pestal') 
              || request()->is('contexto_dofa') || request()->is('estrategias') || request()->is('matriz_dofa')  ) {
                $contexto="style=display:block;";
              }
          @endphp
          <ul class="br-menu-sub" {{$contexto}}  >
            <li class="sub-item active"><a href="{{ URL::to('contexto_index') }}"   class="sub-link {{ request()->is('contexto_index') || request()->is('contexto_tendencias_en_colombia') || request()->is('contexto_analisis_pestal') 
            || request()->is('contexto_dofa') || request()->is('estrategias') || request()->is('matriz_dofa')  ? 'active' : ''}}">Cuestiones Externas e Internas</a></li>
            <li class="sub-item"><a href="{{ URL::to('partes_interesadas') }}"      class="sub-link {{ request()->is('partes_interesadas') ? 'active' : ''}}">Partes Interesadas</a></li>
            <li class="sub-item"><a href="{{ URL::To('alcance') }}"                 class="sub-link {{ request()->is('alcance') ? 'active' : ''}}">Alcance</a></li>
            <li class="sub-item"><a href="{{ URL::to('mapa_proceso') }}"            class="sub-link {{ request()->is('mapa_proceso') ? 'active' : ''}}">Procesos</a></li>
        
          </ul>
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon  ion-person-stalker tx-24"></i>
            <span class="menu-item-label">Liderazgo</span>
          </a><!-- br-menu-link -->
          @php
          $Liderazgo='';
              if (request()->is('politica') || request()->is('roles_responsabilidades') 
              || request()->is('parm_presupuesto') || request()->is('responsabilid*') || request()->is('ingreso*') || request()->is('egreso*')   ) {
                $Liderazgo="style=display:block;";
              }
          @endphp
          <ul class="br-menu-sub"  {{$Liderazgo}}>
            <li class="sub-item"><a href="{{ URL::to('politica') }}"                 class="sub-link {{ request()->is('politica') ? 'active' : ''}}">Politica</a></li>
            <li class="sub-item"><a href="{{ URL::to('roles_responsabilidades') }}"  class="sub-link {{ request()->is('roles_responsabilidades') || request()->is('responsabilid*') ? 'active' : ''}}">Roles y Responsabilidades</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_presupuesto') }}"         class="sub-link {{ request()->is('parm_presupuesto') || request()->is('egreso*')  || request()->is('ingreso*')  ? 'active' : ''}}">Presupuesto</a></li>
            {{-- <li class="sub-item"><a href="navigation.html"               class="sub-link"> Notas de Competencia</a></li> --}}
            {{-- <li class="sub-item"><a href="navigation.html"               class="sub-link"> Notas de Diciplina</a></li> --}}
            {{-- <li class="sub-item"><a href="navigation.html"               class="sub-link"> Notas de Curso</a></li> --}}
            {{-- <li class="sub-item"><a href="navigation.html"               class="sub-link">Llamadas de Atenciaon</a></li> --}}
            {{-- <li class="sub-item"><a href="navigation.html"               class="sub-link">Hoja de Vida del Estudante</a></li> --}}
          </ul>       
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon  ion-clipboard tx-24"></i>
            <span class="menu-item-label">Planificacion</span>
          </a><!-- br-menu-link -->
          @php
          $Planificacion='';
              if (request()->is('matriz_riesgos*')  || request()->is('planificardor_cambio*') || request()->is('diseno_desarrollo*') || request()->is('politica_vs_objetivo*') || request()->is('politicas_vs_objetivos') || request()->is('planificardor_cambio_procesos')  || request()->is('riesgo_oportuno*')   ) {
                $Planificacion="style=display:block;";
              }
          @endphp

          <ul class="br-menu-sub" {{$Planificacion}}>
            <li class="sub-item"><a href="{{ URL::to('matriz_riesgos') }}"                class="sub-link {{ request()->is('matriz_riesgos*') || request()->is('riesgo_oportuno*') ? 'active' : ''}}">Matriz de Riesgos</a></li>
            <li class="sub-item"><a href="{{ URL::to('politicas_vs_objetivos') }}"        class="sub-link {{ request()->is('politicas_vs_objetivos') || request()->is('politica_vs_objetivo*') ? 'active' : ''}}">Objetivo e Indicadores</a></li>
            <li class="sub-item"><a href="{{ URL::to('planificardor_cambio_procesos') }}" class="sub-link {{ request()->is('planificardor_cambio_procesos') || request()->is('planificardor_cambio*') ? 'active' : ''}}">Planificacion de Cambios</a></li>
            <li class="sub-item"><a href="{{ URL::to('diseno_desarrollo') }}"   class="sub-link {{ request()->is('diseno_desarrollo*') ? 'active' : '' }} ">Aspectos e Impactos
            </a></li>
          </ul>
        </li><!-- br-menu-item -->
         <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon  ion-clipboard tx-24"></i>
            <span class="menu-item-label">Apoyo</span>
          </a><!-- br-menu-link -->
          @php
          $Apoyo='';
              if (request()->is('recursosApp') || request()->is('recursosverimg') || request()->is('competencia*')
               || request()->is('tomaconsecuencia*') || request()->is('comunicaciones*') 
               || request()->is('competencia_rendicion*') || request()->is('informacion*') 
               || request()->is('info_editar*')  ) {
                $Apoyo="style=display:block;";
              }
          @endphp 
          <ul class="br-menu-sub" {{$Apoyo}}>
            <li class="sub-item"><a href="{{ URL::to('recursosApp') }}"      class="sub-link {{ request()->is('recursosApp') || request()->is('recursosverimg')  ? 'active' : ''}} ">Recursos</a></li>
            <li class="sub-item"><a href="{{ URL::to('competencia') }}"      class="sub-link {{ request()->is('competencia*') ? 'active' : ''}}">Competencias</a></li>
            <li class="sub-item"><a href="{{ URL::to('tomaconsecuencia') }}" class="sub-link {{ request()->is('tomaconsecuencia*') ? 'active' : ''}}">Toma de Conciencia</a></li>
            <li class="sub-item"><a href="{{ URL::to('comunicaciones') }}"   class="sub-link {{ request()->is('comunicaciones*')  || request()->is('competencia_rendicion*')? 'active' : ''}}">Comunicacion</a></li>
            <li class="sub-item"><a href="{{ URL::to('informacion') }}"      class="sub-link {{ request()->is('informacion*') || request()->is('info_editar*')  ? 'active' : '' }} ">Informacion Documentada</a></li>
          </ul>
        </li><!-- br-menu-item -->
         <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon  ion-clipboard tx-24"></i>
            <span class="menu-item-label">Operación</span>
          </a><!-- br-menu-link -->
          @php
          $Operación='';
          $pdn='collapsed text-truncate';
              if (request()->is('planeacio_control*') || request()->is('productos_servicios*') 
              || request()->is('producto_servicio*')  || request()->is('parm_criticidad*') 
              || request()->is('calificacion_proveedores*') || request()->is('criterios_calificacion*') 
              || request()->is('liberacion*') || request()->is('salida_no_conforme*') || request()->is('edit_parm_criticidad*') 
              || request()->is('edit_calificacion_proveedores*') || request()->is('edit_criterios_calificacion*') 
              || request()->is('trazabilidad*') || request()->is('servicio_prestado*')  ) {
                $Operación="style=display:block;";
                $pdn='nav-link text-truncate';
              }
              if (request()->is('trazabilidad*')   ) {
               
                $pdn='nav-link text-truncate';
              }

          @endphp 

          <ul class="br-menu-sub" {{$Operación}}>
            <li class="sub-item"><a href="{{ URL::to('planeacio_control') }}"   class="sub-link {{ request()->is('planeacio_control*') ? 'active' : '' }} ">Planeacion y control</a></li>
            <li class="sub-item"><a href="{{ URL::to('productos_servicios') }}" class="sub-link {{ request()->is('productos_servicios*') ? 'active' : '' }} ">Productos y Servicios</a></li>
           
            <li class="sub-item"><a href="{{ URL::to('producto_servicio') }}"   class="sub-link {{ request()->is('producto_servicio*') ? 'active' : '' }} ">Insumos y Servicios</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_criticidad') }}"                 class="sub-link {{ request()->is('parm_criticidad*') || request()->is('edit_parm_criticidad*')  ? 'active' : ''}}">Identificar Criticidad</a></li>
            <li class="sub-item"><a href="{{ URL::to('calificacion_proveedores') }}"        class="sub-link {{ request()->is('calificacion_proveedores*') || request()->is('edit_calificacion_proveedores*')  ? 'active' : ''}}">Calificacion Proveedor</a></li>
            <li class="sub-item"><a href="{{ URL::to('criterios_calificacion') }}"          class="sub-link {{ request()->is('criterios_calificacion*') || request()->is('edit_criterios_calificacion*')  ? 'active' : ''}}">Criterios de calificación</a></li>
            
           
              <a style="color: #2c3363;" class="nav-link collapsed text-truncate {{$pdn}}" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-table"></i> <span class="d-none d-sm-inline">Pdn y Provisión
              </span></a>
              <div class="collapse" id="submenu1" aria-expanded="false">
                  <ul class="flex-column pl-2 nav">
                    <li class="sub-item"><a href="{{ URL::to('servicio_prestado') }}" class="sub-link {{ request()->is('servicio_prestado*')   ? 'active' : ''}}">Servicio Prestado
                    </a></li>
                    <li class="sub-item"><a href="{{ URL::to('trazabilidad') }}"  class="sub-link {{ request()->is('trazabilidad*')  ? 'active' : ''}}">Trazabilidad</a></li>
                      {{-- <li class="nav-item">
                          <a class="nav-link collapsed py-1" href="#submenu1sub1" data-toggle="collapse" data-target="#submenu1sub1"><span>Servicio Prestado
                          </span></a>
                          <div class="collapse" id="submenu1sub1" aria-expanded="false">
                              <ul class="flex-column nav pl-4">
                                  <li class="nav-item">
                                      <a class="nav-link p-1" href="#">
                                          <i class="fa fa-fw fa-clock-o"></i> Daily </a>
                                  </li>
                              </ul>
                          </div>
                      </li> --}}
                  </ul>
              </div>
              <li class="sub-item"><a href="{{ URL::to('liberacion') }}"          class="sub-link {{ request()->is('liberacion*') ? 'active' : '' }} ">Lib. Productos y Servicios</a></li>
              <li class="sub-item"><a href="{{ URL::to('salida_no_conforme') }}"  class="sub-link {{ request()->is('salida_no_conforme*') ? 'active' : '' }} ">Salidas no Conformes</a></li> <li class="nav-item">
           
          </ul>
        </li><!-- br-menu-item -->
         <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon  ion-clipboard tx-24"></i>
            <span class="menu-item-label">Evaluacion Desempeño</span>
          </a><!-- br-menu-link -->
          @php
          $Evaluacion='';
              if (request()->is('seguimiento_medicion*') || request()->is('auditoria*') 
              || request()->is('revision*') || request()->is('encuesta_satisfaccion*') 
              || request()->is('plantillas*') || request()->is('chequeo_auditoria*')
              || request()->is('fortalezas_opurtunidades*')|| request()->is('hallasgos*')
              || request()->is('indicadores*') ) {
                $Evaluacion="style=display:block;";
              }
          @endphp 
          <ul class="br-menu-sub" {{$Evaluacion}}>
            <li class="sub-item"><a href="{{ URL::to('seguimiento_medicion') }}" class="sub-link {{ request()->is('seguimiento_medicion*') || request()->is('encuesta_satisfaccion*') || request()->is('plantillas*')  ? 'active' : '' }} ">Seguimiento Medicion</a></li>
            <li class="sub-item"><a href="{{ URL::to('indicadores') }}"          class="sub-link {{ request()->is('indicadores*') ? 'active' : '' }}">Indicadores</a></li>
            <li class="sub-item"><a href="{{ URL::to('auditoria') }}"            class="sub-link {{ request()->is('auditoria*') || request()->is('chequeo_auditoria*')|| request()->is('fortalezas_opurtunidades*')|| request()->is('hallasgos*') ? 'active' : '' }} ">Auditoria Interna</a></li>
            <li class="sub-item"><a href="{{ URL::to('revision') }}"             class="sub-link {{ request()->is('revision*') ? 'active' : '' }} ">Revisión por la Dirección</a></li>
          </ul>
        </li><!-- br-menu-item -->
         <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
           <i class="menu-item-icon  ion-clipboard tx-24"></i>
            <span class="menu-item-label">Mejora</span>
          </a><!-- br-menu-link -->
          @php
          $Mejora='';
              if (request()->is('anomalia*') || request()->is('acta*') || request()->is('tareas_pendientes*') 
              || request()->is('causa_raiz*') || request()->is('acciones_correctivas*') || request()->is('lista_anomalia*')   ) {
                $Mejora="style=display:block;";
              }
          @endphp 
          <ul class="br-menu-sub" {{$Mejora}}>
            <li class="sub-item"><a href="{{ URL::to('anomalia') }}"         class="sub-link {{ request()->is('anomalia*') || request()->is('causa_raiz*') || request()->is('acciones_correctivas*') || request()->is('lista_anomalia*') ? 'active' : '' }} ">Anomalia</a></li>
           <li class="sub-item"><a href="{{ URL::to('acta') }}"              class="sub-link {{ request()->is('acta*') ? 'active' : '' }} ">Acta</a></li>
           <li class="sub-item"><a href="{{ URL::to('tareas_pendientes') }}" class="sub-link {{ request()->is('tareas_pendientes*') ? 'active' : '' }} "> Tareas pendientes</a></li>
            <!-- <li class="sub-item"><a href="navigation.html" class="sub-link"> Notas de Diciplina</a></li>
           <li class="sub-item"><a href="navigation.html" class="sub-link"> Notas de Curso</a></li>
           <li class="sub-item"><a href="navigation.html" class="sub-link">Llamadas de Atenciaon</a></li>
           <li class="sub-item"><a href="navigation.html" class="sub-link">Hoja de Vida del Estudante</a></li> -->
          </ul>
        </li><!-- br-menu-item -->
         {{-- <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub {{ Request::is('indicadores*') ? 'active' : '' }}">
            <i class="ion-ios-pulse-strong tx-24"></i>
             <span class="menu-item-label">Sgto. y Medición</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub" style="display: {{ Request::is('indicadores*') ? 'block' : 'none' }}">
            <li class="sub-item {{ Request::is('indicadores*') ? 'active' : '' }}">
                <a href="{{ URL::to('indicadores') }}" class="sub-link {{ Request::is('indicadores*') ? 'active' : '' }}">Indicadores</a></li>
          </ul>
        </li><!-- br-menu-item --> --}}
      </ul><!-- br-sideleft-menu -->



      <br>
    </div><!-- br-sideleft -->
