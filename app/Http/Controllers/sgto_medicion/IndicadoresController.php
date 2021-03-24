<?php

namespace App\Http\Controllers\sgto_medicion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\sgto_medicion\Indicadores;

use DB;
use Redirect;
use Alert;



class IndicadoresController extends Controller
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
            return view('pages.sgto_medicion.indicadores');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        try {
            DB::beginTransaction();

            $tbl_indicadores               = new Indicadores();
            $tbl_indicadores->nombre       = $request->get('nombre_indicador');
            $tbl_indicadores->fk_sgc       = $request->get('sgc');
            $tbl_indicadores->fk_proceso   = $request->get('proceso');
            $tbl_indicadores->frequencia   = $request->get('frecuencia');
            $tbl_indicadores->freq_inicio  = $request->get('freq_inicio');
            $tbl_indicadores->mejor_hacia  = $request->get('mejor_hacia');
            $tbl_indicadores->titulo_eje_y = $request->get('titulo_eje_y');
            $tbl_indicadores->decimales    = $request->get('decimales');
            $tbl_indicadores->save();

            DB::commit();
            alert()->success('Se ha registrado el Indicador de manera correcta', 'Creado!')->persistent('Cerrar');

        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Ha ocurrido un error mientras se intentaba almacenar el Indicador', 'Error!')->persistent('Cerrar');

        }

        return Redirect::to('indicadores');
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
        //
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
