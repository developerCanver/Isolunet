<?php

namespace App\Http\Controllers\mejora;

use App\Http\Controllers\Controller;
use App\Models\Mejora\Acta;
use App\Models\Mejora\ActaAcciones;
use App\Models\Mejora\ActaAsistente;
use App\Models\Mejora\ActasGestion;
use App\Models\Mejora\ActasProceso;
use App\Models\Mejora\ActaTemas;
use App\Models\User;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class ActaController extends Controller
{
 
    
            public function __construct()
            {
                $this->middleware('auth');
            }
        
            public function index(Request $request)
            {
                $usuario = User::findOrfail(Auth::User()->id);
                $id_empresa=$usuario->fk_empresa;
    

                $empresa = DB::table('users as u')
                            ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                            ->where('u.id','=',Auth::User()->id)
                            ->where('e.bool_estado','=','1')
                            ->first();

                $gestiones = DB::table('tbl_empresa as e')
                                ->join('tbl_sistemas_gestion as g','g.fk_empresa','=','e.id_empresa')
                                ->where('e.id_empresa',  $id_empresa)
                                ->where('e.bool_estado','=','1')
                                ->where('g.bool_estado','=','1')
                                ->orderby('str_nombre')->get();
                                
                $procesos = DB::table('tbl_empresa as e')
                                ->join('tbl_procesos as p','p.fk_empresa','=','e.id_empresa')
                                ->where('e.id_empresa',  $id_empresa)
                                ->where('e.bool_estado','=','1')
                                ->where('p.bool_estado','=','1')
                                ->get();

                $cargos = DB::table('tbl_areas as a')
                                ->join('tbl_empresa as em','a.fk_empresa','=','em.id_empresa')
                                ->join('tbl_cargos as e','a.id_area','=','e.fk_area')
                                ->where('em.id_empresa',  $id_empresa)
                                ->where('e.bool_estado','=','1')
                                ->where('em.bool_estado','=','1')
                                ->where('a.bool_estado','=','1')
                                ->orderby('em.razon_social','desc')
                                ->get();  
                $usuarios = DB::table('users as u')
                                ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                                ->where('e.id_empresa',  $id_empresa)
                                ->where('e.bool_estado','=','1')
                                //->where('fk_rol',3)
                                ->get();
        
                //if($request->get('buscador')){
                $busqueda=trim($request->get('buscador'));
                //$busqueda=trim('acta');
                //dd($busqueda);


                // select razon_social,id_acta,acta.tipo_acta, group_concat(distinct tipo_proceso) as procesos
                // from tbl_empresa as e
                // inner join tbl_mejo_acta as acta on acta.fk_empresa = e.id_empresa
                // left join tbl_mejo_acta_proce as acta_pro on acta_pro.acta_id =acta.id_acta
                // left join tbl_procesos as procesos on procesos.id_proceso =acta_pro.proceso_id
                // GROUP BY id_acta


                
                 // select razon_social,id_acta,acta.tipo_acta, group_concat(distinct tipo_proceso) as procesos,
                 // group_concat(distinct str_nombre) as gestiones,group_concat(distinct asistente) as asistenetes
                // from tbl_empresa as e
                //  inner join tbl_mejo_acta as acta on acta.fk_empresa = e.id_empresa
                // left join tbl_mejo_acta_proce as acta_pro on acta_pro.acta_id =acta.id_acta
                //  left join tbl_procesos as procesos on procesos.id_proceso =acta_pro.proceso_id
                // left join tbl_mejo_acta_ges as acta_ges on acta_ges.acta_id =acta.id_acta
                // left join tbl_sistemas_gestion as gestion on gestion.id_sisgestion =acta_ges.gestion_id
                // left join tbl_mejo_acta_asistente as asistentes on asistentes.fk_acta =acta.id_acta
                // WHERE ID_EMPRESA='11'
                // GROUP BY id_acta


                // GROUP BY id_acta
                // $consultas =  DB::table('tbl_empresa as e')
                //                 ->join('tbl_mejo_acta as acta','acta.fk_empresa','=','e.id_empresa')
                //                 ->leftJoin('tbl_mejo_acta_proce as acta_pro','acta_pro.acta_id','=','acta.id_acta')
                //                 ->leftJoin('tbl_procesos as procesos','procesos.id_proceso','=','acta_pro.proceso_id')
                //                 ->leftJoin('tbl_mejo_acta_ges as acta_ges','acta_ges.acta_id','=','acta.id_acta')
                //                 ->leftJoin('tbl_sistemas_gestion as gestion','gestion.id_sisgestion','=','acta_ges.gestion_id')
                //                 ->leftJoin('tbl_mejo_acta_asistente as asistentes','asistentes.fk_acta','=','acta.id_acta')
                //                 ->where('e.id_empresa',  $id_empresa)
                //                 //->where('tipo_acta' )
                //                // ->where("acta.tipo_acta", "LIKE", "%$busqueda%")
                //                 //->orwhere("acta.id_acta", "LIKE", "%$busqueda%")
                //                 ->where('acta.bool_estado','=','1')
                //                 ->select(
                //                     'id_acta',
                //                     'terminada',
                //                     'acta',
                //                     'tipo_acta',
                //                     'fecha_acta',
                //                     'lugar',
                //                     'hora_acta',
                //                     'fecha_proxima',
                //                     'registrado',
                //                     'archivo',

                //                     DB::raw('group_concat(distinct tipo_proceso) as procesos'),
                //                     DB::raw('group_concat(distinct str_nombre) as gestiones'),
                //                     DB::raw('group_concat(distinct asistente) as asistenetes')
                //                     )
                //                 ->orderBy('id_acta', 'DESC')
                //                 ->paginate(20);
                //                 //dd($consultas);


                $consultas =  DB::table('tbl_empresa as e')
                                ->join('tbl_mejo_acta as a','a.fk_empresa','=','e.id_empresa')
                                ->join('tbl_mejo_acta_acciones as acc','acc.fk_acta','a.id_acta')
                                ->where('e.id_empresa',  $id_empresa)
                                //->where('tipo_acta' )
                                ->orWhere('a.id_acta', 'like', '%' . $busqueda. '%')
                                //->orWhere("a.id_acta", "LIKE", "%$busqueda%")
                                ->orWhere('a.tipo_acta', 'like', '%' . $busqueda. '%')
                                ->where('a.bool_estado','=','1')
                                ->select(
                                    'id_empresa',
                                    'id_acciones',
                                    'acta',		
                                    'id_acta',	
                                    'tipo_acta',	
                                    'fecha_acta',	
                                    'lugar',	
                                    'hora_acta',	
                                    'fecha_proxima',	
                                    'registrado',	
                                    'observaciones_acta',
                                    'a.archivo as archivo',		
                                    'otros_user',
                                    'accion',	
                                    'responsable',
                                    'terminada',
                                )
                                ->orderBy('id_acta', 'DESC')
                                ->paginate(20);
                                //dd($consultas);
              //  }
         
                            

                return view('pages.mejora.acta.index'
                            ,[
                            'empresa'=>$empresa,
                            'gestiones'=>$gestiones,
                            'procesos'=>$procesos,
                            'consultas'=>$consultas,
                            'usuarios'=>$usuarios,
                            'cargos'=>$cargos,
                            'busqueda'=>$busqueda,
                                        ]);
                    
            }
        
        
            public function store(Request $request)
            {
            try {
                        DB::beginTransaction();
        
                        $variable 				  = new Acta();
                	
                        $variable->acta         = ($request->get('acta')) ?            $request->get('acta') : '';	
                      	
                        $variable->tipo_acta    = ($request->get('tipo_acta')) ?       $request->get('tipo_acta') : '';	
                        $variable->fecha_acta   = ($request->get('fecha_acta')) ?      $request->get('fecha_acta') : '';	
                        $variable->lugar        = ($request->get('lugar')) ?           $request->get('lugar') : '';	
                        $variable->hora_acta    = ($request->get('hora_acta')) ?       $request->get('hora_acta') : '';	
                        $variable->fecha_proxima = ($request->get('fecha_proxima')) ?  $request->get('fecha_proxima') : '';	
                        $variable->registrado   = ($request->get('registrado')) ?      $request->get('registrado') : '';	
                        $variable->observaciones_acta = ($request->get('observaciones_acta')) ? $request->get('observaciones_acta') : '';	
                    	
                        //$variable->compromiso   = ($request->get('compromiso')) ?      $request->get('compromiso') : '';	
                        //$variable->ejecutable   = ($request->get('ejecutable')) ?      $request->get('ejecutable') : '';	
                       // $variable->fecha_inicio_eje  = ($request->get('fecha_inicio_eje')) ? $request->get('fecha_inicio_eje') : '2021-01-01';	
                        //$variable->fecha_final_eje   = ($request->get('fecha_final_eje')) ?  $request->get('fecha_final_eje') : '2021-01-01';
                        //$variable->observaciones_ejecuccion = ($request->get('observaciones_ejecuccion')) ? $request->get('observaciones_ejecuccion') : '';	
                        // $variable->terminada    = ($request->get('terminada')) ?       $request->get('terminada') : '';	
                        $variable->otros_user        = ($request->get('otros_user')) ?         $request->get('otros_user') : '';	

                     
                    
                        $variable->fk_empresa   =  $request->get('fk_empresa');	
                        $variable->bool_estado  = '1';
                          
                        if ($request->file('archivo')) {
                            $file =$request->file('archivo');
                            $name = time().$file->getClientOriginalName();
                            $file->move(public_path().'/archivos/acta/', $name);
                        } else {
                            $name='';
                            
                        }
                        $variable->archivo =  $name;

                        $variable->save();   
                        
                   
                        $asistente     = $request->get('fk_user');
                        $cargo     = $request->get('fk_cargor');
                       
                        if (!empty($asistente)) {
                            for ($i=0; $i <  count($asistente) ; $i++) {
            
                                $tiporequisito = new ActaAsistente();
                                $tiporequisito->asistente    =    $asistente[$i];
                            //$tiporequisito->cargo  =    $cargo[$i];
            
                                $tiporequisito->fk_acta       = $variable->id_acta;
                                $tiporequisito->bool_estado    = '1';
                                $tiporequisito->save();
                            }
                         }

                        $tema     = $request->get('tema');
                        $comentario     = $request->get('comentario');
                      // dd(count($asistente));
                        if (!empty($tema)) {
                            for ($i=0; $i <  count($tema) ; $i++) {
            
                                $tiporequisito = new ActaTemas();
                                $tiporequisito->tema    =    $tema[$i];
                                $tiporequisito->comentario  =    $comentario[$i];
            
                                $tiporequisito->fk_acta       = $variable->id_acta;
                                $tiporequisito->bool_estado    = '1';
                                $tiporequisito->save();
                            }
                        }


                        $gestion      = $request->get('gestion');	
                        if (!empty($gestion)) {
                            for ($i=0; $i <  count($gestion) ; $i++) {
            
                                $guardar = new ActasGestion();
                                $guardar->gestion_id    = $gestion[$i];                       
                                $guardar->acta_id       = $variable->id_acta;
                                $guardar->save();
                            }
                        }
                        $proceso = $request->get('proceso');
                        if (!empty($proceso)) {

                            for ($i=0; $i <  count($proceso) ; $i++) {
            
                                $guardar = new ActasProceso();
                                $guardar->proceso_id    =$proceso[$i];                       
                                $guardar->acta_id       = $variable->id_acta;
                                $guardar->save();
                            }
                        }

                            $accion                 = $request->get('accion');
                            $responsable            = $request->get('responsable');
                            $fecha_inicio_acc       = $request->get('fecha_inicio_acc');
                            $fecha_final_acc        = $request->get('fecha_final_acc');
                
                        if (!empty($accion)) {
                            for ($i=0; $i <  count($accion) ; $i++) {
            
                                $guardar = new ActaAcciones();
                                $guardar->accion            = $accion[$i];
                                $guardar->responsable       = $responsable[$i];
                                $guardar->fecha_inicio_acc  = $fecha_inicio_acc[$i];
                                $guardar->fecha_final_acc   = $fecha_final_acc[$i];
            
                                $guardar->fk_acta       = $variable->id_acta;                               
                                $guardar->save();
                            }
                        }

                        DB::commit();
                        return Redirect::to('acta')->with('status','Se guardó correctamente');
                    } catch (Exception $e) {
                        DB::rollback();
                }
        
            }
        
        
            public function edit($id)
            {
                $usuario = User::findOrfail(Auth::User()->id);
                $rolUsuario=$usuario->fk_rol;
                $id_empresa=$usuario->fk_empresa;
    

                $gestiones = DB::table('tbl_empresa as e')
                                ->join('tbl_sistemas_gestion as g','g.fk_empresa','=','e.id_empresa')
                                ->where('e.id_empresa',  $id_empresa)
                                ->where('e.bool_estado','=','1')
                                ->where('g.bool_estado','=','1')
                                ->orderby('str_nombre')->get();

                $sis_selec = DB::table('tbl_mejo_acta_ges as s')
                                ->where('acta_id',  $id)
                                ->get();
                                
                $procesos = DB::table('tbl_empresa as e')
                                ->join('tbl_procesos as p','p.fk_empresa','=','e.id_empresa')
                                ->where('e.id_empresa',  $id_empresa)
                                ->where('e.bool_estado','=','1')
                                ->where('p.bool_estado','=','1')
                                ->get();

                $pro_selec = DB::table('tbl_mejo_acta_proce as p')
                                ->where('acta_id',  $id)
                                ->get();

                $usuarios = DB::table('users as u')
                                ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                                ->where('e.id_empresa',  $id_empresa)
                                ->where('e.bool_estado','=','1')
                                //->where('fk_rol',3)
                                ->get();

                $usu_selec = DB::table('tbl_mejo_acta_asistente as u')
                                ->where('fk_acta',  $id)
                                ->get();

                $consulta   = Acta::findOrfail($id);
    
                $empresa = DB::table('users as u')
                                ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                                ->where('u.id','=',Auth::User()->id)
                                ->where('e.bool_estado','=','1')
                                ->first();
                return view('pages.mejora.acta.edit',[
                    'empresa'=>$empresa,
                    'gestiones'=>$gestiones,
                    'procesos'=>$procesos,
                    'consulta'=>$consulta,
                    'usuarios'=>$usuarios,
                    'usu_selec'=>$usu_selec,
                    'pro_selec'=>$pro_selec,
                    'sis_selec'=>$sis_selec,
                    ]);
            }
        
        
        
            public function update(Request $request, $id)
            {
                try {
                    DB::beginTransaction();        
             
                        $variable                     = Acta::findOrfail($id);
                 
                        $variable->acta         = ($request->get('acta')) ?            $request->get('acta') : '';	
                        $variable->tipo_acta    = ($request->get('tipo_acta')) ?       $request->get('tipo_acta') : '';	
                        $variable->fecha_acta   = ($request->get('fecha_acta')) ?      $request->get('fecha_acta') : '';	
                        $variable->lugar        = ($request->get('lugar')) ?           $request->get('lugar') : '';	
                        $variable->hora_acta    = ($request->get('hora_acta')) ?       $request->get('hora_acta') : '';	
                        $variable->fecha_proxima = ($request->get('fecha_proxima')) ?  $request->get('fecha_proxima') : '';	
                        $variable->registrado   = ($request->get('registrado')) ?      $request->get('registrado') : '';	
                        $variable->observaciones_acta = ($request->get('observaciones_acta')) ? $request->get('observaciones_acta') : '';	
                        $variable->otros_user      = ($request->get('otros_user')) ?         $request->get('otros_user') : '';		

                        if ($request->file('archivo')) {
                            $archivo=$request->get('archivo_anterior');
                            //nombre para eliinar el anterior archivo
                       
                                $mi_archivo= public_path().'/archivos/acta/'.$archivo;
                    
                                if (is_file($mi_archivo)) {
                                    //consulto si esta ena carpeta y borro
                                    unlink(public_path().'/archivos/acta/'.$archivo);
                                }                            
        
                            $file =$request->file('archivo');
                            $name = time().$file->getClientOriginalName();
                            $file->move(public_path().'/archivos/acta/', $name);
                            $variable->archivo =  $name;
                       
                        }
                        $variable->update(); 
                        
                        ActaAsistente::where('fk_acta', $id)->delete();

                        $asistente     = $request->get('fk_user');
                     
                        if (!empty($asistente)) {
                            for ($i=0; $i <  count($asistente) ; $i++) {
            
                                $tiporequisito = new ActaAsistente();
                                $tiporequisito->asistente    =    $asistente[$i];
                                //$tiporequisito->cargo        =    $cargo[$i];        
                                $tiporequisito->fk_acta      = $variable->id_acta;
                                $tiporequisito->bool_estado  = '1';
                                $tiporequisito->save();
                            }
                        }

                        ActaTemas::where('fk_acta', $id)->delete();

                        $tema     = $request->get('tema');
                        $comentario     = $request->get('comentario');
                      
                        if (!empty($tema)) {
                            for ($i=0; $i <  count($tema) ; $i++) {
            
                                $tiporequisito = new ActaTemas();
                                $tiporequisito->tema    =    $tema[$i];
                                $tiporequisito->comentario  =    $comentario[$i];        
                                $tiporequisito->fk_acta       = $variable->id_acta;
                                $tiporequisito->bool_estado    = '1';
                                $tiporequisito->save();
                            }
                        }



                        ActasGestion::where('acta_id', $id)->delete();                        

                        $gestion      = $request->get('gestion');
                        if (!empty($gestion)) {

                        for ($i=0; $i <  count($gestion) ; $i++) {
        
                            $guardar = new ActasGestion();
                            $guardar->gestion_id    = $gestion[$i];                       
                            $guardar->acta_id       = $variable->id_acta;
                            $guardar->save();
                        }
                    }

                        ActasProceso::where('acta_id', $id)->delete();                        

                        $proceso = $request->get('proceso');
                        if (!empty($proceso)) {

                        for ($i=0; $i <  count($proceso) ; $i++) {
        
                            $guardar = new ActasProceso();
                            $guardar->proceso_id    =$proceso[$i];                       
                            $guardar->acta_id       = $variable->id_acta;
                            $guardar->save();
                        }
                    }

                    ActaAcciones::where('fk_acta', $id)->delete();                        

                    $accion                 = $request->get('accion');
                    $responsable            = $request->get('responsable');
                    $fecha_inicio_acc       = $request->get('fecha_inicio_acc');
                    $fecha_final_acc        = $request->get('fecha_final_acc');
                    $compromiso             = $request->get('compromiso');
                    $ejecutable             = $request->get('ejecutable');
                    $fecha_inicio_eje       = $request->get('fecha_inicio_eje');
                    $fecha_final_eje        = $request->get('fecha_final_eje');
                    $terminada              = $request->get('terminada');
                    $observaciones_eje      = $request->get('observaciones_ejecuccion');
                    $archivo                = $request->file('archivo_eje');
                    $archivo_anterior       = $request->get('archivo_anterior_eje');
                   // dd($archivo);
        
                if (!empty($accion)) {
                    for ($i=0; $i <  count($accion) ; $i++) {
    
                        $guardar = new ActaAcciones();
                        $guardar->accion            = $accion[$i];
                        $guardar->responsable       = $responsable[$i];
                        $guardar->fecha_inicio_acc  = $fecha_inicio_acc[$i];
                        $guardar->fecha_final_acc   = $fecha_final_acc[$i];

                        if (isset($compromiso[$i])) {
                        $guardar->compromiso        = $compromiso[$i];
                        $guardar->terminada         = $terminada[$i];
                        $guardar->ejecutable        = $ejecutable[$i];
                        $guardar->fecha_inicio_eje  = $fecha_inicio_eje[$i];
                        $guardar->fecha_final_eje   = $fecha_final_eje[$i];
                        $guardar->observaciones_eje = $observaciones_eje[$i];
                        $guardar->archivo           = $archivo_anterior[$i];
                        }


                        if (!empty($archivo)) {
                            if (isset($archivo[$i])) {
                                $archivo_uni=$archivo_anterior[$i];
                                //nombre para eliinar el anterior archivo
                        
                                    $mi_archivo= public_path().'/archivos/acta/'.$archivo_uni;
                        
                                    if (is_file($mi_archivo)) {
                                        //consulto si esta ena carpeta y borro
                                        unlink(public_path().'/archivos/acta/'.$archivo_uni);
                                    }                            
            
                                $file =$archivo[$i];
                                $name = time().$file->getClientOriginalName();
                                $file->move(public_path().'/archivos/acta/', $name);
                                $guardar->archivo =  $name;
                        
                            }
                        }
                        


    
                        $guardar->fk_acta       = $variable->id_acta;                               
                        $guardar->save();
                    }
                }


                    DB::commit();
                    alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
                
                } catch (Exception $e) {
                    DB::rollback();
                    alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
                    
                }
                return Redirect::to('acta')->with('status','Se actualizó correctamente');
            }
        
        
            public function destroy($id)
            {
                    try {
                    DB::beginTransaction();

                    $cons=ActaAcciones::where('id_acciones', $id)->first();
                    $fk_acta=$cons->fk_acta;
                    $cons_a=ActaAcciones::where('fk_acta', $fk_acta)->limit(20)->get();
                    $exite=count($cons_a);



                    $consulta = ActaAcciones::findOrfail($id);
                    $mi_imagen = public_path().'/archivos/acta/'.$consulta -> archivo; 

                    if (is_file($mi_imagen)) {
                        unlink(public_path().'/archivos/acta/'.$consulta -> archivo);                    
                    }
                    $consulta -> delete();


                    if ($exite==1) {               
                       
                        ActaAsistente::where('fk_acta', $fk_acta)->delete();
                        ActaTemas::where('fk_acta', $fk_acta)->delete();
                        ActasGestion::where('acta_id', $fk_acta)->delete();  
                        ActasProceso::where('acta_id', $fk_acta)->delete(); 
                      
                        $variable 					= Acta::findOrfail($fk_acta);            
                        $mi_imagen = public_path().'/archivos/acta/'.$variable -> archivo;
                   
                        if (is_file($mi_imagen)) {
                            unlink(public_path().'/archivos/acta/'.$variable -> archivo);
                        
                        }
                        $variable -> delete();

                    }
                  
                   DB::commit();
                   return Redirect::to('acta')->with('status','Se eliminó correctamente');
                } catch (Exception $e) {
                    DB::rollback();
                }
            }

            public function destroy_asistente($id,$consulta)
            {
                    try {
                    DB::beginTransaction();
                  
            
                    $variable = ActaAsistente::findOrfail($id);
                    $variable -> delete();
        
                   DB::commit();
                   return Redirect::to('acta/'.$consulta.'/edit')->with('status','Se eliminó correctamente');
                } catch (Exception $e) {
                    DB::rollback();
                }
            }

            public function destroy_tema($id,$consulta)
            {
                try {
                    DB::beginTransaction();                  
            
                    $variable = ActaTemas::findOrfail($id);
                    $variable -> delete();
        
                   DB::commit();
                   return Redirect::to('acta/'.$consulta.'/edit')->with('status','Se eliminó correctamente');
                } catch (Exception $e) {
                    DB::rollback();
                }
            }
}
