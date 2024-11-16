<?php

namespace App\Livewire;

use App\Models\Base;
use Livewire\Component;

class TablaBaseGeneralComponent extends Component
{

    public $fechaPago = '-';
    public $nCheque = '-';
    public $ordenPago = '-';

    
    public function render()
    {
        $tablas = Base::all() ?? collect([]);;
        return view('livewire.tabla-base-general-component',[
            'tablas'=>$tablas,
            // dd($tablas[0]['proveedor_name']),
        ]);
    }
}
