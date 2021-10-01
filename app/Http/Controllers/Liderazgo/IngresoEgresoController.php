<?php

namespace App\Http\Controllers\Liderazgo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Parametrizacion\Empresa;

use App\Models\Liderazgo\Egreso;
use App\Models\Liderazgo\Ingreso;

class IngresoEgresoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request ,$id_empresa=null)
    {
        
     
        $empresa = DB::table('users as u')
                    ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                    ->where('u.id','=',Auth::User()->id)
                    ->where('e.bool_estado','=','1')
                    ->first();
        $id_empresa=$empresa->id_empresa;
       

        $empresas = DB::table('users as u')
                    ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                    ->where('u.id','=',Auth::User()->id)
                    ->where('e.bool_estado','=','1')
                    ->get();

        $empresa_selecionada = Empresa::where('id_empresa','=',$id_empresa)
                                ->where('bool_estado','=','1')
                                ->first();

        $ingresos = DB::table('tbl_empresa as e')
                        ->join('tbl_contexto_ingresos as i','i.fk_empresa','=','e.id_empresa')
                        ->where('id_empresa','=',$id_empresa)
                        ->where('e.bool_estado','=','1')
                        ->where('i.bool_estado','=','1')->get();

        $egresos = DB::table('tbl_empresa as e')
                        ->join('tbl_contexto_egresos as i','i.fk_empresa','=','e.id_empresa')
                        ->where('id_empresa','=',$id_empresa)
                        ->where('e.bool_estado','=','1')
                        ->where('i.bool_estado','=','1')->get();    

        $ingreso_tot=0;
        $real_ingreso=0;
        $tot_dife_ingre=0;
        $dife_ingreso=0;

       foreach ($ingresos as $ingreso) {

            $ingreso_tot+= $ingreso->proyectado_ingreso;
            $real_ingreso+= $ingreso->real_ingreso;
            $tot_dife_ingre+= $ingreso->total_diferencia_ingreso;
            $dife_ingreso+= $ingreso->diferencia_ingreso;
       }

       $egreso_tot=0;
       $real_egreso=0;
       $tot_dife_egre=0;
       $dife_egreso=0;

      foreach ($egresos as $egreso) {
          
           $egreso_tot+= $egreso->proyectado_egreso;
           $real_egreso+= $egreso->real_egreso;
           $tot_dife_egre+= $egreso->total_diferencia_egreso;
           $dife_egreso+= $egreso->diferencia_egreso;
      }

      // dd($ingreso_tot);
   
        return view('pages.liderazgo.presupuesto.presupuesto',[                
                            'egresos'=>$egresos,
                            'ingresos'=>$ingresos,
                            'empresas'=>$empresas,
                            'id_empresa'=>$id_empresa,
                            'empresa_selecionada'=>$empresa_selecionada,

                            'ingreso_tot'=>$ingreso_tot,
                            'real_ingreso'=>$real_ingreso,
                            'tot_dife_ingre'=>$tot_dife_ingre,
                            'dife_ingreso'=>$dife_ingreso,

                            'egreso_tot'=>$egreso_tot,
                            'real_egreso'=>$real_egreso,
                            'tot_dife_egre'=>$tot_dife_egre,
                            'dife_egreso'=>$dife_egreso,
                            
                            
                            
                ]);

      
    }
    public function getEmpresa(Request $request ,$id_empresa=null)
    {
           // $request->query('search')

            if ($id_empresa == null) {
                $id_empresa =$request->get('empresa');
                
            }

            $empresas = Empresa::where('fk_usuario','=',''.Auth::User()->id.'')
                        ->where('bool_estado','=','1')->get();

            $empresa_selecionada = Empresa::where('id_empresa','=',$id_empresa)
                                    ->where('bool_estado','=','1')
                                    ->first();

            $ingresos = DB::table('tbl_empresa as e')
                            ->join('tbl_contexto_ingresos as i','i.fk_empresa','=','e.id_empresa')
                            ->where('id_empresa','=',$id_empresa)
                            ->where('e.bool_estado','=','1')
                            ->where('i.bool_estado','=','1')->get();

            $egresos = DB::table('tbl_empresa as e')
                            ->join('tbl_contexto_egresos as i','i.fk_empresa','=','e.id_empresa')
                            ->where('id_empresa','=',$id_empresa)
                            ->where('e.bool_estado','=','1')
                            ->where('i.bool_estado','=','1')->get();


       
            return view('pages.liderazgo.presupuesto.presupuesto',[                
                    'egresos'=>$egresos,
                    'ingresos'=>$ingresos,
                    'empresas'=>$empresas,
                    'id_empresa'=>$id_empresa,
                    'empresa_selecionada'=>$empresa_selecionada,
                    ]);
           
 
    }
  
}
