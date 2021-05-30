<?php

namespace App\Http\Controllers\Parametrizacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

use App\models\Parametrizacion\CalificaionProveedor;
use App\models\Parametrizacion\Insumo;
use App\Models\User;

class CalificaionProveedorController extends Controller
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


        $proveedores = DB::table('tbl_proveedor as p')
                        ->join('tbl_empresa as e','e.id_empresa','=','p.fk_empresa')
                        ->where('e.bool_estado','=','1')
                        ->where('e.id_empresa',  $id_empresa)
                        ->where('p.bool_estado','=','1')
                        ->get();
        if($request){
            $consultas = DB::table('tbl_proveedor as a')
                        ->join('tbl_empresa as e','a.fk_empresa','=','e.id_empresa')
                        ->join('tbl_insumos as i','i.fk_proveedor','=','a.id_proveedor')
                        ->join('tbl_cal_proveedor as p','p.fk_insumo','=','i.id_insumo')
                        ->where('e.id_empresa',  $id_empresa)
                        ->where('a.bool_estado','=','1')
                        ->where('i.bool_estado','=','1')
                        ->where('p.bool_estado','=','1')
                        ->orderBy('razon_social')
                        ->orderBy('nom_proveedor')
                        ->orderBy('nom_insumo')
                        ->paginate(10);  
                       // dd($consultas);                    

        return view('pages.parametrizacion.calificacion_proveedor.calificacion_proveedor',[
                                'consultas'=>$consultas,
                                'proveedores'=>$proveedores,
                                    ]);
    	}
        
    }


    public function store(Request $request)
    {

    try {
        DB::beginTransaction();


        $insumo                        = Insumo::where('id_insumo','=',$request->get('fk_insumo'))->first();
        $insumo->cal_proveedor_status            = 0; 
        $insumo->update();
        
        $entrega  =$request->get('cum_entrega'); 
        $pedidos  =$request->get('cum_pedidos');
        $producto =$request->get('cum_productos');
        $precio   =$request->get('cum_precios');
        $servicio =$request->get('cum_servicios');
        
        $guardar 				   = new CalificaionProveedor();
        $guardar->fec_evaluar      =$request->get('fec_evaluar');
        $guardar->cum_entrega      =$entrega; 
        $guardar->cum_pedidos      =$pedidos;
        $guardar->cum_precios      =$precio;
        $guardar->cum_servicios    =$servicio;         
        $guardar->cum_productos    =$producto;  
        $guardar->fk_insumo        =$request->get('fk_insumo');    
        $guardar->bool_estado	   = 1;
        if($entrega=='Si'){
            $entrega=5.0;            
        }else{
            $entrega=1.0;  
        }

        if($precio=='Si'){
            $precio=5.0;            
        }else{
            $precio=1.0;  
        }
        if($servicio=='Si'){
            $servicio=5.0;            
        }else{
            $servicio=1.0;  
        }
     
        if($pedidos=='1% a 20%'){
            $pedidos=1.0;            
        }else if($pedidos=='21% a 40%'){
            $pedidos=2.0;            
        }else if($pedidos=='41% a 60%'){
            $pedidos=3.0;            
        }else if($pedidos=='61% a 80%'){
            $pedidos=4.0;            
        }else if($pedidos=='81% a 90%'){
            $pedidos=4.5;            
        }else if($pedidos=='100%'){
            $pedidos=5.0;            
        }

        if($producto=='1% a 20%'){
            $producto=1.0;            
        }else if($producto=='21% a 40%'){
            $producto=2.0;            
        }else if($producto=='41% a 60%'){
            $producto=3.0;            
        }else if($producto=='61% a 80%'){
            $producto=4.0;            
        }else if($producto=='81% a 90%'){
            $producto=4.5;            
        }else if($producto=='100%'){
            $producto=5.0;            
        }
        $total=(($entrega*0.2)+($precio*0.2)+($servicio*0.2)+($pedidos*0.2)+($producto*0.2));
        //dd($total);
        $guardar->total	   = $total;

        $guardar->save();            

       DB::commit();
       return Redirect::to('calificacion_proveedores')->with('status','Se guardó correctamente');
    } catch (Exception $e) {
        DB::rollback();
    }

    }


    public function edit($id)
    {
        $consultas = DB::table('tbl_proveedor as a')
                        ->join('tbl_empresa as e','a.fk_empresa','=','e.id_empresa')
                        ->join('tbl_insumos as i','i.fk_proveedor','=','a.id_proveedor')
                        ->join('tbl_cal_proveedor as p','p.fk_insumo','=','i.id_insumo')
                        ->where('p.id_cal_proveedor','=', $id)
                        ->first();
                      
       // dd($consultas);
       $empresa = DB::table('users as u')
                        ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                        ->where('u.id','=',Auth::User()->id)
                        ->where('e.bool_estado','=','1')
                        ->first();
                    
        return view('pages.parametrizacion.Edit.edit_calificacion_proveedor',['empresa'=>$empresa,'consultas'=>$consultas]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $entrega  =$request->get('cum_entrega'); 
            $pedidos  =$request->get('cum_pedidos');
            $producto =$request->get('cum_productos');
            $precio   =$request->get('cum_precios');
            $servicio =$request->get('cum_servicios');        

            $actualizar                 = CalificaionProveedor::findOrfail($id);
            
            $actualizar->fec_evaluar      =$request->get('fec_evaluar');
            $actualizar->cum_entrega      =$entrega; 
            $actualizar->cum_pedidos      =$pedidos;
            $actualizar->cum_precios      =$precio;
            $actualizar->cum_servicios    =$servicio;         
            $actualizar->cum_productos    =$producto; 

            if($entrega=='Si'){
                $entrega=5.0;            
            }else{
                $entrega=1.0;  
            }
    
            if($precio=='Si'){
                $precio=5.0;            
            }else{
                $precio=1.0;  
            }
            if($servicio=='Si'){
                $servicio=5.0;            
            }else{
                $servicio=1.0;  
            }
         
            if($pedidos=='1% a 20%'){
                $pedidos=1.0;            
            }else if($pedidos=='21% a 40%'){
                $pedidos=2.0;            
            }else if($pedidos=='41% a 60%'){
                $pedidos=3.0;            
            }else if($pedidos=='61% a 80%'){
                $pedidos=4.0;            
            }else if($pedidos=='81% a 90%'){
                $pedidos=4.5;            
            }else if($pedidos=='100%'){
                $pedidos=5.0;            
            }
    
            if($producto=='1% a 20%'){
                $producto=1.0;            
            }else if($producto=='21% a 40%'){
                $producto=2.0;            
            }else if($producto=='41% a 60%'){
                $producto=3.0;            
            }else if($producto=='61% a 80%'){
                $producto=4.0;            
            }else if($producto=='81% a 90%'){
                $producto=4.5;            
            }else if($producto=='100%'){
                $producto=5.0;            
            }
            $total=(($entrega*0.2)+($precio*0.2)+($servicio*0.2)+($pedidos*0.2)+($producto*0.2));
            //dd($total);
            $actualizar->total	   = $total;
           
            $actualizar->update();


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('calificacion_proveedores')->with('status','Se actualizó correctamente');
    }


    public function destroy($id)
    {
            try {
            DB::beginTransaction();
            
            $ocultar 					= CalificaionProveedor::findOrfail($id);
            $ocultar->bool_estado		= 0;
            $ocultar->update();


           DB::commit();
           return Redirect::to('calificacion_proveedores')->with('status','Se eliminó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }
    public function getCalificacion(Request $request)
    {        
        if ($request->ajax()) {
            $insumos = Insumo::where('fk_proveedor', $request->id_proveedor)
                        ->where('bool_estado','=','1')
                        ->where('cal_proveedor_status','=','1')
                        ->get();
            foreach ($insumos as $insumo) {
                $insumosArray[$insumo->id_insumo] = $insumo->nom_insumo;
            }
            return response()->json($insumosArray);
        }
    }
}
