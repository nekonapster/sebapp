<?php

namespace App\Livewire;

use App\Models\Banco;
use Livewire\Component;

class ModalNuevoBancoComponent extends Component
{

    public $nombre_banco;
    public $cuentaAsociada;

    public function nuevoBanco(){

        Banco::create([
            'nombre_banco' => strtolower($this->nombre_banco),
            'cuentaAsociada' => strtolower($this->cuentaAsociada),
        ]);

             // refresco la pagina
             return redirect('/general');
    }



    public function render()
    {
        return view('livewire.modal-nuevo-banco-component');
    }
}
