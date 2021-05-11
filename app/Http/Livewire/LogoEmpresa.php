<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LogoEmpresa extends Component
{
    public function render()
    {
        $empresa = DB::table('users as u')
                ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                ->where('u.id', Auth::user()->id)
                                ->first();
                               
        return view('livewire.logo-empresa',
                    [
                        'empresa' => $empresa,
                    ]);
    }
}
