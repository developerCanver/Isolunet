<?php

namespace App\Http\Controllers\Contexto;

use App\Http\Controllers\Controller;
use App\Models\Contexto\MatrizDofa;
use App\Models\Parametrizacion\Empresa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

 

class MatrizDofaController extends Controller
{


    
            public function __construct()
            {
                $this->middleware('auth');
            }
        
            public function index(Request $request)
            {
                $empresa = Empresa::where('id_empresa',Auth::User()->fk_empresa)->where('bool_estado', '1')->first(); 
                $id_empresa=$empresa->id_empresa;
                if ($empresa==null) {
                    Auth::logout();
                    return Redirect::to('login')->with('status','El Administrador acaba de cerrar la empresa, para más información comuníquese con el administrador');
                }
    
             
        
                $consulta_opor =  DB::table('tbl_contexto_matriz')
                                ->where('fk_empresa',$id_empresa)
                                ->where('bool_estado','=','1')
                                ->where('tipo_oa','=','Oportunidades')
                                ->get();

                $consulta_ame  =  DB::table('tbl_contexto_matriz')
                                    ->where('fk_empresa',$id_empresa)
                                    ->where('bool_estado','=','1')
                                    ->where('tipo_oa','=','Amenazas')
                                    ->get();
                                                    


              
                            
                return view('pages.contexto.matriz.index',[
                                        'empresa'=>$empresa,
                                        'consulta_ame'=>$consulta_ame,
                                        'consulta_opor'=>$consulta_opor,
                                        
                                            ]);
                    
            }
        
        
            public function store(Request $request)
            {
            try {
                        DB::beginTransaction();
        
                        $variable 				  = new MatrizDofa();
                        $variable->tipo_oa        = $request->get('tipo_oa'); 	
                        $variable->tipo_fd        = $request->get('tipo_fd'); 	
                        $variable->opo_ame        = $request->get('opo_ame'); 	
                        $variable->for_deb        = $request->get('for_deb'); 	
                        $variable->descrpcion_matriz = $request->get('descrpcion_matriz'); 	
                     
                     
                       
                        $variable->fk_empresa       =  $request->get('fk_empresa');
                       
                        $variable->bool_estado        = '1';
                        $variable->save();    
        
                        DB::commit();
                        return Redirect::to('matriz_dofa')->with('status','Se guardó correctamente');
                    } catch (Exception $e) {
                        DB::rollback();
                }
        
            }
        
    
        
            public function update(Request $request, $id)
            {
                try {
                    DB::beginTransaction();
        
             
                        $variable                 = MatrizDofa::findOrfail($id);
                        $variable->descrpcion_matriz = $request->get('descrpcion_matriz'); 	
                       
                         $variable->update();
        
        
        
                    DB::commit();
                    alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
                
                } catch (Exception $e) {
                    DB::rollback();
                    alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
                    
                }
                return Redirect::to('matriz_dofa')->with('status','Se actualizó correctamente');
            }
        
        
            public function destroy($id)
            {
                    try {
                    DB::beginTransaction();
                  
                    $ocultar 					= MatrizDofa::findOrfail($id);
              
                    $ocultar->delete();
        
        
                   DB::commit();
                   return Redirect::to('matriz_dofa')->with('status','Se eliminó correctamente');
                } catch (Exception $e) {
                    DB::rollback();
                }
            }
 }