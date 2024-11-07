<?php

namespace App\Livewire;

use App\Models\Saldo;
use Livewire\Component;

class TablaSaldosComponent extends Component
{

public $testTablas;


 public function listarTabla(){
     $this->testTablas = Saldo::all();
 }


    public function render()
    {
        $this->listarTabla();
        return view('livewire.tabla-saldos-component');
    }
}
