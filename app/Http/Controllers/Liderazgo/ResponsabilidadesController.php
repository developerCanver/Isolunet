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
    public function index($id_responsabilidad)
    {
        $empresas = Empresa::where('fk_usuario','=',''.Auth::User()->id.'')
        ->where('bool_estado','=','1')->first();

   
        $responsabilidad =  DB::table('tbl_lid_roles_responsabilidades as rr')
                                ->where('id_rol_res','=',''.$id_responsabilidad.'')->first();
     

            $responsabilidades = DB::table('tbl_lid_roles_responsabilidades as rr')
                                    ->join('tbl_lid_responsabilidades as res','res.fk_roles_res','=','rr.id_rol_res')
                                    ->join('tbl_empresa as e','e.id_empresa','=','rr.fk_empresa')
                                    ->where('id_rol_res','=',''.$id_responsabilidad.'')
                                    ->where('fk_usuario',  '=',''.Auth::User()->id.'')
                                    ->where('rr.bool_estado','=','1')
                                    ->where('res.bool_estado','=','1')
                                    ->get();
        $cargos =  DB::table('tbl_lid_roles_cargos as rc')
                                    ->join('tbl_cargos as c','c.id_cargo','=','rc.fk_cargo')
                                    ->where('rc.bool_estado','=','1')
                                    ->where('c.bool_estado','=','1')
                                    ->where('fk_roles_res','=',''.$id_responsabilidad.'')->get();
                                  
                                  //dd( $cargos);

         return view('pages.liderazgo.matriz-roles.responsabilidad.index',[
                                         'responsabilidad' => $responsabilidad,
                                        'empresas' => $empresas,
                                        'responsabilidades' => $responsabilidades,
                                        'id_responsabilidad' => $id_responsabilidad,
                                        'cargos' => $cargos,
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
            

            $fk_roles_res =$request->get('id_responsabilidad');
            $id_responsabilidad =$request->get('id_responsabilidad');
        

               $responsabilidad = new TBLResponsabilidad();
               $responsabilidad->fk_roles_res = $fk_roles_res;

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
            


            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('responsabilidades_matriz/'.$id_responsabilidad)->with('status','Se guardó correctamente');
    }


    public function edit($id)
    {   
        
        $responsabilidad = TBLResponsabilidad::findOrfail($id);
        $id_responsabilidad=$responsabilidad->fk_roles_res;
        
        return view('pages.liderazgo.matriz-roles.responsabilidad.edit',[
                            'responsabilidad'=>$responsabilidad,
                            'id_responsabilidad'=>$id_responsabilidad,
                            ]);
    }
    public function edit_cargo_rol ($id)
    {   
        
        $responsabilidad = TBLResponsabilidad::findOrfail($id);
        $id_responsabilidad=$responsabilidad->fk_roles_res;
        
        return view('pages.liderazgo.matriz-roles.responsabilidad.edit',[
                            'responsabilidad'=>$responsabilidad,
                            'id_responsabilidad'=>$id_responsabilidad,
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
            
            $id_responsabilidad =$request->get('id_responsabilidad');
        


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


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('responsabilidades_matriz/'.$id_responsabilidad)->with('status','Se guardó correctamente');
    }

  
    public function destroy($id)
    {
        try {
            DB::beginTransaction();


            $variable                   = TBLResponsabilidad::findOrfail($id);
            $variable->bool_estado      = '0';
            $variable->update();
            $id_cargo=$variable->fk_roles_res;
           

            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('responsabilidades_matriz/'.$id_cargo)->with('status','Se guardó correctamente');
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
