<?php

namespace App\Http\Controllers\Planeacion;

use App\Http\Controllers\Controller;
use App\Models\Evaluacion\Plantilla;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
    

class SalidasController extends Controller
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
    
    $empresa = DB::table('users as u')
                                ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                                ->where('u.id','=',Auth::User()->id)
                                ->where('e.bool_estado','=','1')
                                ->first();

    $consultas = DB::table('tbl_eva_plantilla as ep')
                                ->join('tbl_empresa as e','e.id_empresa','=','ep.fk_empresa')
                                ->where('e.id_empresa',  $id_empresa)
                                ->where('e.bool_estado','=','1')
                                ->paginate(20);
                
    return view('pages.planeacion.salida.index',[
                            'empresa'=>$empresa,
                            'consultas'=>$consultas,                                            
                                ]);
        
}


public function store(Request $request)
{
try {
            DB::beginTransaction();

            $variable 				  = new Plantilla();
        
    
            if ($request->file('plantilla')) {
                $file =$request->file('plantilla');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/archivos/plantillas/', $name);
            } else {
                $name='';
            }
            $variable->plantilla =  $name;
            
            $variable->obs_plantilla = ($request->get('obs_plantilla')) ?  $request->get('obs_plantilla') : '';
            $variable->fk_empresa    =  $request->get('fk_empresa');
            
    
            $variable->save();    

            DB::commit();
            return Redirect::to('salida_no_conforme')->with('status','Se guardó correctamente');
        } catch (Exception $e) {
            DB::rollback();
    }

}

public function update(Request $request, $id)
{
    try {
        DB::beginTransaction();

    
            $variable  = Plantilla::findOrfail($id);
            if ($request->file('plantilla')) {
                $archivo=$request->get('plantilla_anterior');
                //nombre para eliinar el anterior archivo
            
                    $mi_archivo= public_path().'/archivos/plantillas/'.$archivo;
        
                    if (is_file($mi_archivo)) {
                        //consulto si esta ena carpeta y borro
                        unlink(public_path().'/archivos/plantillas/'.$archivo);
                    }
                

                $file =$request->file('plantilla');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/archivos/plantillas/', $name);
                $variable->plantilla =  $name;
            
            } 	
            $variable->obs_plantilla = ($request->get('obs_plantilla')) ?  $request->get('obs_plantilla') : '';
        
            
                $variable->update();



        DB::commit();
        alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
    
    } catch (Exception $e) {
        DB::rollback();
        alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        
    }
    return Redirect::to('salida_no_conforme')->with('status','Se actualizó correctamente');
}


public function destroy($id)
{
        try {
        DB::beginTransaction();
        
        $variable 					= Plantilla::findOrfail($id);
        $mi_archivo= public_path().'/archivos/plantillas/'.$variable->plantilla;
        
        if (is_file($mi_archivo)) {
            //consulto si esta ena carpeta y borro
            unlink(public_path().'/archivos/plantillas/'.$variable->plantilla);
        }

    
        $variable->delete();

        DB::commit();
        return Redirect::to('salida_no_conforme')->with('status','Se eliminó correctamente');
    } catch (Exception $e) {
        DB::rollback();
    }
}
    }