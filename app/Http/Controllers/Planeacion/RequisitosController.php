<?php

namespace App\Http\Controllers\Planeacion;

use App\Http\Controllers\Controller;
use App\Models\Planeacion\Requisitos;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class RequisitosController extends Controller
{
  
      public function __construct()
        {
            $this->middleware('auth');
        }
        public function index()
        {
    
                    $empresa = DB::table('tbl_empresa as e')
                            ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                            ->where('e.bool_estado','=','1')
                            ->first();

                    $Productos = DB::table('tbl_empresa as e')
                            ->join('tbl_producto as p','p.fk_empresa','=','e.id_empresa')
                            ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                            ->where('e.bool_estado','=','1')
                            ->where('p.bool_estado','=','1')
                            ->get();
    
                            
                    $procesos      = DB::table('tbl_procesos as p')
                            ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                            ->join('users as u','u.id','=','e.fk_usuario')
                            ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                            ->where('p.bool_estado',  '=','1')
                            ->where('e.bool_estado',  '=','1')
                            ->orderby('id_proceso', 'DESC')->get();
    
                    $planeaciones =  DB::table('tbl_empresa as e')
                            ->join('tbl_plane_planificacion as i','i.fk_empresa','=','e.id_empresa')
                            ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                            ->where('e.bool_estado','=','1')
                            ->where('i.bool_estado','=','1')
                            ->paginate(20);
                            //dd($planeaciones);
    
            return view('pages.planeacion.requisitos.index',[
                'Productos' => $Productos,
                'empresa' => $empresa,
               ]);
        }
    
        public function store(Request $request)
        {
            try {
                //dd($request);
                DB::beginTransaction();
    
                $variable                    = new Requisitos();
              
                $variable->proceso      =$request->get('proceso');
                $variable->variable     =$request->get('variable');
                $variable->unidad       =$request->get('unidad');
                $variable->control      =$request->get('control');
                $variable->operacion    =$request->get('operacion');
                $variable->frecuencia   =$request->get('frecuencia');
                $variable->seguimiento  =$request->get('seguimiento');
                $variable->fk_empresa   =$request->get('fk_empresa');
              
    
    
                $variable->material  = ($request->get('material')) ?  $request->get('material') : '';
                $variable->li  = ($request->get('li')) ?  $request->get('li') : '';
                $variable->lc  = ($request->get('lc')) ?  $request->get('lc') : '';
                $variable->ls  = ($request->get('ls')) ?  $request->get('ls') : '';
                $variable->metodo    = ($request->get('metodo')) ?  $request->get('metodo') : '';
                $variable->registro  = ($request->get('registro')) ?  $request->get('registro') : '';
                $variable->instrumento  = ($request->get('instrumento')) ?  $request->get('instrumento') : '';
               
              
                $variable->bool_estado           = '1';
                $variable->save();
    
    
                DB::commit();
                alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
            
            } catch (Exception $e) {
                DB::rollback();
                alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
                
            }
    
            return Redirect::to('planeacio_control/')->with('status','Se guardó correctamente');
        }
    
     
       
        public function edit($id)
        {
            $planeacion = Requisitos::findOrfail($id);
       
    
            $empresa = DB::table('tbl_empresa as e')
            ->where('e.fk_usuario','=',''.Auth::User()->id.'')
            ->where('e.bool_estado','=','1')
            ->first();
    
            
            $procesos      = DB::table('tbl_procesos as p')
                            ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                            ->join('users as u','u.id','=','e.fk_usuario')
                            ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                            ->where('p.bool_estado',  '=','1')
                            ->where('e.bool_estado',  '=','1')
                            ->orderby('id_proceso', 'DESC')->get();
            
            return view('pages.planeacion.planeacio_control.edit',[
                'planeacion'=>$planeacion,
                'empresa'=>$empresa,
                'procesos'=>$procesos,
                ]);
        }
    
      
        public function update(Request $request, $id)
        {
            try {
                DB::beginTransaction();
    
                    $variable               = Requisitos::findOrfail($id);
                    $variable->proceso      =$request->get('proceso');
                    $variable->variable     =$request->get('variable');
                    $variable->unidad       =$request->get('unidad');
                    $variable->control      =$request->get('control');
                    $variable->operacion    =$request->get('operacion');
                    $variable->frecuencia   =$request->get('frecuencia');
                    $variable->seguimiento  =$request->get('seguimiento');
                    $variable->fk_empresa   =$request->get('fk_empresa');
                  
        
        
                    $variable->material  = ($request->get('material')) ?  $request->get('material') : '';
                    $variable->li  = ($request->get('li')) ?  $request->get('li') : '';
                    $variable->lc  = ($request->get('lc')) ?  $request->get('lc') : '';
                    $variable->ls  = ($request->get('ls')) ?  $request->get('ls') : '';
                    $variable->metodo    = ($request->get('metodo')) ?  $request->get('metodo') : '';
                    $variable->registro  = ($request->get('registro')) ?  $request->get('registro') : '';
                    $variable->instrumento  = ($request->get('instrumento')) ?  $request->get('instrumento') : '';
    
    
                $variable->update();
    
                
             
    
    
                DB::commit();
                alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
            
            } catch (Exception $e) {
                DB::rollback();
                alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
                
            }
    
            return Redirect::to('planeacio_control/')->with('status','Se actualizó correctamente');
        }
    
    
        public function destroy($id)
        {
            try {
                DB::beginTransaction();
    
                $variable                   = Requisitos::findOrfail($id);
                $variable->bool_estado      = '0';
                $variable->update();
              
    
    
                DB::commit();
                alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
            
            } catch (Exception $e) {
                DB::rollback();
                alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
                
            }
            return Redirect::to('planeacio_control/')->with('status','Se elimiinó correctamente');
         
        
        }
}
