<?php

namespace App\Http\Controllers\mejora;

use App\Http\Controllers\Controller;
use App\Models\mejora\Acta;
use App\Models\mejora\ActaAsistente;
use App\Models\mejora\ActaTemas;
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
                $empresa = DB::table('tbl_empresa as e')
                                ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                                ->where('e.bool_estado','=','1')
                                ->first();

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

                $cargos = DB::table('tbl_areas as a')
                                ->join('tbl_empresa as em','a.fk_empresa','=','em.id_empresa')
                                ->join('tbl_cargos as e','a.id_area','=','e.fk_area')
                                ->where('em.fk_usuario','=',''.Auth::User()->id.'')
                                ->where('e.bool_estado','=','1')
                                ->where('em.bool_estado','=','1')
                                ->where('a.bool_estado','=','1')
                                ->orderby('em.razon_social','desc')
                                ->get();  
                $usuarios = DB::table('users as u')
                                ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                                ->where('e.id_empresa','=',''.Auth::User()->fk_empresa.'')
                                ->where('e.bool_estado','=','1')
                                ->get();
        
                $consultas =  DB::table('tbl_empresa as e')
                                ->join('tbl_mejo_acta as a','a.fk_empresa','=','e.id_empresa')
                                ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                                ->where('a.bool_estado','=','1')
                                ->paginate(20);
                                //dd($consultas);
        
         
                            

                return view('pages.mejora.acta.index',[
                                        'empresa'=>$empresa,
                                        'gestiones'=>$gestiones,
                                        'procesos'=>$procesos,
                                        'consultas'=>$consultas,
                                        'usuarios'=>$usuarios,
                                        'cargos'=>$cargos,
                                            ]);
                    
            }
        
        
            public function store(Request $request)
            {
            try {
                        DB::beginTransaction();
        
                        $variable 				  = new Acta();
                	
                        $variable->acta         = ($request->get('acta')) ?            $request->get('acta') : '';	
                        $variable->gestion      = ($request->get('gestion')) ?         $request->get('gestion') : '';	
                        $variable->proceso      = ($request->get('proceso')) ?         $request->get('proceso') : '';	
                        $variable->tipo_acta    = ($request->get('tipo_acta')) ?       $request->get('tipo_acta') : '';	
                        $variable->fecha_acta   = ($request->get('fecha_acta')) ?      $request->get('fecha_acta') : '';	
                        $variable->lugar        = ($request->get('lugar')) ?           $request->get('lugar') : '';	
                        $variable->hora_acta    = ($request->get('hora_acta')) ?       $request->get('hora_acta') : '';	
                        $variable->fecha_proxima = ($request->get('fecha_proxima')) ?  $request->get('fecha_proxima') : '';	
                        $variable->registrado   = ($request->get('registrado')) ?      $request->get('registrado') : '';	
                        $variable->observaciones_acta = ($request->get('observaciones_acta')) ? $request->get('observaciones_acta') : '';	
                        $variable->accion       = ($request->get('accion')) ?          $request->get('accion') : '';	
                        $variable->responsable  = ($request->get('responsable')) ?     $request->get('responsable') : '';	
                        $variable->fecha_inicio_acc  = ($request->get('fecha_inicio_acc')) ? $request->get('fecha_inicio_acc') : '';	
                        $variable->fecha_final_acc   = ($request->get('fecha_final_acc')) ? $request->get('fecha_final_acc') : '';	
                        $variable->compromiso   = ($request->get('compromiso')) ?      $request->get('compromiso') : '';	
                        $variable->ejecutable   = ($request->get('ejecutable')) ?      $request->get('ejecutable') : '';	
                        $variable->fecha_inicio_eje  = ($request->get('fecha_inicio_eje')) ? $request->get('fecha_inicio_eje') : '2021-01-01';	
                        $variable->fecha_final_eje   = ($request->get('fecha_final_eje')) ?  $request->get('fecha_final_eje') : '2021-01-01';
                        $variable->observaciones_ejecuccion = ($request->get('observaciones_ejecuccion')) ? $request->get('observaciones_ejecuccion') : '';	
                     
                        $variable->terminada    = ($request->get('terminada')) ?       $request->get('terminada') : '';	
                    
                        $variable->fk_empresa   =  $request->get('fk_empresa');	
                        $variable->bool_estado  = '1';
                        $variable->terminada  = '0';
                               
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
                       
        
                        for ($i=0; $i <  count($asistente) ; $i++) {
        
                            $tiporequisito = new ActaAsistente();
                            $tiporequisito->asistente    =    $asistente[$i];
                            $tiporequisito->cargo  =    $cargo[$i];
        
                            $tiporequisito->fk_acta       = $variable->id_acta;
                            $tiporequisito->bool_estado    = '1';
                            $tiporequisito->save();
                        }

                        $tema     = $request->get('tema');
                        $comentario     = $request->get('comentario');
                      // dd(count($asistente));
        
                        for ($i=0; $i <  count($tema) ; $i++) {
        
                            $tiporequisito = new ActaTemas();
                            $tiporequisito->tema    =    $tema[$i];
                            $tiporequisito->comentario  =    $comentario[$i];
        
                            $tiporequisito->fk_acta       = $variable->id_acta;
                            $tiporequisito->bool_estado    = '1';
                            $tiporequisito->save();
                        }

                        

        
                        DB::commit();
                        return Redirect::to('acta')->with('status','Se guardó correctamente');
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

                $cargos = DB::table('tbl_areas as a')
                                ->join('tbl_empresa as em','a.fk_empresa','=','em.id_empresa')
                                ->join('tbl_cargos as e','a.id_area','=','e.fk_area')
                                ->where('em.fk_usuario','=',''.Auth::User()->id.'')
                                ->where('e.bool_estado','=','1')
                                ->where('em.bool_estado','=','1')
                                ->where('a.bool_estado','=','1')
                                ->orderby('em.razon_social','desc')
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
                         
                return view('pages.mejora.acta.edit',[
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
                 
                        $variable->acta         = ($request->get('acta')) ?            $request->get('acta') : '';	
                        $variable->gestion      = ($request->get('gestion')) ?         $request->get('gestion') : '';	
                        $variable->proceso      = ($request->get('proceso')) ?         $request->get('proceso') : '';	
                        $variable->tipo_acta    = ($request->get('tipo_acta')) ?       $request->get('tipo_acta') : '';	
                        $variable->fecha_acta   = ($request->get('fecha_acta')) ?      $request->get('fecha_acta') : '';	
                        $variable->lugar        = ($request->get('lugar')) ?           $request->get('lugar') : '';	
                        $variable->hora_acta    = ($request->get('hora_acta')) ?       $request->get('hora_acta') : '';	
                        $variable->fecha_proxima = ($request->get('fecha_proxima')) ?  $request->get('fecha_proxima') : '';	
                        $variable->registrado   = ($request->get('registrado')) ?      $request->get('registrado') : '';	
                        $variable->observaciones_acta = ($request->get('observaciones_acta')) ? $request->get('observaciones_acta') : '';	
                        $variable->accion       = ($request->get('accion')) ?          $request->get('accion') : '';	
                        $variable->responsable  = ($request->get('responsable')) ?     $request->get('responsable') : '';	
                        $variable->fecha_inicio_acc  = ($request->get('fecha_inicio_acc')) ? $request->get('fecha_inicio_acc') : '';	
                        $variable->fecha_final_acc   = ($request->get('fecha_final_acc')) ? $request->get('fecha_final_acc') : '';	
                        $variable->compromiso   = ($request->get('compromiso')) ?      $request->get('compromiso') : '';	
                        $variable->ejecutable   = ($request->get('ejecutable')) ?      $request->get('ejecutable') : '';	
                        $variable->fecha_inicio_eje  = ($request->get('fecha_inicio_eje')) ? $request->get('fecha_inicio_eje') : '';	
                        $variable->fecha_final_eje   = ($request->get('fecha_final_eje')) ?  $request->get('fecha_final_eje') : '';	
                        $variable->observaciones_ejecuccion      = ($request->get('observaciones_ejecuccion')) ?         $request->get('observaciones_ejecuccion') : '';	
                     
                        $variable->terminada    = ($request->get('terminada')) ?       $request->get('terminada') : '';	
                    
            
                        $variable->terminada  = '0';

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
                        $cargo     = $request->get('fk_cargor');
                       
        
                        for ($i=0; $i <  count($asistente) ; $i++) {
        
                            $tiporequisito = new ActaAsistente();
                            $tiporequisito->asistente    =    $asistente[$i];
                            $tiporequisito->cargo  =    $cargo[$i];
        
                            $tiporequisito->fk_acta       = $variable->id_acta;
                            $tiporequisito->bool_estado    = '1';
                            $tiporequisito->save();
                        }

                        ActaTemas::where('fk_acta', $id)->delete();

                        $tema     = $request->get('tema');
                        $comentario     = $request->get('comentario');
                      
        
                        for ($i=0; $i <  count($tema) ; $i++) {
        
                            $tiporequisito = new ActaTemas();
                            $tiporequisito->tema    =    $tema[$i];
                            $tiporequisito->comentario  =    $comentario[$i];
        
                            $tiporequisito->fk_acta       = $variable->id_acta;
                            $tiporequisito->bool_estado    = '1';
                            $tiporequisito->save();
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
                    // ActaAsistente::where('fk_acta', $id)->delete();
                    // ActaTemas::where('fk_acta', $id)->delete();
                  
                    $variable 					= Acta::findOrfail($id);
        
                    $mi_imagen = public_path().'/archivos/acta/'.$variable -> archivo;
               
                    if (is_file($mi_imagen)) {
                        unlink(public_path().'/archivos/acta/'.$variable -> archivo);
                    
                    }
                    $variable -> delete();
                  
        
        
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
