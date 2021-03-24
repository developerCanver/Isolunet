<?php

namespace App\Http\Controllers\Liderazgo;
namespace App\Http\Controllers\Liderazgo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Liderazgo\Ingreso;
use App\Models\Parametrizacion\Empresa;

class IngresoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request ,$id_empresa=null)
    {
     
        $ingresos = DB::table('tbl_empresa as e')
                    ->join('tbl_contexto_ingresos as i','i.fk_empresa','=','e.id_empresa')
                    ->where('id_empresa','=',$id_empresa)
                    ->where('e.bool_estado','=','1')
                    ->where('i.bool_estado','=','1')->get();

        $empresa_selecionada = Empresa::where('id_empresa','=',$id_empresa)
                    ->where('bool_estado','=','1')
                    ->first();

            return view('pages.liderazgo.presupuesto.ingresos.index',[
                        'ingresos'=>$ingresos,
                        'empresa_selecionada'=>$empresa_selecionada,
                        ]);

    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $proyectado=$request->get('proyectado_ingreso');
            $real=$request->get('real_ingreso');
            $id_empresa=$request->get('empresa');

            $guardar                      = new Ingreso();
            $guardar->nom_ingreso         = $request->get('nom_ingreso');
            $guardar->proyectado_ingreso  = $proyectado;
            $guardar->bool_estado         = '1';
            $guardar->fk_empresa          = $request->get('empresa');
            $guardar->real_ingreso        =$real; 

            $total_diferencia=$real-$proyectado;
            $diferencia=(($real-$proyectado)/$proyectado)*100;

            $guardar->total_diferencia_ingreso  =$total_diferencia;
            $guardar->diferencia_ingreso        =$diferencia;
          
            $guardar->save();
            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            
        }
        
        return Redirect::to('ingreso/'.$id_empresa)->with('status','Se guardó correctamente');
    }

    public function edit($id)
    {
        $ingreso = Ingreso::findOrfail($id);

        $empresa = DB::table('tbl_empresa as e')
                    ->join('tbl_contexto_ingresos as i','i.fk_empresa','=','e.id_empresa')
                    ->where('i.id_ingreso','=',''.$id.'')
                    ->first();
       
                    
        return view('pages.liderazgo.presupuesto.ingresos.edit_ingreso',[
                        'empresa'=>$empresa,
                        'ingreso'=>$ingreso
                        ]);
    }
   
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();


            $proyectado=$request->get('proyectado_ingreso');
            $real=$request->get('real_ingreso');
            $id_empresa=$request->get('empresa');

            $actualizar                      = Ingreso::findOrfail($id);
            $actualizar->nom_ingreso         = $request->get('nom_ingreso');
            $actualizar->proyectado_ingreso  = $proyectado;
            $actualizar->real_ingreso        =$real; 

            $total_diferencia=$real-$proyectado;
            $diferencia=(($real-$proyectado)/$proyectado)*100;

            $actualizar->total_diferencia_ingreso  =$total_diferencia;
            $actualizar->diferencia_ingreso        =$diferencia;
            $actualizar->update();

            


                DB::commit();
                alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');

            
            } catch (Exception $e) {
                DB::rollback();
                alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
                
             }
          return Redirect::to('ingreso/'.$id_empresa)->with('status','Se actualizó correctamente');
   
    }


    public function destroy(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $empresa = DB::table('tbl_empresa as e')
            ->join('tbl_contexto_ingresos as i','i.fk_empresa','=','e.id_empresa')
            ->where('i.id_ingreso','=',''.$id.'')
            ->first();
            $id_empresa= $empresa->id_empresa;
           
            $ocultar                   = Ingreso::findOrfail($id);
            $ocultar->bool_estado      = '0';
            $ocultar->update();

           
            DB::commit();
            alert()->success('Se ha Elimino correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('ingreso/'.$id_empresa)->with('status','Se actualizó correctamente');

      
    }


}
