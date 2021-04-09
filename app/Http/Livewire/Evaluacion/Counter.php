<?php

namespace App\Http\Livewire\Evaluacion;

use App\Models\Parametrizacion\Empresa;
use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
//  <livewire:counter />
public $selectPais=null, $selectDepartamneto=null, $selectMunicipio=null;
public $departamentos= null, $municipios=null;
    public function increment()
    {
        $this->count++;
    }
    public function render()
    {
        return view('livewire.evaluacion.counter',[
            'paises' => Empresa::all(),
        ]);

    }
}
