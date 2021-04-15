<?php

namespace App\Http\Livewire\Mejora;

use Livewire\Component;

class Raiz extends Component
{
    public $validacion,$m6,$pq1,$pq2,$pq3,$pq4,$pq5;
    public function render()
    {
        return view('livewire.mejora.raiz');
    }

    public  function add(){
        if ($this->m6) {
           if ($this->pq5) {
            $this->validacion=$this->pq5;
           }elseif($this->pq4){
            $this->validacion=$this->pq4;
           }elseif($this->pq3){
            $this->validacion=$this->pq3;
           }elseif($this->pq2){
            $this->validacion=$this->pq2;
           }elseif($this->pq1){
            $this->validacion=$this->pq1;
           }
        }
        
        
    }

}
