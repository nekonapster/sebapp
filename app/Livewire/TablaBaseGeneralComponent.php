<?php

namespace App\Livewire;

use App\Models\Base;
use Livewire\Component;
use Livewire\Volt\Compilers\Mount;

class TablaBaseGeneralComponent extends Component
{

    // baseGeneral_id
    // proveedor_name
    // fechaFactura
    // fechaDePago
    // fechaVencimiento
    // auxiliar
    // activacion
    // ptoVenta
    // nFactura
    // importe
    // gastos
    // proyecto
    // notas
    public $fechaPago = '-';
    public $nCheque = '-';
    public $ordenPago = '-';

    // public function capturoEvento(){
    // }
    
    
    
    public function render()
    {
        $tablas = Base::all();
        return view('livewire.tabla-base-general-component',[
            'tablas'=>$tablas,
            // dd($tablas[0]['proveedor_name']),
        ]);
    }
}
