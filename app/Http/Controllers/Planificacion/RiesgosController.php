<?php

namespace App\Http\Controllers\Planificacion;

use App\Http\Controllers\Controller;
use App\Models\Planificacion\Riesgos;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;


class RiesgosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $procesos      = DB::table('tbl_procesos as p')
                        ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                        ->join('users as u','u.id','=','e.fk_usuario')
                        ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                        ->where('p.bool_estado',  '=','1')
                        ->where('e.bool_estado',  '=','1')
                        ->orderby('id_proceso', 'DESC')->get();
                        //dd($procesos);

        return view('pages.planificacion.matriz-riesgos.index',[
        'procesos'  => $procesos,
        ]);
    }
    
    public function index_procesos($id_proceso)
    {
       
        $riesgos      = DB::table('tbl_procesos as p')
                        ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                        ->join('tbl_pla_matriz_riesgo as m','m.fk_proceso','=','p.id_proceso')
                        ->join('users as u','u.id','=','e.fk_usuario')
                        ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                        ->where('p.id_proceso',     '=',''.$id_proceso.'')
                        ->where('p.bool_estado',  '=','1')
                        ->where('e.bool_estado',  '=','1')
                        ->where('m.bool_estado',  '=','1')
                        ->orderby('id_proceso', 'DESC')->get();

        $proceso      = DB::table('tbl_procesos as p')                       
        
                        ->where('id_proceso',$id_proceso  )
                        ->first();

                        //dd($proceso);

        return view('pages.planificacion.riesgos.index',[
        'riesgos'  => $riesgos,
        'proceso'  => $proceso,
        'id_proceso'  => $id_proceso,
        ]);
    }


   
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
           $id_proceso = $request->get('fk_proceso');

            $variable               = new Riesgos();
            $variable->nom_causa    = $request->get('nom_causa');
            $variable->bool_estado  = '1';
            $variable->fk_proceso      = $request->get('fk_proceso');
            $variable->save();


            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('matriz_riesgos/procesos/'.$id_proceso)->with('status','Se guardó correctamente');
    }

  

    public function edit($id)
    {
        $riesgos = Riesgos::findOrfail($id);
        $id_proceso=$riesgos->fk_proceso;
        
        return view('pages.planificacion.riesgos.edit',['id_proceso'=>$id_proceso,'riesgos'=>$riesgos]);
    }

   
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $variable                   = Riesgos::findOrfail($id);
            $variable->nom_causa    = $request->get('nom_causa');
            $variable->update();

            $id_proceso=$variable->fk_proceso;


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('matriz_riesgos/procesos/'.$id_proceso)->with('status','Se actualizó correctamente');
    }

  
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $variable                   = Riesgos::findOrfail($id);
            $variable->bool_estado      = '0';
            $variable->update();
            $id_proceso=$variable->fk_proceso;


            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('matriz_riesgos/procesos/'.$id_proceso)->with('status','Se elimiinó correctamente');
     
    }
}
