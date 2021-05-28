<?php

namespace App\Http\Controllers\Contexto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Redirect;
use Alert;
use View;
use Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Models\Contexto\Dofa;

class DofaController extends Controller
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
        $dofa = DB::table('tbl_contexto_dofa as tcd')
                ->join('tbl_empresa as te','tcd.fk_empresa','=','te.id_empresa')
                ->join('users as u','u.fk_empresa','=','te.id_empresa') 
                ->where('u.id', Auth::User()->id)
                ->paginate(20);

        $procesos = DB::table('tbl_empresa as e')
                ->join('tbl_procesos as p','p.fk_empresa','=','e.id_empresa')
                ->join('users as u','u.fk_empresa','=','e.id_empresa') 
                ->where('u.id', Auth::User()->id)
                ->where('e.bool_estado','=','1')
                ->where('p.bool_estado','=','1')
                ->get();

        return view('pages.contexto.dofa.index',[
                                    'dofa'=>$dofa,
                                    'procesos'=>$procesos,
                                    ]);
    }


 
    public function store(Request $request)
    {
        try {
             DB::beginTransaction();
       

             $dofa                    = new dofa();
             $dofa->debilidades       = $request->get('debilidades');
             $dofa->fortalezas        = $request->get('fortalezas');
             $dofa->amenazas          = $request->get('amenazas');
             $dofa->oportunidades     = $request->get('oportunidades');
             $dofa->pestal            = ($request->get('pestal')) ?  $request->get('pestal') : '';
             $dofa->tipo_factor       = $request->get('tipo_factor');
             $dofa->proceso           = ($request->get('proceso')) ?  $request->get('proceso') : '';
             $dofa->fk_empresa        = Auth::User()->fk_empresa;
             $dofa->save();
           
             DB::commit();
             alert()->success('Se ha creado correctamente.', 'Creado!')->autoclose(3500);
        } catch (Exception $e) {
             DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }
        return Redirect::to('contexto_dofa');
    }

   



    public function update(Request $request, $id)
    {
         try {
             DB::beginTransaction();

             $dofa                    = dofa::findOrfail($id);
             $dofa->debilidades       = $request->get('debilidades');
             $dofa->fortalezas        = $request->get('fortalezas');
             $dofa->amenazas          = $request->get('amenazas');
             $dofa->oportunidades     = $request->get('oportunidades');
             $dofa->pestal            = ($request->get('pestal')) ?  $request->get('pestal') : '';
             $dofa->proceso           = ($request->get('proceso')) ?  $request->get('proceso') : '';
             $dofa->update();

             DB::commit();
             alert()->success('Se ha Editado correctamente.', 'Edito!')->autoclose(3500);
        } catch (Exception $e) {
             DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }
        return Redirect::to('contexto_dofa');
    }


    public function destroy($id)
    {
         try {
             DB::beginTransaction();

             $dofa                    = dofa::findOrfail($id);
             $dofa->delete();

             DB::commit();
             alert()->success('Se ha Eliminado correctamente.', 'Eliminado!')->autoclose(3500);
        } catch (Exception $e) {
             DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }
        return Redirect::to('contexto_dofa');
    }
}
