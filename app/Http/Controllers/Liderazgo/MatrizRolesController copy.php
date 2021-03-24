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
                                    ->join('tbl_lid_roles_cargos as rc','rc.fk_roles_res','=','r.id_rol_res')                                   
                                    ->join('tbl_cargos as c','c.id_cargo','=','rc.fk_cargo')                                   
                                    ->join('tbl_lid_responsabilidades as res','res.fk_roles_res','=','r.id_rol_res')                                   
                                    ->where('u.id','=',''.Auth::User()->id.'')
                                    ->where('e.bool_estado','=','1')
                                    ->where('r.bool_estado','=','1')
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

                    
        return view('pages.liderazgo.matriz-roles.index',[
            'tabla_usuarios_cliente' => $tabla_usuarios_cliente,
            'empresas' => $empresas,
            'responsabilidades' => $responsabilidades,
        ]);
    }

  

  
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

            $ultimo_id = RolesResponsabilidad::latest('id_rol_res')->first();
            $ultimo_id=$ultimo_id->id_rol_res;
            
            
            $rolCargos = $request->get('fk_cargo');
           
            //dd( $variable->id_rol_res);
            for ($i=0; $i <  count($rolCargos) ; $i++) {

               $cargos = new RolesCargos();
               $cargos->fk_roles_res = $variable->id_rol_res;
               $cargos->fk_cargo = $rolCargos[$i];
               $cargos->save();
            }

            $nom_res = $request->get('nom_responsabilidades');
            //dd($nom_res);
            
            
            for ($i=0; $i <  count($nom_res) ; $i++) {

               $responsabilidad = new TBLResponsabilidad();
               $responsabilidad->fk_roles_res = $variable->id_rol_res;
               $responsabilidad->cuentas_rinde = '';
               $responsabilidad->autoridad = '';
               $responsabilidad->a_quien = '';
               $responsabilidad->cada_cuanto = '';
               
               $responsabilidad->nom_responsabilidades = $nom_res[$i];
               $responsabilidad->save();
            }


            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('roles_responsabilidades')->with('status','Se guardó correctamente');
    }


    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
