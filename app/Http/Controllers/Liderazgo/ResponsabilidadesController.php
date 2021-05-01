<?php

namespace App\Http\Controllers\Liderazgo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Liderazgo\TBLResponsabilidad;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Parametrizacion\Empresa;
use App\Models\Liderazgo\RolesCargos;
use App\Models\Liderazgo\RolesResponsabilidad;

class ResponsabilidadesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
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
                   // dd($empresas);

                   $responsabilidades = DB::table('tbl_lid_responsabilidades as res')
                   ->join('tbl_empresa as e','e.id_empresa','=','res.fk_empresa')                 
                   ->where('fk_usuario',  '=',''.Auth::User()->id.'')
                   ->where('res.bool_estado','=','1')
                   ->get();


                   return view('pages.liderazgo.matriz-roles.responsabilidad.index',[
          
                    'empresas' => $empresas,
                    'tabla_usuarios_cliente' => $tabla_usuarios_cliente,
                    'responsabilidades' => $responsabilidades,
                ]);
    }
    



    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

           //dd($request);


            $nom_res = $request->get('nom_responsabilidades');
            $cuentas_rinde = $request->get('cuentas_rinde');
            $autoridad = $request->get('autoridad');
            $a_quien = $request->get('a_quien');
            $cada_cuanto = $request->get('cada_cuanto');

               $responsabilidad = new TBLResponsabilidad();

               $responsabilidad->nom_rol_res    = $request->get('nom_rol_res');
               $responsabilidad->fk_empresa    = $request->get('fk_empresa');

               if ($cuentas_rinde==''){             
                $responsabilidad->cuentas_rinde =  '';
               }else{
                $responsabilidad->cuentas_rinde =  $cuentas_rinde;
               }

               if ($autoridad==''){             
                $responsabilidad->autoridad =  '';
               }else{
                $responsabilidad->autoridad =  $autoridad;
               }
               if ($a_quien==''){             
                $responsabilidad->a_quien =  '';
               }else{
                $responsabilidad->a_quien =  $a_quien;
               }
               if ($cada_cuanto==''){             
                $responsabilidad->cada_cuanto =  '';
               }else{
                $responsabilidad->cada_cuanto =  $cada_cuanto;
               }
               
               $responsabilidad->nom_responsabilidades = $nom_res;
               $responsabilidad->bool_estado = '1';
               $responsabilidad->save();
               
           $rolCargos = $request->get('fk_cargo');
      
           //dd( $variable->id_rol_res);
           for ($i=0; $i <  count($rolCargos) ; $i++) {

              $variable = new RolesCargos();
              $variable->fk_roles_res = $responsabilidad->id_responsabilidades;
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

        return Redirect::to('roles_responsabilidades')->with('status','Se guardó correctamente');
    }

    public function edit($id)
    {   
      
        $usuarios_cargados = DB::table('tbl_lid_roles_cargos as rc')
                                ->join('tbl_cargos as c','c.id_cargo','=','rc.fk_cargo')                            
                            ->where('rc.fk_roles_res', $id)    
                            ->get();

         $tabla_usuarios_cliente = DB::table('users as u')
                            ->join('tbl_empresa as e','e.fk_usuario','=','u.id')
                            ->join('tbl_areas as a','a.fk_empresa','=','e.id_empresa')
                            ->join('tbl_cargos as c','c.fk_area','=','a.id_area')
                            ->where('u.id','=',''.Auth::User()->id.'')
                            ->where('e.bool_estado','=','1')
                            ->where('a.bool_estado','=','1')
                            ->where('c.bool_estado','=','1')
                            ->get();
        
        $responsabilidad = TBLResponsabilidad::findOrfail($id);
        $id_responsabilidad=$responsabilidad->fk_roles_res;
        
        return view('pages.liderazgo.matriz-roles.responsabilidad.edit',[
                            'responsabilidad'=>$responsabilidad,
                            'id_responsabilidad'=>$id_responsabilidad,
                            'tabla_usuarios_cliente'=>$tabla_usuarios_cliente,
                            'usuarios_cargados'=>$usuarios_cargados,
                            ]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $nom_res = $request->get('nom_responsabilidades');
            $cuentas_rinde = $request->get('cuentas_rinde');
            $autoridad = $request->get('autoridad');
            $a_quien = $request->get('a_quien');
            $cada_cuanto = $request->get('cada_cuanto');
        
                $responsabilidad     = TBLResponsabilidad::findOrfail($id);
               if ($cuentas_rinde==''){             
                $responsabilidad->cuentas_rinde =  '';
               }else{
                $responsabilidad->cuentas_rinde =  $cuentas_rinde;
               }

               if ($autoridad==''){             
                $responsabilidad->autoridad =  '';
               }else{
                $responsabilidad->autoridad =  $autoridad;
               }
               if ($a_quien==''){             
                $responsabilidad->a_quien =  '';
               }else{
                $responsabilidad->a_quien =  $a_quien;
               }
               if ($cada_cuanto==''){             
                $responsabilidad->cada_cuanto =  '';
               }else{
                $responsabilidad->cada_cuanto =  $cada_cuanto;
               }
               
               $responsabilidad->nom_responsabilidades = $nom_res;
            $responsabilidad->update();
            RolesCargos::where('fk_roles_res', $id)->delete();
            $rolCargos = $request->get('fk_cargo');
            for ($i=0; $i <  count($rolCargos) ; $i++) {
 
               $variable = new RolesCargos();
               $variable->fk_roles_res = $responsabilidad->id_responsabilidades;
               $variable->bool_estado  = '1';
               $variable->fk_cargo = $rolCargos[$i];
               $variable->save();
            }

            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('roles_responsabilidades')->with('status','Se guardó correctamente');
    }

  
    public function destroy($id)
    {
        try {
            DB::beginTransaction();


            $variable                   = TBLResponsabilidad::findOrfail($id);
            $variable->bool_estado      = '0';
            $variable->update();
           
            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('roles_responsabilidades')->with('status','Se guardó correctamente');
    }

}
