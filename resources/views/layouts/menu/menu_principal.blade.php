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
          <ul class="br-menu-sub">
          
            <li class="sub-item"><a href="{{ URL::to('control_ususarios/users') }}"         class="sub-link">Usuarios</a></li>          
            <li class="sub-item"><a href="{{ route('Mod_Parametrizacion::parm_empresa') }}" class="sub-link">Empresas</a></li>          
            <li class="sub-item"><a href="{{ URL::to('parm_datos_corportativo') }}"         class="sub-link">Datos Corporativos</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_areas') }}"                      class="sub-link">Areas</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_cargo') }}"                      class="sub-link">Cargos</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_usuarios') }}"                   class="sub-link">Usuarios Cliente</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_proceso') }}"                    class="sub-link">Procesos</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_documento_index') }}"            class="sub-link">Documentos</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_sistema_gestion') }}"            class="sub-link">Sistema de Gestión</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_usuarios_camb') }}"              class="sub-link">Cambiar Usuario-Empresa</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_origen_anomalia') }}"            class="sub-link">Origen de anomalÍa</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_proveedor') }}"                  class="sub-link">Proveedores</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_producto') }}"                   class="sub-link">Productos</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_criticidad') }}"                 class="sub-link">Identificar Criticidad</a></li>
            <li class="sub-item"><a href="{{ URL::to('calificacion_proveedores') }}"        class="sub-link">Calificacion Proveedor</a></li>
            <li class="sub-item"><a href="{{ URL::to('criterios_calificacion') }}"        class="sub-link">Criterios de calificación</a></li>
          
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-contact tx-24"></i>
            <span class="menu-item-label">Contexto</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ URL::to('contexto_index') }}"      class="sub-link">Contexto</a></li>
            <li class="sub-item"><a href="{{ URL::to('partes_interesadas') }}"  class="sub-link">Partes Interesadas</a></li>
            <li class="sub-item"><a href="{{ URL::To('alcance') }}"             class="sub-link">Alcance</a></li>
            <li class="sub-item"><a href="{{ URL::to('mapa_proceso') }}"        class="sub-link">Procesos</a></li>
          </ul>
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon  ion-person-stalker tx-24"></i>
            <span class="menu-item-label">Liderazgo</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ URL::to('politica') }}"          class="sub-link">Politica</a></li>
            <li class="sub-item"><a href="{{ URL::to('roles_responsabilidades') }}"          class="sub-link">Roles y Responsabilidades</a></li>
            <li class="sub-item"><a href="{{ URL::to('parm_presupuesto') }}"  class="sub-link">Presupuesto</a></li>
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
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ URL::to('matriz_riesgos') }}" class="sub-link">Matriz de Riesgos</a></li>
            <li class="sub-item"><a href="{{ URL::to('politicas_vs_objetivos') }}" class="sub-link">Objetivo e Indicadores</a></li>
            <li class="sub-item"><a href="{{ URL::to('planificardor_cambio_procesos') }}" class="sub-link">Planificacion de Cambios</a></li>
          </ul>
        </li><!-- br-menu-item -->
         <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon  ion-clipboard tx-24"></i>
            <span class="menu-item-label">Apoyo</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="navigation.html" class="sub-link">Recursos</a></li>
            <li class="sub-item"><a href="navigation.html" class="sub-link">Competencias</a></li>
            <li class="sub-item"><a href="navigation.html" class="sub-link">Toma de Conciencia</a></li>
            <li class="sub-item"><a href="navigation.html" class="sub-link">Comunicacion</a></li>
            <li class="sub-item"><a href="navigation.html" class="sub-link">Informacion Documentada</a></li>
          </ul>
        </li><!-- br-menu-item -->
         <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon  ion-clipboard tx-24"></i>
            <span class="menu-item-label">Planeacion</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="navigation.html" class="sub-link">Planeacion y control</a></li>
            <li class="sub-item"><a href="navigation.html" class="sub-link">Productos y Servicios</a></li>
            <li class="sub-item"><a href="navigation.html" class="sub-link">Diseño y Desarrollo</a></li>
            <li class="sub-item"><a href="navigation.html" class="sub-link">Producto y Servicios</a></li>
            <li class="sub-item"><a href="navigation.html" class="sub-link">Produccion y Prevision</a></li>
            <li class="sub-item"><a href="navigation.html" class="sub-link">Liberacion de los productos</a></li>
            <li class="sub-item"><a href="navigation.html" class="sub-link">Salidas no Conformes</a></li>
          </ul>
        </li><!-- br-menu-item -->
         <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon  ion-clipboard tx-24"></i>
            <span class="menu-item-label">Evaluacion Desempeño</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="navigation.html" class="sub-link">Seguimiento Medicion</a></li>
            <li class="sub-item"><a href="navigation.html" class="sub-link">Auditoria Interna</a></li>
            <li class="sub-item"><a href="navigation.html" class="sub-link">Revision por la Direccion</a></li>
          </ul>
        </li><!-- br-menu-item -->
         <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
           <i class="menu-item-icon  ion-clipboard tx-24"></i>
            <span class="menu-item-label">Mejora</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ URL::to('anomalia') }}" class="sub-link">Anomalia</a></li>
           <!--  <li class="sub-item"><a href="navigation.html" class="sub-link">Matricula</a></li>
           <li class="sub-item"><a href="navigation.html" class="sub-link"> Notas de Competencia</a></li>
           <li class="sub-item"><a href="navigation.html" class="sub-link"> Notas de Diciplina</a></li>
           <li class="sub-item"><a href="navigation.html" class="sub-link"> Notas de Curso</a></li>
           <li class="sub-item"><a href="navigation.html" class="sub-link">Llamadas de Atenciaon</a></li>
           <li class="sub-item"><a href="navigation.html" class="sub-link">Hoja de Vida del Estudante</a></li> -->
          </ul>
        </li><!-- br-menu-item -->
         <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub {{ Request::is('indicadores*') ? 'active' : '' }}">
            <i class="ion-ios-pulse-strong tx-24"></i>
             <span class="menu-item-label">Sgto. y Medición</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub" style="display: {{ Request::is('indicadores*') ? 'block' : 'none' }}">
            <li class="sub-item {{ Request::is('indicadores*') ? 'active' : '' }}">
                <a href="{{ URL::to('indicadores') }}" class="sub-link {{ Request::is('indicadores*') ? 'active' : '' }}">Indicadores</a></li>
          </ul>
        </li><!-- br-menu-item -->
      </ul><!-- br-sideleft-menu -->



      <br>
    </div><!-- br-sideleft -->
