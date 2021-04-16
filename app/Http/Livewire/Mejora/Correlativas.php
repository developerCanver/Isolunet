<?php

namespace App\Http\Livewire\Mejora;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class Correlativas extends Component
{
    public $causa;
    public $causas=[];
    public $id_anomalia;
    public function mount($id_anomalia)
    {
        $this->id_anomalia = $id_anomalia;
       // dd($this->fk_correctiva );
    }

        public function render()
    {
        $anomalias =  DB::table('tbl_empresa as e')
                    ->join('tbl_mejora_anomalia as a','a.fk_empresa','=','e.id_empresa')
                    ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                    ->get();
                   // dd($anomalias);

        if ($this->causa) {
            $this->causas =  DB::table('tbl_mejo_causas as c')
                    ->join('tbl_mejora_anomalia as a','a.id_anomalia','=','c.fk_anomalia')
                    ->where('fk_anomalia', $this->causa )
                    ->get();
                    //dd($this->causa);
        }


        return view('livewire.mejora.correlativas',[
            'anomalias' => $anomalias,
        ]);
    }
}
