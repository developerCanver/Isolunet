<?php

namespace App\Http\Livewire\Contexto;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class MatrizDofa extends Component
{
    public $externo;
    public $externos=[];

    public $interno;
    public $internos=[];

  

    public function render()
    {
        
                $internos = DB::table('tbl_contexto_dofa as tcd')
                    ->join('tbl_empresa as te','tcd.fk_empresa','=','te.id_empresa')
                    ->where('te.fk_usuario','=',''.Auth::User()->id.'')
                    ->where('tipo_factor','interno')
                    ->get();


                    if (!empty($this->externo)) {
                        $this->externos =  DB::table('tbl_contexto_dofa as tcd')
                        ->join('tbl_empresa as te','tcd.fk_empresa','=','te.id_empresa')
                        ->where('te.fk_usuario','=',''.Auth::User()->id.'')
                        ->where('tipo_factor', '=', 'externo')
                        ->get();
                    }
                    if (!empty($this->interno)) {
                        $this->internos =  DB::table('tbl_contexto_dofa as tcd')
                        ->join('tbl_empresa as te','tcd.fk_empresa','=','te.id_empresa')
                        ->where('te.fk_usuario','=',''.Auth::User()->id.'')
                        ->where('tipo_factor', '=', 'interno')
                        ->get();
                    }
        return view('livewire.contexto.matriz-dofa');
    }
}
