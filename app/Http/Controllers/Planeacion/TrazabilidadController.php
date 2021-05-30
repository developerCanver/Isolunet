<?php

namespace App\Http\Controllers\Planeacion;

use App\Http\Controllers\Controller;
use App\Models\Planeacion\Trazabilidad;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class TrazabilidadController extends Controller
{

    
        public function __construct()
        {
            $this->middleware('auth');
        }
    
        public function index(Request $request)
        {
            $usuario = User::findOrfail(Auth::User()->id);
            $rolUsuario=$usuario->fk_rol;
            $id_empresa=$usuario->fk_empresa;

            $empresa = DB::table('users as u')
               ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
               ->where('u.id','=',Auth::User()->id)
               ->where('e.bool_estado','=','1')
               ->first();
         
    
            $consultas =  DB::table('tbl_empresa as e')
                            ->join('tbl_plane_trazabilidad as r','r.fk_empresa','=','e.id_empresa')
                            ->where('e.id_empresa',  $id_empresa)
                            ->where('r.bool_estado','=','1')
                            ->paginate(20);
                            //dd($consultas);
    
     
        
                        
            return view('pages.planeacion.trazabilidad.index',[
                                    'empresa'=>$empresa,
                                    'consultas'=>$consultas,
                                        ]);
                
        }
    
    
        public function store(Request $request)
        {
        try {
                    DB::beginTransaction();
    
                    $variable 				  = new Trazabilidad();
                    $variable->fecha_trazabilidad = ($request->get('fecha_trazabilidad')) ? $request->get('fecha_trazabilidad') : '';	
                    $variable->terminado         = ($request->get('terminado')) ?           $request->get('terminado') : '';	
                    $variable->cliente_destino   = ($request->get('cliente_destino')) ?     $request->get('cliente_destino') : '';	
                    $variable->orden_compra      = ($request->get('orden_compra')) ?        $request->get('orden_compra') : '';	
                    $variable->orden_produccion  = ($request->get('orden_produccion')) ?    $request->get('orden_produccion') : '';	
                    $variable->fecha_produccion  = ($request->get('fecha_produccion')) ?    $request->get('fecha_produccion') : '';	
                    $variable->unidades          = ($request->get('unidades')) ?            $request->get('unidades') : '';	
                    $variable->materias          = ($request->get('materias')) ?            $request->get('materias') : '';	
                    $variable->utilizados        = ($request->get('utilizados')) ?          $request->get('utilizados') : '';	
                    $variable->utilizados_lotes  = ($request->get('utilizados_lotes')) ?    $request->get('utilizados_lotes') : '';	
                    $variable->provedor_materias = ($request->get('provedor_materias')) ?   $request->get('provedor_materias') : '';	
                    $variable->cantidad          = ($request->get('cantidad')) ?            $request->get('cantidad') : '';	
                    $variable->destino_producto  = ($request->get('destino_producto')) ?    $request->get('destino_producto') : '';	
                    $variable->fecha_entrega     = ($request->get('fecha_entrega')) ?       $request->get('fecha_entrega') : '';	
                    $variable->cantidad_entrega  = ($request->get('cantidad_entrega')) ?    $request->get('cantidad_entrega') : '';	
                    $variable->entrega           = ($request->get('entrega')) ?             $request->get('entrega') : '';		
                    $variable->observaciones_trazabilidad = ($request->get('observaciones_trazabilidad')) ?  $request->get('observaciones_trazabilidad') : '';		
                    $variable->fk_empresa        =         $request->get('fk_empresa');	
                    

                    if ($request->file('archivo_tra')) {
                        $file =$request->file('archivo_tra');
                        $name = time().$file->getClientOriginalName();
                        $file->move(public_path().'/archivos/trazabilidad/', $name);
                    } else {
                        $name='';
                    }
                    $variable->archivo_tra =  $name;

                    $variable->bool_estado        = '1';
                    $variable->save();    
    
                    DB::commit();
                    return Redirect::to('trazabilidad')->with('status','Se guardó correctamente');
                } catch (Exception $e) {
                    DB::rollback();
            }
    
        }
    
    
        public function edit($id)
        {
    
            $consulta   = Trazabilidad::findOrfail($id);

    
    
            $empresa = DB::table('users as u')
                    ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                    ->where('u.id','=',Auth::User()->id)
                    ->where('e.bool_estado','=','1')
                    ->first();
                     
            return view('pages.planeacion.trazabilidad.edit',[
                'empresa'=>$empresa,
                'consulta'=>$consulta,
                ]);
        }
    
    
    
        public function update(Request $request, $id)
        {
            try {
                DB::beginTransaction();
    
         
                    $variable                     = Trazabilidad::findOrfail($id);
                    $variable->fecha_trazabilidad = ($request->get('fecha_trazabilidad')) ? $request->get('fecha_trazabilidad') : '';	
                    $variable->terminado         = ($request->get('terminado')) ?           $request->get('terminado') : '';	
                    $variable->cliente_destino   = ($request->get('cliente_destino')) ?     $request->get('cliente_destino') : '';	
                    $variable->orden_compra      = ($request->get('orden_compra')) ?        $request->get('orden_compra') : '';	
                    $variable->orden_produccion  = ($request->get('orden_produccion')) ?    $request->get('orden_produccion') : '';	
                    $variable->fecha_produccion  = ($request->get('fecha_produccion')) ?    $request->get('fecha_produccion') : '';	
                    $variable->unidades          = ($request->get('unidades')) ?            $request->get('unidades') : '';	
                    $variable->materias          = ($request->get('materias')) ?            $request->get('materias') : '';	
                    $variable->utilizados        = ($request->get('utilizados')) ?          $request->get('utilizados') : '';	
                    $variable->utilizados_lotes  = ($request->get('utilizados_lotes')) ?    $request->get('utilizados_lotes') : '';	
                    $variable->provedor_materias = ($request->get('provedor_materias')) ?   $request->get('provedor_materias') : '';	
                    $variable->cantidad          = ($request->get('cantidad')) ?            $request->get('cantidad') : '';	
                    $variable->destino_producto  = ($request->get('destino_producto')) ?    $request->get('destino_producto') : '';	
                    $variable->fecha_entrega     = ($request->get('fecha_entrega')) ?       $request->get('fecha_entrega') : '';	
                    $variable->cantidad_entrega  = ($request->get('cantidad_entrega')) ?    $request->get('cantidad_entrega') : '';	
                    $variable->entrega           = ($request->get('entrega')) ?             $request->get('entrega') : '';	
                    $variable->observaciones_trazabilidad = ($request->get('observaciones_trazabilidad')) ?  $request->get('observaciones_trazabilidad') : '';

                    if ($request->file('archivo_tra')) {
                        $archivo=$request->get('archivo_tra_anterior');
                   
                            $mi_archivo= public_path().'/archivos/trazabilidad/'.$archivo;
                
                            if (is_file($mi_archivo)) {
                                //consulto si esta ena carpeta y borro
                                unlink(public_path().'/archivos/trazabilidad/'.$archivo);
                            }
                        
    
                        $file =$request->file('archivo_tra');
                        $name = time().$file->getClientOriginalName();
                        $file->move(public_path().'/archivos/trazabilidad/', $name);
                        $variable->archivo_tra =  $name;
                   
                    }
                     $variable->update();
    
    
                DB::commit();
                alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
            
            } catch (Exception $e) {
                DB::rollback();
                alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
                
            }
            return Redirect::to('trazabilidad')->with('status','Se actualizó correctamente');
        }
    
    
        public function destroy($id)
        {
                try {
                DB::beginTransaction();
              
                $variable 					= Trazabilidad::findOrfail($id);
    
                $variable->bool_estado      = '0';
                $variable->update();
              
    
    
               DB::commit();
               return Redirect::to('trazabilidad')->with('status','Se eliminó correctamente');
            } catch (Exception $e) {
                DB::rollback();
            }
        }
}
