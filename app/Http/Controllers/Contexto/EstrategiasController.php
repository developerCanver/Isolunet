<?php

namespace App\Http\Controllers\Contexto;

use App\Http\Controllers\Controller;
use App\Models\Contexto\Estrategias;
use App\Models\Parametrizacion\Empresa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

 

class EstrategiasController extends Controller
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

    
            $consultas =  DB::table('tbl_contexto_estrategia')
                            ->where('fk_empresa',$id_empresa)
                            ->where('bool_estado','=','1')
                            ->paginate(20);
                        
            return view('pages.contexto.estrategia.index',[
                                    'empresa'=>$empresa,
                                    'consultas'=>$consultas,
                                        ]);
                
        }
    
    
        public function store(Request $request)
        {
        try {
                    DB::beginTransaction();
    
                    $variable 				  = new Estrategias();
      
                     $variable->pestal_est     = ($request->get('pestal_est')) ?    $request->get('pestal_est') : '';	
                     $variable->estretegia     = ($request->get('estretegia')) ?    $request->get('estretegia') : '';	
                     $variable->que_hacer      = ($request->get('que_hacer')) ?     $request->get('que_hacer') : '';	
                     $variable->como_hacer     = ($request->get('como_hacer')) ?    $request->get('como_hacer') : '';	
                     $variable->porque_hacer   = ($request->get('porque_hacer')) ?  $request->get('porque_hacer') : '';	
                     $variable->quien          = ($request->get('quien')) ?         $request->get('quien') : '';	
                     $variable->proceso        = ($request->get('proceso')) ?       $request->get('proceso') : '';	
                   
                    $variable->fk_empresa       =  $request->get('fk_empresa');
                   
                    $variable->bool_estado        = '1';
                    $variable->save();    
    
                    DB::commit();
                    return Redirect::to('estrategias')->with('status','Se guardó correctamente');
                } catch (Exception $e) {
                    DB::rollback();
            }
    
        }
    

    
        public function update(Request $request, $id)
        {
            try {
                DB::beginTransaction();
    
         
                    $variable                 = Estrategias::findOrfail($id);
                    $variable->estretegia     = ($request->get('pestal_est')) ?    $request->get('pestal_est') : '';	
                    $variable->estretegia     = ($request->get('estretegia')) ?    $request->get('estretegia') : '';	
                    $variable->que_hacer      = ($request->get('que_hacer')) ?     $request->get('que_hacer') : '';	
                    $variable->como_hacer     = ($request->get('como_hacer')) ?    $request->get('como_hacer') : '';	
                    $variable->porque_hacer   = ($request->get('porque_hacer')) ?  $request->get('porque_hacer') : '';	
                    $variable->quien          = ($request->get('quien')) ?         $request->get('quien') : '';	
                    $variable->proceso        = ($request->get('proceso')) ?       $request->get('proceso') : '';	
                   
                     $variable->update();
    
    
    
                DB::commit();
                alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
            
            } catch (Exception $e) {
                DB::rollback();
                alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
                
            }
            return Redirect::to('estrategias')->with('status','Se actualizó correctamente');
        }
    
    
        public function destroy($id)
        {
                try {
                DB::beginTransaction();
              
                $ocultar 					= Estrategias::findOrfail($id);
                $ocultar->bool_estado		= 0;
                $ocultar->update();
    
    
               DB::commit();
               return Redirect::to('estrategias')->with('status','Se eliminó correctamente');
            } catch (Exception $e) {
                DB::rollback();
            }
        }
    }
    