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

use App\Models\Contexto\Tendencias_en_colombia;



class TendeciasController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         $validacion = DB::table('tbl_contexto_tendencias_colombia')
                    ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                    ->get();

        $tendencia = "";
        if (count($validacion) != 0) {
           $tendencia = DB::table('tbl_contexto_tendencias_colombia')
                    ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                    ->first();
        }

         return view('pages.contexto.tendencia_en_colombia.index',['tendencia'=>$tendencia,'validacion'=>$validacion]);
    }


    public function store(Request $request)
    {
        try {
             DB::beginTransaction();

            $tendencias                       = new Tendencias_en_colombia();
            $tendencias->tendencia_colombia  = $request->get('tendencia');
            $tendencias->fk_empresa          = "".Auth::User()->fk_empresa."";
            $tendencias->save();

             DB::commit();
             alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        } catch (Exception $e) {
             DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }
        return Redirect::to('contexto_tendencias_en_colombia');
    }


    public function update(Request $request, $id)
    {
         try {
             DB::beginTransaction();

            $tendencias                      = Tendencias_en_colombia::findOrfail($id);
            $tendencias->tendencia_colombia  = $request->get('tendencia');
            $tendencias->fk_empresa          = "".Auth::User()->fk_empresa."";
            $tendencias->update();

             DB::commit();
             alert()->success('Se ha Edito correctamente.', 'Editado!')->persistent('Cerrar');
        } catch (Exception $e) {
             DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }
        return Redirect::to('contexto_tendencias_en_colombia');
    }


    public function destroy($id)
    {
        //
    }
}
