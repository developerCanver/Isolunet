<?php

namespace App\Http\Controllers\Planificacion;

use App\Http\Controllers\Controller;
use App\Models\Planificacion\RiesgosOportuno;
use App\Models\Planificacion\RiesgosOportunoRee;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class RiesgosOportunoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_oportuno($fk_riesgo)
    {
        
        $riesgos      = DB::table('tbl_procesos as p')
                            ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                            ->join('tbl_pla_matriz_riesgo as m','m.fk_proceso','=','p.id_proceso')
                            ->join('tbl_pla_riesgo_oportuno as rp','rp.fk_riesgo','=','m.id_riesgo')
                            ->join('users as u','u.id','=','e.fk_usuario')
                            ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                            ->where('m.id_riesgo',     '=',''.$fk_riesgo.'')
                            ->where('p.bool_estado',  '=','1')
                            ->where('rp.bool_estado',  '=','1')
                            ->where('e.bool_estado',  '=','1')
                            ->where('m.bool_estado',  '=','1')
                            ->orderby('id_proceso', 'DESC')->get();
                        //dd($riesgos);

                return view('pages.planificacion.riesgo-oportuno.index',[
                            'riesgos'  => $riesgos,
                            'fk_riesgo'  => $fk_riesgo,
                            ]);
    }
   
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            
           $id_proceso = $request->get('fk_riesgo');

            $variable                    = new RiesgosOportuno();
            $variable->nom_posivito      = $request->get('nom_posivito');
            $variable->nom_riesgo        = $request->get('nom_riesgo');
            $variable->nom_negativo      = $request->get('nom_negativo');
            $variable->control           = $request->get('control');
            $variable->probabilidad      = $request->get('probabilidad');
            $variable->impacto            = $request->get('impacto');
           
            $variable->ree_probabilidad      = $request->get('ree_probabilidad');
            $variable->ree_impacto           = $request->get('ree_impacto');
            $variable->nom_accion            = $request->get('nom_accion');
            $variable->nom_responsable       = $request->get('nom_responsable');
            $variable->nom_indicador         = $request->get('nom_indicador');
            $variable->bool_estado           = '1';
            $variable->fk_riesgo             = $request->get('fk_riesgo');
            $variable->save();


            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('riesgo_oportuno/'.$id_proceso)->with('status','Se guardó correctamente');
    }

  

    public function editar(Request $request, $id)
    {
        
        $riesgos = RiesgosOportuno::findOrfail($id);
        
        $id_proceso=$riesgos->fk_riesgo;
        
  
        return view('pages.planificacion.riesgo-oportuno.edit',[
                                 'id_proceso'=>$id_proceso,
                                'riesgos'=>$riesgos
            ]);
    }

   
   
    public function actualizar(Request $request)
    {
        try {
            DB::beginTransaction();
            $id=$request->get('id_riesgo_opurtuno');
            
            $id_proceso=$request->get('fk_proceso');
           

            $variable                   = RiesgosOportuno::findOrfail($id);
            $variable->nom_posivito      = $request->get('nom_posivito');
            $variable->nom_riesgo        = $request->get('nom_riesgo');
            $variable->nom_negativo      = $request->get('nom_negativo');
            $variable->control           = $request->get('control');
            $variable->probabilidad      = $request->get('probabilidad');
            $variable->impacto            = $request->get('impacto');
           

         
            $variable->ree_probabilidad      = $request->get('ree_probabilidad');
            $variable->ree_impacto           = $request->get('ree_impacto');
            $variable->nom_accion            = $request->get('nom_accion');
            $variable->nom_responsable       = $request->get('nom_responsable');
            $variable->nom_indicador         = $request->get('nom_indicador');
            
            $variable->update();



            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('riesgo_oportuno/'.$id_proceso)->with('status','Se actualizó correctamente');
    }

  
    public function destroy($id)
    {
        
        try {
            DB::beginTransaction();

            $variable                   = RiesgosOportuno::findOrfail($id);
            
            $variable->bool_estado      = '0';
            $variable->update();
            $id_proceso=$variable->fk_riesgo;


            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('riesgo_oportuno/'.$id_proceso)->with('status','Se elimiinó correctamente');
  
     
    }
}
