<?php

namespace App\Http\Livewire\Contexto;

use App\Models\User;
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
        $usuario = User::findOrfail(Auth::User()->id);
                        $rolUsuario=$usuario->fk_rol;
                        $id_empresa=$usuario->fk_empresa;
                
        
                $internos = DB::table('tbl_contexto_dofa as tcd')
                    ->join('tbl_empresa as te','tcd.fk_empresa','=','te.id_empresa')
                    ->where('te.id_empresa',  $id_empresa)
                    ->where('tipo_factor','interno')
                    ->get();


                    if (!empty($this->externo)) {
                        $this->externos =  DB::table('tbl_contexto_dofa as tcd')
                        ->join('tbl_empresa as te','tcd.fk_empresa','=','te.id_empresa')
                        ->where('te.id_empresa',  $id_empresa)
                        ->where('tipo_factor', '=', 'externo')
                        ->get();
                    }
                    if (!empty($this->interno)) {
                        $this->internos =  DB::table('tbl_contexto_dofa as tcd')
                        ->join('tbl_empresa as te','tcd.fk_empresa','=','te.id_empresa')
                        ->where('te.id_empresa',  $id_empresa)
                        ->where('tipo_factor', '=', 'interno')
                        ->get();
                    }
        return view('livewire.contexto.matriz-dofa');
    }
}
