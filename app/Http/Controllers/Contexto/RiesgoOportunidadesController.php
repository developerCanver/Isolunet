<?php

namespace App\Http\Controllers\Contexto;

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


use App\Models\Contexto\Riesgos_oportunidades;

class RiesgoOportunidadesController extends Controller
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
    public function index()
    {
        $riesgo = DB::table('tbl_contexto_riesgos_oportunidades as tcd')
                ->join('tbl_empresa as te','tcd.fk_empresa','=','te.id_empresa')
                ->where('tcd.fk_empresa','=',''.Auth::User()->fk_empresa.'')
                ->get();

        return view('pages.contexto.riesgos_oportunidades.index',['riesgo'=>$riesgo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
             DB::beginTransaction();

             $dofa                          = new Riesgos_oportunidades();
             $dofa->riesgo_oportunidad      = $request->get('riesgo');
             $dofa->clasificacion           = $request->get('clasificacion');
             $dofa->fk_empresa              = Auth::User()->fk_empresa;
             $dofa->save();

             DB::commit();
             alert()->success('Se ha creado correctamente.', 'Creado!')->autoclose(3500);
        } catch (Exception $e) {
             DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }
        return Redirect::to('contexto_riesgo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         try {
             DB::beginTransaction();

             $dofa                    = Riesgos_oportunidades::findOrfail($id);
             $dofa->riesgo_oportunidad      = $request->get('riesgo');
             $dofa->clasificacion           = $request->get('clasificacion');
             $dofa->fk_empresa        = Auth::User()->fk_empresa;
             $dofa->update();

             DB::commit();
             alert()->success('Se ha Editado correctamente.', 'Listo!')->autoclose(3500);
        } catch (Exception $e) {
             DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }
        return Redirect::to('contexto_riesgo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         try {
             DB::beginTransaction();

             $dofa                    = Riesgos_oportunidades::findOrfail($id);
             $dofa->delete();

             DB::commit();
             alert()->success('Se ha Eliminado correctamente.', 'Eliminado!')->autoclose(3500);
        } catch (Exception $e) {
             DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }
        return Redirect::to('contexto_riesgo');
    }
}
