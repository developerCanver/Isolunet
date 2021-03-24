<?php

namespace App\Http\Controllers\partes_interesadas;

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

use App\Models\Partes_interesadas\Calificaciones;
use App\Models\Partes_interesadas\master as ModelPartesInteresadas;

class PartesInteresadasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {


            $formimpacto = Calificaciones::where('tipo','=','Impacto')
                                         ->where('id_calificaciones','=','1')->first();
            
            $forminfluencia = Calificaciones::where('tipo','=','Influencia')
                                            ->where('id_calificaciones','=','2')->first(); 
            $cont = 1;

            $partes_interesadas = DB::table('tbl_partei_master as tpm')
                                    ->join('tbl_empresa as te','tpm.fk_empresa','=','te.id_empresa')
                                    ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                                    ->get();

            
            return view('pages.partes_interesadas.index',[
                'formimpacto'               => $formimpacto,
                'forminfluencia'            => $forminfluencia,
                'cont'                      => $cont,
                'table_partes_interesadas'  => $partes_interesadas
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            DB::beginTransaction();


            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('/');
    }

   
    public function cal(Request $request)
    {
        if ($request) {
            $impacto = DB::table('tbl_partei_calificaciones')
                      ->where('tipopa','=','Impacto')
                      ->get();

       
            $influencia = DB::table('tbl_partei_calificaciones')
                      ->where('tipopa','=','Influencia')
                      ->get();

            if (count($impacto) >= 1 && count($influencia) == 0) {
                
                $formimpacto = Calificaciones::where('tipopa','=','Impacto')->where('id_calificaciones','=','1')->first();
                $forminfluencia = Calificaciones::where('tipopa','=','Influencia')->where('id_calificaciones','=','2')->first(); 
                              

                $validador = 1;
                $validador_influencia = 0;


                return view('pages.partes_interesadas.calificaciones.portada',[
                    'formimpacto'           => $formimpacto,
                    'validador'             => $validador,
                    'validador_influencia'  => $validador_influencia,
                    'forminfluencia'        => $forminfluencia,
                ]);
    
            }elseif(count($impacto) >= 1 && count($influencia) >= 1) {

                $formimpacto = Calificaciones::where('tipopa','=','Impacto')->where('id_calificaciones','=','1')->first();
                $forminfluencia = Calificaciones::where('tipopa','=','Influencia')->where('id_calificaciones','=','2')->first(); 

                $validador = 1;
                $validador_influencia = 1;

                return view('pages.partes_interesadas.calificaciones.portada',[
                    'formimpacto'           => $formimpacto,
                    'validador'             => $validador,
                    'validador_influencia'  => $validador_influencia,
                    'forminfluencia'        => $forminfluencia,
                ]);
            }elseif(count($impacto) == 0 && count($influencia) >= 1) {

                $formimpacto = Calificaciones::where('tipopa','=','Impacto')->where('id_calificaciones','=','1')->first();
                $forminfluencia = Calificaciones::where('tipopa','=','Influencia')->where('id_calificaciones','=','2')->first(); 

                $validador = 0;
                $validador_influencia = 1;



                return view('pages.partes_interesadas.calificaciones.portada',[
                    'formimpacto'           => $formimpacto,
                    'validador'             => $validador,
                    'validador_influencia'  => $validador_influencia,
                    'forminfluencia'        => $forminfluencia,
                ]);

            }elseif(count($impacto) == 0 && count($influencia) == 0) {
                
                $formimpacto = Calificaciones::where('tipopa','=','Impacto')->where('id_calificaciones','=','1')->first();
                $forminfluencia = Calificaciones::where('tipopa','=','Influencia')->where('id_calificaciones','=','2')->first(); 

                $validador = 0;
                $validador_influencia = 0;



                return view('pages.partes_interesadas.calificaciones.portada',[
                    'formimpacto'           => $formimpacto,
                    'validador'             => $validador,
                    'validador_influencia'  => $validador_influencia,
                    'forminfluencia'        => $forminfluencia,
                ]);
            }             
        }
    }

    public function impacto(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $impacto                    = new Calificaciones;
            $impacto->calcualitativa5   = $request->get('cualitativa5');
            $impacto->descripcion5      = $request->get('descripcion5');
            $impacto->calcualitativa4   = $request->get('cualitativa4');
            $impacto->descripcion4      = $request->get('descripcion4');
            $impacto->calcualitativa3   = $request->get('cualitativa3');
            $impacto->descripcion3      = $request->get('descripcion3');
            $impacto->calcualitativa2   = $request->get('cualitativa2');
            $impacto->descripcion2      = $request->get('descripcion2');
            $impacto->calcualitativa1   = $request->get('cualitativa1');
            $impacto->descripcion1      = $request->get('descripcion1');
            $impacto->tipopa              = 'Impacto';
            $impacto->save();

            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        } catch (Exception $e) {
            DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }

        return redirect::to('pi_calificaciones')->with('status','Se Creo Correctamente');
    }

    public function impacto_update(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            
            $impacto                    = Calificaciones::findOrfail($id);
            $impacto->calcualitativa5   = $request->get('cualitativa5');
            $impacto->descripcion5      = $request->get('descripcion5');
            $impacto->calcualitativa4   = $request->get('cualitativa4');
            $impacto->descripcion4      = $request->get('descripcion4');
            $impacto->calcualitativa3   = $request->get('cualitativa3');
            $impacto->descripcion3      = $request->get('descripcion3');
            $impacto->calcualitativa2   = $request->get('cualitativa2');
            $impacto->descripcion2      = $request->get('descripcion2');
            $impacto->calcualitativa1   = $request->get('cualitativa1');
            $impacto->descripcion1      = $request->get('descripcion1');
            $impacto->update();

            DB::commit();
            alert()->success('Se ha actualizado correctamente.', 'Actualizado!')->persistent('Cerrar');
        } catch (Exception $e) {
            DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }

        return redirect::to('pi_calificaciones')->with('status','Se Creo Correctamente');
    }

    public function influencia(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $impacto                    = new Calificaciones;
            $impacto->calcualitativa5   = $request->get('cualitativa5');
            $impacto->descripcion5      = $request->get('descripcion5');
            $impacto->calcualitativa4   = $request->get('cualitativa4');
            $impacto->descripcion4      = $request->get('descripcion4');
            $impacto->calcualitativa3   = $request->get('cualitativa3');
            $impacto->descripcion3      = $request->get('descripcion3');
            $impacto->calcualitativa2   = $request->get('cualitativa2');
            $impacto->descripcion2      = $request->get('descripcion2');
            $impacto->calcualitativa1   = $request->get('cualitativa1');
            $impacto->descripcion1      = $request->get('descripcion1');
            $impacto->tipopa              = 'Influencia';
            $impacto->save();

            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        } catch (Exception $e) {
            DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }

        return redirect::to('pi_calificaciones')->with('status','Se Creo Correctamente');
    }

    public function influencia_update(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            
            $impacto                    = Calificaciones::findOrfail($id);
            $impacto->calcualitativa5   = $request->get('cualitativa5');
            $impacto->descripcion5      = $request->get('descripcion5');
            $impacto->calcualitativa4   = $request->get('cualitativa4');
            $impacto->descripcion4      = $request->get('descripcion4');
            $impacto->calcualitativa3   = $request->get('cualitativa3');
            $impacto->descripcion3      = $request->get('descripcion3');
            $impacto->calcualitativa2   = $request->get('cualitativa2');
            $impacto->descripcion2      = $request->get('descripcion2');
            $impacto->calcualitativa1   = $request->get('cualitativa1');
            $impacto->descripcion1      = $request->get('descripcion1');
            $impacto->update();

            DB::commit();
            alert()->success('Se ha actualizado correctamente.', 'Actualizado!')->persistent('Cerrar');
        } catch (Exception $e) {
            DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }

        return redirect::to('pi_calificaciones')->with('status','Se Actualizo Correctamente');
    }


    public function form_partes(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $table                      = new ModelPartesInteresadas;
            $table->partes_interesadas  = $request->get('partes_interesadas');
            $table->impacto             = $request->get('impacto');
            $table->influencia          = $request->get('influencia');
            $table->fk_empresa          = Auth::User()->fk_empresa;    
            $table->save();

            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        } catch (Exception $e) {
            DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }

        return redirect::to('partes_interesadas')->with('status','Se Creo Correctamente');
    }
}
