<?php

namespace App\Http\Controllers\Parametrizacion;

use Illuminate\Support\Facades\DB;
use Redirect;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\Parametrizacion\Criticidad;
use App\Models\Parametrizacion\Proveedor;
use App\Models\Parametrizacion\Insumo;
use App\Models\User;

class CriticidadController extends Controller
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
    
        $usuario = User::findOrfail(Auth::User()->id);
        $rolUsuario=$usuario->fk_rol;
        $id_empresa=$usuario->fk_empresa;


            $proveedores = DB::table('tbl_proveedor as p')
                        ->join('tbl_empresa as e','e.id_empresa','=','p.fk_empresa')
                        ->where('e.bool_estado','=','1')
                        ->where('e.id_empresa',  $id_empresa)
                        ->where('p.bool_estado','=','1')
                        ->get();
            $criticidades = DB::table('tbl_proveedor as a')
                        ->join('tbl_empresa as e','a.fk_empresa','=','e.id_empresa')
                        ->join('tbl_insumos as i','i.fk_proveedor','=','a.id_proveedor')
                        ->join('tbl_criticidad as c','c.fk_insumo','=','i.id_insumo')
                        ->where('e.id_empresa',  $id_empresa)
                        ->where('a.bool_estado','=','1')
                        ->where('i.bool_estado','=','1')
                        ->where('c.bool_estado','=','1')
                        ->orderBy('razon_social')
                        ->orderBy('nom_proveedor')
                        ->orderBy('nom_insumo')
                        ->paginate(10);                      

                        return view('pages.parametrizacion.criticidad',['criticidades'=>$criticidades,'proveedores'=>$proveedores]);
    	}
        

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $criticidad 				= new Criticidad();
            $criticidad->antiguedad     =$request->get('antiguedad');
            $criticidad->calidad        =$request->get('calidad');
            $criticidad->ubicacion      =$request->get('ubicacion'); 
            $criticidad->postventa      =$request->get('postventa');
            $criticidad->cal_total      =$request->get('cal_total');
            $criticidad->bool_estado    =$request->get('bool_estado');         
            $criticidad->fk_insumo      =$request->get('fk_insumo');      
        
            $criticidad->bool_estado	= 1;
            $criticidad->save();            

           DB::commit();
           return Redirect::to('parm_criticidad')->with('status','Se guardó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
        
    }

 

    public function edit($id)
    {
        $criticidad = DB::table('tbl_proveedor as a')
                        ->join('tbl_empresa as e','a.fk_empresa','=','e.id_empresa')
                        ->join('tbl_insumos as i','i.fk_proveedor','=','a.id_proveedor')
                        ->join('tbl_criticidad as c','c.fk_insumo','=','i.id_insumo')
                        ->where('c.id_criticidad','=', $id)
                        ->first();
                      

        $empresa = DB::table('users as u')
                        ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                        ->where('u.id','=',Auth::User()->id)
                        ->where('e.bool_estado','=','1')
                        ->first();
                    
        return view('pages.parametrizacion.Edit.edit_criticidad',['empresa'=>$empresa,'criticidad'=>$criticidad]);
    }

    
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $criticidad                 = Criticidad::findOrfail($id);
            
            $criticidad->antiguedad     =$request->get('antiguedad');
            $criticidad->calidad        =$request->get('calidad');
            $criticidad->ubicacion      =$request->get('ubicacion'); 
            $criticidad->postventa      =$request->get('postventa');
            $criticidad->cal_total      =$request->get('cal_total');
           
            $criticidad->update();


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('parm_criticidad')->with('status','Se actualizó correctamente');
    }

    
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            
            $criticidad 					= Criticidad::findOrfail($id);
            $criticidad->bool_estado		= 0;
            $criticidad->update();


           DB::commit();
           return Redirect::to('parm_criticidad')->with('status','Se eliminó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }

 

}
