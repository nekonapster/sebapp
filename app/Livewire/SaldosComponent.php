<?php

namespace App\Livewire;

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


    public function calcularTotal() {
        // unifico todos los array
        $this->conjuntoSaldos = array_merge($this->provincia, $this->santander, $this->santanderP, $this->fci, $this->digital, $this->efectivo);

        // sumo los valores del array unificado
        $this->mostrarTotal= round(array_sum($this->conjuntoSaldos), 3);


        // reset de los campos
        $this->provincia = [
            'a893' => '',
            'a430' => '',
            'parroquia' => '',
            'adm' => ''
        ];

        $this->santander = [
            'sant1' => '',
            'sant2' => '',
            'sant3' => '',
        ];
        $this->santanderP = [
            '893' => '',
            '430' => '',
            '1486' => '',
        ];
        $this->fci = [
            'fciA' => '',
            'fciPlus' => '',
        ];
        $this->digital = [
            'mercadoPago' => '',
        ];
        $this->efectivo = [
            'caja' => '',
        ];
    
       
    }

    
    public function aBd() {
        //logica para subir el total a bd
 
    }
    
    public function render()
    {
        return view('livewire.saldos-component',[
            'mostrarTotal' =>$this->mostrarTotal,
            'fechaSaldos' =>$this->fechaSaldos,
        ]);
    }
}
