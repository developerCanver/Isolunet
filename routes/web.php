<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Parametrizacion\ProveedorController as Proveedor;
use App\Http\Controllers\Parametrizacion\InsumoController as Insumo;
use App\Http\Controllers\Parametrizacion\CriticidadController as Criticidad;
use App\Http\Controllers\Parametrizacion\CalificaionProveedorController as CalificaionProveedor;
use App\Http\Controllers\Parametrizacion\CriteroCalificacionController as CriteroCalificacion;
use App\Http\Controllers\Liderazgo\PoliticaController as Politica;
use App\Http\Controllers\Liderazgo\IngresoEgresoController as IngresoEgreso;
use App\Http\Controllers\Contexto\MapaProcesoController as MapaProceso;
use App\Http\Controllers\Liderazgo\IngresoController;
use App\Http\Controllers\Liderazgo\EgresoController as Egreso;
use App\Http\Controllers\Liderazgo\MatrizRolesController as MatrizRoles;
use App\Http\Controllers\Liderazgo\ResponsabilidadesController as Responsabilidades;
use App\Http\Controllers\Planificacion\RiesgosController as Riesgos;
use App\Http\Controllers\Planificacion\RiesgosOportunoController as RiesgosOportuno;
use App\Http\Controllers\Planificacion\RiesgosOportunoReeController as RiesgosOportunoRee;
use App\Http\Controllers\Planificacion\CambioController;
use App\Http\Controllers\Planificacion\PoliticaVSObjetivosController as PoliticaVSObjetivos;
use App\Http\Controllers\Apoyo\CompetenciaController as Competencia;
use App\Http\Controllers\Apoyo\RecursosController as Recursos;
use App\Http\Controllers\Apoyo\ComunicacionesController as Comunicaciones;
use App\Http\Controllers\Apoyo\InformacionController as Informacion;
use App\Http\Controllers\Apoyo\TomaConsecuenciaController as TomaConsecuencia;
use App\Http\Controllers\Planeacion\ProductoServicioController as ProductoServicio;
use App\Http\Controllers\Planeacion\PrestamoController as Prestamo;
use App\Http\Controllers\Evaluacion\RevisionController as Revision;





Route::get('/', function () {
    return view('welcome');
});

 //PLANEACION 0 Operacion
Route::resource('/productos_servicios',    'Planeacion\RequisitosController');
Route::resource('/planeacio_control',      'Planeacion\PlaneacioControlController');
Route::resource('/producto_servicio',      'Planeacion\ProductoServicioController');
Route::get('insumos',                      [ProductoServicio::class, 'getInsumos']);
Route::resource('/diseno_desarrollo',      'Planeacion\DisenoController');
Route::resource('/liberacion',             'Planeacion\LiberacionController');
Route::resource('/trazabilidad',           'Planeacion\TrazabilidadController');
Route::resource('/salida_no_conforme',     'Planeacion\SalidasController');
Route::resource('/servicio_prestado',      'Planeacion\PrestamoController');
Route::get('/servicio_prestado_img',       [Prestamo::class, 'ver_img']);

//Evaluacion
Route::resource('/auditoria',     'Evaluacion\AuditoriaController');
Route::resource('/chequeo_auditoria',     'Evaluacion\ChequeoController');
Route::resource('/fortalezas_opurtunidades',     'Evaluacion\FortalesasOportunidadesController');
Route::resource('/hallasgos',     'Evaluacion\HallazgosController');
Route::resource('/revision',     'Evaluacion\RevisionController');
//Route::get('revision_delete/{id}',  [Revision::class, 'destroy_user']);
Route::get('revision_delete/{id}/{tipo}/', [
    'as' => 'revision_delete',
    'uses' => 'Evaluacion\RevisionController@destroy_user',
]);

Route::resource('/seguimiento_medicion',     'Evaluacion\SeguimientoController');
Route::resource('/encuesta_satisfaccion',     'Evaluacion\EncuestaController');
Route::resource('/plantillas',     'Evaluacion\PlantillaController');


//APOYO

//***********************informacion*************************** */
Route::resource('/informacion',     'Apoyo\InformacionController');

//***enavando dos variables para eñiminar y cargar tipo de informacion */
Route::get('informacion_delete/{id}/{tipo}/', [
    'as' => 'informacion_delete',
    'uses' => 'Apoyo\InformacionController@destroy_info',
]);
Route::get('info_editar/{id}/{tipo}/', [
    'as' => 'info_editar',
    'uses' => 'Apoyo\InformacionController@info_editar',
]);
Route::post('actualizar_info/{id}', 	   [Informacion::class, 'actualizar_info']);

//***********************comunicaciones*************************** */
Route::resource('/comunicaciones',     'Apoyo\ComunicacionesController');

Route::get('/competencia_rendicion',             [Comunicaciones::class, 'index_rendicion']);
Route::post('/competencia_rendicion/create',     [Comunicaciones::class, 'store_rendicion']);
Route::get('competencia_rendicion/{id}',         [Comunicaciones::class, 'edit_rendicion']);
Route::post('competencia_rendicion_update/{id}', [Comunicaciones::class, 'update_rendicion']);
Route::get('competencia_rendicion/delete/{id}',  [Comunicaciones::class, 'destroy_rendicion']);


//***********************recursos*************************** */

Route::resource('/recursosApp',     'Apoyo\RecursosController');
Route::get('/recursosverimg',     [Recursos::class, 'ver_img']);
//***********************competencia*************************** */


//***********************tomaconsecuencia*************************** */
Route::resource('/tomaconsecuencia',     'Apoyo\TomaConsecuenciaController');
Route::get('/tomaconsecuenciaimg',     [TomaConsecuencia::class, 'ver_img']);


Route::get('/competencia',     [Competencia::class, 'index']);
Route::post('/competencia/create',     [Competencia::class, 'store']);
Route::get('competencia/edit/{id}',    [Competencia::class, 'edit']);
Route::post('update_competencia/{id}', 	   [Competencia::class, 'update']);
Route::get('competencia/delete/{id}',   [Competencia::class, 'destroy']);

//***********************politica_vs_objetivos*************************** */
Route::get('/politica_vs_objetivo/{id}',         [PoliticaVSObjetivos::class, 'index']);
Route::get('/politicas_vs_objetivos',     [PoliticaVSObjetivos::class, 'index_politicas']);
Route::post('/politica_vs_objetivo/create',     [PoliticaVSObjetivos::class, 'store']);
Route::get('politica_vs_objetivo/edit/{id}',    [PoliticaVSObjetivos::class, 'edit']);
Route::get('politica_vs_objetivo/delete/{id}',   [PoliticaVSObjetivos::class, 'destroy']);
Route::post('update_politica',  [PoliticaVSObjetivos::class, 'update_politica']);

// ************* planificardor_cambio *******
Route::get('/planificardor_cambio/{id}',         [CambioController::class, 'index']);
Route::get('/planificardor_cambio_procesos',     [CambioController::class, 'index_procesos']);
Route::post('/planificardor_cambio/create',     [CambioController::class, 'store']);
Route::get('planificardor_cambio/edit/{id}',    [CambioController::class, 'edit']);
Route::post('pla_edit_cambio/{id}', 	   [CambioController::class, 'update']);
Route::get('planificardor_cambio/delete/{id}',   [CambioController::class, 'destroy']);

// Route::post('update_cambio/{id}', 	   [CambioController::class, 'update_cambio']);
// *************Menu liderazgo *******

// politica
Route::get('politica',              [Politica::class, 'index']);
Route::post('politica',             [Politica::class, 'store']);
Route::get('edit_politica/{id}',    [Politica::class, 'edit']);
Route::post('update_politica/{id}', [Politica::class, 'update']);
Route::get('politica/{id}',         [Politica::class, 'destroy']);


// presupuesto
Route::get('parm_presupuesto', [IngresoEgreso::class, 'index']);
Route::post('empresa',         [IngresoEgreso::class, 'getEmpresa']);

// ingreso
Route::get('/ingreso/{id}',            [IngresoController::class, 'index']);
Route::post('/ingresos/create',    		 [IngresoController::class, 'store']);
Route::get('ingresos/edit/{id}',    	[IngresoController::class, 'edit']);
Route::post('ingresos/{id}', 			[IngresoController::class, 'update']);
Route::get('ingreso/delete/{id}',         [IngresoController::class, 'destroy']);

// egreso
Route::get('/egreso/{id}',         [Egreso::class, 'index']);
Route::post('/egresos/create',     [Egreso::class, 'store']);
Route::get('egresos/edit/{id}',    [Egreso::class, 'edit']);
Route::post('egresos/{id}', 	   [Egreso::class, 'update']);
Route::get('egreso/delete/{id}',   [Egreso::class, 'destroy']);

//roles y responsanilidad

Route::get('respon/{id}',       				 [MatrizRoles::class, 'index_res']);
 // responsabilidades/cargo_rol/49
Route::get('/roles_responsabilidades/',        	   [Responsabilidades::class, 'index']);
Route::post('/roles_responsabilidades/create',     [Responsabilidades::class, 'store']);
Route::get('roles_responsabilidades/edit/{id}',    [Responsabilidades::class, 'edit']);
Route::post('roles_responsabilidades/{id}', 	   [Responsabilidades::class, 'update']);
Route::get('roles_responsabilidades/delete/{id}',  [Responsabilidades::class, 'destroy']);


// Route::get('/responsabilidades/cargo_rol/{id}',        [MatrizRoles::class, 'index_cargo_rol']);
// Route::post('/roles_responsabilidades/cargo_rol/create',     [MatrizRoles::class, 'store_cargo']);
// Route::get('roles_responsabilidades/cargo_rol/delete/{id}',  [MatrizRoles::class, 'destroy_cargo_rol']);
// Route::get('cargo_edit/{id}',   								 [MatrizRoles::class, 'edit_cargo_rol']);

// Route::get('responsabilidades_matriz/{id}',        [Responsabilidades::class, 'index']);
// Route::post('/responsabilidades_matriz/create',     [Responsabilidades::class, 'store']);
// Route::get('responsabilidades_matriz/edit/{id}',    [Responsabilidades::class, 'edit']);
// Route::post('update_responsabilidad/{id}', 	   [Responsabilidades::class, 'update']);
// Route::get('responsabilidades_matriz/delete/{id}',  [Responsabilidades::class, 'destroy']);
// ********* FIN ****Menu liderazgo *******


//*************** matriz_riesgos ******************** */
Route::get('/matriz_riesgos',               [Riesgos::class, 'index']);
Route::get('/matriz_riesgos/procesos/{id}', [Riesgos::class, 'index_procesos']);
Route::post('/matriz_riesgos/create',       [Riesgos::class, 'store']);
Route::get('matriz_riesgos/edit/{id}',      [Riesgos::class, 'edit']);
Route::post('matriz_riesgos/{id}', 	   		[Riesgos::class, 'update']);
Route::get('matriz_riesgos/delete/{id}',    [Riesgos::class, 'destroy']);

//  Route::put('/riesgo_oportuno/{id}', 	 			[RiesgosOportuno::class, 'index']);
Route::get('/riesgo_oportuno/{id}', [RiesgosOportuno::class, 'index_oportuno']);
Route::post('/riesgo_oportuno/create',       [RiesgosOportuno::class, 'store']);
Route::get('riesgo_oportuno/edit/{id}',      [RiesgosOportuno::class, 'editar']);
Route::post('riesgo_oportuno_edit/', 	   	 [RiesgosOportuno::class, 'actualizar']);
Route::get('riesgo_oportuno/delete/{id}',    [RiesgosOportuno::class, 'destroy']);

Route::get('/reevaluacion_riesgo/{id}', 		 [RiesgosOportunoRee::class, 'reeeriesgo']);
Route::post('/reevaluacion_riesgo/create',       [RiesgosOportunoRee::class, 'store']);
Route::get('reevaluacion_riesgo/edit/{id}',      [RiesgosOportunoRee::class, 'editar']);
Route::get('reevaluacion_riesgact/{id}', 	   	 [RiesgosOportunoRee::class, 'actu']);
Route::get('reevaluacion_riesgo/delete/{id}',    [RiesgosOportunoRee::class, 'destroy']);

//
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:super-admin']], function() {
	
Route::get('/administracion_usuarios', 'usuarios\UsuariosController@index')->name('admin_users');
Route::post('/store_usuarios', 'Usuarios\UsuariosController@store')->name('store_users');
Route::get('/edit_usuarios/{id}', 'Usuarios\UsuariosController@edit')->name('edit_users');
Route::post('/update_usuarios/{id}', 'Usuarios\UsuariosController@update')->name('update_users');
Route::get('/delete_usuarios/{id}', 'Usuarios\UsuariosController@destroy')->name('delete_users');

});




Route::get('/', 'HomeController@index')->name('home')->middleware('verified');
//Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

// Parametrizacion empresa
Route::get('parm_empresa', ['uses'=>'Parametrizacion\EmpresaController@index', 'as' => 'Mod_Parametrizacion::parm_empresa']);
Route::post('save_empresa', ['uses'=>'Parametrizacion\EmpresaController@store', 'as' => 'Mod_Parametrizacion::save_empresa']);
Route::get('edit_empresa/{id}', ['uses'=>'Parametrizacion\EmpresaController@edit', 'as' => 'Mod_Parametrizacion::edit_empresa']);
Route::post('update_empresa/{id}', ['uses'=>'Parametrizacion\EmpresaController@update', 'as' => 'Mod_Parametrizacion::update_empresa']);
Route::get('delete_empresa/{id}', ['uses'=>'Parametrizacion\EmpresaController@destroy', 'as' => 'Mod_Parametrizacion::delete_empresa']);

// parametrizacion datos corporativos
Route::get('parm_datos_corportativo', 'Parametrizacion\DatosCorporativosController@index');
Route::post('save_datos_corportativo', 'Parametrizacion\DatosCorporativosController@store');

// parametrizacion areas y cargos
Route::get('parm_areas', 'Parametrizacion\AreasCargoController@index_areas');
Route::post('save_areas', 'Parametrizacion\AreasCargoController@store_areas');
Route::get('edit_parm_areas/{id}', 'Parametrizacion\AreasCargoController@edit_areas');
Route::post('update_areas/{id}', 'Parametrizacion\AreasCargoController@update_areas');
Route::get('delete_parm_areas/{id}', 'Parametrizacion\AreasCargoController@destroy');

// Parametrizacion Cargo
Route::get('parm_cargo', 'Parametrizacion\AreasCargoController@index_cargos');
Route::post('save_cargo', 'Parametrizacion\AreasCargoController@store_cargos');
Route::get('edit_parm_cargos/{id}', 'Parametrizacion\AreasCargoController@edit_cargo');
Route::post('update_cargos/{id}', 'Parametrizacion\AreasCargoController@update_cargos');
Route::get('delete_parm_cargos/{id}', 'Parametrizacion\AreasCargoController@destroy_cargos');

// Parametrizacion Proceso
Route::get('parm_proceso', 						'Parametrizacion\ProcesosController@index');
Route::get('parm_proceso_gerenciales', 			'Parametrizacion\ProcesosController@index_gerenciales');
Route::get('parm_proceso_misionales', 			'Parametrizacion\ProcesosController@index_misionales');
Route::get('parm_proceso_apoyo', 				'Parametrizacion\ProcesosController@index_apoyo');
Route::post('parm_proceso_save', 				'Parametrizacion\ProcesosController@store_gerenciales');
Route::post('parm_proceso_save_misionales', 	'Parametrizacion\ProcesosController@store_misionales');
Route::post('parm_proceso_save_apoyo', 			'Parametrizacion\ProcesosController@store_apoyo');
Route::get('parm_proceso_gerencial_edit{id}', 	'Parametrizacion\ProcesosController@edit_proceso_gerencial');
Route::get('parm_proceso_misional_edit{id}', 	'Parametrizacion\ProcesosController@edit_proceso_misional');
Route::get('parm_proceso_apoyo_edit{id}', 		'Parametrizacion\ProcesosController@edit_proceso_apoyo');
Route::post('update_proceso_gerencial/{id}', 	'Parametrizacion\ProcesosController@update_proceso_gerencial');
Route::post('update_proceso_misionall/{id}', 	'Parametrizacion\ProcesosController@update_proceso_misional');
Route::post('update_proceso_apoyo/{id}', 		'Parametrizacion\ProcesosController@update_proceso_apoyo');
Route::get('parm_proceso_gerencial_delete/{id}','Parametrizacion\ProcesosController@destroy_proceso_gerencial');
Route::get('parm_proceso_misional_delete/{id}',	'Parametrizacion\ProcesosController@destroy_proceso_misional');
Route::get('parm_proceso_apoyo_delete/{id}',	'Parametrizacion\ProcesosController@destroy_proceso_apoyo');
Route::get('procesos', 							'Parametrizacion\ProcesosController@getProcesos');

// Parametrizacion Tipo Documento
Route::get ('parm_documento_index', 		'Parametrizacion\DocumentosController@index_documento');
Route::post('parm_documento_save', 			'Parametrizacion\DocumentosController@store_documento');
Route::get ('parm_documento_edit/{id}',		'Parametrizacion\DocumentosController@edit_documento');
Route::post('parm_documento_update/{id}', 	'Parametrizacion\DocumentosController@update_documento');
Route::get ('parm_documento_delete/{id}', 	'Parametrizacion\DocumentosController@destroy_documento');

// Parametrizacion Usuarios
Route::get('parm_usuarios', 'Parametrizacion\UsuariosController@index');
Route::post('parm_usuarios_save', 'Parametrizacion\UsuariosController@store');

// Parametrizacion Usuarios Admin
Route::resource('/parametrizacion_users',     'Parametrizacion\UserAdminController');


// Parametrizacion Sistema de Gestion
Route::get('parm_sistema_gestion', 				 'Parametrizacion\SistemaGestionController@index');
Route::post('parm_save_sistema_gestion', 		 'Parametrizacion\SistemaGestionController@store');
Route::get('parm_edit_sistema_gestion/{id}', 	 'Parametrizacion\SistemaGestionController@edit');
Route::post('parm_update_sistema_gestion/{id}',  'Parametrizacion\SistemaGestionController@update');
Route::get('parm_eliminar_sistema_gestion/{id}', 'Parametrizacion\SistemaGestionController@destroy');

// Parametrizacion cambio de empresa usuario
Route::get('parm_usuarios_camb', 'Parametrizacion\UsuariosController@cambio_usuario');
Route::post('parm_usuarios_camb_update', 'Parametrizacion\UsuariosController@mover_usuario');

// Parametrizacion origen Anomalía
Route::get('parm_origen_anomalia', 'Parametrizacion\OrigenanomaliaController@origen_anomalia');
Route::get('view_parm_origen_anomalia/{id}', 'Parametrizacion\OrigenanomaliaController@edit_origen_anomalia');
Route::post('store_parm_origen_anomalia', 'Parametrizacion\OrigenanomaliaController@store');
Route::post('edit_parm_origen_anomalia/{id}', 'Parametrizacion\OrigenanomaliaController@edit');
Route::get('delete_parm_origen_anomalia/{id}', 'Parametrizacion\OrigenanomaliaController@delete');

// Parametrizacion Productos
Route::get('parm_producto', 'Parametrizacion\ProductoController@index');
Route::post('store_parm_producto', 'Parametrizacion\ProductoController@store');
Route::get('edit_parm_producto/{id}', 'Parametrizacion\ProductoController@edit');
Route::post('update_parm_producto/{id}', 'Parametrizacion\ProductoController@update');
Route::get('delete_parm_producto/{id}', 'Parametrizacion\ProductoController@destroy');

// Parametrizacion Proveedores
Route::get('parm_proveedor',       [Proveedor::class, 'index']);
Route::post('parm_proveedor',      [Proveedor::class, 'store']);
Route::post('parm_proveedor_insumo',      [Proveedor::class, 'storeInsumo']);
Route::get('edit_parm_proveedor/{id}',    [Proveedor::class, 'edit']);
Route::post('update_parm_proveedor/{id}', [Proveedor::class, 'update']);
Route::get('parm_proveedor/{id}', [Proveedor::class, 'destroy']);
Route::get('proveedores',         [Proveedor::class, 'getInsumos']);

//Insumos
Route::get('parm_insumos',  [Insumo::class, 'index']);
Route::post('parm_insumos', [Insumo::class, 'store']);
Route::get('edit_parm_insumos/{id}', [Insumo::class, 'edit']);
Route::post('update_parm_insumos/{id}', [Insumo::class, 'update']);
Route::get('parm_insumos/{id}',         [Insumo::class, 'destroy']);
//
// Identificación Criticidad
Route::get('parm_criticidad',    [Criticidad::class, 'index']);
Route::post('parm_criticidad',   [Criticidad::class, 'store']);
Route::get('edit_parm_criticidad/{id}',     [Criticidad::class, 'edit']);
Route::post('update_parm_criticidad/{id}', [Criticidad::class, 'update']);
Route::get('parm_criticidad/{id}',         [Criticidad::class, 'destroy']);




// parametrizacion calificacion de proveedores
Route::get('calificacion_proveedores',  [CalificaionProveedor::class, 'index']);
Route::post('calificacion_proveedores', [CalificaionProveedor::class, 'store']);
Route::get('edit_calificacion_proveedores/{id}',    [CalificaionProveedor::class, 'edit']);
Route::post('update_calificacion_proveedores/{id}', [CalificaionProveedor::class, 'update']);
Route::get('calificacion_proveedores/{id}', [CalificaionProveedor::class, 'destroy']);
Route::get('calificaion',                    [CalificaionProveedor::class, 'getCalificacion']);


//criterios_calificacion
Route::get('criterios_calificacion',             [CriteroCalificacion::class, 'index']);
Route::post('criterios_calificacion',            [CriteroCalificacion::class, 'store']);
Route::get('edit_criterios_calificacion/{id}',   [CriteroCalificacion::class, 'edit']);
Route::post('update_criterios_calificacion/{id}',[CriteroCalificacion::class, 'update']);
Route::get('criterios_calificacion/{id}',        [CriteroCalificacion::class, 'destroy']);
Route::get('calificaion_evaluados',              [CriteroCalificacion::class, 'getCalificacion']);
Route::get('calificaion_proveedor',              [CriteroCalificacion::class, 'getCalificacion_proveedor']);
// Menu contexto
Route::get('contexto_index','Contexto\ContextoController@index');

// tendencias en colombia
Route::get('contexto_tendencias_en_colombia','Contexto\TendeciasController@index');
Route::post('contexto_save_tendencias_en_colombia','Contexto\TendeciasController@store');
Route::post('contextoedit_tendencias_en_colombia/{id}','Contexto\TendeciasController@update');

// Analisis pestal
Route::get('contexto_analisis_pestal','Contexto\AnalisisPestalController@index');
Route::post('contexto_save_analisis_pestal','Contexto\AnalisisPestalController@create');
Route::post('contexto_edit_analisis_pestal/{id}','Contexto\AnalisisPestalController@update');

// analisis dofa
Route::get('contexto_dofa','Contexto\DofaController@index');
Route::post('contexto_save_dofa','Contexto\DofaController@store');
Route::post('contexto_edit_dofa/{id}','Contexto\DofaController@update');
Route::post('contexto_eliminar_dofa/{id}','Contexto\DofaController@destroy');

Route::resource('/estrategias',    'Contexto\EstrategiasController');
Route::resource('/matriz_dofa',    'Contexto\MatrizDofaController');

// Riesgos y oportunidades
Route::get('contexto_riesgo','Contexto\RiesgoOportunidadesController@index');
Route::post('contexto_save_riesgo','Contexto\RiesgoOportunidadesController@store');
Route::post('contexto_edit_riesgo/{id}','Contexto\RiesgoOportunidadesController@update');
Route::post('contexto_eliminar_riesgo/{id}','Contexto\RiesgoOportunidadesController@destroy');

// partes interesadas
Route::get('partes_interesadas','partes_interesadas\PartesInteresadasController@index');
Route::get('pi_calificaciones','partes_interesadas\PartesInteresadasController@cal');
Route::post('pi_calificaciones_i','partes_interesadas\PartesInteresadasController@impacto');
Route::post('pi_calificaciones_mo/{id}','partes_interesadas\PartesInteresadasController@impacto_update');
Route::post('pi_calificaciones_influ','partes_interesadas\PartesInteresadasController@influencia');
Route::post('pi_calificaciones_influ/{id}','partes_interesadas\PartesInteresadasController@influencia_update');
Route::post('pi_calificaciones_form_pa','partes_interesadas\PartesInteresadasController@form_partes');

// Mapa de proceso 
Route::get('mapa_proceso', [MapaProceso::class, 'index']);


// alcance
Route::get('alcance','alcance\AlcanceController@index');
// -------mejora------------
// anomalia
Route::get('anomalia','mejora\AnomaliasController@index');
Route::get('anomalia_index','mejora\AnomaliasController@anomalia');
//Route::get('acciones_correctivas','mejora\AnomaliasController@acciones_correctivas');
Route::post('store_anomalia','mejora\AnomaliasController@store_anomalia');

Route::resource('/lista_anomalia',    'mejora\ListaAnomaliaController');
Route::resource('/acciones_correctivas',    'mejora\CorrelativasController');
Route::resource('/causa_raiz',    'mejora\CausaController');
Route::resource('/acta',      'mejora\ActaController');
Route::get('acta_delete/{id}/{tipo}/', [
    'as' => 'acta_delete',
    'uses' => 'mejora\ActaController@destroy_asistente',
]);
Route::get('tema_delete/{id}/{tipo}/', [
    'as' => 'tema_delete',
    'uses' => 'mejora\ActaController@destroy_tema',
]);


Route::resource('/tareas_pendientes',      'mejora\TareasPendiente');


// ajax mejora
Route::get('sistema_de_gestion',array('as'=>'myform','uses'=>'Parametrizacion\OrigenanomaliaController@myformAjax'));


Route::get('sistemagestion/proceso/{id}',
			array('as'=>'sistemagestion.proceso',
					'uses'=>'Parametrizacion\OrigenanomaliaController@myformAjax'));

// Sgto y Medicion
Route::get('indicadores','sgto_medicion\IndicadoresController@index');
Route::post('indicadores','sgto_medicion\IndicadoresController@store');
Route::post('indicadores/{id}','sgto_medicion\IndicadoresController@update');
Route::post('indicadores/{id}','sgto_medicion\IndicadoresController@destroy');




