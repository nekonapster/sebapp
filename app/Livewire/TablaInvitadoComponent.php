<?php

namespace App\Livewire;

use App\Models\Base;
use App\Models\CuentaContable;
use App\Models\Proveedor;
use Livewire\Component;

class TablaInvitadoComponent extends Component
{

    public function render()
    {
        $bases = Base::all();
        $proveedores = Proveedor::all();
        $cuentaContables = CuentaContable::all();
        return view('livewire.tabla-invitado-component', [
            'bases' => $bases,
            'proveedores' => $proveedores,
            'cuentaContables' => $cuentaContables,
        ]);
    }
}

