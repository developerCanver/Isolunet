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

use App\Models\Contexto\Analisis_pestal;

class AnalisisPestalController extends Controller
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
       
        $validacion = DB::table('tbl_contexto_analisis_pestal')
                    ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                    ->get();

        $pestal = "";
        if (count($validacion) != 0) {
           $pestal = DB::table('tbl_contexto_analisis_pestal')
                    ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                    ->first();
        }


        return view('pages.contexto.analisis_pestal.index',['pestal'=>$pestal,'validacion'=>$validacion]);
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

             $pestal                    = new Analisis_pestal();
             $pestal->politicos         = $request->get('politicos');
             $pestal->economicos        = $request->get('economicos');
             $pestal->sociales          = $request->get('sociales');
             $pestal->tecnologicos      = $request->get('tecnologicos');
             $pestal->ambientales       = $request->get('ambientales');
             $pestal->legales           = $request->get('legales');
             $pestal->fk_empresa        = Auth::User()->fk_empresa;
             $pestal->save();

             DB::commit();
             alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        } catch (Exception $e) {
             DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }
        return Redirect::to('contexto_analisis_pestal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

             $pestal                    = Analisis_pestal::findOrfail($id);
             $pestal->politicos         = $request->get('politicos');
             $pestal->economicos        = $request->get('economicos');
             $pestal->sociales          = $request->get('sociales');
             $pestal->tecnologicos      = $request->get('tecnologicos');
             $pestal->ambientales       = $request->get('ambientales');
             $pestal->legales           = $request->get('legales');
             $pestal->update();

             DB::commit();
             alert()->success('Se ha Edito correctamente.', 'Edito!')->persistent('Cerrar');
        } catch (Exception $e) {
             DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }
        return Redirect::to('contexto_analisis_pestal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
