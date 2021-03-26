<?php

namespace App\Http\Controllers\Liderazgo;

use App\Http\Controllers\Controller;

use App\Models\Liderazgo\RolesCargos;
use App\Models\Liderazgo\RolesResponsabilidad;
use Illuminate\Http\Request;
use App\Models\Liderazgo\TBLResponsabilidad;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

use App\Models\Parametrizacion\Empresa;

class MatrizRolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $responsabilidades = DB::table('users as u')
                                    ->join('tbl_empresa as e','e.fk_usuario','=','u.id')
                                    ->join('tbl_lid_roles_responsabilidades as r','r.fk_empresa','=','e.id_empresa')                                  
                                                               
                                    ->where('u.id','=',''.Auth::User()->id.'')
                                    ->where('e.bool_estado','=','1')
                                    ->where('r.bool_estado','=','1')
                                    ->get();
                        //dd($responsabilidades);

 

        $empresas = Empresa::where('fk_usuario','=',''.Auth::User()->id.'')
                    ->where('bool_estado','=','1')->first();
                    //dd($empresas);

                    
        return view('pages.liderazgo.matriz-roles.index',[
          
            'empresas' => $empresas,
            'responsabilidades' => $responsabilidades,
        ]);
    }

    public function index_cargo_rol($id_rol_res)
    {

        $rol_res = RolesResponsabilidad::findOrfail($id_rol_res);
        $RolesCargos = DB::table('tbl_lid_roles_cargos as rc')
                                        ->where('fk_roles_res','=',''.$id_rol_res.'')
                                        ->join('tbl_cargos as c','c.id_cargo','=','rc.fk_cargo')
                                        ->where('rc.bool_estado','=','1')
                                        ->get();
           
                                   
                        //dd($responsabilidades);
        $tabla_usuarios_cliente = DB::table('users as u')
                        ->join('tbl_empresa as e','e.fk_usuario','=','u.id')
                        ->join('tbl_areas as a','a.fk_empresa','=','e.id_empresa')
                        ->join('tbl_cargos as c','c.fk_area','=','a.id_area')
                        ->where('u.id','=',''.Auth::User()->id.'')
                        ->where('e.bool_estado','=','1')
                        ->where('a.bool_estado','=','1')
                        ->where('c.bool_estado','=','1')
                        ->get();
 

        $empresas = Empresa::where('fk_usuario','=',''.Auth::User()->id.'')
                    ->where('bool_estado','=','1')->first();
                    //dd($empresas);

                 
        return view('pages.liderazgo.matriz-roles.cargo_rol.index',[
            'tabla_usuarios_cliente' => $tabla_usuarios_cliente,
            'empresas' => $empresas,
            'rol_res' => $rol_res,
            'RolesCargos' => $RolesCargos,
        ]);
    }


    public function index_res($id_responsabilidad)
    {

        $rol_res = TBLResponsabilidad::findOrfail($id_responsabilidad);
         
        $responsabilidades = DB::table('users as u')
                                ->join('tbl_empresa as e','e.fk_usuario','=','u.id')
                                ->join('tbl_lid_roles_responsabilidades as rr','rr.fk_empresa','=','e.id_empresa')
                                ->join('tbl_lid_responsabilidades as r','r.id_responsabilidades ','=','rr.id_rol_res')
                                ->where('fk_roles_res','=',''.$id_responsabilidad.'')
                                ->where('e.bool_estado','=','1')
                                ->where('rr.bool_estado','=','1')
                                ->where('r.bool_estado','=','1')
                                ->get();
 

        $empresas = Empresa::where('fk_usuario','=',''.Auth::User()->id.'')
                    ->where('bool_estado','=','1')->first();
                    //dd($empresas);

               // dd($responsabilidades); 
        return view('pages.liderazgo.matriz-roles.responsabilidad.index',[
            'responsabilidades' => $responsabilidades,
            'empresas' => $empresas,
        ]);
    }

  
         // #################################################################
        // GUARDAR
        // #################################################################
  
    public function store(Request $request)
    {
      
        try {
            DB::beginTransaction();

           // dd($request);

            $variable               = new RolesResponsabilidad();
            $variable->nom_rol_res    = $request->get('nom_rol_res');
            $variable->bool_estado  = '1';
            $variable->fk_empresa       = $request->get('empresa');
            $variable->save();

           
            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('roles_responsabilidades')->with('status','Se guardó correctamente');
    }

    public function store_cargo(Request $request)
    {
      
        try {
            DB::beginTransaction();

           // dd($request);

           $rolCargos = $request->get('fk_cargo');
           $id_roles_res =$request->get('fk_roles_res');
           
           //dd( $variable->id_rol_res);
           for ($i=0; $i <  count($rolCargos) ; $i++) {

              $variable = new RolesCargos();
              $variable->fk_roles_res = $id_roles_res;
              $variable->bool_estado  = '1';
              $variable->fk_cargo = $rolCargos[$i];
              $variable->save();
           }


           
            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('responsabilidades/cargo_rol/'.$id_roles_res)->with('status','Se guardó correctamente');

    }

        // #################################################################
        // EDITAR
        // #################################################################

    public function edit($id)
    {
       
        $rol = RolesResponsabilidad::findOrfail($id);

       
                    
        return view('pages.liderazgo.matriz-roles.edit',[
                        'rol'=>$rol
                        ]);
    }

   
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $variable                   = RolesResponsabilidad::findOrfail($id);
            $variable->nom_rol_res         = $request->get('nom_rol_res');
            $variable->update();


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('roles_responsabilidades')->with('status','Se actualizó correctamente');
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $variable                   = RolesResponsabilidad::findOrfail($id);
            $variable->bool_estado      = '0';
            $variable->update();


            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('roles_responsabilidades')->with('status','Se elimiinó correctamente');
    }
    public function destroy_cargo_rol($id)
    {
        try {
            DB::beginTransaction();

            $variable                    = RolesCargos::findOrfail($id);
            $variable->bool_estado      = '0';
            $variable->update();

            $fk_roles_res  =$variable->fk_roles_res ;
           

            $id_roles_res                   = RolesResponsabilidad::findOrfail($fk_roles_res);
            $id_roles_res=$id_roles_res->id_rol_res;
          
            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('responsabilidades/cargo_rol/'.$id_roles_res)->with('status','Se guardó correctamente');
    }

}
