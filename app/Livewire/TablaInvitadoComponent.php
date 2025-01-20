<?php

namespace App\Livewire;

use App\Models\Proveedor;
use App\Models\User;
use Livewire\Component;

class TablaInvitadoComponent extends Component
{

    public function render()
    {
        $tablas = Proveedor::all();

        return view('livewire.tabla-invitado-component', [
            'tablas' => $tablas
        ]);
    }
}

