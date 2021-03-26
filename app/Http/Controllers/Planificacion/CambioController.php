<?php

namespace App\Http\Controllers\Planificacion;

use App\Http\Controllers\Controller;
use App\Models\Planificacion\Cambio;
use App\Models\Planificacion\SistemaGestion;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class CambioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
  
    public function index($fk_proceso)
    {
        
        $cargos      = DB::table('tbl_empresa as e')
                    ->join('tbl_areas as a','a.fk_empresa','=','e.id_empresa')
                    ->join('tbl_cargos as c','c.fk_area','=','a.id_area')
                    ->join('users as u','u.id','=','e.fk_usuario')
                    ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                    ->where('a.bool_estado',  '=','1')
                    ->where('c.bool_estado',  '=','1')->get();

        $usuarios      = DB::table('users as u')
                        ->where('u.id',  '=',''.Auth::User()->id.'')->get();
                    
        $sistema_gestiones = DB::table('tbl_empresa as e')
                        ->join('tbl_sistemas_gestion as sg','sg.fk_empresa','=','e.id_empresa')
                        ->join('users as u','u.id','=','e.fk_usuario')
                        ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                        ->where('sg.bool_estado',  '=','1')->get();

      

      
            $planificaciones = DB::table('tbl_empresa as e')
                        ->join('users as u','u.id','=','e.fk_usuario')
                        ->join('tbl_procesos as p','p.fk_empresa','=','e.id_empresa')
                        ->join('tbl_pla_cambio as c','c.fk_proceso','=','p.id_proceso')
                        ->join('users as usuario','usuario.id','=','c.fk_usuario')
                        ->join('tbl_cargos as car','car.id_cargo','=','c.fk_cargo')
                        ->join('tbl_pla_gestion_cambio as gc','gc.fk_cambio','=','c.id_cambio')
                        ->join('tbl_sistemas_gestion as g','g.id_sisgestion','=','gc.fk_gestion')
                        ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                        ->where('c.fk_proceso',     '=',''.$fk_proceso.'')
                        ->where('c.bool_estado',  '=','1')
                        ->where('p.bool_estado',  '=','1')
                        ->where('car.bool_estado',  '=','1')
                        ->paginate(10);
                     
          //dd($planificaciones);
        
        return view('pages.planificacion.cambio.analisisCambio.index',[
                    'planificaciones'  => $planificaciones,
                    'cargos'  => $cargos,
                    'usuarios'  => $usuarios,
                    'sistema_gestiones'  => $sistema_gestiones,
                    'fk_proceso'  => $fk_proceso,
                    ]);
    }

  
    public function index_procesos()
    {
        $procesos      = DB::table('tbl_procesos as p')
                        ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                        ->join('users as u','u.id','=','e.fk_usuario')
                        ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                        ->where('p.bool_estado',  '=','1')
                        ->where('e.bool_estado',  '=','1')
                        ->orderby('id_proceso', 'DESC')->get();
                        //dd($procesos);

        return view('pages.planificacion.cambio.procesos.index',[
        'procesos'  => $procesos,
        ]);
    }


    public function store(Request $request)
    {
        try {
            //dd($request);
            DB::beginTransaction();
           $fk_proceso = $request->get('fk_proceso');

            $variable                    = new Cambio();
            $variable->fecha_cambio      = $request->get('fecha_cambio');
            $variable->cambio_interno        = $request->get('cambio_interno');
            $variable->cambio_externo      = $request->get('cambio_externo');

            if ($request->get('otro_interno')) {
                $variable->otro_interno           = $request->get('otro_interno');
            }else{
                $variable->otro_interno  ='';
            }
            if ($request->get('otro_externo')) {
                $variable->otro_externo           = $request->get('otro_externo');
            }else{
                $variable->otro_externo  ='';
            }
            
            $variable->actividad            = $request->get('actividad');
            $variable->responsable         = $request->get('responsable');
            $variable->tiempo              = $request->get('tiempo');
            $variable->recursos            = $request->get('recursos');
            $variable->seguimiento          = $request->get('seguimiento');
            $variable->validad              = $request->get('validad');
            $variable->bool_estado           = '1';
            $variable->fk_proceso             = $request->get('fk_proceso');
            $variable->fk_usuario             = $request->get('fk_usuario');
            $variable->fk_cargo             = $request->get('fk_cargo');
            $variable->save();

           
            $usuario_relacionados = $request->get('usuarios_relacionados');
             for ($i=0; $i <  count($usuario_relacionados) ; $i++) {

               $usuario = new SistemaGestion();
               $usuario->fk_cambio = $variable->id_cambio;
               $usuario->fk_gestion = $usuario_relacionados[$i];
               $usuario->save();
            }


            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('planificardor_cambio/'.$fk_proceso)->with('status','Se guardó correctamente');
    }

 
   
    public function edit($id)
    {
        $cambios = Cambio::findOrfail($id);
        $fk_proceso=$cambios->fk_proceso;

        $cargos      = DB::table('tbl_empresa as e')
                    ->join('tbl_areas as a','a.fk_empresa','=','e.id_empresa')
                    ->join('tbl_cargos as c','c.fk_area','=','a.id_area')
                    ->join('users as u','u.id','=','e.fk_usuario')
                    ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                    ->where('a.bool_estado',  '=','1')
                    ->where('c.bool_estado',  '=','1')->get();

        $sistema_gestiones = DB::table('tbl_empresa as e')
                            ->join('tbl_sistemas_gestion as sg','sg.fk_empresa','=','e.id_empresa')
                            ->join('users as u','u.id','=','e.fk_usuario')
                            ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                            ->where('sg.bool_estado',  '=','1')->get();

        $usuarios      = DB::table('users as u')
                        ->where('u.id',  '=',''.Auth::User()->id.'')->get();
        
        return view('pages.planificacion.cambio.analisisCambio.edit',[
            'cambios'=>$cambios,
            'fk_proceso'=>$fk_proceso,
            'sistema_gestiones'=>$sistema_gestiones,
            'cargos'=>$cargos,
            'usuarios'=>$usuarios,
            ]);
    }

  
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $variable                   = Cambio::findOrfail($id);
            $fk_proceso=$variable->fk_proceso;
            $variable->fecha_cambio      = $request->get('fecha_cambio');
            $variable->cambio_interno        = $request->get('cambio_interno');
            $variable->cambio_externo      = $request->get('cambio_externo');

            if ($request->get('otro_interno')) {
                $variable->otro_interno           = $request->get('otro_interno');
            }else{
                $variable->otro_interno  ='';
            }
            if ($request->get('otro_externo')) {
                $variable->otro_externo           = $request->get('otro_externo');
            }else{
                $variable->otro_externo  ='';
            }
            
            $variable->actividad            = $request->get('actividad');
            $variable->responsable         = $request->get('responsable');
            $variable->tiempo              = $request->get('tiempo');
            $variable->recursos            = $request->get('recursos');
            $variable->seguimiento          = $request->get('seguimiento');
            $variable->validad              = $request->get('validad');
            $variable->bool_estado           = '1';
            $variable->fk_proceso             = $request->get('fk_proceso');
            $variable->fk_usuario             = $request->get('fk_usuario');
            $variable->fk_cargo             = $request->get('fk_cargo');
            $variable->update();

            
            $delete = SistemaGestion::where('fk_cambio',  '=',$id);
            $delete->delete();

            $usuario_relacionados = $request->get('usuarios_relacionados');
            for ($i=0; $i <  count($usuario_relacionados) ; $i++) {

              $usuario = new SistemaGestion();
              $usuario->fk_cambio = $id;
              $usuario->fk_gestion = $usuario_relacionados[$i];
              $usuario->save();
           }


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('planificardor_cambio/'.$fk_proceso)->with('status','Se actualizó correctamente');
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $variable                   = Cambio::findOrfail($id);
            $variable->bool_estado      = '0';
            $variable->update();
            $fk_proceso=$variable->fk_proceso;


            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('planificardor_cambio/'.$fk_proceso)->with('status','Se elimiinó correctamente');
     
    
    }
}
