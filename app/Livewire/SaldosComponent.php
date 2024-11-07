<?php

namespace App\Livewire;

use App\Models\Saldo;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SaldosComponent extends Component
{

    public $fechaSaldos;

    public $provincia = [
        'a893' => '',
        'a430' => '',
        'parroquia' => '',
        'adm' => ''
    ];
    public $santander = [
        'sant1' => '',
        'sant2' => '',
        'sant3' => '',
    ];
    public $santanderP = [
        '893' => '',
        '430' => '',
        '1486' => '',
    ];
    public $fci = [
        'fciA' => '',
        'fciPlus' => '',
    ];
    public $digital = [
        'mercadoPago' => '',
    ];
    public $efectivo = [
        'caja' => '',
    ];

    public $conjuntoSaldos;
    public $mostrarTotal;

    public $rules = [ 
        'provincia.a893' => 'required',
    ];
    
    public $messages = [
        'provincia.a893.required' => 'El campo no puede estar vacio',
    ];
    

    public function calcularTotal() {
        // unifico todos los array
        $this->conjuntoSaldos = array_merge($this->provincia, $this->santander, $this->santanderP, $this->fci, $this->digital, $this->efectivo);

        // sumo los valores del array unificado
        $this->mostrarTotal= round(array_sum($this->conjuntoSaldos), 3);
        
    }

    public function aBd() {

      
        $this->validate();

        //logica para subir el total a bd
        Saldo::create([
            'calcularTotal' => $this->mostrarTotal,
            'bancoProvincia' => $this->provincia,
            'santander' => $this->santander,
            'santanderP' => $this->santanderP,
            'fci' => $this->fci,
            'digital' => $this->digital,
            'efectivo' => $this->efectivo,
        ]);

        
        return redirect('/saldos');
    }
    
    public function render()
    {
        return view('livewire.saldos-component',[
            'mostrarTotal' =>$this->mostrarTotal,
            'fechaSaldos' =>$this->fechaSaldos,
        ]);
    }
}
