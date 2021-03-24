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
     
       
       if ($request->get('empresa')) {
        $id_empresa =$request->get('empresa');
       
            
       

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
       
       } else {
           
            $empresas = Empresa::where('fk_usuario','=',''.Auth::User()->id.'')
                        ->where('bool_estado','=','1')->get();

            return view('pages.liderazgo.presupuesto.presupuesto',[
                            'empresas'=>$empresas
                            ]);

       }
       
           

      
                
         
     
      
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
