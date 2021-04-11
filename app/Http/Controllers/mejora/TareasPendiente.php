<?php

namespace App\Http\Controllers\mejora;

use App\Http\Controllers\Controller;
use App\Models\mejora\Acta;
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
                                    //dd($consultas);
            
             
                                
    
                    return view('pages.mejora.tareas_pendientes.index',[
                                            'empresa'=>$empresa,
                                            'consultas'=>$consultas
                                                ]);
                        
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
            
                 
                            $variable                     = Acta::findOrfail($id);
                     
                   	
                            $variable->compromiso   = ($request->get('compromiso')) ?      $request->get('compromiso') : '';	
                            $variable->ejecutable   = ($request->get('ejecutable')) ?      $request->get('ejecutable') : '';	
                            $variable->fecha_inicio_eje  = ($request->get('fecha_inicio_eje')) ? $request->get('fecha_inicio_eje') : '2021-01-01';	
                            $variable->fecha_final_eje   = ($request->get('fecha_final_eje')) ?  $request->get('fecha_final_eje') : '2021-01-01';
                            $variable->observaciones_ejecuccion      = ($request->get('observaciones_ejecuccion')) ?         $request->get('observaciones_ejecuccion') : '';	
                         
                            $variable->terminada    = ($request->get('terminada')) ?       $request->get('terminada') : '';	
                        
                
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
                            
                         
                            
            
            
                        DB::commit();
                        alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
                    
                    } catch (Exception $e) {
                        DB::rollback();
                        alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
                        
                    }
                    return Redirect::to('tareas_pendientes')->with('status','Se actualizó correctamente');
                }
            
            
        
   
    
    
    
}
