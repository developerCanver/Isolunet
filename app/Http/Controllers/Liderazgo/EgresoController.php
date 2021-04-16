<?php

namespace App\Http\Controllers\Liderazgo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Liderazgo\Egreso;
use App\Models\Parametrizacion\Empresa;
class EgresoController extends Controller
{

      
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request ,$id_empresa=null)
    {
     
        $egresos = DB::table('tbl_empresa as e')
                    ->join('tbl_contexto_egresos as i','i.fk_empresa','=','e.id_empresa')
                    ->where('id_empresa','=',$id_empresa)
                    ->where('e.bool_estado','=','1')
                    ->where('i.bool_estado','=','1')->get();

        $empresa_selecionada = Empresa::where('id_empresa','=',$id_empresa)
                    ->where('bool_estado','=','1')
                    ->first();

            return view('pages.liderazgo.presupuesto.egresos.index',[
                        'egresos'=>$egresos,
                        'empresa_selecionada'=>$empresa_selecionada,
                        ]);

    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $proyectado=$request->get('proyectado_egreso');
            $real=$request->get('real_egreso');
            $id_empresa=$request->get('empresa');

            $guardar                     = new Egreso();
            $guardar->nom_egreso         = $request->get('nom_egreso');
            $guardar->proyectado_egreso  = $proyectado;
            $guardar->bool_estado         = '1';
            $guardar->fk_empresa          = $request->get('empresa');
            $guardar->real_egreso        =$real; 

            $total_diferencia=$real-$proyectado;
            $diferencia=0;
            if (($real-$proyectado) != 0) {
                $diferencia=(($real-$proyectado)/$proyectado)*100;
            }
           

            $guardar->total_diferencia_egreso  =$total_diferencia;
            $guardar->diferencia_egreso        =$diferencia;
          
          
            $guardar->save();
            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            
        }
        
        return Redirect::to('egreso/'.$id_empresa)->with('status','Se guardó correctamente');
    }

    public function edit($id)
    {
        $egreso = egreso::findOrfail($id);

        $empresa = DB::table('tbl_empresa as e')
                    ->join('tbl_contexto_egresos as i','i.fk_empresa','=','e.id_empresa')
                    ->where('i.id_egreso','=',''.$id.'')
                    ->first();
       
                    
        return view('pages.liderazgo.presupuesto.egresos.edit_egreso',[
                        'empresa'=>$empresa,
                        'egreso'=>$egreso
                        ]);
    }
   
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();


            $proyectado=$request->get('proyectado_egreso');
            $real=$request->get('real_egreso');
            $id_empresa=$request->get('empresa');

            $actualizar                      = egreso::findOrfail($id);
            $actualizar->nom_egreso         = $request->get('nom_egreso');
            $actualizar->proyectado_egreso  = $proyectado;
            $actualizar->real_egreso        =$real; 

            $total_diferencia=$real-$proyectado;
            $diferencia=(($real-$proyectado)/$proyectado)*100;

            $actualizar->total_diferencia_egreso  =$total_diferencia;
            $actualizar->diferencia_egreso        =$diferencia;
            $actualizar->update();

            


                DB::commit();
                alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');

            
            } catch (Exception $e) {
                DB::rollback();
                alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
                
             }
          return Redirect::to('egreso/'.$id_empresa)->with('status','Se actualizó correctamente');
   
    }


    public function destroy(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $empresa = DB::table('tbl_empresa as e')
            ->join('tbl_contexto_egresos as i','i.fk_empresa','=','e.id_empresa')
            ->where('i.id_egreso','=',''.$id.'')
            ->first();
            $id_empresa= $empresa->id_empresa;
           
            $ocultar                   = egreso::findOrfail($id);
            $ocultar->bool_estado      = '0';
            $ocultar->update();

           
            DB::commit();
            alert()->success('Se ha Elimino correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('egreso/'.$id_empresa)->with('status','Se actualizó correctamente');

      
    }
  

}
