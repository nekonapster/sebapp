<?php

namespace App\Livewire;

use App\Models\Proveedor;
use Livewire\Component;

class TablaNuevoProveedoresComponent extends Component
{

    public function render()
    {

        $proveedores = Proveedor::all();
        return view('livewire.tabla-nuevo-proveedores-component',[
            'proveedores'=> $proveedores,
        ]);
    }
}
