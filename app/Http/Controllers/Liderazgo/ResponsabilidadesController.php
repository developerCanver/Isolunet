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

        $rolescargo = RolesCargos::findOrfail($id_responsabilidad);
        $rolesresponsabilidad = RolesResponsabilidad::findOrfail($rolescargo->fk_roles_res);
        $id_cargo=$rolescargo->id_roles_cargo;
            
            $responsabilidades = DB::table('tbl_lid_roles_responsabilidades as rr')
                                    ->join('tbl_lid_responsabilidades as res','res.fk_roles_res','=','rr.id_rol_res')
                                    ->join('tbl_lid_roles_cargos as rc','rc.fk_roles_res','=','rr.id_rol_res')
                                    ->where('id_roles_cargo','=',''.$id_responsabilidad.'')
                                    ->where('rr.bool_estado','=','1')
                                    ->where('res.bool_estado','=','1')
                                    ->get();
                                  
                                  

         return view('pages.liderazgo.matriz-roles.responsabilidad.index',[
                                         'rolescargo' => $rolescargo,
                                         'rolesresponsabilidad' => $rolesresponsabilidad,
                                        'empresas' => $empresas,
                                        'responsabilidades' => $responsabilidades,
                                        'id_cargo' => $id_cargo,
                                    ]);
    }



    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

           // dd($request);


            $nom_res = $request->get('nom_responsabilidades');
            $cuentas_rinde = $request->get('cuentas_rinde');
            $autoridad = $request->get('autoridad');
            $a_quien = $request->get('a_quien');
            $cada_cuanto = $request->get('cada_cuanto');
            

            $fk_roles_res =$request->get('fk_roles_res');
            $id_cargo =$request->get('id_cargo');
            //dd($nom_res);
            
            
            for ($i=0; $i <  count($nom_res) ; $i++) {

               $responsabilidad = new TBLResponsabilidad();
               $responsabilidad->fk_roles_res = $fk_roles_res;
               if ($cuentas_rinde[$i] == '') {                 
                $responsabilidad->cuentas_rinde =  '';
               }else{
                $responsabilidad->cuentas_rinde =  $cuentas_rinde[$i];
               }

               if ($autoridad[$i] == '') {                 
                $responsabilidad->autoridad =  '';
               }else{
                $responsabilidad->autoridad =  $autoridad[$i];
               }
               if ($a_quien[$i] == '') {                 
                $responsabilidad->a_quien =  '';
               }else{
                $responsabilidad->a_quien =  $a_quien[$i];
               }
               if ($cada_cuanto[$i] == '') {                 
                $responsabilidad->cada_cuanto =  '';
               }else{
                $responsabilidad->cada_cuanto =  $cada_cuanto[$i];
               }
            
               
               $responsabilidad->nom_responsabilidades = $nom_res[$i];
               $responsabilidad->save();
            }


            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('responsabilidades_matriz/'.$id_cargo)->with('status','Se guardó correctamente');
    }


    public function edit($id)
    {   
        
        $responsabilidad = TBLResponsabilidad::findOrfail($id);
        $id_cargo=$responsabilidad->id_responsabilidades;
        
        return view('pages.liderazgo.matriz-roles.responsabilidad.edit',[
                            'responsabilidad'=>$responsabilidad,
                            'id_cargo'=>$id_cargo,
                            ]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $id_cargo =$request->get('id_cargo');
            $nom_responsabilidades = $request->get('nom_responsabilidades');
                $cuentas_rinde= $request->get('cuentas_rinde');
                $autoridad= $request->get('autoridad');
                $a_quien= $request->get('a_quien');
                $cada_cuanto= $request->get('cada_cuanto');

                $variable                               = TBLResponsabilidad::findOrfail($id);
                if ($nom_responsabilidades != '') {                 
                $variable->nom_responsabilidades        = $request->get('nom_responsabilidades');
               }else {
                $variable->nom_responsabilidades        ='';
               }
               if ($cuentas_rinde != '') {                 
                $variable->cuentas_rinde         = $request->get('cuentas_rinde');
               }else {
                $variable->cuentas_rinde        ='';
               }
               if ($autoridad != '') {                 
                $variable->autoridad             = $request->get('autoridad');
               }else {
                $variable->autoridad        ='';
               }
               if ($a_quien != '') {                 
                $variable->a_quien               = $request->get('a_quien');
               }else {
                $variable->a_quien        ='';
               }
               if ($cada_cuanto != '') {                 
                $variable->cada_cuanto            = $request->get('cada_cuanto');
               }else {
                $variable->cada_cuanto        ='';
               }
         
            $variable->update();


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('responsabilidades_matriz/'.$id_cargo)->with('status','Se guardó correctamente');
    }

  
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $responsabilidad = TBLResponsabilidad::findOrfail($id);
        $id_cargo=$responsabilidad->id_responsabilidades;

            $variable                   = TBLResponsabilidad::findOrfail($id);
            $variable->bool_estado      = '0';
            $variable->update();


            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('responsabilidades_matriz/'.$id_cargo)->with('status','Se guardó correctamente');
    }
}
