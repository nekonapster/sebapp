<?php

namespace App\Livewire;

use App\Models\CuentaContable;
use Livewire\Component;

class ModalNuevoCcComponent extends Component
{

    public $rubro;
    public $descripcion;
    public $tipo;

    public function crearCC(){
        
        CuentaContable::create([
            'rubro' =>$this->rubro,
            'descripcion' =>strtolower($this->descripcion),
            'tipo' =>$this->tipo,
        ]);

        // refresco la pagina
        return redirect('/general');
    }


    public function render()
    {
        return view('livewire.modal-nuevo-cc-component');
    }
}
