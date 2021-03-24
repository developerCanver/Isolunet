<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Parametrizacion\Empresa;
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
        return view('livewire.counter',[
            'paises' => Empresa::all(),
        ]);

    }
}
