<?php

namespace App\Http\Controllers\mejora;

use App\Http\Controllers\Controller;
use App\Models\mejora\Acta;
use App\Models\Mejora\Anomalias;
use App\Models\Mejora\Tarea;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class TareasPendiente extends Controller
{


                public function __construct()
                {
                    $this->middleware('auth');
                }
            
                public function index(Request $request)
                {
                    $empresa = DB::table('tbl_empresa as e')
                                    ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                                    ->where('e.bool_estado','=','1')
                                    ->first();
    
                 
            
                    $consultas =  DB::table('tbl_empresa as e')
                                    ->join('tbl_mejo_acta as a','a.fk_empresa','=','e.id_empresa')
                                    ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                                    ->where('a.bool_estado','=','1')
                                    ->where('a.terminada','=','0')
                                    ->paginate(20);

                    $anomalias =  DB::table('tbl_empresa as e')
                                    ->join('tbl_mejora_anomalia as a','a.fk_empresa','=','e.id_empresa')
                                    ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                                    ->where('a.bool_estado_anomalia','=','1')
                                    ->where('a.terminada_anomalia','=','0')
                                    ->paginate(20);
                                  

                    $usuarios = DB::table('users as u')
                                    ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                                    ->where('e.id_empresa','=',''.Auth::User()->fk_empresa.'')
                                    ->where('e.bool_estado','=','1')
                                    ->get();
                                   // dd($consulta_anomalias);

                  $adicionales =  DB::table('tbl_empresa as e')
                                   ->join('tbl_mejo_tareas as a','a.fk_empresa','=','e.id_empresa')
                                   ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                                   ->where('a.terminada','=','0')
                                   ->paginate(20);
            
             
                                
    
                    return view('pages.mejora.tareas_pendientes.index',[
                                            'empresa'=>$empresa,
                                            'anomalias'=>$anomalias,
                                            'consultas'=>$consultas,
                                            'usuarios'=>$usuarios,
                                            'adicionales'=>$adicionales,
                                                ]);
                        
                }
                public function store(Request $request)
                {
                try {
                            DB::beginTransaction();
            
                            $variable 				  = new Tarea();

                            $variable->acciones_ta      = ($request->get('acciones_ta')) ?         $request->get('acciones_ta') : ''; 
                            $variable->responsable_ta   = ($request->get('responsable_ta')) ?      $request->get('responsable_ta') : ''; 
                            $variable->fechaini         = ($request->get('fechaini')) ?            $request->get('fechaini') : ''; 
                            $variable->fechafin         = ($request->get('fechafin')) ?            $request->get('fechafin') : ''; 
                            $variable->compromiso_ta    = ($request->get('compromiso_ta')) ?       $request->get('compromiso_ta') : ''; 
                            $variable->accion_ta        = ($request->get('accion_ta')) ?           $request->get('accion_ta') : ''; 
                            $variable->fecha_ini_ta     = ($request->get('fecha_ini_ta')) ?        $request->get('fecha_ini_ta') : ''; 
                            $variable->fecha_fin_ta     = ($request->get('fecha_fin_ta')) ?        $request->get('fecha_fin_ta') : ''; 
                            $variable->archivo_ta       = ($request->get('archivo_ta')) ?          $request->get('archivo_ta') : ''; 
                            $variable->observaciones_ta = ($request->get('observaciones_ta')) ?    $request->get('observaciones_ta') : ''; 
    
                            $variable->fk_empresa   =  $request->get('fk_empresa');	
     
                            $variable->terminada  = '0';
                                   
                      
    
                            $variable->save();   
                            
                       
            
                            DB::commit();
                            return Redirect::to('tareas_pendientes')->with('status','Se guardó correctamente');
                        } catch (Exception $e) {
                            DB::rollback();
                    }
            
                }


                public function edit($id)
                {
            
                    $gestiones = DB::table('tbl_empresa as e')
                                    ->join('tbl_sistemas_gestion as g','g.fk_empresa','=','e.id_empresa')
                                    ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                                    ->where('e.bool_estado','=','1')
                                    ->where('g.bool_estado','=','1')
                                    ->orderby('str_nombre')->get();
                                    
                    $procesos = DB::table('tbl_empresa as e')
                                    ->join('tbl_procesos as p','p.fk_empresa','=','e.id_empresa')
                                    ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                                    ->where('e.bool_estado','=','1')
                                    ->where('p.bool_estado','=','1')
                                    ->get();
    

                    $usuarios = DB::table('users as u')
                                    ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                                    ->where('e.id_empresa','=',''.Auth::User()->fk_empresa.'')
                                    ->where('e.bool_estado','=','1')
                                    ->get();
                                    
                    $consulta   = Acta::findOrfail($id);
        
            
            
                    $empresa = DB::table('tbl_empresa as e')
                                ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                                ->where('e.bool_estado','=','1')
                                ->first();
                             
                    return view('pages.mejora.tareas_pendientes.edit',[
                        'empresa'=>$empresa,
                        'gestiones'=>$gestiones,
                        'procesos'=>$procesos,
                        'consulta'=>$consulta,
                        'usuarios'=>$usuarios,
                        ]);
                }
            
            
            
                public function update(Request $request, $id)
                {
                    try {
                        DB::beginTransaction();

                        // compromiso adicional 
                        if ($request->get('compromiso') == 'adicional' ) {
            
                            $variable                     = Tarea::findOrfail($id);

                            $variable->compromiso_ta    = ($request->get('compromiso_ta')) ?       $request->get('compromiso_ta') : ''; 
                            $variable->accion_ta        = ($request->get('accion_ta')) ?           $request->get('accion_ta') : ''; 
                            $variable->fecha_ini_ta     = ($request->get('fecha_ini_ta')) ?        $request->get('fecha_ini_ta') : ''; 
                            $variable->fecha_fin_ta     = ($request->get('fecha_fin_ta')) ?        $request->get('fecha_fin_ta') : ''; 
                            $variable->archivo_ta       = ($request->get('archivo_ta')) ?          $request->get('archivo_ta') : ''; 
                            $variable->observaciones_ta = ($request->get('observaciones_ta')) ?    $request->get('observaciones_ta') : ''; 
                            $variable->terminada  = '1';
                            if ($request->file('archivo_ta')) {
                                $archivo=$request->get('archivo_ta_anterior');
                                //nombre para eliinar el anterior archivo
                           
                                    $mi_archivo= public_path().'/archivos/acta/'.$archivo;
                        
                                    if (is_file($mi_archivo)) {
                                        //consulto si esta ena carpeta y borro
                                        unlink(public_path().'/archivos/acta/'.$archivo);
                                    }
                                
            
                                $file =$request->file('archivo_ta');
                                $name = time().$file->getClientOriginalName();
                                $file->move(public_path().'/archivos/acta/', $name);
                                $variable->archivo_ta =  $name;
                           
                            }
                            $variable->update(); 

                        }

                          // compromiso Acta 
                        if ($request->get('compromiso') == 'acta' ) {
            
                            $variable                     = Acta::findOrfail($id);

                            $variable->compromiso   = ($request->get('compromiso')) ?      $request->get('compromiso') : '';	
                            $variable->ejecutable   = ($request->get('ejecutable')) ?      $request->get('ejecutable') : '';	
                            $variable->fecha_inicio_eje  = ($request->get('fecha_inicio_eje')) ? $request->get('fecha_inicio_eje') : '2021-01-01';	
                            $variable->fecha_final_eje   = ($request->get('fecha_final_eje')) ?  $request->get('fecha_final_eje') : '2021-01-01';
                            $variable->observaciones_ejecuccion      = ($request->get('observaciones_ejecuccion')) ?         $request->get('observaciones_ejecuccion') : '';	
            
                
                            $variable->terminada  = '1';
    
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

                        }

                        // compromiso Anomalia
                        if ($request->get('anomalia') == 'anomalia' ) {
            
                            $variable                     = Anomalias::findOrfail($id);
                        }
                     
                   	
                         
                            
                         
                            
            
            
                        DB::commit();
                        alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
                    
                    } catch (Exception $e) {
                        DB::rollback();
                        alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
                        
                    }
                    return Redirect::to('tareas_pendientes')->with('status','Se actualizó correctamente');
                }
            
            
        
   
    
    
    
}
