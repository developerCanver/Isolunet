<?php

namespace App\Http\Controllers\Parametrizacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\models\Parametrizacion\Insumo;
use App\models\Parametrizacion\CalificaionProveedor;
use App\models\Parametrizacion\CriteroCalificacion;
use App\models\Parametrizacion\PromedioCalificacion;
use App\Models\User;
use Illuminate\Validation\Rules\Exists;

class CriteroCalificacionController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $empresa = DB::table('users as u')
            ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
            ->where('u.id','=',Auth::User()->id)
            ->where('e.bool_estado','=','1')
            ->first();
        if ($empresa==null) {
            Auth::logout();
            return Redirect::to('login')->with('status','El Administrador acaba de cerrar la empresa, para más información comuníquese con el administrador');
        }

        if($request){
            $usuario = User::findOrfail(Auth::User()->id);
            $rolUsuario=$usuario->fk_rol;
            $id_empresa=$usuario->fk_empresa;
            
            $proveedores = DB::table('tbl_proveedor as p')
                        ->join('tbl_empresa as e','e.id_empresa','=','p.fk_empresa')
                        ->where('e.bool_estado','=','1')
                        ->where('e.id_empresa',  $id_empresa)
                        ->where('p.bool_estado','=','1')
                        ->get();

            $consultas = DB::table('tbl_proveedor as a')
                        ->join('tbl_empresa as e','a.fk_empresa','=','e.id_empresa')
                        ->join('tbl_insumos as i','i.fk_proveedor','=','a.id_proveedor')
                        ->join('tbl_cal_proveedor as p','p.fk_insumo','=','i.id_insumo')
                        ->join('tbl_cri_calificacion as c','c.fk_cal_proveedor','=','p.id_cal_proveedor')
                        ->join('tbl_promedio_calificacion as pr','pr.fk_cri_calificacion','=','p.id_cal_proveedor')
                        ->where('e.id_empresa',  $id_empresa)
                        ->where('a.bool_estado','=','1')
                        ->where('i.bool_estado','=','1')
                        ->where('p.bool_estado','=','1')
                        ->where('c.bool_estado','=','1')
                        ->orderBy('razon_social')
                        ->orderBy('nom_proveedor')
                        ->orderBy('nom_insumo')
                        ->paginate(10);  
                       // dd($consultas);                    

                        return view('pages.parametrizacion.criterio_calificacion',[
                            'consultas'=>$consultas,
                            'proveedores'=>$proveedores
                            ]);
    	}
    }


 
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

     
            $calificacion 			             = new CriteroCalificacion();
      
            $calificacion->fecha_calificacion      =$request->get('fecha_calificacion');
            $calificacion->pro_reevaluacion        =$request->get('pro_reevaluacion');         
            $calificacion->fk_cal_proveedor        =$request->get('fk_cal_proveedor');   
            $calificacion->bool_estado	         = 1;
            $calificacion->save();  

            $id=$request->get('fk_cal_proveedor'); 
            $promedio 			             = new PromedioCalificacion();
            $promedio->fk_cri_calificacion   =$calificacion->id_cal_proveedor;  

            $culsulta = DB::table('tbl_cri_calificacion')
            ->where('fk_cal_proveedor','=', $id)
            ->where('bool_estado','=','1')
            ->avg('pro_reevaluacion');
           
            $num_promedio=round($culsulta, 2);

            $existe = DB::table('tbl_cal_proveedor as a')
            ->join('tbl_promedio_calificacion as p','p.fk_cri_calificacion','=','a.id_cal_proveedor')
            ->where('id_cal_proveedor','=', $id)->get();
           
            $id_cal_proveedor =0;
            foreach ($existe as  $emp) {               
                $id_cal_proveedor=$emp->id_cal_proveedor;
            }
 

             if(empty($id_cal_proveedor)) {
                        $promedio->promedio                  =$num_promedio;
                        $promedio->fk_cri_calificacion       =$id;
                        $promedio->bool_estado               =1;            
                        $promedio->save();

                    }else{
        
                        $actualizar             = PromedioCalificacion::where('fk_cri_calificacion','=', $id)->first();
                        $actualizar->promedio   =$num_promedio;
                        $actualizar->update();
             }   
         


           DB::commit();
           return Redirect::to('criterios_calificacion')->with('status','Se guardó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }


    public function edit($id)
    {
        
        $criticidad = DB::table('tbl_proveedor as a')
                        ->join('tbl_empresa as e','a.fk_empresa','=','e.id_empresa')
                        ->join('tbl_insumos as i','i.fk_proveedor','=','a.id_proveedor')
                        ->join('tbl_cal_proveedor as p','p.fk_insumo','=','i.id_insumo')
                        ->join('tbl_cri_calificacion as c','c.fk_cal_proveedor','=','p.id_cal_proveedor')
                        ->join('tbl_promedio_calificacion as pr','pr.fk_cri_calificacion','=','p.id_cal_proveedor')
                        ->where('c.id_cri_calificacion','=', $id)
                        ->first();
                       // dd($criticidad);
                      

        $empresa = DB::table('users as u')
                       ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                       ->where('u.id','=',Auth::User()->id)
                       ->where('e.bool_estado','=','1')
                       ->first();
                    
        return view('pages.parametrizacion.Edit.edit_criterio_calificacion',['empresa'=>$empresa,'criticidad'=>$criticidad]);
    }


    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

     

            $actualizarCri                        = CriteroCalificacion::findOrfail($id);
            
            $actualizarCri->fecha_calificacion      =$request->get('fecha_calificacion');
            $actualizarCri->pro_reevaluacion        =$request->get('pro_reevaluacion'); 
            $actualizarCri->update();

            $id_cal_proveedor=$request->get('id_cal_proveedor'); 
           
            $culsulta = DB::table('tbl_cri_calificacion')
            ->where('fk_cal_proveedor','=', $id_cal_proveedor)
            ->where('bool_estado','=','1')
            ->avg('pro_reevaluacion');
           
            $num_promedio=round($culsulta, 2);

            $actualizar             = PromedioCalificacion::where('fk_cri_calificacion','=', $id_cal_proveedor)->first();
            $actualizar->promedio   =$num_promedio;
            $actualizar->update();


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('criterios_calificacion')->with('status','Se actualizó correctamente');
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            
            $criticidad 					= CriteroCalificacion::findOrfail($id);
            $criticidad->bool_estado		= 0;
            $criticidad->update();


           DB::commit();
           return Redirect::to('criterios_calificacion')->with('status','Se eliminó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    
 

    public function getCalificacion(Request $request)
    {        
        if ($request->ajax()) {
            $insumos = Insumo::where('fk_proveedor', $request->id_proveedor)
                        ->where('bool_estado','=','1')
                        ->where('cal_proveedor_status','=','0')
                        ->get();
            foreach ($insumos as $insumo) {
                $insumosArray[$insumo->id_insumo] = $insumo->nom_insumo;
            }
            return response()->json($insumosArray);
        }
    }
    public function getCalificacion_proveedor(Request $request)
    {        
        if ($request->ajax()) {
            $calificaciones = CalificaionProveedor::where('fk_insumo', $request->id_calificacion)
                        ->where('bool_estado','=','1')
                        ->get();
            foreach ($calificaciones as $calificacion) {
                $calificacionArray[$calificacion->id_cal_proveedor ] = $calificacion->id_cal_proveedor;
            }
            return response()->json($calificacionArray);
        }
    }
    
}
