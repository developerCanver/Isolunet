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
use App\Models\User;

class TendeciasController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
            $usuario	= User::findOrfail(Auth::User()->id);
            $rolUsuario=$usuario->fk_rol;
            $id_empresa=$usuario->fk_empresa;

                   //dd( $tipoUser);
    
           $tendencia = DB::table('tbl_contexto_tendencias_colombia as tc')
                    ->join('tbl_empresa as e','tc.fk_empresa','=','e.id_empresa')                    
                    ->join('users as u','u.fk_empresa','=','e.id_empresa') 
                    ->where('u.id', Auth::User()->id)
                    ->first();

                    //dd($tendencia);
        

         return view('pages.contexto.tendencia_en_colombia.index',['tendencia'=>$tendencia,'tipoUser'=>$rolUsuario]);
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
