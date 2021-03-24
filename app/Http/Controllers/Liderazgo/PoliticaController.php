<?php

namespace App\Http\Controllers\Liderazgo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Liderazgo\Politica;
class PoliticaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        $validacion = DB::table('tbl_politica')
        ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
        ->get();

        $tendencia = "";
        if (count($validacion) != 0) {
        $tendencia = DB::table('tbl_politica')
                ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                ->first();
        }

        return view('pages.liderazgo.politica.politica',['tendencia'=>$tendencia,'validacion'=>$validacion]);
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

           $politica                       = new Politica();
           $politica->politica             = $request->get('politica');
           $politica->fk_empresa           = "".Auth::User()->fk_empresa."";
           $politica->save();

            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
       } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
       }
       return Redirect::to('politica');
    }

  

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

           $politica                      = Politica::findOrfail($id);
           $politica->politica  = $request->get('politica');
           $politica->fk_empresa          = "".Auth::User()->fk_empresa."";
           $politica->update();

            DB::commit();
            alert()->success('Se ha Edito correctamente.', 'Editado!')->persistent('Cerrar');
       } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
       }
       return Redirect::to('politica');
    }


}
