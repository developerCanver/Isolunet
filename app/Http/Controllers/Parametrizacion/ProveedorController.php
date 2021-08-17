<?php

namespace App\Http\Controllers\Parametrizacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Redirect;
use App\Models\Parametrizacion\Proveedor;
use App\Models\Parametrizacion\Insumo;
class ProveedorController extends Controller
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
    $id_empresa=$empresa->fk_empresa;

	if ($empresa==null) {
		Auth::logout();
		return Redirect::to('login')->with('status','El Administrador acaba de cerrar la empresa, para más información comuníquese con el administrador');
	}

    	if($request){

            $tabla_proveedor = DB::table('tbl_proveedor as a')                     
                        ->join('tbl_insumos as i','i.fk_proveedor','=','a.id_proveedor')
                        ->where('a.fk_empresa',  $id_empresa)
                         ->where('a.bool_estado','=','1')
                        ->where('i.bool_estado','=','1')
                         ->orderBy('nom_proveedor')
                         ->orderBy('nom_insumo')
                         ->orderBy('a.ciudad')
                         ->select(
                            'a.ciudad as ciudad',
                            'nit_proveedor',
                            'nom_proveedor',
                            'teléfono',
                            'nom_insumo',
                            'id_proveedor',
                            'id_insumo',
                         )
                        ->paginate(10);   

            $proveedores = DB::table('tbl_proveedor as p')
                        ->join('tbl_empresa as e','e.id_empresa','=','p.fk_empresa')
                        ->where('e.bool_estado','=','1')
                        ->where('e.id_empresa',  $id_empresa)
                        ->where('p.bool_estado','=','1')
                        ->get();              

    		return view('pages.parametrizacion.proveedor',[
                    'empresa'=>$empresa,
                    'tabla_proveedor'=>$tabla_proveedor,
                    'proveedores'=>$proveedores,
                    ]);
    	}

    }


    public function store(Request $request)
    {
            
        try {
            DB::beginTransaction();

            $variable                        = new Proveedor();
            
            $variable->nom_proveedor         = $request->get('nom_proveedor');
            $variable->fk_empresa            = $request->get('empresa');     
            $variable->ciudad                = $request->get('ciudad');     
            $variable->nit_proveedor         = $request->get('nit_proveedor');     
            $variable->teléfono              = $request->get('teléfono');     
            $variable->bool_estado	         = 1;   
            $variable->save();
  

            DB::commit();
        
        } catch (Exception $e) {
            DB::rollback();
            
        }

        return Redirect::to('parm_proveedor')->with('status','Se guardó correctamente');
    }

    public function storeInsumo(Request $request)
    {
            
        try {
            DB::beginTransaction();
             
            $insumo                        = new Insumo();
            $insumo->nom_insumo            = $request->get('nom_insumo');               
            $insumo->bool_estado	       = 1;   
            $insumo->fk_proveedor          = $request->get('nom_proveedor');
            $insumo->cal_proveedor_status  =1;
            $insumo->save();

            DB::commit();
        
        } catch (Exception $e) {
            DB::rollback();
            
        }

        return Redirect::to('parm_proveedor')->with('status','Se guardó correctamente');
    }

  
    public function edit($id)
    {
       
        $proveedores = DB::table('tbl_proveedor')->where('bool_estado','=','1')->get();  

        $proveedor = DB::table('tbl_proveedor as a')
                        ->join('tbl_insumos as i','i.fk_proveedor','=','a.id_proveedor')
                        ->where('a.id_proveedor','=', $id)
                        ->first();
                      

        $empresa = DB::table('users as u')
                        ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                        ->where('u.id','=',Auth::User()->id)
                        ->where('e.bool_estado','=','1')
                        ->first();
                    
        return view('pages.parametrizacion.Edit.edit_proveedor',[
                                'empresa'=>$empresa,
                                'proveedor'=>$proveedor,
                                'proveedores'=>$proveedores,
                                ]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $variable                   = Proveedor::findOrfail($id);
            
            $variable->nom_proveedor         = $request->get('nom_proveedor');
            $variable->fk_empresa            = $request->get('empresa');     
            $variable->ciudad                = $request->get('ciudad');     
            $variable->nit_proveedor         = $request->get('nit_proveedor');     
            $variable->teléfono              = $request->get('teléfono'); 
            $variable->fk_empresa            = $request->get('empresa');
            $variable->update();

            $insumo                        = Insumo::where('fk_proveedor','=',$id)->first();
            $insumo->nom_insumo            = $request->get('nom_insumo'); 
            $insumo->update();


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('parm_proveedor')->with('status','Se actualizó correctamente');
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $id_proveedor 					= DB::table('tbl_insumos as a')
                                                ->where('id_insumo','=',$id)->first();
            $id_proveedor=$id_proveedor->id_insumo; 
                                                
             
            //  $producto 					    = Proveedor::findOrfail($id_proveedor);
          
            // $producto->bool_estado		= 0;
            //  $producto->update();

             $insumo 					= Insumo::where('id_insumo','=',$id)->first();
             $insumo->bool_estado		= 0;
             $insumo->update();

           DB::commit();
           
        } catch (Exception $e) {
            DB::rollback();
        }
        return Redirect::to('parm_proveedor')->with('status','Se eliminó correctamente');
    }

    public function getInsumos(Request $request)
    {        
        if ($request->ajax()) {
            $insumos = Insumo::where('fk_proveedor', $request->id_proveedor)
                        ->where('bool_estado','=','1')
                        ->get();
            foreach ($insumos as $insumo) {
                $insumosArray[$insumo->id_insumo] = $insumo->nom_insumo;
            }
            return response()->json($insumosArray);
        }
    }
    
    
}
