<?php

namespace App\Http\Controllers\Parametrizacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Redirect;
use Alert;
use View;
use Validator;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Parametrizacion\DatosCorporativos;
use App\Models\Parametrizacion\Empresa;
use App\Models\Parametrizacion\Areas;
use App\Models\Parametrizacion\Cargos;

class AreasCargoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_areas(Request $request)
    {
    	if($request){

                    $usuario 					= User::findOrfail(Auth::User()->id);
                    $rolUsuario=$usuario->fk_rol;
                    $id_empresa=$usuario->fk_empresa;
    		
                    $empresa = DB::table('users as u')
                                ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                                ->where('u.id','=',Auth::User()->id)
                                ->where('e.bool_estado','=','1')
                                ->first();
                                
                    $empresas  = DB::table('tbl_empresa as e')                           
                                ->where('e.bool_estado','=','1')
                                ->get(); 

                        if ($rolUsuario==1) {
                            $tabla_areas = DB::table('tbl_areas as a')
                                            ->join('tbl_empresa as e','a.fk_empresa','=','e.id_empresa')
                                            ->join('users as u','u.fk_empresa','=','e.id_empresa')                                           
                                            ->where('e.bool_estado','=','1')
                                            ->where('a.bool_estado','=','1')
                                            ->orderByDesc('a.id_area')
                                            ->paginate(10);
                        }else{

                            $tabla_areas = DB::table('tbl_areas as a')
                                            ->join('tbl_empresa as e','a.fk_empresa','=','e.id_empresa')
                                            ->join('users as u','u.fk_empresa','=','e.id_empresa')
                                            ->where('u.id',Auth::User()->id)
                                            ->where('a.fk_empresa',$id_empresa)
                                            ->where('e.bool_estado','=','1')
                                            ->where('a.bool_estado','=','1')
                                            ->orderByDesc('a.id_area')
                                            ->paginate(10);

                                        
                        }

     

    		return view('pages.parametrizacion.areas',[
                'empresa'=>$empresa,
                'empresas'=>$empresas,
                'tabla_areas'=>$tabla_areas,
                'rolUsuario'=>$rolUsuario,
                ]);
    	}

    }

    public function store_areas(Request $request)
    {
        try {
            DB::beginTransaction();

            $variable                   = new Areas();
            $variable->nom_area         = $request->get('nom_area');
            $variable->bool_estado      = '1';
            $variable->fk_empresa       = $request->get('empresa');
            $variable->fk_usuario       = 
            $variable->save();


            DB::commit();
        
        } catch (Exception $e) {
            DB::rollback();
            
        }

        return Redirect::to('parm_areas')->with('status','Se guardó correctamente');
    }

    public function edit_areas(Request $request,$id)
    {
        $areas = Areas::findOrfail($id);

        $usuario 					= User::findOrfail(Auth::User()->id);
        $rolUsuario=$usuario->fk_rol;
        $id_empresa=$usuario->fk_empresa;

        $empresa = DB::table('users as u')
                    ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                    ->where('u.id','=',Auth::User()->id)
                    ->where('e.bool_estado','=','1')
                    ->first();
        $empresas  = DB::table('tbl_empresa as e')                           
                    ->where('e.bool_estado','=','1')
                    ->get(); 
                    
        return view('pages.parametrizacion.Edit.edit_areas',[
            'empresa'=>$empresa,
            'empresas'=>$empresas,
            'areas'=>$areas,
            'rolUsuario'=>$rolUsuario,
            ]);
    }

    public function update_areas(Request $request,$id)
    {
       try {
            DB::beginTransaction();

            $variable                   = Areas::findOrfail($id);
            $variable->nom_area         = $request->get('nom_area');
            $variable->bool_estado      = '1';
            $variable->fk_empresa       = $request->get('empresa');
            $variable->update();


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('parm_areas')->with('status','Se actualizó correctamente');
    }

    public function destroy(Request $request,$id)
    {
        try {
            DB::beginTransaction();

            $variable                   = Areas::findOrfail($id);
            $variable->bool_estado      = '0';
            $variable->update();


            DB::commit();
            alert()->success('Se ha Elimino correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('parm_areas')->with('status','Se eliminó correctamente');
    }

// Controlador Cargos
 public function index_cargos(Request $request)
    {
        if($request){


            $usuario 					= User::findOrfail(Auth::User()->id);
            $rolUsuario=$usuario->fk_rol;
            $id_empresa=$usuario->fk_empresa;

      

                    if ($rolUsuario==1) {
                        $tabla_cargos = DB::table('tbl_cargos as c')
                                ->join('tbl_areas as a','a.id_area','=','c.fk_area')
                                ->join('tbl_empresa as e','a.fk_empresa','=','e.id_empresa')                     
                                ->where('e.bool_estado','=','1')
                                ->where('c.bool_estado','=','1')
                                ->where('a.bool_estado','=','1')
                                ->orderByDesc('e.razon_social')
                                ->paginate(10);

                        $areas = DB::table('tbl_areas as t')
                                ->join('tbl_empresa as e','t.fk_empresa','=','e.id_empresa')
                                ->where('t.bool_estado','=','1')                  
                                ->where('e.bool_estado','=','1')  
                                ->orderByDesc('e.razon_social')              
                        ->get();
                    }else{
                        $tabla_cargos = DB::table('tbl_cargos as c')
                                ->join('tbl_areas as a','a.id_area','=','c.fk_area')
                                ->join('tbl_empresa as e','a.fk_empresa','=','e.id_empresa') 
                                ->join('users as u','u.fk_empresa','=','e.id_empresa')
                                ->where('u.id',Auth::User()->id)
                                ->where('e.bool_estado','=','1')
                                ->where('c.bool_estado','=','1')
                                ->where('a.bool_estado','=','1')
                                ->orderByDesc('e.razon_social')
                                ->paginate(10);
                        $areas = DB::table('tbl_areas as t')
                                ->join('tbl_empresa as e','t.fk_empresa','=','e.id_empresa')
                                ->join('users as u','u.fk_empresa','=','e.id_empresa')
                                ->where('u.id',Auth::User()->id)
                                ->where('t.bool_estado','=','1')                  
                                ->where('e.bool_estado','=','1')  
                                ->orderByDesc('t.id_area')                
                                ->get();
                    }
           

            return view('pages.parametrizacion.cargos',['areas'=>$areas,'tabla_cargos'=>$tabla_cargos]);
        }

    }

     public function store_cargos(Request $request)
    {
        try {
            DB::beginTransaction();

            $variable               = new Cargos();
            $variable->nom_cargo    = $request->get('nom_cargo');
            $variable->bool_estado  = '1';
            $variable->fk_area      = $request->get('area');
            $variable->save();


            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('parm_cargo')->with('status','Se guardó correctamente');
    }

    public function edit_cargo(Request $request,$id)
    {
        $cargos = Cargos::findOrfail($id);
        
        $usuario 					= User::findOrfail(Auth::User()->id);
        $rolUsuario=$usuario->fk_rol;
        $id_empresa=$usuario->fk_empresa;

  

                if ($rolUsuario==1) {
                    $areas = DB::table('tbl_areas as t')
                            ->join('tbl_empresa as e','t.fk_empresa','=','e.id_empresa')
                            ->where('t.bool_estado','=','1')                  
                            ->where('e.bool_estado','=','1')  
                            ->orderByDesc('e.razon_social')              
                    ->get();
                }else{
                    $areas = DB::table('tbl_areas as t')
                            ->join('tbl_empresa as e','t.fk_empresa','=','e.id_empresa')
                            ->join('users as u','u.fk_empresa','=','e.id_empresa')
                            ->where('u.id',Auth::User()->id)
                            ->where('t.bool_estado','=','1')                  
                            ->where('e.bool_estado','=','1')  
                            ->orderByDesc('t.id_area')                
                            ->get();
                }

                    

        return view('pages.parametrizacion.Edit.edit_cargos',['areas'=>$areas,'cargos'=>$cargos]);
    }

    public function update_cargos(Request $request,$id)
    {
       try {
            DB::beginTransaction();

            $variable                   = Cargos::findOrfail($id);
            $variable->nom_cargo         = $request->get('nom_cargo');
            $variable->bool_estado      = '1';
            $variable->fk_area       = $request->get('area');
            $variable->update();


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('parm_cargo')->with('status','Se actualizó correctamente');
    }

    public function destroy_cargos(Request $request,$id)
    {
        try {
            DB::beginTransaction();

            $variable                   = Cargos::findOrfail($id);
            $variable->bool_estado      = '0';
            $variable->update();


            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('parm_cargo')->with('status','Se elimiinó correctamente');
    }

}
