<?php

namespace App\Http\Controllers\Contexto;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
class MapaProcesoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
            $pro_direcciones      = DB::table('tbl_procesos as p')
                                    ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                                    ->join('users as u','u.id','=','e.fk_usuario')
                                    ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                                    ->where('p.tipo_proceso',  '=','Procesos Gerenciales')
                                    ->where('p.bool_estado',  '=','1')
                                    ->where('e.bool_estado',  '=','1')
                                    ->orderby('id_proceso', 'DESC')->get();

            $proceso_misional      = DB::table('tbl_procesos as p')
                                    ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                                    ->join('users as u','u.id','=','e.fk_usuario')
                                    ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                                    ->where('p.tipo_proceso',  '=','Procesos Misionales')
                                    ->where('p.bool_estado',  '=','1')
                                    ->where('e.bool_estado',  '=','1')
                                    ->orderby('id_proceso', 'DESC')->get();

            $proceso_apoyo          = DB::table('tbl_procesos as p')
                                    ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                                    ->join('users as u','u.id','=','e.fk_usuario')
                                    ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                                    ->where('p.tipo_proceso',  '=','Procesos de Apoyo')
                                    ->where('p.bool_estado',  '=','1')
                                    ->where('e.bool_estado',  '=','1')
                                    ->orderby('id_proceso', 'DESC')->get(); 
            

        return view('pages.contexto.mapa_procesos.mapa_procesos',[
            'pro_direcciones'  => $pro_direcciones,
            'proceso_misional' => $proceso_misional,
            'proceso_apoyo'    => $proceso_apoyo,
        ]);
    }

    
}
