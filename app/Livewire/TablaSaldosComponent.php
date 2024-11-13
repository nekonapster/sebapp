<?php

namespace App\Livewire;

use App\Models\Saldo;
use Livewire\Component;

class TablaSaldosComponent extends Component
{

    public $testTablas;

    public function listarTabla()
    {
        $this->testTablas = Saldo::all();
    }
    
    public function toExcel()
    {
        return redirect()->route('export-excel');
    }
    public function toPdf()
    {
        return redirect()->route('export-pdf');
    }
    
    public function render()
    {
        $this->listarTabla();
        return view('livewire.tabla-saldos-component');
    }
}
