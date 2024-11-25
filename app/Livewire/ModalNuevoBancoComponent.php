<?php

namespace App\Livewire;

use App\Models\Banco;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ModalNuevoBancoComponent extends Component
{

    #[Validate('required|min:4|max:24')]
    public $nombre_banco;
    #[Validate('required|min:4|max:24')]
    public $cuentaAsociada;

    public function nuevoBanco()
    {

        $this->validate();

        Banco::create([
            'nombre_banco' => strtolower($this->nombre_banco),
            'cuentaAsociada' => strtolower($this->cuentaAsociada),
        ]);

        // refresco la pagina
        return redirect('/general');
    }


    public function refresh()
    {
        // Recargar pagina cuando se escapa del modal
        return redirect('/general');
    }


    public function render()
    {
        return view('livewire.modal-nuevo-banco-component');
    }
}
