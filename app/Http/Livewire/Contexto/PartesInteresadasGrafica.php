<?php

namespace App\Http\Livewire\Contexto;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PartesInteresadasGrafica extends Component
{
    public function render()
    {
        $table_partes_interesadas = DB::table('tbl_partei_master as tpm')
                                    ->join('tbl_empresa as te','tpm.fk_empresa','=','te.id_empresa')
                                    ->where('fk_empresa','=',''. Auth::User()->fk_empresa.'')
                                    ->get();

        return view('livewire.contexto.partes-interesadas-grafica',
    [
        'table_partes_interesadas'  => $table_partes_interesadas,
    ]);
    }
}
